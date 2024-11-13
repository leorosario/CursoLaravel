<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardPessoa extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $pessoa,
        public array $linguas
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-pessoa');
    }

    public function shouldRender(): bool
    {
        // só renderiza o componente se a pessoa fala mais do que uma língua

        return count($this->linguas) > 1;
    }

    public function colorName(): bool
    {
        //se a pessoa for o João, destaca o nome
        return $this->pessoa === "João";
    }
}
