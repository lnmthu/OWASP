@extends('action.layout.index')
@section('title')
  SQL Injection
@endsection
@section('contentAttack')
<div class="formAttack">
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
  <div class="headerForm SqlInjection">
    <p>Login Page</p>
  </div>
  <div class="form-auth SqlInjection">
          @if (session("success"))
          <div class="alert alert-success" role="alert">
            {{ session("success") }}
          </div>
          @endif
          <div class="alert alert-danger alert-login" style="display: none"></div>
          <form id="login" action="action/sql/login" method="POST" data-toggle="validator" role="form">
            @csrf
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
            <button type="submit" class="btn btn-primary auth">Login</button>
          </form>
   </div>
   <textarea disabled class="showSql"></textarea>
</div>
@endsection
