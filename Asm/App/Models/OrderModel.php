<?php

namespace App\Models;



class OrderModel extends BaseModel{
    protected $name ="OrderModel";
    public $tableName = '`order`';

    public $table = "`order`";
    
    public $order_id = null;

    public function __construct(){

        parent::__construct();

    }
    public function getCart($id){
        return $this->select('products.id, user_id, order_detail.price, order_detail.quantity, order_detail.size, total, products.name')->join('products', 'products.id = order.product_id')->join('order_detail', 'order.id = order_detail.order_id')->where('user_id', '=', $id)->fetch();
    }
    public function getAllWithPaginate(int $limit = 10,int  $offset = 0){
        // return $this->select()->where('email', '=', $email)->first();
    }
    public function create(array $data){
        $insertResult = $this->insert($this->table, $data);
        if($insertResult) {
            $this->order_id = $this->getInsertLastId();
            return $this->order_id;
        } else {
            return false;
        }
    }
    public function insertOrderdetial(array $data){
        return $this->insert('order_detail',$data);
    }
    public function getidpro(){
        return $this->select('id')->fetch();
    }
}