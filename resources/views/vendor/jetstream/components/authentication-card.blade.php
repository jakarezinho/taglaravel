<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-yellow-200">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white shadow-md overflow-hidden rounded-xl">
        {{ $slot }}
    </div>
    @if (!Route::is('register'))
    <p class=" pt-5">Don't have an account? <a class="underline"href="{{ route('register') }}" class="">Register</a></p>
@endif
</div>
