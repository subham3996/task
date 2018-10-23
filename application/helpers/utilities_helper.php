<?php 
function normalize_str($str) {    
    $invalid = array('â€™'=>"'", 'â€˜' => "'", '’' => '\'', '‘'=>'\'', '“' => "\"", '”' => "\"", '—' => '-');        
    $str = str_replace(array_keys($invalid), array_values($invalid), $str);        
    return html_entity_decode($str);    
}

function slugify($text) {
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    if (empty($text)) { return 'n-a'; }
    return $text;
}

function no_html($html) {
    $html = strip_tags($html);
    $html = preg_replace('/[^A-Za-z0-9\. --,]/', ' ', $html);        
    $html = str_replace('&nbsp', '', $html);        
    return $html;
}

function filter_str($str) {
    $invalid = array('â€™'=>"'", 'â€˜' => "'", '’' => '\'', '‘'=>'\'', '“' => "\"", '”' => "\"", '—' => '-', '<p>' => '','</p>' => '','<br>' => '', '</br>' => '',"&nbsp" => '', "<h1>" => '', "</h1>" => '', '<strong>' => '' , '</strong>' => '', ';' => ' ', '"' => '\'',  '>' => '', '<' => '');
    $str = str_replace(array_keys($invalid), array_values($invalid), $str);
    $str = preg_replace('/\s+/', ' ', trim($str));
    return strip_tags($str);
} 

function get_words($sentence, $count = 30) {
    preg_match("/(?:[^\s,\.;\?\!]+(?:[\s,\.;\?\!]+|$)){0,$count}/", $sentence, $matches);
    return $matches[0];
}

function timify($date) {
    $date = strtotime($date);
    $now = time();
    $diff = $now - $date;

    if ($diff < 60){
        return sprintf($diff > 1 ? '%s seconds ago' : 'a second ago', $diff);
    }

    $diff = floor($diff/60);

    if ($diff < 60){
        return sprintf($diff > 1 ? '%s minutes ago' : 'one minute ago', $diff);
    }

    $diff = floor($diff/60);

    if ($diff < 24){
        return sprintf($diff > 1 ? '%s hours ago' : 'an hour ago', $diff);
    }

    $diff = floor($diff/24);

    if ($diff < 7){
        return sprintf($diff > 1 ? '%s days ago' : 'yesterday', $diff);
    }

    if ($diff < 30)
    {
        $diff = floor($diff / 7);

        return sprintf($diff > 1 ? '%s weeks ago' : 'one week ago', $diff);
    }

    $diff = floor($diff/30);

    if ($diff < 12){
        return sprintf($diff > 1 ? '%s months ago' : 'last month', $diff);
    }

    $diff = date('Y', $now) - date('Y', $date);

    return sprintf($diff > 1 ? '%s years ago' : 'last year', $diff);
}

function datify($date) {    
    return date('F d, Y', strtotime($date));
}

function sanitizedParam($param) {
    $pattern[0] = "%,%";
    $pattern[1] = "%#%";
    $pattern[2] = "%\(%";
    $pattern[3] = "%\)%";
    $pattern[4] = "%\{%";
    $pattern[5] = "%\}%";
    $pattern[6] = "%<%";
    $pattern[7] = "%>%";
    $pattern[8] = "%`%";
    $pattern[9] = "%!%";
    $pattern[10] = "%\\$%";
    $pattern[11] = "%\%%";
    $pattern[12] = "%\^%";
    $pattern[13] = "%=%";
    $pattern[14] = "%\+%";
    $pattern[15] = "%\|%";
    $pattern[16] = "%\\\%";
    $pattern[17] = "%:%";
    $pattern[18] = "%'%";
    $pattern[19] = "%\"%";
    $pattern[20] = "%;%";
    $pattern[21] = "%~%";
    $pattern[22] = "%\[%";
    $pattern[23] = "%\]%";
    $pattern[24] = "%\*%";
    $pattern[25] = "%&%";
    $sanitizedParam = preg_replace($pattern, "", $param);
    return $sanitizedParam;
}
    
function sanitizedURL($param) {
    $pattern[0] = "%,%";
    $pattern[1] = "%\(%";
    $pattern[2] = "%\)%";
    $pattern[3] = "%\{%";
    $pattern[4] = "%\}%";
    $pattern[5] = "%<%";
    $pattern[6] = "%>%";
    $pattern[7] = "%`%";
    $pattern[8] = "%!%";
    $pattern[9] = "%\\$%";
    $pattern[10] = "%\%%";
    $pattern[11] = "%\^%";
    $pattern[12] = "%\+%";
    $pattern[13] = "%\|%";
    $pattern[14] = "%\\\%";
    $pattern[15] = "%'%";
    $pattern[16] = "%\"%";
    $pattern[17] = "%;%";
    $pattern[18] = "%~%";
    $pattern[19] = "%\[%";
    $pattern[20] = "%\]%";
    $pattern[21] = "%\*%";
    $sanitizedParam = preg_replace($pattern, "", $param);
    return $sanitizedParam;
}

?>