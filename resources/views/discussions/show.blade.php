@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <main class="py-4">
        <div class="card">
            <div class="card-header">
                <img src="{{ $d->user->avatar }}" alt="Avatar file" width="40px" height="40px">
                &nbsp;&nbsp;&nbsp;
                <span> {{$d->user->name}} <b>({{$d->user->points}}points)</b></span>
                @if($d->hasBestAnswer())
                <span class="btn btn pull-right btn-success btn-xs">
                    closed
                </span>
                @else
                <span class="btn btn pull-right btn-danger btn-xs">
                    open
                </span>
                @endif
                @if(Auth::id() == $d->user->id)
                    @if (!$d->hasBestAnswer())
                        <a href="{{ route('discussion.edit',['slug' => $d->slug])}}" 
                            class="btn btn-info btn-xs pull-right"
                            style="margin-right: 8px;">Edit</a>
                    @endif
                @endif
                @if($d->is_being_watched_by_auth_user())
                    <a href="{{ route('discussion.unwatch',['id' => $d->id])}}"
                    class="btn btn-default btn-xs pull-right" style="margin-right: 8px;">unwatch</a>
                @else
                    <a href="{{ route('discussion.watch',['id' => $d->id]) }}"
                    class="btn btn-default btn-xs pull-right" style="margin-right: 8px;">watch</a>
                @endif    
            </div>
        
            <div class="card-body">
                <h5 class="text-center">
                    <b>{{$d->title}}</b>
                </h5><hr>
                <p class="text-center">
                    {{ $d->content }}
                </p><hr>

                @if($best_answer)
                    <div class="text-center" style="padding: 40px;">
                        <h4 class="text-center">
                            BEST ANSWER
                        </h4>
                        <div class="card">
                            <div class="card-header">
                                <img src="{{ $best_answer->user->avatar }}" alt="Avatar file" 
                                width="40px" height="40px">
                                &nbsp;&nbsp;&nbsp;
                                <span> {{$best_answer->user->name}} 
                                <b>({{$best_answer->user->points}}points)</b></span>
                            </div>
                            <div class="card-body">
                                {{ $best_answer->content}}
                            </div>
                        </div>
                    </div>
                @endif

            </div>
            <div class="card-footer">
                <span>
                    {{ $d->replies->count()}} Replies
                </span>
                <a href="{{ route('channel',['slug' => $d->channel->slug])}}" 
                    class="pull-right btn btn-xs btn-default">
                    {{ $d->channel->title }}
                </a>
            </div>
        </div><br>
        
        @foreach ($d->replies as $r)
        <div class="card">
            <div class="card-header">
                <img src="{{ $r->user->avatar }}" alt="Avatar file" width="40px" height="40px">
                &nbsp;&nbsp;&nbsp;
                <span> {{$r->user->name}}  <b>({{$r->user->points}}points)</b></span>
                @if(!$best_answer)
                    @if(Auth::id() == $d->user->id)
                        <a href="{{ route('discussion.best.answer',['id' => $r->id])}}"
                             class="btn btn-xs btn-primary pull-right" style="margin-left:8px;" >Mark as best answer</a>                          
                    @endif
                @endif

                @if (Auth::id() == $r->user->id)
                    @if (! $r->best_answer)
                    <a href="{{ route('reply.edit',['id' => $r->id])}}" ] 
                        class="btn btn-xs btn-info pull-right">Edit</a>
                    
                    @endif
                @endif
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