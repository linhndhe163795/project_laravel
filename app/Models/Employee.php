<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    protected $table = 'm_employees';
    protected $fillable = [
        'team_id','email','first_name','last_name',
        'gender','birthday','avatar','salary','position',
        'status', 'type_of_word'
    ];
    private $id;
    private $team_id;
    private $email;
    private $first_name;
    private $last_name;
    private $password;
    private $gender;
    private $birthday;
    private $avatar;
    private $salary;
    private $position;
    private $status;
    private $type_of_work;
    private $ins_id;
    private $upd_id;
    private $ins_datetime;
    private $upd_datetime;
    private $del_flag;

   

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
     * Get the value of team_id
     */ 
    public function getTeam_id()
    {
        return $this->team_id;
    }

    /**
     * Set the value of team_id
     *
     * @return  self
     */ 
    public function setTeam_id($team_id)
    {
        $this->team_id = $team_id;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of first_name
     */ 
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */ 
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of last_name
     */ 
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */ 
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */ 
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of birthday
     */ 
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set the value of birthday
     *
     * @return  self
     */ 
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get the value of avatar
     */ 
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar
     *
     * @return  self
     */ 
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get the value of salary
     */ 
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set the value of salary
     *
     * @return  self
     */ 
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get the value of position
     */ 
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set the value of position
     *
     * @return  self
     */ 
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

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
}
