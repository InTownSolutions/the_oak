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
                <a href="#enquiry">Enquire</a>
            </div>
        </nav>

        <section class="hero-section">
            <div class="hero-copy">
                <p class="eyebrow">Banquet Hall</p>
                <h1>Where Celebration Comes To Life</h1>
                <p>
                    Set amid pine greenery and landscaped outdoor spaces, The Oak Banquet Hall offers an elegant
                    setting for weddings, receptions, birthdays, corporate meetings, and memorable gatherings.
                </p>
                <div class="hero-actions">
                    <a class="primary-action" href="#enquiry">Enquire Now</a>
                    <a class="ghost-action" href="#gallery">View Photos</a>
                </div>
            </div>

            <div class="hero-media" aria-label="Banquet hall preview">
                <img
                    src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=1400&q=85"
                    alt="Elegant banquet hall arranged for a celebration"
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
                <span>Theatre Seating</span>
            </div>
            <div>
                <strong>150</strong>
                <span>Dining Capacity</span>
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
                    src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&fit=crop&w=1400&q=85"
                    alt="Banquet event space with decorated tables"
                >
                <img
                    src="https://images.unsplash.com/photo-1527529482837-4698179dc6ce?auto=format&fit=crop&w=900&q=85"
                    alt="Wedding table setting with floral decor"
                >
                <img
                    src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=900&q=85"
                    alt="Reception decor with warm lighting"
                >
            </div>
        </section>

        <section id="details" class="details-section">
            <div class="details-copy">
                <p class="eyebrow">For Every Occasion</p>
                <h2>A Flexible Venue For Formal And Informal Gatherings</h2>
                <p>
                    The hall is designed for intimate ceremonies, grand celebrations, corporate programmes, and
                    family events. Customers can choose their preferred event date and quickly see whether the
                    banquet hall appears available before sending an enquiry.
                </p>
            </div>

            <div class="detail-list">
                <article>
                    <span>01</span>
                    <h3>Celebration Capacity</h3>
                    <p>Suitable for 100 to 250 guests in cluster seating, 300 to 400 guests in theatre style, and larger informal gatherings using the outdoor space.</p>
                </article>
                <article>
                    <span>02</span>
                    <h3>Dining & Kitchen Support</h3>
                    <p>A separate dining hall with 25 tables and seating for around 150 guests is connected to a kitchen area for smoother catering operations.</p>
                </article>
                <article>
                    <span>03</span>
                    <h3>Garden & Preparation Rooms</h3>
                    <p>The outdoor lawn can support open-air ceremonies, while two nearby rooms can be used for preparation, relaxation, or pre-function discussions.</p>
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
                <span>Elegant lighting and custom decor options</span>
                <span>Wi-Fi across the venue</span>
                <span>Ample parking space</span>
                <span>Wheelchair accessibility</span>
                <span>Power backup and 30KVA generator</span>
                <span>24/7 security with CCTV surveillance</span>
                <span>Children's play area</span>
                <span>Running water</span>
                <span>Separate washrooms for ladies and gentlemen</span>
                <span>Two rooms near the main hall</span>
                <span>Separate car entry and exit</span>
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
