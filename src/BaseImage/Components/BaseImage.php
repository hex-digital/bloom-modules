<?php

declare(strict_types=1);

namespace Bloom\Components\BaseImage;

use Roots\Acorn\View\Component;

class BaseImage extends Component
{
    public $id;

    public $maxSize;

    public $caption;

    public $src;

    public $srcset;

    public $srcset_sizes;

    public $alt;

    public $meta;

    public $title;

    public $class;

    public $imageType;

    public function __construct($id, $maxSize = 'large', $alt = true, $caption = false, $class = null, $imageType = 'default')
    {
        $this->id = $id;
        $this->maxSize = $maxSize;
        $this->imageType = $imageType;

        if (! wp_attachment_is_image($this->id)) {
            return;
        }

        $this->src = wp_get_attachment_image_src($this->id, $this->maxSize)[0];
        $this->srcset = wp_get_attachment_image_srcset($this->id, $this->maxSize);
        $this->srcset_sizes = wp_get_attachment_image_sizes($this->id, $this->maxSize);
        $this->meta = wp_get_attachment_metadata($this->id);
        $this->title = get_the_title($this->id);

        $this->caption = $this->getCaption($caption);

        $this->alt = $this->getAlt($alt);

        $this->class = $this->generateClasses($class);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        if (! $this->canOutputImage()) {
            return '';
        }

        return $this->view('BaseImage.resources.views.components.base-image');
    }

    /**
     * Check if the component has enough data to try and output an img tag.
     *
     * @return bool
     */
    private function canOutputImage()
    {
        return $this->id && $this->src;
    }

    /**
     * Get the caption to use for this image.
     *
     * @param  bool|string  $caption  The image caption to use, or true to try and use the image's caption from the CMS.
     * @return string
     */
    private function getCaption($caption)
    {

        if ($this->imageType === 'cover') {
            return false;
        }

        if ($caption === true) {
            $caption = get_the_excerpt($this->id);
        }

        return $caption;
    }

    /**
     * Get the alt text to use for this image.
     *
     * @param  bool|string  $alt  The alt text to use, or true to try and use the image's alt text from the CMS.
     * @return string
     */
    private function getAlt($alt)
    {

        if ($this->imageType === 'cover') {
            return false;
        }

        if ($alt === true) {
            $alt = get_post_meta($this->id, '_wp_attachment_image_alt', true);
        }

        return $alt;
    }

    /**
     * Get the classes to use for this image.
     *
     * @param  bool|string  $class  Apply a custom class.
     * @return string
     */
    private function generateClasses($class)
    {
        $styles['default'] = $this->caption ? '' : 'c-base-image';
        $styles['imageType'] = $this->getImageTypeClass();

        return implode(' ', $styles);
    }

    private function getImageTypeClass()
    {
        if ($this->imageType === 'cover') {
            return 'c-base-image--cover';
        }
    }
}
