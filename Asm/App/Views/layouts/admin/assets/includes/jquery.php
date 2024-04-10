<!-- jQuery -->

<script src="App/Views/layouts/admin/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="App/Views/layouts/admin/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="https://kit.fontawesome.com/7d138f26d0.js" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
>
<!-- AdminLTE for demo purposes -->

<script src="App/Views/layouts/admin/assets/dist/js/demo.js"></script>
<script src="https://kit.fontawesome.com/7d138f26d0.js" crossorigin="anonymous"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
<script src="App/Views/layouts/admin/assets/dist/js/pages/dashboard.js"></script>
<script src="App/Views/layouts/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="App/Views/layouts/admin/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="App/Views/layouts/admin/assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="App/Views/layouts/admin/assets/plugins/jqvmap/jquery.vmap.js"></script>
<!-- jQuery Knob Chart -->
<script src="App/Views/layouts/admin/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="App/Views/layouts/admin/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="App/Views/layouts/admin/assets/plugins/moment/moment.min.js"></script>
<script src="App/Views/layouts/admin/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="App/Views/layouts/admin/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="App/Views/layouts/admin/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="App/Views/layouts/admin/assets/dist/js/adminlte.js"></script>
<script src="App/Views/layouts/admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="App/Views/layouts/admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="App/Views/layouts/admin/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="App/Views/layouts/admin/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="App/Views/layouts/admin/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="App/Views/layouts/admin/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="App/Views/layouts/admin/assets/plugins/jszip/jszip.min.js"></script>
<script src="App/Views/layouts/admin/assets/plugins/toastr/toastr.min.js"></script>
<script src="App/Views/layouts/admin/assets/plugins/select2/js/select2.full.min.js"></script>
<script src="App/Views/layouts/admin/assets/plugins/summernote/summernote-bs4.js"></script>
<script src="App/Views/layouts/admin/assets/plugins/summernote/lang/summernote-vi-VN.min.js"></script>

<script>
  const inputElement = document.querySelector('.filepond');
  const pond = FilePond.create(inputElement, {
    allowMultiple: true, // Cho phép tải lên nhiều tệp
    server: {
       // Đường dẫn URL của máy chủ để xử lý tải lên
      process: {
        method: 'POST', // Phương thức HTTP để gửi dữ liệu tải lên (POST)
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}' // Thêm CSRF token nếu cần
        }
      }
    },
    plugins: [
      FilePondPluginFileEncode, // Plugin để mã hóa dữ liệu tệp
      FilePondPluginFileValidateSize, // Plugin để kiểm tra kích thước tệp
      FilePondPluginFileValidateType // Plugin để kiểm tra loại tệp
    ]
  });
</script>
<script>
  $(document).ready(function() {
    $("#ValidateCateForm").validate({
      rules: {
        name: "required",
        option: {
          required: true
        },
        image: "required",

      },
      messages: {
        name: "Vui lòng nhập tên danh mục",
        option: "Vui lòng chọn trạng thái",
        image: "Vui lòng chọn hình ảnh",
      }
    });
    $("#updateValidateForm").validate({
      rules: {
        name: "required",
        option: {
          required: true
        },


      },
      messages: {
        name: "Vui lòng nhập tên danh mục",
        option: "Vui lòng chọn trạng thái",

      }
    });

  })
</script>
<script>
  $(document).ready(function() {
    $('.deletebtn').click(function(e) {
      e.preventDefault();
      var cate_id = $(this).val();
      // console.log(cate_id);
      $('.delete_id_cate').val(cate_id);
      $('#DeleteModalCate').modal('show');
    });
    $('.deletebtn_acc').click(function(e) {
      e.preventDefault();
      var user_id = $(this).val();
      $('.delete_id_user').val(user_id);
      $('#DeleteModalAcc').modal('show');
    });
    $('.deletebtn_blog').click(function(e) {
      e.preventDefault();
      var blog_id = $(this).val();
      $('.delete_id_blog').val(blog_id);
      $('#DeleteModalBlog').modal('show');
    });




  });
</script>
<?php
if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
  echo $_SESSION['success'];
?>
  <script>
    swal({
      title: "<?php echo $_SESSION['success'] ?>",
      text: "You clicked the button!",
      icon: "success",
      button: "OK",
    });
  </script>
<?php
  unset($_SESSION['success']);
}

?>
<script>
  $(function() {
    $('.select2').select2()
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $('#summernote').summernote({
      lang: 'vi-VN',
      placeholder: 'Nhập nội dung....',
      tabsize: 2,
      height: 200,
      minHeight: 100,
      maxHeight: 300,
      focus: true,
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ],
      popover: {
        image: [
          ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
          ['float', ['floatLeft', 'floatRight', 'floatNone']],
          ['remove', ['removeMedia']]
        ],
        link: [
          ['link', ['linkDialogShow', 'unlink']]
        ],
        table: [
          ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
          ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
        ],
        air: [
          ['color', ['color']],
          ['font', ['bold', 'underline', 'clear']],
          ['para', ['ul', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture']]
        ]
      },
      codemirror: {
        theme: 'monokai'
      }
    });

  })
</script>
<script>
  function updateFileName(input) {
    var fileName = input.files[0].name;
    var label = input.nextElementSibling;
    label.innerText = fileName;
  }
</script>