<x-layouts.app title="Book Now | The Oak">
    <main class="site-shell booking-gateway">
        <nav class="topbar" aria-label="Primary navigation">
            <a class="brand" href="/">
                <span class="brand-mark">O</span>
                <span>The Oak</span>
            </a>

        </nav>

        <section class="gateway-hero">
            <div class="gateway-hero-copy">
                <p class="eyebrow">Booking Enquiry</p>
                <h1>Choose What You Would Like To Enquire About</h1>
                <p>
                    Browse banquet, guest room, decoration, and catering services from The Oak Shillong. The team
                    will call back to discuss details, advance, and final confirmation.
                </p>
            </div>
        </section>

        <section id="services" class="service-picker" aria-label="Booking enquiry service options">
            <a class="service-card" href="/banquet-hall">
                <img
                    src="{{ asset('images/oak/client/banquet-hero.jpg') }}"
                    alt="The Oak banquet hall entrance and garden"
                >
                <span class="service-badge">Banquet Services</span>
                <div>
                    <h2>Banquet Hall</h2>
                    <p>Elegant venue for up to 1,000 guests with dining hall, lawn, parking, and event support.</p>
                    <span class="service-link">View Banquet Hall</span>
                </div>
            </a>

            <a class="service-card" href="/rooms">
                <img
                    src="{{ asset('images/oak/client/room-deluxe.jpg') }}"
                    alt="The Oak guest room with warm wooden flooring"
                >
                <span class="service-badge">Accommodation</span>
                <div>
                    <h2>Rooms/Cottage</h2>
                    <p>Cottage, semi deluxe, and twin bed stay options with breakfast and essential guest facilities.</p>
                    <span class="service-link">View Rooms/Cottage</span>
                </div>
            </a>

            <a class="service-card" href="/decoration">
                <img
                    src="{{ asset('images/oak/client/banquet-lawn.jpg') }}"
                    alt="The Oak lawn and outdoor event area"
                >
                <span class="service-badge">Event Support</span>
                <div>
                    <h2>Decoration</h2>
                    <p>In-house decoration support for weddings, celebrations, event spaces, and theme discussions.</p>
                    <span class="service-link">View Decoration</span>
                </div>
            </a>

            <a class="service-card" href="/catering">
                <img
                    src="{{ asset('images/oak/client/restaurant-hero.jpg') }}"
                    alt="The Oak restaurant dining area"
                >
                <span class="service-badge">Event Support</span>
                <div>
                    <h2>Catering</h2>
                    <p>Multi-cuisine restaurant and catering support with Indian, Chinese, Continental, and Khasi dishes.</p>
                    <span class="service-link">View Catering</span>
                </div>
            </a>
        </section>

        <section id="how-it-works" class="gateway-steps">
            <div>
                <p class="eyebrow">Simple Flow</p>
                <h2>Admin-Confirmed Booking Flow</h2>
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
                    <p>Share your name, phone number, email, approximate guests, and a short message.</p>
                </article>
                <article>
                    <span>03</span>
                    <h3>Team Calls Back</h3>
                    <p>The admin team contacts you and handles availability, advance, and final confirmation.</p>
                </article>
            </div>
        </section>
    </main>
</x-layouts.app>
