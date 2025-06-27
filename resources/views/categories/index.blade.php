<x-main>
    <h2>Categories</h2>
    <a href="./categories/create">Create new</a>
    <p>
        Choose a category:
    </p>
    <ul>
        @foreach($categories as $category)
            <li>
                <div style="padding: 20px; background-color: {{ $category->is_active ? 'black' : '#444' }}">
                    <a href="./categories/{{ $category->id }}">
                        Name: <span>{{ $category->name }}</span>
                        - Type: <span>{{ $category->type }}</span>
                        - Is active: <span>{{ $category->is_active }}</span>
                        - Created at: <span>{{ $category->created_at }}</span>
                        - Updated at: <span>{{ $category->updated_at }}</span>
                    </a>
                    <a href="./categories/{{ $category->id }}/edit">
                        <button>
                            Edit
                        </button>
                    </a>
                </div>
            </li>
        @endforeach
    </ul>
</x-main>
