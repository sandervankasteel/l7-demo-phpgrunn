@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3>{{ $event->title }}</h3>
                            <h5>Happening on: {{ $event->timestamp->toDayDateTimeString() }}</h5>
                        </div>
                        <div class="card-text">
                            <h4>Event description:</h4>
                            {{ $event->description }}
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <b>Organized by:</b> <br />
                                        <x-gravatar-profile-picture :email="$event->organizer->email" class="rounded-circle mr-2 img-thumbnail"/>
                                        <a href="{{ route('profile.show', [$event->organizer->id]) }}">{{ $event->organizer->name }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="list-group list-group-flush">
                                    @if(Auth::guest())
                                        <li class="list-group-item"><b>Please login before you can RSVP to the event</b></li>
                                    @else
                                        <li class="list-group-item">RSVP</li>

{{--                                        If user is attending then check the class to fas instead of far and change text to "You are attending :)"--}}
                                        <li class="list-group-item text-success">
                                            <i class="far fa-check-circle"></i>
                                            Attending ?
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="row border-top">
                            <div class="col-md-12 mt-4">
                                <h3>Location</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Attendees ({{ $event->attendees->count() }})</h3>
                        <div class="card-text">
                            @if(count($event->attendees) === 0)
                                <div class="row">
                                    <div class="col-md-12">
                                        <x-icon icon="frown"></x-icon>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    @foreach($event->attendees as $attendee)
                                        <div class="col-md-4">
                                            <x-gravatar-profile-picture :email="$attendee->email" class="rounded-circle mr-2 img-thumbnail"/>
                                            {{ $attendee->name }}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
