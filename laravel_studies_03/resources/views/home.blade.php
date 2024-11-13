@extends('layouts.main_layout')
@section('content')
    
    {{-- <div class="text-center">
        @foreach ($pessoas_linguas as $pessoa => $linguas)
            <x-card-pessoa :$pessoa :$linguas />
        @endforeach
    </div> --}}
    
    {{-- componentes e slots --}}
    {{-- <div>
        <h4 class="text-info">Como funciona um Slot?</h4>
        <x-other-card>
            <h1 class="text-danger">Este é o Slot!</h1>
        </x-other-card>
    </div> --}}

    {{-- <x-multi-slot>
        <x-slot:title>Este é o título</x-slot>
        <x-slot:content>Este é o conteúdo</x-slot>
        <x-slot:footer>
            <ul>
                <li>Item1</li>
                <li>Item2</li>
                <li>Item3</li>
            </ul>
        </x-slot>
    </x-multi-slot> --}}
    <h4>Componente anónimo</h4>
    <x-alert-card>Primeira Mensagem</x-alert-card>
    <x-alert-card>Segundo Mensagem</x-alert-card>
    <x-alert-card>Terceira Mensagem</x-alert-card>
@endsection
