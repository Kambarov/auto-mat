<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Orders\Payment;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index()
    {
        $billings = Payment::query()
            ->latest('id')
            ->with('order')
            ->paginate(config('app.per_page'));

        return view('dashboard.billings.index', compact('billings'));
    }
}
