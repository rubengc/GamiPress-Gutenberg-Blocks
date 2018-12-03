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