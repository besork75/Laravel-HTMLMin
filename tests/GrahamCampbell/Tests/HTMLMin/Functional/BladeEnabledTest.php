<?php

/**
 * This file is part of Laravel HTMLMin by Graham Campbell.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace GrahamCampbell\Tests\Functional\HTMLMin;

use GrahamCampbell\Tests\HTMLMin\AbstractTestCase;

/**
 * This is the blade enabled test class.
 *
 * @package    Laravel-HTMLMin
 * @author     Graham Campbell
 * @copyright  Copyright 2013-2014 Graham Campbell
 * @license    https://github.com/GrahamCampbell/Laravel-HTMLMin/blob/develop/LICENSE.md
 * @link       https://github.com/GrahamCampbell/Laravel-HTMLMin
 */
class BladeEnabledTest extends AbstractTestCase
{
    /**
     * Additional application environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function additionalSetup($app)
    {
        $app['config']->set('htmlmin::blade', true);
    }

    public function testNewSetup()
    {
        $this->app->register($this->getServiceProviderClass());

        $this->app['view']->addNamespace('stubs', realpath(__DIR__.'/../../../../views'));

        $return = $this->app['view']->make('stubs::test')->render();

        $this->assertEquals('<h1>Test</h1>', $return);
    }
}
