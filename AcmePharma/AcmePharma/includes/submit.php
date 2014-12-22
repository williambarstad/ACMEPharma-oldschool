<?
if(isset($_REQUEST['from_name'])&&isset($_REQUEST['from'])){
    //Generate a unique id for this submitter.
    $ID=uniqid("Summit06_");//based on microseconds since unix epoch I believe...
    $to="usersgroup@ACME.com";//"summitinfo@ACME.com"
    $to_name="Summit Registration";
    $cc="";
    $totalFees=$_POST['totalFees'];
    $from_name=str_replace(","," ",$_REQUEST['from_name']);//strip out commas which totally screw up the "to:" in the mail header.  Hopefully there aren't any others that would screw it up too bad...
    $from=$_REQUEST['from'];
    $payPalEmailLink="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=ggarcia%40ACME%2ecom&item_name=summit%20registration&item_number=".$ID."&amount=".$totalFees."&no_shipping=1&return=http%3a%2f%2fsummit%2eACME%2ecom%2fthankyou%2ehtm&cancel_return=http%3a%2f%2fsummit%2eACME%2ecom&currency_code=USD&lc=US&bn=PP%2dBuyNowBF&charset=UTF%2d8";
    $msg="<br>
		<br>This is an automated submission form from the summit.ACME.com web site registration page.
		<br>Compare the submitter's ID ($ID) to paypal payment numbers to see if this registrant has paid (if any money is due).
		<br>
		<br>Be sure to send a confirmation email!<br>
		<br>
		<table border='1'><tr><td><table border='0'>
			<tr>
				<td align='right'><strong>Submitters ID:</strong></td>
				<td><strong>$ID</strong></td>
			</tr>
			<tr>
				<td align='right'><strong>Registrant:</strong></td>
				<td>".$from_name." ".$_REQUEST['suffix']." ".$_REQUEST['suffix_other']."</td>
			</tr>";
    $msg.=getRow("Title","title");
    $msg.=getRow("Facility Name","FacName");
    $msg.=getRow("Address","address1");
    $msg.=getRow("Address2 ","address2");
    $msg.=getRow("City","city");
    $msg.=getRow("ST/Prov","st_prov");
    $msg.=getRow("Code","code");
    $msg.=getRow("Facility phone number","phone");
    $msg.=getRow("Email address","from");
    $msg.=getRow("Speaker:","speaker");
    $msg.=getRow("Hotel check in date:","hotelCheckInDate");
    $msg.=getRow("Hotel check out date:","hotelCheckOutDate");
    $msg.=getRow("Sharing room?:","sharingRoom");
    $msg.=getRow("Sharing room with:","shareRoomWith");
    $msg.=getRow("Room type:","hotelRoomType");
    $msg.=getRow("Smoking:","hotelRoomSmoking");
    $msg.=getRow("Special needs:","hotelSpecialNeeds");
    $msg.=getRow("Breakout Session 1 - 1:30 pm:","breakout1");
    $msg.=getRow("Breakout Session 2— 2:35 pm:","breakout2");
    $msg.=getRow("Breakout Session 3— 3:35 pm:","breakout3");
    $msg.=getRow("Total Fees","totalFees");
    $msg.="</table></td></tr></table><br><br>";

    $msg2="<div align='center'><h3>Thank you ".$from_name."!</h3></div>
    		<br>We have processed your registration information. Your registration ID number is $ID.  You may contact <br>
    		<a href='mailto:$to?subject=Summit Registration Question (ID: $ID)'>$to_name($to)</a>
    		<br>with any questions/changes to your registration.<br><br>";

    if($totalFees!="0.00")$msg2.=" Once we have recieved payment confirmation from PayPal we will send you a confirmation email. If you have not yet made your payment, please click
    <br>&nbsp;&nbsp;&nbsp;<a href='$payPalEmailLink'>here</a><br>to make your payment through the PayPal service.<br>";

    $msg2.="<br><br>Please remember to make <a href='http://summit.ACME.com/hotels.htm'>hotel reservations</a><br>";

    $msg.="Below is the email that was sent to the submitter to acknowledge submission<br><br><hr width='70%' size='1'>".$msg2;
    //echo $msg;

    //first write this out to logs.
    $filename="logs/".$ID."_submission.html";
    if(!$handle = fopen($filename, 'w')){//attempt to open file
        echo errorMsg("Cannot open writable log file");
        exit;
    }
    if (fwrite($handle, $msg) === FALSE) {//attempt to write to it.
        echo errorMsg("Cannot write to file ($filename)");
        exit;
    }
    fclose($handle);

    //Send email to submitter.

    if(sendMail($from,$from_name,$to,$to_name,"Registration Acknowledgement",$msg2)){//if we successfully sent ack, then send copy and reg to summitinfo
        sendMail($to,$to_name,$from,$from_name,"ACME Users Group Registration Request(ID:$ID)",$msg,$cc);
    }

} else echo "Error submitting information please try again.  Contact support@ACME.com if continue to have problems.";

function errorMsg($error){
    return "<br>
        		<br>
        		<br>Error submitting your request ($error).<br>
        		<br>  Please contact <a href='mailto:support@ACME.com?subject=ACME Summit registration error(57):$error'>ACME support</a> to notify the support staff of the problem.<br>
        		<br>";
}

function getRow($title,$var){
    return"<tr><td align='right'><strong>$title:</strong></td><td style='border: thin inset;'>".$_REQUEST[$var]."</td></tr>";
}

function sendMail($to,$to_name,$from,$from_name,$subject,$mssg,$cc=""){
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
    $headers .= "X-Mailer: ACME.com\n";
    if($cc) $headers .= "Cc: ".$cc."\n";
    if(mail($to_address, stripslashes($subject), stripslashes($mssg), $headers)){//
        return true;
    }else{
        echo errorMsg("Could not send email");
        return false;
    }
}

?>
<html>
<head>
<title>The Summit - An ACME Customer Forum</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/javascript">
        <!--
        function MM_reloadPage(init) {  //reloads the window if Nav4 resized
          if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
            document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
          else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
        }
        MM_reloadPage(true);
        
        function MM_openBrWindow(theURL,winName,features) { //v2.0
          window.open(theURL,winName,features);
        }
        //-->
    </script>
<link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" link="B11A3B" vlink="B11A3B" alink="B11A3B">
    <table width="775" border="0" height="74" cellpadding="0" cellspacing="0">
        <tr valign="top">
            <td height="71" width="254" rowspan="2"><img src="images/top_left.gif" width="254" height="71" alt="">
            </td>
            <td height="71" width="373" rowspan="2"><img src="images/top_mid.gif" width="373" height="71" alt="">
            </td>
            <td height="23" width="148" background="images/date_bg.gif" align="center" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="B11A3B"> May 2005 </font>
            </td>
        </tr>
        <tr valign="top">
            <td height="48" width="148"><img src="images/down_date.gif" width="148" height="48" alt="">
            </td>
        </tr>
        <tr valign="top">
            <td height="27" width="254"><img src="images/mid_left.gif" width="254" height="27" alt="">
            </td>
            <td height="27" width="373"><img src="images/mid_mid.gif" width="373" height="27" alt="">
            </td>
            <td height="27" width="148"><img src="images/mid_right.gif" width="148" height="27" alt="">
            </td>
        </tr>
    </table>
    <table width="775" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <TABLE WIDTH="775" BORDER="0" CELLPADDING="0" CELLSPACING="0">
                    <TR>
                        <TD ROWSPAN="2"><a href="index.htm"><img src="images/linkstable_01.gif" width="61" height="26" border="0" alt=""> </a>
                        </TD>
                        <TD ROWSPAN="2"><a href="hotels.htm"><IMG SRC="images/linkstable_02.gif" WIDTH="61" HEIGHT="26" border="0" alt=""> </a>
                        </TD>
                        <TD><a href="schedule.htm"><IMG SRC="images/linkstable_03.gif" WIDTH="81" HEIGHT="25" border="0" alt=""> </a>
                        </TD>
                        <TD><a href="registration.htm"><IMG SRC="images/linkstable_04.gif" WIDTH="97" HEIGHT="25" border="0" alt=""> </a>
                        </TD>
                        <TD ROWSPAN="2"><a href="http://www.milwaukee.com" target="_new"><IMG SRC="images/linkstable_05.gif" WIDTH="100" HEIGHT="26" border="0" alt=""> </a>
                        </TD>
                        <TD ROWSPAN="2"><IMG SRC="images/linkstable_06.gif" WIDTH="375" HEIGHT="26" border="0" alt="">
                        </TD>
                    </TR>
                    <TR>
                        <TD COLSPAN="2"><IMG SRC="images/linkstable_07.gif" WIDTH="178" HEIGHT="1" border="0" alt="">
                        </TD>
                    </TR>
                </TABLE></td>
        </tr>
    </table>
    <table width="775" border="0" cellpadding="0" cellspacing="0" height="281">
        <tr>
            <td valign="top" height="442">
                <!-- #BeginEditable "content" -->
                <table width="775" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td valign="bottom" width="50" height="308"><img src="images/registration_side.jpg" width="50" height="350" alt=""></td>
                        <td width="522" valign="top" height="308">
                            <h3>Thank You!</h3>
                            <p class="paragraphtext">
                                <br>Your registration information has been submitted. An email is being sent to you acknowledging receipt of this registration information. <br> <br>The total amount due to complete your registration is $
                                <?=$totalFees?>
                                .
                                <?if($totalFees!="0.00"){?>
                                <br> <br>Please click the PayPal button below to make your payment.<br>
                            </p>
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                <input type="hidden" name="cmd" value="_xclick"> <input type="hidden" name="business" value="ggarcia@ACME.com"> <input type="hidden" name="item_name" value="Summit Registration"> <input type="hidden" name="item_number" value="&lt;?=$ID?&gt;"> <input type="hidden" name="amount" value="&lt;?=$totalFees?&gt;"> <input type="hidden" name="no_shipping" value="1"> <input type="hidden" name="return" value="http://summit.ACME.com/thankyou.htm"> <input type="hidden"
                                    name="cancel_return" value="http://summit.ACME.com"
                                > <input type="hidden" name="currency_code" value="USD"> <input type="hidden" name="lc" value="US"> <input type="hidden" name="bn" value="PP-BuyNowBF"> <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!"> <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                            </form> <?}else{?> <br> <br>Thank You!<br> <?}?>
                        </td>
                    </tr>
                </table>
                <table width="775" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <div align="center" class="copyright">
                                <span class="copyright"><img src="images/small_logo.jpg" width="70" height="35" alt=""><br> Copyright &copy; ACME, Inc 1997-2002 All rights reserved.</span>
                            </div></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
