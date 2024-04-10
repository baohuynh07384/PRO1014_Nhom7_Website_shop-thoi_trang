<?php

use App\Controllers\BlogController;
use App\Core\Sessions;

?>
<div class="content-wrapper">
    <form action="?url=BlogController/update/<?= $datablog['id'] ?>" enctype="multipart/form-data" method="post" class="container-fluid" id="editBlogForm">
        <div class="card card-primary mb-0">
            <div class="card-header">
<<<<<<< HEAD
                <h3 class="card-title">Cập nhật bài viết</h3>
=======
                <h3 class="card-title">Thêm bài viết</h3>
>>>>>>> db94819a99d81f6b2b4d5d6c1bb71fe1a4bb91f5
            </div>
            <div class="card-body row">

                <div class="left col-8">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1">Tiêu đề</label>
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên tiêu đề" value="<?= $datablog['title']  ?>">
                            <?php if (isset($_SESSION['tiêu đề'])) : ?>
                                <p style="color: red; margin: 0px;">
                                    <?php echo Sessions::display_session('tiêu đề'); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-6">
                            <label for="quantity">Tác giả</label>
                            <input type="text" name="author" class="form-control" placeholder="Nhập tác giả" value="<?= $datablog['author']  ?>">
                            <?php if (isset($_SESSION['tác giả'])) : ?>
                                <p style="color: red; margin: 0px;">
                                    <?php echo Sessions::display_session('tác giả'); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Thể loại</label>
                            <input type="text" name="new_type" class="form-control" placeholder="Nhập loại tin" value="<?= $datablog['new_type']  ?>">
                            <?php if (isset($_SESSION['thể loại'])) : ?>
                                <p style="color: red; margin: 0px;">
                                    <?php echo Sessions::display_session('thể loại'); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-6">
                            <label for="status">Trạng thái</label>
                            <select name="status" class="form-control">
                                <?php
                                if ($datablog['status'] == '1') {
                                    echo '<option value="1">Hiện</option>
                                <option value="0">Ẩn</option>';
                                } else {
                                    echo '<option value="0">Ẩn</option>
                                <option value="1">Hiện</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nội dung</label>
                        <textarea id="summernote" name="content" cols="30" rows="10">
                            <?= $datablog['content']; ?>
                    </textarea>
                        <?php if (isset($_SESSION['nội dung'])) : ?>
                            <p style="color: red; margin: 0px;">
                                <?php echo Sessions::display_session('nội dung'); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="right col-4">
                    <div class="form-group">
                        <label for="exampleInputFile">Ảnh đại diện</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="hidden" name="thumbnail_old" value="<?php echo $datablog['thumbnail']; ?>">
                                <input type="file" class="custom-file-input" id="customFile" name="thumbnail"  onchange="updateFileName(this)">
                                <label class="custom-file-label" for="customFile">Chọn hình ảnh</label>
                            </div>
                           
                        </div>
                        <img src="<?php echo PUBLIC_URL . $datablog['thumbnail'] ?>" class="img-fluid" alt="..">
                        <?php if (isset($_SESSION['ảnh'])) : ?>
                            <p style="color: red; margin: 0px;">
                                <?php echo Sessions::display_session('ảnh'); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="edit" class="btn btn-primary">Tải lên</button>
            </div>
        </div>
    </form>
</div>