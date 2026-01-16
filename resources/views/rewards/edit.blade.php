@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4">تعديل الجائزة</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('rewards.update', $reward->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">عنوان الجائزة</label>
                    <input type="text" name="title" class="form-control" required value="{{ old('title', $reward->title) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">الوصف</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ old('description', $reward->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">النقاط المطلوبة</label>
                    <input type="number" name="points_required" class="form-control" required value="{{ old('points_required', $reward->points_required) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">صورة الجائزة</label>
                    <input type="file" name="image_url" class="form-control" accept="image/*" onchange="previewImage(event)">
                    <img id="image-preview" src="{{ $reward->image_url ? asset('storage/' . $reward->image_url) : '#' }}" alt="Preview" class="mt-3" style="max-height:200px; {{ $reward->image_url ? '' : 'display:none;' }}">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('rewards') }}" class="btn btn-secondary">إلغاء</a>
                    <button type="submit" class="btn btn-primary px-4">تحديث الجائزة</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('image-preview');
        output.src = reader.result;
        output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
