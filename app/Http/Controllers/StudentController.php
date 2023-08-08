<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\CoursesEmail;
use App\Models\Student;
use App\Models\Email;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\StoreEmailRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(5);
        $emails = Email::all();
        $what = "lo studente";

        return view('students.index', compact('students', 'emails', 'what'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        $counter = 2;

        return view('students.create', compact('courses', 'counter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $student = Student::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'city' => $request->city,
        ]);

        foreach ($request->emails as $studentEmail) {

            Email::create([
                'email' => $studentEmail,
                'student_id' => $student->id,
            ]);
        }

        $student->courses()->attach($request->courses);

        return redirect()->route('students.index')->with(['success' => 'Studente creato!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $hasCourse = false;

        foreach ($student->courses as $course) {
            if ($course) {
                $hasCourse = true;
                break;
            }
        };

        return view('students.show', compact('student', 'hasCourse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $courses = Course::all();
        $counter = 1;

        return view('students.edit', compact('student', 'counter', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentRequest $request, Student $student)
    {
        foreach ($student->emails as $oldEmail) {
            $oldEmail->delete();
        }

        foreach ($request->emails as $newEmail) {
            Email::create([
                'email' => $newEmail,
                'student_id' => $student->id,
            ]);
        }

        $student->update($request->all());

        $student->courses()->detach();
        $student->courses()->attach($request->courses);

        return redirect()->route('students.index')->with(['success' => 'Studente modificato!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        foreach ($student->emails as $email) {
            $email->delete();
        }

        $student->courses()->detach();

        $student->delete();

        return redirect()->back()->with(['danger' => 'Studente eliminato!']);
    }

    public function coursesEmail($id)
    {
        $student = Student::find($id);
        $corsi = [];

        foreach ($student->courses as $course) {
            $corsi[] = $course->name;
        }

        foreach ($student->emails as $email) {
            $mail = new CoursesEmail($student->name, $corsi);
            Mail::to($email)->send($mail);
        }

        return redirect()->back()->with(['success' => 'Email inviata!']);
    }

    public function destroyEmail($idEmail)
    {
        $email = Email::find($idEmail);

        $email->delete();

        return redirect()->back()->with(['danger' => 'Email eliminata!']);
    }
}
