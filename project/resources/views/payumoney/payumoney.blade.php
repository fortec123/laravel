@php

$MERCHANT_KEY1 = "QFp54ccl"; // add your id
$SALT1 = "PZ8ZIAhydi"; // add your id

$MERCHANT_KEY = "SjajPGB4";
$SALT = "3KgdLB8TQq";
//$PAYU_BASE_URL = "https://test.payu.in";
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';
$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
$posted = array();
$posted = array(
    'key' => $MERCHANT_KEY,
    'txnid' => $txnid,
    'amount' => 1000,
    'firstname' => Auth::user()->name,
    'email' => Auth::user()->email,
    'productinfo' => 'PHP Project Subscribe',
    'surl' => 'http://18.223.114.38/egg/subscribe-response/',
    'furl' => 'http://18.223.114.38/egg/subscribe-cancel/',
    'service_provider' => 'payu_paisa',
);

if(empty($posted['txnid'])) {
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} 
else 
{
    $txnid = $posted['txnid'];
}
$hash = '';
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
    $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';  
    foreach($hashVarsSeq as $hash_var) {
        $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
        $hash_string .= '|';
    }
    $hash_string .= $SALT;

    $hash = strtolower(hash('sha512', $hash_string));

    //print_R($hash);die;
    $action = $PAYU_BASE_URL . '/_payment';
} 
elseif(!empty($posted['hash'])) 
{
    $hash = $posted['hash'];
    $action = $PAYU_BASE_URL . '/_payment';
}

@endphp

<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
           payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
    Processing.....
        <form action="<?php echo $action; ?>" method="post" name="payuForm"><br />
            <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" /><br />
            <input type="hidden" name="hash" value="<?php echo $hash ?>"/><br />
            <input type="hidden" name="txnid" value="<?php echo $txnid ?>" /><br />
            <input type="hidden" name="amount" value="1000" /><br />
            <input type="hidden" name="firstname" id="firstname" value="<?=Auth::user()->name?>" /><br />
            <input type="hidden" name="email" id="email" value="<?=Auth::user()->email?>" /><br />
            <input type="hidden" name="productinfo" value="PHP Project Subscribe"><br />
            <input type="hidden" name="surl" value="http://18.223.114.38/egg/subscribe-response/" /><br />
            <input type="hidden" name="furl" value="http://18.223.114.38/egg/subscribe-cancel/" /><br />
            <input type="hidden" name="service_provider" value="payu_paisa"  /><br />
            <?php
            if(!$hash) { ?>
                <input type="submit" value="Submit" />
            <?php } ?>
        </form>
  </body>
</html>