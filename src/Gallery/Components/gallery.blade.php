<div class="c-gallery">
  @foreach ($images as $imageData)
    <div class="c-gallery__image">
      <x-bloom-base.image :id="$imageData['image']" :alt-override="$imageData['alt']"/>
    </div>
  @endforeach
</div>
