<?php

namespace App\Models;



class ProductModel extends BaseModel{
    protected $name ="ProductModel";
    public $tableName = 'products';

    public $table = "products";
    
    public $product_id = null;

    public function __construct(){
  
        parent::__construct();
        
    }

    public function getAllProduct(){
        return $this->getAll()->fetch();
    }
    public function getProduct(){
        return $this->select(' products.id, products.status, products.create_at, products.name as proName, description, price, quantity, categories.name as cateName')->join('categories', 'categories.id = products.categories_id')->where('products.status', ' = ',  '1')->fetch();
    }
    public function getDetailProduct($id){
        return $this->select(' products.id, description, price, quantity, path, categories.name as cateName, products.name as proName')->join('images', 'images.product_id = products.id')->join('categories', 'categories.id = products.categories_id')->where('products.id', ' = ',  $id)->fetch();
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
        if($insertResult) {
            $this->product_id = $this->getInsertLastId();
            return $this->product_id;
        } else {
            return false;
        }
    }
    public function getidpro(){
        return $this->select('id')->fetch();
    }
}