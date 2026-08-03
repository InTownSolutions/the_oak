<x-layouts.app title="Decoration | The Oak">
    <main class="site-shell">
        <nav class="topbar" aria-label="Primary navigation">
            <a class="brand" href="/">
                <span class="brand-mark">O</span>
                <span>The Oak</span>
            </a>

            <div class="nav-links">
                <a href="/">All Services</a>
                <a href="#decoration-categories">Packages</a>
                <a href="#enquiry">Enquire</a>
            </div>
        </nav>

        <section class="decoration-hero-redesign">
            <div class="decoration-hero-copy">
                <p class="eyebrow">Decoration Services</p>
                <h1>Choose A Decoration Setup For Your Event</h1>
                <p>
                    Floral, traditional, and theme-based decor can be arranged in-house or discussed with outside
                    vendors based on the style and scale of your event.
                </p>
                <div class="hero-actions">
                    <a class="primary-action" href="#decoration-categories">View Packages</a>
                    <a class="ghost-action" href="#enquiry">Send Enquiry</a>
                </div>
            </div>

            <div class="decoration-hero-image" aria-label="Decoration preview">
                <img
                    src="https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=1400&q=85"
                    alt="Wedding ceremony arch decorated with flowers"
                >
            </div>
        </section>

        <section id="decoration-categories" class="decoration-categories">
            <div class="section-heading">
                <p class="eyebrow">Decoration Categories</p>
                <h2>Three Clear Levels Of Event Styling</h2>
            </div>

            <div class="decor-category-grid">
                <article class="decor-category-card">
                    <img
                        src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=1200&q=85"
                        alt="Grand wedding reception decorated with warm lights"
                    >
                    <div>
                        <span>01</span>
                        <h3>Grand Wedding Decor</h3>
                        <p>A complete decoration enquiry category for weddings and receptions that need a full visual setup.</p>
                        <ul>
                            <li>Entrance and welcome decor</li>
                            <li>Mandap or ceremony stage styling</li>
                            <li>Reception stage backdrop</li>
                            <li>Floral arrangements and aisle decor</li>
                            <li>Couple seating and photo corner</li>
                            <li>Table styling and mood lighting</li>
                        </ul>
                    </div>
                </article>

                <article class="decor-category-card">
                    <img
                        src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=1200&q=85"
                        alt="Celebration table decoration with warm lights"
                    >
                    <div>
                        <span>02</span>
                        <h3>Signature Celebration Decor</h3>
                        <p>A balanced setup for engagement, birthdays, anniversaries, family events, and smaller gatherings.</p>
                        <ul>
                            <li>Entry decor</li>
                            <li>Main backdrop or stage styling</li>
                            <li>Basic floral accents</li>
                            <li>Cake or focal table styling</li>
                            <li>Soft lighting suggestions</li>
                        </ul>
                    </div>
                </article>

                <article class="decor-category-card">
                    <img
                        src="https://images.unsplash.com/photo-1513278974582-3e1b4a4fa21e?auto=format&fit=crop&w=1200&q=85"
                        alt="Simple floral event decoration"
                    >
                    <div>
                        <span>03</span>
                        <h3>Simple Decor Essentials</h3>
                        <p>A light decoration option for customers who only need the basic event touches arranged.</p>
                        <ul>
                            <li>Simple welcome setup</li>
                            <li>Small backdrop or banner area</li>
                            <li>Basic table decoration</li>
                            <li>Minimal floral touches</li>
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
                    Decoration needs usually depend on the event type, guest count, venue area, theme, and customer
                    taste. The resort team can discuss in-house decor, outside vendor support, and entertainment
                    arrangements such as music, DJ, or visual setup.
                </p>
            </div>

            <div class="detail-list">
                <article>
                    <span>01</span>
                    <h3>Choose A Category</h3>
                    <p>Customers can start with a full, medium, or simple decoration requirement.</p>
                </article>
                <article>
                    <span>02</span>
                    <h3>Share The Event Mood</h3>
                    <p>They can mention colors, theme, occasion, floral preferences, guest count, and specific decor needs.</p>
                </article>
                <article>
                    <span>03</span>
                    <h3>Extras Can Be Discussed</h3>
                    <p>Planning coordination, vendor assistance, photography, videography, music, and visual setup can be discussed offline.</p>
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
                        <label for="decor_category">Decoration Category</label>
                        <select id="decor_category" name="decor_category">
                            <option @selected(old('decor_category') === 'Grand Wedding Decor')>Grand Wedding Decor</option>
                            <option @selected(old('decor_category') === 'Signature Celebration Decor')>Signature Celebration Decor</option>
                            <option @selected(old('decor_category') === 'Simple Decor Essentials')>Simple Decor Essentials</option>
                            <option @selected(old('decor_category') === 'Not sure yet')>Not sure yet</option>
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
