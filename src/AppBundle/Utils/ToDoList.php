<?php


namespace AppBundle\Utils;
use AppBundle\Entity\test;

class ToDoList
{
    private $doctrineManager;

    public function __construct($em)
    {
        $this->doctrineManager = $em;
    }

    public function insert($array){
        if(!isset($array['name'])){return false;}

        $task = new test();
        $task->setName($array['name']);
        $task->setDate(new \DateTime());
        if(isset($array['description'])){
            $task->setDescription($array['description']);
        }
        $this->doctrineManager->persist($task);
        $this->doctrineManager->flush();

        return true;
    }

    public function get(){
        $all = $this->doctrineManager->getRepository('AppBundle:test')->findAll();
        if($all==null) {return false;}

        $json = $this->transformIntoJson($all);
        return $json;
    }
    public function getOne($id){
        $one = $this->doctrineManager->getRepository('AppBundle:test')->findOneById($id);
        if($one==null) {return false;}

        $arr[]=$one;
        $json = $this->transformIntoJson($arr);
        return $json;
    }

    public function transformIntoJson($arr){
        $table = [];
        foreach($arr as $value){
            $field = new \stdClass();
            $field->id = $value->getId();
            $field->name = $value->getName();
            $field->description = $value->getDescription();
            array_push($table,$field);
        }
        $table = json_encode($table);
        return $table;
    }

    public function delete($id){
        $one = $this->doctrineManager->getRepository('AppBundle:test')->findOneById($id);
        if($one==null){return false;}

        $this->doctrineManager->remove($one);
        $this->doctrineManager->flush();
        return true;
    }

    public function update($id, $array){
        $one = $this->doctrineManager->getRepository('AppBundle:test')->findOneById($id);
        $one->setName($array['name']);
        $one->setDescription($array['description']);
        $this->doctrineManager->flush();
        return true;
    }
}