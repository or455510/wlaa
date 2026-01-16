@extends('admin.layouts.app')

@section('content')

<div class="card card-body">
    <h3 class="mb-3">Users Management</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Total Points</th>
                <th>Role</th>
                <th width="200">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>

                    <td>{{ $u->points->sum('points') }}</td>

                    <td>{{ $u->role }}</td>

                    <td>
                        <a href="{{ route('admin.users.edit', $u->id) }}" class="btn btn-primary btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.users.destroy', $u->id) }}"
                              method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Delete user?')"
                                    class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
