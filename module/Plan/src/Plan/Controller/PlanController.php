<?php
/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 15/06/2017
 * Time: 11:09
 */

namespace Plan\Controller;


use JMS\Serializer\SerializerBuilder;
use Plan\Service\Plan as PlanService;
use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class PlanController extends AbstractRestfulController
{
    protected $service;

    public function __construct(PlanService $service)
    {
        $this->service = $service;
    }

    public function getList()
    {
        return new JsonModel($this->service->getPaginated($this->params()->fromQuery('page', 1)));
    }

    public function get($id)
    {
        $json = $this->service->getJson($id);



        echo $json; die();

        return new Response($jsonContent);
    }

    public function create($data)
    {
        $this->service->create($data);

        return parent::create($data); // TODO: Change the autogenerated stub
    }

    public function update($id, $data)
    {
        dump ($data); die();
        $this->service->update($id, $data);

        die ('updated');
        return parent::update($id, $data); // TODO: Change the autogenerated stub
    }

    public function delete($id)
    {
        $this->service->delete($id);

        die('am sters');
        return parent::delete($id); // TODO: Change the autogenerated stub
    }

}