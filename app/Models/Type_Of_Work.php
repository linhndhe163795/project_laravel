<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_Of_Work extends Model
{
    protected $table = "m_type_of_work";
    public $timestamps = false;
    private $id;
    private $type_of_work;
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    

    /**
     * Get the value of type_of_work
     */ 
    public function getType_of_work()
    {
        return $this->type_of_work;
    }

    /**
     * Set the value of type_of_work
     *
     * @return  self
     */ 
    public function setType_of_work($type_of_work)
    {
        $this->type_of_work = $type_of_work;

        return $this;
    }
}
