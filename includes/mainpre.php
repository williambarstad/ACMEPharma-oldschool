<?php
/** 
 * @name     	mainpre.php - required functions and attributes
 * @version		0.1
 * 
  *------------------------------------------------------------------
 *    
 *		ACME, INC.
 *    
 *		http://ACMEPHARMA.skoonch.com
 *
 *    @author		William Barstad
 *    @since		Aug 31, 2015
 *    @copyright	©2015 ACME, INC.
 *    @license     ALL IDEAS, CONCEPTS, SYSTEMS, GRAPHICS, INTERFACES 
 *                  AND BUSINESS INNOVATIONS INCORPORATED INTO ACME.COM 
 *                  ARE THE SOLE PROPERTY OF ACME.COM.
 *
 *----------------------------------------------------------------*/

// Keeps this script from being accessed directly. It can only be included
if (preg_match("/mainpre.php/i", $_SERVER['PHP_SELF'])) { die(); }

// Prevent any possible XSS attacks via $_GET.
if (stripget($_GET)) {
	die("XSS/GET attack: DENIED.");
}

/**
 * @category			PATH DEFINITIONS
 */
define("BASEDIR", "./");
define("IMAGES", BASEDIR."images/");
define("INCLUDES", BASEDIR."includes/");
define("ATTENDEES", BASEDIR."attendees/");

/**
 * @category			SANITIZE GLOBALS
 */
$_SERVER['PHP_SELF'] = cleanurl($_SERVER['PHP_SELF']);
$_SERVER['QUERY_STRING'] = isset($_SERVER['QUERY_STRING']) ? cleanurl($_SERVER['QUERY_STRING']) : "";
$_SERVER['REQUEST_URI'] = isset($_SERVER['REQUEST_URI']) ? cleanurl($_SERVER['REQUEST_URI']) : "";
$PHP_SELF = cleanurl($_SERVER['PHP_SELF']);

/**
 * @category			COMMON DEFINITIONS
 */
define("MQ_GPC", (ini_get('magic_quotes_gpc') ? TRUE : FALSE));

/**
 * @category			CLASSES
 */
require_once 'attendee.class.php';

/**
 * @category			SYSTEM REDIRECTS
 */
// INDEX PAGE:
define("PPINDEX","http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/pp.php"); 

/** 
 * @category	 		ERROR REPORTING - for those errors not caught by fcException
 */
//Production level:
//error_reporting(0);
 
//Development level:
error_reporting(E_ALL); 

function ACME_error ($e_number, $e_message) {
	$message = 'ACME_error: An uncaught error has occurred - '.$e_number.': '.$e_message;
	echo formatError($message);
	//error_log ($message,1,'support@ACME.com'); //Production (send email)	
}	

// Set default system handler
set_error_handler('ACME_error');



/**
 * @category 			UTILITIES
 */

/**
 * @method				sendmail
 */
function sendMail($to,$to_name,$from,$from_name,$subject,$mssg,$cc=""){
    if($to_name)
        $to_address="$to_name <$to>";    
    else 
       $to_address="$to";
    
    if($from_name)
        $from_address="$from_name <$from>\n";    
    else 
       $from_address="$from\n";

    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    $headers .= "From: $from_address";
    $headers .= "Reply-To: $from_address";
    $headers .= "Reply-Path: $from_address";
    $headers .= "Return-Path: $from_address";
    //the following Xcrap is to make this play nice with ms outlook and hotmail...  not exactly sure what it does though.
    $headers .= "X-Priority: 3\n";
    $headers .= "X-MSMail-Priority: 3\n";
    $headers .= "X-Mailer: ACME.com\n";
    if($cc) $headers .= "Cc: ".$cc."\n";
    if(mail($to_address, stripslashes($subject), stripslashes($mssg), $headers)){//
        return true;
    }else{
        echo errorMsg("Could not send email");
        return false;
    }
}

/**
 *    
 * @method				redirect - Redirect browser using header or script function
 * 
 * @param				$location
 * @param				$script (FALSE) 
 *
 */
function redirect($location, $script = false) {
    if (!$script) {
        header("Location: ".str_replace("&amp;", "&", $location));
        exit;
    } else {
        echo "<script type='text/javascript'>document.location.href='".str_replace("&amp;", "&", $location)."'</script>\n";
        exit;
    }
}

/**
 *    
 * @method				cleanurl - Clean URL Function, prevents entities in server globals
 * 
 * @param				$url
 * @return				clean $url
 *
 */
function cleanurl($url) {
    $bad_entities = array("&", "\"", "'", '\"', "\'", "<", ">", "(", ")", "*");
    $safe_entities = array("&amp;", "", "", "", "", "", "", "", "", "");
    $url = str_replace($bad_entities, $safe_entities, $url);
    return $url;
}

/**   
 * @name		stripinput - Strip Input Function, prevents HTML in unwanted places
 * 
 * @param		$text
 * @return		$text
 *
 */ 
function stripinput($text) {
    if (!is_array($text)) {
        $text = stripslash(trim($text));
        //$text = preg_replace("/&[^#0-9]/", "&amp;", $text)
        $search = array("&", "\"", "'", "\\", '\"', "\'", "<", ">", "&nbsp;");
        $replace = array("&amp;", "&quot;", "&#39;", "&#92;", "&quot;", "&#39;", "&lt;", "&gt;", " ");
        $text = preg_replace("/(&amp;)+(?=\#([0-9]{2,3});)/i", "&", str_replace($search, $replace, $text));
    } else {
        foreach ($text as $key => $value) {
            $text[$key] = stripinput($value);
        }
    }
    return $text;
}

/**    
 * @name		stripget - Prevent any possible XSS attacks via $_GET.
 * 
 * @param		$check_url
 * @param		bool 
 *
 */
function stripget($check_url) {
    $return = false;
    if (is_array($check_url)) {
        foreach ($check_url as $value) {
            if (stripget($value) == true) {
                return true;
            }
        }
    } else {
        $check_url = str_replace(array("\"", "\'"), array("", ""), urldecode($check_url));
        if (preg_match("/<[^<>]+>/i", $check_url)) {
            return true;
        }
    }
    return $return;
}

/**    
 * @name		stripfilename - Strip file name
 * 
 * @param		$filename
 * @param		$filename
 *
 */
function stripfilename($filename) {
    $filename = strtolower(str_replace(" ", "_", $filename));
    $filename = preg_replace("/[^a-zA-Z0-9_-]/", "", $filename);
    $filename = preg_replace("/^\W/", "", $filename);
    $filename = preg_replace('/([_-])\1+/', '$1', $filename);
    if ($filename == "") { $filename = time(); }

    return $filename;
}

/**    
 * @name		stripslash - Strip Slash Function, only stripslashes if magic_quotes_gpc is on
 * 
 * @param		$text
 * @param		$text
 *
 */
function stripslash($text) {
    if (MQ_GPC) {
    	$text = stripslashes(trim($text)); 
    } else {
    	$text = trim($text);
    }
    return $text;
}

/**
 * @method		formatError - special format for error text
 * 
 * @param		$err - error string
 * @return		$err - error string in web-ready format
 */
function formatError($err) {
		$err = '<p id="errormsg">'.$err.'</p>';
		return $err;
	}

?>
