<?php

use Carbon\Carbon;

$mytime = Carbon::now();
echo $mytime->toDateTimeString();
