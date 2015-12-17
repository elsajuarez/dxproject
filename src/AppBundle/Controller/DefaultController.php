<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Job;
use AppBundle\Entity\Location;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));       
    }  
    
    /**
     * @Route("/hello/{name}.{_format}", defaults={"_format"="html"}, name="hello")
     */
    
    public function helloAction ($name, $_format)
    {
        return $this->render('default/hello.'.$_format.'.twig', array(
             'name'=> $name
        ));
    }
    
    
    /**
     * @Route("/createjob", name="createjob")
     */
    
    
    public function createJobAction()
    {
        $location = $this->getDoctrine()->getRepository('AppBundle:Location')->find(9700);
        
        
        $job = new Job();
        $job->setNamejob('Eerste job buiten');
        $job->setAdres('watermolenstraat 89');
        $job->setCodpost($location);
        
       
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($job);      
        $em->flush();
        
        return new Response(
            'Created job id: '.$job->getId()            
        );
    }    
    
    /**
     * @Route("/showjob", name="showjob")
     */
    
    
    public function showJobAction()
    {
       $job = $this->getDoctrine()
               ->getRepository('AppBundle:Job')
               ->find(4);
       
       $codename = $job->getCodpost()->getCodigo();
       
       return new Response('Nombre: '.$codename);
    }   
    
}
