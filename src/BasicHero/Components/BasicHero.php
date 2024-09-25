<?php

namespace Bloom\Components\BasicHero;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BasicHero extends Component
{
    // class properties
    public $image;

    public $classes;

    /**
     * Create a new component instance.
     */
    public function __construct($image)
    {
        $this->image = $image;
        $this->classes = $this->generateClasses();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return $this->view('Components.BasicHero.basic-hero');
    }

    /**
     * If fields affect the style of this block, we can generate the classes and pass them to the front-end here
     *
     * @return string
     */
    public function generateClasses()
    {
        $classes = [];

        if ($this->image) {
            $classes[] = 'c-basic-hero--image';
        }

        return implode(' ', $classes);
    }
}
