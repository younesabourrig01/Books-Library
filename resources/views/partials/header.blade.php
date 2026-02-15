
    <header class="bg-white border-b border-gray-200 shadow-sm">
        <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="index.html" class="text-gray-800 font-bold text-xl">Bibliothèque</a>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="{{ route('index') }}" class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Accueil</a>
                            <a href="{{ route('bookIndex') }}" class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Livres</a>
                            <a href="{{ route('search') }}" class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Recherche</a>
                            <a href="{{ route('about') }}" class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">A propos</a>
                            <a href="{{ route('contact') }}" class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <a href="#" class="text-gray-600 hover:bg-gray-100 font-medium rounded-md text-sm px-3 py-2">S'inscrire</a>
                        <a href="#" class="ml-3 text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-md text-sm px-3 py-2">Se connecter</a>
                    </div>
                </div> --}}
                    <div class="hidden md:block">
    @auth
        @include('layouts.navigation')
    @else
        <div class="ml-4 flex items-center md:ml-6">
            <a href="{{ route('login') }}">
                <p class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Login</p>
            </a>
            <a href="{{ route('register') }}">
                <p class="ml-4 text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Register</p>
            </a>
        </div>
    @endauth
</div>
            </div>
        </nav>
    </header>