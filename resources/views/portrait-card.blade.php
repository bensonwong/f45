<?php

use Illuminate\Support\Facades\Storage;

$c = null;
if (isset($card)) $c = $card;

$numClasses = @$c->num_classes ?: 2;
$memberName = @$c->member_name ?: 'YOUR NAME';
$studioName = @$c->studio_name ?: 'F45 Dixie';
if (!isset($c->img)) {
    $img = '/img/kory.png';
} else {
    $img = Storage::url($c->img);
}
$maxClasses = ['foxtrot', 'romans'];
$classes = @$c->classesArray ?: ['athletica'];
$weekNumber = @$c->week_number ?: 18;
?>

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>F45 Cards</title>
    <link rel="icon" type="image/ico" href="/img/favicon.ico">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="card insta-square">
    <div class="header">
        <div class="highlight-box-lg lime-green">
            <div class="center">
                <div class="circle-border">
                    {{ $numClasses }}
                </div>
            </div>
        </div>
        <div class="details-box-lg light-grey">
            <div class="center title">
                {{ $memberName }}
            </div>
        </div>

        <div class="sub-highlight-box-lg dark-blue-box">
            <div class="center">
                {{ $studioName }}
            </div>
        </div>
    </div>

    <div class="img-container">
        <img src="{{ $img }}">
    </div>

    <div class="footer">
        <div class="details-container">
            @foreach($maxClasses as $class)
                <div class="f45-highlight {{$class}} @if(!in_array($class, $classes)) no-show @endif"></div>
            @endforeach
        </div>

        <div class="next-container">
            <div class="highlight-box-sm light-grey">
                <div class="center">
                    {{ $weekNumber }}
                </div>
            </div>
            <div class="details-box-sm purple-blue">
                <div class="center">
                    WEEK IN PROGRESS
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{mix('/js/app.js')}}"></script>
@if(App::environment()==='production')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-164689034-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-164689034-1');
    </script>

@endif

</body>
</html>
