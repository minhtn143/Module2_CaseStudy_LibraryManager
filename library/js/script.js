$(function () {
    let err_username = false;
    let err_id = false;
    let err_email = false;
    let err_phone = false;
    let err_psw = false;
    let err_re_psw = false;

    function checkUsername() {
        let pattern = new RegExp(/^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/);

        if (!pattern.test($('#username').val())) {
            $('.userErr').html("* Username from 8 - 20 characters not include special characters");
            err_username = true;
        } else {
            $('.userErr').html("");
        }
    }

    function checkId() {
        let length = $('#studentId').val().length;
        if (length === 0) {
            $('.idErr').html("* Please input your student ID");
            err_id = true;
        } else {
            $('.idErr').html("");
        }
    }

    function checkEmail() {
        let pattern = new RegExp(/^[A-Za-z0-9]+[A-Za-z0-9.]*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)$/);
        if (!pattern.test($('#email').val())) {
            $('.emailErr').html("* Email is required john.smith@example.com.");
            err_email = true;
        } else {
            $('.emailErr').html("");
        }
    }

    function checkPhone() {
        let pattern = new RegExp(/^0(32|33|34|35|36|37|38|39|96|97|98|86|81|82|83|84|85|88|91|94|70|76|77|78|79|89|90|93)+[0-9]{7}$/);
        if (!pattern.test($('#phone').val())) {
            $('.phoneErr').html("* Your phone number is not from Viettel, Vinaphone or Mobiphone");
            err_phone = true;
        } else {
            $('.phoneErr').html("");
        }
    }

    function checkPassword() {
        let pattern = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/);
        if (!pattern.test($('#password').val())) {
            $('.pswErr').html("* The password uses 8 or more characters and combines letters, numbers and symbols");
            err_psw = true;
        } else {
            $('.pswErr').html("");
        }
    }

    function checkRe_psw() {
        let password = $('#password').val();
        let re_password = $('#re_psw').val();

        if (password !== re_password) {
            $('.retypeErr').html('* Passwords miss match');
            err_re_psw = true;
        } else {
            $('.retypeErr').html('');
        }
    }

    $('#username').focusout(function () {
        checkUsername();
    })

    $('#studentId').focusout(function () {
        checkId();
    })

    $('#email').focusout(function () {
        checkEmail();
    })

    $('#phone').focusout(function () {
        checkPhone();
    })

    $('#password').focusout(function () {
        checkPassword();
    })

    $('#re_psw').focusout(function () {
        checkRe_psw();
    })

    $('#register-form').submit(function () {
        err_username = false;
        err_id = false;
        err_email = false;
        err_phone = false;
        err_psw = false;
        err_re_psw = false;

        checkRe_psw();
        checkEmail();
        checkUsername();
        checkPhone();
        checkId();
        checkPassword()

        return err_username === false
            && err_id === false
            && err_email === false
            && err_phone === false
            && err_psw === false
            && err_re_psw === false;
    })
})

!function ($) {

    'use strict';

    $(function () {
        $('[data-toggle="password"]').each(function () {
            let input = $(this);
            let eye_btn = $(this).parent().find('.input-group-text');
            eye_btn.css('cursor', 'pointer').addClass('input-password-hide');
            eye_btn.on('click', function () {
                if (eye_btn.hasClass('input-password-hide')) {
                    eye_btn.removeClass('input-password-hide').addClass('input-password-show');
                    eye_btn.find('.fa').removeClass('fa-eye').addClass('fa-eye-slash')
                    input.attr('type', 'text');
                } else {
                    eye_btn.removeClass('input-password-show').addClass('input-password-hide');
                    eye_btn.find('.fa').removeClass('fa-eye-slash').addClass('fa-eye')
                    input.attr('type', 'password');
                }
            });
        });
    });
}(window.jQuery);


const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
})

function confirmDel(url_link) {
    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            ).then(function () {
                window.location = url_link;
            })
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    })
}

function myAlert(posit, icon, txt, delay, next_url) {
    Swal.fire({
        position: posit,
        icon: icon,
        title: txt,
        showConfirmButton: false,
        timer: delay
    }).then(function () {
        window.location = next_url;
    })
}