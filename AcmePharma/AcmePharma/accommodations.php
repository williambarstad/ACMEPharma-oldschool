<?php
/** 
 * @name        accommodations.php 
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
 *                 AND BUSINESS INNOVATIONS INCORPORATED INTO skoonch.com
 *                 ARE THE SOLE PROPERTY OF skoonch.com.
 *
 *----------------------------------------------------------------*/
 
$start = microtime(true);
$page_title = 'ACME 2015 Summit Accommodations';
include_once 'includes/mainpre.php';
include_once INCLUDES.'header.html';
?>

<h1>Recommended Accommodations in New Orleans</h1>

<article>
    <table>
        <tr>
            <td colspan="4">
                <p>
                    <h2>ACMEPharma User Group Meeting attendees are being offered the following special room rates from <b>The Bourbon Orleans Hotel</b>.</h2>
                </p>                
            </td>
        </tr>
        <tr>
            <td class="sideimg">
                <img src="images/hotels_sides.jpg">
            </td>            
            <td valign="top">
                <p>
                    <br>
                    <a href="http://www.bourbonorleans.com/" target="_blank"><h3>The Bourbon Orleans Hotel</h3></a>
                    <h4>717 Orleans Street<br>New Orleans, LA 70116<br>504-523-2222</h4>
                    Special Rates:<br>
                    Wednesday, October 19: $119.00<br>
                    Thursday, October 20:  $119.00<br>
                    Friday, Ocotober 21:   $179.00<br><br>
                    Be sure to mention that you are attending the ACME Users Group Meeting.
                </p>
            </td>
            <td class="sideimg">
                <p>
                    <img src="images/boh_logo.JPG" width="150px">
                </p>
            </td>
            <td class="sideimg">                
                <p>
                    <img src="images/hotel.JPG" width="200px" >
                </p>
            </td>
        </tr>
    </table>    
</article>

<?php 
include_once INCLUDES.'footer.html';
//echo "Time: ".(microtime(true) - $start)."\n\n";
?>