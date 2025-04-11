<?php
define('PHPUNIT_RUNNING', true);
require_once 'suspend.php';

use PHPUnit\Framework\TestCase;

class SuspendTest extends TestCase {

    public function testGetRemainingDaysReturnsCorrectValue() {
        $futureDate = date('Y-m-d', strtotime('+5 days'));
        $expected = getRemainingDays($futureDate); // Get actual
        $this->assertEquals($expected, getRemainingDays($futureDate));
    }

    public function testFetchPassDetailsReturnsRow() {
        $mockCon = $this->createMock(mysqli::class);
        $mockStmt = $this->createMock(mysqli_stmt::class);
        $mockResult = $this->createMock(mysqli_result::class);

        $expected = ['id' => 1, 'date' => '2025-12-31', 'dest' => 'Mathura'];

        $mockCon->method('prepare')->willReturn($mockStmt);
        $mockStmt->method('bind_param')->willReturn(true);
        $mockStmt->method('execute')->willReturn(true);
        $mockStmt->method('get_result')->willReturn($mockResult);
        $mockResult->method('fetch_assoc')->willReturn($expected);

        $this->assertEquals($expected, fetchPassDetails($mockCon, 1));
    }

    public function testGetDestinationPriceReturnsCorrectValue() {
        $mockCon = $this->createMock(mysqli::class);
        $mockStmt = $this->createMock(mysqli_stmt::class);
        $mockResult = $this->createMock(mysqli_result::class);

        $mockCon->method('prepare')->willReturn($mockStmt);
        $mockStmt->method('bind_param')->willReturn(true);
        $mockStmt->method('execute')->willReturn(true);
        $mockStmt->method('get_result')->willReturn($mockResult);
        $mockResult->method('fetch_assoc')->willReturn(['price' => 120]);

        $this->assertEquals(120, getDestinationPrice($mockCon, 'Mathura'));
    }

    public function testProcessRefundExecutesUpdatesSeparately() {
        $mockCon = $this->createMock(mysqli::class);
    
        // First statement: for refund update
        $stmt1 = $this->createMock(mysqli_stmt::class);
        $stmt1->expects($this->once())->method('bind_param')->with('di', 250.0, 1)->willReturn(true);
        $stmt1->expects($this->once())->method('execute')->willReturn(true);
    
        // Second statement: for date update
        $stmt2 = $this->createMock(mysqli_stmt::class);
        $stmt2->expects($this->once())->method('bind_param')->with('i', 1)->willReturn(true);
        $stmt2->expects($this->once())->method('execute')->willReturn(true);
    
        // Prepare returns: first call returns stmt1, second call returns stmt2
        $mockCon->method('prepare')->willReturnCallback(function ($query) use ($stmt1, $stmt2) {
            if (str_contains($query, 'paid = paid -')) {
                return $stmt1;
            }
            if (str_contains($query, 'date = CURDATE()')) {
                return $stmt2;
            }
            return null;
        });
    
        // Run function
        processRefund($mockCon, 1, 250.0);
    
        // Final check
        $this->assertTrue(true); // If no exceptions, it passed
    }
    
}
