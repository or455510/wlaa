@extends('admin.layouts.app')

@section('content')
<div class="container-fluid mt-3">
    <h2>Add New Reward</h2>

    <form action="{{ route('admin.rewards.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Points Required</label>
            <input type="number" name="points_required" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Image URL</label>
            <input type="url" name="image_url" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Add Reward</button>
        <a href="{{ route('admin.rewards.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
