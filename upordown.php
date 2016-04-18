<?php

function upordown($url) {
    $curlsection = curl_init($url);
    curl_setopt($curlsection, CURLOPT_NOBODY, true);
    curl_setopt($curlsection, CURLOPT_FOLLOWLOCATION, true);
    curl_exec($curlsection);
    $status_code = curl_getinfo($curlsection, CURLINFO_HTTP_CODE); //curl_getinfo — Get information regarding a specific transfer..CURLINFO_HTTP_CODE - Last received HTTP code
    return ($status_code==200)? true: false;
}
//echo upordown('http://www.google.com');
if(isset($_POST['url'])==true && empty($_POST['url'])==false){
    $url=trim($_POST['url']);
    if(filter_var($url,FILTER_VALIDATE_URL)==true){
        if(upordown($url)==true){
            echo 'Website is up';
        }  else {
            echo 'sorry,website is down';
        }
    }  else {
    echo 'invalid url';    
    }
}
?>

<form action='' method='post'>
    Up or down? <input type='text' name='url'/>
    <input type='submit'/>
</form>

<!--curl_init — Initialize a cURL session-->
<!--curl_setopt — Set an option for a cURL transfer-->
<!--CURLOPT_NOBODY-SET TO TRUE to exclude the body from output(here v dont need the body of url)-->