<x-layouts.app title="Rooms | The Oak">
    <main class="site-shell">
        <nav class="topbar" aria-label="Primary navigation">
            <a class="brand" href="/">
                <span class="brand-mark">O</span>
                <span>The Oak</span>
            </a>

            <div class="nav-links">
                <a href="/">All Services</a>
                <a href="#room-categories">Rooms</a>
                <a href="#restaurant-menu">Restaurant Menu</a>
                <a href="#room-facilities">Facilities</a>
                <a href="#enquiry">Enquire</a>
            </div>
        </nav>

        <section class="hero-section room-hero">
            <div class="hero-copy">
                <p class="eyebrow">Accommodation</p>
                <h1>Comfortable Stays Near The Oak</h1>
                <p>
                    Stay close to the resort in calm, comfortable accommodation surrounded by natural beauty.
                    Select your stay dates, check apparent availability, and send a booking request for admin
                    confirmation.
                </p>
                <div class="hero-actions">
                    <a class="primary-action" href="#enquiry">Enquire About Rooms</a>
                    <a class="ghost-action" href="#room-categories">View Room Types</a>
                </div>
            </div>

            <div class="hero-media" aria-label="Room preview">
                <img
                    src="{{ asset('images/oak/client/room-deluxe.jpg') }}"
                    alt="The Oak guest room bed setup"
                >
            </div>
        </section>

        <section id="room-categories" class="room-categories">
            <div class="section-heading">
                <p class="eyebrow">Rooms & Restaurant</p>
                <h2>Choose The Option That Feels Right</h2>
            </div>

            <div class="room-category-grid">
                <article class="room-category-card">
                    <img
                        src="{{ asset('images/oak/client/room-deluxe.jpg') }}"
                        alt="The Oak guest room"
                    >
                    <div>
                        <span>01</span>
                        <h3>Guest Room</h3>
                        <strong class="room-price">INR 3,500 - INR 4,000 / night</strong>
                        <p>A comfortable and convenient accommodation option offering a pleasant stay with essential amenities and quality service.</p>
                        <ul>
                            <li>8 rooms available in total</li>
                            <li>Spacious and comfortable bedrooms with attached bathrooms</li>
                            <li>Private sitting area with balcony</li>
                            <li>Complimentary breakfast included</li>
                            <li>24/7 water and power availability</li>
                        </ul>
                    </div>
                </article>

                <article class="room-category-card">
                    <img
                        src="{{ asset('images/oak/client/restaurant-corner.jpg') }}"
                        alt="The Oak restaurant dining space"
                    >
                    <div>
                        <span>02</span>
                        <h3>The Oak Restaurant</h3>
                        <p>A warm dining space offering a delicious variety of multi-cuisine dishes in a comfortable indoor and outdoor seating ambience.</p>
                        <ul>
                            <li>Indian, South Indian, Chinese, Continental, and Khasi dishes</li>
                            <li>Comfortable indoor and outdoor seating</li>
                            <li>Warm ambience for a great dining experience</li>
                        </ul>
                        <a class="text-action" href="/restaurant-menu.pdf" target="_blank" rel="noopener">View Restaurant Menu</a>
                    </div>
                </article>
            </div>
        </section>

        <section id="restaurant-menu" class="restaurant-menu-section">
            <div class="restaurant-menu-copy">
                <p class="eyebrow">The Oak Restaurant</p>
                <h2>Restaurant Menu Highlights</h2>
                <p>
                    Guests can browse The Oak Restaurant menu for soups, quick bites, Indian dishes,
                    Chinese and Continental plates, momos, rice, Indian breads, and salads. Prices are shown
                    in the full restaurant menu PDF.
                </p>
                <a class="primary-action" href="/restaurant-menu.pdf" target="_blank" rel="noopener">Open Full Restaurant Menu</a>
            </div>

            <div class="restaurant-menu-grid">
                <article>
                    <span>01</span>
                    <h3>Soups & Quick Bites</h3>
                    <p>Clear soup, hot and sour soup, pakora, fries, chilli potato, baby corn, rolls, fish fingers, chicken popcorn, and wings.</p>
                </article>
                <article>
                    <span>02</span>
                    <h3>Chinese & Continental</h3>
                    <p>Noodles, fried rice, pasta, chilly fry, stir fry, sweet and sour, manchurian, fish and chips, and prawn options.</p>
                </article>
                <article>
                    <span>03</span>
                    <h3>Momos, Rice & Breads</h3>
                    <p>Steamed and fried momos, plain rice, veg pulao, jeera rice, roti, paratha, aloo paratha, gobi paratha, and paneer paratha.</p>
                </article>
                <article>
                    <span>04</span>
                    <h3>Indian Mains & Salads</h3>
                    <p>Paneer masala, dal, rajma, chicken curry, fish curry, egg curry, mutton curry, green salad, chicken salad, and panzanella salad.</p>
                </article>
            </div>
        </section>

        <section class="details-section room-details">
            <div class="details-copy">
                <p class="eyebrow">Guest Friendly</p>
                <h2>Enquiry First, Confirmation Later</h2>
                <p>
                    Customers can select stay dates and send a room booking request from the website. The room is
                    confirmed only after the admin contacts the customer, collects the required advance, and saves
                    the confirmed booking.
                </p>
            </div>

            <div class="detail-list">
                <article>
                    <span>01</span>
                    <h3>Check Room Availability</h3>
                    <p>The system checks confirmed room bookings before allowing the customer to continue.</p>
                </article>
                <article>
                    <span>02</span>
                    <h3>Admin Collects Advance</h3>
                    <p>A 25% booking advance is required to confirm and reserve the selected dates.</p>
                </article>
                <article>
                    <span>03</span>
                    <h3>Admin Confirms Booking</h3>
                    <p>The admin verifies payment manually and confirms the final room booking from the admin side.</p>
                </article>
            </div>
        </section>

        <section id="room-facilities" class="amenities-section">
            <div class="section-heading">
                <p class="eyebrow">Guest House Facilities</p>
                <h2>Comfortable Stay With Essential Amenities</h2>
            </div>

            <div class="amenity-grid">
                <span>Spacious and comfortable bedrooms with attached bathrooms</span>
                <span>Private sitting area with balcony</span>
                <span>Fresh and delicious meals</span>
                <span>Clean and well-maintained facilities</span>
                <span>Friendly and hospitable service</span>
                <span>24/7 water and power availability</span>
                <span>High-speed Wi-Fi connectivity</span>
                <span>24/7 security with CCTV surveillance</span>
            </div>
        </section>

        <section id="enquiry" class="enquiry-section">
            <div class="enquiry-intro">
                <p class="eyebrow">Start A Conversation</p>
                <h2>Room Enquiry</h2>
                <p>
                    Choose your dates and number of rooms. Availability and amount shown here are subject to admin
                    confirmation after the team contacts you.
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
                <input type="hidden" name="service" value="Rooms">
                <input type="hidden" name="estimated_total" value="{{ old('estimated_total') }}" data-room-total-input>
                <input type="hidden" name="estimated_advance" value="{{ old('estimated_advance') }}" data-room-advance-input>
                <div class="field-group">
                    <label for="name">Full Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Enter your name" required>
                </div>

                <div class="field-group">
                    <label for="email">Email Address</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Email for booking updates">
                </div>

                <div class="field-row">
                    <div class="field-group">
                        <label for="phone">Phone Number</label>
                        <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" placeholder="Your contact number" required>
                    </div>
                    <div class="field-group">
                        <label for="guests">Guests</label>
                        <input id="guests" name="guests" type="number" min="1" value="{{ old('guests') }}" placeholder="No. of guests">
                    </div>
                </div>

                <div class="field-row">
                    <div class="field-group">
                        <label for="check_in">Check-In</label>
                        <input id="check_in" name="check_in" type="date" value="{{ old('check_in') }}" data-room-check-in required>
                    </div>
                    <div class="field-group">
                        <label for="check_out">Check-Out</label>
                        <input id="check_out" name="check_out" type="date" value="{{ old('check_out') }}" data-room-check-out required>
                    </div>
                </div>

                <div class="field-row">
                    <div class="field-group">
                        <label for="rooms">Rooms Needed</label>
                        <input id="rooms" name="rooms" type="number" min="1" value="{{ old('rooms', 1) }}" placeholder="No. of rooms" data-room-count required>
                    </div>
                    <div class="field-group">
                        <label for="room_type">Room Type</label>
                        <select id="room_type" name="room_type">
                            <option @selected(old('room_type') === 'Guest Room')>Guest Room</option>
                        </select>
                    </div>
                </div>

                <div class="room-booking-summary">
                    <div>
                        <span>Price Per Night</span>
                        <strong>INR 3,500+</strong>
                    </div>
                    <div>
                        <span>Estimated Total</span>
                        <strong data-room-total>Choose dates</strong>
                    </div>
                    <div>
                        <span>Advance Required</span>
                        <strong data-room-advance>25% after availability</strong>
                    </div>
                </div>

                <p class="availability-message neutral" data-room-availability>
                    Select check-in, check-out, and rooms to check availability.
                </p>

                <div class="upi-payment-box">
                    <div>
                        <p class="eyebrow">Admin Confirmation</p>
                        <h3>Advance Collected By The Team</h3>
                        <p>
                            A 25% advance payment is required to reserve the booking date. The Oak team will call
                            after this request and guide the customer through payment and confirmation.
                        </p>
                    </div>
                    <div>
                        <span>Booking Advance</span>
                        <strong>25%</strong>
                    </div>
                </div>

                <div class="field-group">
                    <label for="stay_purpose">Stay Purpose</label>
                    <select id="stay_purpose" name="stay_purpose">
                        <option @selected(old('stay_purpose') === 'Leisure Stay')>Leisure Stay</option>
                        <option @selected(old('stay_purpose') === 'Family Visit')>Family Visit</option>
                        <option @selected(old('stay_purpose') === 'Wedding / Event Guest')>Wedding / Event Guest</option>
                        <option @selected(old('stay_purpose') === 'Corporate Stay')>Corporate Stay</option>
                        <option @selected(old('stay_purpose') === 'Other')>Other</option>
                    </select>
                </div>

                <div class="field-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" placeholder="Tell us about your stay requirements">{{ old('message') }}</textarea>
                </div>

                <button class="primary-action form-action" type="submit" data-room-submit disabled>Send Room Booking Request</button>
            </form>
        </section>

        <script>
            const roomCheckIn = document.querySelector('[data-room-check-in]');
            const roomCheckOut = document.querySelector('[data-room-check-out]');
            const roomCount = document.querySelector('[data-room-count]');
            const roomAvailability = document.querySelector('[data-room-availability]');
            const roomSubmit = document.querySelector('[data-room-submit]');
            const roomTotal = document.querySelector('[data-room-total]');
            const roomAdvance = document.querySelector('[data-room-advance]');
            const roomTotalInput = document.querySelector('[data-room-total-input]');
            const roomAdvanceInput = document.querySelector('[data-room-advance-input]');
            let roomAvailabilityRequest;

            function formatRoomAmount(amount) {
                return `INR ${Number(amount).toLocaleString('en-IN')}`;
            }

            function resetRoomAvailability(message = 'Select check-in, check-out, and rooms to check availability.') {
                roomAvailability.classList.remove('available', 'unavailable', 'neutral');
                roomAvailability.classList.add('neutral');
                roomAvailability.textContent = message;
                roomTotal.textContent = 'Choose dates';
                roomAdvance.textContent = '25% after availability';
                roomTotalInput.value = '';
                roomAdvanceInput.value = '';
                roomSubmit.disabled = true;
            }

            function updateRoomAvailability() {
                const checkIn = roomCheckIn.value;
                const checkOut = roomCheckOut.value;
                const rooms = roomCount.value;

                if (!checkIn || !checkOut || !rooms) {
                    resetRoomAvailability();
                    return;
                }

                if (checkOut <= checkIn) {
                    resetRoomAvailability('Check-out must be after check-in.');
                    roomAvailability.classList.remove('neutral');
                    roomAvailability.classList.add('unavailable');
                    return;
                }

                roomAvailability.classList.remove('available', 'unavailable', 'neutral');
                roomAvailability.classList.add('neutral');
                roomAvailability.textContent = 'Checking room availability...';
                roomSubmit.disabled = true;

                if (roomAvailabilityRequest) {
                    roomAvailabilityRequest.abort();
                }

                roomAvailabilityRequest = new AbortController();

                fetch(`{{ route('rooms.availability') }}?check_in=${encodeURIComponent(checkIn)}&check_out=${encodeURIComponent(checkOut)}&rooms=${encodeURIComponent(rooms)}&room_type=Guest%20Room`, {
                    headers: { 'Accept': 'application/json' },
                    signal: roomAvailabilityRequest.signal,
                })
                    .then((response) => response.json())
                    .then((data) => {
                        roomAvailability.classList.remove('available', 'unavailable', 'neutral');
                        roomTotal.textContent = formatRoomAmount(data.estimated_total);
                        roomAdvance.textContent = formatRoomAmount(data.estimated_advance);
                        roomTotalInput.value = data.estimated_total;
                        roomAdvanceInput.value = data.estimated_advance;

                        if (data.available) {
                            roomAvailability.textContent = `${data.available_rooms} room(s) appear available for ${data.nights} night(s). Submit your request and our team will call to confirm.`;
                            roomAvailability.classList.add('available');
                            roomSubmit.disabled = false;
                        } else {
                            roomAvailability.textContent = `Only ${data.available_rooms} room(s) appear available for these dates. Please reduce rooms or choose different dates.`;
                            roomAvailability.classList.add('unavailable');
                            roomSubmit.disabled = true;
                        }
                    })
                    .catch((error) => {
                        if (error.name === 'AbortError') {
                            return;
                        }

                        roomAvailability.classList.remove('available', 'unavailable', 'neutral');
                        roomAvailability.textContent = 'Unable to check room availability right now. Please try again.';
                        roomAvailability.classList.add('unavailable');
                        roomSubmit.disabled = true;
                    });
            }

            [roomCheckIn, roomCheckOut, roomCount].forEach((input) => {
                input.addEventListener('change', updateRoomAvailability);
                input.addEventListener('input', updateRoomAvailability);
            });

            updateRoomAvailability();
        </script>
    </main>
</x-layouts.app>
