<?php

// BaseSpacer = E.g. Buttons - The name of your module (due to PSR-4), this would be the same as your MODUEL_DIR.
// Base spacer = E.g. Button Groups - This can be different to the module name and appears within dashboard.
// [MODULE_DIR] = E.g. Buttons - The name of the module directory.
// [MODULE_BLADE] = E.g. buttons to represent the file buttons.blade.php - This is the module name but lowercase.
// [MODULE_SNAKE] = E.g buttons_group - This is the snake_case of the Module Title.

namespace Bloom\Modules\BaseSpacer\Blocks;


use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class BaseSpacer extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Spacer';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple spacer block.';

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
    public $view = 'BaseSpacer.resources.views.blocks.base-spacer';

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'desktopHeight' => get_field('desktop_spacer') ?? false,
            'baseHeight' => get_field('base_spacer') ?? false,
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $baseSpacer = new FieldsBuilder('base_spacer');

        $baseSpacer
        ->addRange('desktop_spacer', [
          'label' => 'Desktop Spacer',
          'instructions' => 'Set the spacer height to appear on desktop',
          'default_value' => '0',
          'min' => '0',
          'max' => '500',
          'step' => '1',
          'append' => 'px',
          'wpml_cf_preferences' => 1,
        ]);

        $baseSpacer
        ->addRange('base_spacer', [
          'label' => 'Base spacer',
          'instructions' => 'Set the spacer height to appear on mobile up',
          'default_value' => '0',
          'min' => '0',
          'max' => '500',
          'step' => '1',
          'append' => 'px',
          'wpml_cf_preferences' => 1,
        ]);

        return $baseSpacer->build();
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
