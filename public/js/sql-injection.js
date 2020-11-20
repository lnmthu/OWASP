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
                        SetTimeOut("thirteen",8000);
                        SetTimeOut("fourteen",14000);
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
        // deploy
        iframe.find("#deploy").click(function() {
            var code = iframe
                .find("#text-code")
                .val()
                .replace(/\s+/g, "");
            var string = "$password = isset($_POST['password']) ? $_POST['password'] : null;$email = isset($_POST['email']) ? $_POST['email'] : null;$data = $GLOBALS['database']->prepare('select * from users where email = :email and password = :password')$data->bindParam( ':email', $email, PDO::PARAM_STR );$data->bindParam( ':password', $password, PDO::PARAM_STR );$data->execute();$row = $data->fetch();if( $data->rowCount() == 1 ) {$_SESSION['id] = $row['id'];$_SESSION['name'] = $row['name'];return true;}return false;";
            var test = string.replace(/\s+/g, "");
            if(code == test){
                SetTimeOut("fifteen",1000);
                SetTimeOut("sixteen",6000);
            }
        });
        // access url
        iframe.find(".address").keypress(function(e) {
            var val=$(this).val().replace(/\s+/g, "");
              if (e.which === 13) {
                  $("iframe").attr("src",val.slice(17));
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
        $("#code-prevent").click(function(){
            $("iframe").attr("src", "action/sql/show-code-prevent");
        });

    });
});
