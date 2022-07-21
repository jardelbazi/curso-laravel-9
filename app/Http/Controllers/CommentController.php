<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use App\Models\{
	Comment,
	User
};
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(
		protected Comment $comment,
		protected User $user,
	) {
	}

	public function index(Request $request, $userId)
	{
		$user = $this->user->find($userId);

		if (blank($user))
			return redirect()->route('users.index');

		$search = $request->search;

		$comments = $user->comments()->where(function ($query) use ($search) {
			if ($search)
				$query->where('body', 'LIKE', "%{$search}%");
		})->paginate();

		return view('users.comments.index', [
			'user' => $user,
			'comments' => $comments,
		]);
	}

	public function create($userId)
	{
		$user = $this->user->find($userId);

		if (blank($user))
			return redirect()->route('users.index');

		return view('users.comments.create', [
			'user' => $user,
		]);
	}

	public function store(CommentFormRequest $request, $userId)
	{
		$user = $this->user->find($userId);

		if (blank($user))
			return redirect()->route('users.index');

		$user->comments()->create([
			'body' => $request->body,
			'visible' => filled($request->visible)
		]);

		return redirect()->route('comments.index', $user->id);
	}

	public function edit($userId, $id)
	{
		$comment = $this->comment->find($id);

		if (blank($comment))
			return redirect()->route('comments.index', $userId);

		$user = $comment->user;

		return view('users.comments.edit', [
			'comment' => $comment,
			'user' => $user,
		]);
	}


	public function update(CommentFormRequest $request, $id)
	{
		$comment = $this->comment->find($id);

		if (blank($comment))
			return redirect()->route('users.index');

		$comment->update([
			'body' => $request->body,
			'visible' => filled($request->visible)
		]);

		return redirect()->route('comments.index', $comment->user_id);
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
