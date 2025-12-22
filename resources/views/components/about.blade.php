@extends('layout.app')

@section('title','A propos')

@section('content')

<section class="py-16 ">
    <h1 class="text-center text-3xl font-bold mb-10">A propos de nous</h1>
    <div class="max-w-6xl mx-auto px-4  mb-12 ">
    <div class="flex flex-col md:flex-row items-center gap-8">
        <div class="md:w-1/2">
        <h2 class=" text-xl font-semibold mb-4">Histoire</h2>
        <p class="text-gray-600 leading-relaxed">Fondé en 2023, MyFood est né de la passion pour une cuisine saine et savoureuse.
Nous proposons des plats préparés avec des ingrédients frais, locaux et soigneusement sélectionnés, pour offrir une expérience authentique à chaque visite.</p>
       </div>
       <div class="md:w-1/2 shadow-xl">
        <img src="{{asset('images/resto.jpg')}}" alt="Restaurant" class="w-full h-72 object-cover rounded-xl">
       </div>
    </div>
    </div>
    <div class="max-w-6xl mx-auto px-4  mb-12 ">
    <div class="flex flex-col md:flex-row items-center gap-8">
        <div class="md:w-1/2 shadow-xl">
        <img src="{{asset('images/resto2.jpg')}}" alt="Restaurant" class="w-full h-72 object-cover rounded-xl">
       </div>
        <div class="md:w-1/2">
        <h2 class=" text-xl font-semibold mb-4">Concept</h2>
        <p class="text-gray-600 leading-relaxed">Notre concept repose sur une cuisine moderne et créative, inspirée des tendances actuelles et pensée pour s’adapter à tous les goûts.
Nous proposons une variété de plats comme des pâtes savoureuses, des meals équilibrés et des options fraîches, préparés avec des ingrédients de qualité.
Dans un cadre chaleureux et convivial, MyFood offre une expérience simple, moderne et agréable au quotidien.</p>
       </div>   
    </div>
    </div>
     <div class="max-w-6xl mx-auto px-4 mb-12 relative">
    <h1 class="text-xl font-semibold mb-6 text-center">Notre Restaurant</h1>
    <img  id="restaurantSlider" src="{{ asset('images/resto3.jpg') }}"alt="Restaurant"class="w-full h-96 object-cover shadow-lg rounded-xl">
<button 
    onclick="prevSlide()"
    class="absolute left-8 top-1/2 -translate-y-1/2 
           bg-white text-black p-3 rounded-full shadow-lg
           hover:bg-gray-300 transition"
>
    ←
</button>
<button 
    onclick="nextSlide()"
    class="absolute right-8 top-1/2 -translate-y-1/2 
           bg-white text-black p-3 rounded-full shadow-lg
            hover:bg-gray-300 transition"
        
>
    →
</button>

</div>
<script>
    const slides = [
        "{{ asset('images/resto3.jpg') }}",
        "{{ asset('images/resto6.jpg') }}",
        "{{ asset('images/resto5.jpg') }}"
    ];

    let current = 0;
    const slider = document.getElementById('restaurantSlider');

    function nextSlide() {
        current = (current + 1) % slides.length;
        slider.src = slides[current];
    }

    function prevSlide() {
        current = (current - 1 + slides.length) % slides.length;
        slider.src = slides[current];
    }
</script>

</section>
@endsection