<?php use App\Core\Sessions; ?>
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
                    <h3 class="title">Đổi mật khẩu</h3>
                </div>
               <form action="?url=ClientHomeController/changePass" method="POST">
               <div class="form-group">
                    <label for="old_pass">Mật khẩu cũ</label>
                    <input type="text" class="form-control" id="old_pass" placeholder="Nhập mật khẩu cũ" name="old_pass"
                        class="error" value="" >
                        <?php if (isset($_SESSION['mật khẩu cũ'])) : ?>
                        <p style="color: red;">
                            <?php echo Sessions::display_session('mật khẩu cũ'); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="new_pass">Mật khẩu mới</label>
                    <input type="text" class="form-control" id="new_pass" placeholder="Nhập mật khẩu mới " name="new_pass"
                        class="error" value="" >
                        <?php if (isset($_SESSION['mật khẩu mới'])) : ?>
                        <p style="color: red;">
                            <?php echo Sessions::display_session('mật khẩu mới'); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="repass">Xác nhận mật khẩu mới</label>
                    <input type="address" class="form-control" id="repass" placeholder="Xác nhận mật khẩu mới" name="repass"
                        class="error" value="" >
                        <?php if (isset($_SESSION['xác nhận mật khẩu'])) : ?>
                        <p style="color: red;">
                            <?php echo Sessions::display_session('xác nhận mật khẩu'); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-primary" name="save">Thay đổi</button>
                </div>
               </form>
            </div>
        </div>
</section>

<?php include "footer.php" ?>