<?php

use App\Controllers\AccountController;

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
          <h1>Danh sách tài khoản</h1>
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
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php


                    foreach ($account as $items) :
                      $status = $items['status'] == 1 ? "Hiện" : "Ẩn";
                     ?>
                             <tr class="">
                             <td scope="row"><?=  $items['id'] ?> </td>
                             <td>
                                 <img src="<?= PUBLIC_URL . $items['image'] ?>" alt="" width="100" height="100">
                             </td>
                             <td><?=$items['name'] ?></td>
                             <td><?= $items['create_at'] ?></td>
                             <td><?= $status ?></td>
                             <td>
                             <div class="row">
                            <form action="/?url=AccountController/edit/<?=$items["id"] ?>" method="post">
                              <input type="hidden" name="id_update" value="<?=$items["id"] ?>">
                              <button type="submit" name="updateAccount" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></button>
                            </form>
                              <button type="button" name="" value="<?=$items["id"] ?>" class="btn btn-outline-danger btn-sm deletebtn" data-toggle="modal" data-target="#DeleteModal"><i class="fa fa-trash"></i></button>       
                          </div>
                             </td>
                             </tr>
                  <?php
                    endforeach;
                  ?>


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
        <form action="/?url=AccountController/delete/<?php echo $items['id'] ?>" method="POST">
          <div class="modal-body">
            <input type="hidden" name="delete_id" id="" class="delete_id_cate">
            <p>Bạn có chắc chắn muốn xóa ?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="deleteAccount">Delete</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- Update modal -->


  <!-- /.content -->
</div>
