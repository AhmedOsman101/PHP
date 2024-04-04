function alphanumeric(string $s): bool {
return ctype_alnum($s);
}
// var_export(alphanumeric(" "));
