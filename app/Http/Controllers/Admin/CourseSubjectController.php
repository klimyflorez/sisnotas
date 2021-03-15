<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mappweb\Mappweb\Helpers\Table;
use Mappweb\Mappweb\Helpers\Util;
use Yajra\DataTables\Facades\DataTables;

class CourseSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(Request $request, Table $table, Course $course)
    {
        if ($request->ajax()) {
            $query = $course->subjects();

            return DataTables::eloquent($query)
                ->addIndexColumn()
                ->editColumn('subject_name', [$this, 'editSubjectNameColumn'])
                ->addColumn('action', [$this, 'editActionColumn'])
                ->orderColumn('id', '-id $1')
                ->rawColumns(['id', 'action'])
                ->toJson();
        }

        $table->addColumn(['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => '#', 'searchable' => false, 'orderable' => false]);
        $table->addColumn(['data' => 'subject_name', 'name' => 'subject_name', 'title' => __('models/subject.fillable.name')]);
        $table->addAction();
        $table->addParameters();
        $table->parameters([
            'processing' => true,
            'serverSide' => true,
        ]) ;
        $data['table'] = $table;
        $data['course'] = $course;

        return view('admin.course-subject.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create(Course $course)
    {
        $data['subjects']= Subject::query()->pluck('name', 'id');
        $data['course_id'] = $course->id;

        return  view('admin.course-subject.modal-inscription', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['success'] = true;

        try {
            $course = Course::query()->find($request->get('course_id'));
            $subject = Subject::query()->find($request->get('subject_id'));
            $teacher = Auth::id();
            $course->subjects()->attach($subject, ['id'=>Str::uuid(),'user_id'=>$teacher,'created_at'=>now(),'updated_at'=>now()]);

        }catch (\Exception $exception){
            $data['success'] = false;
        }

        $data['refresh_table'] = true;

        Util::addToastToData($data);

        return response()->crud($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param  \App\Course  $course
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function modalDestroy(Course $course, Subject  $subject)
    {
       // $data['id'] = //DB::table('course_subject')->where(['course_id' => $course->id, 'subject_id' => $subject->id])->first()->id;
        $data['course'] = $course;

        $data['subject'] = $subject;

        return view('admin.course-subject.modal-destroy', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Subject  $subject)
    {
        $data['success'] = true;

        try {
            $course->subjects()->detach($subject);

        }catch (\Exception $exception){
            $data['success'] = false;
        }

        $data['refresh_table'] = true;

        Util::addToastToData($data);

        return response()->crud($data);
    }

    /**
     * @param $object
     * @return string
     */
    public function editActionColumn($object)
    {

        return '<a class="open-modal" href="'. route('course-subjects.destroy-modal', ['course' => $object->course_id, 'subject'=>$object->subject_id]) .'" data-toggle="tooltip" title="'. __('models/course-subject.action.delete') .'"><i class="fa fa-close text-danger"></i></a>';

    }

    public function editSubjectNameColumn($object){
        return $object->name;
    }
}
