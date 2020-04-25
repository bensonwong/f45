<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>F45 Cards</title>

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="header">
    <div class="highlight-box lime-green">
        <div class="center" style="left: 22px">
            <div class="circle-border">
                {{ $card->num_classes }}
            </div>
        </div>
    </div>
    <div class="details-box light-grey">
        <div class="center title">
            {{ $card->member_name }}
        </div>
    </div>

    <div class="dark-blue-box">
        <div class="center">
            {{ $card->studio_name }}
        </div>
    </div>
</div>

<div class="img-container">
    <img src="{{ $card->img }}">
</div>

<div class="details-container">
    @foreach($card->classesArray as $class)
        <div class="f45-highlight {{$class}}"></div>
    @endforeach
</div>

<div class="next-container">
    <div class="highlight-box-sm light-grey">
        <div class="center">
            {{ $card->week_number }}
        </div>
    </div>
    <div class="details-box-sm purple-blue">
        <div class="center">
            WEEK COMPLETE
        </div>
    </div>
</div>

<script src="{{mix('/js/app.js')}}"></script>
</body>
</html>
