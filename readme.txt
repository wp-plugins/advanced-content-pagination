=== Advanced Post Pagination ===
Contributors: gVectors Team
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=UAM3E699GTZ64
Tags: pagination, post pagination, content pagination, multiple pages, nextpage, pagination buttons, pagination buttons with text, tabbed content, ajax load content, post slider
Requires at least: 2.7.0
Tested up to: 3.9.2
Stable tag: 1.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Perfect solution for long post pagination. This plugin creates fully customizable pagination buttons for posts with multiple pages.

== Description ==
Perfect solution for long post pagination. This plugin creates fully customizable pagination buttons for posts with multiple pages.

**Features:**

* Two button layouts with subPage number and title.

* Special icon on post/page **WYSIWYG** editior to insert manage subPages

* Automaticaly turns default Wordpress <!--nextpage--> buttons to Advanced Pagination Buttons

* Two types of subPage content loading: Ajax and Refresh

* Fully **customizable** trough Wordpress Dashboard -> AP Pagination


**Usage:**
This plugin is very easy to use. 

* After activation just go to Edit/Add Post page.

* Then select a part of content/text you'd like to split as a new subPage and click on ACP button icon (the ACP icon "black [>]" is located next to other TinyMCE editor button icons.)

* On the popup widow you'll see a field for pagination button title, just insert a text and click on [insert] button. This wraps your selected content in ACP shortcode like this:

`[nextpage title="pagination button title here"]
subPage content here...
[/nextpage]`
You also can add this shortcode manually without using ACP button icon and popup widow.

Also you can manage button layouts and style, content loading type (ajax, refresh) and other settings in Dashboard > AP Pagination page

[youtube https://www.youtube.com/watch?v=Vv8qOtRkWSo /]
This video shows how to use this plugin to add a new subPage.

[youtube https://www.youtube.com/watch?v=59UE-IyNnb0 /]
This video shows how to manage pagination button layouts.

Demo URL: <http://www.gvectors.net/acp/advanced-content-pagination/>

== Installation ==

How to install the plugin and get it working.

1. Activate plugin.
2. Go to Dashboard -> AP Pagination to manage pagination buttons.

== Frequently Asked Questions ==

= Please Check the Following Advanced Post Pagination Resources =

* Plugin Page: <http://gvectors.com/advanced-content-pagination/>
* Support Forum: <http://gvectors.com/questions/>


== Screenshots ==

1. APP on Front-End Screenshot #1
2. APP Buttons Screenshot #2
3. APP on Front-End Screenshot #3
4. APP Ajax Loading #4
5. APP on Back-end Screenshot #5
6. APP New page creator pop-up #6

== Changelog ==

= 1.0.3 =
* Fixed Bug : Pagination buttons were disappearing when another plugin shordcode is added before ACP shordcodes.
* Fixed Bug : Whole content was disappearing when another plugin shordcode is added after ACP shordcodes.

= 1.0.2 =
* Fixed Bug : Empty content on post list.
* Fixed Bug : Missed line-breaks and paragraphs in subPages.

= 1.0.1 =
* Fixed Bug : Unprocessed shortcode issue.

= 1.0.0 =
Initial version
