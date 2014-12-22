<?php
/**
 * @name        agenda.php
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
$page_title = 'ACME Summit 2015 Agenda';
include_once 'includes/mainpre.php';
include_once INCLUDES.'header.html';
?>
<h1>Summit Agenda</h1>
<article> 
    <table>
        <tr>
            <td class="sideimg">
                <img src="images/schedule_side.jpg">
            </td>
            <td>
                <table align="center" id="mtablestatic" summary="Agenda" width="100%">
                <thead>
                    <tr>
                        <th scope="col" width="15%" class="leftcell">Time</th>
                        <th scope="col" width="35%">Topic</th>
                        <th scope="col" width="35%">Speaker</th>
                        <th scope="col" width="15%" class="rightcell">CE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4" class="sessionhead">Wednesday, October 19, 2015</td>
                    </tr>
                    <tr>
                        <td>12:00pm</td>
                        <td>Registration</td>
                        <td></td>
                        <td>N/A</td>
                    <tr>
                        <td>1:00pm</td>
                        <td>Welcome</td>
                        <td>Julia Colavincenzo, RN, CNN & George Rovegno, President, CEO</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>1:15pm</td>
                        <td>Being a Patient Advocate</td>
                        <td>Julia Colavincenzo, RN, CNN</td>
                        <td>60 minutes</td>
                    <tr>
                        <td>2:15pm</td>
                        <td>CQI</td>
                        <td>Dr. Victor Pollak, MD, FACP, FRCPE</td>
                        <td>60 minutes</td>
                    </tr>
                    <tr>
                        <td>3:15pm</td>
                        <td>Break</td>
                        <td></td>
                        <td>N/A</td>
                    <tr>
                        <td>3:45pm</td>
                        <td>Vascular Access Monitoring</td>
                        <td>Joan Camarro Simmard, MS, RN, CNN</td>
                        <td>60 minutes</td>
                    </tr>
                    <tr>
                        <td>4:45pm</td>
                        <td>Wrap up</td>
                        <td>Julia Colavincenzo, RN, CNN</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>5:00pm</td>
                        <td>Hors d’oeurves</td>
                        <td></td>
                        <td>N/A</td>
                    <tr>
                        <td colspan="4" class="sessionhead">Thursday, October 20, 2015</td>
                    </tr>
                    <tr>
                        <td>7:30am</td>
                        <td>Breakfast</td>
                        <td></td>
                        <td>N/A</td>
                    <tr>
                        <td>8:30am</td>
                        <td>Care Plans: Meeting CMS Compliance</td>
                        <td>Joan Camarro Simmard, MS, RN, CNN</td>
                        <td>60 minutes</td>
                    </tr>
                    <tr>
                        <td>8:30am</td>
                        <td>Outcomes Wizard</td>
                        <td>John Mund</td>
                        <td>N/A</td>
                    <tr>
                        <td>9:30am</td>
                        <td>ICD Codes Pertinient for Billing/Tracking the Data</td>
                        <td>Cheryl Steadham</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>9:30am</td>
                        <td>Reports 101</td>
                        <td>Chris Gracen Reeves</td>
                        <td>N/A</td>
                    <tr>
                        <td>10:00am</td>
                        <td>Break</td>
                        <td></td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>10:30am</td>
                        <td>Care Plans: Meeting CMS Compliance</td>
                        <td>Joan Camarro Simmard, MS, RN, CNN</td>
                        <td>60 minutes (repeat)</td>
                    <tr>
                        <td>10:30am</td>
                        <td>Home Program</td>
                        <td>Betty Ringrose, BSN, RN, CNN</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>11:30am</td>
                        <td>ICD Codes Pertinient for Billing/Tracking the Data</td>
                        <td>Cheryl Steadham</td>
                        <td>N/A</td>
                    <tr>
                        <td>11:30am</td>
                        <td>Entering a New Patient</td>
                        <td>Jayci Birkey, BSN, RN</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>12:00pm</td>
                        <td>Lunch</td>
                        <td></td>
                        <td>N/A</td>
                    <tr>
                        <td>1:00pm</td>
                        <td>Home Program</td>
                        <td>Betty Ringrose, BSN, RN, CNN</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>1:00pm</td>
                        <td>Advanced Report Writing </td>
                        <td>John Mund</td>
                        <td>N/A</td>
                    <tr>
                        <td>2:00pm</td>
                        <td>Lab Signs and Symptoms Sets</td>
                        <td>Jayci Birkey, BSN, RN</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>2:00pm</td>
                        <td>MCP Encounters</td>
                        <td>Chris Gracen Reeves</td>
                        <td>N/A</td>
                    <tr>
                        <td>2:30pm</td>
                        <td>Break</td>
                        <td></td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>3:00pm</td>
                        <td>Informal discussion/Q&A</td>
                        <td>Julia Colavincenzo, RN, CNN & Jayci Birkey, BSN, RN</td>
                        <td>N/A</td>
                    <tr>
                        <td>4:00pm</td>
                        <td>Wrap up</td>
                        <td>Julia Colavincenzo, RN, CNN</td>
                        <td>N/A</td>
                    </tr>                    
                    <tr>
                        <td colspan="4" class="sessionhead">Friday, October 21, 2015</td>
                    </tr>
                    <tr>
                        <td>7:30am</td>
                        <td>Breakfast</td>
                        <td></td>
                        <td>N/A</td>
                    <tr>
                        <td>8:30am</td>
                        <td>QAPI</td>
                        <td>Joan Camarro Simmard, MS, RN, CNN</td>
                        <td>60 minutes</td>
                    </tr>
                    <tr>
                        <td>9:30am</td>
                        <td>Features and Enhancements</td>
                        <td>George Rovegno, President, CEO</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>10:30am</td>
                        <td>Break</td>
                        <td></td>
                        <td>N/A</td>
                    <tr>
                        <td>11:00am</td>
                        <td>Survey Prep</td>
                        <td>Julia Colavincenzo, RN, CNN</td>
                        <td>60 minutes</td>
                    </tr>
                    <tr>
                        <td>12:00pm</td>
                        <td>Adjourn</td>
                        <td></td>
                        <td>N/A</td>
                    </tr>
                </tbody>                
                </table>                
            </td>
        </tr>
    </table>
    <p style="font-size:10px; text-align: center;">
        Total possible per participant is 360 minutes/60 minutes = 6 contact hours.
    </p>
</article>
<?php 
include_once INCLUDES.'footer.html';
//echo "Time: ".(microtime(true) - $start)."\n\n";
?>