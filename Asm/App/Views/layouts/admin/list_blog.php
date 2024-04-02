<?php

use App\Controllers\BlogController;


if (isset($_SESSION['success']) && $_SESSION['success'] != ''){
  echo $_SESSION['success'];
 
}

?>
<div class="content-wrapper">
     <div class="card card-primary">
         <!-- Content Header (Page header) -->

         <div class="card card-primary">
             <div class="card-header">
                 <h3 class="card-title">Danh Sách Bài Viết </h3>
             </div>
         </div><!-- /.container-fluid -->


         <!-- Main content -->
         <div class="card-body table-responsive p-0">
             <div class="table-responsive">
                 <table class="table">
                     <thead>
                         <tr>
                             <th scope="col">Mã số</th>
                             <th colspan="1">Bài viết</th>
                             <th scope="col"></th>
                             <th scope="col"></th>
                             <th scope="col"></th>
                             <th scope="col">Ngày tạo</th>
                             <th scope="col">Trạng thái</th>
                             <th scope="col">Thao tác</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php

                            foreach ($datablog as $item) :
                                $status = $item['status'] == 1 ? "Hiện" : "Ẩn";
                            ?>

                             <tr class="">
                                 <td scope="row"><?= $item['id']  ?></td>
                                 <td>
                                     <img src="<?= PUBLIC_URL . $item['thumbnail']  ?>" alt="" width="100" height="100">
                                 </td>
                                 <td><?= $item['title']  ?></td>
                                 <td><?= $item['new_type'] ?></td>
                                 <td><?= $item['author'] ?></td>
                                 <td><?= $item['create_at']?></td>  
                                 <td><?= $status ?></td> 
                                 <td>
                                     <div class="row">
                                         <form action="/?url=BlogController/detailblog/<?= $item['id'] ?>" method="post">
                                             <input type="hidden" name="id_update" value="<?= $item['id'] ?>">
                                             <button type="submit" name="update" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></button>
                                         </form>
                                         <button type="button" name="" value="<?= $item['id'] ?>" class="btn btn-outline-danger btn-sm deletebtn" data-toggle="modal" data-target="#DeleteModal"><i class="fa fa-trash"></i></button>
                                     </div>
                                 </td>
                             </tr>
                         <?php endforeach; ?>
    <div class="modal fade" id="DeleteModalBlog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Thông báo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/?url=BlogController/delete/<?php echo $item['id'] ?>" method="POST">
          <div class="modal-body">
            <input type="hidden" name="delete_blog_id" id="" class="delete_id_blog">
            <p>Bạn có chắc chắn muốn xóa ?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="deleteBlog">Delete</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
    <!-- /.content -->
</div>

                     </tbody>
                 </table>
             </div>
         </div>

     </div>
     <!-- /.content -->
 </div>

 <!-- /.content-wrapper -->