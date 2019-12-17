<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/landing")
 */
class LandingController extends AbstractController{
 /**
 * @Route("/", name="landing_page")
 */
    public function landing(){
        return $this->render('landing.html.twig');
    }

}
