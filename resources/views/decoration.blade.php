<x-layouts.app title="Decoration | The Oak">
    <main class="site-shell">
        <nav class="topbar" aria-label="Primary navigation">
            <a class="brand" href="/">
                <span class="brand-mark">O</span>
                <span>The Oak</span>
            </a>

            <div class="nav-links">
                <a href="/">All Services</a>
                <a href="#decoration-categories">Support</a>
                <a href="#enquiry">Enquire</a>
            </div>
        </nav>

        <section class="decoration-hero-redesign">
            <div class="decoration-hero-copy">
                <p class="eyebrow">Decoration Services</p>
                <h1>Choose A Decoration Setup For Your Event</h1>
                <p>
                    In-house decoration support is available for resort events, weddings, birthdays, anniversaries,
                    and formal gatherings. The final setup can be discussed directly with the team.
                </p>
                <div class="hero-actions">
                    <a class="primary-action" href="#decoration-categories">View Support</a>
                    <a class="ghost-action" href="#enquiry">Send Enquiry</a>
                </div>
            </div>

            <div class="decoration-hero-image" aria-label="Decoration preview">
                <img
                    src="{{ asset('images/oak/client/banquet-lawn.jpg') }}"
                    alt="The Oak outdoor event lawn"
                >
            </div>
        </section>

        <section id="decoration-categories" class="decoration-categories">
            <div class="section-heading">
                <p class="eyebrow">In-House Decoration</p>
                <h2>Decoration Support For Your Event Space</h2>
            </div>

            <div class="decor-category-grid">
                <article class="decor-category-card">
                    <img
                        src="{{ asset('images/oak/client/banquet-hero.jpg') }}"
                        alt="The Oak banquet entrance for wedding decoration planning"
                    >
                    <div>
                        <span>01</span>
                        <h3>Wedding & Celebration Setup</h3>
                        <p>The team can help discuss decoration needs for weddings, receptions, engagements, birthdays, and family events.</p>
                        <ul>
                            <li>Entrance and welcome area decor</li>
                            <li>Stage or backdrop discussion</li>
                            <li>Floral, traditional, or simple theme guidance</li>
                        </ul>
                    </div>
                </article>

                <article class="decor-category-card">
                    <img
                        src="{{ asset('images/oak/client/banquet-garden.jpg') }}"
                        alt="The Oak garden event space for celebration decoration"
                    >
                    <div>
                        <span>02</span>
                        <h3>Venue Area Styling</h3>
                        <p>Decoration can be planned around the banquet hall, garden area, entrance, restaurant space, or a combined setup.</p>
                        <ul>
                            <li>Banquet hall arrangement</li>
                            <li>Outdoor lawn or garden setup</li>
                            <li>Photo corner or focal table styling</li>
                        </ul>
                    </div>
                </article>

                <article class="decor-category-card">
                    <img
                        src="{{ asset('images/oak/client/banquet-entrance.jpg') }}"
                        alt="The Oak event entrance for simple decoration setup"
                    >
                    <div>
                        <span>03</span>
                        <h3>Personal Discussion</h3>
                        <p>There are no fixed decoration packages for now. The team will understand the customer requirement and suggest what can be arranged.</p>
                        <ul>
                            <li>Theme and color preference</li>
                            <li>Guest count and event mood</li>
                            <li>Final scope confirmed by phone</li>
                        </ul>
                    </div>
                </article>
            </div>
        </section>

        <section class="details-section decoration-details">
            <div class="details-copy">
                <p class="eyebrow">Visual Planning</p>
                <h2>In-House Decor Or Vendor Support</h2>
                <p>
                    Decoration needs usually depend on event type, guest count, venue area, theme, and customer
                    preference. The resort team can discuss what is possible in-house and guide the customer on
                    any outside vendor support if needed.
                </p>
            </div>

            <div class="detail-list">
                <article>
                    <span>01</span>
                    <h3>Share The Event</h3>
                    <p>Customers start by sharing the occasion, guest count, venue area, and decoration expectation.</p>
                </article>
                <article>
                    <span>02</span>
                    <h3>Share The Event Mood</h3>
                    <p>They can mention colors, theme, occasion, floral preferences, guest count, and specific decor needs.</p>
                </article>
                <article>
                    <span>03</span>
                    <h3>Finalized By The Team</h3>
                    <p>The team confirms what can be arranged in-house and what may need outside vendor support.</p>
                </article>
            </div>
        </section>

        <section id="enquiry" class="enquiry-section">
            <div class="enquiry-intro">
                <p class="eyebrow">Start A Conversation</p>
                <h2>Decoration Enquiry</h2>
                <p>
                    Send the event details and decoration preference. The resort team will call back to discuss the
                    setup, theme, and what can be arranged.
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
                <input type="hidden" name="service" value="Decoration">
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
                        <input id="guests" name="guests" type="number" min="1" value="{{ old('guests') }}" placeholder="Approx. count">
                    </div>
                </div>

                <div class="field-row">
                    <div class="field-group">
                        <label for="event_type">Event Type</label>
                        <select id="event_type" name="event_type">
                            <option @selected(old('event_type') === 'Wedding / Reception')>Wedding / Reception</option>
                            <option @selected(old('event_type') === 'Engagement')>Engagement</option>
                            <option @selected(old('event_type') === 'Birthday / Anniversary')>Birthday / Anniversary</option>
                            <option @selected(old('event_type') === 'Corporate / Formal Event')>Corporate / Formal Event</option>
                            <option @selected(old('event_type') === 'Other Celebration')>Other Celebration</option>
                        </select>
                    </div>
                    <div class="field-group">
                        <label for="decor_area">Decoration Area</label>
                        <select id="decor_area" name="decor_area">
                            <option @selected(old('decor_area') === 'Banquet Hall')>Banquet Hall</option>
                            <option @selected(old('decor_area') === 'Garden Area')>Garden Area</option>
                            <option @selected(old('decor_area') === 'Entrance + Hall')>Entrance + Hall</option>
                            <option @selected(old('decor_area') === 'Restaurant Area')>Restaurant Area</option>
                            <option @selected(old('decor_area') === 'Not sure yet')>Not sure yet</option>
                        </select>
                    </div>
                </div>

                <div class="field-group">
                    <label for="theme">Theme / Color Preference</label>
                    <input id="theme" name="theme" type="text" value="{{ old('theme') }}" placeholder="Example: warm gold, floral, traditional">
                </div>

                <div class="field-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" placeholder="Tell us what decoration you are imagining">{{ old('message') }}</textarea>
                </div>

                <button class="primary-action form-action" type="submit">Send Decoration Enquiry</button>
            </form>
        </section>
    </main>
</x-layouts.app>
