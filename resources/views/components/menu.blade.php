@extends('layout.app')

@section('title', 'Menu')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-center text-3xl font-bold mb-10">Notre Menu</h1>

    <div class="flex justify-center mb-6 space-x-4">

        <!-- Lien Tous -->
        <a href="{{ url('/menu') }}"
           class="pb-1 border-b-2 text-xl font-semibold {{ is_null($slug) ? 'border-amber-600 text-amber-600' : 'border-transparent text-black' }}">
           Tous
        </a>

        <!-- Catégories -->
        @foreach ($categories as $categorie)
            <a href="{{ url('/menu/' . $categorie->slug) }}"
               class="pb-1 border-b-2 text-xl font-semibold {{ ($slug ?? '') == $categorie->slug ? 'border-amber-600 text-amber-600' : 'border-transparent text-black' }}">
               {{ $categorie->nom }}
            </a>
        @endforeach
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($plats as $plat)
            <div class="border rounded-lg p-4 shadow hover:shadow-2xl transition">
                <img 
                    src="{{ asset('storage/' . $plat->image) }}" 
                    alt="{{ $plat->nom }}" 
                    class="w-full h-48 object-cover rounded-lg"
                >
                <h3 class="text-lg font-medium text-center">{{ $plat->nom }}</h3>
                <p class="text-gray-700 text-center">{{ $plat->description }}</p>
                <p class="text-black text-center font-semibold mt-2">{{ $plat->prix }} MAD</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
