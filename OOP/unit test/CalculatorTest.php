<?php
namespace Tests\Unit;
use App\Services\Calculator;
use PHPUnit\Framework\TestCase;
class CalculatorTest extends TestCase
{
    public function testAddTwoNumbers()
    {
        // Arrange
        $calculator = new Calculator();
        // Act
        $result = $calculator->add(2, 3);
        // Assert
        $this->assertEquals(5, $result);
    }
    public function testAddNegativeNumbers()
    {
        // Arrange
        $calculator = new Calculator();
        // Act
        $result = $calculator->add(-1, -4);
        // Assert
        $this->assertEquals(-5, $result);
    }
}
