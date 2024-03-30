<?php

namespace App\Models;



class UserModel extends BaseModel{
    protected $name ="UserModel";
    public $tableName = 'users';

    public $table = "users";


    public function __construct(){
  
        parent::__construct();
    }

    public function getAllUser(){
        return $this->getAll()->get();
    }

    public function getOneUser($id)
    {
        return $this->select()->where('id', '=', $id)->first();
    }

    public function updateUser($data, $id)
    {
        
        return $this->table('users')->where('id', ' = ',  $id)->update($data);
    }

    public function checkRole($role){
        return $this->select()->where('role', '=', $role)->first();
    }
    public function deleteUser($id)
    {
        return $this->table('users')->where('id', '=', $id)->delete();
    }

    public function checkUserExist($username, $email){
        return $this->select()->Where('username', '=', $username)->orWhere('email','=',$email) ->first();
    }

    public function getAllWithPaginate(int $limit = 10,int  $offset = 0){
        // return $this->select()->where('email', '=', $email)->first();
    }

    public function registerUser( $data){
        // $tableName = $this->tableName;
        return $this->insert($this->table,$data);
        
    }
    public function checkLogin($username, $status = 1){
        return  $this->select()->where('status', '=', $status)->orwhere('username', '=', $username)->first();
    }
    
    public function create(int $id, $data){
        var_dump($this->tableName);
    }
}