<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reflected XSS</title>
  <base href="{{asset('')}}">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css" >
  <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" >
  <link type="text/css" rel="stylesheet" href="css/style.css" >

</head>

<body>

  <div id="content">
        <div class="barCenter">
          <div class="contentAttack">
            @yield('contentAttack')
          </div>

        </div>
      </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/validator.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
</body>

</html>