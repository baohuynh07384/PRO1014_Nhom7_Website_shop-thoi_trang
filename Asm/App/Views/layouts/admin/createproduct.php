<?php

use App\Core\Sessions;
use App\Controllers\ProductController;
?>
<div class="content-wrapper">
    <form method="post" enctype="multipart/form-data" class="container-fluid" action="/?url=ProductController/create">
        <div class="card card-primary mb-0">
            <div class="card-header">
                <h3 class="card-title">Thêm sản phẩm</h3>
            </div>
            <div class="card-body row">
                <div class="right col-xl-7">
                    <div class="form-group">
                        <!-- <input type="hidden" name="product_id" id="" value=""> -->
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm" value="">
                        <?php if (isset($_SESSION['tên sản phẩm'])) : ?>
                            <p style="color: red; margin: 0px;">
                                <?php echo Sessions::display_session('tên sản phẩm'); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="price">Giá</label>
                            <input type="number" name="price" min="1" class="form-control" id="exampleInputPassword1" placeholder="Nhập giá" value="">
                            <?php if (isset($_SESSION['giá'])) : ?>
                                <p style="color: red; margin: 0px;">
                                    <?php echo Sessions::display_session('giá'); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-6">
                            <label for="quantity">Số lượng</label>
                            <input type="number" name="qty" min="1" class="form-control" id="exampleInputPassword1" placeholder="Nhập số lượng" value="">
                            <?php if (isset($_SESSION['số lượng'])) : ?>
                                <p style="color: red; margin: 0px;">
                                    <?php echo Sessions::display_session('số lượng'); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Danh mục</label>
                            <select name="category" class="form-control select2" style="width: 100%;">
                            <option selected="selected" >Chọn danh mục</option>
                            <?php foreach ($data as $items):?>
                                <option value="<?= $items['id'] ?>"><?= $items['name'] ?></option>
                            <?php endforeach; ?>    
                            </select>
                            <?php if (isset($_SESSION['danh mục'])) : ?>
                                <p style="color: red; margin: 0px;">
                                    <?php echo Sessions::display_session('danh mục'); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-6">
                            <label for="status">Trạng thái</label>
                            <select name="status" class="form-control">
                                <option value="1">Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>
                            <?php if (isset($_SESSION['trạng thái'])) : ?>
                                <p style="color: red; margin: 0px;">
                                    <?php echo Sessions::display_session('trạng thái'); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">mô tả</label>
                        <textarea id="summernote" name="description"></textarea>
                        <?php if (isset($_SESSION['mô tả'])) : ?>
                            <p style="color: red; margin: 0px;">
                                <?php echo Sessions::display_session('mô tả'); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="form-group">
                        <label for="exampleInputFile">Hình ảnh</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image[]" class="custom-file-input" id="exampleInputFile" accept="images/*" multiple>
                                <label class="custom-file-label" for="exampleInputFile">Chọn hình ảnh</label>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['ảnh'])) : ?>
                        <p style="color: red; margin: 0px;">
                            <?php echo Sessions::display_session('ảnh'); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="upload" class="btn btn-primary">Tải lên</button>
            </div>
        </div>
    </form>
</div>