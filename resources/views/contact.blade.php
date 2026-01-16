@extends('layouts.app')

@section('content')
<section class="container" style="padding: 80px 0;">
    <h1>Contact Us</h1>
    <p>Reach out to us using the form below or via email and phone.</p>

    <form style="margin-top: 30px; display:flex; flex-direction: column; gap:15px;">
        <input type="text" placeholder="Your Name" required style="padding:10px; border-radius:5px; border:1px solid #ccc;">
        <input type="email" placeholder="Your Email" required style="padding:10px; border-radius:5px; border:1px solid #ccc;">
        <textarea placeholder="Your Message" required style="padding:10px; border-radius:5px; border:1px solid #ccc;" rows="5"></textarea>
        <button type="submit" class="btn">Send Message</button>
    </form>
</section>
@endsection
