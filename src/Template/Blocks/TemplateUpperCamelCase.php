<?php

namespace Bloom\Modules\TemplateUpperCamelCase\Blocks;


use  arrayLog1x\AcfComposer\Block;
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
    public string $description = 'A simple TemplateName block.';

    /**
     * The block category.
     *
     * @var string
     */
    public string $category = 'bloom';

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
    public array $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public array $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public array $parent = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public string $mode = 'preview';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public string $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public string $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public string $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public array $supports = [
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
    public array $styles = [];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public array $example = [];

    /**
     * The block view.
     *
     * @var array
     */
    public string $view = 'TemplateUpperCamelCase.resources.views.blocks.template-kebab';

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with(): array
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
    public function fields(): array
    {
        $templateVariable = Builder::make('template_snake');

        /**
        * ACF Fields
        * https://github.com/Log1x/acf-builder-cheatsheet
        */

        return $templateVariable->build();
    }


    /**
     * determines whether a block can be rendered or not
     *
     * @return string
     */
    public function canRenderBlock($field): bool|string
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
    public function generateClasses(): string
    {
      $styles['heroTheme'] = 'u-theme--' . get_field('theme');

      return implode(' ', $styles);
    }


    /**
     * Return the Anchor
     *
     * @return string
     */
    public function getBlockAnchor(): string
    {
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
