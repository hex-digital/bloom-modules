<?php

namespace Bloom\Components\Testimonial;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Testimonial extends Component
{
    // class properties
    public $testimonial;

    public $name;

    public $organisation;

    public $image;

    public $alt;

    /**
     * Create a new component instance.
     */
    public function __construct($testimonial, $image, $name = null, $organisation = null, $alt = '')
    {
        $this->testimonial = $testimonial;
        $this->name = $name;
        $this->organisation = $organisation;
        $this->image = $image;
        $this->alt = $alt;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (! $this->canOutputComponent()) {
            return '';
        }

        return $this->view('Components.Testimonial.testimonial');
    }

    /**
     * Check if the component has enough data to try and output the buttons.
     */
    private function canOutputComponent(): array|string
    {
        // Check the required data exists
        return $this->testimonial;
    }
}
