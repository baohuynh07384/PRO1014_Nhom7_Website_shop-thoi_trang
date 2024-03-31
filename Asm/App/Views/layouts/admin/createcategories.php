<?php

use App\Core\Sessions;

?>
<div class="content-wrapper">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Thêm danh mục</h3>
        </div>
        <form method="post" action="/?url=CategoriesController/addCategory" enctype="multipart/form-data" class="dropzone" id="my-awesome-dropzone">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Tên danh mục</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required class="error">
                    <?php if (isset($_SESSION['name'])) : ?>
                        <p style="color: red;">
                            <?php echo Sessions::display_session('name'); ?>
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
                    <?php if (isset($_SESSION['option'])) : ?>
                        <p style="color: red;">
                            <?php echo Sessions::display_session('option'); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh danh mục</label>
                    <input name="image" type="file" multiple  class="form-control" required/>
                    <?php if (isset($_SESSION['image'])) : ?>
                        <p style="color: red;">
                            <?php echo Sessions::display_session('image'); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary toastrDefaultSuccess" type="submit" name="submit" id="">Thêm</button>
            </div>
        </form>
    </div>
</div>
