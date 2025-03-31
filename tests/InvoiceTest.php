<?php
use PHPUnit\Framework\TestCase;

class InvoiceTest extends TestCase {
    private $mockMysqli;
    private $mockMysqliResult;

    protected function setUp(): void {
        // Mock the mysqli connection
        $this->mockMysqli = $this->createMock(mysqli::class);
        
        // Mock the mysqli result
        $this->mockMysqliResult = $this->createMock(mysqli_result::class);
    }

    public function testDatabaseConnectionMock() {
        // Ensure the mock database connection is valid
        $this->assertNotNull($this->mockMysqli, "Mock database connection should not be null.");
    }

    public function testUpdatePaidAmountMock() {
        $id = 1;
        $amt = 500;

        // Expect the query to be executed
        $this->mockMysqli->expects($this->once())
            ->method('query')
            ->with($this->stringContains("UPDATE pass SET paid = paid + '$amt' WHERE id = '$id'"))
            ->willReturn(true);

        // Simulate the function
        $result = $this->mockMysqli->query("UPDATE pass SET paid = paid + '$amt' WHERE id = '$id'");

        $this->assertTrue($result, "Paid amount update failed in mock test.");
    }

    public function testFetchPassDetailsMock() {
        $id = 1;
        $mockData = [
            "id" => 1,
            "name" => "Test User",
            "email" => "test@example.com",
            "contact" => "9876543210",
            "date" => "2025-05-05",
            "dest" => "Test Destination",
            "paid" => 500
        ];

        // Mock fetch_assoc() to return the fake data
        $this->mockMysqliResult->expects($this->once())
            ->method('fetch_assoc')
            ->willReturn($mockData);

        // Expect the query execution to return the mock result
        $this->mockMysqli->expects($this->once())
            ->method('query')
            ->with($this->stringContains("SELECT * FROM pass WHERE id = '$id'"))
            ->willReturn($this->mockMysqliResult);

        // Simulate function
        $result = $this->mockMysqli->query("SELECT * FROM pass WHERE id = '$id'");
        $row = $result->fetch_assoc();

        // Validate mock data
        $this->assertEquals("Test User", $row['name'], "Mock name does not match.");
        $this->assertEquals("test@example.com", $row['email'], "Mock email does not match.");
        $this->assertEquals("9876543210", $row['contact'], "Mock contact does not match.");
        $this->assertEquals("2025-05-05", $row['date'], "Mock date does not match.");
        $this->assertEquals("Test Destination", $row['dest'], "Mock destination does not match.");
    }
}

