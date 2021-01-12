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
                    <input class="address" value="{{ url()->full() }}">
                    <div class="load-icon"></div>
                </div>
            </div>
        </div>
        <div class="nav-social">
            <img class="icon-social" alt="bookface" src="images/bookface.png">
            <h3 class="name-social">BookFace</h3>
        </div>
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle dropdown-custom" type="button" data-toggle="dropdown">
            Menu <span class="caret" aria-hidden="true"></span>
          </button>
          <ul class="dropdown-menu">
              <li>
                  {{-- <a href="action/BA/info">{{ Auth::user()->name }}</a> --}}
              </li>
              <li>
                  <a href="action/BA/logout">Logout</a>
              </li>
          </ul>
      </div>



        <div class="contentForm">
            {{ $product->name." giá là: ".$product->price }}
        </div>
    </div>
@endsection
