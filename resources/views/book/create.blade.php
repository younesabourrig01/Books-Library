@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Ajouter un Nouveau Livre') }}</h1>
            
            <form action="/books" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label for="designation" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Titre du Livre') }} *
                    </label>
                    <input type="text" 
                           id="designation" 
                           name="designation" 
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="auteur" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Auteur') }} *
                    </label>
                    <input type="text" 
                           id="auteur" 
                           name="auteur" 
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="editeur" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Éditeur') }}
                    </label>
                    <input type="text" 
                           id="editeur" 
                           name="editeur"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="prix" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Prix (MAD)') }} *
                    </label>
                    <input type="number" 
                           id="prix" 
                           name="prix" 
                           step="0.01" 
                           min="0" 
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Tag -->
                <div>
                    <label for="tag_id" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Tag du Livre') }}
                    </label>
                    <select name="tag_id" id="tag_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">{{ __('Choisir un tag') }}</option>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Category -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Catégorie du Livre') }}
                    </label>
                    <select name="category_id" id="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">{{ __('Choisir une catégorie') }}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Description') }}
                    </label>
                    <textarea id="description" 
                              name="description" 
                              rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <!-- Image de couverture -->
                <div>
                    <label for="cover" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Image de couverture') }}
                    </label>
                    <input type="file" 
                           id="cover" 
                           name="cover" 
                           accept="image/*"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="flex justify-end space-x-4 pt-4">
                    <a href="{{ route('book.index') }}" 
                       class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        {{ __('Annuler') }}
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        {{ __('Ajouter le Livre') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
@endsection
