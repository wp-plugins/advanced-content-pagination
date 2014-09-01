=== Advanced Post Pagination ===
Contributors: gVectors Team
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=UAM3E699GTZ64
Tags: pagination, post pagination, content pagination, multiple pages, nextpage, pagination buttons, pagination buttons with text, tabbed content, ajax load content, post slider
Requires at least: 2.7.0
Tested up to: 3.9.2
Stable tag: 1.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Perfect solution to split a long post content to multiple pages. Allows you to put text and image in pagination buttons. 5 awesome button layouts.

== Description ==

Perfect solution to paginate posts and split a long post to multiple pages. Allows you to put text (title, description) and image in pagination buttons. Fully customizable pagination button layouts.

* Pagination buttons with Title text
* Pagination buttons with Title text and Number
* Shortcode `[nextpage title="..."]..content..[/nextpage]`
* Ajax and simple (refresh) types of content loading on pagination
* Adds pagination buttons carousel slider if those takes more width
* Special button icon on post TinyMCE editior to split content to many pages
* Ability to set pagination button locations on the post content top/bottom/both
* Automaticaly turns default `<--nextpage-->` pagination to Advanced Buttons
* Fully **customizable** trough Wordpress Dashboard -> AP Pagination
* | [Pro](http://www.gvectors.com/advanced-content-pagination/#tab1) | Pagination buttons with subPage Title and Short Description
* | [Pro](http://www.gvectors.com/advanced-content-pagination/#tab2) | Pagination buttons with subPage Title and Thambnail
* | [Pro](http://www.gvectors.com/advanced-content-pagination/#tab3) | Pagination buttons with subPage Title, Description and Thambnail - [DEMO](http://www.gvectors.net/acp/advanced-content-pagination/)

**Usage:**

* After activation just go to Edit/Add Post page.
* Then select a part of content/text you'd like to split as a new subPage and click on ACP button icon ( black "[>]" icon is located next to other TinyMCE button icons.)
* On the popup window you'll see a field for pagination button title, just insert a text and click on [insert] button. This wraps your selected content in ACP shortcode like this:
`[nextpage title="pagination button title here"]
subPage content here...
[/nextpage]`
* You can also add this shortcode manually without using ACP button icon and popup window.


**In Dashboard**

Click on the "AP Pagination" menu and manage pagination settings. Here you can manage: 

* Turn on/of ACP pagination buttons
* Change pagination buttons layout and style 
* Change pagination buttons location (top/bottom/both)
* Change content loading type (ajax, refresh)
* Other settings...


**Splitting a long post content to subPages**

[youtube https://www.youtube.com/watch?v=Vv8qOtRkWSo /]

**Managing pagination button layouts**

[youtube https://www.youtube.com/watch?v=59UE-IyNnb0 /]


== Installation ==

1. Upload 'advanced-content-pagination' folder to the '/wp-content/plugins/' directory,
2. Activate the plugin through the 'Plugins' menu in WordPress.

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