# GamiPress - Gutenberg Blocks #

Development repository of GamiPress Blocks for Gutenberg.

## Requirements ##

- GamiPress 1.6.0 or higher
- Gutenberg

**Note:** Enabling this plugin will dequeue GamiPress blocks assets to enqueue development ones.

## Node.js commands ##

Development:
```
npm start
```

Production:
```
npm run build
```

## Changelog ##

### 1.1.2 ###

* Fixed issue with preview in backend.

### 1.1.1 ###

* Fixed issue that prevent RadioControl changes.
* Ensure to use the field default value if field value is not set.
* Make conditions able to work with checkboxes.
* Make async select load a set of default options.

### 1.1.0 ###

* Fixed issue on conditions functionality when passing an array to define the condition.
* Added support for Javascript objects conditions.
* Updated project dependencies.

### 1.0.9 ###

* Remove lodash usage to avoid functions conflicts.
* Updated all project dependencies to latest stable releases.

### 1.0.8 ###

* New component: MultiCheckboxControl (works equal than RadioControl but with checkboxes).
* Added support for multicheck fields through MultiCheckboxControl.

### 1.0.7 ###

* On field conditions added support to array values.

### 1.0.6 ###

* Force React-Select fields value to string.

### 1.0.5 ###

* Make React-Select fields full width.
* Added support for color pickers (using the ColorPalette control) at this moment without alpha support.
* Added the class gamipress-field-type-{field_type} to each field.

### 1.0.4 ###

* Removed wp-blocks dependency on front-end assets.

### 1.0.3 ###

* HTML improvements following the Gutenberg structure of PanelBody > PanelRow.
* Improvements on tabs fields loop.
* Added GamiPress front-end styles to editor styles.
* Fixed repeated fields rendering on tabs.

### 1.0.2 ###

* Added support to 'relation' index on field 'conditions' argument.

### 1.0.1 ###

* Use block icons given from server.
* Improvements on shortcode to block name transforms.
* Allow HTML on fields help.
* Turn textarea fields into TextareaControl.

### 1.0.0 ###

* Initial release.
