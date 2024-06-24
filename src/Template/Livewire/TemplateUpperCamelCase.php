<?php

namespace Bloom\Modules\TemplateUpperCamelCase\Livewire;

use Livewire\Component;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TemplateUpperCamelCase extends Component
{
    // class properties
    public $example;

    public function render(): View|Closure|string
    {
        $example = $this->example;

        return view('TemplateUpperCamelCase.resources.views.livewire.listing', compact(['example']));
    }
}
