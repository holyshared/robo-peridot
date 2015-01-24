<?php

namespace peridot\robo;


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
