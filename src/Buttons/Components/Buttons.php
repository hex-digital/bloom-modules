<?php

declare(strict_types=1);

namespace Bloom\Components\Buttons;

use Roots\Acorn\View\Component;

class Buttons extends Component
{
    public $buttons;

    public $alignClass;

    public $align;

    public function __construct($buttons, $align)
    {
        $this->buttons = $buttons;
        $this->alignClass = $this->getAlignment($align);

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        if (! $this->canOutputButtons()) {
            return '';
        }

        return $this->view('Components.Buttons.buttons');
    }

    /**
     * Check if the component has enough data to try and output the buttons.
     *
     * @return bool
     */
    private function canOutputButtons()
    {
        return $this->buttons;
    }

    private function getAlignment($align)
    {
        $alignment = [
            'left' => 'u-justify-start',
            'center' => 'u-justify-center',
            'right' => 'u-justify-end',
        ];

        if (! array_key_exists($align, $alignment)) {
            return $alignment['left'];
        }

        return $alignment[$align];
    }
}
