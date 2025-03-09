<?php

namespace Vineyard\StatamicMjml;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $tags = [
        \Vineyard\StatamicMjml\Mjml::class,
    ];

    public function bootAddon()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/statamic-mjml.php', 'statamic-mjml');
    }
}