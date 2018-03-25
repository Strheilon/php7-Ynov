<?php

$o = array_count_values(
    str_split(
        str_replace([" ", "
"], "", file_get_contents($argv[1])
        )
    )
);

arsort($o);
print_r($o);
print count($o)." (".array_sum($o).")
";
