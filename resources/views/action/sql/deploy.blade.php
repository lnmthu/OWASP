@extends('action.layout.index')
@section('title')
  SQL Injection
@endsection
@section('nameAttack')
    Relected XSS
@endsection
@section('contentAttack')
    <div class='code'>
        <p class="name-code">source.php</p>
        <a href="action/sql/login" class='back'>Back</a>
        @if(session('fail'))
            <p class="fail">{{ session('fail') }}</p> 
        @endif
        <form action="action/sql/post-code-prevent" method="post">
            @csrf
            <button id="deploy" class="deploy">Deploy</button>
            <textarea name="code" id="text-code" class="text-code">@if(session('codePreventSql')){{ session('codePreventSql') }} @endif </textarea>
        </form>
    </div>
@endsection
