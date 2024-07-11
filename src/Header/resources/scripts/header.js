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
        // As user is using mouse, assuming accesibility features aren't required, so disable
        this.state.accessibleMode = false;
        this.setActiveNav(navItem);
      });
      navItem.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
          // As user is using keyboard, assuming accesibility features are required, so enable
          this.state.accessibleMode = true;
          this.setActiveNav(navItem, true);
        }
      });
    });

    // If user presses the escape button on an open subnav, close it
    this.subnavContainer.addEventListener('keydown', (event) => {
      if (event.key === 'Escape') {
        this.header.querySelector(`[data-nav-id="${this.state.activeNav}"] button`).focus();
        this.handleActiveNav('close');
        this.toggleSubnav('close');
      }
    })

    // Closes the subnav if user's mouse leaves the header.
    this.header.addEventListener('mouseleave', (event) => {
      console.log(event.target);
      if (!event.target.closest('.c-header')) return;
      if (event.target.dataset.hasSubnav) return;

      this.handleActiveNav('close');
      this.toggleSubnav('close');
    })
  }

  setActiveNav(navItem) {

    if (!navItem.dataset.hasSubnav) {
      // If subnav is open and user mouses over a normal nav link, close subnav
      this.closeActiveNav();
    } else {
      // Set active nav and rerender frontend
      this.openActiveNav(navItem.dataset.navId);
    }

  }

  toggleSubnav(state) {
    // Subnav is changing, remove currently active subnav
    this.deactivateElement('c-header__subnav--active');

    // Opening new subnav
    if (this.state.activeNav && state === 'open') {
      // Open subnav container and transition height to fit content
      this.subnavContainer.classList.add('c-header__subnav-container--active');
      this.subnavContainer.style.height = this.header.querySelector(`[data-subnav-id="${this.state.activeNav}"]`) ? `${this.header.querySelector(`[data-subnav-id="${this.state.activeNav}"]`).offsetHeight}px` : 0;

      const subnavItem= this.header.querySelector(`[data-subnav-id="${this.state.activeNav}"]`);
      subnavItem.setAttribute('aria-expanded', 'true');
      subnavItem.classList.add('c-header__subnav--active');

      // If accessibleMode (keyboard navigating), focus first item in subnav
      if (this.state.accessibleMode) {
        // A small delay is required, as the focus interrupts the dropdown of the subnav.
        setTimeout(() => {
          this.header.querySelector(`[data-subnav-id="${this.state.activeNav}"] > [tabindex="0"]:first-of-type`).focus();
        }, 250);

        // Allows keyboard users to loop through items in an active subnav. (Tabbing on last element takes you to first, shift + tab on first element takes you to last element.)
        this.setFocusTrap(subnavItem);
      }
    }

    // Close the subnav
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
    // Active nav item is changing, remove currently active nav item
    this.deactivateElement('c-header__nav-item--active');

    if (this.state.activeNav && state === 'open') {
      const navItem = this.header.querySelector(`[data-nav-id="${this.state.activeNav}"]`);
      navItem.setAttribute('aria-expanded', 'true');
      navItem.classList.add('c-header__nav-item--active');
      this.header.classList.add('c-header--active');
    }

    if (state === 'close') {
      // Remove currently active nav item
      this.deactivateElement('c-header--active')
      this.deactivateElement('c-header__nav-item--active');
    }
  }

  // Finds the element with the active class passed as the parameter, removes the active class and toggles the aria-expanded attribute if required.
  deactivateElement(element) {
    const targetElement = document.querySelector(`.${element}`)

    if (targetElement) {
      if (targetElement.hasAttribute('aria-expanded')) {
        targetElement.setAttribute('aria-expanded', 'false');
      }

      targetElement.classList.remove(element);
    }
  }

  setFocusTrap(activeSubnav) {
    // Check activeSubnav is active
    if (activeSubnav.classList.contains('c-header__subnav--active')) {
      // Get first and last focusable Elements
      const firstFocusableElement = activeSubnav.querySelector('[tabindex="0"]:first-child');
      const lastFocusableElement = activeSubnav.querySelector('[tabindex="0"]:last-child');


      activeSubnav.addEventListener('keydown', (event) => {
        if (event.key === 'Tab') {
          if (event.shiftKey) { // Shift + Tab
            // If focused element is firstFocusableElement, and user has pressed Shift + Tab, focus last element in list
            if (document.activeElement === firstFocusableElement) {
              lastFocusableElement.focus();
              event.preventDefault();
            }
          } else { // Tab
            // If focused element is lastFocusableElement, focus first element in list
            if (document.activeElement === lastFocusableElement) {
              firstFocusableElement.focus();
              event.preventDefault();
            }
          }
        }
      })
    }

  }

  // Handles updating the frontend
  render(action) {
    this.handleActiveNav(action);
    this.toggleSubnav(action);
  }
}

const header = new Header();
header.init();
