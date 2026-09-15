@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center px-6 py-24">
    <div class="text-center max-w-2xl mx-auto">
        <div class="mb-8">
            <span class="text-8xl font-bold text-[#6366f1] opacity-20 select-none">500</span>
        </div>
        <h1 class="text-3xl font-bold text-white mb-4">Server Error</h1>
        <p class="text-gray-400 text-lg mb-8 leading-relaxed">
            Something went wrong on our end. Our team has been notified.
            Please try again in a few moments.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/"
               class="inline-flex items-center justify-center px-6 py-3 bg-[#6366f1] hover:bg-[#4f46e5] text-white font-semibold rounded-lg transition-colors duration-200">
                Back to Home
            </a>
            <a href="/contact"
               class="inline-flex items-center justify-center px-6 py-3 border border-white/20 hover:border-white/40 text-white font-semibold rounded-lg transition-colors duration-200">
                Contact Support
            </a>
        </div>
    </div>
</div>
@endsection
