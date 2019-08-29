<?php

namespace App\Http\Controllers;

use App\purchaseRequest;
use App\User;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('purchase', ['purchases' => purchaseRequest::all()]);
    }
}
