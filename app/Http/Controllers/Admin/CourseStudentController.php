<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Inscription;
use App\Student;
use App\Subject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Mappweb\Mappweb\Helpers\Table;
use Yajra\DataTables\Facades\DataTables;

class CourseStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Http\JsonResponse|View
     */
    public function index(Request $request, Table $table, Course $course)
    {
        if ($request->ajax()) {

            $query = $course->inscriptions()->with('student');

            return DataTables::eloquent($query)
                ->addIndexColumn()
                ->editColumn('student_name', [$this, 'editStudentNameColumn'])
                ->addColumn('action', [$this, 'editActionColumn'])
                ->orderColumn('id', '-id $1')
                ->rawColumns(['id', 'action'])
                ->toJson();
        }

        $table->addColumn(['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => '#', 'searchable' => false, 'orderable' => false]);
        $table->addColumn(['data' => 'student_name', 'name' => 'student_name', 'title' => __('models/subject.fillable.name')]);
        $table->addAction();
        $table->addParameters();
        $table->parameters([
            'processing' => true,
            'serverSide' => true,
        ]) ;
        $data['table'] = $table;
        $data['course'] = $course;

        return view('admin.course-student.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create(Course $course, Student $student)
    {
        $inscriptions = Inscription::query()->where('course_id', $course->id)->where('student_id', $student->id)->latest();
        $teacher = Auth::id();
        $subject = $course->subjects()->wherePivot('user_id', $teacher)->first();

        dd($subject->id);

        return view('admin.course-student.modal-note');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function editStudentNameColumn(Inscription $inscription)
    {
        return $inscription->student->full_name??'';
    }

    /**
     * @param $object
     * @return string
     */
    public function editActionColumn(Inscription $inscription)
    {

        return '<a class="open-modal" href="'. route('course-student.note-modal', ['course' => $inscription->course_id, 'student'=>$inscription->student_id]) .'" data-toggle="tooltip" title="'. __('models/course-student.action.add') .'"><i class="fa fa-edit text-info"></i></a>';

    }
}
