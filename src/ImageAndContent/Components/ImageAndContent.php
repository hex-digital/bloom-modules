<?php

namespace Bloom\Components\ImageAndContent;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageAndContent extends Component
{
    // class properties
    public $wrapperSize;

    public $valign;

    public $halign;

    public $image;

    public $alt;

    public $classes;

    public $imageDisplay;

    public $imagePlacement;

    /**
     * Create a new component instance.
     */
    public function __construct($image, $alt, $wrapperSize = '', $valign = 'center', $halign = 'left', $imageDisplay = 'crop', $imagePlacement = 'right')
    {
        $this->wrapperSize = $wrapperSize;
        $this->valign = $valign;
        $this->halign = $halign;
        $this->image = $image;
        $this->alt = $alt;
        $this->imageDisplay = $imageDisplay;
        $this->imagePlacement = $imagePlacement;

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

        return $this->view('Components.ImageAndContent.image-and-content');
    }

    /**
     * Check if the component has enough data to try and output the buttons.
     *
     * @return bool
     */
    private function canOutputComponent(): array|string|null
    {
        // Check the required data exists
        return $this->image;
    }

    /**
     * If fields affect the style of this block, we can generate the classes and pass them to the front-end here
     *
     * @return string
     */
    public function generateClasses()
    {
        $classes = [];

        if ($this->wrapperSize !== 'default') {
            $classes[] = 'o-wrapper--'.$this->wrapperSize;
        }

        $classes[] = 'c-image-content--v-'.$this->valign;
        $classes[] = 'c-image-content--h-'.$this->halign;
        $classes[] = 'c-image-content--imagedisplay-'.$this->imageDisplay;
        $classes[] = 'c-image-content--imageplacement-'.$this->imagePlacement;

        return implode(' ', $classes);
    }
}
