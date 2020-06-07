<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RoleUser;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RoleUserFormRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class RoleUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //  $request->user()->authorizeRoles('admin');  
        if ($request) {
            $query = trim($request->get('searchText'));

            $role_user = DB::table('role_user as ru')
                ->join('users as u', 'u.id', '=', 'ru.user_id')
                ->join('roles as ro', 'ro.id', '=', 'ru.role_id')
                ->select('ru.id',   'u.name', 'ro.description')
                ->where('u.name', 'LIKE', '%' . $query . '%')
                //->orwhere('ro.name', 'LIKE', '%' . $query . '%')//
                ->orderBy('ru.id', 'desc')
                ->groupBy('ru.id', 'u.name', 'ro.description')
                ->paginate(10);
            return view('role_user.index', ["role_user" => $role_user, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        // $request->user()->authorizeRoles('admin');  
        ////array Roles
        $rol = DB::table('roles')
            ->select('roles.description', 'roles.id')
            ->get();


        ////array Users
        /*$users=DB::table('users as e')
       ->select(DB::raw('CONCAT(e.id, " " ,e.name, " ",e.email) as users'),'e.id')
       ->get();*/

        $users = DB::table('users')
            ->select('users.name', 'users.email', 'users.id', 'users.estado')
            ->Where('users.estado', '=', '1')
            ->WhereNotIn('users.id', function ($query) {
                $query->select('role_user.user_id')
                    ->from('role_user');
            })->from('users')
            ->get();



        return view('role_user.create', ["rol" => $rol, "users" => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleUserFormRequest $request)
    {
        $user_role = new RoleUser;
        $user_role->role_id = $request->get('role_id');
        $user_role->user_id = $request->get('user_id');
        $user_role->save();

        return Redirect::to('role_user');
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
    public function update(RoleUserFormRequest $request, $id)
    {
        $user_role = new RoleUser;
        $user_role->role_id = $request->get('role_id');
        $user_role->user_id = $request->get('user_id');
        $user_role->update();

        return Redirect::to('role_user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $request->user()->authorizeRoles('admin');

        $user_role = RoleUser::findOrFail($id);
        $user_role->delete();

        return Redirect::to('role_user');
    }
}
