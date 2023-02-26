<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    
    public function index()
    {
        $student = Student::all();
        return view('index', compact('student'));
    }
   
    public function create()
    {
        return view('create');
    }
    
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|numeric',
            'password' => 'required|max:255',
        ]);
        $student = Student::create($storeData);
        return redirect('/students')->with('completed', 'Student has been saved!');
    }
   
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('edit', compact('student'));
    }
    
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|numeric',
            'password' => 'required|max:255',
        ]);
        Student::whereId($id)->update($updateData);
        return redirect('/students')->with('completed', 'Student has been updated');
    }
    
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('/students')->with('completed', 'Student has been deleted');
    }
}