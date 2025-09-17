<?php

namespace App\Http\Controllers\Announcements;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UpdateAnnouncementController extends Controller
{
    public function __invoke(Request $request, Announcement $announcement)
    {
        $announcement->initial_date = $request->initial_date;
        $announcement->final_date = $request->final_date;
        $announcement->save();

        Alert::success('¡Convocatoria actualizada!');
        return redirect()->route('announcements.index');
    }
}
