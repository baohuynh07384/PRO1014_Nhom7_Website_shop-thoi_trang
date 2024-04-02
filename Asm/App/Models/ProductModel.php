<?php

namespace App\Models;



class ProductModel extends BaseModel{
    protected $name ="UserModel";
    public $tableName = 'products';

    public $table = "products";
<<<<<<< HEAD
    
    public $product_id = null;
=======


>>>>>>> db94819a99d81f6b2b4d5d6c1bb71fe1a4bb91f5
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
        $insertResult = $this->insert($this->table, $data);
        var_dump($insertResult);
        if($insertResult) {
            $this->product_id = $this->getInsertLastId();
            var_dump( $this->product_id);
            return $this->product_id;
        } else {
            return false;
        }
    }
    public function getidpro(){
        return $this->select('id')->fetch();
    }
}
