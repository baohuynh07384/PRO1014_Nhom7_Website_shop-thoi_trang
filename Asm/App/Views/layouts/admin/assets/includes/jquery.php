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
<script
  src="App/Views/layouts/admin/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
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
<!-- AdminLTE for demo purposes -->
<script src="App/Views/layouts/admin/assets/dist/js/demo.js"></script>
<script src="https://kit.fontawesome.com/7d138f26d0.js" crossorigin="anonymous"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="App/Views/layouts/admin/assets/dist/js/pages/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>


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
    //form update danh mục
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

    //form tạo tài khoản
    $('#addAccountForm').validate({
      rules: {
        name: "required",
        password: {
          required: true,
          minlength: 8,
          passwordStrength: true
        },
        email: {
          required: true,
          email: true
        },
        phone: {
          required: true,
          digits: true //các ký tự số
        },
        address: {
          required: true,
        },
        role: {
          required: true,
        },
        option: {
          required: true,
        },
        image: {
          required: true,
        }
      },
      messages: {
        name: "Vui lòng không bỏ trống.",
        password: {
          required: "Mật khẩu không được bỏ trống.",
          passwordStrength: "Mật khẩu phải có ít nhất 8 kí tự, bao gồm ít nhất một chữ cái viết hoa, một chữ cái viết thường và một số."
        },
        email: {
          required: "Vui lòng nhập địa chỉ email.",
          email: "Vui lòng nhập một địa chỉ email hợp lệ."
        },
        phone: {
          required: "Vui lòng nhập số điện thoại.",
          digits: "Số điện thoại chỉ được chứa các ký tự số."
        },
        address: {
          required: "Vui lòng nhập địa chỉ."
        },
        role: {
          required: "Vui lòng chọn vai trò."
        },
        option: {
          required: "Vui lòng chọn trạng thái."
        },
        image: {
          required: "Vui lòng chọn hình ảnh."
        }

      }
    });
    
    //này là kiểm lỗi password
    $.validator.addMethod("passwordStrength", function (value, element) {
      return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/.test(value);
    }, "Mật khẩu phải có ít nhất 8 kí tự, bao gồm ít nhất một chữ cái viết hoa, một chữ cái viết thường và một số.");
    $('#editAccountForm').validate({
      rules: {
        name: "required",
        password: {
          required: true,
          minlength: 8,
          passwordStrength: true
        },
        email: {
          required: true,
          email: true
        },
        phone: {
          required: true,
          digits: true //các ký tự số
        },
        address: {
          required: true,
        },
        role: {
          required: true,
        },
        option: {
          required: true,
        },
        image: {
          required: true,
        }
      },
      messages: {
        name: "Vui lòng không bỏ trống.",
        password: {
          required: "Mật khẩu không được bỏ trống.",
          passwordStrength: "Mật khẩu phải có ít nhất 8 kí tự, bao gồm ít nhất một chữ cái viết hoa, một chữ cái viết thường và một số."
        },
        email: {
          required: "Vui lòng nhập địa chỉ email.",
          email: "Vui lòng nhập một địa chỉ email hợp lệ."
        },
        phone: {
          required: "Vui lòng nhập số điện thoại.",
          digits: "Số điện thoại chỉ được chứa các ký tự số."
        },
        address: {
          required: "Vui lòng nhập địa chỉ."
        },
        role: {
          required: "Vui lòng chọn vai trò."
        },
        option: {
          required: "Vui lòng chọn trạng thái."
        },
        image: {
          required: "Vui lòng chọn hình ảnh."
        }

      }
    });

 
    //form tạo bài viết
    $('#addBlogForm').validate({
      rules: {
        name: {
          required: true,
        },
        image: {
          required: true,
        },
        author: {
          required: true,
        },
        new_type: {
          required: true,
        },
        content: "required"
      },
      messages: {
        name: {
          required: "Vui lòng nhập tiêu đề."
        },
        image: {
          required: "Vui lòng chọn hình ảnh."
        },
        author: {
          required: "Vui lòng nhập tác giả."
        },
        new_type: {
          required: "Vui lòng chọn loại bài viết."
        },
        content:  "Vui lòng nhập nội dung."
      }
    });

    //form update blog
    $('#editBlogForm').validate({
      rules: {
        name: {
          required: true,
        },
        image: {
          required: true,
        },
        author: {
          required: true,
        },
        new_type: {
          required: true,
        },
        content: "required"
      },
      messages: {
        name: {
          required: "Vui lòng nhập tiêu đề."
        },
        image: {
          required: "Vui lòng chọn hình ảnh."
        },
        author: {
          required: "Vui lòng nhập tác giả."
        },
        new_type: {
          required: "Vui lòng chọn loại bài viết."
        },
        content:  "Vui lòng nhập nội dung."
      }
    });


  })
  Dropzone.options.myGreatDropzone = { // camelized version of the `id`
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    accept: function (file, done) {
      if (file.name == "justinbieber.jpg") {
        done("Naha, you don't.");
      } else {
        done();
      }
    }
  };
  $("#example1").DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>
<script>
  $(document).ready(function () {
    $('.deletebtn').click(function (e) {
      e.preventDefault();
      var cate_id = $(this).val();
      // console.log(cate_id);
      $('.delete_id_cate').val(cate_id);
      $('#DeleteModal').modal('show');
    });
    $('.deletebtn').click(function (e) {
      e.preventDefault();
      var user_id = $(this).val();
      // console.log(cate_id);
      $('.delete_id_user').val(user_id);
      $('#DeleteModal').modal('show');
    });
    $('.deletebtn').click(function (e) {
      e.preventDefault();
      var blog_id = $(this).val();
      // console.log(cate_id);
      $('.delete_id_blog').val(blog_id);
      $('#DeleteModal').modal('show');
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
  $(function () {
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