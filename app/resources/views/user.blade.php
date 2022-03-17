@extends('layouts.layout')

@section('title')
    User
@endsection

@section('main_content')

    <h1 style="color: darkslategray">Привет</h1>

    <?php

        echo '<div style="color: #aacd4e">' . 'id : ' . $id . '</div>';
        echo '<div style="color: darkgreen">' . 'Hello - ' . $name . '</div>';

    ?>

@endsection
