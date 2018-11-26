from django.test import SimpleTestCase

# Create your tests here.


class IndexViewTests(SimpleTestCase):
    def test_request_home_page(self):
        response = self.client.get('/')
        self.assertContains(response, 'Hello, world!', status_code=200)

    def test_request_404_page(self):
        response = self.client.get('/admin')
        self.assertEqual(response.status_code, 404)
