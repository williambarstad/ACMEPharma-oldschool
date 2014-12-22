<?php
/**
 * @name         hotels.php - hotels listing
 * @version      0.1
 *
 *------------------------------------------------------------------
 *
 *    ACME, INC.
 *
 *    http://ACMEPHARMA.skoonch.com
 *
 *    @author      wbarstad
 *    @since       Aug 31, 2015
 *    @copyright   ©2015 ACME, INC.
 *    @license     ALL IDEAS, CONCEPTS, SYSTEMS, GRAPHICS, INTERFACES
 *                  AND BUSINESS INNOVATIONS INCORPORATED INTO ACME.COM
 *                  ARE THE SOLE PROPERTY OF ACME.COM.
 *
 *----------------------------------------------------------------*/
$start = microtime(true);
$page_title = 'ACME Summit 2015, Hotel List';
include_once 'includes/mainpre.php';
include_once INCLUDES.'header.html';
?>

<table width="775" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td valign="top" width="50" height="308">
            <p>
                <img src="images/hotels_sides.jpg" width="50" height="350">
            </p>
        </td>
        <td width="522" valign="top" height="308">
            <p class="paragraphtext">
                <br> 
                <span class="pageheadings">
                    <font color="b11a3b">Hotel information</font>
                </span>
            </p>
            <p class="paragraphtext">
                <table width='722' border='0'>
                    <tr>
                        <td align='left'>
                            <img src="images/hotel.JPG" width="265" height="559" alt="" style='border: 1px solid black'>
                        </td>
                        <td>&nbsp;&nbsp;</td>
                        <td valign='top'>
                            <a href='http://www.bourbonorleans.com/' target='_new'>
                                <b>Bourbon Orleans Hotel</b>
                            </a>
                            <br>
                            717 Orleans Street
                            <br>
                            New Orleans, LA 70116
                            <br>
                            504-523-2222 <br> 
                            <!--Phone 407.827.6542  <br>Fax 407.827.6314<br>-->
                            <br> Meeting Dates:<br>
                            Check in October 19, 2015<br>
                            Meeting October 19, 20 & 21,
                            2015 <br>
                            <br> ACME has obtained a
                            special room rate of $119 per
                            night ($179 Friday night) for
                            this event.<br>
                            <br> To get this special rate
                            you will need register through
                            this site.<br> Click 
                            <a href="http://summit.ACME.com/registration.htm">here</a>
                            to register now. <br>
                            <br>
                            <br> See the hotel's site for 
                            <a href='http://www.bourbonorleans.com/french-quarter-hotel-location.php' target='_new'>directions</a> and
                            <a href='http://www.bourbonorleans.com/services-amenities.php' target='_new'>information</a>.
                        </td>
                    </tr>
                </table>
            </p> 
            <br>
            <br>
        </td>
     </tr>
</table>

<?php
include_once INCLUDES.'footer.html';
//echo "Time: ".(microtime(true) - $start)."\n\n";
?>