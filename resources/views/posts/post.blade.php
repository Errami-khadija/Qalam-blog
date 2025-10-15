<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qalam blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
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

        /* Navigation */
        .nav-bar {
            background: rgba(139, 69, 19, 0.9);
            padding: 1rem 2rem;
            border-bottom: 3px solid #654321;
            position: sticky;
            top: 0;
            z-index: 20;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1000px;
            margin: 0 auto;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 600;
            color: #F4F1E8;
            text-decoration: none;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-links a {
            color: #F4F1E8;
            text-decoration: none;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #D4C4A8;
        }

        /* Article content */
        .article-content {
            padding: 3rem;
            line-height: 1.8;
            color: #2C1810;
        }

        .article-header {
            text-align: center;
            margin-bottom: 3rem;
            border-bottom: 2px solid #8B4513;
            padding-bottom: 2rem;
        }

        .article-title {
            font-size: 3rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #654321;
            text-shadow: 1px 1px 2px rgba(139, 69, 19, 0.2);
        }

        .article-meta {
            font-style: italic;
            color: #8B4513;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .article-date {
            color: #654321;
            font-size: 1rem;
        }

        .article-body {
            font-size: 1.2rem;
            text-align: justify;
        }

        .article-body p {
            margin-bottom: 1.5rem;
            text-indent: 2rem;
        }

        .article-body p:first-child::first-letter {
            font-size: 4rem;
            font-weight: 600;
            float: left;
            line-height: 3rem;
            margin: 0.2rem 0.5rem 0 0;
            color: #8B4513;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .quote {
            font-style: italic;
            font-size: 1.3rem;
            text-align: center;
            margin: 2rem 0;
            padding: 1.5rem;
            border-left: 4px solid #8B4513;
            background: rgba(139, 69, 19, 0.05);
            position: relative;
        }

        .quote::before {
            content: '"';
            font-size: 4rem;
            color: #8B4513;
            position: absolute;
            top: -10px;
            left: 20px;
        }

        /* Comments section */
        .comments-section {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 2px solid #8B4513;
        }

        .comments-title {
            font-size: 2rem;
            color: #654321;
            margin-bottom: 2rem;
            text-align: center;
        }

        .comment-form {
            background: rgba(139, 69, 19, 0.05);
            padding: 2rem;
            border-radius: 8px;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #654321;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #D4C4A8;
            border-radius: 4px;
            font-family: 'Crimson Text', serif;
            font-size: 1rem;
            background: #F4F1E8;
            color: #2C1810;
            box-sizing: border-box;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #8B4513;
            box-shadow: 0 0 5px rgba(139, 69, 19, 0.3);
        }

        .submit-btn {
            background: #8B4513;
            color: #F4F1E8;
            padding: 1rem 2rem;
            border: none;
            border-radius: 4px;
            font-family: 'Crimson Text', serif;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
            background: #654321;
        }

        .existing-comments {
            margin-top: 2rem;
        }

        .comment {
            background: rgba(212, 196, 168, 0.2);
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            border-left: 4px solid #8B4513;
        }

        .comment-author {
            font-weight: 600;
            color: #654321;
            margin-bottom: 0.5rem;
        }

        .comment-date {
            font-size: 0.9rem;
            color: #8B4513;
            font-style: italic;
            margin-bottom: 1rem;
        }

        .comment-text {
            line-height: 1.6;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .book-container {
                margin: 1rem;
                box-shadow: 
                    -5px 0 10px rgba(44, 24, 16, 0.3),
                    -10px 0 20px rgba(44, 24, 16, 0.2);
            }

            .article-content {
                padding: 2rem 1.5rem;
            }

            .article-title {
                font-size: 2.2rem;
            }

            .nav-content {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-links {
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
 


    <!-- Floating particles -->
    <div class="bg-particles">
        <div class="particle"><div class="ink-drop"></div></div>
        <div class="particle"><div class="quill-feather"></div></div>
        <div class="particle"><div class="ink-drop"></div></div>
        <div class="particle"><div class="quill-feather"></div></div>
    </div>

    <!-- Navigation -->
    <nav class="nav-bar">
        <div class="nav-content">
            <a href="#" class="logo">📜 Vintage Chronicles</a>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Articles</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </nav>



    <!-- Main content -->
    <div class="book-container">
        <article class="article-content">
            <header class="article-header">
                <h1 class="article-title">{{ $post->title }}</h1>
                <div class="article-meta">By Errami Khadija</div>
                <div class="article-date">Published on {{ $post->created_at->format('F j, Y') }}</div>
            </header>

            <div class="article-body">
                <p>{!! nl2br(e($post->content)) !!}</p>
            </div>


            <!-- Comments Section -->
            <section class="comments-section">
                <h2 class="comments-title">Share Your Thoughts</h2>
                
                <form class="comment-form" onsubmit="addComment(event)">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Your Comment</label>
                        <textarea id="comment" name="comment" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Post Comment</button>
                </form>

                <div class="existing-comments" id="comments-list">
                    <div class="comment">
                        <div class="comment-author">Margaret Thompson</div>
                        <div class="comment-date">March 16, 2024 at 2:30 PM</div>
                        <div class="comment-text">This article beautifully captures what I've been feeling lately. The tea ritual example really resonated with me - I'm going to try implementing that tomorrow morning.</div>
                    </div>
                    
                    <div class="comment">
                        <div class="comment-author">James Chen</div>
                        <div class="comment-date">March 16, 2024 at 4:15 PM</div>
                        <div class="comment-text">Eleanor's writing always brings such peace to my day. The idea that slow living isn't about privilege but about conscious choices is so important. Thank you for this reminder.</div>
                    </div>
                </div>
            </section>
        </article>
    </div>

    <script>
        function addComment(event) {
            event.preventDefault();
            
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const commentText = document.getElementById('comment').value;
            
            if (name && email && commentText) {
                const commentsList = document.getElementById('comments-list');
                const newComment = document.createElement('div');
                newComment.className = 'comment';
                
                const now = new Date();
                const dateString = now.toLocaleDateString('en-US', { 
                    year: 'numeric', 
                    month: 'long', 
                    day: 'numeric' 
                }) + ' at ' + now.toLocaleTimeString('en-US', { 
                    hour: 'numeric', 
                    minute: '2-digit' 
                });
                
                newComment.innerHTML = `
                    <div class="comment-author">${name}</div>
                    <div class="comment-date">${dateString}</div>
                    <div class="comment-text">${commentText}</div>
                `;
                
                commentsList.insertBefore(newComment, commentsList.firstChild);
                
                // Clear form
                document.getElementById('name').value = '';
                document.getElementById('email').value = '';
                document.getElementById('comment').value = '';
                
                // Add a subtle animation to the new comment
                newComment.style.opacity = '0';
                newComment.style.transform = 'translateY(-20px)';
                setTimeout(() => {
                    newComment.style.transition = 'all 0.5s ease';
                    newComment.style.opacity = '1';
                    newComment.style.transform = 'translateY(0)';
                }, 100);
            }
        }
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'98b6ec8727c9e240',t:'MTc1OTkzOTk4OS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
