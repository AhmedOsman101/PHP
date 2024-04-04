function digital_root($number) {
$res = 0;
$number = str_split("$number");
for ($i = 0; $i < count($number); $i++) { $res +=$number[$i]; } $number=$res; if (sizeof(str_split("$res"))> 1) {
    return digital_root($res);
    } else {
    return $number;
    }
    }
