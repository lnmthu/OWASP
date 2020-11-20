@extends('action.layout.index')
@section('nameAttack')
    Relected XSS
@endsection
@section('contentAttack')
    <div class='code'>
        @if(session('fail'))
            <p class="fail">{{ session('fail') }}</p> 
        @endif
        <p class="name-code">{{ $name }}</p>
        <textarea disabled name="code" id="text-code" class="text-code file">{!! $cookie !!}</textarea>
    </div>
@endsection