@extends('layouts.app')

@section("content")
    <main class="py-16 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumbs -->
            <nav class="flex mb-8 text-sm font-medium text-gray-500" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li><a href="{{ route('book.index') }}" class="hover:text-blue-600 transition">{{ __('Livres') }}</a></li>
                    <li><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></li>
                    <li class="text-gray-900 truncate max-w-xs">{{ $book->designation }}</li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                <!-- Left Content: Book Details -->
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="md:flex">
                            <!-- Book Cover Section -->
                            <div class="md:w-1/3 bg-gray-50 p-8 flex justify-center items-center border-r border-gray-100">
                                <img class="w-full max-w-[200px] h-auto object-cover rounded-xl shadow-2xl transition-transform duration-500 hover:scale-105" 
                                     src="{{ asset('covers/' . $book->cover) }}" 
                                     alt="{{ $book->designation }}"
                                     onerror="this.src='{{ asset('covers/no_cover.jpg') }}'">
                            </div>

                            <!-- Book Info Section -->
                            <div class="md:w-2/3 p-8 lg:p-10">
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-bold uppercase tracking-wider rounded-full border border-blue-100">
                                        {{ $book->category->name ?? __('Sans catégorie') }}
                                    </span>
                                    @if($book->tag)
                                        <span class="px-3 py-1 bg-amber-50 text-amber-700 text-xs font-bold uppercase tracking-wider rounded-full border border-amber-100">
                                            {{ $book->tag->name }}
                                        </span>
                                    @endif
                                </div>

                                <h1 class="text-4xl font-extrabold text-gray-900 leading-tight mb-2">
                                    {{ $book->designation }}
                                </h1>
                                <p class="text-xl text-blue-600 font-medium mb-8">
                                    {{ __('par') }} {{ $book->auteur }}
                                </p>

                                <div class="grid grid-cols-2 gap-6 py-6 border-y border-gray-50">
                                    <div>
                                        <p class="text-sm text-gray-500 mb-1">{{ __('Langue') }}</p>
                                        <p class="font-semibold text-gray-900">{{ $book->langue }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 mb-1">{{ __('Éditeur') }}</p>
                                        <p class="font-semibold text-gray-900">{{ $book->editeur }}</p>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <h4 class="text-lg font-bold text-gray-900 mb-4">{{ __('Description') }}</h4>
                                    <div class="text-gray-600 leading-relaxed space-y-4">
                                        {{ $book->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Content: Actions & Pricing -->
                <aside class="space-y-6">
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 sticky top-8">
                        <div class="mb-8">
                            <p class="text-sm text-gray-500 mb-1">{{ __('Prix actuel') }}</p>
                            <div class="flex items-baseline">
                                <span class="text-4xl font-black text-gray-900">{{ number_format($book->prix, 2) }}</span>
                                <span class="text-xl font-bold text-gray-900 ml-1">€</span>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-xl transition duration-300 transform active:scale-95 shadow-lg shadow-blue-200">
                                {{ __('Ajouter au panier') }}
                            </button>
                            <button class="w-full bg-white hover:bg-gray-50 text-gray-900 font-bold py-4 px-6 rounded-xl border-2 border-gray-100 transition duration-300">
                                {{ __('Acheter maintenant') }}
                            </button>
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-50">
                            <a href="{{ route('book.edit', $book->id) }}" class="block w-full text-center py-2 text-amber-600 font-semibold hover:text-amber-700 transition">
                                {{ __('Modifier les informations') }}
                            </a>
                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </main>
@endsection