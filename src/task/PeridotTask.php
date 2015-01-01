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
     * Run tests matching pattern
     *
     * @param string $pattern
     * @return $this
     */
    public function grep($pattern)
    {
        $this->option("-g", $pattern);
        return $this;
    }

    /**
     * Disable output colors
     *
     * @return $this
     */
    public function noColors()
    {
        $this->option("-C");
        return $this;
    }

    /**
     * Select which reporter to use
     *
     * @param string $reporter
     * @return $this
     */
    public function reporter($reporter)
    {
        $this->option("-r", $reporter);
        return $this;
    }

    /**
     * Stop on failure
     *
     * @return $this
     */
    public function bail()
    {
        $this->option("-b");
        return $this;
    }

    /**
     * A php file containing peridot configuration
     *
     * @param string $configFile
     * @return $this
     */
    public function configuration($configFile)
    {
        $this->option("-c", $configFile);
        return $this;
    }

    /**
     * @param string $directory
     * @return $this
     */
    public function directoryPath($directory)
    {
        $this->arg($directory);
        return $this;
    }

    /**
     * @param array $files
     * @return $this
     */
    public function filePaths(array $files)
    {
        $this->args($files);
        return $this;
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
