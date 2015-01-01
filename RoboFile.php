<?php

use Robo\Tasks;
use coverallskit\robo\CoverallsKitTasks;
use peridot\robo\PeridotTasks;


/**
 * Class RoboFile
 */
class RoboFile extends Tasks
{

    use PeridotTasks;
    use CoverallsKitTasks;


    public function specAll()
    {
        $result = $this->taskPeridot()
            ->bail()
            ->directoryPath('spec')
            ->run();

        return $result;
    }

    public function coverallsUpload()
    {
        $result = $this->taskCoverallsKit()
            ->configure('coveralls.toml')
            ->run();

        return $result;
    }

}
