<?php

namespace Bloom\Components\Accordion;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Accordion extends Component
{
    // class properties
    public $icon;

    public $iconRotate;

    public $title;

    public $mode;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $icon = null, $iconRotate = true, $mode = 'custom')
    {
        $this->icon = $icon;
        $this->iconRotate = $iconRotate;
        $this->title = $title;
        $this->mode = $mode;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (! $this->canOutputComponent()) {
            return '';
        }

        return $this->view('Components.Accordion.accordion');
    }

    /**
     * Check if the component has enough data to try and output the buttons.
     */
    private function canOutputComponent(): array|string|null
    {
        // Check the required data exists
        return $this->title;
    }
}
