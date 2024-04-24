<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BackupTransaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $transactions = BackupTransaction::where("vkn", Auth::user()->vkn)->paginate(10);
        return view("dashboard", compact("transactions"));
    }
}
