@csrf
<input type="text" name="name" id="name" placeholder="Nome:" value="{{ $user->name ?? old('name') }}">
<input type="email" name="email" id="email" placeholder="E-mail:" value="{{ $user->email ?? old('email') }}">
<input type="password" name="password" id="password" placeholder="Senha:">
<input type="file" name="image" id="image">

<button type="submit">Salvar</button>
