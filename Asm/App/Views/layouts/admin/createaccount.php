<div class="content-wrapper">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tạo tài khoản</h3>
        </div>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Tên người dùng</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="username">
                </div>
                <div class="form-group">
                    <label for="name">Mật khẩu</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter password" name="password">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="name">Role</label>
                    <select class="form-control" id="name" placeholder="Enter role" name="role">
                        <option value=""></option>
                        <option value="admin">admin</option>
                        <option value="user">user</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="option" class="form-control">
                        <option value=""></option>
                        <option value="Hiện">Hiện</option>
                        <option value="Ẩn">Ẩn</option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit" name="submit">Tải lên</button>
            </div>
        </form>
    </div>
</div>