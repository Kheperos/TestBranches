<?php

/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 13/06/2017
 * Time: 13:10
 */

namespace Plan\Controller;

use Plan\Service\Plan as PlanService;
use Zend\Mvc\Controller\AbstractRestfulController;

class UpdateController extends AbstractRestfulController
{
    protected $service;

    public function __construct(PlanService $service)
    {
        $this->service = $service;
    }

    public function create($data)
    {

        die('create');
        $file  = file('/Users/insxcloud/Downloads/files/vwGeography.csv');

        $this->service->save($file);

        die();

        return parent::create($data); // TODO: Change the autogenerated stub
    }

    public function getList()
    {
        ini_set("memory_limit", "3G");

        $this->service->updateContract($file);


        $file  = file('/Users/insxcloud/Downloads/files/PlanInfoCounty_FipsCodeLessThan30000.csv');

        $this->service->updateContract($file);

        die();
        return parent::get($id); // TODO: Change the autogenerated stub
    }

    public function get($id)
    {
        die('get');
        ini_set("memory_limit", "6G");

        $file  = file('/Users/insxcloud/Downloads/files/vwLocalContractServiceAreas.csv');

        $this->service->updateLocalContract($file);

        die();
    }
}