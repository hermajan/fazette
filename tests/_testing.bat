@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../libs/nette/tester/src/tester
php "%BIN_TARGET%" -c php.ini -s . %*
