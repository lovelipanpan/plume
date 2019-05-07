@extends('layouts.app')
@section('title', '首页')

@section('content')
  <div class="contain">
    <img src="{{ asset('images/jumbotron.jpg') }}" width="100%" alt="jumbotron">
  </div>
  <div class="row">
    <div class="col-xs-6 col-md-3">
      <div class="thumbnail">
        <a href="">
          <img src="{{ asset('images/jumbotron.jpg') }}" width="100%" alt="">
          <div class="caption">
            <h3>This is my work</h3>
          </div>
        </a>
        <div class="row caption-t">
          <div class="c-left">
            <img class="rounded-circle" src="{{ asset('images/author.png') }}" alt="author" width="30px"> <span>BY Yangyu</span>
          </div>
          <div class="c-right">2019-5-7 22:07</div>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-md-3">
      <div class="thumbnail">
        <a href="">
          <img src="{{ asset('images/jumbotron.jpg') }}" width="100%" alt="">
          <div class="caption">
            <h3>This is my work</h3>
          </div>
        </a>
        <div class="row caption-t">
          <div class="c-left">
            <img class="rounded-circle" src="{{ asset('images/author.png') }}" alt="author" width="30px"> <span>BY Yangyu</span>
          </div>
          <div class="c-right">2019-5-7 22:07</div>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-md-3">
      <div class="thumbnail">
        <a href="">
          <img src="{{ asset('images/jumbotron.jpg') }}" width="100%" alt="">
          <div class="caption">
            <h3>This is my work</h3>
          </div>
        </a>
        <div class="row caption-t">
          <div class="c-left">
            <img class="rounded-circle" src="{{ asset('images/author.png') }}" alt="author" width="30px"> <span>BY Yangyu</span>
          </div>
          <div class="c-right">2019-5-7 22:07</div>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-md-3">
      <div class="thumbnail">
        <a href="">
          <img src="{{ asset('images/jumbotron.jpg') }}" width="100%" alt="">
          <div class="caption">
            <h3>This is my work</h3>
          </div>
        </a>
        <div class="row caption-t">
          <div class="c-left">
            <img class="rounded-circle" src="{{ asset('images/author.png') }}" alt="author" width="30px"> <span>BY Yangyu</span>
          </div>
          <div class="c-right">2019-5-7 22:07</div>
        </div>
      </div>
    </div>
  </div>
@stop
