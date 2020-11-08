@extends('layouts.main')

@section('content')
<div class="container">

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
    <div class="container mt-5">

        <div class="card">
            <div class="card-header">
                <a class="nav-link" href="{{route('goal.show',['goal'=>$goal->id])}}">
                <strong>なりたい自分</strong>
            </div>
            <div class="card-body ">

                <h1>{{$goal->title}}</h1>
                <p class="card-text">動機：{{$goal->motive}}</p>
            </div>
            </a>

        </div>

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
        <div class="title-wrapper">
            <span class="title title-m">
                <strong>[その為にできるようにならないといけない事]</strong>
            </span>
            <span class="title">
                <button style="font-size:10px;" class="btn btn-primary title-btn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    作成
                </button>
            </span>
        </div>

        <div class="list-group mb-5">
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <form action="{{route('for_goal.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="goal_id" value="{{$goal->id}}">
                        <label for="title">その為にできるようにならないといけない事</label>
                        <input id="title" name="title" type="text" value="{{old('title')}}">
                        <input type="submit" value="作成する">
                    </form>
                </div>
            </div>
            @foreach($for_goals as $for_goal)
            <a class="list-group-item list-group-item-action" href="{{route('for_goal.show',['for_goal'=>$for_goal->id])}}">
                <h2>{{$for_goal->title}}</h2>
            </a>
            @endforeach
        </div>

        @endif
    </div>
    @endif
</div>
@endsection
