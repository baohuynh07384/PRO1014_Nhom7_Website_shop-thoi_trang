<?php 
    use App\Core\Sessions;
    use App\Controllers\ClientHomeController;
?>
<?php include "header.php" ?>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-3" id="aside">
                <div class="aside">
                    <ul>
                        <li class="mb-3" style="margin-bottom: 1rem;"><a href="/?url=ClientHomeController/showAccount">Thông tin tài khoản</a></li>
                        <li class="mb-3" style="margin-bottom: 1rem;"><a href="/?url=ClientHomeController/showUpdateAccount">Cập nhật người dùng</a></li>
                        <li class="mb-3" style="margin-bottom: 1rem;"><a href="/?url=ClientHomeController/changePassAccount">Đổi mật khẩu</a></li>
                        <li class="mb-3" style="margin-bottom: 1rem;"><a href="/?url=ClientHomeController/orderPage">Lịch sử đơn hàng</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-7">
                <div class="section-title">
                    <h3 class="title">Cập nhật người dùng</h3>
                </div>
                <img src="<?= PUBLIC_URL . $data["image"] ?>" alt="..." class="img-thumbnail" width="100" height="100">
               <form action="/?url=ClientHomeController/updateAccount" enctype="multipart/form-data" method="POST" id="updateAccountForm">
               <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id']; ?>">
               <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                        class="error" value="<?= $data['name'] ?>" >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email"
                        class="error" value="<?= $data['email'] ?>" >
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter address" name="address"
                        class="error" value="<?= $data['address'] ?>" >
                </div>
                <div class="form-group">
                    <label for="">Ảnh đại diện</label>
                    <input name="image" type="file"  class="form-control"/>
                    <input type="hidden" name="image_old" value="<?php echo $data['image']; ?>">
                   
                </div>                
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="number" class="form-control" id="phone" placeholder="Enter phone" name="phone"
                        class="error" value="<?= $data['phone'] ?>" >       
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-primary" name="save">Lưu</button>
                </div>
               </form>
            </div>
        </div>
</section>

<?php include "footer.php" ?>