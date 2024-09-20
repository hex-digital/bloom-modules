<?php

namespace Bloom\Components\HeadingText;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeadingText extends Component
{
    // class properties
    public $heading;

    public $text;

    /**
     * Create a new component instance.
     */
    public function __construct($heading, $text)
    {
        $this->heading = $heading;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (! $this->canOutputComponent()) {
            return '';
        }

        return $this->view('Components.HeadingText.heading-text');
    }

    /**
     * Check if the component has enough data to try and output the buttons.
     *
     * @return bool
     */
    private function canOutputComponent(): array|string
    {
        // Check the required data exists
        return $this->heading;
    }
}
