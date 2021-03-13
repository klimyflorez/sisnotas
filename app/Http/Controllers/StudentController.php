<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;
use Mappweb\Mappweb\Helpers\Table;
use Mappweb\Mappweb\Helpers\Util;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
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

            $query = User::query();

            return DataTables::eloquent($query)
                ->addColumn('action', [$this, 'editActionColumn'])
                ->orderColumn('id', '-id $1')
                ->rawColumns(['id', 'action'])
                ->toJson();
        }

        $table->class = User::class;
        $table->addColumns();
        $table->addParameters();
        $table->parameters([
            'processing' => true,
            'serverSide' => true,
        ]) ;
        $data['table'] = $table;

        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->createOrEdit();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->storeOrUpdate($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return $this->createOrEdit($student->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        return $this->storeOrUpdate($request, $student->id);
    }

    /**
     * @param  \App\Student  $student
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function modalDestroy(Student $student)
    {
        $data['student'] = $student;

        return view('admin.student.modal-destroy', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $data['success'] = $student->delete();

        Util::addToastToData($data, true);

        return response()->crud($data);
    }

    /**
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function createOrEdit($id = null)
    {
        //
    }

    /**
     * @param $request
     * @param null $id
     * @return mixed
     */
    protected function storeOrUpdate($request, $id = null)
    {
        //
    }

    /**
     * @param User $user
     * @return string
     */
    public function editActionColumn(User $user)
    {
        $_html = '<a class="btn open-modal" href="'. route('users.edit', ['user' => $user->id]) .'" data-toggle="tooltip" data-placement="right" title="'. __('models/user.action.edit') .'"><i class="fa fa-pencil text-primary"></i></a>';
        $_html .= '<a class="open-modal" href="'. route('users.destroy-modal', ['user' => $user->id]) .'" data-toggle="tooltip" title="'. __('models/user.action.delete') .'"><i class="fa fa-close text-danger"></i></a>';
        return $_html;
    }
}
