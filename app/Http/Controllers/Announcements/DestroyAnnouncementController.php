<?php

namespace App\Http\Controllers\Announcements;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DestroyAnnouncementController extends Controller
{
    public function __invoke(Announcement $announcement)
    {
        $announcement->delete();

        Alert::success('¡Convocatoria eliminada!');
        return redirect()->back();
    }
}
