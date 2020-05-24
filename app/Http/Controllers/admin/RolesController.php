<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('Admin')){

            return view('admin.roles.index',[ 'roles' => Role::all() ]);

        }
        else{

            if( auth()->user()->hasPermissionTo('ver roles'))
            {
                return view('admin.roles.index',[ 'roles' => Role::all() ]);
            }
    
            return view('admin.dashboard');
        }
    }


    /**
     * prueba nro 3
     * prueba nro 2
     * Show the form for creating a new resourceasdasd.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->hasRole('Admin')){
        
            return view('admin.roles.create',[
                'role' => new Role,
                'permissions' => Permission::pluck('name','id')
            ]);
        }
        else
        {
            if(auth()->user()->hasPermissionTo('crear roles')){
                return view('admin.roles.create',[
                    'role' => new Role,
                    'permissions' => Permission::pluck('name','id')
                ]);
            }
            return back()->with('flash','no puedes');

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'name' => 'required|unique:roles',
        ]);

        $role = Role::create($data);

        if($request->has('permissions'))
        {
            
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.index')->withFlash('El rol fue creado Correctamente');
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
    public function edit(Role $role)
    {
        if(auth()->user()->hasRole('Admin')){
        
            return view('admin.roles.edit',[
                'role' => $role,
                'permissions' => Permission::pluck('name','id')
                ]);
        }
        else
        {
            if(auth()->user()->hasPermissionTo('editar roles')){
                return view('admin.roles.edit',[
                    'role' => $role,
                    'permissions' => Permission::pluck('name','id')
                    ]);
            }
            return back()->with('flash','no puedes');

        }
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

        $data= $request->validate([
            'name' => 'required|unique:roles,name,'. $role->id,
        ]);

        $role->update($data);

        $role->permissions()->detach();

        if($request->has('permissions'))
        {
            
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.index')->withFlash('El rol fue actualizado Correctamente');

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {

        if(auth()->user()->hasRole('Admin')){
            $role->delete();

            return redirect()->route('admin.roles.index')->withFlash('el rol fue eliminado');
        }
        else
        {
            if(auth()->user()->hasPermissionTo('eliminar roles')){
                $role->delete();

                return redirect()->route('admin.roles.index')->withFlash('el rol fue eliminado');
            }
            return back()->with('flash','no puedes');

        }
        $role->delete();

        return redirect()->route('admin.roles.index')->withFlash('el rol fue eliminado');
    }
}
