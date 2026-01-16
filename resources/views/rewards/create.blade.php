@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4">إضافة جائزة جديدة</h2>

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
            <form action="{{ route('rewards.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">عنوان الجائزة</label>
                    <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">الوصف</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">النقاط المطلوبة</label>
                    <input type="number" name="points_required" class="form-control" required value="{{ old('points_required') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">صورة الجائزة</label>
                    <input type="file" name="image_url" class="form-control" accept="image/*" onchange="previewImage(event)">
                    <img id="image-preview" src="#" alt="Preview" class="mt-3" style="display:none; max-height:200px;">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('rewards') }}" class="btn btn-secondary">إلغاء</a>
                    <button type="submit" class="btn btn-primary px-4">حفظ الجائزة</button>
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
