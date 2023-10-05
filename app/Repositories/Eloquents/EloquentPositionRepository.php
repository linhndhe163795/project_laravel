<?php
namespace App\Repositories\Eloquents;
use App\Contracts\Repositories\PositionRepository;
use App\Models\Position;

class EloquentPositionRepository extends EloquentBaseRepository implements PositionRepository{
    protected $model;
    public function __construct(Position $model)
    {
        $this->model = $model;
    }
    public function all(){
        return $this->model->all();
    }
    public function find($id)
    {
        return $this->model->find($id);
    }

    public function paginate($items = null)
    {
        return $this->model->paginate($items);
    }

}