@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Livre</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Ajouter un Nouveau Livre</h1>
            
            <form action="/books" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label for="designation" class="block text-sm font-medium text-gray-700 mb-1">
                        Titre du Livre *
                    </label>
                    <input type="text" 
                           id="designation" 
                           name="designation" 
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="auteur" class="block text-sm font-medium text-gray-700 mb-1">
                        Auteur *
                    </label>
                    <input type="text" 
                           id="auteur" 
                           name="auteur" 
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="editeur" class="block text-sm font-medium text-gray-700 mb-1">
                        Éditeur
                    </label>
                    <input type="text" 
                           id="editeur" 
                           name="editeur"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="prix" class="block text-sm font-medium text-gray-700 mb-1">
                        Prix (€) *
                    </label>
                    <input type="number" 
                           id="prix" 
                           name="prix" 
                           step="0.01" 
                           min="0" 
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

               <!-- Type -->
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-1">
                        Type de Livre *
                    </label>
                    <input type="text" 
                           id="type" 
                           name="type" 
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                        Description
                    </label>
                    <textarea id="description" 
                              name="description" 
                              rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <!-- Image de couverture -->
                <div>
                    <label for="cover" class="block text-sm font-medium text-gray-700 mb-1">
                        Image de couverture
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
                        Annuler
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Ajouter le Livre
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
@endsection
