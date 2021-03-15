<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subject;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mappweb\Mappweb\Helpers\Table;
use Mappweb\Mappweb\Helpers\Util;
use phpDocumentor\Reflection\DocBlock\Tags\Version;
use Yajra\DataTables\Facades\DataTables;

class SubjectTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(Request $request, Table $table, Subject $subject)
    {
        if ($request->ajax()) {

            $query = $subject->users();

            return DataTables::eloquent($query)
                ->addIndexColumn()
                ->editColumn('teacher_name', [$this, 'editTeacherNameColumn'])
                ->addColumn('action', [$this, 'editActionColumn'])
                ->orderColumn('id', '-id $1')
                ->rawColumns(['id', 'action'])
                ->toJson();
        }

        $table->addColumn(['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => '#', 'searchable' => false, 'orderable' => false]);
        $table->addColumn(['data' => 'teacher_name', 'name' => 'teacher_name', 'title' => __('models/subject.fillable.name')]);
        $table->addAction();
        $table->addParameters();
        $table->parameters([
            'processing' => true,
            'serverSide' => true,
        ]) ;
        $data['table'] = $table;
        $data['subject'] = $subject;

        return view('admin.subject-teacher.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create(Subject $subject)
    {

        $data['teachers'] = User::query()->whereHas('roles', function ($query){
            $query->where('slug', 'teacher');
        })->pluck('first_name', 'id');
        $data['subject_id']=$subject->id;

        return view('admin.subject-teacher.modal-inscription', $data);
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

            $subject = Subject::query()->find($request->get('subject_id'));
            $teacher = User::query()->find($request->get('teacher_id'));
            $subject->users()->attach($teacher, ['id'=>Str::uuid(),'created_at'=>now(),'updated_at'=>now()]);

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

    public function openModalInscription($id){

        $data['courses'] = Course::query()->pluck('name','id');
        $data['student_id'] = $id;

        return view('admin.inscription.modal-inscription', $data);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editTeacherNameColumn($object)
    {
        return $object->full_name;
    }

    /**
     * @param $object
     * @return string
     */
    public function editActionColumn($object)
    {

        //return '<a class="open-modal" href="'. route('course-student.note-modal', ['course' => $inscription->course_id, 'student'=>$inscription->student_id]) .'" data-toggle="tooltip" title="'. __('models/course-student.action.add') .'"><i class="fa fa-edit text-info"></i></a>';

    }
}
