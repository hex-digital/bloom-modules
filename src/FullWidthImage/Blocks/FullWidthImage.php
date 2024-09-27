<?php

namespace Bloom\Blocks\FullWidthImage;

use Bloom\Blocks\BaseImage\BaseImagePartial;
use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class FullWidthImage extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Full Width Image';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Full Width Image block.';

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
    public $view = 'Blocks.FullWidthImage.full-width-image';

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        $fullWidthImage = get_field('image');

        return [
            'canRenderBlock' => $this->canRenderBlock($fullWidthImage),
            'fullWidthImage' => $fullWidthImage,
            'alt' => get_field('alt'),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fullWidthImage = Builder::make('full_width_image');

        $fullWidthImage->addPartial(BaseImagePartial::class);

        return $fullWidthImage->build();
    }

    /**
     * determines whether a block can be rendered or not
     *
     * @return string
     */
    public function canRenderBlock($fullWidthImage): bool|string
    {
        if ($fullWidthImage) {
            return true;
        }

        return false;
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
