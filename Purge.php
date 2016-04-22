<?php
/**
 * The Purge extension to MediaWiki allows to for purging the page cache via a tab button.
 *
 * @link https://www.mediawiki.org/wiki/Extension:Purge Documentation
 * @link https://www.mediawiki.org/wiki/Extension_talk:Purge Support
 * @link https://github.com/Hutchy68/Purge.git Source Code
 *
 * @file
 * @ingroup Extensions
 * @package MediaWiki
 *
 * @version 1.0.2 2016-04-22
 *
 * @author Ævar Arnfjörð Bjarmason
 * @author Tom Hutchison (Hutchy68)
 * @author Karsten Hoffmeyer (kghbln)
 *
 * @copyright Copyright (C) 2005, Ævar Arnfjörð Bjarmason
 *
 * @license https://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

// Ensure that the script cannot be executed outside of MediaWiki
if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

// Register extension with MediaWiki
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Purge',
	'author' => array (
		'Ævar Arnfjörð Bjarmason',
		'Tom Hutchison',
		'...'
	),
	'url' => 'https://www.mediawiki.org/wiki/Extension:Purge',
	'descriptionmsg' => 'descriptionmsg',
	'version'  => '1.0.2',
	'license-name' => 'GPL-2.0+'
);

// Load extension's class
$wgAutoloadClasses['PurgeActionExtension'] = __DIR__ . '/Purge.class.php';

// Register extension messages
$wgMessagesDirs['Purge'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['Purge'] = __DIR__ . '/Purge.i18n.php';

// Register hook
$wgHooks['SkinTemplateNavigation'][] = 'PurgeActionExtension::onSkinTemplateNavigation';
