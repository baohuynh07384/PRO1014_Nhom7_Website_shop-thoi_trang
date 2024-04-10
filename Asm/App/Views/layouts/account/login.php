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
    <script src="https://accounts.google.com/gsi/client" async></script>
</head>

<body>


    <div class="container" id="container">
        <div class="form-container sign-in">

            <form action="/?url=LoginController/handleLogin" method="post" id="form">
                <h1>Đăng nhập</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                </div>
                <input type="text" placeholder="Tên đăng nhập" name="email" value="" id="email">
                <?php if (isset($_SESSION['email'])): ?>
                    <p style="color: #DC143C; margin: 0px;">
                        <?php echo Sessions::display_session('email'); ?>
                    </p>
                <?php endif; ?>
                <input type="password" placeholder="Mật khẩu" name="password" value="" id="password">
                <?php if (isset($_SESSION['password'])): ?>
                    <p style="color: #DC143C; margin: 0px;">
                        <?php echo Sessions::display_session('password'); ?>
                    </p>
                <?php endif; ?>
                <a href="/?url=ForgotController/loadPageForgot">Quên mật khẩu?</a>
                <button type="submit" name="submit">Đăng nhập</button>

            </form>
        </div>
        <div class="toggle-container">

            <div class="toggle">

                <div class="toggle-panel toggle-right">
                    <a href="?url=ClientHomeController/ClientHomePage" class="close" tabindex="0" role="button"></a>
                    <h1>Xin chào</h1>
                    <p>Bạn chưa có tài khoản? Đăng ký ngay</p>
                    <button class="hidden"><a href="?url=RegristerController/RegristerPage" style="background-color:#D10024; color: white;">Đăng ký</a></button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="App/Views/layouts/account/assets/js/script.js"></script>
    </body>

</html>