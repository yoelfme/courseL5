<?php namespace CourseL5\Http\Controllers\Admin;

use CourseL5\Http\Requests;
use CourseL5\Http\Controllers\Controller;

use CourseL5\Http\Requests\CreateUserRequest;
use CourseL5\Http\Requests\EditUserRequest;
use CourseL5\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users  = User::paginate();
        return view('admin.users.index',compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.users.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
	public function store(CreateUserRequest $request)
	{

		$user = new User($request->all());
        return redirect()->route('admin.users.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $user = User::findOrFail($id);
		return view('admin.users.edit',compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditUserRequest $request, $id)
	{
		$user = User::findOrFail($id);
        $user->fill($request->all());
        $user->save();

        return redirect()->back();

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        //		User::destroy($id);
        $user = User::findOrFail($id);
        $user->delete();


        Session::flash('message',$user->full_name . ' fue eliminado de nuestros registros');

        return redirect()->route('admin.users.index');
	}

}
