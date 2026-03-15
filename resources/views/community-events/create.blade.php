@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="w-100" style="max-width: 520px;">
            <div class="card shadow-sm rounded-3 p-4">
                <h1 class="h3 mb-4 text-center">Add Community Event</h1>

                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('community-events.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="venue" class="form-label">Venue</label>
                        <input type="text" class="form-control" id="venue" name="venue" value="{{ old('venue') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="starts_at" class="form-label">Starts at</label>
                        <input type="datetime-local" class="form-control" id="starts_at" name="starts_at" value="{{ old('starts_at') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="banner_image" class="form-label">Banner image</label>
                        <input type="file" class="form-control" id="banner_image" name="banner_image" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Create Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
