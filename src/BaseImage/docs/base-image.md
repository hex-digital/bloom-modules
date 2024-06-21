# BaseImage

---

The BaseImage module can be used to easily output images from their
attachment ID in WordPress. This can be used for any image that has an ID,
such as those attached to posts, or those uploaded to ACF Image fields.

#### Usage

```php
<x-bloom-base.image
    :id="$image"
    class="u-h-full"
    caption="This is my caption"
/>
```

#### Props
- `$id`
    - Integer
    - Required


- `$maxSize`
    - string
    - Default `'large'`
    - A WordPress thumbnail size slug, such as 'large' or 'thumbnail'


- `$alt`
    - string|boolean
    - Default `true`
    - A string to set the alt text, or the boolean `true` to use the alt given to the image in the CMS. Use a blank string for presentational images


- `$caption`
    - string|boolean
    - Default: `false`
    - A string to set the caption text, or the boolean `true` to use the caption given to the image in the CMS.


- `$class`
    - string
    - Default: `null`
    - Usefull for adding tailwind utility classes
