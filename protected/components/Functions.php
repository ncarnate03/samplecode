<?php

class Functions {

    public static function JsonResponse($type, $res = '', $msg = '') {
        $response_arr = array();
        $response_arr = array('status' => $type, 'update' => $res, 'message' => $msg);
        return CJSON::encode($response_arr);
    }
    
    public static function Salutations(){
        $salutations = array(1=>"Mr.",2=>"Mrs.",3=>"Miss",4=>"Dr.");
        return $salutations;
    }
    public static function getSalutation($id){
        if($id == ""){
            return "";
        }
        else{
            return self::Salutations()[$id];
        }
    }

    public static function randPassword($length = 8, $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') {
        return substr(str_shuffle($chars), 0, $length);
    }

    public static function encrypting($string = "", $hash = "md5") {
        if ($hash == "md5")
            return md5($string);
        if ($hash == "sha1")
            return sha1($string);
        else
            return hash($hash, $string);
    }

    public static function formatString($str, $len = 10) {
        $new_str = "";
        if (strlen($str) > $len) {
            $new_str = substr($str, 0, $len) . "..";
        } else {
            $new_str = substr($str, 0, $len);
        }
        return $new_str;
    }

    public static function formatDate($date, $type) {
        return date($type, strtotime($date));
    }

    public static function encrypt($str) {
        //for($i=0; $i<50;$i++){
        $str = strrev(base64_encode($str)); //apply base64 first and then reverse the string
        //}
        return $str;
    }

    //function to decrypt the string
    public static function decrypt($str) {
        //for($i=0; $i<50;$i++){
        $str = base64_decode(strrev($str)); //apply base64 first and then reverse the string}
        //}
        return $str;
    }

    public static function getDateRange($sd, $ed) {
        $tmp = array();
        $sdu = strtotime($sd);
        $edu = strtotime($ed);
        while ($sdu <= $edu) {
            $tmp[] = date('Y-m-d', $sdu);
            $sdu = strtotime('+1 day', $sdu);
        }
        return $tmp;
    }

    public static function getCountry($key) {
        $countries = self::countries();
        return $countries[$key];
    }

    public static function array_diff($a, $b) {
        $map = $out = array();
        foreach ($a as $val)
            $map[$val] = 1;
        foreach ($b as $val)
            if (isset($map[$val]))
                $map[$val] = 0;
        foreach ($map as $val => $ok)
            if ($ok)
                $out[] = $val;
        return $out;
    }

    public static function countries() {
        return array(
            "AF" => "Afghanistan",
            "AL" => "Albania",
            "DZ" => "Algeria",
            "AS" => "American Samoa",
            "AD" => "Andorra",
            "AO" => "Angola",
            "AI" => "Anguilla",
            "AQ" => "Antarctica",
            "AG" => "Antigua And Barbuda",
            "AR" => "Argentina",
            "AM" => "Armenia",
            "AW" => "Aruba",
            "AU" => "Australia",
            "AT" => "Austria",
            "AZ" => "Azerbaijan",
            "BS" => "Bahamas",
            "BH" => "Bahrain",
            "BD" => "Bangladesh",
            "BB" => "Barbados",
            "BY" => "Belarus",
            "BE" => "Belgium",
            "BZ" => "Belize",
            "BJ" => "Benin",
            "BM" => "Bermuda",
            "BT" => "Bhutan",
            "BO" => "Bolivia",
            "BA" => "Bosnia And Herzegowina",
            "BW" => "Botswana",
            "BV" => "Bouvet Island",
            "BR" => "Brazil",
            "IO" => "British Indian Ocean Territory",
            "BN" => "Brunei Darussalam",
            "BG" => "Bulgaria",
            "BF" => "Burkina Faso",
            "BI" => "Burundi",
            "KH" => "Cambodia",
            "CM" => "Cameroon",
            "CA" => "Canada",
            "CV" => "Cape Verde",
            "KY" => "Cayman Islands",
            "CF" => "Central African Republic",
            "TD" => "Chad",
            "CL" => "Chile",
            "CN" => "China",
            "CX" => "Christmas Island",
            "CC" => "Cocos (Keeling) Islands",
            "CO" => "Colombia",
            "KM" => "Comoros",
            "CG" => "Congo",
            "CD" => "Congo, The Democratic Republic Of The",
            "CK" => "Cook Islands",
            "CR" => "Costa Rica",
            "CI" => "Cote D'Ivoire",
            "HR" => "Croatia (Local Name: Hrvatska)",
            "CU" => "Cuba",
            "CY" => "Cyprus",
            "CZ" => "Czech Republic",
            "DK" => "Denmark",
            "DJ" => "Djibouti",
            "DM" => "Dominica",
            "DO" => "Dominican Republic",
            "TP" => "East Timor",
            "EC" => "Ecuador",
            "EG" => "Egypt",
            "SV" => "El Salvador",
            "GQ" => "Equatorial Guinea",
            "ER" => "Eritrea",
            "EE" => "Estonia",
            "ET" => "Ethiopia",
            "FK" => "Falkland Islands (Malvinas)",
            "FO" => "Faroe Islands",
            "FJ" => "Fiji",
            "FI" => "Finland",
            "FR" => "France",
            "FX" => "France, Metropolitan",
            "GF" => "French Guiana",
            "PF" => "French Polynesia",
            "TF" => "French Southern Territories",
            "GA" => "Gabon",
            "GM" => "Gambia",
            "GE" => "Georgia",
            "DE" => "Germany",
            "GH" => "Ghana",
            "GI" => "Gibraltar",
            "GR" => "Greece",
            "GL" => "Greenland",
            "GD" => "Grenada",
            "GP" => "Guadeloupe",
            "GU" => "Guam",
            "GT" => "Guatemala",
            "GN" => "Guinea",
            "GW" => "Guinea-Bissau",
            "GY" => "Guyana",
            "HT" => "Haiti",
            "HM" => "Heard And Mc Donald Islands",
            "VA" => "Holy See (Vatican City State)",
            "HN" => "Honduras",
            "HK" => "Hong Kong",
            "HU" => "Hungary",
            "IS" => "Iceland",
            "IN" => "India",
            "ID" => "Indonesia",
            "IR" => "Iran (Islamic Republic Of)",
            "IQ" => "Iraq",
            "IE" => "Ireland",
            "IL" => "Israel",
            "IT" => "Italy",
            "JM" => "Jamaica",
            "JP" => "Japan",
            "JO" => "Jordan",
            "KZ" => "Kazakhstan",
            "KE" => "Kenya",
            "KI" => "Kiribati",
            "KP" => "Korea, Democratic People's Republic Of",
            "KR" => "Korea, Republic Of",
            "KW" => "Kuwait",
            "KG" => "Kyrgyzstan",
            "LA" => "Lao People's Democratic Republic",
            "LV" => "Latvia",
            "LB" => "Lebanon",
            "LS" => "Lesotho",
            "LR" => "Liberia",
            "LY" => "Libyan Arab Jamahiriya",
            "LI" => "Liechtenstein",
            "LT" => "Lithuania",
            "LU" => "Luxembourg",
            "MO" => "Macau",
            "MK" => "Macedonia, Former Yugoslav Republic Of",
            "MG" => "Madagascar",
            "MW" => "Malawi",
            "MY" => "Malaysia",
            "MV" => "Maldives",
            "ML" => "Mali",
            "MT" => "Malta",
            "MH" => "Marshall Islands",
            "MQ" => "Martinique",
            "MR" => "Mauritania",
            "MU" => "Mauritius",
            "YT" => "Mayotte",
            "MX" => "Mexico",
            "FM" => "Micronesia, Federated States Of",
            "MD" => "Moldova, Republic Of",
            "MC" => "Monaco",
            "MN" => "Mongolia",
            "MS" => "Montserrat",
            "MA" => "Morocco",
            "MZ" => "Mozambique",
            "MM" => "Myanmar",
            "NA" => "Namibia",
            "NR" => "Nauru",
            "NP" => "Nepal",
            "NL" => "Netherlands",
            "AN" => "Netherlands Antilles",
            "NC" => "New Caledonia",
            "NZ" => "New Zealand",
            "NI" => "Nicaragua",
            "NE" => "Niger",
            "NG" => "Nigeria",
            "NU" => "Niue",
            "NF" => "Norfolk Island",
            "MP" => "Northern Mariana Islands",
            "NO" => "Norway",
            "OM" => "Oman",
            "PK" => "Pakistan",
            "PW" => "Palau",
            "PA" => "Panama",
            "PG" => "Papua New Guinea",
            "PY" => "Paraguay",
            "PE" => "Peru",
            "PH" => "Philippines",
            "PN" => "Pitcairn",
            "PL" => "Poland",
            "PT" => "Portugal",
            "PR" => "Puerto Rico",
            "QA" => "Qatar",
            "RE" => "Reunion",
            "RO" => "Romania",
            "RU" => "Russian Federation",
            "RW" => "Rwanda",
            "KN" => "Saint Kitts And Nevis",
            "LC" => "Saint Lucia",
            "VC" => "Saint Vincent And The Grenadines",
            "WS" => "Samoa",
            "SM" => "San Marino",
            "ST" => "Sao Tome And Principe",
            "SA" => "Saudi Arabia",
            "SN" => "Senegal",
            "SC" => "Seychelles",
            "SL" => "Sierra Leone",
            "SG" => "Singapore",
            "SK" => "Slovakia (Slovak Republic)",
            "SI" => "Slovenia",
            "SB" => "Solomon Islands",
            "SO" => "Somalia",
            "ZA" => "South Africa",
            "GS" => "South Georgia, South Sandwich Islands",
            "ES" => "Spain",
            "LK" => "Sri Lanka",
            "SH" => "St. Helena",
            "PM" => "St. Pierre And Miquelon",
            "SD" => "Sudan",
            "SR" => "Suriname",
            "SJ" => "Svalbard And Jan Mayen Islands",
            "SZ" => "Swaziland",
            "SE" => "Sweden",
            "CH" => "Switzerland",
            "SY" => "Syrian Arab Republic",
            "TW" => "Taiwan",
            "TJ" => "Tajikistan",
            "TZ" => "Tanzania, United Republic Of",
            "TH" => "Thailand",
            "TG" => "Togo",
            "TK" => "Tokelau",
            "TO" => "Tonga",
            "TT" => "Trinidad And Tobago",
            "TN" => "Tunisia",
            "TR" => "Turkey",
            "TM" => "Turkmenistan",
            "TC" => "Turks And Caicos Islands",
            "TV" => "Tuvalu",
            "GB" => "United Kingdom",
            "US" => "United States",
            "UG" => "Uganda",
            "UA" => "Ukraine",
            "AE" => "United Arab Emirates",
            "UM" => "United States Minor Outlying Islands",
            "UY" => "Uruguay",
            "UZ" => "Uzbekistan",
            "VU" => "Vanuatu",
            "VE" => "Venezuela",
            "VN" => "Viet Nam",
            "VG" => "Virgin Islands (British)",
            "VI" => "Virgin Islands (U.S.)",
            "WF" => "Wallis And Futuna Islands",
            "EH" => "Western Sahara",
            "YE" => "Yemen",
            "YU" => "Yugoslavia",
            "ZM" => "Zambia",
            "ZW" => "Zimbabwe"
        );
    }

    //You do not need to alter these functions
    public static function getHeight($image) {
        $size = getimagesize($image);
        $height = $size[1];
        return $height;
    }

    //You do not need to alter these functions
    public static function getWidth($image) {
        $size = getimagesize($image);
        $width = $size[0];
        return $width;
    }

    public static function youtubeImage($url) {
        $image_url = 'http://img.youtube.com';
        if (!empty($url)) {
            parse_str(parse_url($url, PHP_URL_QUERY), $video_var);
            if (isset($video_var['v']) && !empty($video_var['v'])) {
                $image_url = "http://img.youtube.com/vi/" . $video_var['v'] . "/0.jpg";
            }
        }
        return $image_url;
    }

    public static function getImage($image) {
        if (!empty($image)) {
            return $image;
        }
        return Yii::app()->theme->getBaseUrl() . "/images/brand_default.png";
    }

    public static function loadGenders() {
        $genders = array(1 => "Male", 2  => "Female");
        return $genders;
    }

    public static function getUploads() {
        $id = Yii::app()->user->idschool;
        $items = array();
        $path = Yii::getPathOfAlias('webroot') . "/uploads/$id/";
        $url = Yii::app()->getBaseUrl(true) . "/uploads/$id/";
        if (is_dir($path) && $handle = opendir($path)) {
            $i = 0;
            while (false !== ($file = readdir($handle))) {
                if (strcmp($file, '.') == 0 || strcmp($file, '..') == 0)
                    continue;
                $items[] = array("id" => $i++, "item" => "{$url}{$file}", "file" => "{$path}{$file}");
            }
            closedir($handle);
        }
        return $items;
    }

    public static function getGridBottons($model, $buttons) {
        $str = '';
        if (in_array('add', $buttons)) {
            $str .= "<a href=\"#\" class=\"btn btn-sm btn-success\" onclick=\"create();\">Add</a>";
        }
        if (in_array('publish', $buttons)) {
            $str .= " <a href=\"#\" class=\"btn btn-sm btn-success\" onclick=\"publishAll('" . get_class($model) . "');\">Acivate</a>";
        }
        if (in_array('unpublish', $buttons)) {
            $str .= " <a href=\"#\" class=\"btn btn-sm btn-danger\" onclick=\"unpublishAll('" . get_class($model) . "');\">Deactivate</a>";
        }
        if (in_array('delete', $buttons)) {
            $str .= " <a href=\"#\" class=\"btn btn-sm btn-danger\" onclick=\"deleteAll('" . get_class($model) . "');\">Delete</a>";
        }
        return $str;
    }

    public static function textToUrl($text){
            $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
            preg_match_all($reg_exUrl, $text, $matches);
            $usedPatterns = array();
            foreach($matches[0] as $pattern){
                if(!array_key_exists($pattern, $usedPatterns)){
                    $usedPatterns[$pattern]=true;
                    $text = str_replace($pattern, "<a target='_top' href='{$pattern}' rel='nofollow'>{$pattern}</a> ", $text);   
                }
            }
            return $text;    
        }
    public static function getNewsCategories($id=null){
        $catgories = array(
            0=>"General",
            1=>"School info",
            2=>"Motivation",
            3=>"Extra curricular",
        );
        if($id != null){
            return $catgories[$id];
        }
        return $catgories;
    }
    public static function getNewsSources($id=null){
        $sources = array(
            0=>"Default",
            1=>"RSS",
            2=>"Facebook",
            3=>"Twitter",
        );
        if($id != null){
            return $sources[$id];
        }
        return $sources;
    }
    
    public static function getProfileType($id=null){
        $types = array(
            0=>"Default",
            1=>"RSS",
            2=>"Facebook",
            3=>"Twitter",
        );
        if($id != null){
            return $types[$id];
        }
        return $types;
    }
    public static function getUniformsizes($id=null){
        $sizes = array(
            1=>"S",
            2=>"M",
            3=>"L",
            4=>"XL",
            5=>"XXL"
        );
        if($id != null){
            return $sizes[$id];
        }
        return $sizes;
    }
    public static function getUniformgender($id=null){
        $genders = array(
            1=>"Male",
            2=>"Female",
            3=>"Both",
        );
        if($id != null){
            return $genders[$id];
        }
        return $genders;
    }
    public static function compress($source, $destination, $quality) {
        $info = getimagesize($source);
        if($info['size'] >= 30000){
            if ($info['mime'] == 'image/jpeg') 
                $image = imagecreatefromjpeg($source);
            elseif ($info['mime'] == 'image/gif') 
                $image = imagecreatefromgif($source);
            elseif ($info['mime'] == 'image/png') 
                $image = imagecreatefrompng($source);
            imagejpeg($image, $destination, $quality);
            chmod($destination, 0755);
            return $destination;
        }
    }
    public static function displayStatus($status){
        return ($status == 1) ? "<span class=\"label label-success\">Active</span>":"<span class=\"label label-danger\">Deactive</span>";     
    }
    public static function  TreatmentTypes(){
        return array(1=>"Electro Therapy",2=>"Exercise Therapy");
    }
    public static function  PaymentModes($id=null){
        $modes = array(1=>"Cash",2=>"Cheque",3=>"online");
        if(!empty($id)){
            return $modes[$id];
        }
        else{
            return $modes;
        }
        
    }
    public static function  getFrom(){
        return array(1=>"Clinic",2=>"Home");
    }
    public static function  getDominance(){
        return array(1=>"Right",2=>"Left");
    }
    public static function  getTenant(){
        $user = User::model()->findByPk(Yii::app()->user->id);
        if(!empty($user)){
            if(!empty($user->tenant_id)){
                return $user->tenant_id;
            }
            return $user->id;
        }
    }
    public static function sendRecipt($id,$content){
        $patient = Patient::model()->findByPk($id);
        if(!empty($patient) && !empty($patient->email_id)){
            //Yii::import('application.extensions.phpmailer.JPhpMailer');
            require_once(Yii::getPathOfAlias('webroot').'/protected/vendors/pjmail/pjmail.class.php');
            $mail = new PJmail();
            $mail->setAllFrom('info@physioassists.com', 'Physio Assists');
            $mail->addrecipient($patient->email_id);
            $mail->addbcc(Yii::app()->params['adminEmail']);
            $mail->addsubject("Payment Receipt");
            $mail->html = '<p>Hi,</p><p>PLease find the attached payment recipt.</p><p>&nbsp;</p><p>Regards,</p><p>Dr.'.Yii::app()->user->name.'</p>';
            $mail->html = '<p>Hi,</p><p>PLease find the attached payment recipt.</p><p>&nbsp;</p><p>Regards,</p><p>Dr.'.Yii::app()->user->name.'</p>';
            $mail->addbinattachement("payment_receipt.pdf", $content);
            $mail->sendmail();
            /*$mail = new JPhpMailer;
            $mail->SetFrom('info@physioassists.com', 'Physio Assists');
            $mail->Subject = 'Payment Receipt';
            $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
            $mail->MsgHTML('<p>Hi,</p><p>PLease find the attached payment recipt.</p><p>&nbsp;</p><p>Regards,</p><p>Dr.'.Yii::app()->user->name.'</p>');
            $mail->AddAddress($patient->email_id);
            $mail->AddAddress('ncarnat03@gmail.com');
            $mail->AddAttachment('payment_reciept.pdf',$content);
            $mail->Send();  */          
        }
    }
    public static function isValidMd5($md5 =''){
        return preg_match('/^[a-f0-9]{32}$/', $md5);
    }

    public static function pricetoword($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'Zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Fourty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . self::pricetoword(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . self::pricetoword($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = self::pricetoword($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= self::pricetoword($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}    
}

?>