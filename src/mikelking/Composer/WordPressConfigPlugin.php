<?php

namespace mikelking\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class WordPressConfigPlugin implements PluginInterface {

	/**
	 * Apply plugin modifications to composer
	 *
	 * @param Composer    $composer
	 * @param IOInterface $io
	 */
	public function activate( Composer $composer, IOInterface $io ) {
		$installer = new WordPressConfigInstaller( $io, $composer );
		$composer->getInstallationManager()->addInstaller( $installer );
	}

}
