<?php
/**
 * @name        breakout.php
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
$page_title = 'ACME 2015 Summit Breakout Sessions';
include_once 'includes/mainpre.php';
include_once INCLUDES.'header.html';
?>
<h1>Breakout Session Schedule</h1>
<article>
<table>
    <tr>
        <td class="sideimg">
            <img src="images/events_side.jpg">
        </td>
        <td>
            <table align="center" id="mtablestatic" summary="Breakout Sessions">
                <thead>
                    <tr>
                        <th scope="col" class="leftcell" width="40%">Session</th>
                        <th scope="col" width="40%">Presenter</th>
                        <th scope="col" width="20%" class="rightcell">Level</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3" class="sessionhead">Session 1: 8:30am-9:30am</td>
                    </tr>
                    <tr>
                        <td>Care Plans: Meeting CMS Compliance</td>
                        <td>Joan Camarro Simard, MS, RN, CNN</td>
                        <td>All</td>
                    <tr>
                        <td>Outcomes Wizard</td>
                        <td>John Mund</td>
                        <td>Beginner</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="sessionhead">Session 2: 9:30am-10:30am</td>
                    </tr>
                    <tr>
                        <td>ICD Codes Pertinient for Billing/Tracking the Data</td>
                        <td>Cheryl Steadham</td>
                        <td>All</td>
                    <tr>
                        <td>Report writing and editing (Reports 101)</td>
                        <td>Chris Gracen Reeves</td>
                        <td>Beginner</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="sessionhead">Session 3: 10:30am-11:30am</td>
                    </tr>
                    <tr>
                        <td>Care Plans: Meeting CMS Compliance</td>
                        <td>Joan Camarro Simard, MS, RN, CNN</td>
                        <td>All</td>
                    <tr>
                        <td>Home Program</td>
                        <td>Betty Ringrose, BSN, RN, CNN</td>
                        <td>All</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="sessionhead">Session 4: 11:30am-12:00pm</td>
                    </tr>
                    <tr>
                        <td>ICD Codes Pertinient for Billing/Tracking the Data</td>
                        <td>Cheryl Steadham</td>                        
                        <td>All</td>
                    <tr>
                        <td>Entering a New Patient</td>
                        <td>Jayci Birkey, BSN, RN</td>
                        <td>Beginner/Refresher</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="sessionhead">Session 5: 1:00-2:00pm</td>
                    </tr>
                    <tr>
                        <td>Home program documentation/billing</td>
                        <td>Betty Ringrose, BSN, RN, CNN</td>
                        <td>All</td>
                    <tr>
                        <td>Advanced Report Writing</td>
                        <td>John Mund</td>
                        <td>Advanced</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="sessionhead">Session 6: 2:00pm-3:00pm</td>
                    </tr>
                    <tr>
                        <td>Lab/Signs & Symptom sets</td>
                        <td>Jayci Birkey, BSN, RN</td>
                        <td>Beginner</td>
                    <tr>
                        <td>MCP Encounters</td>
                        <td>Chris Gracen Reeves</td>
                        <td>Beginner/Refresher</td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
</article>
<?php
include_once INCLUDES.'footer.html';
//echo "Time: ".(microtime(true) - $start)."\n\n";
?>