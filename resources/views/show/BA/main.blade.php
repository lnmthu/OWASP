@extends('show.layout.index')
@section('title')
Broken Authentication
@endsection
@section('barcenter')
<div class="barCenter">
  <div class="nameAttack">
    <p>Broken Authentication</p>
  </div>
  <iframe name="iframe" id='iframe' class="iframe" src='action/BA/reset'>
  </iframe>
</div>
@endsection
@section('barright')
    @include('show.BA.barright')
@endsection
@section('script')
<script src="js/BA.js"></script>
@endsection