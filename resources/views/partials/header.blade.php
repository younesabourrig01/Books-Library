<header class="bg-white border-b border-gray-200 shadow-sm">
    <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="{{ route('index') }}" class="text-gray-800 font-bold text-xl">
                        {{ __('Bibliothèque') }}
                    </a>
                </div>

                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ route('index') }}"
                            class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">
                            {{ __('Accueil') }}
                        </a>
                        <a href="{{ route('bookIndex') }}"
                            class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">
                            {{ __('Livres') }}
                        </a>
                        <a href="{{ route('search') }}"
                            class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">
                            {{ __('Recherche') }}
                        </a>
                        <a href="{{ route('about') }}"
                            class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">
                            {{ __('À propos') }}
                        </a>
                        <a href="{{ route('contact') }}"
                            class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">
                            {{ __('Contact') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <div class="relative">
                    <select onchange="window.location.href='/lang/' + this.value"
                        class="border-gray-300 rounded-md text-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="en" {{ App::getLocale() == 'en' ? 'selected' : '' }}>EN</option>
                        <option value="fr" {{ App::getLocale() == 'fr' ? 'selected' : '' }}>FR</option>
                    </select>
                </div>

                @auth
                    @include('layouts.navigation')
                @else
                    <div class="flex items-center">
                        <a href="{{ route('login') }}">
                            <p class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">
                                {{ __('Connexion') }}
                            </p>
                        </a>
                        <a href="{{ route('register') }}">
                            <p class="ml-4 text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">
                                {{ __('Inscription') }}
                            </p>
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</header>
