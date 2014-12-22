<?php
/** 
* @name        thankyou.php 
* @version     0.1
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
*                 AND BUSINESS INNOVATIONS INCORPORATED INTO ACME.COM
*                 ARE THE SOLE PROPERTY OF ACME.COM.
*
*----------------------------------------------------------------*/
$start = microtime(true);
$page_title = '';
include_once 'includes/mainpre.php';
include_once INCLUDES.'header.html';




?>

<h1>Thank you!!</h1>


<?php 
include_once INCLUDES.'footer.html';
//echo "Time: ".(microtime(true) - $start)."\n\n";
?>