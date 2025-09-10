<!DOCTYPE html>
<html>

<head>
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2 class="mb-3">Todo List</h2>

    <!-- Form Tambah Todo -->
    <form action="{{ route('todos.store') }}" method="POST" class="d-flex mb-3">
        @csrf
        <input type="text" name="title" class="form-control me-2" placeholder="Tambahkan todo...">
        <button class="btn btn-primary">Tambah</button>
    </form>

    <!-- Daftar Todo -->
    <ul class="list-group">
        @foreach ($todos as $todo)
            <li class="list-group-item d-flex justify-content-between">
                <div>
                    <form action="{{ route('todos.update', $todo->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-sm {{ $todo->is_done ? 'btn-success' : 'btn-outline-success' }}">
                            ✓
                        </button>
                    </form>
                    <span class="{{ $todo->is_done ? 'text-decoration-line-through' : '' }}">
                        {{ $todo->title }}
                    </span>
                </div>
                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>

</html>
