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
    public function insertdataorder($data){
        $insertResult = $this ->insert('`order`', $data);
        if($insertResult) {
            $this->order_id = $this->getInsertLastId();
            return $this->order_id;
        } else {
            return false;
        }
       
    }
    public function getorder(){
        return $this ->select('`order`.*, name, phone, email ')->table("`order`")->join('users','users.id = order.user_id')->fetch();
    }

    public function getorderdetail($id){
        return $this ->select('order_detail.*, `order`.user_id ')->table("`order`")->join('order_detail','order.id = order_detail.order_id')->where('order.user_id', '=', $id)->fetch();
    }
    public function insertdataorderdetail($data){
        return $this ->insert('`order_detail`', $data);
    }
    public function getcart($id){
        return $this->select('carts.*, products.id as idpro')->join('products','products.id = carts.product_id')->join('users','users.id = carts.user_id')->where('users.id','=', $id)->fetch();
    }
    public function getcartwithid($id){
        return $this->select()->where('id', '=', $id)->fetch();
    }
    public function checkcart($id , $size, $user_id){
        
        return $this->select()->where('product_id', '=', $id)
                             ->where('size', '=', $size)
                             ->where('user_id', '=', $user_id)
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
        $data = $this->select('COUNT(id) AS carts')->table($this->table)->where('user_id', '=', $id)->first();
        if ($data) {
            return $data['carts'];
        } else {
            return 0;
        }
    }
    public function deletecart($id){
        return $this->table('carts')->where('id', '=', $id)->delete();
    }
    public function updateCartSubmit($data, $id){
        return $this->table($this->table)->where('id', '=', $id)->update($data);
    }
}