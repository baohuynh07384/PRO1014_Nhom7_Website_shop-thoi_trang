<?php

namespace App\Models;



class BlogModel extends BaseModel{
    protected $name ="UserModel";
    public $tableName = 'blog';

    public $table = "blog";


    public function __construct(){
  
        parent::__construct();
        
    }

    public function getlistblog(){
        return $this->getAll()->fetch();
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
        return $this->insert($this->table,$data);
        
    }
    public function deleteBlog($id)
    {
        return $this->table('blog')->where('id', '=', $id)->delete();
    }
    public function countBlogs()
    {
        $data = $this->select('COUNT(blog.id) AS blog')->table('blog')->first();
       
        if ($data) {
            return $data['blog']; 
        } else {
            return 0; 
        }
        
    }
   
}