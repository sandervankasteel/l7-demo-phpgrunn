@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row px-8">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upcoming events</div>
                        <div class="card-body">
                            <x-upcoming-events></x-upcoming-events>
                        </div>
                    </div>
                </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Newest users</div>
                        <div class="card-body">
                            @foreach($users as $user)
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('profile.show', $user->id) }}">{{ $user->name }}</a>
                                        </div>
                                    </div>
                                    @if(!$loop->last)
                                    <hr />
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
