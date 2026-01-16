@extends('layouts.app')

@section('content')
<section class="container" style="padding: 80px 0;">
    <h1>Our Services</h1>
    <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 30px;">
        <div style="flex:1; min-width:200px; background:#f4f4f4; padding:20px; border-radius:8px;">
            <h3>Service 1</h3>
            <p>Description of service 1.</p>
        </div>
        <div style="flex:1; min-width:200px; background:#f4f4f4; padding:20px; border-radius:8px;">
            <h3>Service 2</h3>
            <p>Description of service 2.</p>
        </div>
        <div style="flex:1; min-width:200px; background:#f4f4f4; padding:20px; border-radius:8px;">
            <h3>Service 3</h3>
            <p>Description of service 3.</p>
        </div>
    </div>
</section>
@endsection
