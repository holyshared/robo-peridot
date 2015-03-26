<?php

use Evenement\EventEmitterInterface;
use expectation\peridot\ExpectationPlugin;
use cloak\peridot\CloakPlugin;

return function(EventEmitterInterface $emitter)
{
    ExpectationPlugin::create()->registerTo($emitter);

    if (defined('HHVM_VERSION') === false) {
        CloakPlugin::create('.cloak.toml')->registerTo($emitter);
    }
};
