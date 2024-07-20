<?php

declare(strict_types=1);

namespace Bloom\Components\Buttons;

use Roots\Acorn\View\Component;

class Button extends Component
{
    public $button;

    public $url;

    public $text;

    public $target;

    public $buttonStyle;

    public function __construct($button)
    {
        $this->button = $button;

        if (isset($button['link']) && isset($button['link']['url'])) {
            // For use with the Multi Buttons Block
            // We pass in ACF fields for the link, style and theme
            $this->url = $button['link']['url'];
            $this->text = $button['link']['title'];
            $this->target = $button['link']['target'] ? ' target="_blank" rel="noopener noreferrer"' : '';

            $this->buttonStyle = $this->getButtonStyle();

        } elseif (isset($button['url']) && isset($button['title'])) {
            // For general use in Blade templates
            // We pass in an ACF 'link field', style and theme as attributes
            $this->url = $button['url'];
            $this->text = $button['title'];
            $this->target = array_key_exists('target', $button) && $button['target'] ? ' target="_blank" rel="noopener noreferrer"' : '';
            $this->buttonStyle = $this->getButtonStyle();
        } else {
            return;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        if (! $this->canOutputButton()) {
            return '';
        }

        return $this->view('Components.Buttons.button');
    }

    /**
     * Check if the component has enough data to try and output an img tag.
     *
     * @return bool
     */
    private function canOutputButton()
    {
        return $this->url && $this->text;
    }

    /**
     * Check if the button should be a Alt button
     *
     * @return string
     */
    public function getButtonStyle()
    {

        if (! $this->button['button_style'] || $this->button['button_style'] === 'btn-primary') {
            return 'c-btn--primary';
        } elseif ($this->button['button_style'] === 'btn-secondary') {
            return 'c-btn--secondary';
        }
    }
}
