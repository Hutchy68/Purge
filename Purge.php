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
 *  version 1.0.0
 */

if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

$wgExtensionCredits['other'][] = array(
    'path' => __FILE__,
    'name' => 'Purge',
    'author' => 'Tom Hutchison', 
    'url' => 'https://github.com/Hutchy68/Purge', 
    'descriptionmsg' => 'descriptionmsg',
    'version'  => '1.0.0',
    'license-name' => "License",
);

$wgMessagesDirs['Purge'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['Purge'] = __DIR__ . '/Purge.i18n.php';

$wgHooks['SkinTemplateNavigation'][] = 'PurgeActionExtension::contentHook';

class PurgeActionExtension{
	public static function contentHook( $skin, array &$content_actions ) {
		global $wgRequest, $wgUser;
		// Use getRelevantTitle if present so that this will work on some special pages
		$title = method_exists( $skin, 'getRelevantTitle' ) ?
			$skin->getRelevantTitle() : $skin->getTitle();
		if ( $title->getNamespace() !== NS_SPECIAL && $wgUser->isAllowed( 'purge' ) ) {
			$action = $wgRequest->getText( 'action' );

			$content_actions['actions']['purge'] = array(
				'class' => $action === 'purge' ? 'selected' : false,
				'text' => wfMessage( 'purge' )->text(),
				'href' => $title->getLocalUrl( 'action=purge' )
			);
		}

		return true;
	}
}