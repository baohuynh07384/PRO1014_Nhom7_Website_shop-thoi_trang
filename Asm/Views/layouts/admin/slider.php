<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->


  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="App/Views/layouts/admin/assets/dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Men's fashion seller
        </a>
      </div>
    </div>

    <!-- SidebarSearch Form
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-solid fa-bars"></i>
            <p>
              Danh mục
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?url=CategoriesController/CreateCategoresPage" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo danh mục</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?url=CategoriesController/ListCatPage" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách danh mục</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-solid fa-bars"></i>
            <p>
              Sản phẩm
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?url=ProductController/CreateProductPage" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo sản phẩm</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?url=ProductController/ListProductPage" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách sản phẩm</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-solid fa-bars"></i>
            <p>
              Tài khoản
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?url=AccountController/CreateAccountPage" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo tài khoản</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?url=ListaccountController/ListaccountPage" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách tài khoản</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="?url=HomeController/homePage" class="nav-link active">
            <i class="nav-icon fas fa-solid fa-bars"></i>
            <p>
              Thống kê
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="?url=CartController/CartPage" class="nav-link active">
            <i class="nav-icon fas fa-solid fa-bars"></i>
            <p>
              Đơn hàng
            </p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>