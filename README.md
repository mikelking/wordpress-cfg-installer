# WordPress Config Installer
This is a [custom Composer installer](http://getcomposer.org/doc/articles/custom-installers.md) for WordPress Common Config system. It is a proof of concept, but feel free to use it. This is a fork of the johnpbloch/wordpress-core-installer.

Some day there will be a package is on [packagist](http://packagist.org) and the package name is `mikelking/wordpress-config-installer`.

I am still riddling out all of the details on this so it's a WIP (work in progress).

### Usage
To set up a custom WordPress build package to use this as a custom installer, add the following to your package's composer file:

```
"type": "wordpress-config",
"require": {
	"mikelking/wordpress-config-installer": "0.2.3"
}
```

By default, this package will install a WordPress Config type package in the `wproot` directory. Adding this to you project you should end up with wproot/wordpress/ the following:

```
wproot/wordpress/
.
├── README.md
├── composer.json
└── wproot
    ├── README.md
    ├── composer.json
    ├── PointRollAds.htm
    ├── UT_iframe_buster.html
    ├── addineyeV2.html
    ├── atlas_rm.htm
    ├── boif.html
    ├── class_server_conf_finder.php
    ├── eyereturn.html
    ├── fif.html
    ├── wordpress
    │   ├── README.md
    │   ├── composer.json
    │   ├── wp-admin
    │   ├── wp-content
    │   ├── wp-include

...

    │   └── xmlrpc.php
```


To change this you can add the following to either your custom WordPress core type package or the root composer package:

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
