<?php

/**
* This file is part of robo-peridot.
*
* (c) Noritaka Horio <holy.shared.design@gmail.com>
*
* This source file is subject to the MIT license that is bundled
* with this source code in the file LICENSE.
*/

namespace holyshared\peridot\robo;


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
