<?php

declare(strict_types=1);

namespace Bloom\Blocks\Buttons;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Buttons extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Buttons';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A set of buttons';

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
        'src' => 'embed-generic',
    ];

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['button', 'buttons', 'links'];

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
        'align' => false,
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
    public $view = 'Blocks.Buttons.buttons';

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'buttons' => $this->buttons(),
            'buttonAlignment' => get_field('button_alignment'),

        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $buttons = Builder::make('buttons');

        $buttons
            ->addTab('buttons')
            ->addRepeater('buttons', [
                'min' => 1,
                'max' => 3,
                'button_label' => 'Add a Button',
                'layout' => 'block',
            ])
            ->addTab('Data')
            ->addLink('link')
            ->addTab('Styling')
            ->addSelect('button_style', [
                'label' => 'Button Style',
                'instructions' => '',
                'choices' => [
                    'btn-primary' => 'Primary Button',
                    'btn-secondary' => 'Secondary Button',
                ],
                'default_value' => 'btn-primary',
                'allow_null' => 0,
                'multiple' => 0,
                'ajax' => 1,
                'return_format' => 'value',
            ]);
        $buttons
            ->addTab('buttons_group')
            ->addSelect('button_alignment', [
                'label' => 'Button Alignment',
                'instructions' => 'Set the alignment of this group of buttons',
                'choices' => [
                    'left' => 'Left',
                    'center' => 'Center',
                    'right' => 'Right',
                ],
                'default_value' => 'start',
            ]);

        return $buttons->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function buttons()
    {
        return get_field('buttons');
    }

    /**
     * Assets to be enqueued when rendering the block.
     */
    public function enqueue(): void
    {
    }
}
