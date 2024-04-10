<?php
use App\Core\Sessions;

?>
<div class="content-wrapper">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cập nhật người dùng</h3>
        </div>
        <form method="post" action="/?url=AccountController/editAccount/<?= $data['id'] ?>"
            enctype="multipart/form-data" id="" class="">
            <div class="card-body">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email"
                        class="error" value="<?= $data['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Password" fdprocessedid="3t5w0s" aria-invalid="false"
                        value="<?= $data['password'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="username">Họ và tên</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" class="error"
                        value="<?= $data['name'] ?>" required>

                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter address" name="address"
                        class="error" value="<?= $data['address'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="number" class="form-control" id="phone" placeholder="Enter phone" name="phone"
                        class="error" value="<?= $data['phone'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="option" class="form-control" required>
                        <?php
                        if ($data['status'] == 1) {
                            ?>
                            <option value="1">Hiện</option>
                            <option value="0">Ẩn</option>
                            <?php
                        } else {
                            ?>
                            <option value="0">Ẩn</option>
                            <option value="1">Hiện</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Chức năng</label>
                    <select name="role" class="form-control" required>
                    <?php
                        if ($data['role'] == 2) {
                            ?>
                            <option value="2">Nhân viên</option>
                            <option value="0">Người dùng</option>
                            <?php
                        } else {
                            ?>
                            <option value="0">Người dùng</option>
                            <option value="2">Nhân viên</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh người dùng</label>
                    <input name="image" type="file" class="form-control"/>
                    <input type="text" name="image_old" value="<?php echo $data['image']; ?>">
                    <img src="<?php echo PUBLIC_URL . $data['image'] ?>" class="img-thumbnail w-25 h-25" alt="...">

                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit" name="updateAccount">Cập nhật</button>
            </div>
        </form>
    </div>
</div>