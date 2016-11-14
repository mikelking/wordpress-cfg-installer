# WordPress Common Config Installer
This is a [custom Composer installer](http://getcomposer.org/doc/articles/custom-installers.md) for WordPress Common Config system. It is a proof of concept, but feel free to use it. This is a fork of the johnpbloch/wordpress-core-installer.

Some day there will be a package is on [packagist](http://packagist.org) and the package name is `mikelking/wordpress-cfg-installer`.

I am still riddling out all of the details on this so it's a WIP (work in progress).

### Usage
To set up a custom WordPress build package to use this as a custom installer, add the following to your package's composer file:

```
"type": "wordpress-cfg",
"require": {
	"mikelking/wordpress-cfg-installer": "~0.1"
}
```

By default, this package will install a WordPress Common Config type package in the `wproot` directory. To change this you can add the following to either your custom WordPress core type package or the root composer package:

```
"extra": {
	"wordpress-install-dir": "custom/path"
}
```

The root composer package can also declare custom paths as an object keyed by package name:

```
"extra": {
	"wordpress-install-dir": {
		"wordpress/wordpress": "wordpress",
		"johnpbloch/wordpress": "jpb-wordpress"
	}
}
```

### License
This is licensed under the GPL version 2 or later.
