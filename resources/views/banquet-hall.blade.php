<x-layouts.app title="Banquet Hall | The Oak">
    <main class="site-shell">
        <nav class="topbar" aria-label="Primary navigation">
            <a class="brand" href="/">
                <span class="brand-mark">O</span>
                <span>The Oak</span>
            </a>

            <div class="nav-links">
                <a href="#gallery">Gallery</a>
                <a href="#details">Details</a>
                <a href="#terms">Terms</a>
                <a href="#enquiry">Enquire</a>
            </div>
        </nav>

        <section class="hero-section">
            <div class="hero-copy">
                <p class="eyebrow">Banquet Hall</p>
                <h1>Where Celebration Comes To Life</h1>
                <p>
                    The Oak Banquet Hall Shillong offers an elegant and versatile setting for weddings,
                    receptions, birthdays, corporate meetings, and memorable gatherings.
                </p>
                <div class="hero-actions">
                    <a class="primary-action" href="#enquiry">Enquire Now</a>
                    <a class="ghost-action" href="#gallery">View Photos</a>
                </div>
            </div>

            <div class="hero-media" aria-label="Banquet hall preview">
                <img
                    src="{{ asset('images/oak/client/banquet-hero.jpg') }}"
                    alt="The Oak banquet hall entrance surrounded by greenery"
                >
            </div>
        </section>

        <section class="quick-stats" aria-label="Banquet hall highlights">
            <div>
                <strong>250</strong>
                <span>Cluster Seating</span>
            </div>
            <div>
                <strong>400</strong>
                <span>Chairs Available</span>
            </div>
            <div>
                <strong>20</strong>
                <span>Dining Tables</span>
            </div>
            <div>
                <strong>1000</strong>
                <span>Informal Outdoor Setup</span>
            </div>
        </section>

        <section id="gallery" class="gallery-section">
            <div class="section-heading">
                <p class="eyebrow">Photo Led Experience</p>
                <h2>See The Space Before You Enquire</h2>
            </div>

            <div class="gallery-grid">
                <img
                    class="gallery-large"
                    src="{{ asset('images/oak/client/banquet-entrance.jpg') }}"
                    alt="The Oak banquet hall approach and entrance"
                >
                <img
                    src="{{ asset('images/oak/client/banquet-garden.jpg') }}"
                    alt="The Oak landscaped banquet garden"
                >
                <img
                    src="{{ asset('images/oak/client/banquet-lawn.jpg') }}"
                    alt="The Oak outdoor lawn event space"
                >
            </div>
        </section>

        <section id="details" class="details-section">
            <div class="details-copy">
                <p class="eyebrow">For Every Occasion</p>
                <h2>A Flexible Venue For Formal And Informal Gatherings</h2>
                <p>
                    The hall supports grand celebrations as well as intimate programmes, with indoor and outdoor
                    event spaces, a dining hall, kitchen, lawn, and preparation rooms for smoother event planning.
                </p>
            </div>

            <div class="detail-list">
                <article>
                    <span>01</span>
                    <h3>Grand Banquet Hall</h3>
                    <p>Elegant venue space for up to 1,000 guests, supported by indoor and outdoor seating options.</p>
                </article>
                <article>
                    <span>02</span>
                    <h3>Event Spaces & Dining</h3>
                    <p>Includes dining hall, kitchen, lawn, function area, 400 chairs, 20 tables, and buffet tables.</p>
                </article>
                <article>
                    <span>03</span>
                    <h3>Catering & Decor Support</h3>
                    <p>In-house or third-party catering and decor can be discussed as preferred by the customer.</p>
                </article>
            </div>
        </section>

        <section class="amenities-section">
            <div class="section-heading">
                <p class="eyebrow">Facilities & Amenities</p>
                <h2>Venue Support For A Smooth Event</h2>
            </div>

            <div class="amenity-grid">
                <span>Air conditioning inside the banquet hall</span>
                <span>Dining hall, kitchen, lawn, and function area</span>
                <span>400 chairs, 20 dining tables, and buffet tables</span>
                <span>In-house or third-party catering and decor support</span>
                <span>Ample parking and wheelchair access</span>
                <span>Power backup with 7 KVA generator for sound</span>
                <span>24/7 security with CCTV surveillance</span>
                <span>Kids' play area</span>
                <span>Running water</span>
                <span>Separate washrooms for ladies and gentlemen</span>
                <span>Two rooms near the main hall</span>
                <span>Separate car entry and exit</span>
            </div>
        </section>

        <section id="terms" class="terms-section">
            <div class="section-heading">
                <p class="eyebrow">Terms & Conditions</p>
                <h2>Important Booking Notes</h2>
            </div>

            <div class="terms-grid">
                <article>
                    <h3>Booking Advance</h3>
                    <p>A 25% advance payment is required to confirm and reserve the booking date. The advance is non-refundable in the event of cancellation.</p>
                </article>
                <article>
                    <h3>Music & Sound</h3>
                    <p>Music and sound systems are permitted only until 11:00 PM. Guests, caterers, decorators, DJs, and event organizers must follow this timing.</p>
                </article>
                <article>
                    <h3>Setup Schedule</h3>
                    <p>Wedding setup may be done one day before the event. Smaller gatherings must be set up on the day of the event.</p>
                </article>
                <article>
                    <h3>Generator & Cleanliness</h3>
                    <p>Caterers using induction buffets or heavy decoration lighting must arrange their own generator. Event waste must be collected and disposed of properly.</p>
                </article>
                <article>
                    <h3>Additional Charges</h3>
                    <p>Canopy charges depend on size. Table covers are INR 200 per table and chairs are INR 50 per piece when applicable.</p>
                </article>
                <article>
                    <h3>Contact</h3>
                    <p>Laitkor Lumheh, Laitkor Pomlakrai Road, Shillong-10. Call +91 8787320765 or +91 6909781461.</p>
                </article>
            </div>
        </section>

        <section id="enquiry" class="enquiry-section">
            <div class="enquiry-intro">
                <p class="eyebrow">Start A Conversation</p>
                <h2>Banquet Hall Enquiry</h2>
                <p>
                    Send a few details and the resort team will call back to discuss availability, seating,
                    dining arrangements, decoration, and catering support.
                </p>
            </div>

            @if (session('success'))
                <p class="form-success">{{ session('success') }}</p>
            @endif

            @if ($errors->any())
                <div class="form-error">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form class="enquiry-form" method="POST" action="{{ route('enquiries.store') }}">
                @csrf
                <input type="hidden" name="service" value="Banquet Hall">
                <div class="field-group">
                    <label for="name">Full Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Enter your name" required>
                </div>

                <div class="field-group">
                    <label for="email">Email Address</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Email for booking updates">
                </div>

                <div class="field-group">
                    <label for="event_date">Preferred Event Date</label>
                    <input id="event_date" name="event_date" type="date" value="{{ old('event_date') }}" data-banquet-date required>
                    <p class="availability-message neutral" data-banquet-availability>
                        Select a date to check banquet hall availability.
                    </p>
                </div>

                <div class="field-row">
                    <div class="field-group">
                        <label for="phone">Phone Number</label>
                        <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" placeholder="Your contact number" required>
                    </div>
                    <div class="field-group">
                        <label for="guests">Guests</label>
                        <input id="guests" name="guests" type="number" min="1" value="{{ old('guests') }}" placeholder="Approx. count">
                    </div>
                </div>

                <div class="field-group">
                    <label for="event_type">Event Type</label>
                    <select id="event_type" name="event_type">
                        <option @selected(old('event_type') === 'Wedding / Reception')>Wedding / Reception</option>
                        <option @selected(old('event_type') === 'Birthday / Private Celebration')>Birthday / Private Celebration</option>
                        <option @selected(old('event_type') === 'Corporate Event')>Corporate Event</option>
                        <option @selected(old('event_type') === 'Other Gathering')>Other Gathering</option>
                    </select>
                </div>

                <div class="field-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" placeholder="Tell us what you are planning">{{ old('message') }}</textarea>
                </div>

                <button class="primary-action form-action" type="submit" data-banquet-submit disabled>Send Enquiry</button>
            </form>
        </section>

        <script>
            const banquetDateInput = document.querySelector('[data-banquet-date]');
            const banquetMessage = document.querySelector('[data-banquet-availability]');
            const banquetSubmit = document.querySelector('[data-banquet-submit]');
            let availabilityRequest;

            function updateBanquetAvailability() {
                const selectedDate = banquetDateInput.value;

                banquetMessage.classList.remove('available', 'unavailable', 'neutral');

                if (!selectedDate) {
                    banquetMessage.textContent = 'Select a date to check banquet hall availability.';
                    banquetMessage.classList.add('neutral');
                    banquetSubmit.disabled = true;
                    return;
                }

                banquetMessage.textContent = 'Checking banquet hall availability...';
                banquetMessage.classList.add('neutral');
                banquetSubmit.disabled = true;

                if (availabilityRequest) {
                    availabilityRequest.abort();
                }

                availabilityRequest = new AbortController();

                fetch(`{{ route('banquet.availability') }}?date=${encodeURIComponent(selectedDate)}`, {
                    headers: { 'Accept': 'application/json' },
                    signal: availabilityRequest.signal,
                })
                    .then((response) => response.json())
                    .then((data) => {
                        banquetMessage.classList.remove('available', 'unavailable', 'neutral');

                        if (data.available) {
                            banquetMessage.textContent = 'Banquet hall appears available for this date. Submit your enquiry and our team will call to confirm.';
                            banquetMessage.classList.add('available');
                            banquetSubmit.disabled = false;
                        } else {
                            banquetMessage.textContent = 'Banquet hall is unavailable on this date. Please choose another date.';
                            banquetMessage.classList.add('unavailable');
                            banquetSubmit.disabled = true;
                        }
                    })
                    .catch((error) => {
                        if (error.name === 'AbortError') {
                            return;
                        }

                        banquetMessage.classList.remove('available', 'unavailable', 'neutral');
                        banquetMessage.textContent = 'Unable to check availability right now. Please try again.';
                        banquetMessage.classList.add('unavailable');
                        banquetSubmit.disabled = true;
                    });
            }

            banquetDateInput.addEventListener('change', updateBanquetAvailability);
            updateBanquetAvailability();
        </script>
    </main>
</x-layouts.app>
