<?php

namespace Bloom\Livewire\TemplateUpperCamelCase;

use Livewire\Component;
use Closure;
use Illuminate\Contracts\View\View;

class TemplateUpperCamelCase extends Component
{
    // class properties
    public $example;

    public function render(): View|Closure|string
    {
        $example = $this->example;

        return view('Livewire.TemplateUpperCamelCase.template-kebab', compact(['example']));
    }
}
