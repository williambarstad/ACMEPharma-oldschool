<?php
/** 
* @name        pp.php 
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
$page_title = 'PP';
include_once 'includes/header.html';

// get the passed identifier
$a=$_SESSION['attendeeid'];

$totalFees="50.00";

?>

<h1>
    Almost finished...
</h1>   
    <article> 
    <table>
        <tr>
            <td class="sideimg">
                <img src="images/registration_side.jpg">
            </td>
            <td>
                <h3>Thank You!</h3>
                <p>
                    <br>Your registration information has been submitted. An email is being sent to you acknowledging receipt of this registration information. 
                    <br>
                    <br>The total amount due to complete your registration is $100.00.
                    <br> 
                    <br>Please click the PayPal button below to make your payment.<br>
                </p>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="">
                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>                                
            </td>
        </tr>
    </table> 
    </article>   
<?php 

include_once 'includes/footer.html';
//echo "Time: ".(microtime(true) - $start)."\n\n";
?>