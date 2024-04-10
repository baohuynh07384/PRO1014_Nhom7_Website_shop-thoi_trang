
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
<script>
	var slideIndex = 1;
	showDivs(slideIndex);

	function plusDivs(n) {
		showDivs(slideIndex += n);
	}

	function showDivs(n) {
		var i;
		var x = document.getElementsByClassName("mySlides");
		if (n > x.length) { slideIndex = 1 }
		if (n < 1) { slideIndex = x.length }
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		}
		x[slideIndex - 1].style.display = "block";
	}
</script>
<script src="App/Views/layouts/client/assets/js/jquery.min.js"></script>
<script src="App/Views/layouts/client/assets/js/bootstrap.min.js"></script>
<script src="App/Views/layouts/client/assets/js/slick.min.js"></script>
<script src="App/Views/layouts/client/assets/js/nouislider.min.js"></script>
<script src="App/Views/layouts/client/assets/js/jquery.zoom.min.js"></script>
<script src="App/Views/layouts/client/assets/js/main.js">
</script>
<script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script>
	$(document).ready(function() {
		$('#updateAccountForm').validate({
    rules: {
        name: "required",
		address: "required",
        email: {
            required: true,
            email: true
        },
        phone: {
            required: true,
			digits: true //các ký tự số
        }
    },
    messages: {
        name: "Vui lòng nhập tên của bạn",
		address: "Vui lòng nhập địa chỉ",
        email: {
            required: "Vui lòng nhập địa chỉ email của bạn",
            email: "Vui lòng nhập địa chỉ email hợp lệ"
        },
        phone: {
          required: "Vui lòng nhập số điện thoại",
          digits: "Số điện thoại chỉ được chứa các ký tự số."
        },
    }
});
	});
</script>







<?php
if (isset($_SESSION['error']) && $_SESSION['error'] != '') {
  echo $_SESSION['error'];
  ?>
  <script>
    swal({
      title: "<?php echo $_SESSION['error'] ?>",
      text: "You clicked the button!",
      icon: "error",
      button: "OK",
    });
  </script>
  <?php
  unset($_SESSION['error']);
}

?>
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