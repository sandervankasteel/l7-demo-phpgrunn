@if($prediction !== null)
    <div>
        The weather for this event is gonna be {{ $prediction }}
    </div>
@else
    <div>
        No weather forecast available yet.
    </div>
@endif
