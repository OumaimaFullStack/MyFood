@extends('layout.app')

@section('title', 'Accueil')

@section('content')

<section class="w-full flex justify-center items-center bg-gray-100 relative">
    <img src="{{ asset('images/pizza.jpg') }}" 
         alt="Plat vedette" 
         class="w-full h-auto max-h-[80vh] object-cover">

    <div class="absolute top-1/2 left-8 transform -translate-y-1/2 text-left">
        <h1 class="text-4xl md:text-5xl font-bold text-white drop-shadow-lg">
            Click, eat, repeat <br> avec MyFood
        </h1>
    </div>
</section>

<section class="py-12">
    <h1 class="text-center text-3xl  font-bold mt-4 mb-8">Nos plats spéciaux</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 px-6">

        <div class="border rounded-lg p-4 shadow hover:shadow-2xl transition">
            <img src="{{ asset('images/pesto_pasta.jpg') }}" alt="Pesto pasta" class="w-full h-48 object-cover rounded-lg">
            <div class="text-center p-4">
                <h1 class="font-bold">Pesto Pasta</h1>
                <p>Pesto pasta avec tomate cerise et lettuce</p>
                <span class="font-bold">95dh</span>
            </div>
        </div>

        <div class="border rounded-lg p-4 shadow hover:shadow-2xl transition">
            <img src="{{ asset('images/vegan_salad_bowl.jpg') }}" alt="Vegan salad bowl" class="w-full h-48 object-cover rounded-lg ">
            <div class="text-center p-4">
                <h1 class="font-bold">Vegan salad bowl</h1>
                <p>Un mélange frais et coloré de légumes croquants, sain et 100 % végétal</p>
                <span class="font-bold">100dh</span>
            </div>
        </div>

        <div class="border rounded-lg p-4 shadow hover:shadow-2xl transition">
            <img src="{{ asset('images/meal_salamon_zucchini.jpg') }}" alt="Meal Salamon Zucchini" class="w-full h-48 object-cover rounded-lg">
            <div class="text-center p-4">
                <h1 class="font-bold">Meal Salamon Zucchini</h1>
                <p>Saumon tendre accompagné de courgettes grillées pour un plat léger et savoureux</p>
                <span class="font-bold">130dh</span>
            </div>
        </div>

    </div>
</section>

@endsection
