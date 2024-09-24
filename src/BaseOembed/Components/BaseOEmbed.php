<?php

namespace Bloom\Components\BaseOEmbed;

use Bloom\Helpers\AcfHelper;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BaseOEmbed extends Component
{
    public ?string $acfOembed;

    public ?array $options;

    public function __construct(?string $acfOEmbed = '', ?array $options = [])
    {
        $this->options = $options;
        $this->acfOembed = $acfOEmbed ? AcfHelper::acfOembedWithOptions($acfOEmbed, $this->options) : '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): string|View
    {
        if (! $this->canOutputOEmbed()) {
            return '';
        }

        return $this->view('Components.BaseOEmbed.base-oembed');
    }

    /**
     * Check if the component has enough data to try and output an img tag.
     */
    private function canOutputOEmbed(): bool
    {
        return (bool) $this->acfOembed;
    }
}
