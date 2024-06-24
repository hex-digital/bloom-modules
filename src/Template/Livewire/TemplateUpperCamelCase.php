<?php

namespace Bloom\Modules\TemplateUpperCamelCase\Livewire;

use Livewire\Component;

class TemplateUpperCamelCase extends Component
{
    // class properties
    public $example;

    public function render()
    {
        $example = $this->example;

        return view('TemplateUpperCamelCase.resources.views.livewire.listing', compact(['example']));
    }
}
