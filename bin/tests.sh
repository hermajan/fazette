#! /bin/bash
# Script runs tests from `tests` folder

# default shell script for running tests
vendor/bin/tester -C -s tests tests

# PHP version of script for running tests
#php ../vendor/nette/tester/src/tester.php -C -s -w tests test
