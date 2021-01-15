@extends('action.layout.index')
@section('contentAttack')
    <div class="formAttack social">
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
        <div class="contentForm">
            <form id='form-search' class="form-inline" action="action/BA/search" method="get" role="form">
                @csrf
                <div class="form-group">
                    <label for="">Tìm kiếm</label>
                    <input name="search" type="text" class="form-control" id="valSearch" placeholder="Nhập từ khoá">
                </div>
                <button type="submit" id='search' class="btn btn-primary">Tìm</button>
            </form>
            @if (isset($search))
                <p><span>Kết quả:</span>{{ $search }}</p>
            @endif
        </div>
    </div>
@endsection
