<?php

namespace Bloom\Composers\TemplateUpperCamelCase;

use Roots\Acorn\View\Composer;


class TemplateUpperCamelCase extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with(): array
    {
        return [
          'variable' => 'data'
        ];
    }
}
