<x-app-layout>
    <h2>Edit</h2>
    <a href="./">Return to category</a>
    @foreach ($errors->all() as $message)
        <div>
            <h3>Error</h3>
            <p>{{ $message }}</p>
        </div>
    @endforeach
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="{{ $category->name }}"><br>
        <label for="is_active">Is active:</label><br>
        <input type="hidden" name="is_active" value="false">
        <input type="checkbox" id="is_active" name="is_active" value="true" {{ $category->is_active ? 'checked' : '' }}><br>
        <fieldset>
            <legend>Select a type:</legend>

            <div>
                <input type="radio" id="diepvries" name="type" value="diepvries" {{ $category->type == 'diepvries' ? 'checked' : '' }}/>
                <label for="diepvries">Diepvries</label>
            </div>

            <div>
                <input type="radio" id="kort_houdbaar" name="type" value="kort_houdbaar" {{ $category->type == 'kort_houdbaar' ? 'checked' : '' }}/>
                <label for="kort_houdbaar">Kort houdbaar</label>
            </div>

            <div>
                <input type="radio" id="lang_houdbaar" name="type" value="lang_houdbaar" {{ $category->type == 'lang_houdbaar' ? 'checked' : '' }}/>
                <label for="lang_houdbaar">lang houdbaar</label>
            </div>
        </fieldset>
        <br>
        <input type="submit" value="Submit">
    </form>
    <button onclick="confirm('Are you sure you want to delete this post?'); document.getElementById('submit_delete').click()">Delete</button>
    <form id="delete" method="POST" action="{{ route('categories.destroy', $category) }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete2" id="submit_delete" style="display: none">
    </form>
</x-app-layout>
