<x-layouts.app title="Book Now | The Oak">
    <main class="site-shell booking-gateway">
        <nav class="topbar" aria-label="Primary navigation">
            <a class="brand" href="/">
                <span class="brand-mark">O</span>
                <span>The Oak</span>
            </a>

            <div class="nav-links">
                <a href="#services">Services</a>
                <a href="#how-it-works">How It Works</a>
                <a href="/combined-enquiry">One Page Option</a>
                <a href="/banquet-hall">Banquet Hall</a>
            </div>
        </nav>

        <section class="gateway-hero">
            <div class="gateway-hero-copy">
                <p class="eyebrow">Booking Enquiry</p>
                <h1>Choose What You Would Like To Enquire About</h1>
                <p>
                    Browse the resort services, select the option that matches your plan, and send a short enquiry.
                    The Oak team will call you back to discuss details and confirm availability.
                </p>
            </div>
        </section>

        <section id="services" class="service-picker" aria-label="Booking enquiry service options">
            <a class="service-card" href="/banquet-hall">
                <img
                    src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=1100&q=85"
                    alt="Banquet hall arranged for a celebration"
                >
                <span class="service-badge">Banquet Services</span>
                <div>
                    <h2>Banquet Hall</h2>
                    <p>Weddings, receptions, private celebrations, formal gatherings, and corporate functions.</p>
                    <span class="service-link">View Banquet Hall</span>
                </div>
            </a>

            <a class="service-card" href="/rooms">
                <img
                    src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=900&q=85"
                    alt="Warm resort room interior"
                >
                <span class="service-badge">Accommodation</span>
                <div>
                    <h2>Rooms</h2>
                    <p>Comfortable stays for couples, families, and guests visiting the resort.</p>
                    <span class="service-link">View Rooms</span>
                </div>
            </a>

            <a class="service-card" href="#">
                <img
                    src="https://images.unsplash.com/photo-1518733057094-95b53143d2a7?auto=format&fit=crop&w=900&q=85"
                    alt="Cottage surrounded by trees"
                >
                <span class="service-badge">Accommodation</span>
                <div>
                    <h2>Cottages</h2>
                    <p>Private cottage enquiries for quiet stays, retreats, and family getaways.</p>
                    <span class="service-link muted-link">Coming Next</span>
                </div>
            </a>

            <a class="service-card" href="/decoration">
                <img
                    src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=900&q=85"
                    alt="Elegant event decoration with flowers"
                >
                <span class="service-badge">Event Support</span>
                <div>
                    <h2>Decoration</h2>
                    <p>Decoration support for weddings, events, photo corners, and celebration themes.</p>
                    <span class="service-link">View Decoration</span>
                </div>
            </a>

            <a class="service-card" href="/catering">
                <img
                    src="https://images.unsplash.com/photo-1555244162-803834f70033?auto=format&fit=crop&w=900&q=85"
                    alt="Catering service table with prepared food"
                >
                <span class="service-badge">Event Support</span>
                <div>
                    <h2>Catering</h2>
                    <p>Food and catering appointment enquiries for events hosted at the resort.</p>
                    <span class="service-link">View Catering</span>
                </div>
            </a>
        </section>

        <section id="how-it-works" class="gateway-steps">
            <div>
                <p class="eyebrow">Simple Flow</p>
                <h2>No Payment, No Public Date Locking</h2>
                <a class="gateway-alt-link" href="/combined-enquiry">View one-page enquiry option</a>
            </div>

            <div class="step-grid">
                <article>
                    <span>01</span>
                    <h3>Choose A Service</h3>
                    <p>Select banquet, accommodation, decoration, or catering based on what you need.</p>
                </article>
                <article>
                    <span>02</span>
                    <h3>Send Enquiry</h3>
                    <p>Share your name, phone number, approximate guests, and a short message.</p>
                </article>
                <article>
                    <span>03</span>
                    <h3>Team Calls Back</h3>
                    <p>The admin team contacts you and handles dates, availability, and confirmation offline.</p>
                </article>
            </div>
        </section>
    </main>
</x-layouts.app>
