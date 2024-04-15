<?php


$data = json_decode(file_get_contents("php://input"), true);
    
$id = $data['id'];





$pdo = new PDO("mysql:host=localhost;dbname=php2", "root", "mysql");

$query = "UPDATE `order` SET  province_id = :province_id";

// Thực thi truy vấn
$statement = $pdo->prepare($query);
$statement->execute(array(
    ":province_id" => $id 

));

$districts = $address->getDistrictsByProvinceId($id);
foreach($districts as $district){

}
$query = "UPDATE `order` SET  district_id = :district_id";

// Thực thi truy vấn
$statement = $pdo->prepare($query);
$statement->execute(array(
    ":district_id" => $id 

));

// Kiểm tra xem truy vấn đã được thực thi thành công hay không
if ($statement->rowCount() > 0) {
    echo "Dữ liệu đã được cập nhật thành công.";
} else {
    echo "Đã xảy ra lỗi khi cập nhật dữ liệu.";
}


