<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;
use App\Note;
use Illuminate\Http\Request;
use Mappweb\Mappweb\Helpers\Table;
use Mappweb\Mappweb\Helpers\Util;
use Mappweb\Mappweb\Presenters\TablePresenter;
use Yajra\DataTables\Facades\DataTables;

class NoteController extends Controller
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

            $query = Note::query()->with(['subject']);

            return DataTables::eloquent($query)
                ->editColumn('inscription', [$this, 'editInscriptionColumn'])
                ->addColumn('action', [$this, 'editActionColumn'])
                ->orderColumn('id', '-id $1')
                ->rawColumns(['id', 'action'])
                ->toJson();
        }

        $table->class = Note::class;
        $table->addColumns();
        $table->addParameters();
        $table->parameters([
            'processing' => true,
            'serverSide' => true,
        ]) ;
        $data['table'] = $table;

        return view('admin.note.index', $data);
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
     * @param  NoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request)
    {
        return $this->storeOrUpdate($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return $this->createOrEdit($note->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NoteRequest  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(NoteRequest $request, Note $note)
    {
        return $this->storeOrUpdate($request, $note->id);
    }

    /**
     * @param  \App\Note  $note
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function modalDestroy(Note $note)
    {
        $data['student'] = $note;

        return view('admin.note.modal-destroy', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $data['success'] = $note->delete();

        Util::addToastToData($data, true);

        return response()->crud($data);
    }

    /**
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function createOrEdit($id = null)
    {
        $data['note'] = Note::findOrNew($id);

        return view('admin.note.modal-add-edit', $data);
    }

    /**
     * @param $request
     * @param null $id
     * @return mixed
     */
    protected function storeOrUpdate($request, $id = null)
    {
        $data = $request->validated();

        $data['success'] = Util::updateOrCreate(Note::class, $data, $id);

        $data['refresh_table'] = true;

        Util::addToastToData($data);

        return response()->crud($data);
    }

    /**
     * @param Note $note
     * @return string
     */
    public function editInscriptionColumn(Note $note)
    {
        return $note->inscription->studet->full_name ?? '';
    }

    /**
     * @param Note $note
     * @return string
     */
    public function editActionColumn(Note $note)
    {
        $tablePresenter = new TablePresenter();

        return $tablePresenter->addEditDeleteActions('notes', ['notes' => $note->id]);
    }
}
