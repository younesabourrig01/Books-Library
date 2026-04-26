@extends('layouts.app')

@section("content")
    <main>
        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto grid max-w-2xl grid-cols-1 items-start gap-x-8 gap-y-16 sm:gap-y-24 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                    <div class="lg:pr-4">
                        <div class="relative overflow-hidden rounded-3xl bg-gray-900 px-6 pb-9 pt-64 shadow-2xl sm:px-12 lg:max-w-lg lg:px-8 lg:pb-8 xl:px-10 xl:pb-10">
                            <img class="absolute inset-0 h-full w-full object-cover" src="https://source.unsplash.com/random/600x800/?library,team" alt="">
                        </div>
                    </div>
                    <div>
                        <div class="text-base leading-7 text-gray-700 lg:max-w-lg">
                            <p class="text-base font-semibold leading-7 text-blue-600">{{ __('Ce que nous faisons') }}</p>
                            <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ __('36 personnes talentueuses travaillent pour vous rendre heureux') }}</h1>
                            <div class="max-w-xl">
                                <p class="mt-6">{{ __('Mollit anim laborum duis au dolor in voluptate velit ess cillum dolore eu lore dsu quality mollit anim laborumuis au dolor in voluptate velit cillum.') }}</p>
                                <p class="mt-8">{{ __('Mollit anim laborum.Duis aute irufg dhjkolohr in re voluptate velit esscillumlore eu quife nrulla parihatur. Excghcepteur signjnt occa cupidatat non inulpadeserunt mollit aboru. temnthp incididbnt ut labore mollit anim laborum suis aute.') }}</p>
                            </div>
                        </div>
                        <div class="mt-10 flex">
                            <a href="{{ route('contact') }}" class="rounded-md bg-blue-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500">{{ __('Contacter nous') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection