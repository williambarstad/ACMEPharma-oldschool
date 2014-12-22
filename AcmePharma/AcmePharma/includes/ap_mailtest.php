<?php
/** 
 * @name     	ap_mailtest.php - required functions and attributes
 * @version		0.1
 * 
 *------------------------------------------------------------------
 *    
 *    ACMEPharma Example
 *    Summit Meeting Registration Application (SMRA)
 *
 *    http://ACMEPHARMA.skoonch.com
 *
 *    @author      William Barstad
 *    @since       20141203
 *    @copyright   ©2015 SKOONCH.COM
 *    @license     ALL IDEAS, CONCEPTS, SYSTEMS, GRAPHICS, INTERFACES
 *                 AND BUSINESS INNOVATIONS INCORPORATED INTO skoonch.com
 *                 ARE THE SOLE PROPERTY OF skoonch.com.
 *
 *
 *----------------------------------------------------------------*/
    echo "Start mail test...<br>";
    flush();
    require_once("lib/ap_mail.php");
    if(ap_sendMail("me@ACMEPharma.com","summitinfo@ACMEPharma.com","testMessage","AP Mail testing")){
        echo "SUCCESS.<br>";
    }else 
        echo "FAILED.<br>";
?>