@extends('action.layout.index')
@section('contentAttack')
    <div class="formAttack social">
        <div class="browser">
            <div class="nav">
                <span class="buttons">
                    <span class="button red"> </span>
                    <span class="button orange"> </span>
                    <span class="button green"> </span>
                </span>
                <div class="url">
                    <input class="address" value="{{ $url }}">
                    <div class="load-icon"></div>
                </div>
            </div>
        </div>
        <div class="contentForm">
            <textarea disabled class="robots">{!! $text !!}</textarea>
        </div>
    </div>
@endsection
