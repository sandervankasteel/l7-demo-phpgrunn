<ul class="list-group">
    @if(\Auth::guest())
        <li class="list-group-item"><b>Please <a href="{{ route('login') }}">login</a> before you can RSVP to the event</b></li>
    @else
        <li class="list-group-item font-weight-bold">RSVP</li>

        {{-- If user is attending then check the class to fas instead of far and change text to "You are attending :)"--}}
        <li class="list-group-item text-success">

            @if($isAttending())
                <i class="fas fa-check-circle"></i>
                Attending :)
            @else
                <i class="far fa-question-circle"></i>
                Interested in this event ?
            @endif
        </li>

        <hr />

        <form method="post" action="{{ route('event.attending', ['event' => $event, 'user' => $user]) }}">
            @csrf
            <li class="list-group-item font-weight-bold">Change your RSVP status</li>
            <li class="list-group-item text-success">
                <a href="#" class="rsvp-status" data-attending="1"><i class="fas fa-check-circle"></i> Attend</a>
            </li>
            <li class="list-group-item">
                <a href="#" class="rsvp-status" data-attending="0"><i class="far fa-times-circle"></i> Do not attend</a>
            </li>
            <input type="hidden" name="attending" value="" id="attending">
        </form>
    @endif
</ul>

@section('javascript')
    <script>
        $('.rsvp-status').on('click', function(event) {

            const target = event.target;
            $('#attending').val(target.dataset.attending);

            $('form').submit();
        });
    </script>
@endsection
