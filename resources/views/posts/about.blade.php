<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Qalam Blog</title>
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

        .about-section {
            margin-bottom: 3rem;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(139, 69, 19, 0.1);
            border-left: 4px solid #8B4513;
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

        .about-text {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            text-align: justify;
        }

        .highlight-quote {
            font-style: italic;
            font-size: 1.3rem;
            text-align: center;
            color: #654321;
            margin: 2rem 0;
            padding: 1.5rem;
            background: rgba(139, 69, 19, 0.05);
            border-left: 4px solid #8B4513;
            border-right: 4px solid #8B4513;
            position: relative;
        }

        .highlight-quote::before,
        .highlight-quote::after {
            content: '"';
            font-size: 3rem;
            color: #8B4513;
            position: absolute;
            font-family: 'Playfair Display', serif;
        }

        .highlight-quote::before {
            top: -10px;
            left: 10px;
        }

        .highlight-quote::after {
            bottom: -40px;
            right: 10px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }

        .stat-item {
            text-align: center;
            padding: 1.5rem;
            background: rgba(139, 69, 19, 0.05);
            border-radius: 8px;
            border: 2px solid rgba(139, 69, 19, 0.1);
        }

        .stat-number {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: #8B4513;
            display: block;
        }

        .stat-label {
            color: #654321;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .contact-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.4);
            border-radius: 6px;
            border-left: 3px solid #8B4513;
        }

        .contact-icon {
            width: 20px;
            height: 20px;
            fill: #8B4513;
        }

        .contact-text {
            color: #2C1810;
            font-weight: 600;
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

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }

            .contact-info {
                grid-template-columns: 1fr;
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
                <a href="#" class="nav-link active">About</a>
                <a href="#" class="nav-link">Articles</a>
                <a href="#" class="nav-link">Categories</a>
                <a href="{{ route('contact') }}" class="nav-link">Contact</a>
            </div>
        </nav>

        <!-- Main content -->
        <div class="content">
            <h1 class="page-title">About Qalam</h1>

            <div class="about-section">
                <h2 class="section-title">
                    <svg class="section-icon" viewBox="0 0 24 24">
                        <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                    </svg>
                    Our Story
                </h2>
                <p class="about-text">
                    Welcome to Qalam, where words flow like ink from a master calligrapher's pen. Born from a passion for storytelling and the written word, Qalam serves as a digital sanctuary for thoughts, ideas, and narratives that shape our understanding of the world.
                </p>
                <p class="about-text">
                    The name "Qalam" (قلم) means "pen" in Arabic, symbolizing the power of writing to transcend boundaries, connect cultures, and preserve wisdom for future generations. Just as the ancient scribes used their qalam to record history, we use ours to capture the essence of contemporary life and thought.
                </p>
            </div>

            <div class="highlight-quote">
                The pen is mightier than the sword, and through Qalam, we wield words to inspire, educate, and transform.
            </div>

            <div class="about-section">
                <h2 class="section-title">
                    <svg class="section-icon" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    Our Mission
                </h2>
                <p class="about-text">
                    At Qalam, we believe in the transformative power of authentic storytelling. Our mission is to create a platform where diverse voices can share their experiences, insights, and creativity with a global audience. We strive to foster meaningful conversations and build bridges between different perspectives and cultures.
                </p>
                <p class="about-text">
                    Through carefully crafted articles, thought-provoking essays, and engaging narratives, we aim to inspire our readers to think critically, feel deeply, and act purposefully in their own lives and communities.
                </p>
            </div>

            <div class="about-section">
                <h2 class="section-title">
                    <svg class="section-icon" viewBox="0 0 24 24">
                        <path d="M16 4l-4-4-4 4v2h8V4zm-4 4.5c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4z"/>
                    </svg>
                    What We Offer
                </h2>
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-number">500+</span>
                        <div class="stat-label">Articles Published</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">25k+</span>
                        <div class="stat-label">Monthly Readers</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">15</span>
                        <div class="stat-label">Categories Covered</div>
                    </div>
                </div>
                <p class="about-text">
                    From literature and philosophy to technology and culture, Qalam covers a wide spectrum of topics. Our content ranges from in-depth analyses and personal reflections to creative fiction and poetry. Each piece is carefully curated to ensure quality, authenticity, and relevance to our diverse readership.
                </p>
            </div>

            <div class="about-section">
                <h2 class="section-title">
                    <svg class="section-icon" viewBox="0 0 24 24">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                    </svg>
                    Connect With Us
                </h2>
                <p class="about-text">
                    We value our community and welcome feedback, suggestions, and contributions from our readers. Whether you're an aspiring writer, a seasoned author, or simply someone with a story to tell, we'd love to hear from you.
                </p>
                <div class="contact-info">
                    <div class="contact-item">
                        <svg class="contact-icon" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                        <span class="contact-text">hello@qalam.blog</span>
                    </div>
                    <div class="contact-item">
                        <svg class="contact-icon" viewBox="0 0 24 24">
                            <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                        </svg>
                        <span class="contact-text">@QalamBlog</span>
                    </div>
                    <div class="contact-item">
                        <svg class="contact-icon" viewBox="0 0 24 24">
                            <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.097.118.112.221.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.748-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z"/>
                        </svg>
                        <span class="contact-text">Qalam Blog</span>
                    </div>
                </div>
            </div>

            <!-- Decorative ink blots -->
            <div class="ink-blot"></div>
            <div class="ink-blot"></div>
            <div class="ink-blot"></div>
        </div>
    </main>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9900bf730705e211',t:'MTc2MDcxNDA4OS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
