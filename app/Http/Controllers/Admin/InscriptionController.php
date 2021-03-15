<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\InscriptionRequest;
use App\Inscription;
use App\Student;
use Illuminate\Http\Request;
use Mappweb\Mappweb\Helpers\Table;
use Mappweb\Mappweb\Helpers\Util;
use Mappweb\Mappweb\Presenters\TablePresenter;
use Yajra\DataTables\Facades\DataTables;

class InscriptionController extends Controller
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

            $query = Inscription::query()->with(['course', 'student']);

            return DataTables::eloquent($query)
                ->addIndexColumn()
                ->addColumn('action', [$this, 'editActionColumn'])
                ->orderColumn('id', '-id $1')
                ->rawColumns(['id', 'action'])
                ->toJson();
        }

        $table->class = Inscription::class;
        $table->addColumns();
        $table->addParameters();
        $table->parameters([
            'processing' => true,
            'serverSide' => true,
        ]) ;
        $data['table'] = $table;

        return view('admin.inscription.index', $data);
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
     * @param  InscriptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InscriptionRequest  $request)
    {
        return $this->storeOrUpdate($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function show(Inscription $inscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscription $inscription)
    {
        return $this->createOrEdit($inscription->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscription $inscription)
    {
        return $this->storeOrUpdate($request, $inscription->id);
    }


    public function openModalInscription($id){

        $data['courses'] = Course::query()->pluck('name','id');
        $data['student_id'] = $id;

        return view('admin.inscription.modal-inscription', $data);
    }

    /**
     * @param  \App\Inscription  $inscription
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function modalDestroy(Inscription $inscription)
    {
        $data['inscription'] = $inscription;

        return view('admin.inscription.modal-destroy', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inscription $inscription)
    {
        $data['success'] = $inscription->delete();

        Util::addToastToData($data, true);

        return response()->crud($data);
    }

    /**
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function createOrEdit($id = null)
    {
        $data['inscription'] = Inscription::findOrNew($id);

        return view('admin.inscription.modal-add-edit', $data);
    }

    /**
     * @param $request
     * @param null $id
     * @return mixed
     */
    protected function storeOrUpdate($request, $id = null)
    {
        $data = $request->validated();

        $data['success'] = Util::updateOrCreate(Inscription::class, $data, $id);

        Util::addToastToData($data);

        return response()->crud($data);
    }

    /**
     * @param Inscription $inscription
     * @return string
     */
    public function editActionColumn(Inscription $inscription)
    {

        return '<a class="open-modal" href="'. route('inscriptions.destroy-modal', ['inscription' => $inscription->id]) .'" data-toggle="tooltip" title="'. __('models/inscription.action.delete') .'"><i class="fa fa-close text-danger"></i></a>';

    }
}
