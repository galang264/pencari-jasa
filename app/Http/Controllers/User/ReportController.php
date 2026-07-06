<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function create()
    {
        return view('user.report');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:150',
            'description' => 'required'
        ]);

        Report::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'pending'
        ]);

        return redirect('/user/report')
            ->with('success', 'Laporan berhasil dikirim');
    }
}