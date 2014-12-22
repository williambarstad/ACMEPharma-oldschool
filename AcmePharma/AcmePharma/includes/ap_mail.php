<?
/**
*   @name        ap_mail.php -- Mail functions
*   @version     0.1
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
*/
function ap_sendMail($to,$from,$subject,$mssg,$to_name="",$from_name="",$cc=""){
        if($to_name)$to_address="$to_name <$to>";
        else$to_address="$to";
        if($from_name)$from_address="$from_name <$from>\n";
        else $from_address="$from\n";

        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "From: $from_address";
        $headers .= "Reply-To: $from_address";
        $headers .= "Reply-Path: $from_address";
        $headers .= "Return-Path: $from_address";
        //the following Xcrap is to make this play nice with ms outlook and hotmail...  not exactly sure what it does though.
        $headers .= "X-Priority: 3\n";
        $headers .= "X-MSMail-Priority: 3\n";
        $headers .= "X-Mailer: acmepharma.skoonch.com\n";
        if($cc) $headers .= "Cc: ".$cc."\n";
        if(mail($to_address, stripslashes($subject), stripslashes($mssg), $headers)){//
                return true;
        }else{
                var_dump("Could not send email");
                return false;
        }
}
?>