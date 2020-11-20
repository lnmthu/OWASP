<div class="barRight">
    <div class="title">
        <p>SQL Injection</p>
        <p>Hướng dẫn</p>
    </div>
    <div class="content">
        <div class="guide one">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">1</span>
            Bobby là một học sinh lười học nhưng vẫn muốn điểm cao.<br>Bobby quyết định tìm cách sửa điểm của mình trên trang web riêng của trường
            </p>
        </div>

        <div class="guide two">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">2</span>
                Bobby vô tình thấy được một thầy đăng nhập vào trang web của trường là <span class="href">school.edu.vn </span> để nhập điểm cho học sinh
            </p>
        </div>
        <div class="guide three">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">3</span>
                Bobby thử vào trang web và đăng nhập <br>
                <strong>Username or email: </strong><span class="request">abc@gmail.com</span> <br>
                <strong>Password: </strong><span class="request">test</span><br>
                <span class="note">Bạn hãy thử đăng nhập như trên</span>
            </p>
        </div>
        <div class="guide four">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">4</span>
                Tất nhiên đây là một tài khoản không có thật và kết quả trả về là<br>
                <span class="note">Email or Password is not correct</span>
            </p>
        </div>
        <div class="guide five">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">5</span>
                Bobby lại tiếp tục thử nhập<br>
                <strong>Username or email: </strong><span class="request">abc@gmail.com</span> <br>
                <strong>Password: </strong><span class="request">test'</span><br>
                <span class="note">Bạn hãy thử đăng nhập như trên</span>
            </p>
        </div>
        <div class="guide six">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">6</span>
                Trang web hiện dòng báo <span class="note"><br> SQL syntax  to use near ''test'''</span><br>
            </p>
        </div>
        <div class="guide seven">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">7</span>
                Vậy có khả năng trang web chứa lỗ hỏng sql injection. Tại sao có lỗ hỏng này ta cùng<br><a id='showFileCode' class="click"> Xem code</a>
            </p>
        </div>
        <div class="guide eight">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">8</span>
                Khi người dùng nhập thông tin đăng nhập và bấm submit, thông tin của người dùng sẽ được gửi tới server thông qua một POST method sau đó sẽ được gán vào một câu lệnh SQL.<br>
                Ở đây đoạn code đó là<br>
                <pre class="code">
$password = isset($_POST['password']) ? $_POST['password'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
                </pre>            
            </p>
        </div>
        <div class="guide nine">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">9</span>
                Sau đó, một truy vấn SQL được tạo và thực thi để tìm kiếm trên cơ sở dữ liệu để xác minh chúng.<br>
                Truy vấn trên tìm kiếm trong bảng.<br>
                Nếu tìm thấy các mục nhập phù hợp, người dùng sẽ được xác thực và ngược lại sẽ nhận được thông báo<br>
                <span class="note">Email or Password is not correct</span><br> 
            </p>
        </div>
        <div class="guide ten">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">10</span>
                Bobby <a class="click" onclick="history.back()">Bắt đầu</a> tấn công trang web, anh ta đăng nhập như sau<br>
                <strong>Username or email: </strong><span class="request">abc@gmail.com</span> <br>
                <strong>Password: </strong><span class="request">test' or 1 = 1 LIMIT 1 #</span><br>
                <span class="note">Bạn hãy thử đăng nhập như trên</span>
            </p>
        </div>
        <div class="guide eleven">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">11</span>
                Nếu tên người dùng đã được biết, điều duy nhất cần bỏ qua là xác minh mật khẩu. <br>
                Điều kiện <span class="blue">or '1' = '1'</span> sẽ luôn đúng, vì vậy việc xác minh mật khẩu không bao giờ xảy ra. <br>
                Dấu <span class="blue">#</span> sẽ biến những command phía sau thành command chú thích<br>
                Cũng có thể nói rằng câu lệnh trên ít nhiều tương đương với<br>
                <span class="blue">SELECT * FROM users LIMIT 1</span>
            </p>
        </div>
        <div class="guide twelve">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">12</span>
                Kết quả Booby đăng nhập thành công với tài khoản của giáo viên và có quyền sửa điểm<br>
            </p>
        </div>
        <div class="guide thirteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">13</span>Vậy làm sao ta khắc phục được SQL Injection?<br>
                Đơn giản, Hãy xóa chức năng Login<br>
                Không, Tôi đùa đó😊<br>
                Như đã nói ở bước 11: Bobby sẽ dựa vào câu lệnh truy vấn SQL<br> 
                <span class="blue">Select * From users Where 'email' = '$email' and 'password' = '$password'</span><br>
                Để truyền vào 'password' câu truy vấn SQL<br>
                <span class="blue">test or 1 = 1' #'</span><br>
                Và sẽ ByPass Login
            </p>
        </div>
        <div class="guide fourteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">14</span>Vậy ta sẽ kiểm soát giá trị đầu vào như thế nào?<br>
                Thật may, trong PHP đã cung cấp thư viện PDO<br>
                Hãy thử suy nghĩ và <span class='note'><a class="click" id="code-prevent">Deploy</a></span>
            </p>
            <button class="help" type="button" data-html="true" data-toggle="popover" data-placement="left" title="Answer"
                data-content="<pre>$password = isset($_POST['password']) ? $_POST['password'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$data = $GLOBALS['database']->prepare('select * from users where email = :email and password = :password')
$data->bindParam( ':email', $email, PDO::PARAM_STR );
$data->bindParam( ':password', $password, PDO::PARAM_STR );
$data->execute();
$row = $data->fetch();
if( $data->rowCount() == 1 ) {
    $_SESSION['id] = $row['id'];
    $_SESSION['name'] = $row['name'];
    return true;
}
return false;
                </pre>
            ">?</button>
        </div>
        <div class="guide fifteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">15</span>PDO hỗ trợ 3 hàm:<br>
                <span class='red'>prepare()</span> sẽ đặt các placeholder vào câu truy vấn SQL<br>
                Ví dụ: Các placeholder như <span class='red'>:email</span>,<span class='red'> :password</span><br>
                <span class='red'>bindParam()</span> sẽ gắn giá trị thực vào các placeholder<br>
                <span class='red'>execute()</span> sẽ thực thi câu lệnh<br>
                <span class="request">Bây giờ bạn thử quay lại Bước 10 để kiểm tra kết quả</span>
            </p>
        </div>
        <div class="guide sixteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">16</span>
                Chúc mừng bạn đã hoàn thành xong cuộc tấn công <span class="red">SQL-Injection</span><br>
            </p>
        </div>
    </div>

</div>
