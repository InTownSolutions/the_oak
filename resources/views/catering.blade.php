<x-layouts.app title="Catering | The Oak">
    <main class="site-shell">
        <nav class="topbar" aria-label="Primary navigation">
            <a class="brand" href="/">
                <span class="brand-mark">O</span>
                <span>The Oak</span>
            </a>

            <div class="nav-links">
                <a href="/">All Services</a>
                <a href="#catering-options">Options</a>
                <a href="#enquiry">Enquire</a>
            </div>
        </nav>

        <section class="catering-hero">
            <div class="catering-hero-copy">
                <p class="eyebrow">Catering Services</p>
                <h1>Menus For Gatherings, Celebrations, And Events</h1>
                <p>
                    The Oak supports in-house catering with multi-cuisine menu options and experienced service staff.
                    Outside caterers can also be discussed based on the event requirement.
                </p>
                <div class="hero-actions">
                    <a class="primary-action" href="#enquiry">Enquire About Catering</a>
                    <a class="ghost-action" href="/catering-menu.pdf" target="_blank" rel="noopener">Open Sample Menu</a>
                </div>
            </div>

            <div class="catering-hero-image" aria-label="Catering preview">
                <img
                    src="{{ asset('images/oak/RV_02908.jpg') }}"
                    alt="The Oak restaurant dining area"
                >
            </div>
        </section>

        <section id="catering-options" class="catering-options">
            <div class="section-heading">
                <p class="eyebrow">Catering Options</p>
                <h2>Vegetarian And Non-Vegetarian Service Choices</h2>
            </div>

            <div class="catering-type-grid">
                <article class="catering-type-card">
                    <img
                        src="{{ asset('images/oak/RV_02923.jpg') }}"
                        alt="The Oak restaurant interior with dining setup"
                    >
                    <div class="catering-type-copy">
                        <span class="catering-type-label">Vegetarian</span>
                        <h3>Pure Veg Catering</h3>
                        <div class="catering-plan-grid">
                            <div>
                                <h4>Complete Veg Feast</h4>
                                <p>Full vegetarian catering for weddings, family events, and larger celebrations.</p>
                                <ul>
                                    <li>Welcome drink</li>
                                    <li>Starter selection</li>
                                    <li>Rice and bread counter</li>
                                    <li>Paneer or seasonal main dish</li>
                                    <li>Dal and vegetable curry</li>
                                    <li>Salad, pickle, papad</li>
                                    <li>Dessert counter</li>
                                </ul>
                            </div>

                            <div>
                                <h4>Veg Lite Service</h4>
                                <p>A smaller vegetarian setup for intimate events or lighter meal requirements.</p>
                                <ul>
                                    <li>One welcome drink</li>
                                    <li>Two starters</li>
                                    <li>Rice or bread</li>
                                    <li>One main curry</li>
                                    <li>One dessert</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="catering-type-card">
                    <img
                        src="{{ asset('images/oak/RV_02914.jpg') }}"
                        alt="The Oak restaurant seating arrangement"
                    >
                    <div class="catering-type-copy">
                        <span class="catering-type-label">Non-Vegetarian</span>
                        <h3>Non-Veg Catering</h3>
                        <div class="catering-plan-grid">
                            <div>
                                <h4>Complete Non-Veg Feast</h4>
                                <p>Full catering with vegetarian basics and selected non-vegetarian highlights.</p>
                                <ul>
                                    <li>Welcome drink</li>
                                    <li>Chicken or fish starter</li>
                                    <li>Rice and bread counter</li>
                                    <li>Chicken curry or roast item</li>
                                    <li>Seasonal vegetable dish</li>
                                    <li>Dal, salad, pickle</li>
                                    <li>Dessert counter</li>
                                </ul>
                            </div>

                            <div>
                                <h4>Non-Veg Lite Service</h4>
                                <p>A smaller non-vegetarian setup for casual gatherings and focused meal service.</p>
                                <ul>
                                    <li>One welcome drink</li>
                                    <li>One non-veg starter</li>
                                    <li>Rice or bread</li>
                                    <li>One non-veg main</li>
                                    <li>One dessert</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        <section class="details-section catering-details">
            <div class="details-copy">
                <p class="eyebrow">Menu Discussion</p>
                <h2>Multi-Cuisine Menus, Finalized Personally</h2>
                <p>
                    The final menu can include Indian, Continental, Asian, Khasi, and custom selections. Dish names,
                    serving style, counters, and special requests will be confirmed directly with the resort team.
                </p>
            </div>

            <div class="detail-list">
                <article>
                    <span>01</span>
                    <h3>Choose Food Type</h3>
                    <p>Customers begin with vegetarian, non-vegetarian, or mixed catering based on the event.</p>
                </article>
                <article>
                    <span>02</span>
                    <h3>In-House Or Outside Caterers</h3>
                    <p>The Oak can support in-house catering, and outside caterers may also be allowed after discussion.</p>
                </article>
                <article>
                    <span>03</span>
                    <h3>Team Finalizes Offline</h3>
                    <p>The admin team confirms menu details, guest count, service needs, and availability later.</p>
                </article>
            </div>
        </section>

        <section id="enquiry" class="enquiry-section">
            <div class="enquiry-intro">
                <p class="eyebrow">Start A Conversation</p>
                <h2>Catering Enquiry</h2>
                <p>
                    Share the food type, service level, approximate guest count, and event details. The resort team
                    will call back to discuss the menu and arrangements.
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
                <input type="hidden" name="service" value="Catering">
                <div class="field-group">
                    <label for="name">Full Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Enter your name" required>
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

                <div class="field-row">
                    <div class="field-group">
                        <label for="food_type">Food Type</label>
                        <select id="food_type" name="food_type">
                            <option @selected(old('food_type') === 'Vegetarian')>Vegetarian</option>
                            <option @selected(old('food_type') === 'Non-Vegetarian')>Non-Vegetarian</option>
                            <option @selected(old('food_type') === 'Both / Need Guidance')>Both / Need Guidance</option>
                        </select>
                    </div>
                    <div class="field-group">
                        <label for="service_level">Service Level</label>
                        <select id="service_level" name="service_level">
                            <option @selected(old('service_level') === 'Complete Feast')>Complete Feast</option>
                            <option @selected(old('service_level') === 'Lite Service')>Lite Service</option>
                            <option @selected(old('service_level') === 'Not sure yet')>Not sure yet</option>
                        </select>
                    </div>
                </div>

                <div class="field-group">
                    <label for="event_type">Event Type</label>
                    <select id="event_type" name="event_type">
                        <option @selected(old('event_type') === 'Wedding / Reception')>Wedding / Reception</option>
                        <option @selected(old('event_type') === 'Birthday / Anniversary')>Birthday / Anniversary</option>
                        <option @selected(old('event_type') === 'Family Gathering')>Family Gathering</option>
                        <option @selected(old('event_type') === 'Corporate Event')>Corporate Event</option>
                        <option @selected(old('event_type') === 'Other')>Other</option>
                    </select>
                </div>

                <div class="field-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" placeholder="Tell us about menu preferences or serving needs">{{ old('message') }}</textarea>
                </div>

                <button class="primary-action form-action" type="submit">Send Catering Enquiry</button>
            </form>
        </section>
    </main>
</x-layouts.app>
