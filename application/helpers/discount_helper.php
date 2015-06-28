<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('calculateDiscount') ) {
    
    function calculateDiscount ( $totalQuantity, $totalPrice, $isAffiliate ) {
        
        $discountObj = new stdClass();
        
        $discountRate = 0;
        
        if ( $isAffiliate ) {
            if ( $totalQuantity == 1 ) {
                $discountRate = 10;
            } else if ( $totalQuantity <= 3 ) {
                $discountRate = 20;
            } else if ( $totalQuantity > 3 ) {
                $discountRate = 25;
            }
        } else {
            if ( $totalQuantity > 1 && $totalQuantity <= 3 ) {
                $discountRate = 10;
            } else if ( $totalQuantity > 3 ) {
                $discountRate = 20;
            }
        }
        
        $discount = ($totalPrice * $discountRate) / 100;
        
        $discountObj->rate = $discountRate;
        $discountObj->discount = $discount;
        
        //return $discount;
        return $discountObj;
    }
}