<?php

namespace holyshared\peridot\robo\spec\task;

use holyshared\peridot\robo\PeridotTask;


describe(PeridotTask::class, function() {
    describe('getCommand', function() {
        beforeEach(function() {
            $this->command = 'vendor/peridot-php/peridot/bin/peridot';
            $this->task = new PeridotTask();
        });
        context('when directory path', function() {
            beforeEach(function() {
                $this->arguments = '-c ../../peridot.php -g *.spec.php -b -C -r spec spec';

                $this->task->configuration('../../peridot.php')
                    ->grep('*.spec.php')
                    ->bail()
                    ->noColors()
                    ->reporter('spec')
                    ->directoryPath('spec');
            });
            it('return execute command', function() {
                $command = $this->task->getCommand();
                expect($command)->toBe($this->command . ' ' . $this->arguments);
            });
        });
        context('when file paths', function() {
            beforeEach(function() {
                $this->arguments = '-c ../../peridot.php -g *.spec.php -b -C -r spec spec/foo.php spec/bar.php';

                $this->task->configuration('../../peridot.php')
                    ->grep('*.spec.php')
                    ->bail()
                    ->noColors()
                    ->reporter('spec')
                    ->filePaths([
                        'spec/foo.php',
                        'spec/bar.php'
                    ]);
            });
            it('return execute command', function() {
                $command = $this->task->getCommand();
                expect($command)->toBe($this->command . ' ' . $this->arguments);
            });
        });
    });
});
