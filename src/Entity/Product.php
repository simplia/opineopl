<?php
namespace Simplia\Opineo\Entity;

class Product {
    /**
     * @var string
     */
    protected $brand;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $code;

    /**
     * @return string
     */
    public function getBrand() {
        return $this->brand;
    }

    /**
     * @param string $brand
     * @return Product
     */
    public function setBrand($brand) {
        $this->brand = $brand;
        return $this;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName($name) {
        $this->name = $name;
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
     * @return Product
     */
    public function setCode($code) {
        $this->code = $code;
        return $this;
    }

}