@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- ホテルヘッダー情報 -->
        <div class="relative">
            <div class="h-64 bg-gray-300">
                <!-- ここに実際のホテル画像を表示 -->
                <img src="https://via.placeholder.com/1200x400" alt="{{ $hotel->name }}" class="w-full h-full object-cover">
            </div>
            <div class="absolute top-0 left-0 w-full p-6">
                <a href="{{ url('/') }}" class="bg-white rounded-full p-2 inline-block shadow-md hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- ホテル詳細情報 -->
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-900">{{ $hotel->name }}</h1>
                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">空室あり</span>
            </div>

            <div class="flex items-center text-gray-600 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>{{ $hotel->location }}</span>
            </div>

            <div class="border-t border-b border-gray-200 py-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">ホテル情報</h2>
                <p class="text-gray-700 mb-4">{{ $hotel->description }}</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>チェックイン: 15:00〜</span>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>チェックアウト: 〜11:00</span>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>駐車場: {{ $hotel->has_parking ? 'あり' : 'なし' }}</span>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>最終更新: {{ $hotel->updated_at->format('Y-m-d') }}</span>
                    </div>
                </div>
            </div>

            <!-- 客室タイプセクション -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">客室タイプ</h2>
                
                <div class="space-y-4">
                    <!-- 各客室タイプ情報（実際にはループで表示） -->
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
                        <div class="flex flex-col md:flex-row justify-between">
                            <div>
                                <h3 class="font-semibold">シングルルーム</h3>
                                <p class="text-sm text-gray-600">1名様用 / 禁煙</p>
                                <p class="text-sm text-gray-600 mt-1">設備: Wi-Fi, エアコン, バスタブ</p>
                            </div>
                            <div class="mt-4 md:mt-0 text-right">
                                <p class="text-xl font-bold text-gray-900">¥8,900 <span class="text-sm font-normal text-gray-600">/ 泊</span></p>
                                <a href="#" class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">予約する</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
                        <div class="flex flex-col md:flex-row justify-between">
                            <div>
                                <h3 class="font-semibold">ダブルルーム</h3>
                                <p class="text-sm text-gray-600">2名様用 / 禁煙</p>
                                <p class="text-sm text-gray-600 mt-1">設備: Wi-Fi, エアコン, バスタブ, ミニバー</p>
                            </div>
                            <div class="mt-4 md:mt-0 text-right">
                                <p class="text-xl font-bold text-gray-900">¥12,500 <span class="text-sm font-normal text-gray-600">/ 泊</span></p>
                                <a href="#" class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">予約する</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 施設情報 -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">施設・サービス</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="flex flex-col items-center p-3 border rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <span class="text-sm text-center">Wi-Fi無料</span>
                    </div>
                    <div class="flex flex-col items-center p-3 border rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm text-center">朝食バイキング</span>
                    </div>
                    <div class="flex flex-col items-center p-3 border rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                        </svg>
                        <span class="text-sm text-center">温泉</span>
                    </div>
                    <div class="flex flex-col items-center p-3 border rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                        </svg>
                        <span class="text-sm text-center">24時間フロント</span>
                    </div>
                </div>
            </div>

            <!-- 地図セクション -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">アクセス</h2>
                <div class="h-64 bg-gray-200 rounded-lg">
                    <!-- 実際の地図を表示する場所 -->
                    <div class="w-full h-full flex items-center justify-center">
                        <p class="text-gray-500">地図を表示</p>
                    </div>
                </div>
                <p class="mt-3 text-gray-700">
                    〒{{ $hotel->postal_code ?? '000-0000' }} {{ $hotel->address ?? '住所情報' }}<br>
                    最寄り駅：{{ $hotel->nearest_station ?? '最寄駅情報' }}
                </p>
            </div>

            <!-- 予約ボタン -->
            <div class="text-center mt-8">
                <a href="#" class="inline-block px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg text-lg hover:bg-blue-700 transition">空室を確認・予約する</a>
            </div>
        </div>
    </div>
</div>
@endsection