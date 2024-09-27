document.addEventListener("DOMContentLoaded", function () {
  const hero = document.querySelector('.c-hero');

  // If hero not present, or hero doesn't have a video, exit.
  if (!hero) return;

  const video = hero.dataset.video;
  const embedContainer = hero.querySelector('.c-hero__embed');

  // Check if browser size is greater than our "desk" breakpoint
  if (window.innerWidth > 1040) {
    // Show embed container and insert video within it.
    embedContainer.insertAdjacentHTML('afterbegin', video);

    setTimeout(() => {
      embedContainer.classList.add('c-hero__embed--visible');
    }, 500);
  }
});
