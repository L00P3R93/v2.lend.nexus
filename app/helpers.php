<?php

/**
 * Checks if two values match and return given value
 * @param $value1
 * @param $value2
 * @param $return
 * @return string
 */
function selected($value1, $value2, $return): string
{
    return $value1 === $value2 ? $return : "";
}

/**
 * Checks if a value is in array and returns the specified value
 * @param $needle
 * @param $haystack
 * @param $return
 * @return string
 */
function selector($needle, $haystack, $return): string
{
    return in_array($needle, $haystack)?$return:'';
}

/**
 * Generates a random string
 * @param $length
 * @return string
 */
function generateRandomString($length): string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/**
 * Generates a random String to be used as salt
 * @param $length
 * @return string
 */
function crazyString($length): string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#%^*()_+-~{}[];:|.<>';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/**
 * Finds the time passed from now
 * @param $datetime
 * @param bool $full
 * @return string
 * @throws Exception
 */
function time_elapsed_string($datetime, bool $full = false): string
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

/**
 * Adds a date from the given year, month or day
 * @param $date
 * @param $year
 * @param $months
 * @param $days
 * @return false|string
 */
function date_add_($date, $year, $months, $days): false|string
{
    return date('Y-m-d', strtotime($date." + $year years + $months months + $days days"));
}

/**
 * Subtracts a date from the given year, month or day
 * @param $date
 * @param $year
 * @param $months
 * @param $days
 * @return false|string
 */
function date_sub_($date, $year, $months, $days): false|string
{
    return date('Y-m-d', strtotime($date." - $year years - $months months - $days days"));
}

/**
 * Validates a given file type according to search array given
 * @param $file_name
 * @param $search_array
 * @return int
 */
function file_type($file_name, $search_array): int
{
    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    return in_array("$ext", $search_array) ? 1: 0;
}

/**
 * Uploads a file and gives the uploaded file a new encrypted name
 * @param $file_name
 * @param $temp_name
 * @param $upload_dir
 * @return int|string
 */
function upload_file($file_name, $temp_name, $upload_dir): int|string
{
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_file_name = generateRandomString(10).".$ext";
    $file_path = $upload_dir.$new_file_name;
    return move_uploaded_file($temp_name, $file_path) ? $new_file_name : 0;
}

/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param int $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mp | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param bool $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source https://gravatar.com/site/implement/images/php/
 */
function get_gravatar(string $email, int $s = 80, string $d = 'mp', string $r = 'g', bool $img = false, array $atts = array() ): string
{
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

/**
 * Finds whether a value is in a mulitdimensional array
 * @param $needle
 * @param $haystack
 * @param bool $strict
 * @return bool
 */
function in_array_r($needle, $haystack, bool $strict = false): bool
{
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }
    return false;
}

/**
 * @param $object
 * @return array
 */
function objectToArray ($object): array
{
    if(!is_object($object) && !is_array($object)) return $object;
    return array_map('objectToArray', (array) $object);
}

/**
 * @param $value
 * @param $return
 * @return mixed
 */
function not_empty($value, $return): mixed
{
    return (isset($value) and !empty($value))?$value: $return;
}


/**
 * @param $email
 * @param bool $checkDNS
 * @return bool
 */
function isValidEmail($email, bool $checkDNS = false): bool
{
    // Check email format using a basic regular expression.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    // Check email length.
    if (strlen($email) > 254) {
        return false;
    }

    // Extract domain part and optionally check DNS records.
    $domain = substr(strrchr($email, "@"), 1);
    if ($checkDNS && !checkdnsrr($domain, "MX")) {
        return false;
    }

    return true;
}

/**
 * @return false|string
 */
function get_title_page(): false|string
{
    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $p = explode('/', $url);
    $page = end($p);

    if (strpos($page, '?') !== false) {
        $p = explode('?', $page);
        $page = $p[0];
    }

    return $page;
}

/**
 * @param $uid
 * @return string
 */
function getGender($uid): string
{
    return ($uid == 1)? "Male": "Female";
}

/**
 * only containing letters and having more than 3 letters
 * @param $name
 * @return bool
 */
function isValidName($name): bool
{
    $cleanedName = preg_replace('/\s+/', '', $name);
    if(!ctype_alpha($cleanedName)) return false;
    if(strlen($cleanedName) < 3) return false;
    return true;
}

/**
 * @param $idNo
 * @return bool
 */
function isValidIdNo($idNo): bool
{
    if(strlen($idNo) < 5 or strlen($idNo) > 10) return false;
    if(!preg_match('/^\d+$/', $idNo)) return false;
    // TODO: Additional validation logic using APIs
    return true;
}

/**
 * @param $phoneNo
 * @return bool
 */
function isValidPhoneNo($phoneNo): bool
{
    $cleanedNo = preg_replace('/[ -]/','', $phoneNo);
    if(preg_match('/^2547\d{8}$/', $cleanedNo) or preg_match('/^2541\d{8}$/', $cleanedNo)) return true;
    else return false;
}

/**
 * @param $date
 * @return bool
 */
function isValidDate($date): bool
{
    return !empty($date) && preg_match("/^\d{4}-\d{2}-\d{2}$/", $date) && strtotime($date) !== false;
}

/**
 * @param $dob
 * @return bool
 * @throws Exception
 */
function isValidDob($dob): bool
{
    if(isValidDate($dob)){
        $birthDate = new DateTime($dob);
        $today = new DateTime();
        $age = $today->diff($birthDate)->y;

        return $age >= 18;
    }
    return false;
}

