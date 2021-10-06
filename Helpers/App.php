<?php

namespace Wrapper\Helpers;

use Throwable;

class App 
{
    public function toXML($array, $rootElement = null, $xml = null) { 
        $_xml = $xml; 
          
        // If there is no Root Element then insert root 
        if ($_xml === null) { 
            $_xml = new \SimpleXMLElement($rootElement !== null ? $rootElement : '<root/>'); 
        } 
          
        // Visit all key value pair 
        foreach ($array as $k => $v) { 
              
            // If there is nested array then 
            if (is_array($v)) {  
                  
                // Call function for nested array 
                $this->toXML($v, $k, $_xml->addChild($k)); 
            } 
                  
            else { 
                  
                // Simply add child element.  
                $_xml->addChild($k, $v); 
            } 
        } 
          
        return str_replace("<?xml version=\"1.0\"?>", "", $_xml->asXML()); 
    } 

    public function getIpAddress(): string
    {
        try {
            $externalContent = @file_get_contents('http://checkip.dyndns.com/');
            preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent ?? "", $m);
            return $m[1] ?? $_SERVER['REMOTE_ADDR'];
        } catch (Throwable $ex) {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    public function initializeSoapClient($WSDL, $KeyCert = "", $Location = "") {
			
        $Context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ]);
        
        $Options = array('trace' 				=> 1,
                         'exceptions'  			=> true,
                         'cache_wsdl' 			=> WSDL_CACHE_NONE,
                         'soap_version' 		=> SOAP_1_1,
                         'stream_context' 		=> $Context,
                         'keep_alive' 			=> true,
                         'connection_timeout'	=> 5000,
                         'location' 			=> !empty($Location) ? $Location : $WSDL);
        
        if (!empty($KeyCert)) {
            $Options['local_cert']	= $KeyCert;
        }
        
        if (!class_exists('SoapClient')) {
            throw new \Exception('The call returned the following error: The SOAP module is not installed');
        }
        
        try {
            return new \SoapClient($WSDL, $Options);
        } catch (\SoapFault $fault) {
            throw new \Exception('The call returned the following error: '.$fault->faultstring);
        }
    }
}