<?php

namespace peridot\robo\task;

use Robo\Result;
use Robo\Output;
use Robo\Task\Shared\CommandInterface;
use Robo\Task\Shared\TaskInterface;
use Robo\Task\Shared\Executable;
use Robo\Task\Shared\TaskException;


/**
 * Class PeridotTask
 * @package Robo\Task
 */
class PeridotTask implements TaskInterface, CommandInterface
{

    use Output;
    use Executable;

    const LOCAL_INSTALL_PATH = 'vendor/peridot-php/peridot/bin/peridot';


    /**
     * @var string
     */
    protected $command;


    /**
     * @param string $pathToPeridot
     * @throws TaskException
     */
    public function __construct($pathToPeridot = null)
    {
        if ($pathToPeridot) {
            $this->command = "$pathToPeridot";
        } elseif (file_exists(self::LOCAL_INSTALL_PATH)) {
            $this->command = self::LOCAL_INSTALL_PATH;
        } else {
            throw new TaskException(__CLASS__, "Neither composer nor phar installation of peridot found");
        }
    }

    /**
     * @return string
     */
    public function getCommand()
    {
        return $this->command . $this->arguments;
    }

    /**
     * @return Result
     */
    public function run()
    {
        $this->printTaskInfo('Running peridot ' . $this->arguments);
        return $this->executeCommand($this->getCommand());
    }

}
