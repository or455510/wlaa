@extends('admin.layouts.app')

@section('content')
<div class="container-fluid mt-3">
    <h2>Edit Reward</h2>

    <form action="{{ route('admin.rewards.update', $reward->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $reward->title }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $reward->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Points Required</label>
            <input type="number" name="points_required" class="form-control" value="{{ $reward->points_required }}" required>
        </div>

        <div class="mb-3">
            <label>Image URL</label>
            <input type="url" name="image_url" class="form-control" value="{{ $reward->image_url }}">
        </div>

        <button type="submit" class="btn btn-success">Update Reward</button>
        <a href="{{ route('admin.rewards.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
