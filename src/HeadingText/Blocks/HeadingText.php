<?php

namespace Bloom\Blocks\HeadingText;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class HeadingText extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Heading Text';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Heading Text block.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'bloom-inner';

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
    public $view = 'Blocks.HeadingText.heading-text';

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'canRenderBlock' => $this->canRenderBlock(get_field('heading')),
            'heading' => get_field('heading'),
            'text' => get_field('text'),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $headingText = Builder::make('heading_text');

        $headingText
            ->addText('heading', [
                'label' => 'Heading',
                'instructions' => 'Add Heading text',
            ]);

        $headingText
            ->addTextarea('text', [
                'label' => 'Text',
                'instructions' => 'Add paragraph text',
            ]);

        return $headingText->build();
    }

    /**
     * determines whether a block can be rendered or not
     *
     * @return string
     */
    public function canRenderBlock($heading): bool|string
    {
        if ($heading) {
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
