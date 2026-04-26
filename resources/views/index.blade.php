@extends('layouts.app')

@section('content')
    <main>
        <div class="relative bg-gray-100 py-32 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
            <div class="relative max-w-4xl mx-auto text-center">
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl">
                    {{ __('Trouver tous les livres que vous voulez') }}
                </h1>
                <p class="mt-6 text-xl text-gray-600">
                    {{ __('Parcourez notre collection de plus d\'un million de livres.') }}
                </p>

                <div class="mt-12 max-w-3xl mx-auto">
                    <form action="#"
                        class="sm:flex items-center bg-white rounded-lg p-2 border border-gray-300 shadow-lg">
                        <div class="min-w-0 flex-1">
                            <input type="text" placeholder="{{ __('Titre du livre ou mot clé') }}"
                                class="w-full bg-transparent border-0 text-gray-800 placeholder-gray-500 focus:ring-0 sm:text-sm px-4 py-3">
                        </div>
                        <div class="mt-2 sm:mt-0 sm:ml-2">
                            <select name="select"
                                class="w-full sm:w-auto bg-gray-50 border border-gray-300 rounded-md text-gray-800 focus:ring-blue-500 focus:border-blue-500 sm:text-sm px-4 py-3">
                                <option value="">{{ __('Toute la bibliothèque') }}</option>
                                <option value="">{{ __('Livres') }}</option>
                                <option value="">{{ __('E-Books') }}</option>
                                <option value="">{{ __('Livres audibles') }}</option>
                            </select>
                        </div>
                        <div class="mt-2 sm:mt-0 sm:ml-2">
                            <button type="submit"
                                class="w-full sm:w-auto px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                {{ __('Trouver') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="py-24 bg-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <span class="text-blue-600 font-semibold">{{ __('Nos meilleures catégories') }}</span>
                    <h2 class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        {{ __('Parcourir les catégories') }}
                    </h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    <div
                        class="bg-white p-8 rounded-lg text-center border border-gray-200 shadow-md hover:shadow-xl transition">
                        <div class="text-blue-600 mb-4">
                            <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h5 class="text-lg font-semibold text-gray-900"><a href="#">{{ __('Informatique') }}</a></h5>
                        <span class="text-gray-500">(653)</span>
                    </div>

                    <div
                        class="bg-white p-8 rounded-lg text-center border border-gray-200 shadow-md hover:shadow-xl transition">
                        <div class="text-blue-600 mb-4">
                            <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.5L15.232 5.232z">
                                </path>
                            </svg>
                        </div>
                        <h5 class="text-lg font-semibold text-gray-900"><a href="#">{{ __('Design') }}</a></h5>
                        <span class="text-gray-500">(658)</span>
                    </div>

                    <div
                        class="bg-white p-8 rounded-lg text-center border border-gray-200 shadow-md hover:shadow-xl transition">
                        <div class="text-blue-600 mb-4">
                            <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                        </div>
                        <h5 class="text-lg font-semibold text-gray-900"><a href="#">{{ __('Marketing') }}</a></h5>
                        <span class="text-gray-500">(658)</span>
                    </div>

                    <div
                        class="bg-white p-8 rounded-lg text-center border border-gray-200 shadow-md hover:shadow-xl transition">
                        <div class="text-blue-600 mb-4">
                            <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h5 class="text-lg font-semibold text-gray-900"><a
                                href="#">{{ __('Mobile Application') }}</a></h5>
                        <span class="text-gray-500">(658)</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
