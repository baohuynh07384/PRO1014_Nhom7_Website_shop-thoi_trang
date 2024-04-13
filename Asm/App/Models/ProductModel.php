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

    public function getProductID($id){
        return $this->select(' images.id as idimg, products.id,products.categories_id as cateId, products.status, products.create_at, path, products.name as proName, description, price, quantity, categories.name as cateName')->join('categories', 'categories.id = products.categories_id')->join('images', 'images.product_id = products.id')->where('products.status', ' = ',  '1')->where('products.id' , '=', $id)->fetch();
    }
    public function checkimageexit(string $image){
        return $this->select('thumbnail')->where('thumbnail', '=', $image)->first();
    }
    public function edit($data, $id)
    {
        
        return $this->table('products')->where('id', ' = ',  $id)->update($data);
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

    public function countProducts()
    {
        $data = $this->select('COUNT(products.id) AS products')->table('products')->first();
       
        if ($data) {
            return $data['products']; 
        } else {
            return 0; 
        }
        
    }

    public function productGetKeyword($value){
        return $this
        ->select(' products.id, products.status, products.create_at, products.name as proName, description, price, quantity, categories.name as cateName')
        ->join('categories', 'categories.id = products.categories_id')
        ->where('products.status', ' = ',  '1')
        ->orderBy('products.name',  $value)
        ->fetch();
    }

    public function productGetPrice($value){
        return $this
        ->select(' products.id, products.status, products.create_at, products.name as proName, description, price, quantity, categories.name as cateName')
        ->join('categories', 'categories.id = products.categories_id')
        ->where('products.status', ' = ',  '1')
        ->orderBy('price',  $value)
        ->fetch();
    }

    public function getProductCate($id){
        return $this
        ->select(' products.id, products.status, products.create_at, products.name as proName, description, price, quantity, categories.name as cateName')
        ->join('categories', 'categories.id = products.categories_id')
        ->where('products.status', ' = ',  '1')
        ->where('products.categories_id', '=', $id)
        ->fetch();
    }
}
