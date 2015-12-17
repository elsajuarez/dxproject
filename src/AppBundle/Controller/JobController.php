<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Form;
use AppBundle\Entity\Job;
use AppBundle\Entity\Location;


/**
 * Job controller.
 *
 * @Route("/job")
 */
class JobController extends Controller
{
    /**
     * Lists all Job entities.
     *
     * @Route("/", name="job_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $jobs = $em->getRepository('AppBundle:Job')->findAll();

        return $this->render('job/index.html.twig', array(
            'jobs' => $jobs,
        ));
    }

    /**
     * Creates a new Job entity.
     *
     * @Route("/new", name="job_new")
     * @Method({"GET", "POST"})
     */
    
   /*  public function newActionORIGINAL(Request $request)
    {
        $job = new Job();
        $form = $this->createForm(new JobType(), $job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($job);
            $em->flush();

            return $this->redirectToRoute('job_show', array('id' => $job->getId()));
        }

        return $this->render('job/new.html.twig', array(
            'job' => $job,
            'form' => $form->createView(),
        ));
    }*/
    
    public function newAction(Request $request)
    {
        $job = new Job();        
      
        $postcode = array('9700','8700','3200');
        $form = $this->createFormBuilder()
                ->add('namjob')
                ->add('adressss')
                ->add('postcode',CollectionType::class,array(
                    'entry_type' => TextType::class,
                    'entr_options'=> array(
                      'required' =>false   
                    )
                ))
                ->getForm();       

        return $this->render('job/new.html.twig', array( 'form' => $form->createView(),));
    }

    /**
     * Finds and displays a Job entity.
     *
     * @Route("/{id}", name="job_show")
     * @Method("GET")
     */  
    
    public function showAction($id)
    { 
        $job = new Job();
        $gegevens = array();
        $em = $this->getDoctrine()->getManager();
        $job = $em->getRepository('AppBundle:Job')->find($id);        
        
        $deleteForm = $this->createDeleteForm($job);
        
        if($job){    
        $codpostal  = $job->getCodpost()->getCodigo();
        $codnaam    = $job->getCodpost()->getNaamcommune();   
        $gegevens   = array ( 'job' => $job,'codpost'=>$codpostal,'codnaam'=>$codnaam);
        }    
            
       
        return $this->render('job/show.html.twig', array(
            'gegevens' => $gegevens,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Job entity.
     *
     * @Route("/{id}/edit", name="job_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Job $job)
    {
        
        $deleteForm = $this->createDeleteForm($job);
        $editForm = $this->createForm(new JobType(), $job);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($job);
            $em->flush();

            return $this->redirectToRoute('job_edit', array('id' => $job->getId()));
        }

        return $this->render('job/edit.html.twig', array(
            'job' => $job,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Job entity.
     *
     * @Route("/{id}", name="job_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Job $job)
    {
        $form = $this->createDeleteForm($job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($job);
            $em->flush();
        }

        return $this->redirectToRoute('job_index');
    }

    /**
     * Creates a form to delete a Job entity.
     *
     * @param Job $job The Job entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Job $job)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('job_delete', array('id' => $job->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
