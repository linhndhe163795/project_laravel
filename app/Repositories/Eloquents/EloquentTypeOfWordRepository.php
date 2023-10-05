<?php

namespace App\Repositories\Eloquents;

use App\Contracts\Repositories\TypeOfWorkRepository;
use App\Models\Type_Of_Work;

class EloquentTypeOfWordRepository extends EloquentBaseRepository implements TypeOfWorkRepository
{
    protected $model;

    public function __construct(Type_Of_Work $model)
    {
        $this->model = $model;
    }

    public function all()
    {
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