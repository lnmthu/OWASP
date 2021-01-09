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
      <div class="signup">
    <h3 class="text-center">Information</h3>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form id="info" action="action/BA/info" method="POST" data-toggle="validator" role="form">
                <div class="alert alert-success" role="alert" style="display: none">
                </div>
                <div class="alert alert-danger" style="display: none">
                    <ul class = "alert-errors">    
                    </ul>
                </div>
                @php
                    $user = Auth::user();
                @endphp
                <div class="form-group">
                    <label for="username">Username</label>
                    <input value="{{ $user->name }}" type="text" class="form-control" id="name" name="name"
                        placeholder="Please enter your Username" data-error="Please enter your Username" required >
                    <div class="help-block with-errors"></div>
                </div>
                @csrf
                <div class="form-group">
                <label for="email">Email</label>
                <input disabled value="{{ $user->email }}" type="email" class="form-control" id="email" name="email"
                    placeholder="Please enter your Email" data-error="Bruh, that email address is invalid" >
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password" placeholder="Please Enter Password"/>
                    <div class="help-block with-errors"></div>
                </div>
                  <div class="form-group">
                    <label for="repass">Re_Password</label>
                      <input class="form-control" type="password" id="repass" name="repass"
                      data-match="#password" data-error="Please enter your Re_Password" data-match-error="Whoops, these don't match" placeholder="Confirm"
                      required > 
                      <div class="help-block with-errors"></div>
                    </div>
                    <button onclick="window.history.back();" class="btn btn-light back">Back</button>
                    <button type="submit" class="btn btn-primary auth edit">Edit</button>
                </form>
           
        </div>
    </div>      
</div>    
</div>
@endsection
