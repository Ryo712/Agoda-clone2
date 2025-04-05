@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">認証テスト</div>

                <div class="card-body">
                    <h3>認証テスト成功！</h3>
                    <p>あなたは認証済みです。このページは保護されています。</p>
                    <p>ログインユーザー: {{ Auth::user()->name }}</p>
                    <p>メールアドレス: {{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection