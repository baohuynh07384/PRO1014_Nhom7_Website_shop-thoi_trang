<?php

namespace App\Models;



class CategoriesModel extends BaseModel
{
    protected $name = "CategoriesModel";
    public $tableName = 'categories';

    public $table = "categories";


    public function __construct()
    {

        parent::__construct();
    }


    public function getAllWithPaginate(int $number = 10, int $offset = 0)
    {
        $page = ($number - 1) * $offset;

        return $this->get($offset, $page);
    }

    public function create( array $data)
    {

    }

    public function createCate($data)
    {
        return $this->insert($this->table, $data);
    }

    public function getListCate()
    {
        return $this->getAll()->fetch();
    }

    public function deleteCate($id)
    {
        return $this->table('categories')->where('id', '=', $id)->delete();
    }
    public function getOneCate($id)
    {
        return $this->select()->where('id', '=', $id)->first();
    }

    public function updateCate($data, $id)
    {
        
        return $this->table('categories')->where('id', ' = ',  $id)->update($data);
    }

    public function findCate($field, $value)
    {
        $result = $this->table('categories')->where($field, ' = ', $value)->first();
        return $result;
    }

    public function countCategories()
    {
        $data = $this->select('COUNT(categories.id) AS categories')->table('categories')->first();
       
        if ($data) {
            return $data['categories']; 
        } else {
            return 0; 
        }
        
    }

}