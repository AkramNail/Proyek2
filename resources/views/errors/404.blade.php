@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))

@section('content')
<div class="flex flex-col items-center justify-center min-h-[70vh] text-center">
    <h1 class="text-6xl font-bold text-red-600">404</h1>
    <p class="mt-4 text-lg text-gray-600">Oops! Halaman yang kamu cari tidak ditemukan.</p>
    <a href="{{ url('/') }}" 
       class="mt-6 inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
        Kembali ke Beranda
    </a>
</div>
@endsection