@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <h1 class="display-5 fw-bold text-body-emphasis">Dashboard</h1>
            <p class="lead">Browse and manage your community events.</p>
        </div>

        <a href="{{ route('community-events.create') }}" class="btn btn-success align-self-start">
            + New Event
        </a>
    </div>

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    @if($events->isEmpty())
        <div class="alert alert-info">No events created yet. Click "New Event" to add one.</div>
    @else
        <div class="row g-4">
            @foreach($events as $event)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        @if ($event->banner_image)
                            <img src="{{ asset('storage/' . $event->banner_image) }}" class="card-img-top" alt="{{ $event->title }}">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text text-muted mb-2">
                                <strong>When:</strong> {{ \Illuminate\Support\Carbon::parse($event->starts_at)->format('l, F j, Y \a\t g:i A') }}<br>
                                <strong>Where:</strong> {{ $event->venue }}
                            </p>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($event->description, 120) }}</p>
                            <div class="mt-auto">
                                <a href="#" class="btn btn-outline-primary btn-sm">View details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
