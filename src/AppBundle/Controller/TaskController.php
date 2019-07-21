<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Task;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TaskController
 * @package AppBundle\Controller
 * @Route("/task/")
 */
class TaskController extends Controller
{

    /**
     * @Route("new")
     */
    public function  newAction(){
        //cria um novo objeto
        $task = new Task();
        //passa os parametros do novo objeti
        $task->setName("My First Task");
        $task->setFinished(true);

        //cria uma instancia do entity manager
        $em = $this->getDoctrine()->getManager();
        //adiciona um objeto na fila para ser gravado no banco
        $em->persist($task);
        //grava no banco este objeto
        $em->flush();

        return new Response("Task has been created");
    }

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