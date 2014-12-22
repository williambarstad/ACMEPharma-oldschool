<?
    echo "Start mail test...<br>";
    flush();
    require_once("lib/ap_mail.php");
    if(ap_sendMail("me@ACMEPharma.com","summitinfo@ACMEPharma.com","testMessage","AP Mail testing")){
        echo "SUCCESS.<br>";
    }else 
        echo "FAILED.<br>";
?>