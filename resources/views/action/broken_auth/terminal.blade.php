@extends('action.layout.index')
@section('title')
 Broken Authentication
@endsection
@section('nameAttack')
Broken Authentication
@endsection
@section('contentAttack')
<div id="terminal-container"></div>
@endsection
@section('css')
<link rel="stylesheet" href="css/xterm.css" />
@endsection
@section('script')
<script src="js/xterm.js"></script>
<script src="/addons/fit/fit.js"></script>
<script src="/socket.io/socket.io.js"></script>
<script  type="module" src="js/broken-auth.js"></script>
@endsection

