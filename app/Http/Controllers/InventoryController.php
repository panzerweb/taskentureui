<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\ShopItem;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $items = $user->items; // Fetch all purchased items

        // Add "All" category that contains all items
        $categorizedItems = $items->groupBy('category');
        $categorizedItems->put('all', $items); // Add all items under "All"

        return view('/pages/Inventory', compact('categorizedItems'));
    }
}



