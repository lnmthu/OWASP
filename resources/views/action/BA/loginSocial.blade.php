@extends('action.layout.index')
@section('nameAttack')
XXE
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
  <div class="nav-social">
    <img class="icon-social" alt="bookface" src="images/bookface.png">
    <h3 class="name-social">BookFace</h3>
  </div>
    <input type="hidden" id="sessionEnableDownload" value="<?= session("enableDownload") ?>" />
    <h3 class="text-center">Login</h3>
        <div class="alert alert-success" role="alert" style="display: none">
        </div>
        <div class="alert alert-danger alert-login" style="display: none">
      </div>
        <form id="login" action="action/xxe/login-social" method="POST" data-toggle="validator" role="form">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email"
              placeholder="Please enter your Email" data-error="Bruh, that email address is invalid" required>
              <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password"
              placeholder="Please enter your Password" data-error="Please enter Password" required>
              <div class="help-block with-errors"></div>
          </div>
          <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
          <br/>
          {{-- @if($errors->has('g-recaptcha-response'))
          <span class="invalid-feedback" style="display:block">
            <strong>{{$errors->first('g-recaptcha-response')}}</strong>
          </span>
          @endif --}}

          <button type="submit" class="btn btn-primary auth">Login</button>
        </form>
        <div class="register">
            <span>Bạn không có tài khoản?</span><a href="action/BA/register-social">Đăng ký</a>
        </div>
      </div>
@endsection
@section('script')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection