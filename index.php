<?php

$sToolPath = '/usr/bin/pdftk 2>&1';
$last = exec($sToolPath, $aOutput, $nReturn);
print_r(array($aOutput, $nReturn, $last));
