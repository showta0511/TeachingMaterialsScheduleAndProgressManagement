@extends('layouts.main')

@section('content')
<div class="container">
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light scrolled awake" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Raptor.</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
          <li class="nav-item"><a href="domain.html" class="nav-link">Domain</a></li>
          <li class="nav-item"><a class="nav-link" href="hosting.html">Hosting</a></li>
          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
          <li class="nav-item cta"><a href="contact.html" class="nav-link"><span>Get started</span></a></li>
        </ul>
      </div>
    </div>
  </nav>
    <div class="row">
    @if(empty($goal))
        <div class="col-lg-8 col-lg-offset-2 centered">
            <h1>ようこそ！</h1>
            <p>さっそく理想の入力しよう！</p>
            <a href="{{route('goal.create')}}">作成する</a>
        </div>
    </div>
    @endif
    @if(!empty($goal))
    <div class="container">
        <a class="nav-link" href="{{route('goal.show',['goal'=>$goal->id])}}">
        <div class="card">
            <div class="card-header">
                なりたい自分
            </div>
            <div class="card-body ">
                <h1>{{$goal->title}}</h1>
                <p class="card-text">動機：{{$goal->motive}}</p>
            </div>
        </div>
        </a>
    </div>
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <br>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(!empty($for_goals))
            <div class="list-group pt-5">
                <button class="list-group-item list-group-item-action active" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                なりたい自分に必要な要素
                </button>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <form action="{{route('for_goal.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="goal_id" value="{{$goal->id}}">
                            <label for="title">必要な要素</label>
                            <input id="title" name="title" type="text" value="{{old('title')}}">
                            <input type="submit" value="作成する">
                        </form>
                    </div>
                </div>
                @foreach($for_goals as $for_goal)
                <a class="list-group-item list-group-item-action" href="{{route('for_goal.show',['for_goal'=>$for_goal->id])}}">{{$for_goal->title}}</a>
                @endforeach
            </div>

        @endif
    </div>
    @endif
</div>
@endsection
