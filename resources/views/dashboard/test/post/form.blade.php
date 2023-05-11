@csrf
<label for="">T&iacute;tulo</label>
<input type="text" name="title" value="{{ old("title", $post->title) }}">

<label for="">Slug</label>
<input type="text" name="slug" value="{{ old("slug", $post->slug) }}" @readonly(true)>

<label for="">Categor&iacute;as</label>
<select name="category_id">
    <option>Selecciona una categor&iacute;a</option>
    @foreach ($categories as $title => $id)
        <option {{ old("category_id", $post->category_id) == $id ? "selected" : "" }} value="{{ $id }}">{{ $title }}</option>
    @endforeach
</select>

<label for="">Posteado</label>
<select name="posted">
    <option {{ old("posted", $post->posted) == "yes" ? "selected" : $post->posted }} value="yes">Si</option>
    <option {{ old("posted", $post->posted) == "not" ? "selected" : $post->posted }} value="not">No</option>
</select>

<label for="">Content</label>
<textarea name="content">{{ old("content", $post->content) }}</textarea>

<label for="">Description</label>
<textarea name="description">{{ old("description", $post->description)}}</textarea>

@if (@isset($task) && $task == "edit")
    <label for="">Imagen</label>
    <input type="file" name="image" id="">
@endif
       
<button type="submit">Enviar</button>