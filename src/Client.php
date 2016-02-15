<?php
namespace Simplia\Opineo;

use GuzzleHttp\Psr7\Request;
use Simplia\Opineo\Entity\Order;

class Client {
    protected $login, $password;

    function __construct($login, $password) {
        $this->setLogin($login);
        $this->setPassword($password);
    }

    public function createRequest(Order $order) {
        $query = [
            'type' => 'php',
            'email' => $order->getEmail(),
            'login' => $this->getLogin(),
            'pass' => $this->getPassword(),
            'queue' => $order->getWaitDays(),
            'order_no' => $order->getCode(),
        ];
        $products = [];
        foreach ($order->getProducts() as $product) {
            $productData = [];
            if(!empty($product->getBrand())) {
                $productData['opi_product_firm'] = $product->getBrand();
            }
            if(!empty($product->getName())) {
                $productData['opi_product_name'] = $product->getName();
            }
            if(!empty($product->getCode())) {
                $productData['opi_product_id'] = $product->getCode();
            }
            $products[] = $productData;
        }
        return new Request(
            'POST',
            'http://www.wiarygodneopinie.pl/gate.php?' . http_build_query($query),
            ['Content-Type' => 'application/x-www-form-urlencoded'],
            http_build_query(['products' => json_encode($products)])
        );
    }

    /**
     * @return string
     */
    protected function getLogin() {
        return $this->login;
    }

    /**
     * @param string $login
     * @return Client
     */
    protected function setLogin($login) {
        $this->login = $login;
        return $this;
    }

    /**
     * @return string
     */
    protected function getPassword() {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Client
     */
    protected function setPassword($password) {
        $this->password = $password;
        return $this;
    }

}