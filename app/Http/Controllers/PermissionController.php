<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $params = request()->all();
//        $permissions = Permission::orderBy('id','DESC')->paginate(5);
        $permissions = Permission::orderBy('id','DESC')->get();
        return view('permission.index',compact('permissions'));
//            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('permission.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name'
        ]);

        \Spatie\Permission\Models\Permission::create($request->all());

        return redirect()->route('permission.index')
            ->with('success','Permission created successfully');
    }

    public function edit(Permission $permission)
    {
        return view('permission.edit',compact('permission'));
    }


    public function update(Request $request, Permission $permission)
    {
        request()->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
        ]);

        $permission->update($request->all());

        return redirect()->route('permission.index')
            ->with('info','Permissions updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = preg_replace('/[^0-9]/', '', $id);
        $permission = Permission::where('id', $id)->first();
        $permission->delete();
        return response()->json(['message' => 'Permissions deleted successfully']);

    }


}
