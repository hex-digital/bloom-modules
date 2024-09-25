<?php

namespace Bloom\Components\Hero;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hero extends Component
{
    public string $blockAnchor;

    public string $video;

    public int $videoPoster;

    /**
     * Create a new component instance.
     */
    public function __construct($anchor, $video, $poster)
    {
        $this->blockAnchor = $anchor;
        $this->video = $video;
        $this->videoPoster = $poster;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (! $this->canOutputComponent()) {
            return '';
        }

        return $this->view('Components.Hero.hero');
    }

    /**
     * Check if the component has enough data to try and output the buttons.
     *
     * @return bool
     */
    private function canOutputComponent(): array|string
    {
        // Check the required data exists
        return $this->videoPoster;
    }
}
