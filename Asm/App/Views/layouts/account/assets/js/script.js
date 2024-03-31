const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

$(document).ready(function (){
    $('#form').validate({
        rules: {
          password: {
            required: true,
            minlength: 8,
            passwordStrength: true
          },
          email: {
            required: true,
            email: true
          },

        },
        messages: {
          password: {
            passwordStrength: "Mật khẩu phải có ít nhất 8 kí tự, bao gồm ít nhất một chữ cái viết hoa, một chữ cái viết thường và một số."
          },
          email: {
            required: "Vui lòng nhập địa chỉ email.",
            email: "Vui lòng nhập một địa chỉ email hợp lệ."
          },
  
        }
      });

      $('#register').validate({
        rules: {
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

        },
        messages: {
          password: {
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
  
        }
      });
});
