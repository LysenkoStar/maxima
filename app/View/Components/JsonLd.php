<?php

namespace App\View\Components;

use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use Illuminate\Contracts\Support\Htmlable;

class JsonLd extends Component
{
    public array|Collection $micromarkup;

    public function __construct(array|Collection $micromarkup)
    {
        $this->micromarkup = $micromarkup;
    }

    public function render(): Closure|Htmlable|View|string
    {
        return view('components.json-ld');
    }
}
