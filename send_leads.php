<?php
class PostData
{
    public function callback()
    {

        $channel = $_COOKIE['cstm_ppc_channel'];
        $campaign = $_COOKIE['cstm_ppc_campaign'];
        $placement = $_COOKIE['cstm_ppc_placement'];
        $keyword = $_COOKIE['cstm_ppc_keyword'];
       

        $fname = $_REQUEST['fname'];
        $lname = $_REQUEST['lname'];
        $email = $_REQUEST['email'];
        $mobile = str_replace(' ', '', $_REQUEST['mobile']);
        $source = $_REQUEST['source'];
        $country_code = $_REQUEST['cc'];
        $name = $fname . ' ' . $lname;

        //======================= Google Sheet Interation=======================

        $postFields = "entry.449648499=" . $fname;
        $postFields .= "&entry.1379833540=" . $email;
        $postFields .= "&entry.758332158=" . $mobile;
        $postFields .= "&entry.1693361781=" . $source;

        $postFields .= '&entry.1830911442=' . urlencode($_COOKIE['cstm_ppc_campaign']);
        $postFields .= '&entry.939490048=' . urlencode($_COOKIE['cstm_ppc_channel']);
        $postFields .= '&entry.729166844=' . urlencode($_COOKIE['cstm_ppc_keyword']);
        $postFields .= '&entry.839903606=' . urlencode($_COOKIE['cstm_ppc_placement']);
        $postFields .= '&entry.2003337495=' . urlencode($_COOKIE['cstm_ppc_device']);


       $ch1 = curl_init();
       curl_setopt($ch1, CURLOPT_URL, "https://docs.google.com/forms/u/0/d/e/1FAIpQLSdpzs4AL8ccMfmCjZtFa_VHz76IYzs20CzE0jLnwKAPTnuvrg/formResponse");
       curl_setopt($ch1, CURLOPT_POST, 1);
       curl_setopt($ch1, CURLOPT_POSTFIELDS, $postFields);
       curl_setopt($ch1, CURLOPT_HEADER, 0);
       curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
       // print_r($hash);
       $result1 = curl_exec($ch1);



        //======================= Google Sheet Interation End=======================
       
        // do not delete
        return true;
    }
}
