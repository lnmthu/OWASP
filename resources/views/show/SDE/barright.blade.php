<div class="barRight">
    <div class="title">
        <p>Sensitive Data Exposure</p>
        <p>Hướng dẫn</p>
    </div>
    <div class="content">
        <div class="guide one">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">1</span>
                Hôm nay hãy cùng Bobby tìm hiểu một tấn công làm lộ dữ liệu nhạy cảm  đơn giản nhất nhé.
            </p>
        </div>

        <div class="guide two">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">2</span>
                Trong kịch bản này ta sẽ thực hiện <strong>Tấn công các thư mục, file của website dựa vào robots.txt</strong>.<br>
                <a class="href" id="next-step-three">Robots.txt là gì?</a>
            </p>
        </div>
        <div class="guide three">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">3</span>
                <strong>Robots.txt</strong> là một file văn bản để quản trị website khai báo cho phép hay không cho phép các User-Agent của Search Engine (BOT) thu thập dữ liệu (Crawl) trong tài nguyên môt website.<br>
                VD: <a class="href">https://abc.com/robots.txt</a>
        </div>
        <div class="guide four">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">4</span>
                <strong>Syntax của robots.txt </strong><br>
                <strong>User-agent:</strong> tên loại BOT (<strong>*</strong> áp dụng cho tất cả) <br>
                <strong>Disallow:</strong>  không cho phép User-Agent truy cập thư mục, file <br>
                <strong>Allow:</strong>  cho phép User-Agent truy cập truy cập thư mục, file 
            </p>
        </div>
        <div class="guide five">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">5</span>
                Hãy sử dung Syntax trên với yêu cầu: <br>
                <strong>Không cho phép tất cả các User-agent truy cập vào file test.txt</strong> <br>
                <a class="href" id="mission-step-five">Hoàn thành nhiệm vụ này.</a>
            </p>
            <button class="help" type="button" data-html="true"  data-toggle="popover" data-placement="left" title="Answer" data-content="
<pre>
User-agent: *
Disallow: /test.txt
</pre>
            ">?</button>
        </div>
        <div class="guide six">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">6</span>
                Okay, giờ ta có một web social đơn giản. <br>
                Hãy truy cập <a class="href" id="access-robots">http://locahost/robots.txt</a> vào <strong>thanh URL của BookFace</strong><br>
                Để xem thực sự Website này có sử dụng robots.txt không? <br>
            </p>
        </div>

        <div class="guide seven">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">7</span>
                Trang web này thực sự sử dụng robots.txt. <br>
                Hãy <strong>Tìm và Mở những file</strong> mà bạn xem là <strong>Secret</strong> nhất 
            </p>
        </div>
        <div class="guide eight">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">8</span>
                Có thể thấy Developer đã ngăn BOT crawl những file này nhưng vô tình đã để lộ những thông tin Secret của website
            </p>
        </div>
        <div class="guide nine">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">9</span>
                Vậy làm sao ta ngăn chặn được tấn công kiểu này. <br> 
                <strong>Sử dụng Allow, Deny để hạn chế truy cập các thư mục <br>
                Thường thêm vào nội dung: <br>
                &lt;Directory /Location> <br>
                   Options None <br>
                   Order deny,allow <br>
                   Deny from all -> Cấm tất cả truy cập vào Location <br>
                &lt;/Directory> <br>
                </strong>
                <a class='href' id="prevent-SDE">Tiến hành ngăn chặn</a>
            </p>
        </div>
        <div class="guide ten">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">10</span>
                Hãy thử truy cập lại các file Secret
            </p>
        </div>
        <div class="guide eleven">
            <img class="symbol" src="images/user.png">
            <p><span class="number">11</span>
                Không thể truy cập file nhưng thông tin về apache và OS bị lộ <br>
                Để tắt thông tin này, chỉ cần thêm 2 config này vào apache2.conf <br>
                <strong>ServerSignature Off <br>
                ServerTokens Prod </strong><br>
                Sau đó khởi động lại Apache<br>
                <a class="href" id="options-OS">Tiến hành thực hiện </a>
            </p>
        </div>
        <div class="guide twelve">
            <img class="symbol" src="images/user.png">
            <p><span class="number">12</span>
                Hãy truy cập lại các file Secret để kiểm chứng.         </div>
        <div class="guide thirteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">13</span>
                Vậy là chúng ta đã hoàn thành xong tấn công cơ bản này. <br>
                Dĩ nhiên là ta không nên lưu những thông tin nhạy cảm trên thư mục gốc của trang web. <br>
                Dữ liệu nhạy cảm muốn truyền đi phải chắc chắn đã được mã hóa. <br>
                Và dù vậy vẫn còn nhiều yếu tố cần lưu ý để tránh phơi nhiễm dữ liệu nhạy cảm mà chúng ta sẽ thực hành thêm ở những kịch bản khác.        </div>
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
