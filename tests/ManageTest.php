<?php
define('PHPUNIT_RUNNING', true);
require_once 'manage.php';

use PHPUnit\Framework\TestCase;

class ManageTest extends TestCase {

    public function testGetPassByIdReturnsRow() {
        $mockCon = $this->createMock(mysqli::class);
        $mockStmt = $this->createMock(mysqli_stmt::class);
        $mockResult = $this->createMock(mysqli_result::class);

        $expectedRow = [
            'id' => 101,
            'name' => 'Denish',
            'password' => 'abc123',
            'contact' => '9876543210',
            'email' => 'denish@example.com',
            'date' => '2025-12-31',
            'dest' => 'Delhi',
            'paid' => 400
        ];

        $mockCon->method('prepare')->willReturn($mockStmt);
        $mockStmt->method('bind_param')->willReturn(true);
        $mockStmt->method('execute')->willReturn(true);
        $mockStmt->method('get_result')->willReturn($mockResult);
        $mockResult->method('fetch_assoc')->willReturn($expectedRow);

        $row = getPassById($mockCon, 101);
        $this->assertEquals($expectedRow, $row);
    }

    public function testVerifyPasswordSuccess() {
        $row = ['password' => 'mypassword'];
        $this->assertTrue(verifyPassword($row, 'mypassword'));
    }

    public function testVerifyPasswordFail() {
        $row = ['password' => 'mypassword'];
        $this->assertFalse(verifyPassword($row, 'wrongpass'));
    }
}
