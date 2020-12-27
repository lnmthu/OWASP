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
  <div class="headerForm">
    <p>Shopping Online</p>
  </div>
    <h3 class="text-center">Login with</h3>
    <a href="action/xxe/login-social?social_id=<?=rand();?>"><img class="social" alt="bookface" src="images/bookface.png"></a>
</div>
@endsection