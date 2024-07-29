<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccessibilityController extends Controller
{
    public function toggleAccessibility(Request $request)
    {
        if ($request->has('toggle')) {
            if (session('accessibleMode')) {
                session()->forget('accessibleMode');
            } else {
                session(['accessibleMode' => true]);
            }
        }

        return redirect()->back();
    }
}
