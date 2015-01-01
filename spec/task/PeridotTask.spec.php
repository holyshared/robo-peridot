<?php

use peridot\robo\task\PeridotTask;


describe('PeridotTask', function() {
    describe('getCommand', function() {
        context('when directory', function() {
            beforeEach(function() {
                $this->command = 'vendor/peridot-php/peridot/bin/peridot';
                $this->arguments = '-c ../../peridot.php -g *.spec.php -b -C -r spec spec';

                $this->task = new PeridotTask();
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
    });
});
