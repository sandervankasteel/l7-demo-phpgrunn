@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-1">
                        <x-gravatar-profile-picture :email="$user->email" />
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <b>{{ $user->name }}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <i>Registered on: {{ $user->created_at }}</i>
                            </div>
                        </div>
                    </div>
                    @if(Auth::id() === $user->id)
                        <div class="col-md-2">
                            <x-button-icon type="primary" icon="pencil-alt" id="edit_btn">Edit</x-button-icon>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Attended events</h4>
                    </div>
                    <div class="col-md-6">
                        <h4>Attending events</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        const btn = document.querySelector('.btn');
        btn.addEventListener('click', function(event) {
            window.location.href = '{{ route('profile.edit') }}';
        });
    </script>
@endsection
