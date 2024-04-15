<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách sản phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Mã số</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Tên danh mục</th>
                                        <th scope="col">Ngày tạo</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    foreach ($data['products'] as $items) :
                                        foreach ($data['images'] as $image) {

                                            if ($image['product_id'] == $items['id']) {

                                                break;
                                            }
                                        }

                                        $status = $items['status'] == 1 ? "Hiện" : "Ẩn";
                                    ?>
                                        <tr class="">
                                            <td scope="row"><?= $items['id'] ?></td>
                                            <td>
                                                <img src="<?= PUBLIC_URL . $image['path'] ?>" alt="" width="100" height="100">
                                            </td>
                                            <td><?= $items['proName'] ?></td>
                                            <td><?= $items['cateName'] ?></td>
                                            <td><?= $items['create_at'] ?></td>
                                            <td><?= $items['quantity'] ?></td>
                                            <td><?= $status ?></td>
                                            <td>
                                                <div class="row">
                                                    <form action="/?url=ProductController/UpdateProductPage/<?= $items['id'] ?>" method="post">
                                                        <button type="submit" name="update" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></button>
                                                    </form>
                                                    <button type="button" name="" value="<?= $items['id'] ?>" class="btn btn-outline-danger btn-sm deletebtn_pro" data-toggle="modal" data-target="#DeleteModalPro"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<div class="modal fade" id="DeleteModalPro">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thông báo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/?url=ProductController/delete/<?php echo $items['id'] ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="delete_id" id="" class="delete_id_pro">
                    <p>Bạn có chắc chắn muốn xóa ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="deletePro">Delete</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>