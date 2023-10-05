<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'm_teams';
    public $timestamps = false;
    protected $fillable = [
        'name','ins_id','upd_id','del_flag','ins_datetime','upd_datetime'
    ];
    private int $id;
    private int $name;
    private int $ins_id;
    private int $upd_id;
    private int $ins_datetime;
    private int $upd_datetime;
    private int $del_flag;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of ins_id
     */ 
    public function getIns_id()
    {
        return $this->ins_id;
    }

    /**
     * Set the value of ins_id
     *
     * @return  self
     */ 
    public function setIns_id($ins_id)
    {
        $this->ins_id = $ins_id;

        return $this;
    }

    /**
     * Get the value of upd_id
     */ 
    public function getUpd_id()
    {
        return $this->upd_id;
    }

    /**
     * Set the value of upd_id
     *
     * @return  self
     */ 
    public function setUpd_id($upd_id)
    {
        $this->upd_id = $upd_id;

        return $this;
    }

    /**
     * Get the value of ins_datetime
     */ 
    public function getIns_datetime()
    {
        return $this->ins_datetime;
    }

    /**
     * Set the value of ins_datetime
     *
     * @return  self
     */ 
    public function setIns_datetime($ins_datetime)
    {
        $this->ins_datetime = $ins_datetime;

        return $this;
    }

    /**
     * Get the value of upd_datetime
     */ 
    public function getUpd_datetime()
    {
        return $this->upd_datetime;
    }

    /**
     * Set the value of upd_datetime
     *
     * @return  self
     */ 
    public function setUpd_datetime($upd_datetime)
    {
        $this->upd_datetime = $upd_datetime;

        return $this;
    }

    /**
     * Get the value of del_flag
     */ 
    public function getDel_flag()
    {
        return $this->del_flag;
    }

    /**
     * Set the value of del_flag
     *
     * @return  self
     */ 
    public function setDel_flag($del_flag)
    {
        $this->del_flag = $del_flag;

        return $this;
    }
}
