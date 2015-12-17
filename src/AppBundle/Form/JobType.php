<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


/**
 * Description of JobType
 *
 * @author elsa
 */
class JobType extends AbstractType
{
    
   public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('namejob')
            ->add('adres');
                }
    
  public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'AppBundle\Entity\Job'));
    }
    
  public function getName()
    {
        return 'appbundle_job';        
    }  
  
}
