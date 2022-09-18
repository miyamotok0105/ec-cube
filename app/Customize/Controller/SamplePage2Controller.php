<?php

namespace Customize\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class SamplePage2Controller
{
    /**
     * @Method("GET")
     * @Route("/sample2")
     * @Template("Sample2/index.twig")
     */
    public function testMethod()
    {
        // パラメータがtwigに引き継がれる
        return ['name' => 'EC-CUBE'];
    }

    /**
     * @Method("GET")
     * @Route("/sample2/{id}", name="sample2_page")
     */
    public function testMethod2($id)
    {
        return new Response('Parameter is '.$id);
    }

}