<?php

namespace Tests\Unit;

use App\Calc;
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

    public function testSumMethodFromCalc(): void
    {
        // 1. Подготовка данных.
        $x = 3;
        $y = 5;

        // 2. Запуск теста.
        $result1 = (new Calc)->sum($x, $y);
        $result2 = (new Calc)->sum($y, $x);

        // 3. Проверка результата.
        $this->assertEquals($x + $y, $result1);
        $this->assertEquals($x + $y, $result2);
        $this->assertNotEquals($x - $y, $result1);
    }
}
