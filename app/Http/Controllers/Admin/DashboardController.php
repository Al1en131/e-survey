<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Management;
use App\Models\Participant;
use App\Models\Survey;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Management $management)
    {
        $totalSurveys = Survey::count();
        $totalParticipants = Participant::count();

        return view('pages.admin.index', compact('totalSurveys', 'totalParticipants'));
    }
}
