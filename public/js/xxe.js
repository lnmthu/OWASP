$(document).ready(function () {
    function SetTimeOut(className, time) {
        setTimeout(function () {
            $("." + className).fadeIn(1000);
            $(".barRight .content").animate({ scrollTop: 10000 }, 2000);
        }, time);
    }
    SetTimeOut("one", 1000);
    SetTimeOut("two", 4000);
    SetTimeOut("three", 9000);
    $("iframe").on("load", function () {
        var iframe = $(this).contents();
        // auth
        iframe.find("#login").submit(function (e) {
            e.preventDefault();
            var email = iframe.find("#email").val();
            var password = iframe.find("#password").val();
            var _token = iframe.find('input[name="_token"]').val();
            $.ajax({
                type: "POST",
                url: "action/xxe/login-social",
                data: { email: email, password: password, _token: _token },
                success: function (response) {
                    if (response == 1) {
                        $("iframe").attr("src", "action/xxe/shop");
                        SetTimeOut("thirteen", 1000);
                        SetTimeOut("fourteen", 5000);
                    } else {
                        iframe.find(".alert-login").fadeIn();
                        iframe.find(".alert-login").html(response);
                    }
                },
            });
        });
        // deploy js
        iframe.find("#code").submit(function (e) {
            e.preventDefault();
            var code = iframe.find("#text-code").val();
            var _token = iframe.find('input[name="_token"]').val();
            var route = $("iframe").attr("src");
            $.ajax({
                type: "POST",
                url: "action/xxe/XML",
                data: { code: code, route: route, _token: _token },
                success: function (response) {
                    if (route === "action/xxe/DDT") {
                        if (response || response.search("DOMDocument::loadXML(): I/O warning : failed to load external entity") !== -1) {
                            SetTimeOut("four", 1000);
                            iframe.find(".code").html(response);
                        } else {
                            iframe
                                .find(".fail")
                                .html("DDT không hợp lệ! Xin kiểm tra lại.");
                        }
                    } else if (route === "action/xxe/DDT-InternalDDTEntity") {
                        if (response || response.search("DOMDocument::loadXML(): I/O warning : failed to load external entity") !== -1) {
                            SetTimeOut("eight", 1000);
                            SetTimeOut("nine", 5000);
                            iframe.find(".code").html(response);
                        } else {
                            iframe
                                .find(".fail")
                                .html(
                                    "External Entity không hợp lệ! Xin kiểm tra lại."
                                );
                        }
                    } else if (route === "action/xxe/DDT-ExternalDDTEntity") {
                        if (response || response.search("DOMDocument::loadXML(): I/O warning : failed to load external entity") !== -1) {
                            SetTimeOut("fifteen", 1000);
                            SetTimeOut("sixteen", 5000);
                            iframe.find(".code").html(response);
                        } else {
                            iframe
                                .find(".fail")
                                .html(
                                    "External Entity không hợp lệ! Xin kiểm tra lại."
                                );
                        }
                    }else if ($("iframe").attr("src") === "action/xxe/prevent") {
                        if (response || response.search("DOMDocument::loadXML(): I/O warning : failed to load external entity") !== -1) {
                            iframe.find(".code").html(response);
                        }else {
                            iframe
                                .find(".fail")
                                .html(
                                    "Prevent Code không hợp lệ. Xin kiểm tra lại!"
                                );
                        }
                    }

                },
            });
                
        });
        // access url
        iframe.find(".address").keypress(function (e) {
            var val = $(this).val().replace(/\s+/g, "").slice(17);
            if (e.which === 13) {
                if (val.startsWith("action/xxe/login-social") === true) {
                    $.ajax({
                        type: "GET",
                        url: val,
                        success: function (response) {
                            if (response == "download") {
                                $("iframe").attr("src", "action/xxe/error");
                                SetTimeOut("seventeen", 1000);
                            } else if (response == "not download") {
                                $("iframe").attr("src", "action/xxe/error");
                            }
                        },
                    });
                }
                $("iframe").attr("src", val);
            }
        });
        $("#DDT").click(function () {
            $("iframe").attr("src", "action/xxe/DDT");
        });
        $("#next-step-four").click(function () {
            SetTimeOut("five", 1000);
            SetTimeOut("six", 6000);
            SetTimeOut("seven", 8000);
        });
        $("#DDT-InternalDDTEntity").click(function () {
            $("iframe").attr("src", "action/xxe/DDT-InternalDDTEntity");
        });
        $("#next-step-nine").click(function () {
            SetTimeOut("ten", 1000);
            SetTimeOut("eleven", 5000);
            SetTimeOut("twelve", 9000);
            $("iframe").attr("src", "action/xxe/login");
        });
        $("#DDT-ExternalDDTEntity").click(function () {
            $("iframe").attr("src", "action/xxe/DDT-ExternalDDTEntity");
        });
        $("#logout").click(function () {
            $("iframe").attr("src", "action/xxe/logout");
        });
        $("#next-step-seventeen").click(function () {
            SetTimeOut("eighteen", 1000);
            SetTimeOut("nineteen", 5000);
            SetTimeOut("twenty", 9000);
        });
        $("#prevent-xxe").click(function () {
            $("iframe").attr("src", "action/xxe/prevent");
        });
        $("#file-xml").click(function () {
            $("iframe").attr("src", "action/xxe/file-xml");
        });
    });
});
