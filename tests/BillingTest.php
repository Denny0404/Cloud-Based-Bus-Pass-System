<?php
define('PHPUNIT_RUNNING', true);
require_once 'billing.php';

use PHPUnit\Framework\TestCase;

class BillingTest extends TestCase {

    public function testCalculateDaysFromToday() {
        $futureDate = date('Y-m-d', strtotime('+10 days'));
        $expectedDays = 11; // +1 from today
        $actualDays = calculateDaysFromToday($futureDate);
        $this->assertEquals($expectedDays, $actualDays);
    }

    public function testCalculateAmount() {
        $price = 100;
        $days = 5;
        $expectedAmount = 500;
        $actualAmount = calculateAmount($price, $days);
        $this->assertEquals($expectedAmount, $actualAmount);
    }

    public function testGetPriceForDestination() {
        $mockCon = $this->createMock(mysqli::class);
        $mockStmt = $this->createMock(mysqli_stmt::class);
        $mockResult = $this->createMock(mysqli_result::class);

        $mockCon->method('prepare')->willReturn($mockStmt);
        $mockStmt->expects($this->once())->method('bind_param');
        $mockStmt->method('execute')->willReturn(true);
        $mockStmt->method('get_result')->willReturn($mockResult);
        $mockResult->method('fetch_assoc')->willReturn(['price' => 120]);

        $price = getPriceForDestination($mockCon, 'Delhi');
        $this->assertEquals(120, $price);
    }
    public function testInsertPassReturnsId() {
        // Fake connection object using anonymous class
        $mockCon = new class {
            public $insert_id = 7;
            public function prepare($query) {
                return new class {
                    public function bind_param($types, ...$params) {}
                    public function execute() { return true; }
                };
            }
        };
    
        $insertedId = insertPass($mockCon, 'John', 'john@example.com', '9999999999', '2025-12-31', 'Delhi', 'pass123');
        $this->assertEquals(7, $insertedId);
    }
    
}
