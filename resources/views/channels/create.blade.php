@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center"> --}}

        <div class="col-md-8">
            <main class="py-4">
                <div class="card">
                    <div class="card-header">Create a new channel</div>

                    <div class="card-body">
                    <form method="POST" action="{{route('channels.store')}}" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="channel" class="form-control">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">
                                Save Channel
                            </button>
                        </div>
                    </form>
                    </div>
                </div>
            </main>    
        </div>
    {{-- </div>
</div> --}}
@endsection