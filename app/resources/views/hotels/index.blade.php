@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Hotels</h1>
    
    <div class="row">
    @foreach($hotels as $hotel)
        <div class="col-md-4">
            <a href="{{ route('hotels.show', $hotel->id) }}" class="text-decoration-none">
                <div class="card hotel-card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $hotel->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $hotel->city }}</h6>
                        <p class="card-text">{{ $hotel->description }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        <small>更新日: {{ $hotel->updated_at->format('Y-m-d') }}</small>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
    </div>
</div>
@endsection

@push('styles')
<style>
    .hotel-card {
        margin-bottom: 20px;
        transition: transform 0.3s;
    }
    .hotel-card:hover {
        transform: translateY(-5px);
    }
</style>
@endpush