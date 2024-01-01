<?php
namespace App\Helper;
use DateTime;
use App\Models\MaintenanceModule;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

class Utils
{
    static function generateProfileImg($profile_src, $class = 'avatar-25')
    {
        $profile_url = env('APP_URL') . $profile_src;
        if (!$profile_src) {
            $profile_url = "https://img.icons8.com/material/120/40b4b6/gender-neutral-user--v1.png";
        }
        echo "<div class='$class' style='background-image: url(\"".$profile_url."\")'></div>";
    }

    static function identifyModuleID($str, $mod)
    {
        $module_data = MaintenanceModule::select('id', 'name')->where('module', $mod)->get();
        $module_id = 0;
        if ($str) {
            foreach ($module_data as $module) {
                if (self::cleanStr($module->name) == self::cleanStr($str)) {
                    $module_id = $module->id;
                    break;
                }
            }
    
            if (!$module_id) {
                
                $maintenance_module = MaintenanceModule::create([
                    'name' => $str,
                    'module' => $mod
                ]);
    
                $module_id = $maintenance_module->id;
            }
        }

        return $module_id;
    }

    static function readModuleName($id)
    {
        if (isset($id)) {
            return MaintenanceModule::where('id', $id)->value('name');
        }
    }

    
    static function decodeSlug($str, $delimiter = '_'){
        if (!$str) {
            return;
        }
        $expd_str = explode($delimiter, $str);
        $output = '';
        foreach ($expd_str as $v) {
            $output .= ucfirst($v) . ' ';
        }
        return $output;
    }

    static function getUserTypeString($user_type) {
        if ($user_type == 1) {
            return "Dartek";
        }
        else if ($user_type == 2) {
            return "Dealer";
        }
        else if ($user_type == 0) {
            return "System";
        }
    }

    static function handleFloat($value) 
    {
        if ($value && !is_numeric($value)) {
            $value = str_replace("-", $value, "");
            $value = str_replace(",", $value, "");
        }

        return $value ? (float) $value : 0;
    }

    static function explodeStr($str)
    {
        if ($str && strpos($str, ",") !== false) {
            $str = preg_replace('/\s+/', '', $str);
            return json_encode(explode(",", $str));
        }
        return $str;
    }

    static function implodeItems($items, $separator = ", ")
    {
        $items = json_decode($items);
        if (is_array($items) && count($items) > 0) {
            return implode(", ", $items);
        }
    }

    static function listGroup($items)
    {
        $items = json_decode($items);
        if (is_array($items) && count($items) > 0) {
            $html = "<ul class='list-group list-group-flush'>";
            foreach($items as $item) {
                $html .= "<li class='list-group-item'>{$item}</li>";
            } 
            $html .= "</ul>";
            echo $html;
        }
    }

    static function populateOption($module_name, $selected_item = '')
    {
        $maintenance = new MaintenanceModule;
        $items = $maintenance->modules($module_name);
        $html = '';
        foreach($items as $item) {
            $selected = $item->id == $selected_item ? 'selected' : '';
            $html .= "<option {$selected}  value='{$item->id}'>{$item->name}</option>";
        } 
        echo $html;
    }

    static function getAgeing($date, bool $include_day_text = false) 
    {
        $output = "";
        $ageing = self::getDaysDiff($date);
        if ($ageing && $ageing > 1)
            $output = "$ageing days";
        else if($ageing) 
            $output = "$ageing day";
        return $output;
    }

    static function handleCheckboxValue($request) {
        if (isset($input->will_create_new_order) && $request->will_create_new_order == 'on') {
            return 1;
        }
        return 0;
    }

    static function cleanStr($str)
    {
        $str = strtolower($str);
        $str = preg_replace('/\s+/', '', $str); # removes all white spaces
        return $str;
    }

    static function uploadFile($file, $folder = 'attachments/', $old_path = null)
    {
        $path = null;
        if ($file) {
            $origName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $file_name = $origName . "_" . uniqid().'.'.$file->extension();  
            
            $file->move(public_path($folder), $file_name);
            $path = $folder . $file_name;
            if ($old_path && file_exists($old_path)) {
                unlink($old_path);
            }
        }
        return $path;
    }

    static function getRequestStatusText($status){
        $status_text = 'pending';
        if ($status == 1) {
            $status_text = 'approved';
        }
        else if ($status == 2) {
            $status_text = 'declined';
        }
        else if ($status == 3) {
            $status_text = 'cancelled';
        }
        return $status_text;
    }

    public static function slugify($text, string $divider = '-')
    {
      // replace non letter or digits by divider
      $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
    
      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    
      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);
    
      // trim
      $text = trim($text, $divider);
    
      // remove duplicate divider
      $text = preg_replace('~-+~', $divider, $text);
    
      // lowercase
      $text = strtolower($text);
    
      if (empty($text)) {
        return 'n-a';
      }
    
      return $text;
    }

    public static function makeSingular($str) {
        if ($str && substr($str, 0, strlen($str)-1) == 's') {
            $str = str_replace('s', '', $str);
        }
        return $str;
    }

    public static function objectToArray($data) 
    {
        return json_decode(json_encode($data), true);
    }

    
    public static function arrayToObject(array $data) 
    {
        return json_decode(json_encode($data, JSON_FORCE_OBJECT));
    }

    public static function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }

    public static function randomChar($length, $prefix = "")
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited
        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[self::crypto_rand_secure(0, $max-1)];
        }

        return $prefix . $token;
    }

    public static function convertNumberToWord($num = false, $currency = "")
    {
        $orig_num = $num;
        $num = str_replace(array(',', ' '), '' , trim($num));
        if(! $num) {
            return false;
        }
        $num = (int) $num;
        $words = array();
        $list1 = array('', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven',
            'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'
        );
        $list2 = array('', 'Ten', 'Twenty', 'thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety', 'Hundred');
        $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
            'Octillion', 'Nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
            'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
        );
        $num_length = strlen($num);
        $levels = (int) (($num_length + 2) / 3);
        $max_length = $levels * 3;
        $num = substr('00' . $num, -$max_length);
        $num_levels = str_split($num, 3);
        for ($i = 0; $i < count($num_levels); $i++) {
            $levels--;
            $hundreds = (int) ($num_levels[$i] / 100);
            $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
            $tens = (int) ($num_levels[$i] % 100);
            $singles = '';
            if ( $tens < 20 ) {
                $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
            } else {
                $tens = (int)($tens / 10);
                $tens = ' ' . $list2[$tens] . ' ';
                $singles = (int) ($num_levels[$i] % 10);
                $singles = ' ' . $list1[$singles] . ' ';
            }
            $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
        } //end for loop
        $commas = count($words);
        if ($commas > 1) {
            $commas = $commas - 1;
        }

        $centavo = "";

        if (str_contains($orig_num, ".")) {
            $centavo = explode('.', $orig_num); 
            $centavo = $centavo[1];
            if ($centavo != "00") {
                $cent_text = $centavo > 0 ? " centavos" : "centavo";
                $centavo = " and " . self::convertNumberToWord($centavo) . $cent_text;
            }
            else {
                $centavo = "";
            }
        }

        return implode(' ', $words) . $currency . $centavo;
    }

    public static function is_decimal( $val )
    {
        return is_numeric( $val ) && floor( $val ) != $val;
    }
    

    public static function formatDate($date, $format_time = false, $date_format = "M d, Y") 
    {
        if ($date) {
            if ($format_time) {
                if ($date_format == "d/m/Y") {
                    return date($date_format . ' H:i', strtotime($date));
                }
                return date($date_format . ' h:i a', strtotime($date));
            }
            return date($date_format, strtotime($date));
        }
        return '';
    }

    public static function formatNum($value, $decimal = 2) 
    {
        if ($value) {
            return number_format($value, $decimal);
        }
        return (float) 0.00;
    }

    public static function exportDateFormat($date) 
    {
        if ($date) {
            return date('Y-m-d H:i:s', strtotime($date));
        }
        return '';
    }

    public static function excelDateFormat($date)
    {
        if ($date) {
            try {
                return ExcelDate::excelToDateTimeObject($date);
            } catch (\Throwable $th) {
                return date('Y-m-d H:i:s', strtotime($date));
            }
        }
        else {
            return "0000-00-00";
        }
    }

    static function getFullURL() 
    {
        return (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    static function getDaysDiff($from, $to) 
    {
        $to = new DateTime($to);
        $from = new DateTime($from);

        $result = $from->diff($to)->format("%a");

        return $result ? $result : '';
    }

    static function timeAgo($datetime, $full = false) {
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

    public static function abbreviateMonthNumber($month_number) {
        switch ($month_number) {
        case 1:
            return "JAN";
            break;
        case 2:
            return "FEB";
            break;
        case 3:
            return "MAR";
            break;
        case 4:
            return "APR";
            break;
        case 5:
            return "MAY";
            break;
        case 6:
            return "JUN";
            break;
        case 7:
            return "JUL";
            break;               
        case 8:
            return "AUG";
             break;                
        case 9:
            return "SEP";
            break;
        case 10:
            return "OCT";
            break;
         case 11:
            return "NOV";
            break;
        case 12:
            return "DEC";
            break;
        }
    }

    static function reportHeader($title)
    {
        $output = "<div class='text-center'>";
        $output .= "<img src='" . public_path() . '/img/yl_logo.png' . "' width='200' alt='' />";
        $output .= "</div>";
        $output .= "<h2 class='text-center'>{$title}</h2>";
        return $output;
    }

    public static function pdfStyle() {
        return "<style>
            @page { margin: 18px 38px 15px 38px; }
            * { font-family: Calibri, sans-serif; }
            .text-left { text-align:left; }
            .text-center { text-align: center; }
            .text-right { text-align: right; }
            .text-bold { font-style: bold; }
            .text-danger { color:red; }
            .phrase { font-size: 12px; }
            .head-3 { font-size: 14px; }
            .head-2 { font-size: 12px; font-style:bold; text-transform: uppercase; }
            .head-1 { font-size: 15px; font-style:bold; margin-top: 5px; }
            .head { font-size: 18px; font-style:bold; }
            .reprint {
                font-size: 20px; font-style:bold;
                margin-bottom: 5px;
            }
            .logo { 
                object-fit: cover;
                position: absolute;
                right: 0;
                top: 1px;
            }
            .serial-number { 
                font-style: bold;
                font-size: 24px;
                position: absolute;
                right: 13px;
                top: 58px;
                color: #FF0000; 
            }
            .text-info { 
                margin-top: 3px; 
                font-size: 12px;
            }
            .mb-1 { margin-bottom:10px; }
            .ml-1 { margin-left:10px; }
            .ml-2 { margin-left:20px; }
            .ml-3 { margin-left:30px; }
            .mr-2 { margin-right:20px; }
            .mr-3 { margin-right:30px; }
            .mr-100 { margin-right:100px; }
            .mt-08 { margin-top:8px; }
            .mt-1 { margin-top:10px; }
            .mt-2 { margin-top:20px; }
            .mt-3 { margin-top:30px; }
            .mt-4 { margin-top:40px !important; }
            .mt-5 { margin-top:50px; }
            .mt-100 { margin-top:100px; }
            .float-right { float:right; }
            table { font-size: 12px; }
            td, th { padding: 5px; }
            th, td { border: 1px solid; }
            th { text-align: left; padding: 8px; }
            .table-computation td, th, .table-items th {  margin: 2px !important; }
            .table-footer td, th { padding: 10px !important; border: 1px solid; }
            .border-solid { border: 1px solid; }
            .border-bl { border-bottom: 1px solid black; border-left: 1px solid black; }
            .border-br { border-bottom: 1px solid black; border-right: 1px solid black; }
            .border-b { border-bottom: 1px solid black; }
            .border-lr { border-left: 1px solid black; border-right: 1px solid black; }
            .border-l { border-left: 1px solid black; }
            .border-r { border-right: 1px solid black; }
            span.peso {
                font-family: DejaVu Sans; sans-serif;
            }
            footer {
                position: fixed;
                bottom: 0px;
                left: 0px;
                right: 0px;
                margin-bottom: 0px;
            }
        </style>";
    }
}
?>
