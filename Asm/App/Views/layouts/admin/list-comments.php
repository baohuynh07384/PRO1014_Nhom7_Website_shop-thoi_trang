<?php

use App\Models\CategoriesModel;


if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
    echo $_SESSION['success'];
}

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách bình luận</h1>
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
                                        <th scope="col">Ảnh sản phẩm</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //    var_dump($data);die;
                                    foreach ($data['comments'] as $item) :
                                        foreach ($data['images'] as $image) {

                                            if ($image['product_id'] == $item['id']) {

                                                break;
                                            }
                                        }
                                    ?>
                                        <tr class="">
                                            <td scope="row"><?= $item['id']  ?></td>
                                            <td>
                                                <img src="<?= PUBLIC_URL . $image['path'] ?>" alt="" width="100" height="100">
                                            </td>
                                            <td><?= $item['name']  ?></td>
                                            <td><?= $item['total_comments'] ?></td>
                                            <td>
                                                <div class="row">
                                                    <form action="/?url=CommentsController/listDetailComments/<?= $item['id'] ?>" method="post">
                                                        <input type="hidden" name="id_update" value="<?= $item['id'] ?>">
                                                        <button type="submit" name="update" class="btn btn-outline-primary btn-sm " style="margin-left: 5rem;"><i class="fa-solid fa-circle-info "></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Delete-modal -->
  

    <!-- /.content -->
</div>