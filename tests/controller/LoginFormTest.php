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
            $this->assertSame(1, $crawler->filter('body:contains("article")')->count());
        }



}
?>