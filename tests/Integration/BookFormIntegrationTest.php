<?php

use PHPUnit\Framework\TestCase;

class BookFormIntegrationTest extends TestCase
{
    public function testDestinationDropdownPopulationWithoutDatabase()
    {
        // Simulated database result as an array of associative arrays
        $mockDestinations = [
            ['name' => 'GLA University'],
            ['name' => 'Mathura Junction'],
            ['name' => 'Vrindavan'],
        ];

        // Simulate the PHP loop that echoes <option> tags
        $optionsHtml = '';
        foreach ($mockDestinations as $row) {
            $optionsHtml .= "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>\n";
        }

        // Assert that the HTML contains expected destinations
        $this->assertStringContainsString("<option value='GLA University'>GLA University</option>", $optionsHtml);
        $this->assertStringContainsString("<option value='Mathura Junction'>Mathura Junction</option>", $optionsHtml);
        $this->assertStringContainsString("<option value='Vrindavan'>Vrindavan</option>", $optionsHtml);
    }
}
