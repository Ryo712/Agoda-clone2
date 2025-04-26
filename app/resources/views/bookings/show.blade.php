@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('予約詳細') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <h2>{{ $booking->hotel->name }}</h2>
                        <p>{{ $booking->hotel->city }}</p>
                        <p>{{ $booking->hotel->description }}</p>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">予約ID:</div>
                        <div class="col-md-8">{{ $booking->id }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">予約日:</div>
                        <div class="col-md-8">{{ $booking->created_at->format('Y/m/d H:i') }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">チェックイン日:</div>
                        <div class="col-md-8">{{ $booking->check_in_date->format('Y/m/d') }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">チェックアウト日:</div>
                        <div class="col-md-8">{{ $booking->check_out_date->format('Y/m/d') }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">宿泊人数:</div>
                        <div class="col-md-8">{{ $booking->guests }}人</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">宿泊日数:</div>
                        <div class="col-md-8">{{ $booking->check_in_date->diffInDays($booking->check_out_date) }}泊</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">ステータス:</div>
                        <div class="col-md-8">
                            @if ($booking->status === 'pending')
                                <span class="badge bg-warning">保留中</span>
                            @elseif ($booking->status === 'confirmed')
                                <span class="badge bg-success">確認済み</span>
                            @elseif ($booking->status === 'cancelled')
                                <span class="badge bg-danger">キャンセル</span>
                            @endif
                        </div>
                    </div>

                    @if ($booking->special_requests)
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">特別リクエスト:</div>
                        <div class="col-md-8">{{ $booking->special_requests }}</div>
                    </div>
                    @endif

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('bookings.index') }}" class="btn btn-secondary">予約一覧に戻る</a>
                        
                        @if ($booking->status !== 'cancelled')
                            <div>
                                <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-primary">予約を編集</a>
                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('予約をキャンセルしますか？')">予約をキャンセル</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
