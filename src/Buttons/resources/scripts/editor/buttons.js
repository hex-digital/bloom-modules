import arrive from 'arrive';

document.arrive('.c-btn', () => {
  const buttons = document.querySelectorAll('.c-btn');

  buttons.forEach((button) => {
    button.removeAttribute('href');
  });
});
