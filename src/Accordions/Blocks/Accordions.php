<?php

namespace Bloom\Blocks\Accordions;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Accordions extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Accordions';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Accordions block.';

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
    public $view = 'Blocks.Accordions.accordions';

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'blockAnchor' => $this->getBlockAnchor(),

            'allowedBlocks' => esc_attr(wp_json_encode([
                'acf/accordion',
            ])),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $accordions = Builder::make('accordions');

        return $accordions->build();
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
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
