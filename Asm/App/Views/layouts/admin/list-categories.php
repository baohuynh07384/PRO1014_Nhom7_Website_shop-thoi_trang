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
          <h1>Danh sách danh mục</h1>
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
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($data as $item):
                    $status = $item['status'] == 1 ? "Hiện" : "Ẩn";
                    ?>

                    <tr class="cate">
                      <td scope="row"><?= $item['id'] ?></td>
                      <td>
                        <img src="<?= PUBLIC_URL . $item['image'] ?>" alt="" width="100" height="100">
                      </td>
                      <td><?= $item['name'] ?></td>
                      <td><?= $item['create_at'] ?></td>
                      <td><?= $status ?></td>
                      <td>
                        <div class="row">
                          <form action="/?url=CategoriesController/edit/<?= $item['id'] ?>" method="post">
                            <input type="hidden" name="id_update" value="<?= $item['id'] ?>">
                            <button type="submit" name="update" class="btn btn-outline-primary btn-sm"><i
                                class="fa fa-edit"></i></button>
                          </form>
                          <button type="button" name="" value="<?= $item['id'] ?>"
                            class="btn btn-outline-danger btn-sm deletebtn" data-toggle="modal"
                            data-target="#DeleteModal"><i class="fa fa-trash"></i></button>
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
  <div class="modal fade" id="DeleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Thông báo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/?url=CategoriesController/delete/<?php echo $item['id'] ?>" method="POST">
          <div class="modal-body">
            <input type="hidden" name="delete_id" id="" class="delete_id_cate">
            <p>Bạn có chắc chắn muốn xóa ?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="deleteCate">Delete</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <!-- /.content -->
</div>