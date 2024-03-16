<div class="content-wrapper">
    <form method="post" enctype="multipart/form-data">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Thêm sản phẩm</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="hidden" name="product_id" id="" value="">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                        placeholder="Nhập tên sản phẩm" value="">
                </div>
                <div class="form-group">
                    <label for="price">Giá</label>
                    <input type="number" name="price" class="form-control" id="exampleInputPassword1"
                        placeholder="Nhập giá" value="">

                </div>
                <div class="form-group">
                    <label for="quantity">Số lượng</label>
                    <input type="number" name="qty" class="form-control" id="exampleInputPassword1"
                        placeholder="Nhập số lượng" value="">

                </div>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <Select name="cat_id" class="form-control">

                    </Select>
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="option" class="form-control">
                        <option value=""></option>
                        <option value="Hiện">Hiện</option>
                        <option value="Ẩn">Ẩn</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Hình ảnh</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image[]" class="custom-file-input" id="exampleInputFile"
                                accept="images/*" multiple>
                            <label class="custom-file-label" for="exampleInputFile">Chọn hình ảnh</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">mô tả</label>
                    <textarea type="text" name="description" rows="5" cols="40" class="form-control"
                        id="exampleInputPassword1"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-primary">Tải lên</button>
            </div>
        </div>
    </form>
</div>