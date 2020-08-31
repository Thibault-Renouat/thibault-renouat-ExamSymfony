<?php
namespace App\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
class ArticleFormTest extends WebTestCase
{


        public function testLoginForm()
        {
            $client = static::createClient();
            $client->request('GET', '/login');
            $crawler = $client->submitForm('Sign in', [
                'email' => 'admin@admin.com',
                'password' => 'admin']);
            $this->assertPageTitleContains('Tous les articles');

        }
        public function testloginPage()
        {
            $client = static::createClient();
            $client->request('GET', '/login');
            $this->assertEquals(200, $client->getResponse()->getStatusCode());
        }



}
?>