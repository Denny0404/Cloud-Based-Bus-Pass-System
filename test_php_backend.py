import unittest
import requests
from unittest.mock import patch

# Define the base URL where your PHP application is running
BASE_URL = "http://localhost/busspasssystem/"

class TestBusPassSystem(unittest.TestCase):

    def test_pass_renewal(self):
        """Test bus pass renewal API with valid data."""
        data = {
            "id": "12345",
            "new_date": "2025-12-31"
        }
        response = requests.post(BASE_URL + "renew.php", data=data)

        # Debugging: Print response for analysis
        print("\nResponse from renew.php:\n", response.text)

        self.assertEqual(response.status_code, 200)
        self.assertIn("Renewal Successful", response.text, "Pass renewal message not found")

    def test_pass_suspension(self):
        """Test bus pass suspension API with valid data."""
        data = {
            "user_id": "12345"
        }
        response = requests.post(BASE_URL + "suspend.php", data=data)

        # Debugging: Print response for analysis
        print("\nResponse from suspend.php:\n", response.text)

        self.assertEqual(response.status_code, 200)
        self.assertIn("Pass Suspended", response.text, "Pass suspension message not found")

    def test_invalid_pass_renewal(self):
        """Test pass renewal with invalid user ID."""
        data = {
            "id": "00000",  # Non-existent user ID
            "new_date": "2025-12-31"
        }
        response = requests.post(BASE_URL + "renew.php", data=data)

        print("\nResponse for invalid renewal:\n", response.text)

        self.assertNotIn("Renewal Successful", response.text, "Unexpected success message for invalid ID")

    def test_invalid_pass_suspension(self):
        """Test pass suspension with an invalid user ID."""
        data = {
            "user_id": "00000"  # Non-existent user ID
        }
        response = requests.post(BASE_URL + "suspend.php", data=data)

        print("\nResponse for invalid suspension:\n", response.text)

        self.assertNotIn("Pass Suspended", response.text, "Unexpected success message for invalid ID")

    @patch("requests.post")
    def test_mocked_pass_renewal(self, mock_post):
        """Mock test for bus pass renewal API."""
        mock_response = unittest.mock.Mock()
        mock_response.status_code = 200
        mock_response.text = "Renewal Successful"
        mock_post.return_value = mock_response

        response = requests.post(BASE_URL + "renew.php", data={"id": "12345", "new_date": "2025-12-31"})

        self.assertEqual(response.status_code, 200)
        self.assertIn("Renewal Successful", response.text)

    @patch("requests.post")
    def test_mocked_pass_suspension(self, mock_post):
        """Mock test for bus pass suspension API."""
        mock_response = unittest.mock.Mock()
        mock_response.status_code = 200
        mock_response.text = "Pass Suspended"
        mock_post.return_value = mock_response

        response = requests.post(BASE_URL + "suspend.php", data={"user_id": "12345"})

        self.assertEqual(response.status_code, 200)
        self.assertIn("Pass Suspended", response.text)

    def test_missing_parameters(self):
        """Test API requests with missing required parameters."""
        response = requests.post(BASE_URL + "renew.php", data={})  # No data provided
        print("\nResponse for missing parameters in renew.php:\n", response.text)
        self.assertNotEqual(response.status_code, 200, "Should return an error for missing data")

        response = requests.post(BASE_URL + "suspend.php", data={})  # No data provided
        print("\nResponse for missing parameters in suspend.php:\n", response.text)
        self.assertNotEqual(response.status_code, 200, "Should return an error for missing data")

if __name__ == "__main__":
    unittest.main()
