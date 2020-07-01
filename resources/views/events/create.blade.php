@extends('layouts.app')

@section('content')
    <form action="{{ route('events.store') }}" method="post">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2>Host a new event!</h2>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                Title
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                Description
                            </div>
                            <div class="col-md-8">
                                <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" required></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                Date and time
                            </div>
                            <div class="col-md-8">
                                <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}" required>
                                <input type="time" name="time" class="form-control @error('time') is-invalid @enderror" value="{{ old('time') }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Location
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}" required id="location_search">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1 offset-md-11">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection

@section('javascript')
<script>
    console.log('bla bla')
</script>
@endsection
