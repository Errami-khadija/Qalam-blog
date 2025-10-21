<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Qalam Blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;1,400&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Crimson Text', 'Times New Roman', serif;
            background: #F4F1E8;
            min-height: 100%;
            overflow-x: hidden;
            position: relative;
        }

        /* Old paper texture with stains and aging */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(139, 69, 19, 0.08) 2px, transparent 2px),
                radial-gradient(circle at 80% 70%, rgba(101, 67, 33, 0.06) 3px, transparent 3px),
                radial-gradient(circle at 40% 80%, rgba(160, 82, 45, 0.04) 1px, transparent 1px),
                radial-gradient(ellipse at 60% 20%, rgba(139, 69, 19, 0.03) 20px, transparent 20px),
                radial-gradient(ellipse at 30% 90%, rgba(101, 67, 33, 0.05) 15px, transparent 15px);
            background-size: 60px 60px, 80px 80px, 40px 40px, 200px 150px, 180px 120px;
            pointer-events: none;
            z-index: 1;
            animation: paperAge 30s ease-in-out infinite;
        }

        @keyframes paperAge {
            0%, 100% { opacity: 0.8; }
            50% { opacity: 1; }
        }

        /* Floating ink drops and quill feathers */
        .bg-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 2;
        }

        .particle {
            position: absolute;
            animation: inkFloat 15s ease-in-out infinite;
        }

        .ink-drop {
            width: 8px;
            height: 12px;
            background: radial-gradient(ellipse, #2C1810, #1A0F08);
            border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
            box-shadow: 0 2px 4px rgba(44, 24, 16, 0.3);
        }

        .quill-feather {
            width: 3px;
            height: 40px;
            background: linear-gradient(to bottom, #8B4513 0%, #654321 50%, #2C1810 100%);
            border-radius: 50px;
            transform-origin: bottom center;
        }

        .quill-feather::before {
            content: '';
            position: absolute;
            top: 0;
            left: -2px;
            width: 7px;
            height: 20px;
            background: linear-gradient(45deg, transparent 40%, rgba(139, 69, 19, 0.3) 50%, transparent 60%);
            border-radius: 50px;
        }

        .particle:nth-child(1) { left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { left: 30%; animation-delay: 5s; }
        .particle:nth-child(3) { left: 60%; animation-delay: 10s; }
        .particle:nth-child(4) { left: 85%; animation-delay: 3s; }

        @keyframes inkFloat {
            0%, 100% { 
                transform: translateY(100vh) rotate(0deg); 
                opacity: 0; 
            }
            10%, 90% { 
                opacity: 0.6; 
            }
            50% { 
                transform: translateY(-20px) rotate(180deg); 
                opacity: 0.8; 
            }
        }

        /* Book binding effect */
        .book-container {
            max-width: 1000px;
            margin: 2rem auto;
            background: #F4F1E8;
            box-shadow: 
                -10px 0 20px rgba(44, 24, 16, 0.3),
                -20px 0 40px rgba(44, 24, 16, 0.2),
                inset 20px 0 30px rgba(139, 69, 19, 0.1);
            border-left: 8px solid #8B4513;
            border-right: 2px solid #D4C4A8;
            position: relative;
            z-index: 10;
            animation: bookOpen 1.5s ease-out;
            min-height: 100vh;
        }

        @keyframes bookOpen {
            0% { 
                transform: perspective(1000px) rotateY(-15deg);
                opacity: 0.8;
            }
            100% { 
                transform: perspective(1000px) rotateY(0deg);
                opacity: 1;
            }
        }

        /* Navigation */
        .nav-container {
            padding: 2rem 3rem 1rem;
            border-bottom: 2px solid rgba(139, 69, 19, 0.2);
            margin-bottom: 2rem;
        }

        .nav-brand {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: #2C1810;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(139, 69, 19, 0.2);
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .nav-link {
            color: #654321;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: #2C1810;
            background: rgba(139, 69, 19, 0.1);
        }

        .nav-link.active {
            color: #8B4513;
            background: rgba(139, 69, 19, 0.15);
        }

        /* Main content */
        .content {
            padding: 0 3rem 3rem;
            line-height: 1.8;
            color: #2C1810;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 700;
            color: #2C1810;
            text-align: center;
            margin-bottom: 3rem;
            text-shadow: 2px 2px 4px rgba(139, 69, 19, 0.2);
            position: relative;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(to right, transparent, #8B4513, transparent);
        }

        .contact-intro {
            text-align: center;
            font-size: 1.2rem;
            color: #654321;
            margin-bottom: 3rem;
            font-style: italic;
            padding: 2rem;
            background: rgba(139, 69, 19, 0.05);
            border-radius: 8px;
            border-left: 4px solid #8B4513;
            border-right: 4px solid #8B4513;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .contact-form-section {
            background: rgba(255, 255, 255, 0.4);
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(139, 69, 19, 0.15);
            border-left: 4px solid #8B4513;
        }

        .contact-info-section {
            background: rgba(139, 69, 19, 0.08);
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(139, 69, 19, 0.15);
            border-left: 4px solid #654321;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: #654321;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .section-icon {
            width: 24px;
            height: 24px;
            fill: #8B4513;
        }

        /* Form styles */
        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            font-weight: 600;
            color: #2C1810;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .form-input,
        .form-textarea {
            padding: 1rem;
            border: 2px solid rgba(139, 69, 19, 0.2);
            border-radius: 6px;
            font-family: 'Crimson Text', serif;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.8);
            color: #2C1810;
            transition: all 0.3s ease;
        }

        .form-input:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #8B4513;
            box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.1);
            background: rgba(255, 255, 255, 0.95);
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .submit-btn {
            background: linear-gradient(135deg, #8B4513, #654321);
            color: white;
            border: none;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            font-family: 'Crimson Text', serif;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(139, 69, 19, 0.3);
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, #654321, #2C1810);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(139, 69, 19, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        /* Contact info items */
        .contact-info-list {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.4);
            border-radius: 8px;
            border-left: 3px solid #8B4513;
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            background: rgba(255, 255, 255, 0.6);
            transform: translateX(5px);
        }

        .contact-icon {
            width: 24px;
            height: 24px;
            fill: #8B4513;
            margin-top: 0.2rem;
            flex-shrink: 0;
        }

        .contact-details {
            flex: 1;
        }

        .contact-title {
            font-weight: 700;
            color: #2C1810;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .contact-text {
            color: #654321;
            line-height: 1.6;
        }

        /* Success message */
        .success-message {
            background: rgba(34, 139, 34, 0.1);
            border: 2px solid rgba(34, 139, 34, 0.3);
            color: #2C5530;
            padding: 1rem;
            border-radius: 6px;
            margin-top: 1rem;
            display: none;
            text-align: center;
            font-weight: 600;
        }

        .success-message.show {
            display: block;
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .book-container {
                margin: 1rem;
                box-shadow: 
                    -5px 0 15px rgba(44, 24, 16, 0.2),
                    -10px 0 25px rgba(44, 24, 16, 0.1);
            }

            .nav-container,
            .content {
                padding: 1.5rem;
            }

            .page-title {
                font-size: 2.2rem;
            }

            .nav-links {
                gap: 1rem;
            }

            .nav-link {
                font-size: 1rem;
                padding: 0.4rem 0.8rem;
            }

            .contact-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .contact-form-section,
            .contact-info-section {
                padding: 2rem;
            }
        }

        /* Ink blot decorations */
        .ink-blot {
            position: absolute;
            width: 20px;
            height: 20px;
            background: radial-gradient(circle, rgba(44, 24, 16, 0.1), transparent);
            border-radius: 50%;
            animation: blotPulse 4s ease-in-out infinite;
        }

        .ink-blot:nth-child(1) { top: 20%; right: 10%; animation-delay: 0s; }
        .ink-blot:nth-child(2) { top: 60%; right: 5%; animation-delay: 2s; }
        .ink-blot:nth-child(3) { top: 80%; right: 15%; animation-delay: 1s; }

        @keyframes blotPulse {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.2); }
        }
    </style>
</head>
<body>
    <!-- Background particles -->
    <div class="bg-particles">
        <div class="particle"><div class="ink-drop"></div></div>
        <div class="particle"><div class="quill-feather"></div></div>
        <div class="particle"><div class="ink-drop"></div></div>
        <div class="particle"><div class="quill-feather"></div></div>
    </div>

    <main class="book-container">
        <!-- Navigation -->
        <nav class="nav-container">
            <a href="{{ route('home') }}" class="nav-brand">📜 Qalam blog</a>
            <div class="nav-links">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
                <a href="{{ route('about') }}" class="nav-link">About</a>
                <a href="#" class="nav-link">Articles</a>
                <a href="#" class="nav-link">Categories</a>
                <a href="{{ route('contact') }}" class="nav-link active">Contact</a>
            </div>
        </nav>

        <!-- Main content -->
        <div class="content">
            <h1 class="page-title">Contact Us</h1>

            <div class="contact-intro">
                "Every great conversation begins with a single word. Let yours begin here."
            </div>

            <div class="contact-grid">
                <!-- Contact Form -->
                <div class="contact-form-section">
                    <h2 class="section-title">
                        <svg class="section-icon" viewBox="0 0 24 24">
                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                        </svg>
                        Send Us a Message
                    </h2>
                    
                    <form class="contact-form" id="contactForm" method="POST" action="{{ route('contact.send') }}">
    @csrf

    <div class="form-group">
        <label for="name" class="form-label">Your Name</label>
        <input type="text" id="name" name="name" class="form-input" required>
    </div>

    <div class="form-group">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" id="email" name="email" class="form-input" required>
    </div>

    <div class="form-group">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" id="subject" name="subject" class="form-input" required>
    </div>

    <div class="form-group">
        <label for="message" class="form-label">Your Message</label>
        <textarea id="message" name="message" class="form-textarea" required></textarea>
    </div>

    <button type="submit" class="submit-btn">Send Message</button>

    @if (session('success'))
        <div class="success-message show">
            {{ session('success') }}
        </div>
    @endif
</form>

                </div>

                <!-- Contact Information -->
                <div class="contact-info-section">
                    <h2 class="section-title">
                        <svg class="section-icon" viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                        Get in Touch
                    </h2>
                    
                    <div class="contact-info-list">
                        <div class="contact-item">
                            <svg class="contact-icon" viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            <div class="contact-details">
                                <div class="contact-title">Email Us</div>
                                <div class="contact-text">hello@qalam.blog<br>For general inquiries and submissions</div>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <svg class="contact-icon" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                            <div class="contact-details">
                                <div class="contact-title">Follow Us</div>
                                <div class="contact-text">@QalamBlog<br>Stay updated with our latest articles and thoughts</div>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <svg class="contact-icon" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                            <div class="contact-details">
                                <div class="contact-title">Contribute</div>
                                <div class="contact-text">writers@qalam.blog<br>Share your stories and join our community of writers</div>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <svg class="contact-icon" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                            <div class="contact-details">
                                <div class="contact-title">Response Time</div>
                                <div class="contact-text">We typically respond within 24 hours during business days</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Decorative ink blots -->
            <div class="ink-blot"></div>
            <div class="ink-blot"></div>
            <div class="ink-blot"></div>
        </div>
    </main>

    <script>

            
            
            // Simple validation
            if (!name || !email || !subject || !message) {
                return;
            }
            
            // Simulate form submission
            const submitBtn = this.querySelector('.submit-btn');
            const originalText = submitBtn.textContent;
            
            submitBtn.textContent = 'Sending...';
            submitBtn.disabled = true; 
            
            setTimeout(() => {
                // Show success message
                const successMessage = document.getElementById('successMessage');
                successMessage.classList.add('show');
                
                // Reset form
                this.reset();
                
                // Reset button
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                
                // Hide success message after 5 seconds
                setTimeout(() => {
                    successMessage.classList.remove('show');
                }, 5000);
            }, 1500);
        });
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9900e3f503814687',t:'MTc2MDcxNTU4NS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
