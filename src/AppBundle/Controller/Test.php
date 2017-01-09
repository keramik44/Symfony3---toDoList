<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Model;
use AppBundle\Entity\Task;

class Test extends Controller
{
    /**
     * @Route("/addNew")
     */
    public function addNew(){
        $task = new Task();
        $task->setQuest('Obijać się i spać!');
        $task->setDeadLine('26.09.2016');

        $em = $this->getDoctrine()->getManager();
        $em->persist($task);
        $em->flush($task);

        return new Response('<html><body>Genus created!</body></html>');
    }

    /**
     * @Route("/test")
     */
    public function showSite(){
        return new Response(Model\toDoList::test());
    }
}