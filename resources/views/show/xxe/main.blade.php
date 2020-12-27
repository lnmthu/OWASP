@extends('show.layout.index')
@section('title')
XXE
@endsection
@section('barcenter')
<div class="barCenter">
  <div class="nameAttack">
    <p>XXE</p>
  </div>
  <iframe name="iframe" id='iframe' class="iframe" src='action/xxe/reset'>
  </iframe>
</div>
@endsection
@section('barright')
    @include('show.xxe.barright')
@endsection
@section('script')
  <script src="js/xxe.js"></script>
@endsection