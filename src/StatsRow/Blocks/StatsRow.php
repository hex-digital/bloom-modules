<?php

namespace Bloom\Blocks\StatsRow;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class StatsRow extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Stats Row';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Stats Row block.';

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
    public $view = 'Blocks.StatsRow.stats-row';

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        $statsRow = get_field('statistic');

        return [
            'canRenderBlock' => $this->canRenderBlock($statsRow),
            'statsRow' => $statsRow,
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $statsRow = Builder::make('stats_row');

        $statsRow
            ->addRepeater('statistic', [
                'label' => 'Statistic',
                'instructions' => 'Add statistic',
                'button_label' => 'Add Stat',
            ])
            ->addText('prefix', [
                'label' => 'Prefix',
                'instructions' => 'Add prefix',
            ])
            ->addText('stat', [
                'label' => 'Stat',
                'instructions' => 'Add stat',
            ])
            ->addText('suffix', [
                'label' => 'Suffix',
                'instructions' => 'Add suffix',
            ])
            ->addText('description', [
                'label' => 'Description',
                'instructions' => 'Add description',
            ]);

        return $statsRow->build();
    }

    /**
     * determines whether a block can be rendered or not
     */
    public function canRenderBlock($statsRow): bool
    {
        return (bool) $statsRow;
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
