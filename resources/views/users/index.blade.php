@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User with Address</div>
                <div class="card-body">
                   {{--  @foreach ($users as $user )
                        <h2>{{ $user->name }}</h2>
                        <p>{{ $user->address->city }}</p>
                        <p>{{ $user->address->country }}</p>
                    @endforeach --}}

                    {{-- @foreach ($addresses as $address )
                        <h2>{{ $address->owner->name }}</h2>
                        <p>{{ $address->city }}</p>
                        <p>{{ $address->country }}</p>
                    @endforeach --}}

                    {{-- @foreach ($users as $user )
                        <h2>{{ $user->name }}</h2>
                        @foreach ($user->addresses as $address )
                            <p>{{ $address->city }}<br />
                               {{ $address->country }}</p>
                        @endforeach                       
                    @endforeach --}}

                    @foreach ($users as $user )
                        <h2>{{ $user->name }}</h2>
                        @foreach ($user->posts as $post )
                            <p>{{ $post->title }}<br />
                               {{ $post->post }}</p>
                        @endforeach                       
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
