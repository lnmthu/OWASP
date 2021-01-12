$(document).ready(function () {
    $.validator.addMethod(
        "validatePassword",
        function (value, element) {
            return (
                this.optional(element) ||
                /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/i.test(value)
            );
        },
        "Enter password from 8 consisting of upper and lower case letters and at least one "
    );
    function SetTimeOut(className, time) {
        setTimeout(function () {
            $(".guide." + className).fadeIn();
            $(".barRight .content").animate({ scrollTop: 10000 }, 2000);
        }, time);
    }
    function alertSuccess(string) {
        iframe.find(".alert-success").fadeIn();
        iframe.find(".alert-success").html(string);
        setTimeout(function () {
            iframe.find(".alert-success").fadeOut();
        }, 10000);
    }
    function alertDanger(errors) {
        iframe.find(".alert-danger").fadeIn();
        for (const error in errors) {
            iframe.find(".alert-errors").html("<li>" + errors[error] + "</li>");
        }

        setTimeout(function () {
            iframe.find(".alert-danger").fadeOut();
        }, 3000);
    }
    SetTimeOut("one", 1000);
    SetTimeOut("two", 6000);
    $("#BA-prevent").click(function () {
        SetTimeOut("twelve", 1000);
        $("iframe").attr("src", "action/BA/prevent");
    });
    $("#next-step-three").click(function () {
        SetTimeOut("three", 1000);
        $("iframe").attr("src", "action/BA/login-social");
    });
    $(".exec-brute-force").click(function () {
        $("iframe").attr("src", "http://localhost:57575");
    });
    $("#logout-show").click(function () {
        if ($(".guide.thirteen").css("display") == "block") {
            SetTimeOut("fourteen", 1000);
            SetTimeOut("fifteen", 4000);
        }
            $("iframe").attr("src", "action/BA/logout");
    });
    $("iframe").on("load", function () {
        if ($("iframe").attr("src") !== "http://localhost:57575") {
            iframe = $(this).contents();
            iframe.find("#login").on("submit", function (e) {
                if ($(".guide.twelve").css("display") == "none") {
                    if (!e.isDefaultPrevented()) {
                        e.preventDefault();
                        var email = iframe.find("#email").val();
                        var password = iframe.find("#password").val();
                        var _token = iframe.find('input[name="_token"]').val();
                        $.ajax({
                            type: "POST",
                            url: "action/BA/login-social",
                            data: {
                                email: email,
                                password: password,
                                _token: _token,
                            },
                            success: function (response) {
                                console.log(response);
                                if (response == 1) {
                                    if (
                                        $(".guide.eight").css("display") ==
                                        "block"
                                    ) {
                                        SetTimeOut("nine", 1000);
                                        SetTimeOut("ten", 4000);
                                        SetTimeOut("eleven", 7000);
                                    }
                                        
                                    $("iframe").attr("src", "action/BA/social");
                                } else {
                                    iframe.find(".alert-login").fadeIn();
                                    iframe
                                        .find(".alert-login")
                                        .html(
                                            "Email or Password is not correct"
                                        );
                                    setTimeout(function () {
                                        iframe.find(".alert-login").fadeOut();
                                    }, 3000);
                                    if (
                                        $(".guide.four").css("display") ==
                                        "none"
                                    ) {
                                        SetTimeOut("four", 1000);
                                    }
                                    if (
                                        password ==
                                        "' or email = 'pandalovely@gmail.com' #"
                                    ) {
                                        SetTimeOut("five", 1000);
                                        SetTimeOut("six", 4000);
                                        SetTimeOut("seven", 7000);
                                        SetTimeOut("eight", 9000);
                                    }
                                    if (
                                        iframe
                                            .find(".alert-success")
                                            .css("display") == "block"
                                    ) {
                                        iframe.find(".alert-success").fadeOut();
                                    }
                                }
                            },
                        });
                    }
                }
            });
            function validatePassword(classElement) {
                iframe.find("#" + classElement).validate({
                    rules: {
                        password: {
                            required: true,
                            validatePassword: true,
                        },
                        repass: {
                            required: false,
                        },
                        name: {
                            required: false,
                        },
                        email: {
                            required: false,
                        },
                    },
                    messages: {
                        password: {
                            required: "Please Enter Password",
                        },
                    },
                    highlight: function (element) {
                        iframe.find(element).addClass("error");
                    },
                    unhighlight: function (element) {
                        iframe.find(element).removeClass("error");
                    },
                    submitHandler: function (form) {
                        $.ajax({
                            url: form.action,
                            type: form.method,
                            data: $(form).serialize(),
                            success: function (response) {
                                if (
                                    form.action.endsWith(
                                        "action/BA/register-social"
                                    )
                                ) {
                                    alertSuccess(
                                        "Account registration is successful. Proceed to <a class='href' id='logout-action'>Log in</a>"
                                    );
                                } else {
                                    if (
                                        $(".guide.twelve").css("display") ==
                                        "block"
                                    ) {
                                        SetTimeOut("thirteen", 1000);
                                    }
                                    alertSuccess(
                                        "Account information changed successfully"
                                    );
                                }
                            },
                            error: function (xhr) {
                                var errors = xhr.responseJSON.errors;
                                alertDanger(errors);
                            },
                        });
                    },
                });
            }
            validatePassword("info");
            validatePassword("register");
            iframe.find("#logout-action").click(function () {
                if ($(".guide.thirteen").css("display") == "block") {
                    SetTimeOut("fourteen", 1000);
                    SetTimeOut("fifteen", 4000);
                }
                    $("iframe").attr("src", "action/BA/logout");
            });
        }
    });
});
