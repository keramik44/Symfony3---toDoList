<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ToDoController extends Controller
{
    /**
     * @Route("/insert/{name}/{description}"), name="InsertIntoTable")
     */
    public function insertToList($name, $description){
            $task = $this->get("app.todolist")->insert(["name"=>$name,
                                                        "description"=>$description]);
            if($task == true){
                $response = "Task inserted succesfully"; }else{
                $response = "Error";
            }
            return new Response($response);
        }
    /**
     * @Route("/get"), name="AllTasks")
     */
    public function getAll(){
       if ($tasks = $this->get("app.todolist")->get()){
           return new Response($tasks);
       }else{
           return new Response("0 tasks");
       }
    }
    /**
     * @Route("/get/{id}"), name="One task")
     */
    public function getOne($id){
        if($task = $this->get("app.todolist")->getOne($id)){
            return new Response($task);
        }else{
            return new Response("There is no such task");
        }
    }
    /**
     * @Route("/delete/{id}"), name="Dlete task")
     */
    public function delete($id){
        if($task = $this->get("app.todolist")->delete($id)){
            return new Response("Task was deleted succesfully");
        }else{
            return new Response("There are no task with that number");
        }
    }

    /**
     * @Route("/update/{id}/{name}/{description}"), name="InsertIntoTable")
     */
    public function update($id,$name, $description){
        $task = $this->get("app.todolist")->update($id,["name"=>$name,
            "description"=>$description]);
        if($task == true){
            $response = "Task updated succesfully"; }else{
            $response = "Error";
        }
        return new Response($response);
    }

}