<?php

namespace Bloom\Modules\Header\Composers;

use Roots\Acorn\View\Composer;
use Log1x\Navi\Navi;

class Header extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [];

    /**
     * Data to be passed to view before rendering.
     */
    public function with(): array
    {
        return [
            'logo' => 'logo-dark',
            'mainNav' => $this->getMainMenu(),
        ];
    }

    protected function getMainMenu()
    {
        $navigation = Navi::make()->build('primary');

        if ($navigation->isEmpty()) {
            return;
        }

        return $navigation->toArray();
    }
}
