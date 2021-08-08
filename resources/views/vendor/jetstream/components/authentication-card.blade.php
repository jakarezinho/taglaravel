<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-yellow-200">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white shadow-md overflow-hidden rounded-2xl">
        {{ $slot }}
    </div>
    @if (!Route::is('register'))
    <p class=" pt-5">Don't have an account? <a class="underline"href="{{ route('register') }}" class="">Register</a></p>
@endif
</div>
