<?php


namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class TaskController
{
    /**
     * @Route("/tasks")
     */
    public function indexAction(){
        return new Response('My tasks');
    }
}