@extends('layouts.main')

@section('content')

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
<div class="container content-card mt-5">
    <h1 class="content-title mt-3">なりたい自分</h1>

    <a class="nav-link" href="{{route('goal.show',['goal'=>$goal->id])}}">
        <div class="card-body ">

            <h1>{{$goal->title}}</h1>
            <p class="card-text">動機：{{$goal->motive}}</p>
        </div>
    </a>
    <button style="font-size:20px; width:340px; text-decoration:none;" class="btn edit-btn btn-link mb-3" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        理想に必要な要素
    </button>
</div>
<div class="collapse container content-card mt-5 mb-5 pt-5 pb-3" id="collapseExample">
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



    <div class="learning-path-show__step__heading">
        <h2 font-size="[object Object]" class="content-title gGWJOW">理想に必要な要素</h2>
    </div>
    <div class="learning-path-show__step__checkpoint-badges-container">
        <div class="m-2">
            <a data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
                <i class="fa fa-flag" style="color: rgb(186, 198, 211); font-size: 16px;">
                    作成 >>
                </i>
            </a>
        </div>
    </div>
    <table class="for-goal-table">
        <tr>
            <td>
                <div class="mt-2">
                    <div class="collapse" id="collapseExample2">
                        <div class="card card-body">
                            <form action="{{route('for_goal.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="goal_id" value="{{$goal->id}}">
                                <input name="title" type="text" value="{{old('title')}}">
                                <input type="submit" value="作成する">
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @foreach($for_goals as $for_goal)
        <tr>
            <td>
                <a class="list-group-item list-group-item-action" href="{{route('for_goal.show',['for_goal'=>$for_goal->id])}}">
                    <h2>{{$for_goal->title}}</h2>
                </a>
            </td>
        </tr>
        @endforeach

    </table>

</div>
</div>

</div>

@endif
</div>
@endif

@endsection
