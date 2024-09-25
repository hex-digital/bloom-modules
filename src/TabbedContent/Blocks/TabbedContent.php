<?php

namespace Bloom\Blocks\TabbedContent;

use Bloom\Constants\PostType;
use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class TabbedContent extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Tabbed Content';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Tabbed Content block.';

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
        'src' => 'admin-post',
    ];

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['tabbed', 'content'];

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
        'jsx' => false,
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
    public $view = 'Blocks.TabbedContent.tabbed-content';

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        $tabbedContent = $this->getTabbedContentPages();

        return [
            'canRenderBlock' => $this->canRenderBlock($tabbedContent),
            'blockClasses' => $this->getBlockClasses(),
            'blockAnchor' => $this->getBlockAnchor(),
            'navHeading' => get_field('nav_heading'),
            'tabbedContent' => $tabbedContent,
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $tabbedContent = Builder::make('tabbed_content');

        $tabbedContent
            ->addPostObject('content_pages', [
                'label' => 'Choose the tabbed content',
                'post_type' => PostType::TABBED_CONTENT,
                'filters' => [
                    0 => 'search',
                ],
                'return_format' => 'object',
            ])
            ->addText('nav_heading', [
                'label' => 'Navigation Heading',
                'instructions' => 'Add a heading above the navigation',
            ]);

        return $tabbedContent->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */

    /**
     * determines whether a block can be rendered or not
     *
     * @return string
     */
    public function canRenderBlock($tabbedContent)
    {
        return (bool) $tabbedContent;
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

    public function getTabbedContentPages()
    {
        $contentPages = get_field('content_pages');

        if (! $contentPages) {
            return null;
        }

        $post = get_post($contentPages->ID);

        $postContent = trim($post->post_content, '"');
        $blockData = [];

        if (has_blocks($postContent)) {
            $blocks = parse_blocks($postContent);
            foreach ($blocks as $block) {
                if (! isset($block['blockName']) || ! isset($block['attrs']['data']) || ! isset($block['attrs']['data']['nav_label'])) {
                    continue;
                }

                if ($block['attrs']) {
                    $blockData[] = [
                        'slug' => str_replace(' ', '-', strtolower($block['attrs']['data']['nav_label'])),
                        'label' => $block['attrs']['data']['nav_label'],
                        'page' => render_block($block),
                    ];
                }
            }

            return $blockData;
        } else {
            return null;
        }

    }
}
