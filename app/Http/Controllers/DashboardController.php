<?php

namespace App\Http\Controllers;

use App\Models\OverallQuiz;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jmlUser = count(User::where('role', 'user')->get());
        $jmlSoal = count(Question::all());
        $jmlSoalAll = count(OverallQuiz::all());
        return view('pages.dashboard', [
            'title' => 'Dashboard',
            'jmlUser' => $jmlUser,
            'jmlSoal' => $jmlSoal,
            'jmlSoalAll' => $jmlSoalAll,
        ]);
    }
}
