<?php

namespace Customize\Controller;

use Eccube\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Customize\Repository\CustomizeProductRepository; #Repositoryを取得する為の宣言

class CustomizeProductController extends AbstractController
{
    /**
     * @var ProductRepository
     */
    protected $customizeProductRepository;
    /**
     *
     *
     * TestController constructor.
     *
     *  @param CustomizeProductRepository $productRepository
     *
     */
    public function __construct(CustomizeProductRepository $customizeProductRepository)
    {
      $this->customizeProductRepository = $customizeProductRepository;
    }
    /**
     *
     * @Route("/customize/product", name="customize-product") #URLを指定
     * @Template("customize-product.twig") #ページ遷移先を指定
     *
     */
    public function index()
    {
        $products = $this->customizeProductRepository->customFindAll();
        return ['products'=>$products];
    }
}