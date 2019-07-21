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
        $task->setName("My First Task 2");
        $task->setFinished(true);
        $task->setDueDate( new  \DateTime());

        //cria uma instancia do entity manager
        $em = $this->getDoctrine()->getManager();
        //adiciona um objeto na fila para ser gravado no banco
        $em->persist($task);
        //grava no banco este objeto
        $em->flush();

        return new Response("Task has been created");
    }

    /**
     * @Route("{name}")
     */
    public function indexAction($name){
        $em = $this->getDoctrine()->getManager();
        $tasks = $em->getRepository('AppBundle:Task')
                ->findAll();

        return $this->render('task/index.html.twig',[
            'name'=> $name,
            'tasks' =>$tasks
        ]);
    }

    /**
     * @Route("show/{id}", name="task_show")
     */
    public function showAction($id){

        $em = $this->getDoctrine()->getManager();

        $task = $em->getRepository("AppBundle:Task")
                ->find($id);

        //tratamento de erro
        if (!$task){
            throw $this->createNotFoundException("Task not Found");
        }
        return $this->render('task/show.html.twig',['task' => $task]);

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