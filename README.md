robo-peridot
============

**robo-peridot** is a library to run the test of peridot for robo.  
Installation of [Robo PHP Task Runner](http://robo.li/) will be mandatory to use it.

[![Latest Stable Version](https://poser.pugx.org/robo-peridot/robo-peridot/v/stable.svg)](https://packagist.org/packages/robo-peridot/robo-peridot)
[![Latest Unstable Version](https://poser.pugx.org/robo-peridot/robo-peridot/v/unstable.svg)](https://packagist.org/packages/robo-peridot/robo-peridot)
[![Build Status](https://travis-ci.org/holyshared/robo-peridot.svg?branch=master)](https://travis-ci.org/holyshared/robo-peridot)
[![HHVM Status](http://hhvm.h4cc.de/badge/robo-peridot/robo-peridot.svg)](http://hhvm.h4cc.de/package/robo-peridot/robo-peridot)
[![Coverage Status](https://coveralls.io/repos/holyshared/robo-peridot/badge.png?branch=master)](https://coveralls.io/r/holyshared/robo-peridot?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/54c383e66c003567fd000457/badge.svg?style=flat)](https://www.versioneye.com/user/projects/54c383e66c003567fd000457)


Basic Usage
----------------------------

To use a task, you must write code such as the following.  
Options that can be used **-grep**, **-no-colors**, **-reporter**, **--bail**, **--configuration**.

```php
class RoboFile extends Tasks
{
    use \peridot\robo\loadTasks;

    public function coverallsUpload()
    {
        $result = $this->taskPeridot()
		    ->bail()
		    ->directoryPath('spec')
		    ->run();

	    return $result;
    }
}
```

Specify more than one file
----------------------------

If you specify more than one file, you can use the **filePaths** method.  
The following code is equivalent to `peridot spec/foo.php spec/bar.php`.

```php
class RoboFile extends Tasks
{
    use \peridot\robo\loadTasks;

    public function coverallsUpload()
    {
        $result = $this->taskPeridot()
		    ->filePaths([
		        'spec/foo.php',
		        'spec/bar.php'
		    ])
		    ->run();

	    return $result;
    }
}
```


Testing robo-peridot
----------------------------

Please try the following command.

	composer install
	composer test
