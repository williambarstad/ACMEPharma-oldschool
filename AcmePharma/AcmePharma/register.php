<?php
/**
* @name        registration.php
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
$page_title = 'ACME 2015 Summit Registration';
include_once 'includes/mainpre.php';
include_once INCLUDES.'header.html';


if (isset($_POST['submit'])) {
    
    $a = uniqid("Summit2015_");
    
    newAttendee($a);
    
    if (isset($_SESSION['validerrmsg'])) {
        $err = $_SESSION['validerrmsg'];
        echo formatError($err . ' Please try again.');
        unset($_SESSION['validerrmsg']);
    }
}

?>

<h1>ACME 2015 Summit Registration</h1>

<article>
<h2>Enter only once for each attendee.</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table>
        <tr>
            <td class="sideimg">
                <img src="images/registration_side.jpg">
            </td>
            <td>
                <fieldset>
                    <h4>Personal Details</h4>
                    <p>
                        First Name:<br> <input type="text" name="firstname" autofocus required size="15" maxlength="15" value="<?php  if (isset($_POST['firstname'])) echo $_POST['firstname']; ?>" /> <br> 
                        Last Name: <br> <input type="text" name="lastname" required size="50" maxlength="50" value="<?php  if (isset($_POST['lastname'])) echo $_POST['lastname']; ?>" /> 
                        Suffix: 
                        <select name="suffix">
                            <option value="" selected="selected">None</option>
                            <option value="M.D.">M.D.</option>
                            <option value="RN">RN</option>
                            <option value="LPN">LPN</option>
                            <option value="RD">RD</option>
                            <option value="SW">SW</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Technician">Technician</option>
                            <option value="Other">Other</option>
                        </select> 
                        <input type="text" name="othersuffix" maxlength=20 placeholder="Other" value="<?php  if (isset($_POST['othersuffix'])) echo $_POST['othersuffix']; ?>" /> <br> 
                        
                        Email Address:<br> <input type="email" name="email" required size="80" maxlength="80" placeholder="ex. 'your@address.com'" value="<?php  if (isset($_POST['email'])) echo $_POST['email']; ?>" /> <br> 
                        
                        Job Title:<br> <input type="text" name="jobtitle" size="50" maxlength="50" placeholder="ex. 'Director of Nurses'" value="<?php  if (isset($_POST['jobtitle'])) echo $_POST['jobtitle']; ?>" />
                    </p>
                    <p>
                        Facility Name:<br> <input type="text" required name="facilityname" size="50" maxlength="50" value="<?php  if (isset($_POST['facilityname'])) echo $_POST['facilityname']; ?>" /> <br> 
                        Facility Addr. 1:<br> <input type="text" name="facilityaddr1" size="50" maxlength="50" value="<?php  if (isset($_POST['facilityaddr1'])) echo $_POST['facilityaddr1']; ?>" /> <br> 
                        Facility Addr. 2:<br> <input type="text" name="facilityaddr2" size="50" maxlength="50" value="<?php  if (isset($_POST['facilityaddr2'])) echo $_POST['facilityaddr2']; ?>" /> <br> 
                        City:<br> <input type="text" name="facilitycity" size="50" maxlength="50" value="<?php  if (isset($_POST['facilitycity'])) echo $_POST['facilitycity']; ?>" /> 
                        St/Prov: <input type="text" name="facilityst" size="2" maxlength="2" value="<?php  if (isset($_POST['facilityst'])) echo $_POST['facilityst']; ?>" /> 
                        Zip: <input type="text" name="facilityzip" size="10" maxlength="10" value="<?php  if (isset($_POST['facilityzip'])) echo $_POST['facilityzip']; ?>" /> <br>
                        Facility Phone:<br> <input type="tel" name="facilityphone" placeholder="ex. 3035551212" value="<?php  if (isset($_POST['facilityphone'])) echo $_POST['facilityphone']; ?>" /> 
                    </p>                    
                    <p>
                        Speaker? <input type="checkbox" name="spkr" value="yes" />
                    </p>
                    <br>
                    
                    <h4>Select Breakout Sessions for Thursday, October 20</h4>
                    <table id="mtable" summary="Breakout Sessions">
                        <thead>
                            <tr>
                                <th scope="col" class="leftcell">Session</th>
                                <th scope="col">Presenter</th>
                                <th scope="col">Level</th>
                                <th scope="col" class="rightcell">Attend?</th>
                            </tr>
                        </thead>                                                
                        <tbody>
                            <tr>
                                <td colspan="4" class="sessionhead">Session 1: 8:30am-9:30am</td>
                            </tr>
                            <tr>
                                <td>Care Plans: Meeting CMS Compliance</td>
                                <td>Joan Camarro Simard, MS, RN, CNN</td>
                                <td>All</td>
                                <td><input type="radio" name="session1" value="careplans1"></td>
                            <tr>
                                <td>Outcomes Wizard</td>
                                <td>John Mund</td>
                                <td>Beginner</td>
                                <td><input type="radio" name="session1" value="outcomes"></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="sessionhead">Session 2: 9:30am-10:30am</td>
                            </tr>
                            <tr>
                                <td>ICD Codes Pertinient for Billing/Tracking the Data</td>
                                <td>Cheryl Steadham</td>
                                <td>All</td>
                                <td><input type="radio" name="session2" value="va1"></td>
                            <tr>
                                <td>Report writing and editing (Reports 101)</td>
                                <td>Chris Gracen Reeves</td>
                                <td>Beginner</td>
                                <td><input type="radio" name="session2" value="reports1"></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="sessionhead">Session 3: 10:30am-11:30am</td>
                            </tr>
                            <tr>
                                <td>Care Plans: Meeting CMS Compliance</td>
                                <td>Joan Camarro Simard, MS, RN, CNN</td>
                                <td>All</td>
                                <td><input type="radio" name="session3" value="careplans2"></td>
                            <tr>
                                <td>Home Program</td>
                                <td>Betty Ringrose, BSN, RN, CNN</td>
                                <td>All</td>
                                <td><input type="radio" name="session3" value="homeprog1"></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="sessionhead">Session 4: 11:30am-12:00pm</td>
                            </tr>
                            <tr>
                                <td>ICD Codes Pertinient for Billing/Tracking the Data</td>
                                <td>Cheryl Steadham</td>
                                <td>All</td>
                                <td><input type="radio" name="session4" value="va2"></td>
                            <tr>
                                <td>Entering a New Patient</td>
                                <td>Jayci Birkey, BSN, RN</td>
                                <td>Beginner/Refresher</td>
                                <td><input type="radio" name="session4" value="newpatiententry"></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="sessionhead">Session 5: 1:00-2:00pm</td>
                            </tr>
                            <tr>
                                <td>Home Program</td>
                                <td>Betty Ringrose, BSN, RN, CNN</td>
                                <td>All</td>
                                <td><input type="radio" name="session5" value="homeprog2"></td>
                            <tr>
                                <td>Advanced Report Writing</td>
                                <td>John Mund</td>
                                <td>Advanced</td>
                                <td><input type="radio" name="session5" value="reports2"></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="sessionhead">Session 6: 2:00pm-3:00pm</td>
                            </tr>
                            <tr>
                                <td>Lab/Signs & Symptom sets</td>
                                <td>Jayci Birkey, BSN, RN</td>
                                <td>Beginner</td>
                                <td><input type="radio" name="session6" value="sands"></td>
                            <tr>
                                <td>MCP encounters</td>
                                <td>Chris Gracen Reeves</td>
                                <td>Beginner/Refresher</td>
                                <td><input type="radio" name="session6" value="encounters"></td>
                            </tr>
                        </tbody>
                    </table> 
                    <p style="font-size:10px; text-align: center;">
                       Total possible per participant is 360 minutes/60 minutes = 6 contact hours.
                    </p>                   
                    <!-- 
                    <br>
                    <h4>Hotel Accommodation Preferences</h4>
                    <p>
                        Check-In Date:<br><input type="text" id="dpin" name="roomcheckin" placeholder="ex. 19/10/2015" value="<?php if (isset($_POST['checkin'])) echo $_POST['checkin']; ?>"/><br>
                        Check-Out Date:<br><input type="text" id="dpout" name="roomcheckout" placeholder="ex. 22/10/2015" value="<?php if (isset($_POST['checkout'])) echo $_POST['checkout']; ?>"/>
                    </p> 
                    <p>
                        Sharing a room? <input type="checkbox" name="roomshare" value="<?php if (isset($_POST['roomshare'])) echo $_POST['roomshare']; ?>"/>
                        With whom (list all)? <input type="text" name="roommate" size="50" maxlength="150" value="<?php if (isset($_POST['roommate'])) echo $_POST['roommate']; ?>"/>
                    </p>                        
                    <p>
                        Room Type: <input type="radio" name="roomtype" value="twodouble" checked="checked">two double beds</input> <input type="radio" name="roomtype" value="oneking">one king bed</input><br>
                        Preference: <input type="radio" name="roomsmoke" value="smoking">smoking</input> <input type="radio" name="roomsmoke" value="nosmoke" checked="checked">non-smoking</input>
                    </p>
                    <p>
                        Special needs: <input type="text" name="roomspcl" size="50" maxlength="150" value="<?php if (isset($_POST['roomspcl'])) echo $_POST['roomspcl']; ?>"/>
                    </p>
                     -->
                </fieldset>
                
            </td>
        </tr>
    </table>
    <p id="regtext">
        This year's registration fee is <b>$100.00</b>. <br>
        After clicking the Register button, you will be redirected to PayPal <br>
        to complete the payment section of the registration process.  
    </p>
    <input type="submit" name="submit" value="Register" id="regsubmit"/>
</form>
</article>

<?php
    //phpinfo();
    include_once INCLUDES.'footer.html';
    //echo "Time: ".(microtime(true) - $start)."\n\n";
?>