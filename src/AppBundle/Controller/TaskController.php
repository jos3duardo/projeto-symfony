<?php


namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
}