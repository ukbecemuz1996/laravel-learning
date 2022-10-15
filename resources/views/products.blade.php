<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- Displaying Data --}}

    {{ $toPrint }}  {{-- echo $toPrint; --}}
    {{ 5*6 }} {{-- echo 5*6; --}}
    {{ count([1,2,3,4]) }}

    {{-- Blade Directives --}}

    {{-- if statement --}}
    @if($number % 2 == 0)
        <div>{{ $number }} Is Even </div>
    @elseif($number % 2 != 0)
        <div>{{ $number }} Is Odd </div>
    @else
        <div>Error </div>
    @endif

    {{-- Unless --}}

    @unless ($number % 2 == 0)
        <div>{{ $number }} Is Odd </div>
    @endunless

    {{-- isset --}}

    @isset($nullVar)
     <div>Variable is set</div>
    @endisset

    @empty($nullVar)
     <div>Variable is empty</div>
    @endempty

    {{-- empty --}}

    <h3 style="color: rgb(86, 8, 211)">Products</h3>
    <ul>

        @foreach ($products as $product)
            <li>
                {{ $product['id'] }} - {{ $product['name'] }} {{ $product['price'] }}{{ $product['currency'] }}
            </li>
        @endforeach

    </ul>
</body>
</html>
