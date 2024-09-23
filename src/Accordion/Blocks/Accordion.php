<?php

namespace Bloom\Blocks\Accordion;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Accordion extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Accordion';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Accordion block.';

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
    public $view = 'Blocks.Accordion.accordion';

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        $title = get_field('title');

        return [
            'canRenderBlock' => $this->canRenderBlock($title),
            'title' => $title,
            'allowedBlocks' => esc_attr(wp_json_encode([
                'acf/base-image',
                'acf/buttons',
                'core/heading',
                'core/paragraph',
            ])),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $accordion = Builder::make('accordion');

        $accordion
            ->addText('title', [
                'label' => 'Title',
                'instructions' => 'Add Title text',
            ]);

        return $accordion->build();
    }

    /**
     * determines whether a block can be rendered or not
     */
    public function canRenderBlock($accordion): bool|string
    {
        return (bool) $accordion;
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
