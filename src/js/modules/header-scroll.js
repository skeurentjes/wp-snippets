export default class HeaderScroll {
    constructor(el) {
        this.header = el;

        window.addEventListener('scroll', () => {
            this.toggleHeaderClass(window.pageYOffset);
        })
    }

    toggleHeaderClass(scrolled) {
        if (scrolled > 180) {
            this.header.classList.add('is-scrolled');
        } else {
            this.header.classList.remove('is-scrolled');
        }
    }
}