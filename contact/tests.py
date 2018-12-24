from django.test import SimpleTestCase

# Create your tests here.


class IndexViewTests(SimpleTestCase):
    # def test_request_home_page(self):
    #     response = self.client.get('/contact')
    #     self.assertContains(response, 'Hello, you can insert your\'s contact data, but we don\'t save it =)',
    #                         status_code=200)

    def test_request_404_page(self):
        response = self.client.get('/add')
        self.assertEqual(response.status_code, 404)
