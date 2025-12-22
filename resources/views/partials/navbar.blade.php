@php 
  $currentRoute = Route::currentRouteName();
@endphp

<nav class=" bg-white shadow-md px-6 py-6 relative">
    <div class="max-w-6xl mx-auto relative flex items-center justify-center">
        <a href="{{ route('accueil') }}" class="absolute left-6">
            <img src="{{ asset('images/logo.jpg') }}" alt="MyFood" class="w-24 h-auto">
        </a>
        <ul class="hidden md:flex space-x-8 text-amber-700 font-medium">
            <li><a href="{{ route('accueil') }}" class="pb-1 border-b-2 {{$currentRoute==='accueil'?'border-amber-600':'border-transparent'}} hover:border-amber-600 transition">Accueil</a></li>
            <li><a href="{{route('about')}}" class="pb-1 border-b-2 {{$currentRoute==='about'?'border-amber-600':'border-transparent'}} hover:border-amber-600 transition">A propos</a></li>
            <li><a href="{{route('menu')}}" class="pb-1 border-b-2 {{$currentRoute==='menu'?'border-amber-600':'border-transparent'}} hover:border-amber-600 transition">Menu</a></li>
            <li><a href="{{route('reservation')}}" class="pb-1 border-b-2 {{$currentRoute==='reservation'?'border-amber-600':'border-transparent'}} hover:border-amber-600 transition">Réservation</a></li>
            <li><a href="{{route('contact')}}" class="pb-1 border-b-2 {{$currentRoute==='contact'?'border-amber-600':'border-transparent'}} hover:border-amber-600 transition">Contact</a></li>
        </ul>
        <div class="md:hidden absolute right-6">
            <button id="menu-btn" class="text-amber-700 focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>
    <ul id="mobile-menu" class="hidden md:hidden flex flex-col space-y-4 mt-4 px-6 text-amber-700 font-medium">
        <li><a href="{{ route('accueil') }}" class="pb-1 border-b-2 {{$currentRoute==='accueil'?'border-amber-600':'border-transparent'}} hover:border-amber-600 transition">Accueil</a></li>
        <li><a href="{{route('about')}}" class="pb-1 border-b-2 {{$currentRoute==='about'?'border-amber-600':'border-transparent'}} hover:border-amber-600 transition">A propos</a></li>
        <li><a href="{{route('menu')}}" class="pb-1 border-b-2 {{$currentRoute==='menu'?'border-amber-600':'border-transparent'}} hover:border-amber-600 transition">Menu</a></li>
        <li><a href="{{route('reservation')}}" class="pb-1 border-b-2 {{$currentRoute==='reservation'?'border-amber-600':'border-transparent'}} hover:border-amber-600 transition">Réservation</a></li>
        <li><a href="#" class="pb-1 border-b-2 {{$currentRoute==='contact'?'border-amber-600':'border-transparent'}} hover:border-amber-600 transition">Contact</a></li>
    </ul>
</nav>

<script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
