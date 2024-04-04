function sequence_sum(int $begin, int $end, int $step): int {
if ($step >= $end or $step >= $begin) return 0;
return $end < $begin ? 0 : array_sum(range($begin, $end, $step)); } // var_export(sequence_sum(17, 32, 18));
