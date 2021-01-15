@extends('action.layout.index')
@section('nameAttack')
    Sensitive Data Exposure
@endsection
@section('contentAttack')
    <div class='code'>
        <p class="name-code">{{ $name }}</p>
        <a href="action/SDE/social" class='back'>Back</a>
        <p class="fail"></p> 
        <p class="success"></p> 
        <form id="code" action="{{ $action }}" method="post">
            @csrf
            <button id="deploy" class="deploy">Deploy</button>
            <textarea name="code" id="text-code" class="text-code">{!! $code !!}</textarea>
        </form>
    </div>
@endsection