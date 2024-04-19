<?php

namespace App\Models;

class CommentsModel extends BaseModel{

    protected $name = "CommentsModel";
    public $tableName = 'comments';

    public $table = "comments";

    public function getAllWithPaginate(int $number = 10, int $offset = 0)
    {

    }

    public function updateComment($data, $id)
    {
        return $this->table($this->table)->where('id', ' = ',  $id)->update($data);
    }
    
    public function getComment($id)
    {
        return $this->select()->table('comments')->where('id', '=', $id)->first();
    }
    public function create( array $data)
    {
       return $this->insert($this->table, $data);
    }
    public function deleteComment($id)
    {
        return $this->table($this->table)->where('id', '=', $id)->delete();
    }
    public function getAllComments($id){
        $data = $this->select('name, comments.*')->table('comments')->join('users', 'comments.user_id = users.id')->where('product_id', '=', $id)->fetch();
        return $data;
    }

    public function getAll(){
        return $this
            ->select('products.id, products.name, COUNT(comments.id) AS total_comments')
            ->join('products', 'comments.product_id = products.id')
            ->groupBy('products.id')
            ->fetch();
    }

    public function getCommentByID($id){
        return $this
        ->select('products.name as proname, users.name as username, comments.content, comments.create_at, comments.id as comment_id')
        ->join('products', 'comments.product_id = products.id')
        ->join('users', 'users.id = comments.user_id')
        ->where('comments.product_id','=', $id)
        ->fetch();
    }

    public function countComment()
    {
        $data = $this->select('COUNT(comments.id) AS comments')->table('comments')->first();
       
        if ($data) {
            return $data['comments']; 
        } else {
            return 0; 
        }
        
    }
    
  
}