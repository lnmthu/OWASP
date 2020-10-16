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
  <base href="{{asset('')}}">

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
          <div class="menu"><a>Logout</a></div>
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
                @if($search)
                <p><span>Kết quả:</span><?php echo $search?></p>
                @endif
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
            <p>Hướng dẫn</p>
          </div>
          <div class="content">
            <div class="guide">
              <p class="symbol">A</p>
              <p class="document"><span class="step">1</span>Bobby để ý trang web <span>shopping</span> có trường tìm kiếm</p>
              <button class="help" type="button" data-toggle="popover" data-placement="left" title="Popover title"
               data-content="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.">?</button>
            </div>
            
            <div class="guide">
              <p class="symbol">A</p>
              <p class="document"><span class="step">1</span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur nesciunt fugiat, libero repellendus quam necessitatibus incidunt vitae maxime! Quam optio quo quis magni voluptates! Soluta, quis aliquam! Officia, veritatis neque.</p>
              <button class="help" type="button" data-toggle="popover" data-placement="left" title="Answer"
               data-content="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.">?</button>
            </div>
            <div class="guide">
              <p class="symbol">A</p>
              <p class="document"><span class="step">1</span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur nesciunt fugiat, libero repellendus quam necessitatibus incidunt vitae maxime! Quam optio quo quis magni voluptates! Soluta, quis aliquam! Officia, veritatis neque.</p>
              <button class="help" type="button" data-toggle="popover" data-placement="left" title="Answer"
               data-content="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.">?</button>
            </div>
            <div class="guide">
              <p class="symbol">A</p>
              <p class="document"><span class="step">1</span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur nesciunt fugiat, libero repellendus quam necessitatibus incidunt vitae maxime! Quam optio quo quis magni voluptates! Soluta, quis aliquam! Officia, veritatis neque.</p>
              <button class="help" type="button" data-toggle="popover" data-placement="left" title="Answer"
               data-content="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.">?</button>
            </div>
            <div class="guide">
              <p class="symbol">A</p>
              <p class="document"><span class="step">1</span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur nesciunt fugiat, libero repellendus quam necessitatibus incidunt vitae maxime! Quam optio quo quis magni voluptates! Soluta, quis aliquam! Officia, veritatis neque.</p>
              <button class="help" type="button" data-toggle="popover" data-placement="left" title="Popover title"
               data-content="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.">?</button>
            </div>
            
        
          </div>

        </div>
      </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>