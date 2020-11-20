@extends('show.layout.index')
@section('title')
Reflected XSS
@endsection
@section('barcenter')
<div class="barCenter">
  <div class="nameAttack">
    <p>Reflected XSS</p>
  </div>
  <iframe name="iframe" id='iframe' class="iframe" src='action/xss/reset'>
  </iframe>
</div>
@endsection
@section('barright')
    @include('show.xss.barright')
@endsection
@section('script')
  <script src="js/reflected-xss.js"></script>
@endsection