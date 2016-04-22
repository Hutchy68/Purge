<?php
/**
 * Purge
 *
 * @file
 * @ingroup Extensions
 *
 * @license https://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 *
 */

class PurgeActionExtension{
	public static function onSkinTemplateNavigation( $skin, array &$content_actions ) {
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
