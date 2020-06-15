@extends('layouts.app')

@section('content')
    <div class="container">
        @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-1">
                        <x-button-icon type="link" icon="arrow-circle-left"></x-button-icon>
                    </div>
                    <div class="col-md-11">
                        <h2>Edit</h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('profile.update', ['profile' => $user]) }}" method="POST" id="frm_edit_profile">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" id="name" value="{{ $user->name }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" id="email" value="{{ $user->email }}" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="row  justify-content-end">
                    <div class="col-md-2">
                        <x-button-icon type="primary" icon="save">Save</x-button-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        const prevBtn = document.querySelector('.btn-link');
        prevBtn.addEventListener('click', function(ev) {
            window.location.href = '{{ route('profile.index') }}';
        });

        const form = document.querySelector('#frm_edit_profile');

        const submitButton = document.querySelector('.btn-primary');
        submitButton.addEventListener('click', function() {
            form.submit();
        });
    </script>
@endsection
