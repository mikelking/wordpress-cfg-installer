<?php

namespace johnpbloch\Composer;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class WordPressConfigInstaller extends LibraryInstaller {

	const TYPE = 'wordpress-config';

	private static $_installedPaths = array();

	/**
	 * {@inheritDoc}
	 */
	public function getInstallPath( PackageInterface $package ) {
		$installationDir = false;
		$prettyName      = $package->getPrettyName();
		if ( $this->composer->getPackage() ) {
			$topExtra = $this->composer->getPackage()->getExtra();
			if ( ! empty( $topExtra['wordpress-root-install-dir'] ) ) {
				$installationDir = $topExtra['wordpress-root-install-dir'];
				if ( is_array( $installationDir ) ) {
					$installationDir = empty( $installationDir[$prettyName] ) ? false : $installationDir[$prettyName];
				}
			}
		}
		$extra = $package->getExtra();
		if ( ! $installationDir && ! empty( $extra['wordpress-root-install-dir'] ) ) {
			$installationDir = $extra['wordpress-root-install-dir'];
		}
		if ( ! $installationDir ) {
			$installationDir = 'wproot';
		}
		if (
			! empty( self::$_installedPaths[$installationDir] ) &&
			$prettyName !== self::$_installedPaths[$installationDir]
		) {
			throw new \InvalidArgumentException( 'Two packages cannot share the same directory!' );
		}
		self::$_installedPaths[$installationDir] = $prettyName;
		return $installationDir;
	}

	/**
	 * {@inheritDoc}
	 */
	public function supports( $packageType ) {
		return self::TYPE === $packageType;
	}

}
