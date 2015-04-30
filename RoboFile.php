<?php

use Robo\Tasks;
use coverallskit\robo\loadTasks as CoverallsKitTasks;
use holyshared\peridot\robo\loadTasks as PeridotTasks;


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
            ->configureBy('.coveralls.toml')
            ->run();

        return $result;
    }

}
