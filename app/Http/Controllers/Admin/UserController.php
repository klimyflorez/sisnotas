<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Mappweb\Mappweb\Helpers\Table;
use Mappweb\Mappweb\Helpers\Util;
use Mappweb\Mappweb\Presenters\TablePresenter;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
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
     * @param  UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        return $this->storeOrUpdate($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return $this->createOrEdit($user->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        return $this->storeOrUpdate($request, $user->id);
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function modalDestroy(User $user)
    {
        $data['user'] = $user;

        return view('admin.user.modal-destroy', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $data['success'] = $user->delete();

        Util::addToastToData($data, true);

        return response()->crud($data);
    }

    /**
     * @param null $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function createOrEdit($id = null)
    {
        $data['user'] = User::findOrNew($id);

        return view('admin.user.modal-add-edit', $data);
    }

    /**
     * @param $request
     * @param null $id
     * @return mixed
     */
    protected function storeOrUpdate($request, $id = null)
    {
        $data = $request->validated();

        $data['success'] = Util::updateOrCreate(User::class, $data, $id);

        $data['refresh_table'] = true;

        Util::addToastToData($data);

        return response()->crud($data);
    }

    /**
     * @param User $user
     * @return string
     */
    public function editActionColumn(User $user)
    {
        $tablePresenter = new TablePresenter();

        return $tablePresenter->addEditDeleteActions('users', ['user' => $user->id]);
    }

}
