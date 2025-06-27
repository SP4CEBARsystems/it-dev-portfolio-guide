<x-main>
    <h2>Create</h2>
    <a href="./">Return to categories</a>
    @foreach ($errors->all() as $message)
        <div>
            <h3>Error</h3>
            <p>{{ $message }}</p>
        </div>
    @endforeach
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="is_active">Is active:</label><br>
        <input type="hidden" name="is_active" value="false">
        <input type="checkbox" id="is_active" name="is_active" value="true"><br>
        <fieldset>
            <legend>Select a type:</legend>

            <div>
                <input type="radio" id="diepvries" name="type" value="diepvries" checked />
                <label for="diepvries">Diepvries</label>
            </div>

            <div>
                <input type="radio" id="kort_houdbaar" name="type" value="kort_houdbaar" />
                <label for="kort_houdbaar">Kort houdbaar</label>
            </div>

            <div>
                <input type="radio" id="lang_houdbaar" name="type" value="lang_houdbaar" />
                <label for="lang_houdbaar">lang houdbaar</label>
            </div>
        </fieldset>
        <br>
        <input type="submit" value="Submit">
    </form>
</x-main>
