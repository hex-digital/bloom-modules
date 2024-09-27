<?php

namespace Bloom\Components\Gallery;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Gallery extends Component
{
    // class properties
    public $images;

    /**
     * Create a new component instance.
     */
    public function __construct($images)
    {
        $this->images = $images;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (! $this->canOutputComponent()) {
            return '';
        }

        return $this->view('Components.Gallery.gallery');
    }

    /**
     * Check if the component has enough data to try and output the buttons.
     */
    private function canOutputComponent(): bool
    {
        // Check the required data exists
        return (bool) $this->images;
    }
}
