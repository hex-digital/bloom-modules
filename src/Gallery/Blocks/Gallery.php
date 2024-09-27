<?php

namespace Bloom\Blocks\Gallery;

use Bloom\Blocks\BaseImage\BaseImagePartial;
use Bloom\Helpers\AcfHelper;
use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Gallery extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Gallery';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Gallery block.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'bloom';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = [
        'background' => '#fff',
        'foreground' => '#50bb7b',
        'src' => 'welcome-widgets-menus',
    ];

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'preview';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => true,
        'mode' => true,
        'multiple' => true,
        'jsx' => true,
    ];

    /**
     * The block styles.
     *
     * @var array
     */
    public $styles = [];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [];

    /**
     * The block view.
     *
     * @var array
     */
    public $view = 'Blocks.Gallery.gallery';

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        $imageGallery = get_field('image_gallery');

        return [
            'canRenderBlock' => $this->canRenderBlock($imageGallery),
            'imageGallery' => $imageGallery,
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $gallery = Builder::make('gallery');

        $gallery
            ->addRepeater('image_gallery', [
                'label' => 'Image Gallery',
                'instructions' => 'Add images to gallery',
                'button_label' => 'Add Image',
                'min' => '1',
                'max' => '4',
                'layout' => 'block',
            ])
            ->addPartial(BaseImagePartial::class);

        return $gallery->build();
    }

    /**
     * determines whether a block can be rendered or not
     *
     * @return string
     */
    public function canRenderBlock(): bool|string
    {
        return AcfHelper::allFieldData([
            'image_gallery',
        ]);
    }
}
