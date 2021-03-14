<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mappweb\Mappweb\Helpers\Table;
use Mappweb\Mappweb\Helpers\Util;
use Mappweb\Mappweb\Presenters\TablePresenter;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param Table $table
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(Request $request, Table $table)
    {
        if ($request->ajax()) {

            $query = Course::query();

            return DataTables::eloquent($query)
                ->addIndexColumn()
                ->addColumn('action', [$this, 'editActionColumn'])
                ->orderColumn('id', '-id $1')
                ->rawColumns(['id', 'action'])
                ->toJson();
        }

        $table->class = Course::class;
        $table->addColumns();
        $table->addParameters();
        $table->parameters([
            'processing' => true,
            'serverSide' => true,
        ]) ;
        $data['table'] = $table;

        return view('admin.course.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return $this->createOrEdit();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        return $this->storeOrUpdate($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return $this->createOrEdit($course->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CourseRequest  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        return $this->storeOrUpdate($request, $course->id);
    }


    /**
     * @param  \App\Course  $course
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function modalDestroy(Course $course)
    {
        $data['course'] = $course;

        return view('admin.course.modal-destroy', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $data['success'] = $course->delete();

        Util::addToastToData($data, true);

        return response()->crud($data);
    }

    /**
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function createOrEdit($id = null)
    {
        $data['course'] = Course::findOrNew($id);

        return view('admin.course.modal-add-edit', $data);
    }

    /**
     * @param $request
     * @param null $id
     * @return mixed
     */
    protected function storeOrUpdate($request, $id = null)
    {
        $data = $request->validated();

        $data['success'] = Util::updateOrCreate(Course::class, $data, $id);

        $data['refresh_table'] = true;

        Util::addToastToData($data);

        return response()->crud($data);
    }

    /**
     * @param Course $course
     * @return string
     */
    public function editActionColumn(Course $course)
    {
        $auth = Auth::user();
        $buttons = '<a href="'. route('course-students.index', ['course'=>$course->id]) .'" data-toggle="tooltip" data-placement="right" title="Listar Estudiantes"><i class="fa fa-check-square-o text-inverse m-r-10"></i></a>';
        if($auth->hasRole('admin')){

            $buttons .= '<a href="'. route('course-subjects.index', ['course'=>$course->id]) .'" data-toggle="tooltip" data-placement="right" title="Asginar materias"><i class="fa fa-check-square-o text-inverse m-r-10"></i></a>';
            $tablePresenter = new TablePresenter();
            $buttons .= '&nbsp;'.$tablePresenter->addEditDeleteActions('courses', ['course' => $course->id]); ;
        }
       return $buttons;
    }
}
