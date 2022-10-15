<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    @include('product', [
        'test' => ['id' => 55, 'name' => 'Apple', 'price' => '1', 'currency' => 'USD'],
    ])

    {{-- Displaying Data --}}

    {{ $toPrint }} {{-- echo $toPrint; --}}
    {{ 5 * 6 }} {{-- echo 5*6; --}}
    {{ count([1, 2, 3, 4]) }}

    {{-- Blade Directives --}}

    {{-- if statement --}}
    @if ($number % 2 == 0)
        <div>{{ $number }} Is Even </div>
    @elseif($number % 2 != 0)
        <div>{{ $number }} Is Odd </div>
    @else
        <div>Error </div>
    @endif

    {{-- Unless --}}

    @unless($number % 2 == 0)
        <div>{{ $number }} Is Odd </div>
    @endunless

    {{-- isset --}}

    @isset($nullVar)
        <div>Variable is set</div>
    @endisset

    {{-- empty --}}

    @empty($nullVar)
        <div>Variable is empty</div>
    @endempty

    {{-- Switch --}}

    @php
        $switchVar = 5;
    @endphp

    @switch($switchVar)
        @case(1)
            <div>Number is 1</div>
        @break

        @case(2)
            <div>Number is 2</div>
        @break

        @case(3)
            <div>Number is 3</div>
        @break

        @case(4)
            <div>Number is 4</div>
        @break

        @case(5)
            <div>Number is 5</div>
        @break

        @default
            <div>Number is not 1 ,2,3,4 or 5</div>
    @endswitch


    {{-- Loops --}}
    {{-- For Loop --}}

    @php
        $forloopVar = [1, 2, 3, 4, 5, 6];
    @endphp
    <ul>
        @for ($i = 0; $i < count($forloopVar); $i++)
            <li>{{ $forloopVar[$i] }}</li>
        @endfor
    </ul>

    {{-- Foreach Loop --}}

    @php
        $foreachStudents = [['id' => 1, 'name' => 'okba', 'surename' => 'cemuz'], ['id' => 2, 'name' => 'ahmad', 'surename' => 'mohamed']];
    @endphp

    <ul>
        @foreach ($foreachStudents as $student)
            <li> {{ $student['id'] }} - {{ $student['name'] . ' ' . $student['surename'] }} </li>
        @endforeach
    </ul>

    {{-- Forelse Loop --}}

    @php
        $forelseArray = [1, 2, 3];
    @endphp

    <ul>
        @forelse ($forelseArray as $el)
            <li>{{ $el }}</li>
        @empty
            <div>There is no element in this array</div>
        @endforelse
    </ul>
    {{-- Forelse is  equivalent to if else with foreach loop --}}
    <ul>
        @if (count($forelseArray) > 0)
            @foreach ($forelseArray as $el)
                <li>{{ $el }}</li>
            @endforeach
        @else
            <div>There is no element in this array</div>
        @endif
    </ul>

    {{-- While Loop --}}




    {{-- Continue and Break in Loop --}}

    @php
        $tmpArray = [4, 5, 6, 7, 8];
    @endphp

    <ul>
        @foreach ($tmpArray as $el)
            @if ($el == 5)
                @continue
            @endif
            <li>{{ $el }}</li>

            @if ($el == 7)
            @break
        @endif
    @endforeach
</ul>

<ul>
    @foreach ($tmpArray as $el)
        @continue($el == 5)
        <li>{{ $el }}</li>

        @break($el == 7)
    @endforeach
</ul>

{{-- Loop variables --}}

@php
$loopVariablesArray = [10, 15, 20, 25, 30];
@endphp

@foreach ($loopVariablesArray as $el)
    @if ($loop->first)
        <div>This is first item in array</div>
    @endif
    <div>{{ $loop->index }}</div>
    <div>{{ $el }}</div>
    @if ($loop->last)
        <div>This is last item in array</div>
    @endif
@endforeach


<h3 style="color: rgb(86, 8, 211)">Products</h3>
<ul>

    @foreach ($products as $product)
        <li>
            {{ $product['id'] }} - {{ $product['name'] }} {{ $product['price'] }}{{ $product['currency'] }}
        </li>
    @endforeach

</ul>

@foreach ($products as $el)
    @include('product', ['test' => $el])
@endforeach

@includeIf('productd')

@includeWhen(false, 'test', [
    'product' => ['id' => 55, 'name' => 'Apple', 'price' => '1', 'currency' => 'USD'],
])

@includeUnless(true, 'test', [
    'product' => ['id' => 55, 'name' => 'Apple', 'price' => '1', 'currency' => 'USD'],
])

<hr />
<hr />
<hr />
<hr />
<hr />
<hr />

@each('product', $products , 'test' )
@each('product', [] , 'test' , 'empty' )

</body>

</html>
