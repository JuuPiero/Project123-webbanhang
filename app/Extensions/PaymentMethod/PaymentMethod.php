<?php 
namespace App\Extensions\PaymentMethod;

use ReflectionClass;

class PaymentMethod {
    const MOMO = 'MOMO';
    const VNPAY = 'VNPAY';
    const CAST_PAYMENT = 'CAST PAYMENT';
    static function getMethods() {
        $oClass = new ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }

}