<?php


namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class TaskController extends Controller
{
    /**
     * @Route("/task/{name}")
     */
    public function indexAction($name){
        $tasks = [
            'Call Mari',
            'Folloe up Mathew',
            'Pay Amazon Bill'
        ];
        return $this->render('task/index.html.twig',[
            'name'=> $name,
            'tasks' =>$tasks
        ]);
    }

    /**
     * @Route("/task/show/", name="task_show")
     */
    public function showAction(){

        return $this->render('task/show.html.twig');

    }

    /**
     * @Route("/tasks.json")
     * @Method("GET")
     */
    public function apiAction(){
        $tasks = [
            'Call Mari',
            'Folloe up Mathew',
            'Pay Amazon Bill'
        ];
        return new JsonResponse($tasks);
    }
}