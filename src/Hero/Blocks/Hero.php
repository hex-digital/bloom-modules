<?php

namespace Bloom\Blocks\Hero;

use Bloom\Helpers\AcfHelper;
use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Hero extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Hero';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Hero block.';

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
    public $keywords = ['hero', 'video'];

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
    public $view = 'Blocks.Hero.hero';

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'canRenderBlock' => $this->canRenderBlock(['video_image']),
            'blockAnchor' => $this->getBlockAnchor(),
            'videoPoster' => get_field('video_image'),
            'video' => htmlspecialchars(AcfHelper::acfOembedBackgroundWithOptions(get_field('video_oembed'))),
            'innerBlocksTemplate' => esc_attr(wp_json_encode([
                ['acf/tag'],
                ['core/heading', [
                    'level' => 1,
                    'placeholder' => 'Title Goes Here',
                ]],
                ['core/paragraph', [
                    'placeholder' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit.',
                ]],
            ])),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $hero = Builder::make('hero');

        $hero
            ->addImage('video_image')
            ->addOembed('video_oembed', [
                'label' => 'Video',
                'instructions' => 'Add a video URL from YouTube or Vimeo',
            ]);

        return $hero->build();
    }

    /**
     * determines whether a block can be rendered or not
     *
     * @return string
     */
    public function canRenderBlock($field): bool|string
    {
        return AcfHelper::allFieldData($field);
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
}
