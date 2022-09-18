<?php

namespace Customize\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class EarringController 
{
    /**
     * @Method("GET")
     * @Route("/e", name="homepage2")
     * 
     * 
     */
    public function viewEarringCustomization()
    {
        return new Response('Hello sample page !');
    }
}