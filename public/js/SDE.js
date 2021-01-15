$(document).ready(function () {
    function SetTimeOut(className, time) {
        setTimeout(function () {
            $(".guide." + className).fadeIn();
            $(".barRight .content").animate({ scrollTop: 10000 }, 2000);
        }, time);
    }
    SetTimeOut("one", 1000);
    SetTimeOut("two", 6000);
    $("#next-step-three").click(function () {
        SetTimeOut("three", 1000);
        SetTimeOut("four", 5000);
        SetTimeOut("five", 8000);
    });
    $("#mission-step-five").click(function () {
        $("iframe").attr("src", "action/SDE/code");
    });
    $("#access-robots").click(function () {
        $("iframe").attr("src", "action/SDE/robots/1");
        SetTimeOut("seven", 1000);
    });
    $("#prevent-SDE").click(function () {
        $("iframe").attr("src", "action/SDE/prevent");
        SetTimeOut("ten", 1000);
    });

    $("iframe").on("load", function () {
        iframe = $(this).contents();
        iframe.find(".address").keypress(function (e) {
            var val = $(this).val().slice(17);
            if (e.which === 13) {
                if (val == "robots.txt") {
                    $("iframe").attr("src", "action/SDE/robots/1");
                    SetTimeOut("seven", 1000);
                } else if (val == "test.txt") {
                    $("iframe").attr("src", "action/SDE/robots/2");
                } else if (val == "account.txt") {
                    $("iframe").attr("src", "action/SDE/robots/3");
                    if ($(".guide.seven").css("display") == "block") {
                        SetTimeOut("eight", 1000);
                        SetTimeOut("nine", 5000);
                    }
                    if ($(".guide.ten").css("display") == "block") {
                        SetTimeOut("eleven", 1000);
                    }
                    if ($(".guide.twelve").css("display") == "block") {
                        SetTimeOut("thirteen", 1000);
                    }
                } else if (val == "private.txt") {
                    $("iframe").attr("src", "action/SDE/robots/4");
                    if ($(".guide.seven").css("display") == "block") {
                        SetTimeOut("eight", 1000);
                        SetTimeOut("nine", 5000);
                    }
                    if ($(".guide.ten").css("display") == "block") {
                        SetTimeOut("eleven", 1000);
                    }
                    if ($(".guide.twelve").css("display") == "block") {
                        SetTimeOut("thirteen", 1000);
                    }
                } else {
                    $("iframe").attr("src", val);
                }
            }
        });
        iframe.find("#deploy").click(function () {
            var code = iframe.find("#text-code").val();
            var _token = iframe.find('input[name="_token"]').val();
            $.ajax({
                type: "POST",
                url: "action/SDE/code",
                data: {
                    code: code,
                    _token: _token,
                },
                success: function (response) {
                    if (response == 1) {
                        $("iframe").attr("src", "action/SDE/social");
                        SetTimeOut("six", 1000);
                    } else {
                        iframe
                            .find(".fail")
                            .html("Invalid code. please check again");
                    }
                },
            });
        });
    });
});
