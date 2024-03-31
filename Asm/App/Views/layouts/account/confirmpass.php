<?php
ob_start();
use App\Core\Sessions;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Modern Login Page | AsmrProg</title>
    <link rel="stylesheet" href="App/Views/layouts/account/assets/css/style.css">
</head>

<body>


<div class="container" id="container">
        <div class="form-container sign-in">

            <form action="/?url=ForgotController/confirmVerification" method="post" id="form">
                <h1>Mã xác nhận</h1>
                <input type="text" placeholder="Nhập mã xác nhận" name="text" value="" id="email">
                <?php if (isset($_SESSION['text'])): ?>
                    <p style="color: #DC143C; margin: 0px;">
                        <?php echo Sessions::display_session('text'); ?>
                    </p>
                <?php endif; ?>
                
                <button type="submit" name="confirm">Xác nhận</button>

            </form>
        </div>
        <div class="toggle-container">

            <div class="toggle">

                <div class="toggle-panel toggle-right">
                    <a href="?url=ClientHomeController/ClientHomePage" class="close" tabindex="0" role="button"></a>
                    <h1>Xin chào</h1>
                    <p>Bạn chưa có tài khoản? Đăng ký ngay</p>
                    <button class="hidden"><a href="?url=RegristerController/RegristerPage"
                            style="background-color:#D10024; color: white;">Đăng ký</a></button>
                </div>
            </div>
        </div>
    </div>

    <script src="App/Views/layouts/account/assets/js/script.js"></script>


    </script>
</body>

</html>