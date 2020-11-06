@extends('action.layout.index')
@section('nameAttack')
Relected XSS
@endsection
@section('contentAttack')
<div class="form-auth">
    <div class="browser">
        <div class="nav">
          <span class="buttons">
            <span class="button red"> </span>
            <span class="button orange"> </span>
            <span class="button green"> </span>
          </span>
          <div class="url">
            <input class="address" value="{{ url()->full() }}">
            <div class="load-icon"></div>
          </div>
        </div>
      </div>
      <div class="signup">
    <h3 class="text-center">Sign up</h3>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form id="register" action="action/xss/register" method="POST" data-toggle="validator" role="form">
                    @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="name"
                        placeholder="Please enter your Username" data-error="Please enter your Username" required >
                    <div class="help-block with-errors"></div>
                </div>
                @csrf
                <div class="form-group">
                <label for="email">Email</label>
                <input type="email"  class="form-control" id="email" name="email"
                    placeholder="Please enter your Email" data-error="Bruh, that email address is invalid" required >
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password" placeholder="Please Enter Password"  data-error="Minimum of 6 characters" data-minlength="6"  required  />
                    <div class="help-block with-errors"></div>
                </div>
                  <div class="form-group">
                    <label for="repass">Re_Password</label>
                      <input class="form-control" type="password" id="repass" name="repass"
                      data-match="#password" data-error="Please enter your Re_Password" data-match-error="Whoops, these don't match" placeholder="Confirm"
                      required > 
                      <div class="help-block with-errors"></div>
                    </div>
                <button type="submit" class="btn btn-primary auth">Sign up</button>
            </form>
            <div class="login">
                <span>Bạn đã có tài khoản?</span><a href="action/xss/login">Đăng nhập</a>
                </div>
        </div>
    </div>      
</div>    
</div>
@endsection
