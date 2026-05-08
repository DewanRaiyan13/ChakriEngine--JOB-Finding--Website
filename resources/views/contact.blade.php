@extends('layouts.app')
@section('title', 'Contact Us | ChakriEngine')

@section('styles')
<style>
    .contact-container { padding: 5rem 0; display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: start; max-width: 1000px; margin: 0 auto; }
    
    .contact-info h1 { font-size: 2.5rem; font-weight: 800; margin-bottom: 1rem; }
    .contact-info p { color: var(--text-muted); font-size: 1.1rem; line-height: 1.7; margin-bottom: 2rem; }
    
    .contact-methods { display: flex; flex-direction: column; gap: 1.5rem; }
    .contact-method { display: flex; align-items: center; gap: 1rem; }
    .method-icon { width: 50px; height: 50px; border-radius: 12px; background: rgba(99,102,241,0.1); color: var(--primary-light); display: flex; align-items: center; justify-content: center; font-size: 1.3rem; }
    .method-details h4 { font-size: 1.05rem; font-weight: 600; margin-bottom: 0.2rem; }
    .method-details p { color: var(--text-muted); font-size: 0.95rem; margin: 0; }
    
    .contact-form-container { padding: 2.5rem; background: var(--card-bg); border: 1px solid var(--glass-border); border-radius: var(--radius-lg); box-shadow: var(--shadow); }
    .form-group { margin-bottom: 1.5rem; }
    .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text); font-size: 0.95rem; }
    .form-control { width: 100%; padding: 0.9rem 1.2rem; background: var(--bg-secondary); border: 1px solid var(--glass-border); border-radius: var(--radius); color: var(--text); font-family: 'Outfit', sans-serif; font-size: 1rem; transition: var(--transition); outline: none; }
    .form-control:focus { border-color: var(--primary); box-shadow: 0 0 15px rgba(99,102,241,0.15); }
    textarea.form-control { resize: vertical; min-height: 120px; }
    
    @media (max-width: 768px) {
        .contact-container { grid-template-columns: 1fr; gap: 3rem; }
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="contact-container">
        <div class="contact-info">
            <h1>Get in <span class="gradient-text">Touch</span></h1>
            <p>Have questions about our API, want to list your jobs, or just want to say hi? We'd love to hear from you.</p>
            
            <div class="contact-methods">
                <div class="contact-method">
                    <div class="method-icon">📧</div>
                    <div class="method-details">
                        <h4>Email Us</h4>
                        <p>hello@chakriengine.com</p>
                    </div>
                </div>
                <div class="contact-method">
                    <div class="method-icon">💬</div>
                    <div class="method-details">
                        <h4>Discord Community</h4>
                        <p>Join the ChakriEngine Devs</p>
                    </div>
                </div>
                <div class="contact-method">
                    <div class="method-icon">📍</div>
                    <div class="method-details">
                        <h4>Headquarters</h4>
                        <p>Tech Hub, Dhaka, Bangladesh</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="contact-form-container">
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Message sent successfully! We will get back to you soon.');">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" class="form-control" placeholder="John Doe" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" class="form-control" placeholder="john@example.com" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <select id="subject" class="form-control" style="appearance: none;">
                        <option value="general">General Inquiry</option>
                        <option value="api">API Access</option>
                        <option value="support">Technical Support</option>
                        <option value="partnership">Partnership</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" class="form-control" placeholder="How can we help you?" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message 🚀</button>
            </form>
        </div>
    </div>
</div>
@endsection
