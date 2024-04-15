<?php

namespace App\Models;



class CartsModel extends BaseModel{
    protected $name ="CartsModel";
    public $tableName = 'carts';

    public $table = "carts";
    
    public $order_id = null;

    public function __construct(){

        parent::__construct();

    }

    public function getAllWithPaginate(int $limit = 10,int  $offset = 0){
        // return $this->select()->where('email', '=', $email)->first();
    }
    public function create($data){
        return $this->insert($this->table, $data);
    }
    public function getcart($id){
        return $this->select('carts.*, products.name')->join('products','products.id = carts.product_id')->join('users','users.id = carts.user_id')->where('users.id','=', $id)->fetch();
    }
    public function checkcart($id , $size){
        return $this->select()->where('product_id', '=', $id)
                             ->where('size', '=', $size)
                             ->first();
    }
    public function updatecart(array $data, $id, $size){
        return $this->table($this->table)
                    ->where('product_id', '=', $id)
                    ->where('size', '=', $size)
                    ->update($data);
    }
    public function countCart($id)
    {
        $data = $this->select('COUNT(id) AS carts')->table($this->table)->where('user_id', '=', $id)->fist();
        if ($data) {
            return $data['carts'];
        } else {
            return 0;
        }
    }

}