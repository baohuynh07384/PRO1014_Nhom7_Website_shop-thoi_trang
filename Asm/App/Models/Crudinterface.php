<?php

namespace App\Models;

// bảng thiết kế cho phương thức
interface CrudInterface{
    /**
     * phương thức getAll() dùng để lấy tất cả records
     */
    public function getAll();

    /**
     * phương thức getOne() dùng để lấy một records
     * @param int $id
     * @return array $record
     */
    public function getOne(int $id);

    /**
     * phương thức create() dùng để truyền dữ liệu vào bảng trên database
     * @param int $id
     * @return mixed
     */
    public function create(array $data);

    /**
     * phương thức delete() dùng để xóa dữ liệu 
     * @param array $data
     */
    public function delete();

    /**
     * phương thức update() dùng để cập nhập dữ liệu
     * @param int $id
     */
    public function update( array $data);
}