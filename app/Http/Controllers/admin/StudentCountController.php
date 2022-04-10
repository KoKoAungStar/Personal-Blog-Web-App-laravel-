<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StudentCount;

class StudentCountController extends Controller
{
    public function index(){
        $student_count = StudentCount::all();
        $student = StudentCount::find(1);
        return view('admin-panel.student-count.index', compact('student_count', 'student'));
    }
    public function store(Request $request){
        $request->validate([
            'count' => 'required',
        ]);
        StudentCount::create([
            'count' => $request->count
        ]);
        return back();
    }
    public function update(Request $request, $id){
        $student = StudentCount::find($id);

        $request->validate([
            'count' => 'required',
        ]);

        $student->update([
            'count' => $student->count + $request->count,
        ]);

        return back();
    }
}
