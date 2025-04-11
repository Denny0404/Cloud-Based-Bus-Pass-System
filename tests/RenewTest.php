<?php
define('PHPUNIT_RUNNING', true);
require_once 'renew.php';

use PHPUnit\Framework\TestCase;

class RenewTest extends TestCase {

    public function testFetchPassByIdReturnsRow() {
        $mockCon = $this->createMock(mysqli::class);
        $mockStmt = $this->createMock(mysqli_stmt::class);
        $mockResult = $this->createMock(mysqli_result::class);

        $expected = [
            'id' => 1,
            'name' => 'Denish',
            'date' => '2025-01-01',
            'dest' => 'Mathura'
        ];

        $mockCon->method('prepare')->willReturn($mockStmt);
        $mockStmt->method('bind_param')->willReturn(true);
        $mockStmt->method('execute')->willReturn(true);
        $mockStmt->method('get_result')->willReturn($mockResult);
        $mockResult->method('fetch_assoc')->willReturn($expected);

        $this->assertEquals($expected, fetchPassById($mockCon, 1));
    }

    public function testUpdatePassDateReturnsTrue() {
        $mockCon = $this->createMock(mysqli::class);
        $mockStmt = $this->createMock(mysqli_stmt::class);

        $mockCon->method('prepare')->willReturn($mockStmt);
        $mockStmt->expects($this->once())->method('bind_param');
        $mockStmt->expects($this->once())->method('execute')->willReturn(true);

        $this->assertTrue(updatePassDate($mockCon, 1, '2025-12-31'));
    }

    public function testCalculateNewDays() {
        $oldDate = '2025-01-01';
        $newDate = '2025-01-11';
        $expectedDays = 11;

        $actualDays = calculateNewDays($oldDate, $newDate);
        $this->assertEquals($expectedDays, $actualDays);
    }

    public function testFetchPriceForDestinationReturnsValue() {
        $mockCon = $this->createMock(mysqli::class);
        $mockStmt = $this->createMock(mysqli_stmt::class);
        $mockResult = $this->createMock(mysqli_result::class);

        $mockCon->method('prepare')->willReturn($mockStmt);
        $mockStmt->method('bind_param')->willReturn(true);
        $mockStmt->method('execute')->willReturn(true);
        $mockStmt->method('get_result')->willReturn($mockResult);
        $mockResult->method('fetch_assoc')->willReturn(['price' => 100]);

        $this->assertEquals(100, fetchPriceForDestination($mockCon, 'Delhi'));
    }
}
