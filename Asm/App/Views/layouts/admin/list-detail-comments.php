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
                    <h1>Danh sách chi tiết bình luận</h1>
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
                                        <th scope="col">Người bình luận</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">Ngày bình luận</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      
                                    foreach ($data['comments'] as $item) :
                                       
                                    ?>
                                        <tr class="">
                                            <td><?= $item['username']  ?></td>
                                            <td><?= $item['proname']  ?></td>
                                            <td><?= $item['content'] ?></td>
                                            <td><?= $item['create_at']  ?></td>
                                            <td>
                                                <div class="row" style="margin-left: 3rem">
                                    
                                                    <button type="button" name="" value="<?= $item['comment_id'] ?>" class="btn btn-outline-danger btn-sm deletebtn_comment" data-toggle="modal" data-target="#DeleteModalComment"><i class="fa fa-trash"></i></button>
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
    <div class="modal fade" id="DeleteModalComment">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Thông báo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/?url=CommentsController/delete/<?php echo $item['comment_id'] ?>" method="POST">
            <div class="modal-body">
              <input type="hidden" name="delete_id" id="" class="delete_id_comment">
              <p>Bạn có chắc chắn muốn xóa ?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="deleteComment">Delete</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

    <!-- /.content -->
</div>