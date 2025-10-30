<?php
namespace App\Http\Controllers; 
use App\Models\Faculty;
use App\Models\University;
use App\Http\Requests\StoreFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;
use Illuminate\Http\Request;
class FacultyController extends Controller {
    public function index() {
        $faculties = Faculty::with('university')->latest()->paginate(10);
        return view('faculties.index', compact('faculties'));
    }
    public function create() {
        $universities = University::all();
        return view('faculties.create', compact('universities'));
    }
    public function store(StoreFacultyRequest $request) {
        Faculty::create($request->validated());
        return redirect()->route('faculties.index')->with('success', 'Faculty created successfully.');
    }
    public function show(Faculty $faculty) {
        return view('faculties.show', compact('faculty'));
    }
    public function edit(Faculty $faculty) {
        $universities = University::all();
        return view('faculties.edit', compact('faculty', 'universities'));
    }
    public function update(UpdateFacultyRequest $request, Faculty $faculty) {
        $faculty->update($request->validated());
        return redirect()->route('faculties.index')->with('success', 'Faculty updated successfully.');
    }
    public function destroy(Faculty $faculty) {
        $faculty->delete();
        return redirect()->route('faculties.index')->with('success', 'Faculty deleted successfully.');
    }
}