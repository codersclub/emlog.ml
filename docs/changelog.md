# &#x1f335; Emlog version update records

## Pro 2.0.3

Release time: 2023-3-19

- [feature] Optimize app store display and purchase logic
- [feature] API: Add password retrieval related interface, see interface documentation for details
- [feature] API: add avatar URL to user information interface
- [feature] Keyword display tab on article page. .
- [feature] Add information module mount point on the background homepage of registered users.

Installation package: [emlog_pro_2.0.3.zip](https://oss.emlog.net/download/emlog_pro_2.0.3.zip)

## Pro 2.0.2

Release time: 2023-3-8

- [feature] API adds cookie verification mode
- [feature] The API adds an interface for obtaining current user information, and the document adds an interface for user login and registration
- [feature] Add mount points visible only to administrators in the background sidebar: admin_menu, mount points visible only to registered users: user_menu
- [fix] Fix the problem that the rss output article is wrong.
- [fix] Fix the problem that the default template shows incomplete long images.
- [fix] The app store plugin page is missing.

Installation package: [emlog_pro_2.0.2.zip](https://oss.emlog.net/download/emlog_pro_2.0.2.zip)

## Pro 2.0.1

Release time: 2023-3-1

- [feature] Optimize the experience of the mobile version of the login and registration page
- [feature] Optimize the background tag management page, increase the tag search function, and display the number of tag articles
- [feature] Optimize the home page display of the user center, and the experience of ordinary registered users after logging in has been improved.
- [feature] The default template adds the pw.php file for entering the password page, which is convenient for developers to refer to and customize.
- [fix] Fix the problem of editing label error.
- [fix] Fix the situation where the button on the login page of the secondary directory installation has 404.

Installation package: [emlog_pro_2.0.1.zip](https://oss.emlog.net/download/emlog_pro_2.0.1.zip)

## Pro 2.0.0

Release time: 2023-2-19

- [feature] Add email verification code function for user registration.
- [feature] Comments, user registration, and login support return json data, which is convenient for theme development, pop-up login and other effects. Refer to the template development document.
- [feature] The app store adds a hardcore svip exclusive app, including a new official statistics plug-in.
- [feature] API: add plugin mount points to the article publishing update interface.
- [feature] Default built-in template settings plugin.
- [fix] Solve the problem that the article adjustment link does not record the number of views.
- [fix] Solve some 8.1 compatibility issues.

Installation package: [emlog_pro_2.0.0.zip](https://oss.emlog.net/download/emlog_pro_2.0.0.zip)

## Pro 1.9.3

Release time: 2023-2-6

- [feature] The article receives a comment email to notify the author
- [feature] Optimize the app store - the experience of installing template plugins is better
- [feature] API: The article publishing interface supports publishing as a draft
- [feature] The background setting increases the setting of the number of entries per page of the list, which is convenient for managing articles, comments, and users

Installation package: [emlog_pro_1.9.3.zip](https://oss.emlog.net/download/emlog_pro_1.9.3.zip)

## Pro 1.9.2

Release time: 2023-1-20

- [feature] User management supports searching by user nickname
- [feature] Publishing articles supports filling in the jump link, and the content is not displayed after filling in the jump link directly
- [feature] Batch delete label function
- [feature] Registered users can limit the number of posts per day
- [feature] Optimize app store display
- [feature] Optimize paging display logic
- [feature] Add full screen mode to default editor
- [fix] Optimize the experience of some mobile phones at the front and back ends

Installation package: [emlog_pro_1.9.2.zip](https://oss.emlog.net/download/emlog_pro_1.9.2.zip)

## Pro 1.9.1

Release time: 2022-12-29

- [feature] Optimize the function of obtaining the real IP of commenters, and support CDN scenarios
- [feature] Optimize the background operation pop-up prompt style
- [feature] Mail notification setting supports custom mail sender
- [fix] Solve the problem that the sidebar label font is too large
- [fix] After clicking on the number of articles to be reviewed on the background homepage, only the articles to be reviewed will be displayed
- [fix] All notes can be displayed after clicking on the number of notes on the homepage of the background
- [fix] Adjust auto save time interval to 1 minute

Installation package: [emlog_pro_1.9.1.zip](https://oss.emlog.net/download/archived/emlog_pro_1.9.1.zip)

## Pro 1.9.0

Release time: 2022-12-5

- [feature] API: add edit article API
- [feature] API: Article-related api adds display and query of tags
- [feature] Backing up the database can now back up all tables, so as not to miss the self-built tables of the plug-in
- [feature] Added a one-time takeover mount point for the Gravatar avatar, which is convenient for plug-in developers to control the output avatar
- [feature] Background articles and page editing interface can use the shortcut key Ctrl (Cmd) + S to save content globally
- [feature] Cancel the fixed CSS positioning method in the top menu bar of the background, increase the footer background, and have a better experience
- [feature] Simple visual optimization of the default template (add "Edit" button to the homepage article, change "Archive" to drop-down, white footer background)
- [fix] Fixed the failure of some links in the top menu bar of the default template, and the failure of links such as "Latest Comments" in the sidebar component
- [fix] Delete the redundant code of the default template, and adjust the indentation of the code to Tab tabs with a size of 4

Installation package: [emlog_pro_1.9.0.zip](https://oss.emlog.net/download/archived/emlog_pro_1.9.0.zip)

## Pro 1.8.0

Release time: 2022-11-2

- [feature] Editor supports inserting video (MP4 video URL)
- [feature] Email notification: receive email notification of new comments
- [feature] Email notification: receive email notifications for new pending article submissions
- [feature] Optimize the background home page information prompt interface, increase the number of articles to be reviewed
- [fix] The comment avatar cannot be loaded
- [fix] Fix the problem of inserting thumbnails and high-definition pictures of pictures
- [fix] Remove the redundant a tag at the foot of the default template without setting up ICP record
- [fix] Fix the problem that the toc directory is wrongly located in articles with many pictures

Installation package: [emlog_pro_1.8.0.zip](https://oss.emlog.net/download/archived/emlog_pro_1.8.0.zip)

## Pro 1.7.1

Release time: 2022-10-7

- [feature] The default template mobile terminal supports article directory viewing
- [fix] Solve the problem of pagination errors under resource classification
- [fix] Solve the problem of default template js error reporting
- [fix] Solve the problem of missing data tables in background backup
- [fix] Replace commenter avatar cdn

Installation package: [emlog_pro_1.7.1.zip](https://oss.emlog.net/download/archived/emlog_pro_1.7.1.zip)

## Pro 1.7.0

Release time: 2022-10-3

- [feature] Resource management page adds resource classification function
- [feature] Articles support timed release, just set a future release time point when writing an article
- [feature] Support mariadb database installation
- [fix] Solve the problem of multiple clicks on the editor table
- [fix] Solve the problem that the default template image cannot jump to the external link

Installation package: [emlog_pro_1.7.0.zip](https://oss.emlog.net/download/archived/emlog_pro_1.7.0.zip)

## Pro 1.6.0

Release time: 2022-8-14

- [feature] Support php5.6, better compatibility with old templates and plugins.
- [feature] Add note publishing API, which can be used for chrome browser plug-in development.
- [feature] Tweaked store display to differentiate between free and paywall.

Installation package: [emlog_pro_1.6.0.zip](https://oss.emlog.net/download/archived/emlog_pro_1.6.0.zip)

## Pro 1.5.1

Release time: 2022-7-11

- [feature] Improve the one-click deployment process of the pagoda panel, making deployment more convenient.

Installation package: [emlog_pro_1.5.1.zip](https://oss.emlog.net/download/archived/emlog_pro_1.5.1.zip)

## Pro 1.5.0

Release time: 2022-7-3

- [feature] API adds an interface for obtaining categories
- [feature] Add the role of content editor, responsible for the review and management of articles and comments
- [feature] add useragent for comments, which is convenient for developers to obtain the operating system and browser information of commenters
- [feature] Email notification supports STARTTLS protocol (outlook mailbox, etc.)
- [feature] The markdown editor adds a help button, which is convenient for viewing related syntax
- [fix] Fixed the W3C validation issue of the foreground template
- [fix] Compatible with the old template, the split function cannot be found under php7, so that most 5.3.1 templates can be used in the pro version

Installation package: [emlog_pro_1.5.0.zip](https://oss.emlog.net/download/archived/emlog_pro_1.5.0.zip)

## Pro 1.4.0

Release time: 2022-6-12

- [feature] API article publishing interface supports tags
- [feature] API adds article list and article details interface
- [feature] Store supports search and look-only free features
- [feature] Writing articles supports inserting recently used tags
- [feature] Background tab management supports pagination and beautifies the interface
- [feature] The draft box supports batch operation of articles, adjustment of category authors, etc.
- [feature] The source code supports docker rapid deployment
- [fix] Fix the 404 problem of background page management pagination
- [fix] Fix the problem that the category page in the background is displayed incorrectly

Installation package: [emlog_pro_1.4.0.zip](https://oss.emlog.net/download/archived/emlog_pro_1.4.0.zip)

## Pro 1.3.1

Release time: 2022-5-22

- [feature] Optimize the cache update efficiency when there are a large number of articles, and improve the response time of publishing articles.
- [fix] Fix the problem that the site reports 404 when there are no articles
- [fix] Fix the problem that extensions cannot be downloaded in some server environments

Installation package: [emlog_pro_1.3.1.zip](https://oss.emlog.net/download/archived/emlog_pro_1.3.1.zip)

## Pro 1.3.0

Release time: 2022-5-4

- [feature] The cover image of the article supports entering the URL of the network image
- [feature] Added user ban function, unable to log in after ban
- [feature] Add API functions, support article publishing, and facilitate docking with article publishing software
- [fix] Fix the problem that the non-existing article page does not display 404
- [fix] Fix the problem of rss output unreviewed articles

Installation package: [emlog_pro_1.3.0.zip](https://oss.emlog.net/download/archived/emlog_pro_1.3.0.zip)

## Pro 1.2.2

Release time: 2022-3-20

- [feature] Added user management to search users by registered email address
- [feature] Input article password page supports adding custom template (pw.php)
- [feature] Optimize the article_content_echo mount point to support importing and modifying more article information.
- [fix] Fix the problem of timeout reminder when uploading large files
- [fix] Optimize the account logic, the mailbox must be filled when the user information is updated
- [fix] Fix the problem that RSS does not parse Markdown syntax
- [fix] Fix the security issue of resource deletion

Installation package: [emlog_pro_1.2.2.zip](https://oss.emlog.net/download/archived/emlog_pro_1.2.2.zip)

## Pro 1.2.1

Release time: 2022-2-19

- [fix] Fix the problem that the icon of the sidebar management button is missing
- [fix] Fix the problem that the security entrance configuration is invalid
- [fix] Fix the problem that the function field of obtaining user information is incomplete
- [fix] Fix the problem that the background button fails under the safari browser kernel
- [fix] Added a switch for whether the registered user's article needs to be reviewed, and solved the problem that the registered user's post must be reviewed.

Installation package: [emlog_pro_1.2.1.zip](https://oss.emlog.net/download/archived/emlog_pro_1.2.1.zip)

## Pro 1.2.0

Release time: 2022-2-12

- [feature] Support user registration function, you can post after registration, but it needs to be reviewed by the administrator
- [feature] Support email notification configuration, and support password retrieval through registered email
- [feature] Add a new plug-in mount method, which is used for plug-in to take over and replace core variables, and add article content replacement mount points, such as for content keyword highlighting, etc.
- [feature] Re-supported the function of uploading pictures in the editor
- [feature] templates enable short tag format, thanks to codersclub's feedback (issues#137)
- [feature] The administrator can manage the resources uploaded by all users, and the resource page has added the display of the uploading user and the original image address
- [feature] The background editor supports pasting and uploading pictures (currently supports screenshot tool pasting, localization of other web page pictures, Mac finder picture copy and upload)
- [feature] Optimized the experience of editing the page, added a prompt for manual saving in the title bar of the web page, a prompt for exiting the page without saving the content, etc.
- [fix] Fixed the problem that uid is not recorded when posting comments after login
- [fix] Optimized the performance issues of sidebar labels and counting errors, thanks to 52linglong's feedback (issues#154)
- [fix] Optimized many details of the front-end template, solved the time display problem, added classification display, beautified the top label, etc.
- [fix] Optimized the display of the background table on the mobile terminal
- [fix] The menu bar on the left side of the background supports the up and down scroll wheel, which solves the problem that the lower part of the menu bar is hidden when the screen resolution is low
- [fix] Solved the problem that the background editor dialog box was blocked by other elements on the page

Installation package: [emlog_pro_1.2.0.zip](https://oss.emlog.net/download/archived/emlog_pro_1.2.0.zip)

## Pro 1.1.1

Release time: 2021-12-25

- [feature] The default editor adds a button to insert a code block, and cooperates with the plug-in to achieve code highlighting
- [feature] resource management to add image pop-up preview
- [feature] The uid field is added to the comment table, which is convenient for the plug-in to realize the user comment function
- [fix] Solved the problem that the plug-in submenu left before did not disappear on the mobile phone
- [fix] Solved the abnormal problem of clipping when uploading the cover
- [fix] Other detail optimization and code writing optimization, thank you for your PR

## Pro 1.1.0

Release time: 2021-11-22

- [feature] Added resource division by user, users can use resource management without interfering with each other
- [feature] Added comment sticky function
- [feature] Added one-click setting of resource pictures as article cover
- [feature] optimize default template
- [fix] Solved the problem that resources, templates, and mall lists cannot be sorted horizontally
- [fix] Solved the display problem of the default template menu of the mobile version
- [fix] solved a possible xss problem

## Pro 1.0.8

Release time: 2021-10-24

- [feature] Optimize the insertion of graphic resources when writing articles, and support direct upload
- [feature] Solve the problem of server lag caused by uploading the cover of the article
- [feature] Resource management adds the function of selecting all
- [fix] Default template: add default favicon, easy to modify and replace icon
- [fix] Default template: Optimize the drop-down experience of the secondary menu
- [fix] Fix the problem that the comment verification code cannot be loaded after the static URL is set
- [fix] Fix the problem that label query may report sql error

## Pro 1.0.7

Release time: 2021-10-08

- [feature] Add the function of card notes, organize notes, accumulate knowledge, replace the original Weiyu, and prepare for the 531 upgrade.
- [feature] Resource management adds batch delete function
- [fix] Fix some problems with resource management thumbnails
- [fix] Fix the problem that there is a blank line at the beginning of the backup file that cannot be imported
- [fix] Fix the abnormality of the background button of the safari browser
- [fix] Optimize some other details.

## Pro 1.0.6

Release time: 2021-09-20

- [feature] Resource management adds support for uploading mp4 video files and inserting videos into articles
- [feature] Add user login IP and time display
- [feature] Optimize the store, display plugins and templates separately
- [feature] Write the default template Powered by emlog into the database, which is convenient for users to modify and delete in the settings
- [fix] Solve the problem that the page cannot insert resources.
- [fix] Optimize registration configuration writing, increase registration success rate
- [fix] Solve the problem that the default template display release time is wrong

## Pro 1.0.5

Release time: 2021-09-05

- [feature] Avatar and article cover image cropping supports mobile phones, and optimizes the cropping experience
- [fix] Common authors no longer support action resource management
- [fix] Solve the warning problem of https loading comment avatar
- [fix] Fix the problem that uploading cover images and avatars cannot create new directories
- [fix] The problem of loading too many resource images when writing an article

## Pro 1.0.4

Release time: 2021-08-29

- [feature] Added article cover image function
- [feature] Optimize avatar upload, support cropping
- [feature] Optimize the default template markdown display
- [fix] Fix downloading updates in the tmp directory limit of some servers

## Pro 1.0.3

Release time: 2021-08-14

- [feature] Added management background security entry, which needs to be manually configured in config.php
- [feature] Optimized the default template details
- [feature] Adjusted the auto-save style to avoid disturbing writing
- [fix] System security reinforcement

## Pro 1.0.2

Release time: 2021-08-01

- [fix] Try to fix the problem of token error in normal operation
- [fix] Adjust the timeout settings for accessing official services
- [feature] Optimized the display of store and template pages, added author and template homepage
- [feature] Optimize some error reminders to facilitate locating problems.

## Pro 1.0.1

Release time: 2021-07-17

- [fix] Fixed the problem that the logo on the installation interface was missing
- [fix] Solved the problem that the failure to install the extension does not display detailed error reports
- [feature] Enhanced graphic captcha, and support click to refresh
- [feature] Added the shortcut key for writing and saving articles [ ctrl ( cmd ) + s ]

## Pro 1.0.0

Release time: 2021-07-10

- [feature] hi emlog pro, a new world

##6.0.0

Release time: 2018-10-02

- New background and default templates
- Optimize the index, improve the label storage method, and perform better when the amount of data is large
- Deleted Weiyu\Delete mobile version
- Compatible with php7.2

!> This version is too old and has security risks. Please install the latest pro version. The pro version is an upgrade to 5.3.1 and 6.0.0, involving more than 200 function improvements and optimizations, more functions, faster speed, and more Safety.

Installation package: [emlog_6.0.0.zip](https://oss.emlog.net/download/archived/emlog_6.0.0.zip)

## 5.3.1

Release time: 2014-07-21

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

Installation package: [emlog_5.3.1.zip](https://oss.emlog.net/download/archived/emlog_5.3.1.zip)


---

--end--