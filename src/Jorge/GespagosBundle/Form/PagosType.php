<?php

namespace Jorge\GespagosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PagosType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', 'text', array('label' => 'Nombre'))
            ->add('periodo', 'choice', array('label' => 'Periodo',
		        					'choices' => array(
		    					 		'semanal' => 'Semanal',
		        					 	'quincenal' => 'Quincenal',
		        					 	'mensual' => 'Mensual',
		        					 	'bimensual' => 'Bimensual',
		        					 	'semestral' => 'Semestral',
            					 	)
            					)
            				)
            ->add('constante', 'choice', array('label' => 'Constante en el tiempo?',
						            'choices' => array(
		    					 		'1' => 'Si',
		        					 	'0' => 'No',
            					 	)))
            ->add('monto', 'integer', array('label' => 'Valor'))
            ->add('descripcion', 'textarea', array('label' => 'Descripción'))
            //->add('actualizacion')
            //->add('creacion')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Jorge\GespagosBundle\Entity\Pagos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jorge_gespagosbundle_pagos';
    }
}
