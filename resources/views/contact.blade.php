@extends('frontend.app')

@section('content')
<section class="contact-page">
    <div class="contact-shell">
        <header class="contact-intro">
            <h1>Contact Us</h1><span class="contact-title-line"></span>
            <p>We'd love to hear from you! Fill in the form below and our team will<br class="desktop-break"> get back to you as soon as possible.</p>
        </header>
        <div class="contact-content">
            <aside class="contact-details" aria-label="Contact details">
                <h2>Get In Touch</h2>
                <div class="contact-detail"><span class="contact-icon"><i class="fa-regular fa-envelope"></i></span><div><h3>Email Us</h3><p>info@pawradise.com</p></div></div>
                <div class="contact-detail"><span class="contact-icon"><i class="fa-solid fa-phone"></i></span><div><h3>Call Us</h3><p>+254 712 345 678</p></div></div>
                <div class="contact-detail"><span class="contact-icon"><i class="fa-solid fa-location-dot"></i></span><div><h3>Our Location</h3><p>Nairobi, Kenya</p></div></div>
            </aside>
            <form action="{{ route('contact.send') }}" method="POST" class="contact-form">
                @csrf
                                <input type="hidden" name="subject" value="General inquiry">`r`n<input type="text" name="name" placeholder="Name" required aria-label="Name">
                <input type="email" name="email" placeholder="Email" required aria-label="Email">
                <textarea name="message" placeholder="Message" required aria-label="Message"></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</section>
@endsection

<style>
@import url('https://fonts.googleapis.com/css2?family=Chewy&family=Nunito:wght@400;600;700;800&display=swap');
.contact-page{min-height:507px;background:#fff1d3;color:#101010;padding:34px 24px 50px}.contact-shell{width:min(100%,752px);margin:0 auto}.contact-intro h1,.contact-details h2,.contact-detail h3{font-family:Chewy,cursive}.contact-intro h1{font-size:39px;line-height:1;margin:0}.contact-title-line{display:block;width:39px;height:4px;background:#ff7114;margin:8px 0}.contact-intro p{font:400 12px/17px Nunito,sans-serif;color:#303b53;margin:0}.contact-content{display:grid;grid-template-columns:238px 422px;column-gap:60px;align-items:start;margin-top:42px}.contact-details h2{font-size:16px;line-height:1;margin:0 0 19px}.contact-detail{display:flex;align-items:center;gap:10px;margin-bottom:17px;font-family:Nunito,sans-serif}.contact-icon{width:28px;height:28px;display:inline-flex;flex:0 0 28px;align-items:center;justify-content:center;border-radius:50%;background:#ff7114;color:#fff;font-size:13px}.contact-detail h3{margin:0 0 1px;font-size:10px;line-height:12px}.contact-detail p{margin:0;color:#303b53;font:400 10px/12px Nunito,sans-serif}.contact-form{padding:20px;border-radius:11px;background:#fffdfa;box-shadow:0 5px 9px rgba(81,65,38,.16);display:flex;flex-direction:column;gap:13px}.contact-form input,.contact-form textarea{box-sizing:border-box;width:100%;border:1px solid #c6cfdb;border-radius:8px;background:#fffefd;outline:0;color:#303b53;font:600 10px Nunito,sans-serif}.contact-form input{height:37px;padding:0 10px}.contact-form textarea{height:97px;padding:10px;resize:vertical}.contact-form input::placeholder,.contact-form textarea::placeholder{color:#909caf;opacity:1}.contact-form input:focus,.contact-form textarea:focus{border-color:#ff7114;box-shadow:0 0 0 2px rgba(255,113,20,.15)}.contact-form button{height:36px;border:0;border-radius:999px;background:#ff7114;color:#fff;cursor:pointer;font:800 10px Nunito,sans-serif}.contact-form button:hover{background:#e95e06}@media(max-width:650px){.contact-page{padding:30px 20px 42px}.contact-content{grid-template-columns:1fr;gap:28px;margin-top:34px}.contact-form{max-width:422px}.desktop-break{display:none}}
body:has(.contact-page){margin:0;background:#fff}body:has(.contact-page) nav{height:40px;background:#fff1d3!important;border-bottom:1px solid rgba(170,139,90,.16)!important;box-shadow:none!important;position:static!important}body:has(.contact-page) nav>.page-container{max-width:336px;padding:0;margin:0 auto}body:has(.contact-page) nav>.page-container>div{height:39px;justify-content:center}body:has(.contact-page) nav>.page-container>div>a,body:has(.contact-page) nav>.page-container>div>div:nth-child(3){display:none!important}body:has(.contact-page) nav>.page-container>div>div:nth-child(2){display:flex!important;height:100%;align-items:center;gap:22px}body:has(.contact-page) nav>.page-container>div>div:nth-child(2) a{height:100%;display:inline-flex;align-items:center;border-bottom:1px solid transparent;color:#151515!important;font:600 10px Nunito,sans-serif;text-decoration:none}body:has(.contact-page) nav>.page-container>div>div:nth-child(2)body:has(.contact-page) nav>.page-container>div>div:nth-child(2) a:last-child{color:#ff7114!important;border-color:#ff7114}body:has(.contact-page) footer{display:none!important}@media(max-width:767px){body:has(.contact-page) nav>.page-container>div>div:nth-child(2){gap:clamp(12px,5vw,22px)}body:has(.contact-page) nav>.page-container>div>button{display:none!important}}
</style>
<script>document.addEventListener('DOMContentLoaded',function(){var links=document.querySelectorAll('nav a');if(links.length){links[3].textContent='Events';links[links.length-1].textContent='Contact Us';}});</script>




