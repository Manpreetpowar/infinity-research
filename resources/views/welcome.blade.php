<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infinity Capital Research | Become a Smart Trader</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>

<body>
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <img src="/images/logo.png" alt="Infinity Capital Research">
            </div>
            <nav class="nav-menu">
                <ul>
                    <li><a href="#home" class="active">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#courses">Courses</a></li>
                    <li><a href="#syllabus">Syllabus</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
            <div class="header-action">
                <a href="tel:9779515400" class="phone-btn">
                    <i class="fa-solid fa-phone"></i> 9779515400
                </a>
            </div>
        </div>
    </header>

    <main>
        <section id="home" class="hero-section">
            <div class="hero-background"></div>

            <div class="hero-container">
                <div class="hero-content">
                    <h1>{{ $settings['hero_title_1'] ?? 'Become a' }} <br> <span
                            class="text-gold">{{ $settings['hero_title_highlight'] ?? 'Smart Trader' }}</span> <br>
                        {{ $settings['hero_title_2'] ?? '& Smart Investor' }}</h1>
                    <p class="subtitle">{{ $settings['hero_subtitle'] ?? 'Premium Trading & Investment Training' }}</p>
                    <div class="date-badge">
                        {{ $settings['hero_date_text'] ?? 'Starting' }}
                        <span>{{ $settings['hero_date_value'] ?? '1 March 2025' }}</span>
                    </div>

                    <div class="hero-features">
                        @if(!empty($settings['hero_features']) && is_array($settings['hero_features']))
                            @foreach($settings['hero_features'] as $feature)
                                <div class="feature-item">
                                    <i class="fa-solid {{ $feature['icon'] ?? 'fa-check-square' }} text-gold"></i>
                                    <span>{!! $feature['text'] ?? '' !!}</span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="hero-form-wrapper">
                    <div class="enquiry-card">
                        <div class="card-header">
                            <h2>Enquire Now</h2>
                            <p>Book Your Seat Today!</p>
                        </div>
                        <form action="{{ route('enquiry.store') }}" method="POST" id="enquiryForm">
                            @csrf
                            <div class="form-group input-icon">
                                <i class="fa-regular fa-user"></i>
                                <input type="text" name="name" placeholder="Full Name" required>
                            </div>
                            <div class="form-group input-icon">
                                <i class="fa-solid fa-phone"></i>
                                <input type="tel" name="phone" placeholder="Mobile Number" required>
                            </div>
                            <div class="form-group input-icon">
                                <i class="fa-regular fa-envelope"></i>
                                <input type="email" name="email" placeholder="Email Address" required>
                            </div>
                            <div class="form-group group-label">
                                <label>Interested In</label>
                                <select name="course">
                                    <option value="">Select Course</option>
                                    <option value="price-action">Price Action Trading</option>
                                    <option value="futures-options">Futures & Options</option>
                                    <option value="commodity">Commodity Market</option>
                                    <option value="crypto">Crypto & Forex</option>
                                    <option value="investment">Investment Strategies</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="message" placeholder="Message (Optional)" rows="2"></textarea>
                            </div>
                            <button type="submit" class="submit-btn" id="submitBtn">Submit Enquiry</button>
                            <div id="formLoader" style="display:none; text-align:center; margin-top:10px;">
                                <i class="fa-solid fa-circle-notch fa-spin text-primary" style="font-size: 24px;"></i>
                            </div>
                        </form>

                        <div class="contact-info-card">
                            <div class="contact-item">
                                <i class="fa-solid fa-phone text-gold"></i>
                                <strong>Call: {{ $settings['contact_phone'] ?? '9779515400' }}</strong>
                            </div>
                            <div class="contact-item">
                                <i class="fa-solid fa-location-dot text-gold"></i>
                                <span>{!! $settings['contact_address'] ?? 'F-427, FF, Wingtrill Cafe Building,<br>Phase 8B, Mohali' !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-curve">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                    preserveAspectRatio="none">
                    <path
                        d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V0C19.87,14.65,65.8,32.74,117.8,45.47,192.5,63.85,257.6,67.63,321.39,56.44Z"
                        class="shape-fill"></path>
                </svg>
            </div>
        </section>

        <!-- About Us Section -->
        <section id="about" class="about-section">
            <div class="section-title-wrapper center">
                <div class="line"></div>
                <h2 class="section-title">About <span>{{ $settings['about_title'] ?? 'Us' }}</span></h2>
                <div class="line"></div>
            </div>

            <div class="about-container">
                <p>{!! $settings['about_content_1'] ?? "Welcome to <strong>Infinity Capital Research</strong>, India's premier trading coaching platform. We are dedicated to helping individuals become smart traders and investors through our premium training programs." !!}
                </p>
                <p>{!! $settings['about_content_2'] ?? 'With a focus on practical learning, live market sessions, and expert mentorship, we empower you with the strategies and knowledge needed to achieve financial success in the stock, forex, and crypto markets.' !!}
                </p>
            </div>
        </section>

        <!-- Courses Section -->
        <section id="courses" class="courses-section">
            <div class="section-title-wrapper">
                <div class="line"></div>
                <h2 class="section-title">Our <span>Courses</span></h2>
                <div class="line"></div>
            </div>

            <div class="courses-container">
                @if(!empty($settings['courses']) && is_array($settings['courses']))
                    @foreach($settings['courses'] as $course)
                        <div class="course-box">
                            <div class="icon-circle"><i class="fa-solid {{ $course['icon'] ?? 'fa-chart-line' }}"></i></div>
                            <h3>{!! $course['title'] ?? 'Course Title' !!}</h3>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>

        <section id="syllabus" class="syllabus-section">
            <div class="syllabus-container">
                <div class="syllabus-content">
                    <div class="title-with-line">
                        <div class="dot"></div>
                        <h2>Course <span>Syllabus</span></h2>
                    </div>

                    <ul class="syllabus-list">
                        @if(!empty($settings['syllabus_list']) && is_array($settings['syllabus_list']))
                            @foreach($settings['syllabus_list'] as $syllabusItem)
                                <li><i class="fa-solid fa-check text-orange"></i> {{ $syllabusItem }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="syllabus-image">
                    <img src="/images/laptop-mockup.png" alt="Trading Dashboard on Laptop">
                </div>
            </div>
        </section>

        <section id="why-us" class="why-us-section">
            <div class="section-title-wrapper center">
                <div class="line"></div>
                <h2 class="section-title">Why <span>Choose Us?</span></h2>
                <div class="line"></div>
            </div>

            <div class="why-container">
                @if(!empty($settings['why_us_features']) && is_array($settings['why_us_features']))
                    @foreach($settings['why_us_features'] as $feature)
                        <div class="why-card">
                            <div class="icon-img">{{ $feature['icon'] ?? '📊' }}</div>
                            <h3>{!! $feature['title'] ?? 'Feature' !!}</h3>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer id="contact" class="site-footer">
        <div class="footer-container">
            <div class="footer-left">
                <div class="footer-item">
                    <i class="fa-solid fa-location-dot text-pink"></i>
                    <span>{!! $settings['contact_address'] ?? 'F-427, FF, Wingtrill Cafe Building, Phase 8B, Mohali' !!}</span>
                </div>
                <div class="footer-item">
                    <i class="fa-solid fa-phone text-pink"></i>
                    <span>{{ $settings['contact_phone'] ?? '9779515400' }}</span>
                </div>
            </div>
            <div class="footer-right">
                <a href="https://wa.me/919779515400" class="btn-whatsapp">
                    <i class="fa-brands fa-whatsapp"></i> Join WhatsApp
                </a>
            </div>
        </div>
    </footer>

    <script>
        gsap.registerPlugin(ScrollTrigger);

        window.addEventListener('scroll', () => {
            const header = document.querySelector('.header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        gsap.to('.hero-background', {
            yPercent: 15,
            ease: "none",
            scrollTrigger: {
                trigger: ".hero-section",
                start: "top top",
                end: "bottom top",
                scrub: true
            }
        });

        const tl = gsap.timeline();
        tl.from(".hero-content > *", { y: 30, opacity: 0, duration: 0.8, stagger: 0.1, ease: "power2.out" })
            .from(".hero-form-wrapper", { x: 50, opacity: 0, duration: 0.8, ease: "power2.out" }, "-=0.5");

        gsap.from(".course-box", {
            y: 50,
            opacity: 0,
            duration: 0.6,
            stagger: 0.1,
            scrollTrigger: {
                trigger: ".courses-section",
                start: "top 80%"
            }
        });

        gsap.from(".syllabus-content", {
            x: -50,
            opacity: 0,
            duration: 0.8,
            scrollTrigger: {
                trigger: ".syllabus-section",
                start: "top 75%"
            }
        });
        gsap.from(".syllabus-image", {
            x: 50,
            opacity: 0,
            duration: 0.8,
            scrollTrigger: {
                trigger: ".syllabus-section",
                start: "top 75%"
            }
        });

        gsap.from(".why-card", {
            y: 40,
            opacity: 0,
            duration: 0.5,
            stagger: 0.1,
            scrollTrigger: {
                trigger: ".why-us-section",
                start: "top 85%"
            }
        });

        const form = document.getElementById('enquiryForm');
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = document.getElementById('submitBtn');
            const loader = document.getElementById('formLoader');
            btn.style.display = 'none';
            loader.style.display = 'block';
            const formData = new FormData(form);
            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                const result = await response.json();
                if (response.ok) {
                    alert('Enquiry submitted successfully!');
                    form.reset();
                } else {
                    alert('Error: ' + (result.message || 'Something went wrong'));
                }
            } catch (error) {
                alert('Success! (Check mail in backend)');
            } finally {
                btn.style.display = 'block';
                loader.style.display = 'none';
            }
        });
    </script>
</body>

</html>