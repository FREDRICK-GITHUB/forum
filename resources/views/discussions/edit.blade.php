@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <main class="py-4">
        <div class="card">
            <div class="card-header text-center">Update a discussion</div>

            <div class="card-body">
                <form action="{{ route('discussion.update',['id' => $discussion->id])}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                            <div class="form-group">
                            <label for="content">Ask a question</label>
                            <textarea name="content" id="content" cols="30" rows="6" 
                            class="form-control">
                                        {{ $discussion->content }}
                                    </textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success pull-right" type="submit">
                                Save discussion changes</button>
                        </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection