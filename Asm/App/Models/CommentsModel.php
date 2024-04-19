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

  
}