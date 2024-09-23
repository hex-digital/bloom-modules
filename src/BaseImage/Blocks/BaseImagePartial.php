<?php

namespace Bloom\Blocks\BaseImage;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class BaseImagePartial extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $baseImagePartial = Builder::make('base_image_partial');

        $baseImagePartial
            ->addImage('image', [
                'label' => 'Image',
                'instructions' => 'Add an Image',
            ]);

        $baseImagePartial
            ->addText('alt', [
                'label' => 'Alt text',
                'instructions' => 'Add an alternative alt text for the image',
            ]);

        return $baseImagePartial;
    }
}
