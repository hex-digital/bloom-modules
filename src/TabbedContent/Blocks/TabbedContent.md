# TabbedContent Module

This module creates an interactive group of tabbed content. The module uses the ARIA `tab`, `tablist` and `tabpanel` roles for improved accessibility and screen reader experience. 

## Prerequisites

This module uses alpine.js for interactivity and functionality.

```
yarn add alpinejs
```

## Module notes

### Alpine.js
The module is initalised as an Alpine component at the root of the module, within `tabbed-content.blade.php`. The module displays the active `tab` and `tabpanel` by checking what has been set to the `activePage` data. 

When a `tab` is clicked or navigated to by keyboard, we dispatch an event (`update:page`) to update the `activePage` variable, which is set at the root of the module too. 

We've also added instructions and a keyboard event, specifically for screen reader users. This event, captures the data within the active `tabPanel`, and resets it to the same data. This is to ensure that when a screen reader user, tabs to the module for the first time, the default `tabPanel` is read out. 

This was the only way I was able to get this to work. 

### CSS effects

The `tabpanels`, have a small CSS transition on the, which fades and slides the `tabpanel` in on activation. On intial page load, there was a FOUC (Flash of Unstyled  Content), where all `tabpanels` were visible, before the CSS was loaded and then they'd fly out. To counter this, we set inline styles onto the `tabpanels` 


## Structure

```
TabbedContent/     # Modules Directory
|- Blocks/         # Files to create and implement ACF blocks
|- Components/     # Module components - building blocks used within the module1
|- Composers/      # Module composers to pass data to view files
|- Fields          # Files to create and implement ACF fields
└─ resources       # Module assets and templates
  |- scripts       # Module JavaScript
  |- styles        # Module CSS 
  └─ views         # Module templates
    |- blocks      # Module block tempaltes
    └─ components  # Module component tempaltes
```


## Authors

* **Giuseppe Castiglione** - *Initial work* - [GitHub](https://github.com/giuseppe-hex)

## Links

* [Alpine.js](https://alpinejs.dev/)
* ARIA - [tab](https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Roles/tab_role#description), [tablist](https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Roles/tablist_role), [tabpanel](https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Roles/tabpanel_role)
