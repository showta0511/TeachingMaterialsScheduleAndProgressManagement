@extends('layouts.main')

@section('content')

<div class="row">
    @if(empty($goal))
    <div class="container content-card mt-5 p-5">
        <div style="margin:0 auto; width:500px;">
            <h1>ようこそ！</h1>
            <h3>自分の目指す姿を入力しよう</h3>
            <br>
            <a href="{{route('goal.create')}}" class="btn edit-btn btn-link" style="width: 120px;">作成する</a>
        </div>
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
                                <input id="title" type="text" style="box-shadow: none !important; width:380px;" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}" required autocomplete="title" autofocus>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input type="submit" class="btn edit-btn btn-link mt-3 media-btn" style="width:100px;" value="作成する">
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
