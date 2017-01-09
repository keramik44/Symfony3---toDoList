<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ToDoController extends Controller
{
    /**
     * @Route("/", name="ToDoList")
     */
    public function indexAction()
    {
        return $this->render("toDo/index.html.twig");
    }
    /**
     * @Route("/add", name="add task")
     */
    public function addTask()
    {
        return $this->render("toDo/add.html.twig");
    }
    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function editTask($id)
    {
        return $this->render("toDo/edit.html.twig",['id'=>$id]);
    }
}