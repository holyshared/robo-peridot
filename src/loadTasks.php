<?php

namespace peridot\robo;

use peridot\robo\task\PeridotTask;


/**
 * Trait loadTasks
 * @package peridot\robo
 */
trait loadTasks {

    /**
     * @param string|null $pathToPeridot
     * @return PeridotTask
     */
    protected function taskPeridot($pathToPeridot = null)
    {
        return new PeridotTask($pathToPeridot);
    }

}
