<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
<div class="content-wrapper">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cập nhật người dùng</h3>
        </div>
        <form method="post" action="/?url=AccountController/editAccount/<?php echo $data['id'] ?>" enctype="multipart/form-data" id="" class="">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Tên người dùng</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required class="error" value="<?php echo $data['username'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required class="error" value="<?php echo $data['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="text" class="form-control" id="password" placeholder="Enter password" name="password" required class="error" value="<?php echo $data['password'] ?>">
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" required class="error" value="<?php echo $data['address'] ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="number" class="form-control" id="phone" placeholder="Enter phone" name="phone" required class="error" value="<?php echo $data['phone'] ?>">
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="option" class="form-control">
                        <?php
                        if ($data['status'] == '1') {
                            echo '<option value="1">Hiện</option>
                                <option value="0">Ẩn</option>';
                        } else {
                            echo '<option value="0">Ẩn</option>
                                <option value="1">Hiện</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Chức năng</label>
                    <select name="role" class="form-control">
                        <?php
                        if ($data['role'] == '1') {
                            echo '<option value="1">Admin</option>
                            <option value="2">Nhân viên</option>
                                <option value="0">User</option>';
                        }else if($data['role'] == '2') {
                            echo '<option value="2">Nhân viên</option>
                            <option value="1">Admin</option>
                            <option value="0">User</option>';
                        }
                         else {
                            echo '<option value="0">User</option>
                                <option value="1">Admin</option>
                                <option value="2">Nhân viên</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh người dùng</label>
                    <input name="image" type="file" class="form-control" />
                    <input type="hidden" name="image_old" value="<?php echo $data['image']; ?>">
                    <img src="<?php echo PUBLIC_URL . $data['image'] ?>" class="img-thumbnail w-25 h-25" alt="...">
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit" name="updateAccount">Cập nhật</button>
            </div>
        </form>
    </div>
</div>