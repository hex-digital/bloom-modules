<?php

namespace Bloom\Blocks\ImageAndContent;

use Bloom\Blocks\BaseImage\BaseImagePartial;
use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class ImageAndContent extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Image and Content';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Image and Content block.';

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
    public $view = 'Blocks.ImageAndContent.image-and-content';

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        $image = get_field('image');

        return [
            'canRenderBlock' => $this->canRenderBlock($image),
            'blockClasses' => $this->getBlockClasses(),
            'blockAnchor' => $this->getBlockAnchor(),
            'wrapperSize' => get_field('wrapper_size'),
            'verticalAlignment' => get_field('vertical_alignment'),
            'horizontalAlignment' => get_field('horizontal_alignment'),
            'image' => $image,
            'alt' => get_field('alt'),
            'imageDisplay' => get_field('image_display'),
            'imagePlacement' => get_field('image_placement'),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $imageAndContent = Builder::make('image_and_content');

        $imageAndContent
            ->addButtonGroup('wrapper_size', [
                'instructions' => 'Set a different size for the content wrapper',
            ])
            ->addChoice('sm', 'Small')
            ->addChoice('default', 'Default')
            ->setDefaultValue('default');

        $imageAndContent
            ->addButtonGroup('vertical_alignment', [
                'instructions' => 'Choose whether the content should align top, center or bottom',
            ])
            ->addChoice('top', 'Top')
            ->addChoice('center', 'Center')
            ->addChoice('bottom', 'Bottom')
            ->setDefaultValue('center');

        $imageAndContent
            ->addButtonGroup('horizontal_alignment', [
                'instructions' => 'Choose whether the content should align left, center or right',
            ])
            ->addChoice('left', 'Left')
            ->addChoice('center', 'Center')
            ->addChoice('right', 'Right')
            ->setDefaultValue('center');

        $imageAndContent
            ->addPartial(BaseImagePartial::class);

        $imageAndContent
            ->addButtonGroup('image_display', [
                'instructions' => 'Choose whether the image should be cropped or contained',
                'wrapper' => [
                    'width' => '50%',
                ],
            ])
            ->addChoice('crop', 'Crop')
            ->addChoice('contain', 'Contain')
            ->setDefaultValue('crop');

        $imageAndContent
            ->addButtonGroup('image_placement', [
                'label' => 'Desktop Image Placement',
                'instructions' => 'Choose whether the image should be on the left or right on desktop',
                'wrapper' => [
                    'width' => '50%',
                ],
            ])
            ->addChoice('left', 'Left')
            ->addChoice('right', 'Right')
            ->setDefaultValue('right');

        return $imageAndContent->build();
    }

    /**
     * determines whether a block can be rendered or not
     *
     * @return string
     */
    public function canRenderBlock($field): bool|string
    {
        if ($field) {
            return true;
        }

        return false;
    }

    /**
     * Return the Anchor
     */
    public function getBlockAnchor(): string
    {
        $anchor = '';
        if (isset($this->block->anchor)) {
            $anchor = $this->block->anchor;
        }

        return $anchor;
    }

    /**
     * Return the classes added via CMS
     */
    public function getBlockClasses(): string
    {
        return $this->classes;
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
