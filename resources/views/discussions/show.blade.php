@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <main class="py-4">
        <div class="card">
            <div class="card-header">
                <img src="{{ $d->user->avatar }}" alt="Avatar file" width="40px" height="40px">
                &nbsp;&nbsp;&nbsp;
                <span> {{$d->user->name}}, <b>{{$d->created_at->diffForHumans()}}</b></span>
                @if($d->is_being_watched_by_auth_user())
                    <a href="{{ route('discussion.unwatch',['id' => $d->id])}}"
                    class="btn btn-default btn-xs pull-right">unwatch</a>
                @else
                    <a href="{{ route('discussion.watch',['id' => $d->id]) }}"
                    class="btn btn-default btn-xs pull-right">watch</a>
                @endif    
            </div>
        
            <div class="card-body">
                <h5 class="text-center">
                    <b>{{$d->title}}</b>
                </h5><hr>
                <p class="text-center">
                    {{ $d->content }}
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
        
        @foreach ($d->replies as $r)
        <div class="card">
            <div class="card-header">
                <img src="{{ $r->user->avatar }}" alt="Avatar file" width="40px" height="40px">
                &nbsp;&nbsp;&nbsp;
                <span> {{$r->user->name}}, <b>{{$r->created_at->diffForHumans()}}</b></span>
        
            </div>
            <div class="card-body">
                <p>{{ $r->content}}</p>
            </div>
            <div class="card-footer">
                <p>
                    @if($r->is_liked_by_auth_user())
                        <a href="{{route('reply.unlike',['id' => $r->id]) }}" 
                            class="btn btn-danger btn-xs"> Unlike 
                        <span class="badge">{{ $r->likes->count()}}</span></a>
                    @else
                        <a href="{{route('reply.like',['id' => $r->id]) }}" 
                            class="btn btn-success btn-xs"> Like
                        <span class="badge">{{ $r->likes->count()}}</span></a>    
                    @endif
                </p>
            </div>
        </div><br>
        @endforeach
        
        @if(Auth::check())
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('discussion.reply',['id' => $d->id])}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="reply">Leave a reply...</label>
                            <textarea name="reply" id="reply" cols="30" rows="10" class="form-control">
            
                                    </textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn pull-right">Leave a reply </button>
                        </div>
                    </form>
                </div>
            </div><br>
        @else
            <div class="card">
                <div class="card-body">
                    <div class="form-group text-center">
                        <h2> Sign in to leave a reply</h2>
                    </div>
                </div>
            </div>        
        @endif
    </main>
</div>
@endsection