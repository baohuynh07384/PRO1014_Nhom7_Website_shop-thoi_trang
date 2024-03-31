<?php

namespace App\Models;



class ProductModel extends BaseModel{
    protected $name ="UserModel";
    public $tableName = 'products';

    public $table = "products";


    public function __construct(){
  
        parent::__construct();
        
    }

    public function getlistblog(){
        return $this->getAll()->get();
    }

    public function checkimageexit(string $image){
        return $this->select('thumbnail')->where('thumbnail', '=', $image)->first();
    }
    public function edit($data, $id)
    {
        
        return $this->table('blog')->where('id', ' = ',  $id)->update($data);
    }
    public function getAllWithPaginate(int $limit = 10,int  $offset = 0){
        // return $this->select()->where('email', '=', $email)->first();
    }
   
    public function getwithid(int $id){
        return $this->select()->where('id', '=', $id)->first();
    }
    public function create(array $data){
        return $this->insert($this->table,$data);
        
    }
   
}