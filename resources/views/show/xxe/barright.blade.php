<div class="barRight">
    <div class="title">
        <p>XXE</p>
        <p>Hướng dẫn</p>
    </div>
    <div class="content">
        <div class="guide one">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">1</span>
                Trước khi đi vào kịch bản tấn công, chúng ta hãy tìm hiểu qua các định nghĩa sau qua các nhiệm vụ.<br>
                XML là ngôn ngữ đánh dấu mở rộng, được thiết kế với mục đích lưu trữ, truyền dữ liệu và cả "người" và "máy" đều có thể đọc được.
            </p>
        </div>

        <div class="guide two">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">2</span>
                DTD (document type definitions) <strong>"định nghĩa loại tài liệu"</strong> thông qua việc xác định cấu trúc cũng như chỉ ra format hợp lệ của các elements và attributes trong file XML.<br>
                Syntax:<br>
                <span class="red">
                &lt!DOCTYPE name-elements<br>
                [<br>
                &lt!ELEMENT name-elements (name-elements-children)><br>
                &lt!ELEMENT name-elements-children (type-elements-children)><br>
                …..<br>
                ]>
                </span>
            </p>
        </div>
        <div class="guide three">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">3</span>
                Hãy  <strong>DDT (định nghĩa loại tài liệu)</strong> <a id="DDT" class="href">Này</a> bằng Syntax trên (Hãy tìm ?1,?2,?3,?4 trong phần DOCTYPE và thay thế chúng)
            </p>
            <button class="help" type="button" data-html="true"  data-toggle="popover" data-placement="left" title="Answer" data-content="
<pre>
?1 : heading
?2 : body
?3 : &ltELEMENT heading (#PCDATA)&gt
?4 : &ltELEMENT body (#PCDATA)&gt 
Đáp án trên có thể sai Syntax :)
</pre>
            ">?</button>
        </div>
        <div class="guide four">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">4</span>
                Bạn đã hoàn thành nhiệm vụ về <strong>DDT</strong>. Hãy chắc chắn bạn hiểu về <strong>DDT</strong> trước khi bước qua Định nghĩa tiếp theo.<br>
                <a id="next-step-four" class="href">Okey, sure.</a>
            </p>
        </div>
        <div class="guide five">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">5</span>
                <strong>DTD Entity</strong> giống như những biến trong lập trình gồm:<br>
                -	<mark>External DDT Entity</mark><br>
                Syntax:<br>
                <span class="red">&lt!ENTITY name-entity SYSTEM "URI/URL"></span><br><br>
                -	<mark>Internal DDT Entity</mark><br>
                Syntax:<br>
                <span class="red">&lt!ENTITY name- entity "value- entity"></span><br>
            </p>
        </div>
        <div class="guide six">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">6</span>
                Khai báo <mark>External Entity</mark> trong <strong>DDT</strong> chính là điểm mấu chốt trong kỹ thuật tấn công XXE.
            </p>
        </div>

        <div class="guide seven">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">7</span>
                Hãy xem lại systax của <mark>DDT</mark> và <mark>Internal DDT Entity</mark> và <a id="DDT-InternalDDTEntity" class="href">Kết hợp chúng</a> để hoàn thành nhiệm vụ này (Hãy tìm ?1,?2,?3 trong phần DOCTYPE và thay thế chúng)
            </p>

            <button class="help" type="button" data-html="true"  data-toggle="popover" data-placement="left" title="Answer" data-content="
<pre>
?1 : foo
?2 : &ltELEMENT foo 'foo1'&gt
?3 : &ltENTITY bar (World)&gt 
Đáp án trên có thể sai Syntax :)
</pre>
            ">?</button>
        </div>
        <div class="guide eight">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">8</span>
                Có thể thấy bên trong DDT là 1 Entity tên <strong>bar</strong> có giá trị là “World”. Entity này được xem là một <mark>External Entity</mark>.
            </p>
        </div>
        <div class="guide nine">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">9</span>
                Đến đây thì khái niệm về External Entity đã tương đối rõ ràng. Câu hỏi là nó có thể làm được gì ? Chuẩn bị đến kịch bản tấn công nào<br>
                <a id="next-step-nine" class="href"> Okey, Let go.</a>
            </p>
        </div>
        <div class="guide ten">
            <img class="symbol" src="images/attacker.png">
            <p><span class="number">10</span>
                Bạn đã nghe nói hay từng sử dụng qua phương thức xác thực bên thứ 3<br>
                VD: Đăng nhập vào trang bán quần áo bằng Google hoặc Facebook
            </p>
        </div>
        <div class="guide eleven">
            <img class="symbol" src="images/user.png">
            <p><span class="number">11</span>
                Trong Open ID version 2  cho phép sử dụng dịch vụ thông qua XML.<br>
                Nếu việc triển khai Open ID version 2 không an toàn, điều này sẽ cho phép đưa các XML có hại vào
            </p>
        </div>
        <div class="guide twelve">
            <img class="symbol" src="images/user.png">
            <p><span class="number">12</span>
                Booby phát hiện một trang xác thực bên thứ 3 sử dụng Open ID version 2 ( tạm gọi là BookFace).<br>
                Hãy sử dụng tài khoản <span class="href">BookFace</span> để đăng nhập vào trang <mark>Shopping Online</mark> (Nếu chưa có hãy đăng ký)
            </p>
        </div>
        <div class="guide thirteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">13</span>
                Anh ta sử dụng việc kết hợp syntax của <mark>DDT</mark> và <mark>External DDT Entity</mark> để truy cập trái phép <span class="href">file:///etc/passwd</span> của server 
            </p>
        </div>
        <div class="guide fourteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">14</span>
                Hãy xem lại systax của <mark>DDT</mark> và <mark>External DDT Entity</mark> để <a id='DDT-ExternalDDTEntity' class="href">Hoàn thành nhiệm vụ này</a><br>
                (Hãy tìm ?1,?2,?3 trong phần DOCTYPE và thay thế chúng)
            </p>
            <button class="help" type="button" data-html="true" data-toggle="popover" data-placement="left" title="Answer"
            data-content="
<pre>
?1 : foo
?2 : &ltELEMENT foo 'foo1'&gt
?3 : &ltENTITY SYSTEM xxe (file:///etc/passwd)&gt 
Đáp án trên có thể sai Syntax :)
</pre>
            ">?</button>
        </div>
        <div class="guide fifteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">15</span>
                Anh ta cần tạo 1 server để lưu file XML(VD: <a id="file-xml" class="href">localhost/action/xxe/file-xml</a>)
        </div>
        <div class="guide sixteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">16</span>
                Trang social này cho phép sử dụng XML mở rộng bên ngoài<br>
                Việc tiếp theo chỉ cần vào <a id="logout" class="href">Trang xác thực thứ 3</a> này và thêm phần file XML của anh ta vào params “<strong>op_endpoint</strong>” thì anh ta có thể hy vọng thành công <br>
                Đăng nhập bằng Social BookFace và thêm param “<strong>op_endpoint</strong>” với value là <strong>Server lưu file XML</strong> <br>
                VD: /localhost/action/xxe/login-social?social_id=123xxxxxx<span class="href">&op_endpoint=localhost/action/xxe/file-xml</span>
            </p>
        </div>
        <div class="guide seventeen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">17</span>
                Đương nhiên Social sẽ hiện ra lỗi do file XML của anh ta không hợp lệ nhưng một file <strong>errors.xml</strong> đc tải xuống kết hợp thông tin password của từng user trên server.<br>
                Như vậy anh ta đã tấn công thành công. Hãy chắc chắn bạn hiểu cuộc tấn công để qua bước ngăn chặn.
                <a id="next-step-seventeen" class="href">Okey, sure</a>
            </p>
        </div>
        <div class="guide eighteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">18</span>
                Do mấy chốt của tấn công xxe là <mark>External Entity</mark> nên việc <strong>disable</strong> mấu chốt này thì của tấn công XXE sẽ ko thể thực hiện được
            </p>
        </div>
        <div class="guide nineteen">
            <img class="symbol" src="images/user.png">
            <p><span class="number">19</span>
                Trong PHP, hỗ trợ một hàm thực hiện được việc này
                <span class="red">libxml_disable_entity_loader(true);</span>
                Hãy <a id="prevent-xxe" class="href">Triển khai</a> hàm trên vào server của bên xác thực thứ 3 và sử dụng các bước trên để tấn công lại và kiểm tra kết quả

            </p>
        </div>
        <div class="guide twenty">
            <img class="symbol" src="images/user.png">
            <p><span class="number">20</span>
                Nếu bạn thầy dòng thông báo lỗi này nghĩa là bạn đã ngăn chặn thành công:<br>
                <strong>“DOMDocument::loadXML(): I/O warning : failed to load external entity file:///etc/passwd”</strong><br>
                Và Chúc mừng bạn đã hoàn thành xong XXE Attack
                
            </p>
        </div>




    </div>

</div>
