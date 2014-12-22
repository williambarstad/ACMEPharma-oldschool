<?php
/**
* @name        contactus.php
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
<h1>Contact Us</h1>

<article>
    <table>
        <tr >
            <td id="sideimg">
                <img src="images/contact_side.jpg">
            </td>
            <td width="100px">
            </td>
            <td valign="top">
                <h3>ACME, INC.</h3>
                2100 Central Ave Ste. 201 <br>
                Boulder, CO  80301 <br>
                303.440.5181<br><br>
                <a href="mailto:usersgroup@ACME.com">Email us!</a>                
            </td>
            <td>
                <p align="center">
                    <img src="images/ACMElogoft.png">
                </p>
            </td>
        </tr>
    </table>
</article>

<?php
include_once INCLUDES.'footer.html';
//echo "Time: ".(microtime(true) - $start)."\n\n";
?>