<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" >
  <link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css" >
  <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" >
  <link type="text/css" rel="stylesheet" href="css/style.css" >
  <base href="{{asset('')}}">

</head>

<body>

  <div id="content">
      <div class="container-fluid">   
          <div class="form-auth">
            <h3 class="text-center">Login</h3>
            <div class="row">
              <div class="col-md-4 col-md-offset-4">
                @if (session("fail"))
                <div class="alert alert-danger" role="alert">
                  {{ session("fail") }}
                </div>
                @endif
                @if (session("success"))
                <div class="alert alert-success" role="alert">
                  {{ session("success") }}
                </div>
                @endif
                @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                <form action="login" method="POST" data-toggle="validator" role="form">
                  @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    {{-- type="email" --}}
                    <input  class="form-control" id="email" name="email"
                      placeholder="Please enter your Email" data-error="Bruh, that email address is invalid" >
                      <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                      placeholder="Please enter your Password" data-error="Please enter Password" >
                      <div class="help-block with-errors"></div>
                  </div>
                  <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <div class="register">
                    <span>Bạn không có tài khoản?</span><a href="register">Đăng ký</a>
                </div>
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