<?php

foreach (file($argv[1]) as $l)
    for ($i = 0; "" !== $c = @$l{$i}; $i++)
        if ($c != " " & $c != "
" && @++$f)
            @$o[$c]++ || @$t++;

arsort($o);
print_r($o);
print "$t ($f)
";
