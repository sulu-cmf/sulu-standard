CHANGELOG for Sulu CMF
======================

* 0.12.1 (2014-11-27)
   * HOTFIX      #618 [MediaBundle]     Made web folder for format cache configure enable

* 0.12.0 (2014-11-25)

    * HOTFIX      #594 [WebsiteBundle]  Fixed sitemap alternate link bugs
    * BUGFIX      #609 [All]            Allows null value for security subject and fixed snippet internal links bug
    * ENHANCEMENT #577 [All]            Applied security to navigation items and content tabs
    * ENHANCEMENT #604 [CoreBundle]     Only register services for the current context
    * ENHANCEMENT #--- [Tests]          Fixed output colors for Mac users
    * BUGFIX      #571 [CoreBundle]     Fixed build command
    * ENHANCEMENT #556 [MediaBundle]    Enhanced url generation for collections
    * ENHANCEMENT #535 [SecurityBundle] Added SecurityListener and secured Content, Media and Security
    * BUGFIX      #568 [SnippetBundle]  Added template to view for Snippets
    * ENHANCEMENT #539 [AdminBundle]    Added validation for iban and vat numbers from the eu
    * HOTFIX      #559 [CoreBundle]     Workaround upstream reg. in DoctrinePHPCRBundle, which causes
                                        eager validation of workspace existence.
    * ENHANCEMENT #523 [All]            Refactored and improved functional tests
    * FEATURE     #553 [SnippetBundle]  Possiblity to show all snippet types by not providing any
    * BUGFIX      #533 [CoreBundle]     Removed request_analyzer.enable option (it is now irrelevant)
    * FEATURE     #563 [CoreBundle]     Introduced LocalizationProviders to offer the possibility to
    * BUGFIX      #563 [SecurityBundle] Showing correct localizations in UserRole-Assignment in
                                        Permission-Tab
    * FEATURE     #564 [ContentBundle]  Added UI to copy content languages
    * HOTFIX      #559 [CoreBundle]     Workaround upstream reg. in DoctrinePHPCRBundle, which causes
                                        eager validation of workspace existence.
    * ENHANCEMENT #523 [All]            Refactored and improved functional tests
    * BUGFIX      #597 [ContentBundle]  Reconnect to mysql if connection gone away in websocket
    * FEATURE     #368 [SnippetBundle]  Added `sulu:snippet:locale-copy`-command

* 0.11.2 (2014-11-17)

    * HOTFIX #559 [CoreBundle]    Workaround upstream reg. in DoctrinePHPCRBundle, which causes
                                  eager validation of workspace existence.
* 0.11.1 (2014-11-13)

    * HOTFIX #543 [SearchBundle]  Fixed re-index command
    * HOTFIX #551 [SearchBundle]  Switched to test adapter for tests
    * HOTFIX #549 [ContentBundle] Fixed page URL fetching for internal links used in snippets
    * HOTFIX #512 [MediaBundle]   Only show Media from specific selected Collection
    * HOTFIX #550 [MediaBundle]   Deleted Media do not throw Exception when page is saved

* 0.11.0 (2014-11-12)

    * BUGFIX      #540                 Real url in requested language (navigation, ...) for shadows
    * ENHANCEMENT #523 [ContentBundle] Prefix ContentBundle template path
    * BUGFIX      #531 [ContentBundle] Fixed single internal link freeze
    * BUGFIX      #529 [MediaBundle]   Display sorted Collections in overlay
    * FEATURE     #536 [MediaBundle]   Added Configurable display options for media-selection
    * ENHANCEMENT #361 [WebsiteBundle] Read urls for pages in all languages
    * ENHANCEMENT #526 [WebsiteBundle] Added Template var to resolver (Twig-Template)
    * ENHANCEMENT #528 [WebsiteBundle] Added memoize service to cache data and use it in twig extension
    * ENHANCEMENT #524 [ContentBundle] Prefix ContentBundle template path
    * BUGFIX      #518 [ContentBundle] Ordering of page changed when node is renamed
    * FEATURE     #511 [SnippetBundle] Ask confirmation when deleting Snippets which are referenced by content

* 0.10.2 (2014-11-07)

    * HOTFIX #509 [ContentBundle] Fixed cached data bug in smart-content

* 0.10.1 (2014-11-04)

* 0.10.0 (2014-11-03)
