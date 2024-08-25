<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

class CheckBookOwnership
{
    public function handle($request, Closure $next)
    {
        $book = $request->route('book');

        // Assuming there's an 'owner_id' field in the 'books' table to check ownership
        if ($book->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
