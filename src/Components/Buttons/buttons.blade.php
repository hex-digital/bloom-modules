<div class="o-cluster <?= $alignClass ?>">
  @foreach ($buttons as $button)
    <x-bloom-button :button="$button" />
  @endforeach
</div>
