# EoRedirectBundle

[![Latest Stable Version](https://poser.pugx.org/eo/redirect-bundle/v/stable.png)](https://packagist.org/packages/eo/redirect-bundle)
[![Total Downloads](https://poser.pugx.org/eo/redirect-bundle/downloads.png)](https://packagist.org/packages/eo/redirect-bundle)

## Prerequisites
This version of the bundle requires Symfony 2.1+

## Installation

### Step 1: Download EoRedirectBundle using composer
Add EoRedirectBundle in your composer.json:

```
{
    "require": {
        "eo/redirect-bundle": "dev-master"
    }
}
```

Now tell composer to download the bundle by running the command:

```
$ php composer.phar update eo/redirect-bundle
```

Composer will install the bundle to your project's vendor/eo directory.

### Step 2: Enable the bundle
Enable the bundle in the kernel:

```
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Eo\RedirectBundle\EoRedirectBundle(),
    );
}
```

## License
This bundle is under the MIT license. See the complete license in the bundle:
```
Resources/meta/LICENSE
```

## Reporting an issue or a feature request
Issues and feature requests related to this bundle are tracked in the Github issue tracker https://github.com/eymengunay/EoRedirectBundle/issues.