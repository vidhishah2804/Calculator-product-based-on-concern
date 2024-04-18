<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use App\Models\Calculations;
use Illuminate\Http\Request;
use App\Models\product_concerns;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function Index()
    {
        return view('index');
    }


    public function calculator(Request $request)
    {
        $ingredientsListOne = Ingredients::where('list_type', 'list_one')->get();
        $ingredientsListTwo = Ingredients::where('list_type', 'list_two')->get();
        $productConcerns = product_concerns::all();
        return view('calculator', compact('ingredientsListOne', 'ingredientsListTwo', 'productConcerns'));
    }

    public function storeCalculation(Request $request)
    {

        $validatedData = $request->validate([
            'ingredients_one' => 'required',
            'ingredients_two' => 'required',
            'price_one' => 'required|numeric',
            'price_two' => 'required|numeric',
            'product_concern' => 'required',
        ], [
            'ingredients_one.required' => 'Please select an ingredient for the first option.',
            'ingredients_two.required' => 'Please select an ingredient for the second option.',
            'price_one.required' => 'Please enter the price for the first option.',
            'price_one.numeric' => 'The price for the first option must be a number.',
            'price_two.required' => 'Please enter the price for the second option.',
            'price_two.numeric' => 'The price for the second option must be a number.',
            'product_concern.required' => 'Please select a product concern.',
        ]);

        // dd($validatedData);
        $calculation = new Calculations();
        $calculation->ingredient_one = $validatedData['ingredients_one'];
        $calculation->ingredient_two = $validatedData['ingredients_two'];
        $calculation->price_one = $validatedData['price_one'];
        $calculation->price_two = $validatedData['price_two'];
        $calculation->product_concern = $validatedData['product_concern'];
        $totalPrice = ($validatedData['price_one'] + $validatedData['price_two']) * 1.05;
        $calculation->total_price = $totalPrice;
        $calculation->save();
        // Session::flash('totalPrice', $totalPrice);
// dd($totalPrice);
        return redirect()->route('output')->with('totalPrice', $totalPrice);
    }


    public function showCalculations()
    {
        $calculations = Calculations::all();
        return view('calculations', compact('calculations'));
    }


    public function Output()
    {
        $total_price = DB::table('calculations')->latest('created_at')->value('total_price');

        $product_concern_id = DB::table('calculations')->latest('created_at')->value('product_concern');
        $product_concern_rate = DB::table('product_concerns')->where('id', $product_concern_id)->value('rate');
        $selectedConcern =  DB::table('product_concerns')->where('id',$product_concern_id)->get();
        $products = DB::table('product_concerns')->where('id', $product_concern_id, 'products')->get();
      
        $features = DB::table('product_feature')
        ->join('features', 'product_feature.feature_id', '=', 'features.id')
        ->select('features.feature_name')
        ->where('product_feature.product_concern_id', $product_concern_id)
        ->get();

        return view('output', ['total_price' => $total_price, 'product_concern_rate' => $product_concern_rate, 'products' => $products,'features' => $features,'selectedConcern' => $selectedConcern]);

    }
}
