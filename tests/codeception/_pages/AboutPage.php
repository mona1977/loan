<?php
/*
   DEVELOPER: SURENDRA GUPTA
   Date : 10-FEB-2020
   
*/

namespace tests\codeception\_pages;

use yii\codeception\BasePage;

/**
 * Represents about page
 * @property \AcceptanceTester|\FunctionalTester $actor
 */
class AboutPage extends BasePage
{
    public $route = 'site/about';
}
