@csrf
<textarea name="body" id="body" cols="30" rows="10">{{ $comment->body ?? old('body') }}</textarea>
<input type="checkbox" name="visible" id="visible" {{ isset($comment) && $comment->visible ? 'checked="checked"' : "" }}> Visivel?

<button type="submit">Salvar</button>
