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
                <p><span>Kết quả:</span><?php echo e($search); ?></p>
                <?php endif; ?>
              </div>

              <button 
             type="button" data-toggle="popover" data-placement="left" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"
              class="viewSourceAttack">View Source</button>

            </div>
          </div>

        </div>
        <div class="barRight">
          <div class="title">
            <p>Reflected</p>
            <p>Ngăn chặn</p>
          </div>
          <div class="content">
            <div class="guide">
              <p class="document"><span class="step">1</span>Hãy nhập bất kì các script gì bạn muốn và xem kết quả.<br>Bạn có thể view source để xem chi tiết cách ngăn chặn</p>
            </div>
            
           

            
        
          </div>

        </div>
      </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html><?php /**PATH /var/www/resources/views/prevent/xss/prenventXss.blade.php ENDPATH**/ ?>