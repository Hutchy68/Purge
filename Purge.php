<?php
/**
 * An extension that adds a purge tab on each page
 *
 * @author Ævar Arnfjörð Bjarmason <avarab@gmail.com>
 * @copyright Copyright © 2005, Ævar Arnfjörð Bjarmason
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 *
 *  This is a fork of the original  see https://www.mediawiki.org/wiki/Extension:Purge
 *  Updated by Tom Hutchison to use proper i18n json files
 *  Changed extension hook to SkinTemplateNavigation
 *  Fixed ExtensionCredits to use the preferred descriptionmg
 *  version 1.0.1
 */

if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'Purge' );
} else {
	die( 'This version of the Purge extension requires MediaWiki 1.25+' );
}
