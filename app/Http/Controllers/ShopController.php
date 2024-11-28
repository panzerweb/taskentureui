<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\ShopItem;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $items = ShopItem::all()->groupBy('category');
        return view('/pages/Shop', compact('items'));
    }

    public function purchase(Request $request, $id)
    {
        $item = ShopItem::findOrFail($id); // Fetch the item being purchased
        $user = auth()->user(); // Get the currently logged-in user

        // Check if the user has enough coins
        $userCoins = $user->coins->sum('gold_coins'); // Total coins available
        if ($userCoins < $item->price) {
            return redirect()->route('shop.index')->with('error', 'Not enough coins to buy this item.');
        }

        // Begin a transaction to ensure both coin deduction and item purchase succeed together
        DB::beginTransaction();
        try {
            // Deduct the item's price from the user's coins
            $userCoin = $user->coins->first(); // Assuming one record tracks the user's total coins
            $userCoin->gold_coins -= $item->price;
            $userCoin->save();

            // Attach the purchased item to the user
            $user->items()->attach($item->id);

            // Commit the transaction
            DB::commit();

            return redirect()->route('shop.index')->with('success', 'Purchase successful!');
        } catch (\Exception $e) {
            // Rollback the transaction on failure
            DB::rollBack();

            return redirect()->route('shop.index')->with('error', 'Failed to complete the purchase. Please try again.');
        }
    }




}
