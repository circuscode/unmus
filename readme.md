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

* Custom WordPress Conditionals
* Custom WordPress Settings
* Custom WordPress Tools
* Maintenance Mode
* Scripting

## WordPress Core

Following standard features of the WordPress Core will be manipulated or extended.

* Feed
* Editor
* Comment Form
* Site Health
* Update
* Dashboard
* Loop
* Search
* Rewrite Rules

### Feed

* Add unmus-related Post Types to Feed
* Remove Post Formats Quote & Image from Feed

### Editor

* Add Post Format Filter in Ello Table View
* Deactivate Post Format Option for Standard Posts

### Comment Form

* Remove Comment Author's IP address
* Remove Comment Author's User Agent
* Remove Cookie Option in Comment Field

### Site Health

* Disable Persistent Object Cache Test

### Update

* Run WordPress Updates automaticly
* Run Plugin Updates automaticly 
* Run Theme Updates automaticly

### Dashboard

* Add Custom Post Types to At a Glance Widget

### Loop

* Option to Change Amount of Post per Page for CPT Raketenstaub

## Plugin Modifications

Standard features of the following plugins will be manipulated or extended.

* Advanced Custom Fields
* Podlove Publisher
* The SEO Framework
* wpRocket
* Embed Privacy

### Advanced Custom Fields

* Show Custom Field Meta Box in Editor again

### Embed Privacy 

* Adjust Embed Overlay Text

## Related Theme

* huhu

## Related Plugins

* Mathilda
* TootPress

## Languages

The plugin supports German only (hard-coded).

## Installation

Do it the WordPress Way! 

## Branches

This repository follows the git-flow workflow to a large extent.

* master branch is the latest release
* develop branch is the current state of development
* feature branches contain dedicated features in development
* bugfix branches contain dedicated bugfixes in development

Hotfix and release branches will not be applied.

## Continous Deployment

Branches will be deployed continously onto the environments. The master branch is connected with the productive environment and the develop branch is connected with the test environment. The deployment itself is managed by GitHub Actions. Releases are not used in the regular way. Releases can be understood as freeze or state of functional bundels.

## Built With

* [Visual Studio Code](https://code.visualstudio.com)

## License

This project is licensed under the GPL3 License.

## Changelog

### 0.7

in progress

* Added: Adjustment Embed Overlay Text (Embed Privacy)
* Removed: AMP Extensions
* Removed: Creative Commons (integrated to huhu)
* Removed: Force Feed Update (this can better be done by deleting transients)
* Improved: Documentation
* Improved: Code Refactoring

### 0.6

Released: 22.03.2023

* Added: Cache Handling for TootPress
* Added: SEO Extensions for TootPress
* Added: Disable Auto Update eMail Notifications
* Added: Gutenberg for Custom Post Type Zimtwolke
* Added: Disable AMP Persistent Object Cache Test
* Added: Dequeue Podlove Webplayer 4 JS
* Added: Remove IP from comments author
* Added: Remove User Agent from comments author
* Bugfix: Exclude the page "WordPress" from search

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