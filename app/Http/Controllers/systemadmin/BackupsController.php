<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BackupsController extends Controller
{
    public function index()
    {
        $backupDir = config('filesystems.disks.local.root').'\\'.config('app.name');

        $backups = array_diff(scandir($backupDir), array('.', '..')); 
  
        return view('systemadmin.backup.index', compact('backups'));
    }

    public function manualDatabaseBackup()
    {
        Artisan::call('backup:run --only-db');
        return back()->withSuccess('Backup has completed. Please check your email for further details.');
    }
}
