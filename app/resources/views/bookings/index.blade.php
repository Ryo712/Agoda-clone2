@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('予約一覧') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($bookings->isEmpty())
                        <p>予約はありません。</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ホテル名</th>
                                        <th>チェックイン</th>
                                        <th>チェックアウト</th>
                                        <th>宿泊人数</th>
                                        <th>ステータス</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->hotel->name }}</td>
                                            <td>{{ $booking->check_in_date->format('Y/m/d') }}</td>
                                            <td>{{ $booking->check_out_date->format('Y/m/d') }}</td>
                                            <td>{{ $booking->guests }}人</td>
                                            <td>
                                                @if ($booking->status === 'pending')
                                                    <span class="badge bg-warning">保留中</span>
                                                @elseif ($booking->status === 'confirmed')
                                                    <span class="badge bg-success">確認済み</span>
                                                @elseif ($booking->status === 'cancelled')
                                                    <span class="badge bg-danger">キャンセル</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-sm btn-info">詳細</a>
                                                    @if ($booking->status !== 'cancelled')
                                                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-sm btn-primary">編集</a>
                                                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('予約をキャンセルしますか？')">キャンセル</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
