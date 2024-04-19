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
    if (n > x.length) {
      slideIndex = 1
    }
    if (n < 1) {
      slideIndex = x.length
    }
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
<script>
  // Lấy thẻ input và nút tăng/giảm
  var quantityInput = document.getElementById('quantityInput');
  var increaseBtn = document.getElementById('increaseBtn');
  var decreaseBtn = document.getElementById('decreaseBtn');

  // Xử lý sự kiện khi nhấn nút tăng
  increaseBtn.addEventListener('click', function() {
    // Tăng giá trị của input lên 1
    quantityInput.value = parseInt(quantityInput.value) + 0;
    console.log(quantityInput.value)
  });

  // Xử lý sự kiện khi nhấn nút giảm
  decreaseBtn.addEventListener('click', function() {
    // Kiểm tra giá trị của input để đảm bảo không âm
    if (parseInt(quantityInput.value) > 0) {
      // Giảm giá trị của input đi 1
      quantityInput.value = parseInt(quantityInput.value) - 0;
      console.log(quantityInput.value)
    }
  });
</script>
<!-- //chức năng lọc -->
<script>
  $(document).ready(function() {
    var active = location.search; //?kytu=asc
    // alert(active)
    $('#input-select option[value="' + active + '"]').attr('selected', 'selected');
  })

  $('#input-select').change(function() {
    var ROOT_URL = '?url=ClientHomeController/ClientCategoriesPage/';
    var value = ROOT_URL + $(this).find(':selected').val();
    // alert(value);
    if (value != 0) {
      var url = value;
      // alert(url);
      window.location.replace(url);
    } else {
      alert('Hãy lọc sản phẩm');
    }

  })
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
<script >
$(document).ready(function () {
  const products = $(".products");
  const itemsPerPage = 3;
  let currentPage = 1;

  function showPage(page) {
    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;

    products.hide().slice(startIndex, endIndex).show();
  }

  function goToPage(page) {
    showPage(page);
    currentPage = page;
    updatePagination();
  }

  function goToPrevPage() {
    if (currentPage > 1) {
      goToPage(currentPage - 1);
    }
  }

  function goToNextPage() {
    const maxPage = Math.ceil(products.length / itemsPerPage);
    if (currentPage < maxPage) {
      goToPage(currentPage + 1);
    }
  }

  function updatePagination() {
    const maxPage = Math.ceil(products.length / itemsPerPage);
    const paginationElement = $(".store-pagination");
    paginationElement.empty();
    paginationElement.append(`<li><a href="#" id="prev"><i class="fa fa-angle-left"></i></a></li>`);
    for (let i = 1; i <= maxPage; i++) {
        paginationElement.append(`<li><a href="#" class="page">${i}</a></li>`);
    }
    paginationElement.append(`<li><a href="#" id="next"><i class="fa fa-angle-right"></i></a></li>`);

    $(".page").click(function () {
        const pageNum = parseInt($(this).text());
        goToPage(pageNum);
    });

    $("#prev").click(goToPrevPage);
    $("#next").click(goToNextPage);
  }

  // Show the first page initially
  showPage(currentPage);
  updatePagination();
});
</script>