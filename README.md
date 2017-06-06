## MediaWiki Purge Extension

Adds a Purge `&action=purge` link tab of regular articles to your MediaWiki Skin allowing quick purging of page caches.

### Installation

Download and upload the zip file to `/extensions` and extract. Rename directory folder `/Purge-#-#-#` to `/Purge` and add the following to `LocalSettings.php` to enable this extension.

`require_once "$IP/extensions/Purge/Purge.php";`

Control the ability by user group to purge content. eg `['*']` would allow anyone, `['user']` allows only users or `['sysop']` would only allow sysops.

`$wgGroupPermissions['{a user group}']['purge'] = true; # delete the cache of a page`

See https://www.mediawiki.org/wiki/Manual:Purge for more information about purging a page's cache.
