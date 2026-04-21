=== Sticky Menu & Sticky Header ===
Contributors: WebFactory
Tags: sticky header, sticky menu, sticky, sticky widget, floating menu
Plugin URI: https://wpsticky.com/
Requires at least: 3.6
Tested up to: 7.0
Stable tag: 2.35
Requires PHP: 5.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Sticky Menu or Sticky Header sticks elements at the top of the screen when you scroll, or create a floating sticky menu or fixed widget.

== Description ==

The <a href="https://wpsticky.com/">WP Sticky</a> Menu (or Sticky Header) On Scroll plugin allows you to **make any element on your pages "sticky"** as soon as it hits the top of the page when you scroll down. Although this is commonly used to keep menus at the top of your page to create floating menus, the plugin allows you to make any element sticky. Make a sticky header, stick menu, sticky widget (fixed widget), sticky logo, sticky call to action or a floating menu.

You just need to know how to pick the right selector for the element you want to make sticky, and you need to be sure it's a unique selector. Sometimes a simple selector like "nav", "#main-menu", ".menu-main-menu-1" is enough. Other times you will have to be more detailed and use a more specific selector such as "header > ul:first-child" or "nav.top .menu-header ul.main". If you don't like messing with any code check out out the visual element picker in <a href="https://wpsticky.com/">WP Sticky PRO</a>.

= Features =

* **Any element can stick**: although common use is for navigation menus, or header the plugin will let you pick any unique element with a name, class or ID to stick at the top of the page once you scroll past it. Use it for sticky widget, sticky sidebar, sticky header, sticky menu, sticky header, sticky call-to-action box, sticky banner ad, etc. Need to make <a href="https://wpsticky.com/">multiple elements sticky</a>? Check out WP Sticky PRO.
* **Positioning from top**: optionally, you can add any amount of space between the sticky element and the top of the page, so that the element is not always stuck at the "ceiling" of the page.
* **Enable for certain screen sizes only**: optionally, you can set a minimum and/or maximum screen size where the stickiness should work. This can be handy if you have a responsive site and you don't want your element to be sticky on smaller screens, for example.
* **Enable only on some pages**: sometimes you don't want the element to be sticky on the entire site. <a href="https://wpsticky.com/">WP Sticky PRO</a> gives you the option to pick posts, pages, categories, tags and CPTs where you don't want the element to be sticky.
* **Push-up element**: optionally, you can pick any other element lower on the page that will push the sticky element up again (for example a sidebar widget).
* **Admin Bar aware**: checks if the current user has an Admin Toolbar at the top of the page. If it has, the sticky element will not obscure it (or be obscured by it).
* **Z-index**: in case there are other elements on the page that obscure or peek through your sticky element, you can add a Z-index easily.
* **Legacy Mode**: in 2.0, a new method of making things sticky was introduced. In Legacy Mode, the old method will be used. See FAQ for details.
* **Dynamic Mode**: some issues that frequently appear in responsive themes have been address by adding a Dynamic Mode (Legacy Mode only). See FAQ for details.
* **Debug Mode:** find out possible reasons why your element doesn't stick by switching on Debug Mode, and error messages will appear in your browser's console.

Having **problems with SSL**? Moving a site from HTTP to HTTPS? Install our free <a href="https://wordpress.org/plugins/wp-force-ssl/">WP Force SSL</a> plugin. It’s a great way to fix all SSL problems.

#### GDPR compatibility
We are not lawyers. Please do not take any of the following as legal advice.
Sticky does not track, collect or process any user data on the front end or in the admin. Nothing is logged or pushed to any 3rd parties. We also don't use any 3rd party services or CDNs. Based on that, we feel it's GDPR compatible, but again, please, don't take this as legal advice.

== Installation ==

1. Upload the "sticky-menu-or-anything" directory to your "wp-content/plugins" directory.
2. In your WordPress admin, go to PLUGINS and activate "Sticky Menu (or Anything!)"
3. Go to SETTINGS - STICKY MENU (OR ANYTHING!)
4. Pick the element you want to make sticky
5. Party!


== Frequently Asked Questions ==

= Can I make multiple elements sticky?
Sure, <a href="https://wpsticky.com/">WP Sticky PRO</a> has that option. You can make as many elements sticky as you like and configure settings individually for each element.

= I selected a class/ID in the settings screen, but the element doesn't stick when I scroll down. Why not? =
First, make sure that if you select the element by its class name, it is preceded by a dot (e.g. ".main-menu"), and if you select it by its ID, that it's preceded by a pound/hash/number sign (e.g. "#main-menu"). Also, make sure there is only ONE element on the page with the selector you're using. If there is none, or more than one element that matches your selector, nothing will happen.

= Once the element becomes sticky, it's not positioned/sized properly at all. =
Due to the nature of CSS, there are situations where an element will not stick properly, usually if it has specific properties that are used to manipulate its location and/or dimensions. If your sticky element has any of the following properties, this could cause conflicts:

- negative margins
- absolute positioning
- top/left/bottom/right properties
- "display: inline"
- "!important" applied to any of its properties

Try to avoid all this where possible, but if you can't, using the plugin in Legacy Mode (see below) helps sometimes.
Another situation that can cause trouble, is when any parent of your sticky element has the "transform" CSS property applied to it.

= Once the element becomes sticky, it's not responsive and doesn't resize when I change the browser size.
This is a known (and annoying) bug in the plugin that I haven't been able to solve properly yet. For some sites (when the element does not contain any JavaScript interactivity, usually), it sometimes helps to use the plugin in Legacy Mode (see below).

= Is it possible to add some styles to the element but only when it's sticky?
To add styles to your sticky element when it's not sticky, use class name ".element-is-not-sticky".
To add styles to your sticky element only when it's sticky, use class name ".element-is-sticky"

The following code would give your element a red background only when it's not sticky, and blue only when it is:

.element-is-not-sticky {
   background: red;
   }

.element-is-sticky {
   background: blue;
   }

= Once the element becomes sticky, there's a brief moment where you see it twice. =
If you're using the plugin in Legacy Mode (see below), this happens when the sticky element (or any of its contents) has a CSS transition applied to it. Because the original element becomes invisible (and a cloned copy of it becomes visible), the visible-to-invisible status change will take place with a transition (ie. not instantly). Either remove any of the transitions the element has, or try disabling the Legacy Mode.

= Still doesn't work. What could be wrong? =
Check the "Debug Mode" checkbox in the plugin's settings. Reload the page and you may see errors in your browser's console window. If you've used a selector that doesn't exist, OR there are more of them on the page, you will be notified of that in the console.

= Is it possible to have multiple sticky elements? =
The current version only allows one sticky element, but this functionality will be implemented in the next major version. No expected release date, though.

= How can I report security bugs? =
You can report security bugs through the Patchstack Vulnerability Disclosure Program. The Patchstack team help validate, triage and handle any security vulnerabilities. [Report a security vulnerability.](https://patchstack.com/database/vdp/sticky-menu-or-anything-on-scroll)


== Screenshots ==

1. Basic Sticky Menu Settings screen
2. Advanced Sticky Menu Settings screen


== Changelog ==
= 2.35 =
* 2026-04-15
* minor code fixes

= 2.34 =
* 2025-08-10
* minor code fixes

= 2.33 =
* 2024-07-08
* minor security fixes

= 2.32 =
* 2022-11-20
* minor security fixes

= 2.31 =
* 2021-02-19
* fixed one really really visible typo
* added custom footer text on plugin's admin page
* lowered the price for the team package

= 2.30 =
* 2021-02-13
* better clean-up on delete and deactivate

= 2.29 =
* 2021-01-30
* added flyout menu
* added monthly price

= 2.28 =
* 2021-01-05
* minor bug fixes and improvements
* removed promo campaign for WP 301 Redirects

= 2.25 =
* 2020-10-16
* PRO version is here
* bug fixes and improvements

= 2.23 =
* 2020-10-01
* more CSS fixes
* added promo campaign for WP 301 Redirects

= 2.22 =
* 2020-09-08
* improvement for themes with !important rule at margin top and left within sticky element

= 2.21 =
* 2020-06-19
* security fix - thanks to Antony from Sucuri

= 2.2 =
* 2020-02-01
* bug fixes
* minor GUI improvements
* 100,000 users hit on 2020-01-31

= 2.1.1 =
* Fixed minification bug

= 2.1 =
* Sticky element has specific classes to target sticky/non-sticky state: ".element-is-sticky" and ".element-is-not-sticky"

= 2.0.1 =
* fixed padding calculation bug (percentages are off when sticky)
* fixed bug where assigned styles loop caused JS error

= 2.0 =
* Introduced a new/better method for making elements sticky
* Added Legacy Mode (for those who want to continue the old method)
* Split up settings screen in Basic and Advanced
* Debug mode uses uncompressed JS file for easier remote debugging

= 1.4 =
* Removed error notification if no pushup-element is selected
* Renaming class "cloned" to "sticky-element-cloned" and "original" to "sticky-element-original" to avoid conflicts with Owl Carousel
* Fixed bug where cloned element width would be rounded down if it contained sub-pixels

= 1.3.1 =
* Minor bug fix for push-up element

= 1.3 =
* Added functionality to move sticky element down in case there is an Administrator Toolbar at the top of the page
* Added functionality to push sticky element up by another element lower down the page

= 1.2.4 =
* Fixed small bug related to version number

= 1.2.3 =
* Bug with Dynamic Mode select box/label fixed
* Bug with Z-index fixed (thanks @aguseo for reporting)
* All text in plugin fully translatable
* Added FAQ tab to settings screen
* Added infobox to settings screen
* Added a few comments to source code

= 1.2 =
* Dynamic Mode added (addressing problems with dynamically created menus -- see Frequently Asked Questions above for details)

= 1.1.4 =
* Ready for WordPress 4.1 (and TwentyFifteen)
* Fixes issue when element has padding in percentages

= 1.1.3 =
* Fixes width calculation bug introduced in previous version (sorry about that), box sizing now supported

= 1.1.2 =
* Fixes element width calculation bug

= 1.1.1 =
* Fixes viewport calculation bug

= 1.1 =
* Added functionality for optional minimum/maximum screen size

= 1.0 =
* Initial release (using v1.1 of the standalone jQuery plugin)


== Upgrade Notice ==

= 2.1.1 =
* Bug fixes

= 2.1 =
* Functionality for targeting sticky/non-sticky class names added

= 2.0.1 =
* A few small bug fixes

= 2.0 =
* Bug fixes and new/better method of making elements sticky

= 1.4 =
* Couple of bug fixes

= 1.3.1 =
* Minor bug fix for push-up element

= 1.3 =
* BY POPULAR DEMAND: functionalities added related to Administrator Toolbar and element that can push sticky element up

= 1.2.4 =
* Minor bugfix

= 1.2.3 =
* Bugfixes, improvements and translation-ready

= 1.2 =
* Dynamic Mode added

= 1.1.4 =
* Bugfixes, ready for WordPress 4.1 (and TwentyFifteen)

= 1.1.3 =
* Bugfix for new bug introduced in 1.1.2

= 1.1.2 =
* Bugfixes

= 1.1.1 =
* Bugfixes

= 1.1 =
* Added functionality (minimum and/or maximum screen size)

= 1.0 =
* Initial release of the plugin
