<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leyendo Publicación') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-sm text-right">
                        {{ \Carbon\Carbon::create($post->published_at)->format('d/m/Y') }}
                    </p>
                    <h2 class="font-semibold text-4xl text-black-900 leading-tight m-3">
                        {{ $post->title}}
                        @if ($post->votedUsers)
                        <span class="text-sm font-mono bg-slate-200 p-2 rounded-2xl">
                            {{ $post->votedUsers->count()}}</span>
                            @endif
                            @auth
                            <form action="{{ route('posts.vote', $post) }}" method="POST" class="text-sm inline-block">
                                @csrf
                                @if(!$post->votedUsers->contains(auth()->user()))
                                <input type="submit" value="Me Gusta" class="bg-blue-200 hover:bg-blue-500 p-2 rounded-xl" />
                                @else
                                <input type="submit" value="Has votado" class="bg-red-200 hover:bg-red-500 p-2 rounded-xl"/>
                                @endif
                            </form>
                            @endauth
                        </h2>
                    <p class="italic m-3 text-xl text-gray-800 font-semibold">
                        {{ $post->summary }}
                    </p>
                    <p class="m-3 text-lg">
                        {{ $post->body }}
                    </p>
                    <div class="text-right text-xl text-slate-500">
                        - {{ $post->user->name }} -
                    </div>
                    <div class="text-center">
                        <a href="{{ route('home') }}"
                        class="p-3 bg-blue-200 hover:bg-blue-500">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
