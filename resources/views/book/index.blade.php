@extends('layouts.app')
@section('title', 'Acceuil')
@section('content')
<div class="py-24 bg-white">
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center mb-12">
<a class="text-blue-600 font-semibold" href="{{route('addBook')}}">Cree Un Livre</a>
<h2 class="mt-2 text-3xl font-extrabold text-gray-900 sm:text4xl">Parcourir les livres</h2>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap8">
@foreach ($books as $book)
<div
class="group relative bg-white rounded-xl shadow-sm hover:shadow2xl transition-all duration-300 border border-gray-200 overflow-hidden">
<!-- Book Cover -->
<div class="aspect-[3/4] overflow-hidden bg-gray-100">
<img src="/covers/{{ $book->cover }}" alt="cover"
class="w-full h-full object-cover group-hover:scale-105
transition-transform duration-300"
onerror="this.src='{{ asset('covers/book-coverplaceholder.png') }}'">
</div>
<!-- Card Content -->
<div class="p-5 space-y-4">
<h3 class="font-bold text-lg text-gray-900 line-clamp-2
leading-tight">
{{ $book->designation }}
</h3>
<p class="text-sm text-gray-600">{{ $book->auteur }}</p>
<!-- Action Buttons -->
<div class="flex justify-center gap-6 pt-3 border-t bordergray-100">
<!-- View -->
<a href="{{ route('book.show', $book->id) }}"
class="group/btn flex flex-col items-center gap-1 textgray-600 hover:text-blue-600 transition"
title="View Book">
<div class="p-3 rounded-full bg-blue-50 grouphover/btn:bg-blue-100 transition">
<svg class="w-5 h-5" fill="none"
stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" strokelinejoin="round" stroke-width="2"
d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
<path stroke-linecap="round" strokelinejoin="round" stroke-width="2"
d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478
0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
</svg>
</div>
<span class="text-xs font-medium">View</span>
</a>
<!-- Edit -->
<a href="{{ route('book.edit', $book->id) }}"
class="group/btn flex flex-col items-center gap-1 textgray-600 hover:text-amber-600 transition"
title="Edit Book">
<div class="p-3 rounded-full bg-amber-50 grouphover/btn:bg-amber-100 transition">
<svg class="w-5 h-5" fill="none"
stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" strokelinejoin="round" stroke-width="2"
d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2
2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
</svg>
</div>
<span class="text-xs font-medium">Edit</span>
</a>
<!-- Delete -->
<form action="{{ route('destroyBook', $book->id) }}"
method="POST" class="inline">
@csrf
@method('DELETE')
<button type="submit"
onclick="return confirm('Are you sure you want todelete this book?')"
class="group/btn flex flex-col items-center gap-1
text-gray-600 hover:text-red-600 transition"
title="Delete Book">
<div class="p-3 rounded-full bg-red-50 grouphover/btn:bg-red-100 transition">
<svg class="w-5 h-5" fill="none"
stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" strokelinejoin="round" stroke-width="2"
d="M19 7l-.867 12.142A2 2 0 0116.138
21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
/>
</svg>
</div>
<span class="text-xs font-medium">Delete</span>
</button>
</form>
</div>
</div>
</div>
@endforeach
</div>
</div>
</div>
@endsection 

