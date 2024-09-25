<?php

namespace Bloom\Blocks\TabbedContent;

use Bloom\Constants\PostType;
use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class TabbedContentPage extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Tabbed Content Page';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Tabbed Content Page block.';

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
    public $keywords = ['tabbed', 'content', 'page'];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [PostType::TABBED_CONTENT];

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
    public $view = 'Blocks.TabbedContent.tabbed-content-page';

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'canRenderBlock' => $this->canRenderBlock(get_field('nav_label')),
            'blockClasses' => $this->getBlockClasses(),
            'blockAnchor' => $this->getBlockAnchor(),
            'navLabel' => str_replace(' ', '-', strtolower(get_field('nav_label'))),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $tabbedContentPage = Builder::make('tabbed_content_page');

        $tabbedContentPage
            ->addText('nav_label', [
                'label' => 'Navigation Label',
                'instructions' => 'Label to appear within the left hand navigation for this page.',
            ]);

        return $tabbedContentPage->build();
    }

    /**
     * determines whether a block can be rendered or not
     *
     * @return string
     */
    public function canRenderBlock($field)
    {
        if ($field) {
            return true;
        }

        return false;
    }

    /**
     * Return the Anchor
     *
     * @return string
     */
    public function getBlockAnchor()
    {
        $anchor = '';
        if (isset($this->block->anchor)) {
            $anchor = $this->block->anchor;
        }

        return $anchor;
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
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
        //
    }
}
