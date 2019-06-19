Among Friends Wordpress Theme 2.0
=================================

This theme is an attempt by [Among Friends][] to take full advantage of the
Wordpress [Gutenberg Block Editor][], while at the same time freshen up the
visual design a bit. To make this as easy as possible, this theme has been
designed as a child of [Twenty Nineteen][].

Unfortunately, it turns out that Twenty Nineteen is not at all designed with
extensibility through child themes in mind. In particular, Twenty Nineteen’s
extensive use of style sheet preprocessors resulted in its style sheet being
a huge pile of unstructured and repetitive styles that not only have lots of
broken code comments and are needlessly large and thus wasteful of users’
bandwidth, but are also difficult to extend effectively in the usual
[cascading][] manner envisioned by Web standard designers. While this
approach possibly made development of Twenty Nineteen a bit easier (or not),
it makes developing child themes *much* harder. One can only hope that
Gutenberg will eventually evolve to be more conductive to theme reusability.

[Among Friends]: https://www.amongfriends.de/
[Gutenberg Block Editor]: https://wordpress.org/gutenberg/
[Twenty Nineteen]: https://wordpress.org/themes/twentynineteen/
[cascading]: https://www.w3.org/Style/CSS/


Features
--------

- Custom footer without bloginfo / privacy link (which AF includes in the
  footer menu)
- Custom excerpt footer for archive listings, showing an explicit
  "more info" hyperlink to the post
- Custom graphic design:
  - AF site branding as part of the horizontal main menu
  - Colouring (the Wordpress “theme colour” doesn’t work for everything)
  - Optimised visualisation of the `performances` archive listing
  - Display up to three upcoming performances horizontally when the
    `[af_upcoming]` shortcode is in use
- Custom localised labels for prev/next post links (`performances` category
  only)
- Limited Gutenberg Block Editor support


Installation
------------

```sh
cd wp-content/themes
git clone https://github.com/amongfriends-irishmusic/gutenberg-theme.git af-gutenberg

# To support modification through Wordpress's GUI,
# ensure www-data has write access - for example:
chgrp -R www-data af-gutenberg
chmod -R g+w af-gutenberg
```

Cloning from Github enables easy updating by `git pull` (after `git reset
--hard`, if need be). Manual installation is of course possible as well,
but installation through the Wordpress theme repository is not supported.


Copying
-------

Due to the reuse of certain parts of both [Twenty Nineteen][] as well as
[Posts in Page][], this theme has to be offered for reuse under the GNU
General Public License, specifically [GPL version 2][] or (at your option)
any later version.

Please attribute the author as “Arne Johannessen” or (at your option)
offer a hyperlink to [the theme’s Github repository][].

[Twenty Nineteen]: https://wordpress.org/themes/twentynineteen/
[Posts in Page]: https://ivycat.com/wordpress/wordpress-plugins/posts-in-page/
[GPL version 2]: https://github.com/amongfriends-irishmusic/gutenberg-theme/blob/master/LICENSE
[the theme’s Github repository]: https://github.com/amongfriends-irishmusic/gutenberg-theme


To Do
-----

- Increase custom site branding interoperability (right now the `<h1>`
  element is used for the group page link, which means the group page is
  not included in the header menu proper, which results in an incomplete
  main menu in *other* themes)
- Fix `:hover` effect for AF logo in custom site branding
- Improve presentation of `af_upcoming` in cases where there are just one
  or two announcements (low priority, because the editor can always make
  a manual announcement if they desire)
- Hide disabled template parts from HTML output (esp. in footer, possibly
  also in posts_loop)
- Try to rework style sheet for improved resilience when faced with changes
  in Twenty Nineteen – is that worth it, though?
