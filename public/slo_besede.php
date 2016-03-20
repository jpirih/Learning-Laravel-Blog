<?php
$data = fopen('slovenske_besede.txt', 'r');
$prebrano = fread($data, filesize('slovenske_besede.txt'));

print_r(explode(',', $prebrano));
