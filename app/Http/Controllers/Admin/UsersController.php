<?php namespace CourseL5\Http\Controllers\Admin;

use CourseL5\Http\Requests;
use CourseL5\Http\Controllers\Controller;

use CourseL5\Http\Requests\CreateUserRequest;
use CourseL5\Http\Requests\EditUserRequest;
use CourseL5\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller {

    protected $user;
    function __construct()
    {
        $this->middleware('auth');
        $this->beforeFilter('@findUser',['only' => ['show', 'edit', 'update', 'destroy']]);
    }

    public function findUser(Route $route)
    {
        $this->user = User::findOrFail($route->getParameter('users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
	public function index(Request $request)
	{

		$users = User::filterAndPaginate($request->get('name'),$request->get('type'));
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
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function store(CreateUserRequest $request)
	{

		$user = new User($request->all());
        $user->save();

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
		return view('admin.users.edit')->with('user',$this->user);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param EditUserRequest $request
     * @param  int $id
     * @return Response
     */
	public function update(EditUserRequest $request, $id)
	{

        $this->user->fill($request->all());
        $this->user->save();

        return redirect()->back();

	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
	public function destroy($id, Request $request)
	{
//        abort(500);
        $this->user->delete();
        $message = $this->user->full_name . ' fue eliminado de nuestros registros';

        if($request->ajax())
        {
            return response()->json([
                'id' => $this->user->id,
                'message' => $message
            ]);
            return $message;
        }

        Session::flash('message',$message);

        return redirect()->route('admin.users.index');
	}

}
