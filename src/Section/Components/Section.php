<?php

namespace Bloom\Components\Section;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Section extends Component
{
    // class properties
    public $wrapperSize;

    public $classes;

    /**
     * Create a new component instance.
     */
    public function __construct($wrapperSize = '')
    {
        $this->wrapperSize = $wrapperSize;
        $this->classes = $this->generateClasses();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (! $this->canOutputComponent()) {
            return '';
        }

        return $this->view('Components.Section.section');
    }

    /**
     * Check if the component has enough data to try and output the buttons.
     *
     * @return bool
     */
    private function canOutputComponent()
    {
        // Check the required data exists
        return isset($this->wrapperSize);
    }

    /**
     * If fields affect the style of this block, we can generate the classes and pass them to the front-end here
     *
     * @return string
     */
    public function generateClasses()
    {
        $classes = [];

        if ($this->wrapperSize === 'sm') {
            $classes[] = 'o-wrapper--sm';
        }

        return implode(' ', $classes);
    }
}
