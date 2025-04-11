<?php
define('PHPUNIT_RUNNING', true);
require_once 'invoice.php';

use PHPUnit\Framework\TestCase;

class InvoiceTest extends TestCase {

    public function testUpdatePaymentExecutesQuery() {
        $mockCon = $this->createMock(mysqli::class);
        $mockStmt = $this->createMock(mysqli_stmt::class);

        $mockCon->method('prepare')->willReturn($mockStmt);
        $mockStmt->expects($this->once())->method('bind_param');
        $mockStmt->expects($this->once())->method('execute')->willReturn(true);

        $result = updatePayment($mockCon, 1, 200.0);
        $this->assertTrue($result);
    }

    public function testGetPassDetailsReturnsRow() {
        $mockCon = $this->createMock(mysqli::class);
        $mockStmt = $this->createMock(mysqli_stmt::class);
        $mockResult = $this->createMock(mysqli_result::class);

        $expectedRow = [
            'id' => 1,
            'name' => 'Test User',
            'contact' => '9876543210',
            'email' => 'test@example.com',
            'date' => '2025-12-31',
            'dest' => 'Delhi',
            'paid' => 500.0
        ];

        $mockCon->method('prepare')->willReturn($mockStmt);
        $mockStmt->method('bind_param')->willReturn(true);
        $mockStmt->method('execute')->willReturn(true);
        $mockStmt->method('get_result')->willReturn($mockResult);
        $mockResult->method('fetch_assoc')->willReturn($expectedRow);

        $row = getPassDetails($mockCon, 1);
        $this->assertEquals($expectedRow, $row);
    }
}
