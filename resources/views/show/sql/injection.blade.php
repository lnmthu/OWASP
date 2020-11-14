@extends('show.layout.index')
@section('title')
SQL Injection
@endsection
@section('barcenter')
<div class="barCenter">
  <div class="nameAttack">
    <p>SQL Injection</p>
  </div>
  <iframe name="iframe" id='iframe' class="iframe" src='action/sql/login'>
  </iframe>
</div>
@endsection
@section('barright')
    @include('show.sql.barright')
@endsection
@section('script')
  <script src="js/sql-injection.js"></script>
@endsection