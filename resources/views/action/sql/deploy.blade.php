@extends('action.layout.index')
@section('nameAttack')
    Relected XSS
@endsection
@section('contentAttack')
    <div class='code'>
        <p class="name-code">{{ $name }}</p>
        <a href="action/xss/reflected-xss" class='back'>Back</a>
        @if(session('fail'))
        <p class="fail">{{ session('fail') }}</p> 
        @endif
        <form action="{{ $action }}" method="get">
            @csrf
            <button id="deploy" class="deploy">Deploy</button>
            <textarea name="code" id="text-code" class="text-code">{!! $code !!}</textarea>
        </form>
    </div>
@endsection
