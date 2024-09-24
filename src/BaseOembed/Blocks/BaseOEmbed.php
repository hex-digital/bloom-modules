<?php

namespace Bloom\Blocks\BaseOEmbed;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class BaseOEmbed extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Base Oembed';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Base Oembed block.';

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
    public $view = 'Blocks.BaseOEmbed.base-oembed';

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        $baseOembed = get_field('base_oembed');

        return [
            'canRenderBlock' => $this->canRenderBlock($baseOembed),
            'blockClasses' => $this->getBlockClasses(),
            'blockAnchor' => $this->getBlockAnchor(),
            'baseOembed' => $baseOembed,
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $baseOembed = Builder::make('base_oembed');

        $baseOembedRepeater = $baseOembed
            ->addRepeater('base_oembed', [
                'min' => 1,
                'max' => 3,
                'layout' => 'block',
            ]);

        $baseOembedRepeater
            ->addOembed('oembed', [
                'label' => 'Video',
                'instructions' => 'Add a video URL from YouTube or Vimeo',
            ])

            ->addText('heading', [
                'label' => 'Video Heading',
                'instructions' => 'Heading for video',
            ]);

        return $baseOembed->build();
    }

    /**
     * determines whether a block can be rendered or not
     *
     * @return string
     */
    public function canRenderBlock($baseOembed): bool|string
    {
        if ($baseOembed) {
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
