<?php

namespace Bloom\Blocks\Section;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Section extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Section';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Section block.';

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
    public $view = 'Blocks.Section.section';

    protected $defaultWrapperSize = 'default';

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'blockClasses' => $this->getBlockClasses(),
            'innerBlockClasses' => $this->getInnerBlockClasses(),
            'blockAnchor' => $this->getBlockAnchor(),
            'wrapperSize' => get_field('wrapper_size') ?? $this->defaultWrapperSize,
        ];
    }

    public function fields()
    {
        $section = Builder::make('section');

        $section
            ->addButtonGroup('wrapper_size', [
                'instructions' => 'Set a different size for the content wrapper',
            ])
            ->addChoice('sm', 'Small')
            ->addChoice($this->defaultWrapperSize, 'Default')
            ->setDefaultValue($this->defaultWrapperSize);

        //        $section
        //            ->addButtonGroup('vertical_alignment', [
        //                'instructions' => 'Choose whether the content should align top, center or bottom',
        //            ])
        //            ->addChoice('top', 'Top')
        //            ->addChoice('center', 'Center')
        //            ->addChoice('bottom', 'Bottom')
        //            ->setDefaultValue('center');

        $section
            ->addButtonGroup('horizontal_alignment', [
                'instructions' => 'Choose whether the content should align left, center or right',
            ])
            ->addChoice('left', 'Left')
            ->addChoice('center', 'Center')
            ->addChoice('right', 'Right')
            ->setDefaultValue('center');

        return $section->build();
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
     * Return the classes added via CMS
     */
    public function getInnerBlockClasses(): string
    {

        $valign = get_field('vertical_alignment');
        $halign = get_field('horizontal_alignment');

        $classes = [];

        if ($valign === 'top') {
            $classes[] = 'justify-start';
        } elseif ($valign === 'bottom') {
            $classes[] = 'justify-end';
        } elseif ($valign === 'center') {
            $classes[] = 'justify-center';
        }

        if ($halign === 'left') {
            $classes[] = 'desk:items-start';
        } elseif ($halign === 'right') {
            $classes[] = 'desk:items-end';
        } elseif ($halign === 'center') {
            $classes[] = 'desk:items-center desk:text-center';
        }

        return implode(' ', $classes);
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
