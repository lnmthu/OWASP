<div class="barRight">
    <div class="title">
        <p>Broken Authentication</p>
        <p>Hướng dẫn</p>
    </div>
    <div class="content">
        <div class="guide one">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">1</span>
                Broken authentication là lỗ hổng liên quan tới vấn đề xác thực người dùng, quản lý phiên được triển khai chưa đúng cách, cơ chế quản lý yếu<br>
                Cho phép Hacker có thể bẻ khoá paswords, keys, session tokens hay lợi dụng để thực hiện khai thác các lỗ hổng khác nhằm chiếm được định danh của người dùng tạm thời hoặc vĩnh viễn.
            </p>
        </div>

        <div class="guide two">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">2</span>
                Kịch bản này khai thác khuyết điểm của cơ chế đăng nhập ứng dụng có thể cho phép “kẻ phá hoại” đoán biết những mật khẩu kém, thực hiện tấn công brute-force hoặc vượt qua phần đăng nhập.<br>
                <a id="next-step-three" class="href"> Okey, let go.</a>
            </p>
        </div>
        <div class="guide three">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">3</span>
                Bobby để ý thấy Panda – bạn của anh ta hay đăng nhập mạng xã hội với username là <strong>pandalovely@gmail.com</strong><br>
                Là bạn thân anh ta hiểu hẳn là Panda sẽ không đặt một password phức tạp đâu. Vậy là Bobby quyết định tìm password để vô tài khoản của Panda. <br>
                Thử đăng nhập <br>
                Name: <span class='red'>pandalovely@gmail.com</span><br>
                Password: <span class='red'>Panda</span>
            </p>
        </div>
        <div class="guide four">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">4</span>
            <strong>Kết quả: Thông tin đăng nhập không chính xác</strong><br>
            Bobby thử chèn query sql vào <strong>Password</strong><br>
            <span class="red">' or email = 'pandalovely@gmail.com' #</span><br>
            <a id="redirect-to-login" class='href'>Hãy hoàn thành nhiệm vụ này</a> và xem kết quả
            </p>
        </div>
        <div class="guide five">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">5</span>
                <strong>Kết quả cho thấy tấn công SQL Ịnection đã bị vô hiệu hoá.</strong><br>
                Bobby tạo 1 file <strong>password.txt</strong> gồm những mật khẩu hay xuất hiện nhất
            </p>
        </div>
        <div class="guide six">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">6</span>
                Bobby tạo file <strong>crackpass.php</strong> để thực hiện tấn công <strong>Brute-Force</strong> bằng những password dễ đoán được tạo trong file <strong>password.txt</strong>
            </p>
        </div>

        <div class="guide seven">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">7</span>
                Bobby thực hiện <strong>Brute-Force</strong> bằng CMD:<br>
                <span class="red">php5 crackpass.php</span><br>
            </p>
        </div>
        <div class="guide eight">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">8</span>
                Vào <a class="href exec-brute-force">Terminal</a> thực thi CMD trên<br>
                Nếu tìm thấy password này, hãy sử dụng nó và tiến hành <a class="href" id="logout-show">Đăng nhập</a>.
            </p>
        </div>
        <div class="guide nine">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">9</span>
                Tài khoản của Panda đã bị Bobby chiếm đoạt
            </p>
        </div>
        <div class="guide ten">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">10</span>
                Do password quá đơn giản nên Bobby mới có thể sử dụng tấn công Brute-Force để tìm password của Panda. 
            </p>
        </div>
        <div class="guide eleven">
            <img class="symbol" src="images/user.png">
            <p><span class="number">11</span>
                Vậy để khắc phục ta nên: <br>
                Yêu cầu đặt <span class="red">password ít nhất 8 kí tự bao gồm cả chữ và số</span><br>
                Tích hợp <span class="red">Captcha + Cross-site request forgeries (CSRF)</span> để ngăn chặn cuộc tấn công Brute Force.<br>
                Tiến hành <a class="href" id="BA-prevent">triển khai ngăn chặn</a>
            </p>
        </div>
        <div class="guide twelve">
            <img class="symbol" src="images/user.png">
            <p><span class="number">12</span>
                Hãy <strong>Thay đổi </strong> password khác trong phần <strong>Menu</strong>            </p>
        </div>
        <div class="guide thirteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">13</span>
                Hãy  <strong>Đăng xuất và Đăng nhập</strong> lại bằng password này</p>
        </div>
        <div class="guide fourteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">14</span>
                Sau đó, hãy vào <a class="href exec-brute-force">Terminal</a> và thực thi <strong>CMD</strong><br>
                <span class="red">php5 crackpassprevent.php</span><br>
                Để tấn công Brute Force
            </p>
        </div>
        <div class="guide fifteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">15</span>
                Chúc mừng đã hoàn thành xong kịch bản tấn công <strong>Broken Authentication</strong>
            </p>
        </div>
    </div>

</div>
