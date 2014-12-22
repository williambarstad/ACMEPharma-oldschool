<?php
/**
*   @name     	index.php - summit home
*   @version	0.1
*
*------------------------------------------------------------------
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
$page_title = 'ACME Summit 2015 Home';
include_once 'includes/mainpre.php';
include_once INCLUDES.'header.html';

?>
<h1>Bundling in the Big Easy!</h1>
<article>
    <table>
        <tr>
            <td class="sideimg"><img src="images/welcome_side.jpg">
            </td>
            <td valign="top">
                <h3>Join ACME in New Orleans!</h3>
                <a href="register.php">REGISTER NOW</a> to attend a three-day symposium with ACME developers and trainers in New Orleans!
                <table>                    
                    <tr valign="top">
                        <td>
                            <div class="rotator">
                                  <ul>
                                        <li class="show">
                                            <a href="javascript:void(0)">
                                            <img src="images/no1.jpg" width="500" height="313"  alt="pic1" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                            <img src="images/no2.jpg" width="500" height="313"  alt="pic2" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                            <img src="images/no3.jpg" width="500" height="313"  alt="pic3" />
                                            </a>
                                        </li>                                
                                  </ul>
                            </div>
                        </td>                    
                    </tr>
                    <tr valign="top">
                        <td>                                                   
                            <h3>Purpose:</h3> 
                                Enable nurses to increase knowledge and expand utilization EMR system                            
                            <h3>Objectives:</h3>
                            <ul>
                                <li>Identify strategies to improve patient advocacy skills</li>
                                <li>Demonstrate key elements of CQI in the dialysis setting</li>
                                <li>Distinguish clinical and documentation data in association with payment variables for vascular access in the dialysis setting</li>
                                <li>Differentiate clinical processes for required documentation to improve careplans and meet conditions for coverage</li>
                                <li>Examine the process and variables for current and future QAPI</li>
                                <li>Discuss important aspects to ensure a successful CMS survey</li>
                            </ul>                        
                        </td>
                    </tr>                    
                </table>            
            </td>        
        </tr>
    </table>
    <div id="CEU">
        <ul>
            <li>This activity has been submitted to the Ohio Nurses Association (OBN-001-91) for approval to award contact hours. The Ohio Nurses Association is accredited as an approver of continuing nursing education by the American Nurses Credentialing Center’s Commission on Accreditation.</li>
            <li>Please call Connie Dagg, MSN, RN-BC at 419-557-7290 for more information about contact hours.</li>
            <li>The faculty and planning committee have declared no conflict of interest</li>
            <li>Criteria for successful completion includes attending the entire session and turning in an evaluation form</li>
            <li>There is no commercial support but there is sponsorship for this event</li>
            <li>Special thanks given to our sponsor ACME, Inc. for providing meeting rooms, hors d’oeuvres Wednesday, Oct 19th, breakfast and lunch Thursday, Oct. 20th, and breakfast on Friday, Oct. 21st for this activity.</li>
        </ul>
    </div>
</article>
<?php
//phpinfo();
include_once INCLUDES.'footer.html';
//echo "Time: ".(microtime(true) - $start)."\n\n";
?>
