@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User with Address</div>
                <div class="card-body">
                    @foreach ($posts as $post )
                        <h2>{{ $post->title }}</h2>
                        <p>
                            Posted By: <small>{{ optional($post->user)->name }}</small><br/>
                            {{ $post->post }}
                        </p>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
