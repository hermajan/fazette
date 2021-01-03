#! /bin/bash
# Script runs tests

COMMAND=$1

function help() {
    echo "all - runs all tests"
    echo "phpstan - runs PHPStan"
    echo "tester - runs Nette Tester tests"
}

# Runs PHPStan
function phpstan() {
    echo -e "PHPStan"
    ./vendor/bin/phpstan analyse src -c tests/phpstan.neon
}

# Runs Nette Tester tests
function tester() {
    # Default shell script for running tests from `tests` folder
    echo -e "Nette Tester"

    # PHP version of script for running tests
    php "./vendor/nette/tester/src/tester.php" -C tests
}

function all() {
    phpstan
    tester
}

if [[ "${COMMAND}" == "" ]]; then
    help
fi

# run command
$COMMAND
