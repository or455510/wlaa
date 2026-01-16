@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h2>قائمة الجوائز</h2>
        <a href="{{ route('rewards.create') }}" class="btn btn-primary">إضافة جائزة جديدة</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">

        @foreach($rewards as $reward)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">

                @if($reward->image_url)
                    <img src="{{ asset('storage/' . $reward->image_url) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                @else
                    <img src="{{ asset('no-image.png') }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $reward->title }}</h5>
                    <p class="card-text">{{ $reward->description }}</p>

                    <p><strong>النقاط المطلوبة: </strong>{{ $reward->points_required }}</p>

                    <div class="d-flex justify-content-between">

                        <a href="{{ route('rewards.edit', $reward->id) }}" class="btn btn-warning btn-sm">
                            تعديل
                        </a>

                        <form action="{{ route('rewards.destroy', $reward->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                حذف
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
        @endforeach

    </div>

</div>
@endsection
