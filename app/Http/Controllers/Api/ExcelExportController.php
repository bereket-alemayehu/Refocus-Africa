<?php

namespace App\Http\Controllers\Api;

use App\Exports\UsersExport; 
use Maatwebsite\Excel\Facades\Excel; 
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ExcelExportController extends Controller
{
    public function exportUsers()
    {
        
        $fileName = 'registered_users_' . now()->format('Ymd_His') . '.xlsx';

        return Excel::download(new UsersExport, $fileName);
    }
}