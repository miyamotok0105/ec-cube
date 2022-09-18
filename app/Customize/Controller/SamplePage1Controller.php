<?php

namespace Customize\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class SamplePage1Controller
{
    /**
     * @Method("GET")
     * @Route("/sample1", name="sample1")
     */
    public function testMethod()
    {
        return new Response('Hello sample page1 !');
    }
}
