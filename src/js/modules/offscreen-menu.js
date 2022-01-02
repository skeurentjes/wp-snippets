export default class OffscreenMenu {
  constructor(el) {
    this.menu = document.querySelector('.js-offscreen-menu');

    el.addEventListener('click', (e) => {
      e.preventDefault();
      this.toggle(el);
    })
  }

  toggle() {
    this.menu.classList.toggle('is-active');
  }
}
