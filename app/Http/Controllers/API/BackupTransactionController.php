<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\BackupTransaction;
use App\Http\Controllers\Controller;

class BackupTransactionController extends Controller
{



    public function store(Request $request)
    {
        $now = Carbon::now();

        $user = User::where('vkn', $request->vkn)->first();
        $diff = (int) Carbon::parse($user->license_finish)->diffInDays($now);
        if ($diff > 0) {
            return response()->json(["message" => "License expired", "success" => "false", "licenseFinish" => $user->license_finish], 401);
        }



        $transaction = BackupTransaction::create([
            "vkn" => $request->vkn,
            "db_name" => $request->db_name,
            "file_name" => $request->file_name ?? "",
            "backup_name" => $request->backup_name ?? "",
            "type" => $request->type,
            "description" => $request->description,
            "remaining_disk_space" => $request->remaining_disk_space,
        ]);


        return response()->json([
            "success" => true,
            "message" => "Transaction created successfully",
            "data" => $transaction
        ]);
    }
}
