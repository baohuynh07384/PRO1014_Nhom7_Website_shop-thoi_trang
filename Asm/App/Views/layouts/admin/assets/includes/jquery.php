<!-- jQuery -->
<script src="App/Views/layouts/admin/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="App/Views/layouts/admin/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="App/Views/layouts/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="App/Views/layouts/admin/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="App/Views/layouts/admin/assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="App/Views/layouts/admin/assets/plugins/jqvmap/jquery.vmap.js"></script>
<!-- <script src="App/Views/layouts/assets/plugins/jqvmap/maps/jquery.vmap.world.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="App/Views/layouts/admin/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="App/Views/layouts/admin/assets/plugins/moment/moment.min.js"></script>
<script src="App/Views/layouts/admin/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="App/Views/layouts/admin/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="App/Views/layouts/admin/assets/plugins/summernote/summernote-bs4.js"></script>
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
<!-- AdminLTE for demo purposes -->
<script src="App/Views/layouts/admin/assets/dist/js/demo.js"></script>
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
  Dropzone.options.myGreatDropzone = { // camelized version of the `id`
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    accept: function(file, done) {
      if (file.name == "justinbieber.jpg") {
        done("Naha, you don't.");
      }
      else { done(); }
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
  $(document).ready(function(){
    $('.deletebtn').click(function(e){
      e.preventDefault();
      var cate_id = $(this).val();
      // console.log(cate_id);
      $('.delete_id_cate').val(cate_id);
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
