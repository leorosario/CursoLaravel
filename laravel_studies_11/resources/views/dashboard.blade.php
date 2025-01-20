<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts
        </h2>
    </x-slot>

    {{-- create post --}}

    @can('post.create')
        <div class="max-w-7xl mx-auto mb-6 px-8 mt-6">
            <a href="{{ route("post.create") }}" class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-6 rounded">Create Post</a>
        </div>
    @endcan

    <div class="py-12">
        @foreach ($posts as $post)
            <x-post-component :post="$post" />
        @endforeach
    </div>
</x-app-layout>
