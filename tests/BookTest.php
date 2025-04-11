<?php
use PHPUnit\Framework\TestCase;

define('PHPUNIT_RUNNING', true);
require_once __DIR__ . '/../book.php';

class BookTest extends TestCase {

    public function testGetDestinationsReturnsResult() {
        // Proper mysqli mock with query()
        $mockCon = $this->getMockBuilder(mysqli::class)
                        ->disableOriginalConstructor()
                        ->onlyMethods(['query'])
                        ->getMock();

        $mockResult = $this->createMock(mysqli_result::class);

        $mockCon->expects($this->once())
                ->method('query')
                ->with('SELECT name FROM destination')
                ->willReturn($mockResult);

        $result = getDestinations($mockCon);
        $this->assertSame($mockResult, $result);
    }

    public function testPrintDestinationOptionsPrintsExpectedHTML() {
        $mockResult = $this->getMockBuilder(stdClass::class)
                           ->addMethods(['fetch_array'])
                           ->getMock();

        $mockResult->expects($this->exactly(3))
                   ->method('fetch_array')
                   ->willReturnOnConsecutiveCalls(
                       ['name' => 'Toronto'],
                       ['name' => 'Waterloo'],
                       false
                   );

        ob_start();
        printDestinationOptions($mockResult);
        $output = ob_get_clean();

        $this->assertStringContainsString("<option value='Toronto'>Toronto</option>", $output);
        $this->assertStringContainsString("<option value='Waterloo'>Waterloo</option>", $output);
    }
}
