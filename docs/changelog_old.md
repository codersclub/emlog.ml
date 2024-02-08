# &#x1f335; Previous Emlog version Changelog (obsolete)

## 6.0.0

Release date: 2018-10-02

- New background and default templates
- Optimize the index, improve the label storage method, and perform better when the amount of data is large
- Deleted Weiyu\Delete mobile version
- Compatible with php7.2

!> This version is too old and has security risks. Please install the latest pro version. The pro version is an upgrade to 5.3.1 and 6.0.0, involving more than 200 function improvements and optimizations, more functions, faster speed, and more Safety.

Installation package: [emlog_6.0.0.zip](https://oss.emlog.net/download/release/emlog_6.0.0.zip)

## 5.3.1

Release date: 2014-07-21

- Improved installation script to be compatible with certain cloud engines
- The background s and js files increase the version number to prevent the cache from not being updated after the upgrade
- The rss function is turned off by default
- Fixed the problem of extra line breaks when editing articles in the mobile version
- Fixed the problem that the edit page modification template could not be saved
- Fix the problem of missing articles in archive viewing (by: vibbow)
- Fixed the problem that the mobile version sent a message bypassing the review
- Repair possible security risks in database backup
- Fix the problem of line break in editorial comments

!> This version is too old and has security risks. Please install the latest pro version. The pro version is an upgrade to 5.3.1 and 6.0.0, involving more than 200 function improvements and optimizations, more functions, faster speed, and more Safety.

Installation package: [emlog_5.3.1.zip](https://oss.emlog.net/download/release/emlog_5.3.1.zip)


## emlog 5.3.0
Release date: 2014-02-23


## emlog 5.2.1
Release date: 2014-02-13

## emlog 5.2.0
Release date: 2013-11-30


## emlog 5.1.3
Release date: 2013-11-06


## emlog 5.1.2
Release date: 2013-06-14

## emlog 5.1.1
Release date: 2013-05-21

## emlog 5.1.0
Release date: 2013-05-18

## emlog 5.0.1

Release date: 2012/12/16

* Optimize automatic save return data format to improve fault tolerance
* Optimize the data backup function and support exporting and importing zip format backup files
* Optimize tag management and add select all function
* Optimize ip acquisition function
* Optimize the day-of-month acquisition function
* Optimize the file upload function and be compatible with environments where the chmod function is disabled
* Optimize insertion of attachments and add css style id
* Fixed the issue of repeated display of navigation in reply comment page in mobile version
* Fixed the problem that line wrapping does not work when writing articles in the mobile version
* Fix the problem that navigation can be empty
* Fixed the problem of incorrect log archive time
* Fixed the problem that the blog title was too long, causing the background template to deform and the default template title line spacing was too small.
* Added the function of batch deletion of tags and tag deletion confirmation

## emlog 5.0.0

Release date: 2012/10/7

* Fragments support the posting of pictures, and the mobile version can also post pictures and phrases.
* Add navigation management to facilitate users to adjust their own navigation menu
* Add custom 404 page to the template
* Logs can be embedded in zip format attachments
* Add friend link hiding function
* Link pr query mount point
* Add popular articles to the sidebar
* Added full-screen edit button to log editor
* Added official recommendations to the template and plug-in installation pages
* Add browser title and description settings
* Added setting to close site-wide comments
* Added setting to turn off nonsense replies
* Comment content needs to include Chinese settings to prevent spam comments
* Add frequency limit for comments
* Add some plug-in mounting points
* Optimize attachment renaming rules
* Optimize profile page
* Fixed the failure of ajax saving on the background edit log page to allow comments etc.
* Fix debugging statements left over from development: error\_log

## emlog 4.2.1

Release date: 2012/3/11

* Fixed the issue where tags could not be saved and errors were reported when writing logs.
* Fixed the problem that user management cannot modify existing user roles
* Fixed the problem of SQL error being reported due to missing access log ID
* Optimize verification code output and remove misleading special characters

## emlog 4.2.0

Release date: 2012/3/4

* Added the function of batch uploading attachments, supports selecting multiple files at one time, and displays a progress bar for uploading
* Backend user management adds administrator role and supports multiple administrators
* Add jquery loading function: emLoadJQuery, optional loading of jquery in the frontend to prevent the plug-in from loading the jq library multiple times
* Added search log function to the background log management page
* Added whether to enable image thumbnail settings on the settings page
* The background slang page adds the latest slang call of the cloud platform
* The background gossip settings are moved to the site settings page for easy unified modification
* Add mount point to background footer
* Improve label separation method, support space and comma separation
* Improved background management to select all operations, making it more convenient to operate
* Remove the label from the log management page to make the management page cleaner
* Update jquery to the latest version 1.7.1
* Fixed the issue of importing database with dashes
* Fixed the problem of removing the plug-in without stopping the plug-in first
* Fixed the problem of cache files being read directly
* Fixed search and mobile version paging issues
* Fixed the pagination problem of comments with parameters in logs
* Fixed the problem that parameters cannot be accessed under pseudo-static label classification

## emlog 4.1.0

Release date: 2011/9/17

* Added comment paging function, and the background can set whether to paging and the comment sorting method
* Add the function of directly uploading, installing and deleting templates and plug-ins in the background
* Added custom page bottom information function, supports HTML, and can easily add traffic statistics code.
* Optimize link routing, access to non-existent pages returns 404 status and error prompts, and no longer jumps to the homepage
* Optimize the default template homepage log paging method and some details
* Fixed the misalignment problem of the broken language page under IE6
* Read the full text and add css style id to facilitate template control of styles
* Latest comment cache, increase publishing time, and facilitate template calling
* Add plug-in suitable version prompt
* Fixed the issue where the date format was incorrect when modifying the log publishing time, resulting in incorrect time after saving.
* Optimize background details, including layout optimization of the log writing page.
* Fixed the bug that special characters were not filtered in comments and chat replies
* Optimize the link routing table to make log links compatible with more situations

## emlog 4.0.1

Release date: 2011/5/7

* Optimize the latest comment cache and add commenter’s email address
* Fixed routing parsing issues caused by capital letters in the default files of some iis6 servers
* Fixed the issue where the blogger's nickname contained quotation marks, resulting in the inability to reply to comments
* Fix, default link style classification, tag and other paging issues
* Fixed the issue where offline writing failed to publish when the login verification code was turned on
* Fixed the problem that Chinese tags cannot be opened under non-default link style under iis6
* Fix the tab switching problem in the comment box
* Optimize the RSS output summary part
* Fixed an issue where some hosts reported an error when processing index.php in the template directory
* Fixed the problem that the mobile version administrator’s comments need to be reviewed
* Add the comment\_post mount point missing in 4.0, and add the cid parameter to the comment\_saved mount point

## emlog 4.0.0

Release date: 2011/4/26

* New default template with customizable top image
* Support background interface style switching
* Support custom log links
* Comment nesting, commentator avatar
* Change the background log editor to the popular kindeditor editor
* Directly import em backup files in the background
* Optimize article page descriptions and keywords, which is more conducive to SEO.
* The backend can customize the front-end navigation display name.
* Add plug-in activation and disabling callback methods. Convenient plug-in initialization and disassembly
* Add a category name to define a more friendly link address for the category
* Core code optimization, rewriting the front-end code structure. Although it is placed last, this is the biggest improvement of 4.0.

## emlog 3.5.2

Release date: 2010/7/24

* Fixed the issue where the log time is incorrect after modifying the log on the mobile phone
* Added fault tolerance prompt when the template in use is deleted.
* The comment management page adds the function of displaying the full text of comments when hovering the mouse
* Added the function of disabling all plug-ins in the plug-in management page
* The widgets management page adds the function of restoring component settings to the initial installation state. Adjust some connection positions.
* Add Reply and Review button to the reply comment page
* Added Rss full text output global settings item
* Backup file import adds support for files containing BOM
* Fixed the bug of repeated definition of installation files and EMLOG\_ROOT constant
* Fix rss output read full text connection error bug

## emlog 3.5.1

Release date: 2010/6/5

- Fixed a bug where logs occasionally not displayed when using the calendar
- Optimize automatic saving to prevent the problem of repeatedly saving new drafts.
- Added installation that does not support php4 upgrade
- Open the background nonsense page and write the nonsense to gain input focus.
- Adjust the size of the modification time input box on the writing log page
- Adjust several hanging point positions: to ensure that emlog core operations are completed smoothly.
- Modify the fixed connection setting method. When setting, write it to the .htaccess file. .
- Modify the bug that the reply\_twitter mount point fails when auditing is enabled
- Transform the way of obtaining archive logs, abandon using mysql's from\_unixtime to obtain the unix timestamp of the date (it will be affected by the time zone)
- Enhance cache fault tolerance and regenerate the cache when the cache file is empty.
- Enhanced fault tolerance of plug-in loading and management.
- Optimize rss part of the code and add rss output entry configuration
- Fixed the bug that the number of today's visits would be reset to 0 when looking at the calendar.

## emlog 3.5.0

Release date: 2010/5/9

- The redesigned chat function supports replies, recording every bit of life in simple words...
- Time zone setting modification (you only need to set your own time zone).
- Optimize the core code: add the function of automatically detecting/generating cache files, simplify updating the cache code, and optimize the mysql class to single instance mode
- Optimize database structure, add necessary indexes, and improve performance
- Added highlight effect of current page tab of default template
- Add a publish button to the edit draft page
- Added the reality that the plug-in settings page fails to save
- Improved mobile version.
- Fixed the problem of invalid mount point after comment publishing.
- Fixed an error in the mobile version when there is no nonsense.
- Fix installation problems when database name contains -
- Fixed the bug of writing empty tags to the database
- Fixed the blogger description. When there are double quotes, the ie7 6 page is confused.
- Fixed the problem of user avatar disappearing in xmlrpc release log
- Fixed the bug of missing html tag brackets when parsing xml in version 2.7.0-2.7.3 of php libxml module
- Fixed the problem of parameter matching in tag table of url rewriting rules
- Delete several useless files under ckeditor
- Fixed the css uncontrollable bug of paging output content
- Modify the default template encoding to utf8 without BOM
- Modify rss output and change id sorting to time sorting

## emlog 3.4.0

Release date: 2009/12/06

- Newly designed mobile version
- Added support for offline writing software such as Windows Live Writer
- Upgrade the log writing editor to ckeditor3.0.1, and the loading speed is greatly improved.
- Support multiple people to jointly write comments (original twitter)
- Optimize the comment management operation experience
- The insert log separator button on the editor has been removed, but manual input is still valid. Because if this function is used improperly, it will cause page dislocation, so it is recommended that you use it when writing a log.

Advanced options:
* Optimize the original URL into a fixed link and support directory URL format
* Optimize log search and reduce unnecessary word limit
* Remove the invalid operation of deleting session when exiting
* Improve the email address verification function to support email addresses in .name and other domains
* Cancel the front-end display of the commenter's email address, which is only visible to the back-end administrator.
* Remove the function of modifying blogger description at the front desk and simplify the template code
* Fixed the bug of spelling error in plugin\_setting\_view() function
* Fixed the bug where an error occurred when negative numbers were entered when viewing the author, category, and paging.
* Fixed the bug that importing backup files does not detect the database prefix
* Fixed the bug that the attachment upload extension point failed
* Add meta information of blog description

## emlog 3.3.0

Release date: 2009/8/29

- Modify the emlog absolute path definition method to facilitate blog space replacement
- The default template supports the list style of the background editor
- Determine whether there is original data during installation to prevent overwriting by reinstallation
- Backend comment management displays commenter IP, email, and homepage information
- Transform the database backup method and add the function of saving backup files locally
- Modify the plug-in loading method to only support plug-ins in subdirectories.
- Fixed the problem that friendly links and custom pages do not support links starting with https and ftp
- Fixed the bug that the newly created page title cannot be hidden or published when it contains single quotes.
- Fixed adjacent log error BUG
- Fixed the bug of bypassing the image verification code in login verification
- Added check whether the apache server can enable url optimization
- Optimize the background entry list style to make it more beautiful
- Fixed individual security risks and strengthened background parameter filtering
- Added several mount points, please see the plug-in development guide for details

## emlog 3.2.1

Release date: 2009/6/12

- Fixed the problem of incorrect article address in 3.2.0Rss
- Fixed the problem of link error after 3.2.0 URL optimization
- Fixed some errors in which authors could not be added after upgrading from 3.1.0 to 3.2.0
- Fixed the problem of incorrect background comment time in 3.2.0
- Fixed the problem of js error when saving drafts multiple times in the previous version

## emlog 3.2.0

Release date: 2009/6/6

- Add plug-in function.
- Significantly improve the interaction and page design of backend management, giving a better user experience.
- Added self-created page function, allowing you to easily create navigation bars and message boards
- Added multi-person joint writing function
- Change the default template to be more beautiful
- Added Google Picasa album plug-in
- Optimize template structure

## emlog 3.1.0

Release date: 2009/3/7

- Optimize log writing logic and interface, add log summary and log encryption.
- Improved widgets sidebar component management, making the operation more convenient and user-friendly.
- Fixed multiple bugs left over from previous versions, including the classic issue of draft tags being displayed on the homepage
- Improved the installation process and removed permission setting steps that may cause confusion to users
- Backend log management adds retrieval by classification and tags
- Remove the text description in the doc directory and use the more elegant readme.html instead
- Automatically fill in the blog address after installation, no background settings required
- ...    

## emlog 3.0.1

Release date: 2009/1/4

After the release of emlog3.0.0, due to our negligence in testing, the following BUG exists:

1. Log classification entry BUG: Backend operations involving the number of classifications do not update the cache correctly. Manually updating the cache can solve this problem.
2. Comments are not cleared of HTML tags BUG: Except for the default template, other templates have this problem. It is caused by a vulnerability in the comment model. Please use the default template for the time being to avoid being harmed.
3. When publishing a new log, if the time is changed, the publishing time display will be abnormal.

...

## emlog 3.0.0

Release date: 2008/12/29

Important new features and optimizations:
1. Added sidebar component (widget) management to achieve high customizability of the sidebar
2. Improve the login verification part to achieve long-term storage of user status without frequent login.
3. Significantly optimize the code structure, make subsequent development and maintenance more convenient and faster, and make the code more readable
4. Optimize the backend interface and improve the backend user experience
5. Added log classification function
6. Improve log management and search by tags and categories
7. Added new sidebar items: random log, latest log
8. Improve the order of comment display

BUG fix

1. The calendar turns from September to October to January.
2. IE6 does not support Chinese label hyperlinks

## emlog 2.7.0

Release date: 2008/8/3

change log:

- Improved attachment uploading and management. Attachment management is more intuitive and convenient.
- Updated FCK editor to 2.6, fully compatible with ie6+ ff2+ safari opera
- Optimize the cache module to make it faster and the code more elegant
- Reconstructed the template logos in the front and backend to make template creation more convenient and clear.
- Reconstructed the logic of URL rewriting to improve maintainability and scalability
- Optimize the presentation of front-end label corresponding logs and search log lists
- Added the function of restoring comments and modifying personal status at the front desk
- Added blog Gzip compression function to make blog opening faster and with smaller traffic
- Optimize the algorithm for label font size and remove pages with more labels.

BUG fix

- Fixed the twitter publishing date error caused by time difference
- Fixed wap related deficiencies
- Fixed the bug when the background draft management exceeds 1 page

## emlog2.6.5

Release date: 2008/5/3

New features:

- WAP function emlog on your mobile phone allows you to browse blogs and write your mood anywhere (the first version of wap does not support writing logs, but you can write twitter)
- twitter function one sentence blog
- Logs are automatically saved, so you just write the logs seriously and leave the rest to emlog.

Function optimization:

- Optimize the database backup function and improve compatibility. Make backup experience and success rate higher
- Optimize the thumbnail generation part of pictures to improve compatibility and reliability
- Improvements to the login method, simple management operations can also be performed at the front desk
- The verification code looks better, with mixed letters and numbers.
- Attachment uploading, user experience has been improved

## emlog2.6.0

Release date: 2008/3/8

New features:
* Blogger replies to comments
* Display of adjacent log titles above and below the log
* URL REWRITE blog pseudo-static
* Add reviewer personal homepage items
* When log comment review is turned on, the backend home page will prompt the number of unreviewed comments.
* Added a citation notification switch, which can turn off and on the trackback function of all blogs
* Anti-spam quotes
* emlog begins to use GPLv2 to release source code, marking emlog's official open source function optimization:
* When comments are disabled on the blog, the comment form will not be displayed.
* When quotation is prohibited in the log, the quotation address will not be displayed.
* Optimize the backend friend site management, and the friend site list displays "Friend Site Description"
* Optimize the log management page, you can directly find the comments corresponding to the log for management BUG repair
* When the image attachment is added to the editor, it has a blue border

## emlog2.5.0

Release date: 2007/11/24

Update log:
* Optimized the management of log attachments.
* Picture attachments can be intuitively embedded into the log content. Now you can start writing a log with pictures and texts.
* Add user-defined html function, add some APIs from other sites or other content, so you don’t have to modify the template all the time
* The log archive also displays the number of logs in the current month
* Optimize some details (this time there are more minor modifications and optimizations in the program and interface)

## emlog2.4.0

Release date: 2007/9/15

## emlog2.3.0

Release date: 2007/7/29

## emlog2.2.0

Release date: 2006/10/13

## emlog2.1.6 sp1

Release date: 2006/9/3

## emlog2.1.6

Release date: 2006/8/5

## emlog2.0.0

Release date: 2006/5/14

## emlog1.0.3

Release date: 2006/3/16

## emlog1.0.0 official version

Release date: 2005/12/29

## emlog1.0.0 preview version

Release date: 2005/10/27


---

--end--