<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Popular currencies</title>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-weight: 100;
        }
    </style>
</head>
<body>
<div>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Change</th>
        </tr>
        @foreach($currencies as $currency)
            <tr>
                <td>{{ $currency['id'] }}</td>
                <td><img src="{{ $currency['img'] }}"> {{ $currency['name'] }}</td>
                <td>{{ $currency['price'] }}</td>
                @php
                    if ($currency['daily_change'] < 0)
                        $color = 'red';
                    else
                        $color = 'green';
                @endphp
                <td style="color: {{ $color }}">{{ $currency['daily_change'] }}</td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>
