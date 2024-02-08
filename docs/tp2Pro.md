# &#x1F366; Migrate to emlog from typecho

## Preface

This is a typecho plug-in for migrating Typecho article data to emlog pro

## Preparation before migration

- You need to prepare the typecho program for the old site and the emlog pro program for the new site
- If your articles exceed thousands or tens of thousands, please calculate the time yourself: 5,000 articles * 2 seconds = 10,000 seconds

## Install the migration plug-in in typecho

- [Download plugin for Typecho v1.1](https://oss.emlog.net/pkg/typecho1.1Em.zip)
- [Download plugin for Typecho v1.2](https://oss.emlog.net/pkg/typecho1.2Em.zip)

## Migration steps:

- Old site: aa.com Program: typecho
- New site: bb.com Program: emlog
- Note: All articles that have been reviewed are migrated


- 1. Enter the old site aa.com, install the typecho plug-in, and set it up as required
- 2. Enter the old site aa.com migration plug-in and enter migration

## Precautions:

- File tinfeng.txt will be automatically created in the plug-in directory. If it cannot be created, it may be a permission setting issue.
- Enable API in emlog system-settings-api settings
- During migration, do not close the page

## Half of the migration, stuck or failed processing

- Remember to migrate the stuck ID and view it in the URL of the browser
- xxx.com/wcid=6
- For example, if you do the above, just refresh this page and then the migration will continue.

## Last step

- Copy the uploads folder under user of aa.com site
- Paste into content/uploadfile/ty/ of bb.com site
- The folder "ty" was created by myself, you have to create it yourself!!!

## Finally the entire migration is complete!

## This plug-in is developed and maintained by [Tingfeng Blog](https://owoii.com/code/100.html)

Original article: https://owoii.com/code/100.html

--end--
