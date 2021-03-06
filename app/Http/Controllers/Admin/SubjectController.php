<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Subject;
use Illuminate\Http\Request;
use Mappweb\Mappweb\Helpers\Table;
use Mappweb\Mappweb\Helpers\Util;
use Mappweb\Mappweb\Presenters\TablePresenter;
use Yajra\DataTables\Facades\DataTables;

class SubjectController extends Controller
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

            $query = Subject::query();

            return DataTables::eloquent($query)
                ->addIndexColumn()
                ->addColumn('action', [$this, 'editActionColumn'])
                ->orderColumn('id', '-id $1')
                ->rawColumns(['id', 'action'])
                ->toJson();
        }

        $table->class = Subject::class;
        $table->addColumns();
        $table->addParameters();
        $table->parameters([
            'processing' => true,
            'serverSide' => true,
        ]) ;
        $data['table'] = $table;

        return view('admin.subject.index', $data);
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
     * @param  SubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        return $this->storeOrUpdate($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return $this->createOrEdit($subject->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SubjectRequest  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, Subject $subject)
    {
        return $this->storeOrUpdate($request, $subject->id);
    }

    /**
     * @param  \App\Subject  $subject
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function modalDestroy(Subject $subject)
    {
        $data['subject'] = $subject;

        return view('admin.subject.modal-destroy', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $data['success'] = $subject->delete();

        Util::addToastToData($data, true);

        return response()->crud($data);
    }

    /**
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function createOrEdit($id = null)
    {
        $data['subject'] = Subject::findOrNew($id);

        return view('admin.subject.modal-add-edit', $data);
    }

    /**
     * @param $request
     * @param null $id
     * @return mixed
     */
    protected function storeOrUpdate($request, $id = null)
    {
        $data = $request->validated();

        $data['success'] = Util::updateOrCreate(Subject::class, $data, $id);

        $data['refresh_table'] = true;

        Util::addToastToData($data);

        return response()->crud($data);
    }

    /**
     * @param Subject $subject
     * @return string
     */
    public function editActionColumn(Subject $subject)
    {
        $buttons = '<a href="'. route('subject-teachers.index', ['subject'=>$subject->id]) .'" data-toggle="tooltip" data-placement="right" title="Inscribir docentes"><i class="fa fa-check-square-o text-inverse m-r-10"></i></a>';

        $tablePresenter = new TablePresenter();

        $buttons.= '&nbsp;';
        return $buttons.$tablePresenter->addEditDeleteActions('subjects', ['subject' => $subject->id]);
    }
}
