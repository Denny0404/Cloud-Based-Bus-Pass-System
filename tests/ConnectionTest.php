<?php
use PHPUnit\Framework\TestCase;

class ConnectionTest extends TestCase {
    private $con;

    protected function setUp(): void {
        // Include the database connection file
        include 'connection.php';
        $this->con = $con;  // Use global $con from connection.php
    }

    public function testCanSelectDatabase() {
        // Check if the selected database exists
        $result = mysqli_query($this->con, "SELECT DATABASE();");
        $row = mysqli_fetch_array($result);
        $this->assertEquals("travel", $row[0], "Database selection failed.");
    }
}
