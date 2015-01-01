<?php

namespace peridot\robo;

use peridot\robo\task\PeridotTask;


/**
 * Trait PeridotTasks
 * @package peridot\robo
 */
trait PeridotTasks {

    /**
     * @param string|null $pathToPeridot
     * @return PeridotTask
     */
    protected function taskPeridot($pathToPeridot = null)
    {
        return new PeridotTask($pathToPeridot);
    }

}
