<x-layouts.app title="Combined Enquiry | The Oak">
    <main class="site-shell combined-enquiry-page">
        <nav class="topbar" aria-label="Primary navigation">
            <a class="brand" href="/">
                <span class="brand-mark">O</span>
                <span>The Oak</span>
            </a>

            <div class="nav-links">
                <a href="/">Current Flow</a>
                <a href="#services">Services</a>
                <a href="#enquiry">Enquiry</a>
                <a href="/admin">Admin Demo</a>
            </div>
        </nav>

        <section class="combined-hero">
            <div class="combined-hero-copy">
                <p class="eyebrow">Alternative Booking Experience</p>
                <h1>Plan Your Stay, Event, Food, And Decor In One Enquiry</h1>
                <p>
                    This version keeps the customer on one page. They can select every service they are interested in,
                    review the options, and send one combined enquiry for the admin team to call back.
                </p>
            </div>

            <div class="combined-hero-image">
                <img
                    src="{{ asset('images/oak/client/banquet-garden.jpg') }}"
                    alt="The Oak resort garden and event area"
                >
            </div>
        </section>

        <section id="services" class="combined-workspace" aria-label="Combined service enquiry builder">
            <div class="combined-main">
                <div class="section-heading">
                    <p class="eyebrow">Select Services</p>
                    <h2>Everything Can Be Enquired From Here</h2>
                    <p>
                        Customers can choose one service or combine multiple services for weddings, stays,
                        family gatherings, and resort events.
                    </p>
                </div>

                <div class="combined-service-grid">
                    <label class="combined-service-card is-selected">
                        <input type="checkbox" name="selected_services[]" value="banquet" checked data-combined-service form="combinedEnquiryForm">
                        <img
                            src="{{ asset('images/oak/client/banquet-hero.jpg') }}"
                            alt="The Oak banquet entrance"
                        >
                        <span>Banquet Services</span>
                        <strong>Banquet Hall</strong>
                        <small>Weddings, receptions, corporate events, and private celebrations.</small>
                    </label>

                    <label class="combined-service-card is-selected">
                        <input type="checkbox" name="selected_services[]" value="rooms" checked data-combined-service form="combinedEnquiryForm">
                        <img
                            src="{{ asset('images/oak/client/room-deluxe.jpg') }}"
                            alt="The Oak guest room"
                        >
                        <span>Accommodation</span>
                        <strong>Rooms</strong>
                        <small>Heritage rooms, garden view rooms, and family rooms.</small>
                    </label>

                    <label class="combined-service-card">
                        <input type="checkbox" name="selected_services[]" value="decoration" data-combined-service form="combinedEnquiryForm">
                        <img
                            src="{{ asset('images/oak/client/banquet-lawn.jpg') }}"
                            alt="The Oak lawn for event decoration planning"
                        >
                        <span>Event Support</span>
                        <strong>Decoration</strong>
                        <small>In-house decoration support for events, themes, and venue areas.</small>
                    </label>

                    <label class="combined-service-card">
                        <input type="checkbox" name="selected_services[]" value="catering" data-combined-service form="combinedEnquiryForm">
                        <img
                            src="{{ asset('images/oak/client/restaurant-hero.jpg') }}"
                            alt="The Oak restaurant dining area"
                        >
                        <span>Event Support</span>
                        <strong>Catering</strong>
                        <small>Veg and non-veg menu enquiries with complete or partial service.</small>
                    </label>
                </div>

                <div class="combined-detail-stack" aria-live="polite">
                    <article class="combined-detail" data-service-detail="banquet">
                        <div>
                            <p class="eyebrow">Banquet Hall</p>
                            <h3>Event And Hall Requirement</h3>
                        </div>
                        <div class="combined-field-grid">
                            <label>
                                Event Type
                                <select name="banquet_event_type" form="combinedEnquiryForm">
                                    <option>Wedding Ceremony</option>
                                    <option>Reception</option>
                                    <option>Engagement</option>
                                    <option>Corporate Event</option>
                                    <option>Private Celebration</option>
                                </select>
                            </label>
                            <label>
                                Expected Guests
                                <input type="number" name="banquet_guests" min="1" placeholder="Example: 150" form="combinedEnquiryForm">
                            </label>
                            <label>
                                Hall Preference
                                <select name="banquet_hall_preference" form="combinedEnquiryForm">
                                    <option>Main Banquet Hall</option>
                                    <option>Garden Side Setup</option>
                                    <option>Indoor And Outdoor Setup</option>
                                </select>
                            </label>
                        </div>
                    </article>

                    <article class="combined-detail" data-service-detail="rooms">
                        <div>
                            <p class="eyebrow">Rooms</p>
                            <h3>Stay Requirement</h3>
                        </div>
                        <div class="combined-field-grid">
                            <label>
                                Room Category
                                <select name="room_type" form="combinedEnquiryForm">
                                    <option>Guest Room</option>
                                    <option>Not sure yet</option>
                                </select>
                            </label>
                            <label>
                                Rooms Needed
                                <input type="number" name="rooms" min="1" placeholder="Example: 4" form="combinedEnquiryForm">
                            </label>
                            <label>
                                Number Of Guests
                                <input type="number" name="rooms_guests" min="1" placeholder="Example: 10" form="combinedEnquiryForm">
                            </label>
                        </div>
                    </article>

                    <article class="combined-detail is-hidden" data-service-detail="decoration">
                        <div>
                            <p class="eyebrow">Decoration</p>
                            <h3>Decor Style And Area</h3>
                        </div>
                        <div class="combined-field-grid">
                            <label>
                                Decoration Area
                                <select name="decor_area" form="combinedEnquiryForm">
                                    <option>Banquet Hall</option>
                                    <option>Garden Area</option>
                                    <option>Entrance + Hall</option>
                                    <option>Restaurant Area</option>
                                    <option>Not sure yet</option>
                                </select>
                            </label>
                            <label>
                                Preferred Theme
                                <input type="text" name="theme" placeholder="Example: Floral, rustic, golden" form="combinedEnquiryForm">
                            </label>
                            <label>
                                Decor Areas
                                <select name="decor_areas" form="combinedEnquiryForm">
                                    <option>Stage, Entry, Seating, Photo Corner</option>
                                    <option>Stage And Entry</option>
                                    <option>Simple Backdrop Only</option>
                                </select>
                            </label>
                        </div>
                    </article>

                    <article class="combined-detail is-hidden" data-service-detail="catering">
                        <div>
                            <p class="eyebrow">Catering</p>
                            <h3>Food And Menu Requirement</h3>
                        </div>
                        <div class="combined-field-grid">
                            <label>
                                Food Type
                                <select name="food_type" form="combinedEnquiryForm">
                                    <option>Vegetarian</option>
                                    <option>Non-Vegetarian</option>
                                    <option>Veg And Non-Veg</option>
                                    <option>Need Guidance</option>
                                </select>
                            </label>
                            <label>
                                Meal Type
                                <select name="meal_type" form="combinedEnquiryForm">
                                    <option>Lunch</option>
                                    <option>Dinner</option>
                                    <option>High Tea</option>
                                    <option>Snacks / Quick Bites</option>
                                    <option>Custom Discussion</option>
                                </select>
                            </label>
                            <label>
                                Guests For Food
                                <input type="number" name="catering_guests" min="1" placeholder="Example: 120" form="combinedEnquiryForm">
                            </label>
                            <label>
                                Menu Structure
                                <select name="menu_style" form="combinedEnquiryForm">
                                    <option>Standard Lunch / Dinner Format</option>
                                    <option>High Tea Format</option>
                                    <option>Only Selected Items</option>
                                    <option>Need Team Recommendation</option>
                                </select>
                            </label>
                        </div>
                        <a class="combined-menu-link" href="/catering-menu.pdf" target="_blank" rel="noopener">Open full catering menu PDF</a>
                    </article>
                </div>
            </div>

            <aside id="enquiry" class="combined-summary-panel">
                <p class="eyebrow">One Enquiry Form</p>
                <h2>Customer Details</h2>
                <p>One request reaches the admin team. Later, the admin can call and convert selected services into confirmed bookings.</p>

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

                <form id="combinedEnquiryForm" class="combined-form" method="POST" action="{{ route('enquiries.store') }}" data-combined-form>
                    @csrf
                    <input type="hidden" name="service" value="Combined Enquiry">
                    <label>
                        Full Name
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Customer name" required>
                    </label>
                    <label>
                        Phone Number
                        <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="Contact number" required>
                    </label>
                    <label>
                        Email Address
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email for booking updates">
                    </label>
                    <label>
                        Best Time To Call
                        <select name="best_time_to_call">
                            <option>Morning</option>
                            <option>Afternoon</option>
                            <option>Evening</option>
                        </select>
                    </label>
                    <label>
                        Additional Notes
                        <textarea rows="4" name="message" placeholder="Share any event, stay, food, or decor notes">{{ old('message') }}</textarea>
                    </label>

                    <div class="selected-summary">
                        <span>Selected Services</span>
                        <strong data-selected-summary>Banquet Hall, Rooms</strong>
                    </div>

                    <button class="combined-submit" type="submit">Send Combined Enquiry</button>
                </form>
            </aside>
        </section>

        <script>
            const serviceInputs = document.querySelectorAll('[data-combined-service]');
            const serviceDetails = document.querySelectorAll('[data-service-detail]');
            const selectedSummary = document.querySelector('[data-selected-summary]');
            const combinedForm = document.querySelector('[data-combined-form]');
            const serviceNames = {
                banquet: 'Banquet Hall',
                rooms: 'Rooms',
                decoration: 'Decoration',
                catering: 'Catering',
            };

            function refreshCombinedSelection() {
                const selected = Array.from(serviceInputs)
                    .filter((input) => input.checked)
                    .map((input) => input.value);

                serviceInputs.forEach((input) => {
                    input.closest('.combined-service-card').classList.toggle('is-selected', input.checked);
                });

                serviceDetails.forEach((detail) => {
                    detail.classList.toggle('is-hidden', !selected.includes(detail.dataset.serviceDetail));
                });

                selectedSummary.textContent = selected.length
                    ? selected.map((service) => serviceNames[service]).join(', ')
                    : 'No service selected yet';
            }

            serviceInputs.forEach((input) => {
                input.addEventListener('change', refreshCombinedSelection);
            });

            refreshCombinedSelection();
        </script>
    </main>
</x-layouts.app>
