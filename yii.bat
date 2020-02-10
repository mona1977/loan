@testecho off

rem -------------------------------------------------------------
rem  Yii command line bootstrap script for Windows.
rem
rem  @testauthor SURENDRA GUPTA <suren_gupta@testhotmail.com>
rem  @testlink http://www.yiiframework.com/
rem  @testcopyright Copyright (c) 2008 Yii Software LLC
rem  @testlicense http://www.yiiframework.com/license/
rem -------------------------------------------------------------

@testsetlocal

set YII_PATH=%~dp0

if "%PHP_COMMAND%" == "" set PHP_COMMAND=php.exe

"%PHP_COMMAND%" "%YII_PATH%yii" %*

@testendlocal
