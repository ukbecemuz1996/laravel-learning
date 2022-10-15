<?php

namespace App\Http\Controllers;

// controller
class ProductController extends Controller
{
    // demo products
    // model
    private $products = array(
        ['id' => 1, 'name' => 'Laptop', 'price' => '1000', 'currency' => 'USD'],
        ['id' => 2, 'name' => 'Mobile', 'price' => '1000', 'currency' => 'USD'],
        ['id' => 3, 'name' => 'Printer', 'price' => '50', 'currency' => 'USD'],
        ['id' => 4, 'name' => 'headphone', 'price' => '50', 'currency' => 'USD'],
    );

    public function readAll()
    {
        $numberVar = 7;
        $nullVar = null;
        return view('products', [
            'products' => $this->products,
            'toPrint' => 'Hello World!',
            'number' => $numberVar,
            'nullVar' => $nullVar
            ]
        );
    }
}
