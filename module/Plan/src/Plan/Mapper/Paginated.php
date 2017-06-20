<?php
/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 20/06/2017
 * Time: 12:04
 */

namespace Plan\Mapper;


use Plan\Controller\PlanController;
use Zend\Hydrator\ClassMethods;
use Zend\Paginator\Paginator;

class Paginated
{
    protected $current;
    protected $last;
    protected $first;
    protected $currentItemCount;
    protected $pageCount;
    protected $itemCountPerPage;
    protected $totalItemCount;
    protected $data = [];

    protected $mapper;

    /**
     * Get the values of Current
     *
     * @return mixed
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * Sets the value of Current
     *
     * @param mixed $current
     *
     * @return Paginated
     */
    public function setCurrent($current)
    {
        $this->current = $current;

        return $this;
    }

    /**
     * Get the values of Last
     *
     * @return mixed
     */
    public function getLast()
    {
        return $this->last;
    }

    /**
     * Sets the value of Last
     *
     * @param mixed $last
     *
     * @return Paginated
     */
    public function setLast($last)
    {
        $this->last = $last;

        return $this;
    }

    /**
     * Get the values of First
     *
     * @return mixed
     */
    public function getFirst()
    {
        return $this->first;
    }

    /**
     * Sets the value of First
     *
     * @param mixed $first
     *
     * @return Paginated
     */
    public function setFirst($first)
    {
        $this->first = $first;

        return $this;
    }

    /**
     * Get the values of CurrentItemCount
     *
     * @return mixed
     */
    public function getCurrentItemCount()
    {
        return $this->currentItemCount;
    }

    /**
     * Sets the value of CurrentItemCount
     *
     * @param mixed $currentItemCount
     *
     * @return Paginated
     */
    public function setCurrentItemCount($currentItemCount)
    {
        $this->currentItemCount = $currentItemCount;

        return $this;
    }

    /**
     * Get the values of PageCount
     *
     * @return mixed
     */
    public function getPageCount()
    {
        return $this->pageCount;
    }

    /**
     * Sets the value of PageCount
     *
     * @param mixed $pageCount
     *
     * @return Paginated
     */
    public function setPageCount($pageCount)
    {
        $this->pageCount = $pageCount;

        return $this;
    }

    /**
     * Get the values of ItemCountPerPage
     *
     * @return mixed
     */
    public function getItemCountPerPage()
    {
        return $this->itemCountPerPage;
    }

    /**
     * Sets the value of ItemCountPerPage
     *
     * @param mixed $itemCountPerPage
     *
     * @return Paginated
     */
    public function setItemCountPerPage($itemCountPerPage)
    {
        $this->itemCountPerPage = $itemCountPerPage;

        return $this;
    }

    /**
     * Get the values of TotalItemCount
     *
     * @return mixed
     */
    public function getTotalItemCount()
    {
        return $this->totalItemCount;
    }

    /**
     * Sets the value of TotalItemCount
     *
     * @param mixed $totalItemCount
     *
     * @return Paginated
     */
    public function setTotalItemCount($totalItemCount)
    {
        $this->totalItemCount = $totalItemCount;

        return $this;
    }

    public function currentItems($data)
    {

    }

    public function setData($data)
    {
        dump ($data);
        foreach ($data as $entity)
        {

        }

        die('dsadsada');
    }

    public function __construct(\Plan\Mapper\EntityMapperInterface $mapper)
    {
        $this->mapper   = $mapper;
        $this->hydrator = new ClassMethods();

        return $this;
    }

    public function hydrate(Paginator $data)
    {
        $this->hydrator->hydrate((array)$data->getPages(), $this);
        $this->setData($data);

        return $this;
    }

    public function extract()
    {
        return $this->hydrator->extract($this);
    }

}