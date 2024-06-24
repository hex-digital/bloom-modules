<?php

namespace Bloom\Modules\TemplateUpperCamelCase\Blocks;


use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class TemplateUpperCamelCase extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'TemplateName';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple TemplateName block.';

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
    public $icon = array(
        'background' => '#fff',
        'foreground' => '#50bb7b',
        'src' => 'welcome-widgets-menus',
    );

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
    public $view = 'TemplateUpperCamelCase.resources.views.blocks.template-kebab';

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'canRenderBlock' => $this->canRenderBlock(get_field('something')),
            'blockClasses' => $this->getBlockClasses(),
            'blockAnchor' => $this->getBlockAnchor(),
            'classes' => $this->generateClasses(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $templateVaribale = Builder::make('template_snake');

        /**
        * ACF Fields
        * https://github.com/Log1x/acf-builder-cheatsheet
        */

        return $templateVaribale->build();
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
     * If fields affect the style of this block, we can generate the classes and pass them to the front-end here
     *
     * @return string
     */
    public function generateClasses()
    {
      $styles['heroTheme'] = 'u-theme--' . get_field('theme');

      return implode(' ', $styles);
    }


    /**
     * Return the Anchor
     *
     * @return string
     */
    public function getBlockAnchor() {
        $anchor = '';
        if( isset($this->block->anchor ) ) {
            $anchor = $this->block->anchor;
        }

        return $anchor;
    }

    /**
     * Return the classes added via CMS
     *
     * @return string
     */
    public function getBlockClasses() {
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
