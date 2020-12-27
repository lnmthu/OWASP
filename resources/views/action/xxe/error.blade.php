@extends('action.layout.index')
@section('nameAttack')
    XXE
@endsection
@section('head')
    @if(session("enableDownload") == "true")
        <meta http-equiv="refresh" content="0;url=downloadErrorXML">
    @endif
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
        <h3 style="color:red" class="text-center">Đã xảy ra lỗi. Xin kiểm tra lại!<br><br>
        <a href="action/xxe/login-social?social_id=<?=rand();?>">Quay lại</a></h3>
    </div>
@endsection

