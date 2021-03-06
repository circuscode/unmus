# unmus Custom Plugin

This is the custom WordPress plugin running on [unmus.de](https://www.unmus.de/).

## Description 

unmus custom WordPress plugin provides additional features related to the blog unmus. In addition it manipulates and extends standard features of WordPress and 3rd party plugins. At least some operation functions are added.

## Custom Post Types

Following custom post types are implemented.

* Zimtwolke (Ello)
* Pinseldisko
* Raketenstaub

## Custom Taxonomies

Following custom taxonomies are implemented.

* Artist (Podcast related)
* Fotoalbum (Raketenstaub related)
* Kunsthalle (Pinseldisko related)
* Tagebuch (Zimtwolke related)

## Features

The plugin provides the following additional features.

* Creative Commons Markup
* Maintenance Mode
* Custom WordPress Conditionals
* Custom WordPress Settings
* Custom WordPress Tools
* Operation Options

## Plugin Modifications

Standard features of the following plugins will be manipulated or extended.

* AMP
* Podlove Publisher
* The SEO Framework
* wpRocket

## WordPress Core

Following standard features of the WordPress Core will be manipulated or extended.

* Admin
* Search
* Rewrite Rules
* Feed
* Update

## Related Theme

* huhu

## Languages

The plugin supports German only (hard-coded).

## Installation

Do it the WordPress Way! 

## Branches

This repository follows the git-flow workflow.

* master branch is the latest release
* develop branch is the current state of development
* feature branches contain large features in development
* bugfix branches contain dedicated bugfixes in development
* hotfix branches contain dedicated hotfixes in development
* release branches contain the next release in preparation

Small or minor changes will be commited directly to the development branch.

## Continous Deployment

Branches will be deployed continously onto the environments. The master branch is connected with the productive environment and the develop branch is connected with the test environment. The deployment itself is managed by GitHub Actions.

## Built With

* [Visual Studio Code](https://code.visualstudio.com)

## License

This project is licensed under the GPL3 License.

## Changelog

### 0.6

Release pending

* Added: Disable Auto Update eMail Notifications
* Added: Gutenberg for Custom Post Type Zimtwolke
* Added: Disable AMP Persistent Object Cache Test
* Added: Dequeue Podlove Webplayer 4 JS
* Added: Remove IP from comments author
* Added: Remove User Agent from comments author

### 0.5

Released: 30.12.2019

* Added: Pinseldisko Excerpt
* Added: Zimtwolke Taxonomy
* Added: Pinseldisko Taxonomy
* Added: Raketenstaub Taxonomy
* Added: Workaround Envira Shortcode @ Podlove Feed (and removed again ;-)
* Improved: Auto Updates
* Improved: Remove JS/CSS Resources if not required
* Updated: Compatibility SEO Framework 3.1
* Bugfix: Rocket Cache Handling
* Others: Code Improvements
* Others: Show Standard Custom Fields again (ACF)
* Ghost: Include Custom Fields @ WordPress Search

### 0.4

Released: 25.08.2018

* Changed: Hide Data Privacy Checkbox
* Changed: Set all post to "BlogPosting" (structured data)
* Activated: Auto Updates for Plugins
* CleanUp: Obsolet Code
* Removed: Podlove JS @ Non Podcast Content
* Removed: Schema Modifications
* Removed: Jetpack Modifications
* Removed: Podcast-related Rocket Processes
* Improvement: Better SEO on paged archives

### 0.3

Released: 23.05.2018

* Improvement: Maintenance Mode excluded for active Logins
* Improvement: CSS Minification @ Podlove Archives
* Improvement: JavaScript Minification @ Podlove Archives
* Improvement: Enqueue Podcast CSS only @ Podlove Content
* Bugfix: Cache Handling Error
* Others: Hidden Developer Settings

### 0.2

Released: 24.03.2018

* Feature: Zirkusliebe Artist Custom Taxonomy
* Improvement: Custom WordPress Post Admin Icons
* Improvement: Raketenstaub SEO
* New Setting: Amount of Post @ Podcast Archive
* New Setting: Amount of Post @ Zimtwolke Archive
* New Setting: Force Feedupdate
* Modification: Podlove Publisher Excerpt Length
* Modification: Activate Theme Auto Updates
* Removed: Obsolet Podlove Workarounds
* Bugfix: Do not cache Podlove WebPlayer on paged Archives
* Bugfix: Current Menu Item on paged Zirkusliebe Archives
* Bugfix: Current Menu Item on paged Raketenstaub Archives
* Bugfix: Remove Settings with Plugin Deinstallation
* Others: Deactivate Post Format Filter for Posts
* Others: Internal code improvements

### 0.1

Released: 20.02.2018

* Initial Release