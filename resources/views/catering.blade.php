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
                    The Oak offers multi-cuisine catering for events hosted at the resort, with quick bites,
                    Indian meals, Chinese and Continental dishes, desserts, and high tea selections.
                </p>
                <div class="hero-actions">
                    <a class="primary-action" href="#enquiry">Enquire About Catering</a>
                    <a class="ghost-action" href="/catering-menu.pdf" target="_blank" rel="noopener">View Full Menu</a>
                </div>
            </div>

            <div class="catering-hero-image" aria-label="Catering preview">
                <img
                    src="{{ asset('images/oak/client/restaurant-hero.jpg') }}"
                    alt="The Oak restaurant dining area"
                >
            </div>
        </section>

        <section id="catering-options" class="catering-options">
            <div class="section-heading">
                <p class="eyebrow">Menu Preview</p>
                <h2>Choose From A Wide Multi-Cuisine Menu</h2>
            </div>

            <div class="catering-menu-showcase">
                <article class="menu-feature-card">
                    <img
                        src="{{ asset('images/oak/client/restaurant-corner.jpg') }}"
                        alt="The Oak restaurant interior with dining setup"
                    >
                    <div>
                        <p class="eyebrow">Full Menu PDF</p>
                        <h3>Detailed Catering Menu</h3>
                        <p>
                            The complete PDF includes all available quick bites, main course options, salads,
                            drinks, desserts, and suggested lunch, dinner, and high tea formats.
                        </p>
                        <a class="text-action" href="/catering-menu.pdf" target="_blank" rel="noopener">Open full catering menu</a>
                    </div>
                </article>

                <div class="menu-category-grid">
                    <article>
                        <span>01</span>
                        <h3>Quick Bites</h3>
                        <p>Veg pakora, paneer pakora, peri peri fries, chicken pakora, fish fingers, chicken kabab, wings, rolls, nuggets, and mini burgers.</p>
                    </article>
                    <article>
                        <span>02</span>
                        <h3>Chinese & Continental</h3>
                        <p>Hakka noodles, fried rice, pasta, crispy veg, veg manchurian, chicken manchurian, chilly fry, roast chicken, pork ribs, fish, and prawns.</p>
                    </article>
                    <article>
                        <span>03</span>
                        <h3>Indian Selection</h3>
                        <p>Plain rice, pulao, roti, paratha, naan, dal, paneer dishes, chicken curry, fish curry, mutton curry, korma, kabab, and Chicken 65.</p>
                    </article>
                    <article>
                        <span>04</span>
                        <h3>Drinks & Desserts</h3>
                        <p>Coffee, tea, fresh lime drinks, soft drinks, rasmalai, gulab jamun, fruit salad, custard pudding, ice cream, caramel custard, and mousse.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="catering-format-section">
            <div class="section-heading compact-heading">
                <p class="eyebrow">Serving Formats</p>
                <h2>Suggested Menu Structures</h2>
            </div>

            <div class="catering-format-grid">
                <article>
                    <span class="catering-type-label">Lunch / Dinner</span>
                    <h3>Complete Meal Format</h3>
                    <ul>
                        <li>Two starter items, usually one veg and one non-veg</li>
                        <li>Two rice selections</li>
                        <li>One bread selection</li>
                        <li>Three non-vegetarian items</li>
                        <li>Two vegetarian items</li>
                        <li>Two dessert items</li>
                    </ul>
                </article>

                <article>
                    <span class="catering-type-label">High Tea</span>
                    <h3>Light Gathering Format</h3>
                    <ul>
                        <li>Coffee or tea service</li>
                        <li>Two sweet items as open choice</li>
                        <li>Two salty items as open choice</li>
                        <li>One mixed nuts selection</li>
                        <li>Pricing varies by item choice and add-ons</li>
                    </ul>
                </article>
            </div>
        </section>

        <section class="details-section catering-details">
            <div class="details-copy">
                <p class="eyebrow">Menu Discussion</p>
                <h2>Multi-Cuisine Menus, Finalized Personally</h2>
                <p>
                    The final menu can include Indian, Chinese, Continental, snacks, momos, salads, drinks,
                    desserts, and custom selections. Dish names, serving style, counters, and special requests
                    will be confirmed directly with the resort team.
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
                    <h3>Select Meal Format</h3>
                    <p>Lunch, dinner, high tea, snacks, or a custom format can be discussed with the resort team.</p>
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
                    Share the meal type, food preference, approximate guest count, and event details. The resort team
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
                        <label for="food_type">Food Type</label>
                        <select id="food_type" name="food_type">
                            <option @selected(old('food_type') === 'Vegetarian')>Vegetarian</option>
                            <option @selected(old('food_type') === 'Non-Vegetarian')>Non-Vegetarian</option>
                            <option @selected(old('food_type') === 'Veg And Non-Veg')>Veg And Non-Veg</option>
                            <option @selected(old('food_type') === 'Need Guidance')>Need Guidance</option>
                        </select>
                    </div>
                    <div class="field-group">
                        <label for="meal_type">Meal Type</label>
                        <select id="meal_type" name="meal_type">
                            <option @selected(old('meal_type') === 'Lunch')>Lunch</option>
                            <option @selected(old('meal_type') === 'Dinner')>Dinner</option>
                            <option @selected(old('meal_type') === 'High Tea')>High Tea</option>
                            <option @selected(old('meal_type') === 'Snacks / Quick Bites')>Snacks / Quick Bites</option>
                            <option @selected(old('meal_type') === 'Custom Discussion')>Custom Discussion</option>
                        </select>
                    </div>
                </div>

                <div class="field-group">
                    <label for="menu_style">Menu Structure</label>
                    <select id="menu_style" name="menu_style">
                        <option @selected(old('menu_style') === 'Standard Lunch / Dinner Format')>Standard Lunch / Dinner Format</option>
                        <option @selected(old('menu_style') === 'High Tea Format')>High Tea Format</option>
                        <option @selected(old('menu_style') === 'Only Selected Items')>Only Selected Items</option>
                        <option @selected(old('menu_style') === 'Need Team Recommendation')>Need Team Recommendation</option>
                    </select>
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
                    <textarea id="message" name="message" rows="4" placeholder="Mention preferred dishes, serving style, or any special food requirements">{{ old('message') }}</textarea>
                </div>

                <button class="primary-action form-action" type="submit">Send Catering Enquiry</button>
            </form>
        </section>
    </main>
</x-layouts.app>
