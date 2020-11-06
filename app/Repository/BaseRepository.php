<?php
namespace App\Repository;
use App\Repository\InterfaceRepository;
 
abstract class BaseRepository implements InterfaceRepository{
    protected $model;
    public function __construct()
    {
        $this->setModel();
    }
    abstract public function getModel();
    public function setModel(){
        $this->model=app()->make($this->getModel());
    }
    public function create(array $array){
        return $this->model->create($array);
    }
}