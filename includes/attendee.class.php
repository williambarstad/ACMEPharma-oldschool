<?php
/**
 * @category			ATTENDEE METHODS
 */
/**
 * @method			newAttendee
 * @param			attendeeID
 * @return			boolean (true if validation passes, false if not)
 */

function newAttendee ($a) {

    //$aret = false;

    $fn       =   stripinput($_POST['firstname']);//firstname
    $ln       =   stripinput($_POST['lastname']);//lastname
    $sf       =   stripinput($_POST['suffix']); //suffix
    $osf      =   stripinput($_POST['othersuffix']);//othersuffix
    $em       =   stripinput($_POST['email']);//email
    $jt       =   stripinput($_POST['jobtitle']);//jobtitle
    $facname  =   stripinput($_POST['facilityname']);//facilityname
    $facaddr1 =   stripinput($_POST['facilityaddr1']);//facilityaddr1
    $facaddr2 =   stripinput($_POST['facilityaddr2']);//facilityaddr2
    $faccity  =   stripinput($_POST['facilitycity']);//facilitycity
    $facst    =   stripinput($_POST['facilityst']);//facilityst
    $faczip   =   stripinput($_POST['facilityzip']);//faciilityzip
    $facph    =   stripinput($_POST['facilityphone']);//facilityphone

    if (isset($_POST['spkr'])) {
        $spkr = "yes";                  //speaker
    } else {
        $spkr="no";
    }

    if (isset($_POST['session1'])) {
        $sess1 = $_POST['session1'];    //session1
    } else {
        $sess1 = "none";
    }

    if (isset($_POST['session2'])) {
        $sess2 = $_POST['session2'];    //session2
    } else {
        $sess2 = "none";
    }

    if (isset($_POST['session3'])) {
        $sess3 = $_POST['session3'];    //session3
    } else {
        $sess3 = "none";
    }

    if (isset($_POST['session4'])) {
        $sess4 = $_POST['session4'];    //session4
    } else {
        $sess4 = "none";
    }

    if (isset($_POST['session5'])) {
        $sess5 = $_POST['session5'];    //session5
    } else {
        $sess5 = "none";
    }

    if (isset($_POST['session6'])) {
        $sess6 = $_POST['session6'];    //session6
    } else {
        $sess6= "none";
    }

    /*
    $rmchkin  =   stripinput($_POST['roomcheckin']);     //roomcheckin
    $rmchkout =   stripinput($_POST['roomcheckout']);    //roomcheckout

    if (isset($_POST['roomshare'])) {
        $rmshr = stripinput($_POST['roomshare']);    //roomshare
    } else {
        $rmshr= "none";
    }
    
    
    $rmmt     =   stripinput($_POST['roommate']);    //roommate list
    $rmtype   =   stripinput($_POST['roomtype']);    //roomtype
    $rmsmoke  =   stripinput($_POST['roomsmoke']);   //roomsmoke
    $rmspcl   =   stripinput($_POST['roomspcl']);    //roomspcl
    */

    //validation
    $valfn=validFirstname($fn);    
    $valln=validLastname($ln);    
    $valem=validEmail($em);
    
    $aret = ($valfn&&$valln&&$valem);    
    
    if($aret){
        
        // insert csv record
        $csvData = $a . "," . $fn . "," . $ln . "," . $sf . "," . $osf . "," . $em . "," . $jt . "," . $facname;
        $csvData .= "," . $facaddr1 . "," .$facaddr2 . "," . $faccity . "," . $facst . "," . $faczip;
        $csvData .= "," . $facph. "," . $spkr . "," . $sess1 . "," . $sess2 . "," . $sess3;
        $csvData .= "," . $sess4 . "," . $sess5 . "," . $sess6 . "\n";
        /*$csvData .= "," . $rmchkin . "," . $rmchkout . "," . $rmshr . "," . $rmmt . "," . $rmtype . "," . $rmsmoke . "," . $rmspcl . "\n";*/
        
        //var_dump($csvData);
        
                
        if(!$handle = fopen(ATTENDEES."attendees.csv","a")){    //attempt to open file
            $_SESSION['validerrmsg'] = formatError("Cannot open appendable csv file");
            $aret = FALSE;
        } else {
            if (fwrite($handle, $csvData) === FALSE) {    //attempt to write to it.
                $_SESSION['validerrmsg'] = formatError("Cannot write to file (attendees.csv)");
                $aret = FALSE;
            } else {
                $_SESSION['attendeeid'] = $a; 
            }
            fclose($handle);       
        }
        
        if ($aret) {
            redirect(PPINDEX);
        }
    }
    
    return $aret;
}

/**
 * @category			VALIDATION
 */
/**
 * @method   		validFirstname
 * @param  			$fn
 * @return 			$fn, escaped or false
 */
function validFirstname($fn) {
    if (!preg_match("/^[a-zA-Z0-9]{2,16}$/", $fn)) {
        $fn=FALSE;
        echo formatError('Please enter an alphanumeric value for First Name between 2-16 characters.');
    }
    return $fn;
}

/**
 *
 * @method   	validLastname
 * @param  		$lastname
 * @return 		$lastname
 *
 */
function validLastname($ln) {
    if (!preg_match("/^[a-zA-Z0-9]{2,50}$/", $ln)) {
        $ln=FALSE;
        echo formatError('Please enter an alphanumeric value for Last Name between 2-50 characters.');
        //$_SESSION['validerrmsg'] = 'Please enter an alphanumeric value for Last Name between 2-50 characters.';        
    }
    return $ln;
}

/**
 *
 * @method	    validEmail($email): Validates email entries IAW RFC 2822
 * @param    	$email
 * @return   	$email
 *
 */
function validEmail($em) {
    $atIndex = strrpos($em, "@");
    if (is_bool($atIndex) && !$atIndex) {
        $em = FALSE;        
    } else {
        $domain = substr($em, $atIndex+1);
        $local = substr($em, 0, $atIndex);
        $localLen = strlen($local);
        $domainLen = strlen($domain);
        if ($localLen < 1 || $localLen > 64) {
            // local part length exceeded
            $em = FALSE;
        } else if ($domainLen < 1 || $domainLen > 255) {
            // domain part length exceeded
            $em = FALSE;
        } else if ($local[0] == '.' || $local[$localLen-1] == '.') {
            // local part starts or ends with '.'
            $em = FALSE;
        } else if (preg_match('/\\.\\./', $local)) {
            // local part has two consecutive dots
            $em = FALSE;
        } else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
            // character not valid in domain part
            $em = FALSE;
        } else if (preg_match('/\\.\\./', $domain)) {
            // domain part has two consecutive dots
            $em = FALSE;
        } else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local))) {
            // character not valid in local part unless
            // local part is quoted
            if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local))) {
                $em = FALSE;
            }
        }
        /**
         * @todo: create dns black list
         */
    }
    if (!$em) {
        echo formatError('Email address is not the standard format [example@domain.com]');
    }

    return $em;
}

?>