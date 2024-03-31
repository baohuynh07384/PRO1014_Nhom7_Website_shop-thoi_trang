<?php

use App\Core\Sessions;

?>

<div class="content-wrapper">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tạo tài khoản</h3>
        </div>
        <form method="post" action="/?url=AccountController/addAccount" enctype="multipart/form-data" id="addAccountForm">
            <div class="card-body">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required >
                    <?php if (isset($_SESSION['email'])) : ?>
                        <p style="color: red;">
                            <?php echo Sessions::display_session('email'); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="text" class="form-control" id="password" placeholder="Enter password" name="password" required>
                    <?php if (isset($_SESSION['password'])) : ?>
                        <p style="color: red;">
                            <?php echo Sessions::display_session('password'); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                    <?php if (isset($_SESSION['name'])) : ?>
                        <p style="color: red;">
                            <?php echo Sessions::display_session('name'); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="name">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" required>
                    <?php if (isset($_SESSION['phone'])) : ?>
                        <p style="color: red;">
                            <?php echo Sessions::display_session('phone'); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="name">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" required>
                    <?php if (isset($_SESSION['address'])) : ?>
                        <p style="color: red;">
                            <?php echo Sessions::display_session('address'); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="name">Role</label>
                    <select class="form-control" id="role" placeholder="Enter role" name="role" required>
                        <option value="">Chọn chức năng</option>
                        <option value="2">Nhân viên</option>
                        <option value="0">Người dùng</option>
                    </select>
                    <?php if (isset($_SESSION['role'])) : ?>
                        <p style="color: red;">
                            <?php echo Sessions::display_session('role'); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="option" class="form-control">
                        <option value="">Chọn trạng thái</option>
                        <option value="1">Hiện</option>
                        <option value="0">Ẩn</option>
                    </select>
                    <?php if (isset($_SESSION['status'])) : ?>
                        <p style="color: red;">
                            <?php echo Sessions::display_session('status'); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh</label>
                    <input name="image" type="file" multiple  class="form-control"  required/>
                    <?php if (isset($_SESSION['image'])) : ?>
                        <p style="color: red;">
                            <?php echo Sessions::display_session('image'); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit" name="submit">Tải lên</button>
            </div>
        </form>
    </div>
</div>