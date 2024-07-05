<?php

namespace Bloom\Modules\Icon\Fields\Partials;

use Illuminate\Filesystem\Filesystem;
use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Icon extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $icon = Builder::make('icon');

        $icon
            ->addSelect('icon', [
                'label' => 'Icon',
                'instructions' => 'Select an icon',
                'choices' => $this->getIcons(),
                'allow_null' => 0,
                'ui' => 1,
                'ajax' => 1,
            ]);

        return $icon;
    }

    protected function getIcons(): array
    {
        $filesystem = new Filesystem();
        $files = $filesystem->allFiles(get_template_directory() . '/resources/images/icons');

        if (!$files) {
            return [];
        }

        $icons = [];

        foreach ($files as $file) {
            $iconValue = $file->getFilenameWithoutExtension();
            $iconLabel = ucwords($file->getFilenameWithoutExtension());
            $icons[$iconValue] = $iconLabel;
        }

        return $icons ?? [];
    }
}
