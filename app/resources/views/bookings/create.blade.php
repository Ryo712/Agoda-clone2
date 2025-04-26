@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ホテル予約') }}</div>

                <div class="card-body">
                    <h2>{{ $hotel->name }}</h2>
                    <p>{{ $hotel->city }}</p>
                    <p>{{ $hotel->description }}</p>

                    <form method="POST" action="{{ route('bookings.store') }}">
                        @csrf
                        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

                        <div class="row mb-3">
                            <label for="check_in_date" class="col-md-4 col-form-label text-md-end">{{ __('チェックイン日') }}</label>

                            <div class="col-md-6">
                                <input id="check_in_date" type="date" class="form-control @error('check_in_date') is-invalid @enderror" name="check_in_date" value="{{ old('check_in_date', date('Y-m-d')) }}" required>

                                @error('check_in_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small class="form-text text-muted">形式: YYYY-MM-DD (例: 2025-04-30)</small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="check_out_date" class="col-md-4 col-form-label text-md-end">{{ __('チェックアウト日') }}</label>

                            <div class="col-md-6">
                                <input id="check_out_date" type="date" class="form-control @error('check_out_date') is-invalid @enderror" name="check_out_date" value="{{ old('check_out_date', date('Y-m-d', strtotime('+1 day'))) }}" required>

                                @error('check_out_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small class="form-text text-muted">形式: YYYY-MM-DD (例: 2025-05-01)</small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="guests" class="col-md-4 col-form-label text-md-end">{{ __('宿泊人数') }}</label>

                            <div class="col-md-6">
                                <input id="guests" type="number" min="1" class="form-control @error('guests') is-invalid @enderror" name="guests" value="{{ old('guests', 1) }}" required>

                                @error('guests')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="special_requests" class="col-md-4 col-form-label text-md-end">{{ __('特別リクエスト') }}</label>

                            <div class="col-md-6">
                                <textarea id="special_requests" class="form-control @error('special_requests') is-invalid @enderror" name="special_requests">{{ old('special_requests') }}</textarea>

                                @error('special_requests')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('予約する') }}
                                </button>
                                <a href="{{ route('hotels.show', $hotel->id) }}" class="btn btn-secondary">
                                    {{ __('キャンセル') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
