<?php

namespace Jorge\GespagosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\Common\Util\Debug;

use Jorge\GespagosBundle\Entity\Pagos;
use Jorge\GespagosBundle\Form\PagosType;
use Jorge\GespagosBundle\Form\PagosDoType;

/**
 * Pagos controller.
 *
 */
class PagosController extends Controller
{

    /**
     * Lists all Pagos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

		$usuario = $this->getUser();
		
		$id = 0;
		if (!isset($usuario)){
			return $this->redirect($this->generateUrl('homepage'));
		}
		
        //$entities = $em->getRepository('JorgeGespagosBundle:Pagos')->findAll();
        $entities = $em->getRepository('JorgeGespagosBundle:Pagos')->findBy(array(
        					"idUsuario" => $usuario->getId()
        				));

        return $this->render('JorgeGespagosBundle:Pagos:index.html.twig', array(
            'entities' => $entities,
            'usuario' => $usuario,
        ));
    }
    /**
     * Creates a new Pagos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Pagos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

	        $usuario = $this->getUser();
        
        	$entity->setIdUsuario($usuario);
        	$entity->setCreacion(new \Datetime());
        	$entity->setActualizacion(new \Datetime());
        
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pagos_show', array('id' => $entity->getId())));
        }

        return $this->render('JorgeGespagosBundle:Pagos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Pagos entity.
    *
    * @param Pagos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Pagos $entity)
    {
        $form = $this->createForm(new PagosType(), $entity, array(
            'action' => $this->generateUrl('pagos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Pagos entity.
     *
     */
    public function newAction()
    {
        $entity = new Pagos();
        $form   = $this->createCreateForm($entity);

        return $this->render('JorgeGespagosBundle:Pagos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Pagos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JorgeGespagosBundle:Pagos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pagos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JorgeGespagosBundle:Pagos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Pagos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JorgeGespagosBundle:Pagos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pagos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JorgeGespagosBundle:Pagos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Pagos entity.
    *
    * @param Pagos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Pagos $entity)
    {
        $form = $this->createForm(new PagosType(), $entity, array(
            'action' => $this->generateUrl('pagos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Pagos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JorgeGespagosBundle:Pagos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pagos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->setActualizacion(new \Datetime());
            $em->flush();

            return $this->redirect($this->generateUrl('pagos_edit', array('id' => $id)));
        }

        return $this->render('JorgeGespagosBundle:Pagos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Pagos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JorgeGespagosBundle:Pagos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pagos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pagos'));
    }

    /**
     * Creates a form to delete a Pagos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pagos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar'))
            ->getForm()
        ;
    }
     /**
     * Displays a form to do an existing Pagos entity.
     *
     */
    public function doAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JorgeGespagosBundle:Pagos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pagos entity.');
        }

		$entity->setFechaPago(new \Datetime());
		$entity->setPagoRealizado($entity->getMonto());
        $doForm = $this->createDoForm($entity);

        return $this->render('JorgeGespagosBundle:Pagos:do.html.twig', array(
            'entity'      => $entity,
            'do_form'   => $doForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Pagos entity.
    *
    * @param Pagos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createDoForm(Pagos $entity)
    {
        $form = $this->createForm(new PagosDoType(), $entity, array(
            'action' => $this->generateUrl('pagos_doit', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Realizar pago'));

        return $form;
    }
    /**
     * Pagar an existing Pagos entity.
     *
     */
    public function doitAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JorgeGespagosBundle:Pagos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pagos entity.');
        }

        //$doForm = $this->createDoForm($entity);
        
        $datos = $request->get('jorge_gespagosbundle_pagos');
        
        
        $entity->setPagoRealizado($datos["pago_realizado"]);
        $entity->setFechaPago(new \DateTime(
        	$datos["fecha_pago"]["year"]."-".
        	$datos["fecha_pago"]["month"]."-".
        	$datos["fecha_pago"]["day"]
        ));
        
        //$logger = $this->get('logger');
        //$logger->info("Pago realizado");
        //$logger->info($entity->getId());
        //$logger->info($entity->getPagoRealizado());
        //$logger->info($entity->getFechaPago());
        
        $em->flush();
        
        if ($entity->getConstante()){
        
		    $newEntity = new Pagos();
		    
		    $fechaNueva = $entity->getFechaPago();
		    switch ($entity->getPeriodo()){
				case 'semanal':
					$fechaNueva->add(new \DateInterval('P7D'));
					break;
				case 'quincenal':
					$fechaNueva->add(new \DateInterval('P14D'));
					break;
				case 'mensual':
					$fechaNueva->add(new \DateInterval('P1M'));
					break;
				case 'bimensual':
					$fechaNueva->add(new \DateInterval('P2M'));
					break;
				case 'semestral':
					$fechaNueva->add(new \DateInterval('P6M'));
					break;
		    }
		    
		    
		    $tFechaNueva = $fechaNueva->format('Y-m-d');
		    $newEntity->setNombre($entity->getNombre()." ".$tFechaNueva);
		    $newEntity->setPeriodo($entity->getPeriodo());
		    $newEntity->setMonto($entity->getMonto());
		    $newEntity->setConstante($entity->getConstante());
		    $newEntity->setDescripcion($entity->getDescripcion());
		    $newEntity->setIdUsuario($entity->getIdUsuario());
			$newEntity->setCreacion(new \Datetime());
			$newEntity->setActualizacion(new \Datetime());
			$newEntity->setFechaPago(null);
			$newEntity->setPagoRealizado(null);

		    $em->persist($newEntity);
		    $em->flush();
		    
        }
        

        return $this->redirect($this->generateUrl('pagos_show', array('id' => $id)));
    }
}
