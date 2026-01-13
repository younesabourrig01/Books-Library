@extends('layouts.app')

@section("content")
    <main class="py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold text-gray-900">Rechercher un Livre</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

                <!-- Left content (Filters) -->
                <aside class="col-span-1">
                    <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-md space-y-8">
                        <h4 class="text-xl font-semibold text-gray-800 border-b border-gray-200 pb-4">Filtrer les livres</h4>

                        <div>
                            <h5 class="font-semibold text-gray-800 mb-3">Categories</h5>
                            <select name="category" class="w-full bg-gray-50 border border-gray-300 rounded-md text-gray-800 focus:ring-blue-500 focus:border-blue-500 text-sm p-2.5">
                                <option value="">Tout</option>
                                <option value="">Documentaires</option>
                                <option value="">Poésie</option>
                                <option value="">Mangas</option>
                            </select>
                        </div>

                        <div>
                            <h5 class="font-semibold text-gray-800 mb-3">Type</h5>
                            <div class="space-y-2">
                                <label class="flex items-center text-gray-600">
                                    <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <span class="ml-2">Texte</span>
                                </label>
                                <label class="flex items-center text-gray-600">
                                    <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <span class="ml-2">Audible</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <h5 class="font-semibold text-gray-800 mb-3">Tags</h5>
                            <div class="space-y-2">
                                <label class="flex items-center text-gray-600">
                                    <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <span class="ml-2">HTML</span>
                                </label>
                                <label class="flex items-center text-gray-600">
                                    <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <span class="ml-2">Laravel</span>
                                </label>
                            </div>
                        </div>

                    </div>
                </aside>

                <!-- Right content (Book List) -->
                <div class="col-span-1 lg:col-span-3">
                    <div class="flex items-center justify-between mb-6 bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
                        <span class="text-gray-600">39, 782 Livres trouvé</span>
                        <div class="flex items-center">
                            <span class="text-gray-600 mr-2">Trier par:</span>
                            <select name="sort" class="bg-gray-50 border border-gray-300 rounded-md text-gray-800 focus:ring-blue-500 focus:border-blue-500 text-sm p-2">
                                <option value="">None</option>
                                <option value="">Date</option>
                                <option value="">Prix</option>
                                <option value="">Titre</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- Single Book Item -->
                        <div class="bg-white rounded-lg p-4 flex items-center justify-between border border-gray-200 shadow-sm hover:shadow-lg transition">
                            <div class="flex items-center">
                                <img src="https://via.placeholder.com/80x110" alt="Book Cover" class="w-20 h-auto object-cover rounded-md mr-4">
                                <div>
                                    <a href="{{ route('details') }}" class="text-lg font-semibold text-gray-900 hover:text-blue-600">Livre 1</a>
                                    <ul class="flex flex-wrap gap-x-4 text-sm text-gray-500 mt-1">
                                        <li>Tech</li>
                                        <li>CSS, HTML</li>
                                        <li>par Nom de l'Auteur</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="{{ route(name: 'details') }}" class="text-blue-600 hover:underline">Détails</a>
                                <span class="block text-lg font-semibold text-gray-900 mt-1">$35</span>
                            </div>
                        </div>
                        <!-- Single Book Item -->
                        <div class="bg-white rounded-lg p-4 flex items-center justify-between border border-gray-200 shadow-sm hover:shadow-lg transition">
                            <div class="flex items-center">
                                <img src="https://via.placeholder.com/80x110" alt="Book Cover" class="w-20 h-auto object-cover rounded-md mr-4">
                                <div>
                                    <a href="{{ route('details') }}" class="text-lg font-semibold text-gray-900 hover:text-blue-600">Livre 2</a>
                                    <ul class="flex flex-wrap gap-x-4 text-sm text-gray-500 mt-1">
                                        <li>Science</li>
                                        <li>Physics</li>
                                        <li>par Jane Doe</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('details') }}" class="text-blue-600 hover:underline">Détails</a>
                                <span class="block text-lg font-semibold text-gray-900 mt-1">$50</span>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12 flex justify-center">
                        <nav class="flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                            </a>
                            <a href="#" aria-current="page" class="relative z-10 inline-flex items-center px-4 py-2 border border-blue-500 bg-blue-50 text-sm font-medium text-blue-600">1</a>
                            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">2</a>
                            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection