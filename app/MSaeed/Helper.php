<?php

namespace App\MSaeed;


class Helper
{

    public static function decrypt($string){

        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key =  'hafizGAmirGWasimG';
        $secret_iv = '@@_hJ%5Xkm48HU7eWem&gbPRm+=qs8bw';
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        return $output;

    }

    public static function encrypt($string){
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'hafizGAmirGWasimG';
        $secret_iv = '@@_hJ%5Xkm48HU7eWem&gbPRm+=qs8bw';
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        return base64_encode($output);
    }

}



