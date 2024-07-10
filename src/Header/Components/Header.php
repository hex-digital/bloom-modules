<?php

namespace Bloom\Modules\Header\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    // class properties
    public $example;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (! $this->canOutputComponent()) {
            return '';
        }

        return $this->view('Header.resources.views.components.header');
    }

    /**
     * Check if the component has enough data to try and output the buttons.
     *
     * @return bool
     */
    private function canOutputComponent(): array|string
    {
        // Check the required data exists
        return $this->example;
    }
}