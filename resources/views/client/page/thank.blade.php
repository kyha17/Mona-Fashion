@extends('client.layout.layoutMatter')

@section('content')
<div class="flex items-center justify-center min-h-screen p-6">

        <!-- Card -->
        <div class="w-full max-w-lg bg-[#f7f5f3] rounded-lg shadow-xl p-8">
            <!-- Success Message -->
            <div class="flex justify-center mb-6">
                <div class="flex items-center justify-center w-16 h-16 bg-green-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>

            <!-- Success Title -->
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-4">Thanh Toán Thành Công!</h2>
            <p class="text-center text-gray-600 mb-6">Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi. Đơn hàng của bạn đã được thanh toán thành công.</p>

            <!-- Action Buttons -->
            <div class="flex justify-between">
                <a href="/" class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-600 transition duration-300">Trở Về Trang Chủ</a>
            </div>
        </div>

    </div>

@endsection
