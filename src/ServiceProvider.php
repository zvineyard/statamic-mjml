<?php

namespace Vineyard\StatamicMjml;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $viewNamespace = 'statamic-mjml';

    public function bootAddon()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/statamic-mjml.php', 'statamic-mjml');
    }
}