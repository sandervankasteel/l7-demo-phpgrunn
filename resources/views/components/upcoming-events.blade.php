@if(count($events) > 0)
    @foreach($events as $event)
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 align-middle">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="/event/{{ $event->slug }}">{{ $event->title }}</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    On {{ $event->timestamp->toDayDateTimeString() }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    Organized by:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="#">{{ $event->organizer->name }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(!$loop->last)
                <hr />
            @endif
        </div>
    @endforeach

@else
    <div>
        No upcoming events :(
    </div>
@endif
