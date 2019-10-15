@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <main class="py-4">
        @foreach ($discussions as $d)
        <div class="card">
            <div class="card-header">
                <img src="{{ $d->user->avatar }}" alt="Avatar file" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                <span> {{$d->user->name}}, <b>{{$d->created_at->diffForHumans()}}</b></span>
                <a href="{{ route('discussion',['slug' => $d->slug])}}" class="btn btn-default pull-right">view</a>
            </div>

            <div class="card-body">
                <h5 class="text-center">
                    <b>{{$d->title}}</b>
                </h5>
                <p class="text-center">
                    {{str_limit($d->content,50)}}
                </p>
            </div>
            <div class="card-footer">
                <span>
                    {{ $d->replies->count()}} Replies
                </span>
                <a href="{{ route('channel',['slug' => $d->channel->slug])}}" class="pull-right btn btn-xs btn-default">
                    {{ $d->channel->title }}
                </a>
            </div>
        </div><br>
        @endforeach

        <div class="text-center">
            {{$discussions->links()}}
        </div>
    </main>
</div>
@endsection