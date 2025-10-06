<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qalam Blog - Ancient Chronicles</title>
    <style>
        body {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Crimson Text', 'Times New Roman', serif;
            background: #F4F1E8;
            min-height: 100vh;
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
        }

        @keyframes bookOpen {
            0% { 
                transform: perspective(1000px) rotateY(-30deg);
                opacity: 0;
            }
            100% { 
                transform: perspective(1000px) rotateY(0deg);
                opacity: 1;
            }
        }

        /* Book spine decoration */
        .book-container::before {
            content: '';
            position: absolute;
            left: -8px;
            top: 0;
            width: 8px;
            height: 100%;
            background: linear-gradient(to bottom, 
                #A0522D 0%, 
                #8B4513 20%, 
                #654321 40%, 
                #8B4513 60%, 
                #A0522D 80%, 
                #654321 100%);
            box-shadow: inset -2px 0 4px rgba(0,0,0,0.3);
        }

        /* Header - Book Title Page */
        .header {
            position: relative;
            background: linear-gradient(135deg, #F4F1E8 0%, #EDE6D3 100%);
            border-bottom: 3px double #8B4513;
            padding: 3rem 0;
            text-align: center;
            box-shadow: inset 0 -10px 20px rgba(139, 69, 19, 0.1);
        }

        .header::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #8B4513, transparent);
        }

        .header::after {
            content: '';
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #8B4513, transparent);
        }

        .logo {
            font-size: 3.5rem;
            font-weight: 700;
            color: #2C1810;
            text-decoration: none;
            font-family: 'Cinzel', serif;
            letter-spacing: 3px;
            text-shadow: 2px 2px 4px rgba(44, 24, 16, 0.3);
            animation: titleGlow 4s ease-in-out infinite;
            display: block;
            margin-bottom: 1rem;
        }

        @keyframes titleGlow {
            0%, 100% { text-shadow: 2px 2px 4px rgba(44, 24, 16, 0.3); }
            50% { text-shadow: 2px 2px 8px rgba(139, 69, 19, 0.5), 0 0 20px rgba(160, 82, 45, 0.3); }
        }

        .subtitle {
            font-size: 1.2rem;
            color: #654321;
            font-style: italic;
            letter-spacing: 1px;
            margin-bottom: 2rem;
        }

        .nav-menu {
            display: flex;
            justify-content: center;
            gap: 3rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-link {
            color: #2C1810;
            text-decoration: none;
            font-weight: 500;
            font-size: 1.1rem;
            padding: 0.8rem 1.5rem;
            border: 2px solid transparent;
            border-radius: 0;
            transition: all 0.4s ease;
            position: relative;
            letter-spacing: 1px;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(139, 69, 19, 0.1);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
            z-index: -1;
        }

        .nav-link:hover::before {
            transform: scaleX(1);
        }

        .nav-link:hover {
            color: #8B4513;
            border-color: #8B4513;
        }

        /* Main Content - Book Pages */
        .main-content {
            position: relative;
            z-index: 5;
            padding: 4rem 3rem;
            background: #F4F1E8;
        }

        /* Chapter Title */
        .chapter-title {
            text-align: center;
            margin-bottom: 4rem;
            animation: fadeInUp 1s ease-out 0.5s both;
        }

        .chapter-title h1 {
            font-size: 2.8rem;
            font-weight: 700;
            color: #2C1810;
            margin-bottom: 1rem;
            font-family: 'Cinzel', serif;
            letter-spacing: 2px;
            position: relative;
        }

        .chapter-title h1::before,
        .chapter-title h1::after {
            content: '❦';
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #8B4513;
            font-size: 1.5rem;
        }

        .chapter-title h1::before {
            left: -60px;
        }

        .chapter-title h1::after {
            right: -60px;
        }

        .chapter-subtitle {
            font-size: 1.3rem;
            color: #654321;
            font-style: italic;
            letter-spacing: 1px;
        }

        @keyframes fadeInUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* Blog Posts - Manuscript Pages */
        .blog-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 4rem;
            margin-top: 3rem;
        }

        .blog-card {
            background: linear-gradient(135deg, #F4F1E8 0%, #EDE6D3 100%);
            border: 2px solid #D4C4A8;
            border-radius: 0;
            padding: 3rem;
            transition: all 0.5s ease;
            cursor: pointer;
            animation: fadeInUp 1s ease-out both;
            position: relative;
            box-shadow: 
                0 5px 15px rgba(44, 24, 16, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        /* Manuscript illumination corners */
        .blog-card::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 15px;
            width: 40px;
            height: 40px;
            background: radial-gradient(circle, #8B4513, #654321);
            border-radius: 50%;
            opacity: 0.3;
        }

        .blog-card::after {
            content: '';
            position: absolute;
            bottom: 15px;
            right: 15px;
            width: 40px;
            height: 40px;
            background: radial-gradient(circle, #A0522D, #8B4513);
            border-radius: 50%;
            opacity: 0.3;
        }

        .blog-card:nth-child(1) { animation-delay: 0.7s; }
        .blog-card:nth-child(2) { animation-delay: 0.9s; }
        .blog-card:nth-child(3) { animation-delay: 1.1s; }

        .blog-card:hover {
            transform: translateY(-5px);
            border-color: #8B4513;
            box-shadow: 
                0 15px 30px rgba(44, 24, 16, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
        }

        .blog-category {
            display: inline-block;
            background: linear-gradient(45deg, #8B4513, #A0522D);
            color: #F4F1E8;
            padding: 0.6rem 1.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 2rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-radius: 0;
            box-shadow: 2px 2px 4px rgba(44, 24, 16, 0.3);
        }

        .blog-title {
            font-size: 2rem;
            font-weight: 700;
            color: #2C1810;
            margin-bottom: 1.5rem;
            line-height: 1.3;
            font-family: 'Cinzel', serif;
            letter-spacing: 1px;
        }

        .blog-excerpt {
            color: #3D2817;
            line-height: 1.8;
            margin-bottom: 2.5rem;
            font-size: 1.1rem;
            text-align: justify;
            text-indent: 2rem;
        }

        /* Decorative initial letter */
        .blog-excerpt::first-letter {
            font-size: 4rem;
            font-weight: 700;
            color: #8B4513;
            float: left;
            line-height: 3rem;
            margin: 0.2rem 0.5rem 0 0;
            font-family: 'Cinzel', serif;
            text-shadow: 2px 2px 4px rgba(44, 24, 16, 0.3);
        }

        .blog-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #654321;
            font-size: 1rem;
            border-top: 1px solid #D4C4A8;
            padding-top: 2rem;
            font-style: italic;
        }

        .read-more {
            color: #8B4513;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 0.8rem 1.5rem;
            border: 2px solid #8B4513;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        .read-more:hover {
            background: #8B4513;
            color: #F4F1E8;
            transform: translateX(5px);
        }

        /* Footer - Book End */
        .footer {
            position: relative;
            z-index: 10;
            background: linear-gradient(135deg, #3D2817, #2C1810);
            border-top: 3px double #8B4513;
            padding: 3rem 0;
            text-align: center;
            color: #D4C4A8;
            margin-top: 4rem;
        }

        .footer::before {
            content: '~ Finis ~';
            display: block;
            font-size: 1.5rem;
            font-family: 'Cinzel', serif;
            color: #8B4513;
            margin-bottom: 1rem;
            letter-spacing: 3px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .book-container {
                margin: 1rem;
                box-shadow: -5px 0 10px rgba(44, 24, 16, 0.3);
            }
            
            .nav-menu {
                flex-direction: column;
                gap: 1rem;
            }
            
            .logo {
                font-size: 2.5rem;
            }
            
            .chapter-title h1::before,
            .chapter-title h1::after {
                display: none;
            }
            
            .main-content {
                padding: 2rem 1.5rem;
            }
            
            .blog-excerpt::first-letter {
                font-size: 3rem;
                line-height: 2.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Floating ink drops and quill feathers -->
    <div class="bg-particles">
        <div class="particle ink-drop"></div>
        <div class="particle quill-feather"></div>
        <div class="particle ink-drop"></div>
        <div class="particle quill-feather"></div>
    </div>

    <!-- Book Container -->
    <div class="book-container">
        <!-- Header - Title Page -->
        <header class="header">
            <a href="#" class="logo">📜 Qalam</a>
            <p class="subtitle">Where Words Come Alive</p>
            <nav>
                <ul class="nav-menu">
                    <li><a href="#" class="nav-link">Home</a></li>
                    <li><a href="#" class="nav-link">Blog</a></li>
                    <li><a href="#" class="nav-link">categories</a></li>
                    <li><a href="#" class="nav-link">About</a></li>
                    <li><a href="#" class="nav-link">Contact</a></li>
                </ul>
            </nav>
        </header>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Chapter Title -->
            <section class="chapter-title">
                <h1>Chapter I</h1>
                <p class="chapter-subtitle">Every post is an ink drop from my qalam.</p>
            </section>

            <!-- Blog Posts Grid -->
            <section class="blog-grid">
                <article class="blog-card">
                    <span class="blog-category">Illuminated</span>
                    <h2 class="blog-title">The Art of Medieval Manuscripts</h2>
                    <p class="blog-excerpt">Explore the intricate world of medieval illuminated manuscripts, where skilled scribes and artists created masterpieces that have survived centuries. These sacred texts reveal the dedication and artistry of ancient craftsmen who preserved knowledge through the ages.</p>
                    <div class="blog-meta">
                        <span>Anno Domini MMXXIV</span>
                        <a href="#" class="read-more">Continue Reading</a>
                    </div>
                </article>

                
            </section>
        </main>

        <!-- Footer -->
        <footer class="footer">
            <div class="nav-container">
                <p>© 2025 Qalam Blog | All Rights Reserved  
                    Made with ❤️ by Khadija Errami </p>
            </div>
        </footer>
    </div>

    <script>
        // Smooth scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Page turning effect for blog cards
        document.querySelectorAll('.blog-card').forEach(card => {
            card.addEventListener('click', function() {
                this.style.transform = 'perspective(1000px) rotateY(-5deg) translateY(-5px)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 300);
            });
        });

        // Ink spreading effect on navigation
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const inkSpread = document.createElement('span');
                inkSpread.style.cssText = `
                    position: absolute;
                    border-radius: 50%;
                    background: radial-gradient(circle, rgba(139, 69, 19, 0.3), transparent);
                    transform: scale(0);
                    animation: inkSpread 1s ease-out;
                    pointer-events: none;
                `;
                
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height) * 2;
                inkSpread.style.width = inkSpread.style.height = size + 'px';
                inkSpread.style.left = (e.clientX - rect.left - size / 2) + 'px';
                inkSpread.style.top = (e.clientY - rect.top - size / 2) + 'px';
                
                this.style.position = 'relative';
                this.appendChild(inkSpread);
                
                setTimeout(() => inkSpread.remove(), 1000);
            });
        });

        // Quill writing animation on scroll
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const particles = document.querySelectorAll('.particle');
            particles.forEach((particle, index) => {
                const speed = (index % 2 === 0) ? 0.3 : 0.5;
                particle.style.transform = `translateY(${scrolled * speed}px) rotate(${scrolled * 0.05}deg)`;
            });
        });

        // Add CSS for ink spread animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes inkSpread {
                0% {
                    transform: scale(0);
                    opacity: 1;
                }
                100% {
                    transform: scale(1);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Typewriter effect for chapter title
        function typeWriter(element, text, speed = 100) {
            let i = 0;
            element.innerHTML = '';
            function type() {
                if (i < text.length) {
                    element.innerHTML += text.charAt(i);
                    i++;
                    setTimeout(type, speed);
                }
            }
            type();
        }

        // Initialize typewriter effect after page load
        window.addEventListener('load', () => {
            setTimeout(() => {
                const chapterTitle = document.querySelector('.chapter-title h1');
                const originalText = chapterTitle.textContent;
                typeWriter(chapterTitle, originalText, 150);
            }, 1000);
        });
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9887cd40355fe22d',t:'MTc1OTQ0NTg3Ny4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>

