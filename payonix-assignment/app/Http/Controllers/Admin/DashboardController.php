<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalUsers = User::count();
        $totalItems = Item::count();

        return view('admin.dashboard', compact('totalUsers', 'totalItems'));
    }
}