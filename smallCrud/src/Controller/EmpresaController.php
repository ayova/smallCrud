<?php

namespace App\Controller;

use App\Entity\Sector;
use App\Entity\Empresa;
use App\Form\EmpresaType;
use App\Repository\EmpresaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/empresa")
 */
class EmpresaController extends AbstractController
{


    /**
     * @Route("/", name="empresa_index", methods={"GET"})
     */
    public function index(EmpresaRepository $empresaRepository): Response
    {
        $sector = new Sector();
        $sector = $this->getDoctrine()->getRepository(Sector::class)->findAll();      

        return $this->render('empresa/index.html.twig', [
            'empresas' => $empresaRepository->findAll(),
            'sector' => $sector,
        ]);
    }

    /**
     * @Route("/new", name="empresa_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        // //pasar sector para ver nombre
        // $sector = new Sector();
        // $sector = $this->getDoctrine()->getRepository(Sector::class)->findAll();   
        // var_dump($sector);   
        $empresa = new Empresa();
        $form = $this->createForm(EmpresaType::class, $empresa);

        $form->handleRequest($request);

  

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($empresa);
            $entityManager->flush();

            return $this->redirectToRoute('empresa_index');
        }

        $sector = new Sector();
        $sector = $this->getDoctrine()->getRepository(Sector::class)->findAll();      

        return $this->render('empresa/new.html.twig', [
            'empresa' => $empresa,
            'form' => $form->createView(),
            'sector' => $sector,
        ]);
    }

    /**
     * @Route("/{id}/show", name="empresa_show", methods={"GET"})
     */
    public function show(Empresa $empresa): Response
    {
        return $this->render('empresa/show.html.twig', [
            'empresa' => $empresa,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="empresa_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Empresa $empresa): Response
    {
        $form = $this->createForm(EmpresaType::class, $empresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('empresa_index');
        }

        return $this->render('empresa/edit.html.twig', [
            'empresa' => $empresa,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/confirm/{id}", name="empresa_confirmar_borrar")
     */
    public function confirmar(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $empresa = $em->getRepository(Empresa::class)->findOneBy([
            'id' => $id,
        ]);
        
        // borrar $empresa :
        // $em->remove($empresa);
        // $em->flush();


        return $this->render('empresa/borrar.html.twig', [
            'empresa' => $empresa,
        ]);

    }


    /**
     * @Route("/delete/{id}", name="empresa_borrar")
     */
    public function borrar(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $empresa = $em->getRepository(Empresa::class)->findOneBy([
            'id' => $id,
        ]);
        
        $em->remove($empresa);
        $em->flush();

        // mostrar html antes de borrar? - suplantado por empresa_confirmar_borrar
        // $this->render('empresa/borrar.html.twig', [
        //     'empresa' => $empresa,
        // ]);

        return $this->redirectToRoute('empresa_index');

    }
    
    
}


/**
 * Codigo autogenerado por make:crud
 * dejado por referencia
 * suplantado por function 'borrar' 
 */
    // public function delete(Request $request, Empresa $empresa): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$empresa->getId(), $request->request->get('_token'))) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->remove($empresa);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('empresa_index');
    // }


/**
 * codigo no util de tutoriales. dejo para referencia
         */
        // $form = $this->createForm(Empresa::class, $empresa,[
        //     'action' => $this->generateURL('empresa_borrar'),
        // ]);
        // $form->handleRequest($request);
        // if($form->isSubmitted()){
        //     $em->remove($empresa);
        //     $em->flush;
        // }