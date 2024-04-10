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

            <form action="/?url=ForgotController/changePass" method="post" id="form">
                <h1>Đổi mật khẩu</h1>
                <input type="text" placeholder="Nhập mật khẩu mới" name="newpass" value="" id="">
                <?php if (isset($_SESSION['newpass'])): ?>
                    <p style="color: #DC143C; margin: 0px;">
                        <?php echo Sessions::display_session('newpass'); ?>
                    </p>
                <?php endif; ?>
                <input type="text" placeholder="Xác nhận mật khẩu mới" name="repass" value="" id="">
                <?php if (isset($_SESSION['repass'])): ?>
                    <p style="color: #DC143C; margin: 0px;">
                        <?php echo Sessions::display_session('repass'); ?>
                    </p>
                <?php endif; ?>
                <?php if (isset($_SESSION['fail'])): ?>
                    <p style="color: #DC143C; margin: 0px;">
                        <?php echo Sessions::display_session('fail'); ?>
                    </p>
                <?php endif; ?>
                <button type="submit" name="submit">Xác nhận</button>

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