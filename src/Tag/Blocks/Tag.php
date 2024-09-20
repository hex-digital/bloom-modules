<?php

namespace Bloom\Blocks\Tag;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Tag extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Tag';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Tag block.';

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
        'anchor' => false,
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
    public $view = 'Blocks.Tag.tag';

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'blockClasses' => $this->getBlockClasses(),
            'text' => (bool) get_field('text') ? get_field('text') : 'Tag goes here',
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $tag = Builder::make('tag');

        $tag
            ->addText('text', [
                'label' => 'Text',
                'instructions' => 'Add tag text',
            ]);

        return $tag->build();
    }

    /**
     * Return the classes added via CMS
     *
     * @return string
     */
    public function getBlockClasses()
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
