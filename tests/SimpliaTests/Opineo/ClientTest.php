<?php
namespace OpineoTests;

use Simplia\Opineo\Client;
use Simplia\Opineo\Entity\Order;
use Simplia\Opineo\Entity\Product;

class ClientTest extends \PHPUnit_Framework_TestCase {
    function testRequest() {
        $order = new Order();
        $order
            ->setCode('abc')
            ->setEmail('info@example.org')
            ->setWaitDays(3)
            ->addProduct((new Product())
                ->setName('test')
                ->setCode(789));
        $client = new Client('abc', 'pass');

        $request = $client->createRequest($order);

        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('http://www.wiarygodneopinie.pl/gate.php?type=php&email=info%40example.org&login=abc&pass=pass&queue=3&order_no=abc', $request->getUri());
        $this->assertEquals('products=%5B%7B%22opi_product_name%22%3A%22test%22%2C%22opi_product_id%22%3A789%7D%5D', (string)$request->getBody());
    }
}