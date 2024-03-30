
<div class="content-wrapper">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cập nhật danh mục</h3>
        </div>
        <form method="post" action="/?url=CategoriesController/editCate/<?php echo $data['id'] ?>" enctype="multipart/form-data" id="updateValidateForm">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Tên danh mục</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $data['name']; ?>">
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
                    <label for="exampleInputFile">Ảnh danh mục</label>
                    <input name="image" type="file" class="form-control" />
                    <input type="hidden" name="image_old" value="<?php echo $data['image']; ?>">
                    <img src="<?php echo PUBLIC_URL . $data['image'] ?>" class="img-thumbnail w-25 h-25" alt="...">
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit" name="updateCate">Cập nhật</button>
            </div>
        </form>
    </div>
</div>