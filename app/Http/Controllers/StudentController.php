<?php
namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
class StudentController extends Controller {
    public function index() {
        $students = Student::all();
        return view("students.index", compact("students"));
    }
    public function create() {
        return view("students.create");
    }
    public function store(Request $request) {
        $request->validate([
            "name"=>"required",
            "roll_no"=>"required|unique:students",
            "class"=>"required",
            "email"=>"required|email"
        ]);
        Student::create($request->all());
        return redirect("/students")->with("success","Student Added!");
    }
    public function destroy($id) {
        Student::find($id)->delete();
        return back();
    }
}
