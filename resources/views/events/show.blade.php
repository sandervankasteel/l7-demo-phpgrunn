@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('attending') !== null)
            <div class="row">
                <div class="col-md-12">
                    @if(session('attending'))
                        <div class="alert alert-success" role="alert">
                           We have successfully added you to the RSVP list!
                        </div>
                    @else
                        <div class="alert alert-warning" role="alert">
                            Sorry to see you go, hope to see you next time!
                        </div>
                    @endif
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>{{ $event->title }}</h3>
                                    <h5>Happening on: {{ $event->timestamp->toDayDateTimeString() }}</h5>
                                </div>
                                <div class="col-md-6">
                                    <x-weather :address="$event->address" :date-time="$event->timestamp"></x-weather>
                                </div>
                            </div>
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
                                    <x-event-r-s-v-p :event=$event></x-event-r-s-v-p>
                                </ul>
                            </div>
                        </div>
                        <div class="row border-top">
                            <div class="col-md-12 mt-4">
                                <h3>Location</h3>
                                <x-event-location :address="$event->address"></x-event-location>
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
                                        <div class="col-md-4 mb-4">
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
