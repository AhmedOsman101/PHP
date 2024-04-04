function endsWith($str, $ending) {
return (substr($str, -strlen($ending)) == $ending or $ending == "") ? "true" : "false";
}
