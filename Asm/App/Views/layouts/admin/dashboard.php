<?php
  use App\Controllers\HomeController;

?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Thống kê</h1>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
            <h3><?= $data['blogs']; ?></h3>

              <p>Bài viết</p>
            </div>
            <div class="icon">
            <i class="fa-regular fa-newspaper"></i>
            </div>
            <a href="/?url=BlogController/ListBlogPage" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
            <h3><?= $data['products']; ?></h3>
              <p>Sản phẩm</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="/?url=ProductController/ListProductPage" class="small-box-footer">Chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $data['users']; ?></h3>
              <p>Người dùng</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="/?url=AccountController/listAccount" class="small-box-footer">Chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $data['categories'] ?></h3>
              <p>Danh mục</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-list"></i>
            </div>
            <a href="?url=CategoriesController/ListCatPage" class="small-box-footer">Chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
</div>