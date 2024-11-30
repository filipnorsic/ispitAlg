<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function storeBook(Request $request)
    {
        // Validate the 'naziv' field
        $validated = $request->validate([
            'naziv' => 'required|string|max:255',
        ]);

        // If validation passes
        return response()->json([
            'message' => 'Zahtev uspešan',
        ], 200);
    }

    public function getBooksByName(Request $request)
    {
        // Mock response for testing
        return response()->json([
            'books' => ['Book 1', 'Book 2'],
        ], 200);
    }
}
