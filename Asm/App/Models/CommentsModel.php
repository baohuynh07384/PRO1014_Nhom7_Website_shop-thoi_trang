<?php

namespace App\Models;

class CommentsModel extends BaseModel{

    protected $name = "CommentsModel";
    public $tableName = 'comments';

    public $table = "comments";

    public function getAllWithPaginate(int $number = 10, int $offset = 0)
    {

    }

    public function create( array $data)
    {

    }

    public function getAllComments($id){
        $data = $this->select('name,content,comments.id, comments.create_at')->table('comments')->join('users', 'comments.user_id = users.id')->where('product_id', '=', $id)->fetch();
        return $data;
    }

  
}