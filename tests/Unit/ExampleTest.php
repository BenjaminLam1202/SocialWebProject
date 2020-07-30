<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
          $this->visit('/api/article')
         ->type('Taylor', 'title')
         ->type('Hair', 'des')
         ->type('Taylor', 'category')
         ->press('submit')
         ->seePageIs('/api/article');
    }
}
