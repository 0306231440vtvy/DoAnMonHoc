(function ($) {
    "use strict";
    var DAMH = {};
    var accountModal = new bootstrap.Modal(document.getElementById("exampleModal"));
    var registerModal = new bootstrap.Modal(document.getElementById("registerModal"));
    var loginModal = new bootstrap.Modal(document.getElementById("loginModal"));
    $('#btn-login').on('click', function () {
        accountModal.hide();
        setTimeout(function () {
            loginModal.show();
        }, 300)
    });
    $("#btn-register").on('click', function () {
        accountModal.hide();
        setTimeout(function () {
            registerModal.show();
        }, 300)
    });
    $("#switchToRegister").on('click', function (e) {
        e.preventDefault();
        loginModal.hide();
        setTimeout(function () {
            registerModal.show();
        }, 300);
    });
    $("#switchToLogin").on('click', function (e) {
        e.preventDefault();
        registerModal.hide();
        setTimeout(() => {
            loginModal.show();
        }, 300);
    });
})(jQuery);