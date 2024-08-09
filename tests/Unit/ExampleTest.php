<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    public function test_that_true_is_false(): void
    {
        $this->assertTrue(false);
    }

    public function test_that_equals_is_pizza(): void
    {
        $this->assertEquals("pizza", "pizza");
    }
}
