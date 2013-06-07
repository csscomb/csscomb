CSScomb changelog
================

## 2.13 (xx.06.2013)

- **Sorting:**
    - Support prefixed `background-clip` properties (issue [#186](https://github.com/csscomb/CSScomb/issues/186))
    - Support prefixed `background-size` properties (issue [#154](https://github.com/csscomb/CSScomb/issues/154))
    - Do not remove first character while sorting properties (issue [#192](https://github.com/csscomb/CSScomb/issues/192))
    - Fix order of multiple includes (issues [#152](https://github.com/csscomb/CSScomb/issues/152), [#198](https://github.com/csscomb/CSScomb/issues/198))
    - Rename `sass` to `scss` in order to avoid confusion
    - Remove new line before unknown properties (issue [#122](https://github.com/csscomb/CSScomb/issues/122))
    - Do not add space after sort comments (issue [#104](https://github.com/csscomb/CSScomb/issues/104))
- **Repository:**
    - Add yuicompressor
    - Add highlight.js (issue [#188](https://github.com/csscomb/CSScomb/issues/188))
    - Remove Sublime plugin
    - Remove build/ directory
    - Remove `call.php` from IntelliJ plugins (issue [#161](https://github.com/csscomb/CSScomb/issues/161))
- **Web page:**
    - Show "before" and "after" css example on About page (issue [#92](https://github.com/csscomb/CSScomb/issues/92))
    - Fix typos


## 2.12 (04.01.2013)

- **Sorting:**
    - Issue #148: Passing content blocks to a mixin
    - Issue #143: -moz-border-radius
    - Fix typo: 'pointer-event' -> 'pointer-events'
    - Save newline character between two @extend
    - Issue #127: String interpolation bug
    - Issue #117: Move LESS mixins to top
    - Issue #116: Wrong input file mime type
    - Issue #114: Add text-align-last in sort order list
    - Issue #111: Incorrectly parsing multiple SCSS @extend rules
    - Issue #110: Add pointer-events to sort order list
    - Issue #114: Add text-align-last in sort order list
    - Parse SASS @-directives properly
    - Issue #98: Sort properties with space in front of colon
    - Issue #103 and #105: Add LESS and SASS support, fix #65
- **CLI:**
    - `-i` allows a single file to run and output by default in overwrite mode
- **Repository:**
    - Issue #94: Add Changelog
    - Add CONTRIBUTING.md
    - Issue #165: Remove downloads from github to csscomb.com/downloads
    - English docs
    - Docs: update requirements
    - Add Composer support
    - Espresso plugin: Added LESS, SASS & SCSS syntax context
    - Issue #108: Undefined index: TM_BUNDLE_SUPPORT in Coda 2 plugin
    - Issue #84: TextMate bundle path error in Makefile
- **Web page:**
    - Issue #77: Deny all request in gate in csscomb.com from other domains
    - Issue #88: Improve Updates block in CSScomb.com
    - Issue #86: Remove bold from test case name; Code style fix
    - Issue #89: Update highlight.js and use only CSS package
    - Issue #87: Update twitter button
    - Issue #147: Add Chocolat mixin (plugin) to csscomb.com
