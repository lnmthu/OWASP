<div class="barRight">
    <div class="title">
        <p>SQL Injection</p>
        <p>Hướng dẫn</p>
    </div>
    <div class="content">
        <div class="guide one">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">1</span>
            Bobby là một học sinh lười học nhưng vẫn muốn điểm cao.<br>Bobby quyết định tìm cách sửa điểm của mình trên trang web riêng của trường <span class="href">school.edu.vn </span>
            </p>
        </div>

        <div class="guide two">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">2</span>
                Booby vô tình thấy được tên đăng nhập của thầy là <span class='request'>qt@gmail.com</span> để truy cập <span class='href'>school.edu.vn</span> nhưng cậu ta không biết mật khẩu
            </p>
        </div>
        <div class="guide three">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">3</span>
                Bobby thử nhập <br>
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
                Vậy có khả năng trang web chưa lỗ hỏng sql injection. Tại sao có lỗ hỏng này ta cùng<br><a id='showFileCode' class="click"> Xem code</a>
            </p>
        </div>
        <div class="guide eight">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">8</span>
                Khi người dùng nhập thông tin đăng nhập và bấm submit, thông tin của người dùng sẽ được gửi tới server thông qua một POST method sau đó sẽ được gán vào một câu lệnh SQL.<br>
                Ở đây đoạn code đó là<br>
                <span class="code">
                    $password = isset($_POST['password']) ? $_POST['password'] : null;<br>
                    $email = isset($_POST['email']) ? $_POST['email'] : null;<br>
                </span>            
            </p>
        </div>
        <div class="guide nine">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">9</span>
                Sau đó, một truy vấn SQL được tạo và thực thi để tìm kiếm trên cơ sở dữ liệu để xác minh chúng.<br>
                Truy vấn trên tìm kiếm trong bảng.<br>
                Nếu tìm thấy các mục nhập phù hợp, người dùng sẽ được xác thực và ngược lại sẽ nhập được thông báo<br>
                <span class="note">Email or Password is not correct</span><br> 
                Hoặc<br>
                <span class="note">Lỗi SQL systax</span><br>
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
            <img class="symbol" src="images/user.png">
            <p><span class="number">11</span>
                Nếu tên người dùng đã được biết, điều duy nhất cần bỏ qua là xác minh mật khẩu. <br>
                Điều kiện <span class="blue">or '1' = '1'</span> sẽ luôn đúng, vì vậy việc xác minh mật khẩu không bao giờ xảy ra. <br>
                Dấu <span class="blue">#</span> sẽ biến những command phía sau thành command chú thích<br>
                Cũng có thể nói rằng câu lệnh trên ít nhiều tương đương với<br>
                <span class="blue">SELECT * FROM users LIMIT 1'</span>
            </p>
        </div>
        <div class="guide twelve">
            <img class="symbol" src="images/user.png">
            <p><span class="number">12</span>
                Kết quả Booby đăng nhập thành công với tài khoản của giáo viên và có quyền sửa điểm
            </p>
        </div>
        <div class="guide thirteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">13</span>
                Hehe, bây giờ bobby chỉ cần <a id='file-cookie' class="click">Xem tệp</a> takecookie.txt là có thể biết được cookie của Panda
            </p>
        </div>
        <div class="guide fourteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">14</span>Vậy làm sao ta khắc phục được reflected XSS?<br>
                Đơn giản, Hãy xóa thanh tìm kiếm<br>
                Không, Tôi đùa đó😊<br>
                Như đã nói ở bước 4: Biến keywork nhận giá trị bất kì và rồi truyền lên server xử lý. Nhưng server đã
                không kiểm soát giá trị đầu vào này trước khi trả về cho trình duyệt dẫn đến mã javascript bị chèn vào
                trong source code.
            </p>
        </div>
        <div class="guide fifteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">15</span>Vậy ta sẽ kiểm soát giá trị đầu vào như thế nào?<br>
                <span class='note'>Hãy thử suy nghĩ và <a class="click" id="code-prevent">Deploy</a></span>
            </p>
            <button class="help" type="button" data-html="true" data-toggle="popover" data-placement="left" title="Answer"
                data-content="if(isset($_GET['search']))<br>return htmlspecialchars($_GET['search']);">?</button>
        </div>
        <div class="guide sixteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">16</span>Bằng cách sử dụng hàm <span class='emphasize'>htmlspecialchars()</span> sẽ
                giúp thay thế các kí tự Dạng ứng dụng, <br>ví dụ: <span class='emphasize'>“<“ thành “&amp;lt;”</span><br>
                <span class="request">Bây giờ bạn thử sử dụng script tìm kiếm trên trang shopping để kiểm tra kết quả</span>
                        <br>Chúc mừng bạn đã hoàn thành xong cuộc tấn công <span class="name">Reflected-XSS</span><br>
            </p>
        </div>




    </div>

</div>
