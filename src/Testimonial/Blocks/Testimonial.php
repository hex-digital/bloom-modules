<?php

namespace Bloom\Blocks\Testimonial;

use Bloom\Blocks\BaseImage\BaseImagePartial;
use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Testimonial extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Testimonial';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Testimonial block.';

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
    public $view = 'Blocks.Testimonial.testimonial';

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        //      dd(get_field('testimonial'));
        return [
            'canRenderBlock' => $this->canRenderBlock(get_field('testimonial')),
            'testimonial' => get_field('testimonial'),
            'name' => get_field('name'),
            'organisation' => get_field('organisation'),
            'image' => get_field('image'),
            'alt' => get_field('alt'),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $testimonial = Builder::make('testimonial');

        $testimonial
            ->addTextarea('testimonial', [
                'label' => 'Testimonial',
                'instructions' => 'Add testimonial here',
            ]);

        $testimonial
            ->addText('name', [
                'label' => 'Full name',
            ]);

        $testimonial
            ->addText('organisation', [
                'label' => 'Organisation',
            ]);

        $testimonial
            ->addPartial(BaseImagePartial::class);

        return $testimonial->build();
    }

    /**
     * determines whether a block can be rendered or not
     */
    public function canRenderBlock($field): bool|string
    {
        if ($field) {
            return true;
        }

        return false;
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
