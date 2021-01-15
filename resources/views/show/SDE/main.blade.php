@extends('show.layout.index')
@section('title')
Sensitive Data Exposure
@endsection
@section('barcenter')
<div class="barCenter">
  <div class="nameAttack">
    <p>Sensitive Data Exposure</p>
  </div>
  <iframe name="iframe" id='iframe' class="iframe" src='action/SDE/reset'>
  </iframe>
</div>
@endsection
@section('barright')
    @include('show.SDE.barright')
@endsection
@section('script')
<script src="js/SDE.js"></script>
@endsection