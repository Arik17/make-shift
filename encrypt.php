<?php
define("ENCRYPTION_KEY", "!@#$%^&*");
$string = "PGSPPO";
$trans_id = 'od3vXsvljEqc7io3tIo1bg==';

//echo $encrypted = encrypt($string, ENCRYPTION_KEY);
//echo "<br />";
//echo $decrypted = decrypt($encrypted, ENCRYPTION_KEY);

/**
 * Returns an encrypted & utf8-encoded
 */
public static function passwordChanger($action, $string, $add_to_secret_key="") {
    if (is_array($string)){
        $result = array();
        foreach($string AS $key=>$val)
            $result[$key] = self::passwordChanger($action, $val,$add_to_secret_key);
        return $result;
    } else {
        $output         = false;
        $encrypt_method     = "AES-256-CBC";
        $secret_key     = 'yoursecretkey'.$add_to_secret_key;
        $secret_iv          = 'youriv';
        $key                = hash('sha256', $secret_key);
        $iv             = substr(hash('sha256', $secret_iv), 0, 16);
        if( $action == 'encrypt' ) {
            $output     = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output     = base64_encode($output);
            $eski           = array("+","/","=");
            $yeni           = array("b1X4","x8V7","F3h7");
            $output     = str_replace($eski,$yeni,$output);
        }elseif( $action == 'decrypt' ){
            $eski=array("b1X4","x8V7","F3h7");
            $yeni=array("+","/","=");
            $string = str_replace($eski,$yeni,$string);
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
}

$x = passwordChanger('encrypt', 'hello');
$y = passwordChanger('decrypt', $x);

//$encrypted_string=openssl_encrypt($string_to_encrypt,"AES-128-ECB",$string);
//$decrypted_string=openssl_decrypt($encrypted_string,"AES-128-ECB",$trans_id);

//echo $encrypted_string;
//echo $decrypted_string;
?>