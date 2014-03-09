Blink is built to fit [UIkit](http://getuikit.com), but also can be enhanced to be standalone from any frontend framework.

# To do
Today it will be updated. 

* Profile page
* Search page

## For devs

* Update rest parts to jQuery
* Avatars thumbs cropping (to square)
* Avatars cropping tool for user (jQuery plugin)
* HTML5 uploader for attachments
* WyswiBB editor

# Blink Template Structure

## ./media

Will contain all the browser accessible media files.

## media/images

All images used in the template.

## media/js

JavaScript files.

## ./less

Less files that will be compiled into CSS.

## ./language

Custom language files for the template.

## ./widgets

Template files for widgets. Widgets are simple standalone objects like JHtml.

## ./layouts

Template files for layouts. Layouts are similar to those in Joomla 3.0+.

## ./modules

Template files for modules. Modules are layouts which have controller and can be called from outside without knowing
the implementation details.

## ./pages

Template files for pages. Pages are the traditional views.

## ./template.php

Main template class, which defines template overrides and custom method calls.

## ./config.xml

Template configuration options. Can be used both inside the template and less files.

##./kunena_tpml_blink.xml

Needed by Joomla installer. Yes, the new templates will be installed by Joomla Extension Manager.

## ./template.xml

Legacy installer file for Kunena. Will go away.
