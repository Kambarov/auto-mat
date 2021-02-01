<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index()
    {
        $billings = Billing::query()
            ->latest('id')
            ->with('billing')
            ->paginate(config('app.per_page'));

        return view('dashboard.billings.index', compact('billings'));
    }
}
