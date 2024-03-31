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
<script src="App/Views/layouts/admin/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="App/Views/layouts/admin/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="App/Views/layouts/admin/assets/dist/js/adminlte.js"></script>
<script src="App/Views/layouts/admin/assets/plugins/select2/js/select2.full.min.js"></script>
<script src="App/Views/layouts/admin/assets/plugins/summernote/summernote-bs4.js"></script>
<script src="App/Views/layouts/admin/assets/plugins/summernote/lang/summernote-vi-VN.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="App/Views/layouts/admin/assets/dist/js/demo.js"></script>
<script src="https://kit.fontawesome.com/7d138f26d0.js" crossorigin="anonymous"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="App/Views/layouts/admin/assets/dist/js/pages/dashboard.js"></script>
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