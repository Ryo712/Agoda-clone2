@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ホテル詳細') }}</div>

                <div class="card-body">
                    <h1>{{ $hotel->name }}</h1>
                    <h6>{{ $hotel->city }}</h6>
                    <p>{{ $hotel->description }}</p>

                    <!-- 予約ボタン -->
                    <div class="mt-4 mb-4">
                        <a href="{{ route('bookings.create', ['hotel_id' => $hotel->id]) }}" class="btn btn-primary">このホテルを予約する</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
