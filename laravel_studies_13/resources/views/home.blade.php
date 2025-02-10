<x-layouts.main-layout>
    <div class="display-6 text-center">LIVEWIRE</div>
    <hr>

    @livewire('counter')
    {{--  --}}
    {{-- <livewire:counter /> --}}

    <hr>

    <p>INLINE COMPONENT</p>
    @php
        $php_value = "Valor em PHP";
    @endphp
    <livewire:inline-component value="Valor direto" :php_value="$php_value" />
</x-layouts.main-layout>
