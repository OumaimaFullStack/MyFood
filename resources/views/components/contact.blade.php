@extends('layout.app')
@section('title','Contact')

@section('content')
<div class="max-w-6xl mx-auto py-12">
    <h1 class="text-center text-3xl md:text-4xl font-bold mb-12">Contact</h1>
    <div class="flex flex-col md:flex-row gap-12 items-stretch">
        <div class="md:w-1/2 flex flex-col space-y-4">
            <h3 class="text-xl font-semibold">Coordonnées</h3>

            <div class="flex items-center gap-2">
                <i class="fas fa-phone"></i>
                <span>0501020304</span>
            </div>

            <div class="flex items-center gap-2">
                <i class="fas fa-map-marker-alt"></i>
                <span>Maarif, Boulevard Biranzarane, Casablanca</span>
            </div>
            <div class="rounded-lg overflow-hidden shadow-lg mt-4 flex-grow">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2739.594722419178!2d-7.6434908252676745!3d33.58276394237579!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7d2c27dc7e333%3A0x107105473fba298b!2sBoulevard%20Bir%20Anzarane%2C%20Casablanca!5e1!3m2!1sen!2sma!4v1766067005122!5m2!1sen!2sma"
                    class="w-full h-full border-0"
                    loading="lazy"
                ></iframe>
            </div>
        </div>
        <div class="md:w-1/2 flex">
    <form method="POST" action="{{ route('contact.send') }}"
          class="bg-gray-800 p-8 rounded-lg shadow-md space-y-6 w-full">
        @csrf

        <input type="text" name="nom" placeholder="Nom" value="{{ old('nom') }}"
               class="w-full bg-gray-50 rounded-lg p-3 focus:ring-2 focus:ring-black outline-none" />
        @error('nom')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
               class="w-full bg-gray-50 rounded-lg p-3 focus:ring-2 focus:ring-black outline-none" />
        @error('email')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <input type="text" name="telephone" placeholder="Téléphone" value="{{ old('telephone') }}"
               class="w-full bg-gray-50 rounded-lg p-3 focus:ring-2 focus:ring-black outline-none" />

        <textarea name="message" placeholder="Message"
                  class="w-full bg-gray-50 rounded-lg p-3 h-32 focus:ring-2 focus:ring-black outline-none">{{ old('message') }}</textarea>
        @error('message')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
        @error('captcha')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        @if(session('success'))
            <p class="text-green-500 text-sm">{{ session('success') }}</p>
        @endif

        <button type="submit"
                class="w-full bg-white text-gray-800 font-semibold py-3 rounded-lg shadow hover:bg-gray-200 transition">
            Envoyer
        </button>
    </form>
</div>
@endsection
