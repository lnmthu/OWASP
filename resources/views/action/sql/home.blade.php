@extends('action.layout.index')
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
  <div class="headerForm">
    <a class="logout" href="action/sql/logout">Logout ({{ Auth::user()->name }})</a>
    <p>Education Online</p>
  </div>
  <div class="contentForm">
    <form id='form-search' class="form-inline" action="action/sql/search" method="post" role="form">
      @csrf
      <div class="form-group">
        <label for="">Tìm kiếm</label>
        <input name="search" type="text" class="form-control" id="valSearch" placeholder="Nhập từ khoá">
      </div>
      <button type="submit" id='search' class="btn btn-primary">Tìm</button>
    </form>
    @if(session("search"))
    <p><span>Kết quả:</span>{{ session("search") }}</p>
    @endif
  </div>
</div>
@endsection
