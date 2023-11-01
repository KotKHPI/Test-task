<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardAuthor extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public readonly ?object $author)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-author');
    }
}
