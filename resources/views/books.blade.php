@extends('layouts.app')
@section("content")
<main class="py-12 pb-64">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-extrabold text-gray-900">
                {{ __('Rechercher un Livre') }}
            </h2>
        </div>

        <livewire:book-search />

    </div>
</main>
@endsection
