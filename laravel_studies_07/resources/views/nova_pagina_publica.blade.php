<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            NOVA PÁGINA PÚBLICA
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Apresentar dados do usuário logado --}}
                    @auth
                        <p>Estou logado</p>
                        <p>Nome: <strong>{{ Auth::user()->name }}</strong></p>
                        <p>Email: <strong>{{ Auth::user()->email }}</strong></p>
                        <p><a href="{{ route("main_logout") }}">Logout</a></p>
                    @else
                        <p>Não está usuário logado</p>
                        <p>Click <a href="{{ route("login") }}">aqui</a> para fazer login</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>