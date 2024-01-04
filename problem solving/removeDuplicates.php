<?php
function removeDuplicates(&$nums) {
    return array_merge(array_unique($nums), array_fill(0, sizeof($nums) - sizeof(array_unique($nums)), "_"));
}
