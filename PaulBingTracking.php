<?php
namespace PaulBingTracking;

use Enlight_Controller_ActionEventArgs;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;

class PaulBingTracking extends Plugin {

	public static function getSubscribedEvents() {
		return [
			'Enlight_Controller_Action_PreDispatch_Frontend' => 'onPostDispatch',
			'Enlight_Controller_Action_PreDispatch_Widgets' => 'onPostDispatch',
		];
	}

	public function install(InstallContext $context) {
		$context->scheduleClearCache(InstallContext::CACHE_LIST_FRONTEND);
	}

	/**
	 * Event listener method
	 *
	 * @param Enlight_Controller_ActionEventArgs $args
	 */
	public function onPostDispatch( Enlight_Controller_ActionEventArgs $args ) {
		if (!Shopware()->Config()->getByNamespace('PaulBingTracking', 'show')) {
			return;
		}

		$request = $args->getSubject()->Request();
		$view    = $args->getSubject()->View();

		$view->addTemplateDir( __DIR__ . '/Resources/Views/' );

		if ( $request->isXmlHttpRequest() ) {
			return;
		}

		if ( empty(Shopware()->Config()->getByNamespace('PaulBingTracking', 'UETID') ) ) {
			return;
		}

		// Set template vars.
		$view->paulBingTrackingUETID = Shopware()->Config()->getByNamespace('PaulBingTracking', 'UETID');
	}
}
