<?php

namespace Customize\Repository;

use Doctrine\Common\Collections\ArrayCollection;
use Eccube\Common\EccubeConfig;
use Eccube\Doctrine\Query\Queries;
use Customize\Entity\Todo;
use Eccube\Util\StringUtil;
use Eccube\Repository\AbstractRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 */
class TodoRepository extends AbstractRepository
{
    /**
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Todo::class);
    }

    /**
     * 保存
     *
     * @param Todo $todo
     */
    public function save($todo)
    {
        $em = $this->getEntityManager();
        $em->persist($todo);
        $em->flush();
    }

    /**
     * 削除
     *
     * @param Todo $todo
     */
    public function delete($todo)
    {
        $em = $this->getEntityManager();
        $em->remove($todo);
        $em->flush();
    }

     /**
     * １商品を取得
     *
     * @return Todo
     */
    public function findOne()
    {
        // ====================================


        // $qb = $this->createQueryBuilder('c')
        //     ->orderBy('c.id', 'DESC')
        //     ->setMaxResults(1);
        // $item = $qb
        //     ->getQuery()
        //     ->getResult();

        // $id = 1;
        // $em = $this->getDoctrine()->getManager();
        // $item = $em->getRepository(Todo::class)->findBy([ 'id' => $id, ]);



        return $item;
    }


    /**
     * 全検索
     *
     * @return Todo|array
     */
    public function customFindAll()
    {
        // ====================================

        $qb = $this->createQueryBuilder('c')
            ->orderBy('c.id', 'DESC');
        $items = $qb
            ->getQuery()
            ->getResult();

        

        return $items;
    }
}
