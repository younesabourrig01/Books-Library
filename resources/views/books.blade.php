@extends('layouts.app')
@section("content")
<main class="py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-extrabold text-gray-900">
                {{ __('Rechercher un Livre') }}
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            <!-- Left content -->
            <aside class="col-span-1">
                <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-md space-y-8">
                    <h4 class="text-xl font-semibold text-gray-800 border-b border-gray-200 pb-4">
                        {{ __('Filtrer les livres') }}
                    </h4>

                    <div>
                        <h5 class="font-semibold text-gray-800 mb-3">{{ __('Catégories') }}</h5>
                        <select name="categorie" class="w-full bg-gray-50 border border-gray-300 rounded-md text-gray-800 text-sm p-2.5">
                            <option value="">{{ __('Tout') }}</option>
                            <option value="Documentaires">{{ __('Documentaires') }}</option>
                            <option value="Poésie">{{ __('Poésie') }}</option>
                            <option value="Mangas">{{ __('Mangas') }}</option>
                        </select>
                    </div>
                </div>
            </aside>

            <!-- Right content -->
            <div class="col-span-1 lg:col-span-3">

                <!-- Top Bar -->
                <div class="flex items-center justify-between mb-6 bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
                    <span class="text-gray-600">
                        {{ $books->total() }} {{ __('Livres trouvés') }}
                    </span>
                    <form method="GET" action="{{ route('search.find') }}">
                            <h5 style="display: inline-block">{{ __('Trier par :') }}</h5>
                            <select name="sort_by"
                                onchange="this.form.submit()"
                                class="bg-gray-50 border border-gray-300 rounded-md text-gray-800 focus:ring-blue-500 focus:border-blue-500 text-sm p-2">

                                <option value="">{{ __('None') }}</option>
                                <option value="date">{{ __('Date') }}</option>
                                <option value="prix">{{ __('Prix') }}</option>
                                <option value="titre">{{ __('Titre') }}</option>
                            </select>
                    </form>
                </div>

                <div class="space-y-6">
                        @foreach($books as $book)
                            <div class="bg-white rounded-lg p-4 flex items-center justify-between border border-gray-200 shadow-sm hover:shadow-lg transition">

                                <div class="flex items-center">

                                    {{-- Cover --}}
                    
<img src="{{ asset('covers/' . $book->cover) }}"
     alt="{{ $book->designation }}"
     class="w-20 h-28 object-cover rounded-md mr-4 transition-transform duration-300 hover:scale-105"
     onerror="this.src='{{ asset('covers/book-coverplaceholder.png') }}'">

                                

                                    <div>
                                        {{-- Designation --}}
                                        <a href="{{ route('books.show', $book->id) }}"
                                           class="text-lg font-semibold text-gray-900 hover:text-blue-600">
                                             {{ $book->designation ?? __('Sans titre') }}
                                        </a>

                                        {{-- Infos --}}
                                        <ul class="flex flex-wrap gap-x-4 text-sm text-gray-500 mt-1">

                                           
                                                <li>{{ $book->categorie }}</li>
                                          

                                           
                                                <li>{{ __('par') }} {{ $book->auteur }}</li>
                                          

                                           
                                                <li>{{ $book->langue }}</li>
                                           

                                           
                                                <li>{{ $book->editeur }}</li>
                                       
                                        </ul>

                                        {{-- Description --}}
                                     
                                            <p class="text-gray-600 text-sm mt-2 line-clamp-2">
                                                {{ \Illuminate\Support\Str::limit($book->description, 100) }}
                                            </p>
                                      
                                    </div>
                                </div>

                                <div class="text-right">
                                    <a href="{{ route('books.show', $book->id) }}"
                                       class="text-blue-600 hover:underline block mb-2">
                                        {{ __('Détails') }}
                                    </a>

                                    {{-- Prix --}}
                                    
                                        <span class="block text-lg font-semibold text-gray-900">
                                            {{ number_format($book->prix, 2) }} €
                                        </span>
                                  
                                </div>

                            </div>
                        @endforeach

                </div>

                {{-- Pagination --}}
                @if($books->hasPages())
                    <div class="mt-8">
                        {{ $books->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</main>
@endsection
