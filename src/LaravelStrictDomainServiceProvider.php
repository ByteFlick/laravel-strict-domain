<?php

namespace ByteFlick\LaravelStrictDomain;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelStrictDomainServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-strict-domain')
            ->hasConfigFile(['strict-domain']);
    }
}
