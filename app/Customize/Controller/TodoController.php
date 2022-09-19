<?php

namespace Customize\Controller;

use Eccube\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Customize\Entity\Todo;
use Customize\Repository\TodoRepository;
use Customize\Util\Converter;

class TodoController extends AbstractController
{
    /**
     * @var TodoRepository
     */
    private $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    // public function __construct()
    {
        $this->todoRepository = $todoRepository;
    }

    /**
     * @Method("GET")
     * @Route("/todo", name="todo")
     * @Template("/todo.twig")
    */
    public function index()
    {
        // insertのサンプル
        $todo = new Todo();
        $todo->setTodo('1111111');
        $this->todoRepository->save($todo);


        // selectのサンプル
        $todoList = $this->todoRepository->customFindAll();



        // return [
        //     'todoList' => $todoList
        // ];
        return [
            'todoList' => $todoList
        ];
    }

    /**
     * @Method("GET")
     * @Route("/todo/delete")
     * @Template("/todo.twig")
    */
    public function delete()
    {
        // selectのサンプル １個取得
        $id = 2;
        $em = $this->getDoctrine()->getManager();
        $todo = $em->getRepository(Todo::class)->findBy([ 'id' => $id, ]);
        var_dump("//////");
        var_dump($todo[0]);

        // rawクエリのサンプル
        $em = $this->getDoctrine()->getManager();
        $RAW_QUERY = 'SELECT * FROM dtb_Todo LIMIT 1;';
        // ========================================
        var_dump("///select START///");
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();

        //　fetchAllは全行取得
        // $todo = $statement->fetchAll();
        $todo = $statement->fetchAllAssociative();
        var_dump("///ID array///");
        var_dump($todo[0]);
        // $todo = Converter::ArrayToObject($todo[0], new Todo());
        // var_dump($todo);
        $id = $todo[0]["id"];
        var_dump("///ID///");
        var_dump($id);
        // 削除できないけど、解析時間かかるのでやめとこう
        // $this->todoRepository->delete($todo);
        var_dump("///select END///");
        // ========================================
        var_dump("///DELETE START///");
        $RAW_QUERY = 'delete FROM dtb_Todo where id = :id ;';
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->bindValue('id', $id);
        $statement->execute();
        var_dump("///DELETE END///");
        // ========================================
        

        $todoList = $this->todoRepository->customFindAll();

        return [
            'todoList' => $todoList
        ];
    }

    
}