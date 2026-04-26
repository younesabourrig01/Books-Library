@extends('layouts.app')

@section('content')
    <main class="py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold text-gray-900">{{ __('Prenez Contact Avec Nous') }}</h2>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2 bg-white p-8 rounded-lg border border-gray-200 shadow-lg">
                    <form class="space-y-6" action="#" method="post">
                        <div>
                            <label for="message" class="sr-only">{{ __('Message') }}</label>
                            <textarea id="message" name="message" rows="8"
                                class="w-full px-4 py-3 rounded-md bg-gray-100 border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="{{ __('Votre Message') }}"></textarea>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="sr-only">{{ __('Nom') }}</label>
                                <input type="text" name="name" id="name"
                                    class="w-full px-4 py-3 rounded-md bg-gray-100 border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="{{ __('Votre Nom') }}">
                            </div>
                            <div>
                                <label for="email" class="sr-only">{{ __('Email') }}</label>
                                <input type="email" name="email" id="email"
                                    class="w-full px-4 py-3 rounded-md bg-gray-100 border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="{{ __('Adresse Email') }}">
                            </div>
                        </div>
                        <div>
                            <label for="subject" class="sr-only">{{ __('Sujet') }}</label>
                            <input type="text" name="subject" id="subject"
                                class="w-full px-4 py-3 rounded-md bg-gray-100 border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="{{ __('Sujet') }}">
                        </div>
                        <div>
                            <button type="submit"
                                class="px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                {{ __('Envoyer') }}
                            </button>
                        </div>
                    </form>
                </div>

                <div class="space-y-6 text-gray-600">
                    <div class="flex items-start">
                        <span class="mt-1 mr-4 text-blue-600"><svg class="w-6 h-6" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg></span>
                        <div>
                            <h3 class="text-lg text-gray-800 font-semibold">Ofppt Centre Mirleft</h3>
                            <p>{{ __('Code Postal 85352') }}</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <span class="mt-1 mr-4 text-blue-600"><svg class="w-6 h-6" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg></span>
                        <div>
                            <h3 class="text-lg text-gray-800 font-semibold">+212 615 15 15 15</h3>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <span class="mt-1 mr-4 text-blue-600"><svg class="w-6 h-6" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg></span>
                        <div>
                            <h3 class="text-lg text-gray-800 font-semibold">support@ofpptmail.com</h3>
                            <p>{{ __('Envoyez-nous votre requête à tout moment !') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
