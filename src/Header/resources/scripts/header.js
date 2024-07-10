class Header {
  constructor() {
    this.header = document.querySelector('.c-header');
    this.subnavContainer = document.querySelector('.c-header__subnav-container');
    this.state = {
      activeNav: null,
      subnavHeight: 0,
      accessibleMode: false,
    };
  }

  init() {
    this.bindEvents();
  }

  bindEvents() {
    const navItems = this.header.querySelectorAll('.c-header__nav-item');

    // Listen to mouseover or key.enter events on Main nav items. If item has subnav, then open it.
    navItems.forEach((navItem) => {
      navItem.addEventListener('mouseover', () => {
        //As user is using mouse, assuming accesibility features aren't needed so disable
        this.state.accessibleMode = false;
        this.setActiveNav(navItem);
      });
      navItem.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
          //As user is using keyboard, assuming accesibility features required needed so enable
          this.state.accessibleMode = true;
          this.setActiveNav(navItem, true);
        }
      });
    });

    this.subnavContainer.addEventListener('keydown', (event) => {
      if (event.key === 'Escape') {
        this.header.querySelector(`[data-nav-id="${this.state.activeNav}"] button`).focus();
        this.handleActiveNav('close');
        this.toggleSubnav('close');
      }
    })
  }

  setActiveNav(navItem) {

    if (!navItem.dataset.hasSubnav) {
      // If subnav is open and mouseover a normal nav link, call function to reset active navs
      this.closeActiveNav();
    } else {
      //Call function to set active nav and rerender frontend
      this.openActiveNav(navItem.dataset.navId);
    }

  }

  toggleSubnav(state) {
    // subnav is changing to remove currently active subnav
    this.deactivateElement('c-header__subnav--active');

    // opening the subnav
    if (this.state.activeNav && state === 'open') {
      // open subnav container and transition height to new
      this.subnavContainer.classList.add('c-header__subnav-container--active');
      this.subnavContainer.style.height = this.header.querySelector(`[data-subnav-id="${this.state.activeNav}"]`) ? `${this.header.querySelector(`[data-subnav-id="${this.state.activeNav}"]`).offsetHeight}px` : 0;

      const subnavItem= this.header.querySelector(`[data-subnav-id="${this.state.activeNav}"]`);
      subnavItem.setAttribute('aria-expanded', 'true');
      subnavItem.classList.add('c-header__subnav--active');

      //if accessibleMode (keyboard navigating), focus first item in subnav
      if (this.state.accessibleMode) {
        // A small delay is required, as the focus interrupts the dropdown of the subnav.
        setTimeout(() => {
          this.header.querySelector(`[data-subnav-id="${this.state.activeNav}"] > [tabindex="0"]:first-of-type`).focus();
        }, 250);

        // Allows keyboard users to loop through items in a subnav. (Tabbing on last element takes you to first, shift + tab on first element takes you to last element within the subnav.)
        this.setFocusTrap(subnavItem);
      }
    }

    // closing the subnav
    if (state === 'close') {
      this.deactivateElement('c-header__subnav-container--active');
      this.deactivateElement('c-header__subnav--active');
      this.subnavContainer.style.height = 0;
    }
  }

  openActiveNav(navId) {
    this.state.activeNav = navId;
    this.render('open')
  }

  closeActiveNav() {
    this.state.activeNav = null;
    this.render('close')
  }

  handleActiveNav(state) {
    // active nav item is changing to remove currently active nav item
    this.deactivateElement('c-header__nav-item--active');

    if (this.state.activeNav && state === 'open') {
      const navItem = this.header.querySelector(`[data-nav-id="${this.state.activeNav}"]`);
      navItem.setAttribute('aria-expanded', 'true');
      navItem.classList.add('c-header__nav-item--active');
    }

    if (state === 'close') {
      // completely closing nav items
      this.deactivateElement('c-header__nav-item--active');
    }
  }

  // finds the element with the active class (passed as parameter), removes the active class and toggles the aria-expanded attribute if required.
  deactivateElement(element) {
    const targetElement = this.header.querySelector(`.${element}`)

    if (targetElement) {
      if (targetElement.hasAttribute('aria-expanded')) {
        targetElement.setAttribute('aria-expanded', 'false');
      }

      targetElement.classList.remove(element);
    }
  }

  setFocusTrap(activeSubnav) {
    // check activeSubnav is indeed active
    if (activeSubnav.classList.contains('c-header__subnav--active')) {
      //get first and last focusable Elements
      const firstFocusableElement = activeSubnav.querySelector('[tabindex="0"]:first-child');
      const lastFocusableElement = activeSubnav.querySelector('[tabindex="0"]:last-child');


      // event listener on active subnav
      activeSubnav.addEventListener('keydown', (event) => {
        if (event.key === 'Tab') {
          if (event.shiftKey) { // Shift + Tab
            // if focused element is firstFocusableElement, and user has shift + Tab, focus last element in list
            if (document.activeElement === firstFocusableElement) {
              lastFocusableElement.focus();
              event.preventDefault();
            }
          } else { // Tab
            // if focused element is lastFocusableElement, focus first element in list
            if (document.activeElement === lastFocusableElement) {
              firstFocusableElement.focus();
              event.preventDefault();
            }
          }
        }
      })
    }

  }

  // handles updating the frontend
  render(action) {
    this.handleActiveNav(action);
    this.toggleSubnav(action);
  }
}

const header = new Header();
header.init();
