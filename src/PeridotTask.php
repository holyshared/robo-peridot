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

use Robo\Result;
use Robo\Task\BaseTask;
use Robo\Common\ExecOneCommand;
use Robo\Contract\CommandInterface;
use Robo\Contract\TaskInterface;
use Robo\Contract\PrintedInterface;
use Robo\Exception\TaskException;


/**
 * Class PeridotTask
 * @package peridot\robo
 */
class PeridotTask extends BaseTask implements TaskInterface, CommandInterface, PrintedInterface
{

    use ExecOneCommand;


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
