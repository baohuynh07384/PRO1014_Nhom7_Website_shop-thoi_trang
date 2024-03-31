<div class="content-wrapper">
    <form method="post" enctype="multipart/form-data" class="container-fluid">
        <div class="card card-primary mb-0">
            <div class="card-header">
                <h3 class="card-title">Thêm sản phẩm</h3>
            </div>
            <div class="card-body row">
                <div class="right col-xl-8">
                    <div class="form-group">
                        <!-- <input type="hidden" name="product_id" id="" value=""> -->
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm" value="">
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="price">Giá</label>
                            <input type="number" name="price" min="1" class="form-control" id="exampleInputPassword1" placeholder="Nhập giá" value="">

                        </div>
                        <div class="form-group col-6">
                            <label for="quantity">Số lượng</label>
                            <input type="number" name="qty" min="1" class="form-control" id="exampleInputPassword1" placeholder="Nhập số lượng" value="">

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Danh mục</label>
                            <select name="category" class="form-control select2" style="width: 100%;">
                                <option selected="selected">Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="status">Trạng thái</label>
                            <select name="status" class="form-control">
                                <option value="Hiện">Hiện</option>
                                <option value="Ẩn">Ẩn</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">mô tả</label>
                        <textarea id="summernote" name="description"></textarea>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="form-group">
                        <label for="exampleInputFile">Hình ảnh</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image[]" class="custom-file-input" id="exampleInputFile" accept="images/*" multiple>
                                <label class="custom-file-label" for="exampleInputFile">Chọn hình ảnh</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-primary">Tải lên</button>
            </div>
        </div>
    </form>
</div>