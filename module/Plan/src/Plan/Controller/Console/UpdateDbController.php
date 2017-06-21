<?php

/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 15/06/2017
 * Time: 23:27
 */

namespace Plan\Controller\Console;

use Zend\Mvc\Console\Controller\AbstractConsoleController;
use Plan\Service\UpdateDb as UpdateDbService;

class UpdateDbController extends AbstractConsoleController
{
    protected $service;

    public function __construct(UpdateDbService $service)
    {
        $this->service = $service;
    }

    public function indexAction()
    {
        $request = $this->getRequest();

        // Check mode
        $entity = $request->getParam('entity', null); // defaults to 'all'

        switch ($entity) {
            case 'geography':
                ini_set("memory_limit", "1G");
                $file  = file('/Users/insxcloud/Downloads/files/vwGeography.csv');

                $this->service->updateGeography($file);
                break;
            case 'contract':
                ini_set("memory_limit", "1G");
                $file  = file('/Users/insxcloud/Downloads/files/vwLocalContractServiceAreas.csv');

                $this->service->updateContract($file);
                break;
            case 'plan':
                ini_set("memory_limit", "4G");
                $file  = file('/Users/insxcloud/Downloads/files/PlanInfoCounty_FipsCodeMoreThan30000.csv');

                $this->service->updatePlan($file);
                break;
            case 'plan-cost':
                ini_set("memory_limit", "2G");
                $file  = file('/Users/insxcloud/Downloads/files/vwPlanDrugsCostSharing.csv');
                $this->service->updatePlanCost($file);
                break;
            default:
                break;
        }
    }
}