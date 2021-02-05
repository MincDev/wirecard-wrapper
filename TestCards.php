<?php

namespace Wrapper;

use Wrapper\Objects\Card;

class TestCards 
{
    public static function visaNon3DSecure($successful = true): Card
    {
        $year = date('Y', strtotime("+2 years"));
        
        if ($successful) {
            return new Card('Joe Soap', '4111111111111111', '09', $year, '123');
        } else return new Card('Joe Soap', '4242424242424242', '09', $year, '123');
    }

    public static function visa3DSecure($successful = true): Card
    {
        $year = date('Y', strtotime("+2 years"));
        
        if ($successful) {
            return new Card('Joe Soap', '4000000000000002', '09', $year, '123');
        } else return new Card('Joe Soap', '4000000000000010', '09', $year, '123');
    }

    public static function mastercard3DSecure($successful = true): Card 
    {
        $year = date('Y', strtotime("+2 years"));
        
        if ($successful) {
            return new Card('Joe Soap', '5200000000000007', '09', $year, '123');
        } else return new Card('Joe Soap', '5200000000000023', '09', $year, '123');
    }

    public static function mastercardNon3DSecure($successful = true): Card 
    {
        $year = date('Y', strtotime("+2 years"));

        if ($successful) {
            return new Card('Joe Soap', '5100080000000000', '09', $year, '123');
        } else return new Card('Joe Soap', '5404000000000001', '09', $year, '123');
    }

    public static function amexNon3DSecure($successful = true): Card 
    {
        $year = date('Y', strtotime("+2 years"));

        if ($successful) {
            return new Card('Joe Soap', '370000200000000', '09', $year, '123');
        } else return new Card('Joe Soap', '374200000000004', '09', $year, '123');
    }

    public static function dinersNon3DSecure($successful = true): Card 
    {
        $year = date('Y', strtotime("+2 years"));

        if ($successful) {
            return new Card('Joe Soap', '36135005437019', '09', $year, '123');
        } else return new Card('Joe Soap', '36135182434011', '09', $year, '123');
    }

    public static function maestroNon3DSecure($successful = true): Card 
    {
        $year = date('Y', strtotime("+2 years"));

        if ($successful) {
            return new Card('Joe Soap', '5641821111166669', '09', $year, '123');
        } else return new Card('Joe Soap', '6759411100000008', '09', $year, '123');
    }
}