@extends('layouts.layout')

@section('title')
    Green
@endsection

@section('main_content')
    <div class="green">
<?php
$array = ['yellow', 'green', 'rosybrown', 'coral'];
foreach ($array as $arr) {
    echo "<h1 style='color: {$arr}'>This page is Green</h1>";
}
$digit = [1, 2, 3, 4, 5];
$a = count($digit);
foreach ($digit as $digital) {
    echo $a = $a * $digital;
    echo "<br>";
}
?>
    </div>
@endsection
