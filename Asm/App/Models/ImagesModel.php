<?php

namespace App\Models;



class ImagesModel extends BaseModel{
    protected $name ="UserModel";
    public $tableName = 'images';

    public $table = "images";


    public function __construct(){
  
        parent::__construct();
        
    }

    public function getImages(){
        return $this->getAll()->fetch();
    }
    public function checkImage($image){
        return $this->select()->where('path', '=', "'$image'")->first();
    }
    public function edit($data, $id)
    {
        
        return $this->table('blog')->where('id', ' = ',  $id)->update($data);
    }


    public function getAllWithPaginate(int $limit = 10,int  $offset = 0){
        // return $this->select()->where('email', '=', $email)->first();
    }
    public function getwithid(int $id){
        return $this->select()->where('product_id', '=', $id)->first();
    }
    public function create(array $data){
        return $this->insert($this->table,$data);
        
    }
      
}