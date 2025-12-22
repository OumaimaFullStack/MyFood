@extends('layout.app')

@section('title','Reservation')

@section('content')
<div class="max-w-6xl mx-auto py-12">
    <h1 class="text-center text-3xl md:text-4xl font-bold mb-12">Réservation</h1>

    <div class="flex flex-col md:flex-row items-start md:items-center gap-12">
        <div class="md:w-1/2">
            <p class="text-gray-700 leading-relaxed text-lg">
                Réservez facilement votre table en ligne en quelques clics. Choisissez la date, l’heure et le nombre de convives. Profitez ensuite d’un accueil chaleureux et d’un moment gourmand dans notre restaurant.
            </p>
        </div>

        <div class="md:w-1/2 w-full">
            <form action="{{route('reservation.store')}}" method="POST" class="bg-gray-800 p-8 rounded-lg shadow-md space-y-6 w-full">
                @csrf
                <div class="flex flex-col md:flex-row gap-4">
                    <input type="text" name="nom" placeholder="Nom" class="w-full md:w-1/2 bg-gray-50 rounded-lg p-3 focus:ring-2 focus:ring-black outline-none transition" />
                    <input type="email" name="email" placeholder="Email" class="w-full md:w-1/2 bg-gray-50 rounded-lg p-3 focus:ring-2 focus:ring-black outline-none transition" />
                </div>

                <div class="flex flex-col md:flex-row gap-4">
                    <input type="tel" name="telephone" placeholder="Téléphone" class="w-full md:w-1/2 bg-gray-50 rounded-lg p-3 focus:ring-2 focus:ring-black outline-none transition" />
                    <input type="date" name="date" class="w-full md:w-1/2 bg-gray-50 rounded-lg p-3 focus:ring-2 focus:ring-black outline-none transition" />
                </div>

                <div class="flex flex-col md:flex-row gap-4">
                    <input type="time" name="heure" class="w-full md:w-1/2 bg-gray-50 rounded-lg p-3 focus:ring-2 focus:ring-black outline-none transition" />
                    <input type="number" name="nombre_personne" placeholder="Nombre de personnes" class="w-full md:w-1/2 bg-gray-50 rounded-lg p-3 focus:ring-2 focus:ring-black outline-none transition" />
                </div>

                <button type="submit" class="w-full bg-white text-gray-800 font-semibold py-3 rounded-lg shadow hover:bg-gray-200 transition">Réserver</button>
                @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif           
@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            </form>
        </div>
    </div>
</div>
@endsection
