@extends('admin.layouts.app')

@section('content')
<div class="container-fluid mt-3">
    <h2>Rewards Management</h2>

<a href="{{ route('admin.rewards.create') }}" class="btn btn-primary mb-3">Add New Reward</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Points Required</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rewards as $reward)
            <tr>
                <td>{{ $reward->id }}</td>
                <td>{{ $reward->title }}</td>
                <td>{{ $reward->description }}</td>
                <td>{{ $reward->points_required }}</td>
                <td>
                    @if($reward->image_url)
                        <img src="{{ $reward->image_url }}" width="50">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.rewards.edit', $reward->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.rewards.destroy', $reward->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this reward?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
