<x-app-layout>
    <h2>Category</h2>
    <a href="./">Return to categories</a>
    <div style="padding: 20px; background-color: {{ $category->is_active ? 'black' : '#444' }}">
        Name: <span>{{ $category->name }}</span>
        - Type: <span>{{ $category->type }}</span>
        - Is active: <span>{{ $category->is_active }}</span>
        - Created at: <span>{{ $category->created_at }}</span>
        - Updated at: <span>{{ $category->updated_at }}</span>
        <a href="./{{ $category->id }}/edit">
            <button>
                Edit
            </button>
        </a>
    </div>
</x-app-layout>
