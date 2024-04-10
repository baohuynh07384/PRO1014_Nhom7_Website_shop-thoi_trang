<?php use App\Core\Sessions;
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
                    <h3 class="title">Thông tin người dùng</h3>
                </div>
                <img src="<?= PUBLIC_URL . $data["image"] ?>" alt="..." class="img-thumbnail" width="100" height="100">
                <div class="info" style="margin-top: 2rem">
                    <p><strong>Họ và tên : </strong><?= $data['name']  ?></p>
                    <p><strong>Email : </strong><?= $data['email']  ?></p>
                    <p><strong>Địa chỉ : </strong><?= $data['address']  ?></p>
                    <p><strong>Số điện thoại : </strong><?= $data['phone']  ?></p>
                </div>
               
            </div>
        </div>
</section>

<?php include "footer.php" ?>