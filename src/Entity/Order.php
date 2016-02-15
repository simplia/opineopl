<?php
namespace Simplia\Opineo\Entity;

class Order {
    /**
     * @var string
     */
    protected $email;
    /**
     * @var string
     */
    protected $code;
    /**
     * @var int
     */
    protected $waitDays = 5;
    /**
     * @var Product[]
     */
    protected $products;

    /**
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Order
     */
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Order
     */
    public function setCode($code) {
        $this->code = $code;
        return $this;
    }

    /**
     * @return int
     */
    public function getWaitDays() {
        return $this->waitDays;
    }

    /**
     * @param int $waitDays
     * @return Order
     */
    public function setWaitDays($waitDays) {
        $this->waitDays = $waitDays;
        return $this;
    }

    /**
     * @return Product[]
     */
    public function getProducts() {
        return $this->products;
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
        return $this;
    }
}