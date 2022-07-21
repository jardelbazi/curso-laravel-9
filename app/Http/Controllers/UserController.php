<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function __construct(
		protected User $user
	) {
	}

    public function index(Request $request)
	{
		$search = $request->search;

		$users = $this->user->where(function ($query) use ($search) {
			if ($search) {
				$query->where('email', $search)
					->orWhere('name', 'LIKE', "%{$search}%");
			}
		})->with(['comments'])->get();

		return view('users.index', [
			'users' => $users
		]);
	}

	public function show($id)
	{
		$user = $this->user->find($id);

		if (blank($user))
			return redirect()->route('users.index');

		return view('users.show', [
			'user' => $user
		]);
	}

	public function create()
	{
		return view('users.create');
	}

	public function store(UserFormRequest $request)
	{
		$data = $request->all();
		$data['password'] = bcrypt($request->password);

		$this->user->create($data);

		return redirect()->route('users.index');
	}

	public function edit($id)
	{
		$user = $this->user->find($id);

		if (blank($user))
			return redirect()->route('users.index');

		return view('users.edit', [
			'user' => $user
		]);
	}

	public function update(UserFormRequest $request, $id)
	{
		$user = $this->user->find($id);

		if (blank($user))
			return redirect()->route('users.index');

		$data = $request->only('name', 'email');

		if (filled($request['password']))
			$data['password'] = bcrypt($request->password);

		$user->update($data);

		return redirect()->route('users.index');
	}

	public function destroy($id)
	{
		$user = $this->user->find($id);

		if (blank($user))
			return redirect()->route('users.index');

		$user->delete();

		return redirect()->route('users.index');
	}
}
