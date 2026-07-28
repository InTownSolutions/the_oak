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
                <a href="#enquiry">Enquire</a>
            </div>
        </nav>

        <section class="hero-section room-hero">
            <div class="hero-copy">
                <p class="eyebrow">Accommodation</p>
                <h1>Comfortable Stays Near The Oak</h1>
                <p>
                    Stay close to the resort in calm, comfortable accommodation surrounded by natural beauty.
                    Send an enquiry and the team will call back with availability and suitable options.
                </p>
                <div class="hero-actions">
                    <a class="primary-action" href="#enquiry">Enquire About Rooms</a>
                    <a class="ghost-action" href="#room-categories">View Room Types</a>
                </div>
            </div>

            <div class="hero-media" aria-label="Room preview">
                <img
                    src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=1400&q=85"
                    alt="Warm resort room with bed and wooden interior"
                >
            </div>
        </section>

        <section id="room-categories" class="room-categories">
            <div class="section-heading">
                <p class="eyebrow">Room Categories</p>
                <h2>Choose The Stay That Feels Right</h2>
            </div>

            <div class="room-category-grid">
                <article class="room-category-card">
                    <img
                        src="https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=1000&q=85"
                        alt="Heritage style room with warm lighting"
                    >
                    <div>
                        <span>01</span>
                        <h3>Semi Deluxe Rooms</h3>
                        <p>A comfortable stay option for travellers who want to explore nearby places and return to a quiet room after a day out.</p>
                        <ul>
                            <li>Suitable for leisure travellers</li>
                            <li>Convenient for sightseeing around Sohra, Jowai, and nearby areas</li>
                            <li>Good for short stays and event guests</li>
                        </ul>
                    </div>
                </article>

                <article class="room-category-card">
                    <img
                        src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=1000&q=85"
                        alt="Room with large window and natural light"
                    >
                    <div>
                        <span>02</span>
                        <h3>Cottages</h3>
                        <p>A peaceful home-away-from-home stay surrounded by nature, ideal for guests looking for a quieter resort escape.</p>
                        <ul>
                            <li>Peaceful cottage-style accommodation</li>
                            <li>Suited for families and relaxed getaways</li>
                            <li>Good for guests who prefer privacy and calm surroundings</li>
                        </ul>
                    </div>
                </article>

                <article class="room-category-card">
                    <img
                        src="https://images.unsplash.com/photo-1595576508898-0ad5c879a061?auto=format&fit=crop&w=1000&q=85"
                        alt="Spacious hotel room with twin bedding"
                    >
                    <div>
                        <span>03</span>
                        <h3>The Oak Restaurant</h3>
                        <p>A relaxed dining space for conversations with family and friends, offering a multi-cuisine menu in the outskirts of Shillong.</p>
                        <ul>
                            <li>Indian, Chinese, Continental, and Khasi menu options</li>
                            <li>Comfortable dining ambience</li>
                            <li>Useful for staying guests and event visitors</li>
                        </ul>
                    </div>
                </article>
            </div>
        </section>

        <section class="details-section room-details">
            <div class="details-copy">
                <p class="eyebrow">Guest Friendly</p>
                <h2>Enquiry First, Confirmation Later</h2>
                <p>
                    Customers can share their stay requirements without checking live dates or paying online.
                    The admin team will call, check availability internally, and confirm the room offline.
                </p>
            </div>

            <div class="detail-list">
                <article>
                    <span>01</span>
                    <h3>Easy Stay Enquiry</h3>
                    <p>Only essential details are asked first, so customers can enquire quickly.</p>
                </article>
                <article>
                    <span>02</span>
                    <h3>Travel & Event Friendly</h3>
                    <p>Guests can mention whether they are visiting for sightseeing, a family stay, or an event at the resort.</p>
                </article>
                <article>
                    <span>03</span>
                    <h3>Additional Assistance</h3>
                    <p>The team can also guide guests on planning support, vendor coordination, photography, videography, and other event needs.</p>
                </article>
            </div>
        </section>

        <section id="enquiry" class="enquiry-section">
            <div class="enquiry-intro">
                <p class="eyebrow">Start A Conversation</p>
                <h2>Room Enquiry</h2>
                <p>
                    Share your stay details and preferred room style. The resort team will call back to discuss
                    availability, suitable rooms, and next steps.
                </p>
            </div>

            <form class="enquiry-form" method="POST" action="#">
                @csrf
                <div class="field-group">
                    <label for="name">Full Name</label>
                    <input id="name" name="name" type="text" placeholder="Enter your name">
                </div>

                <div class="field-row">
                    <div class="field-group">
                        <label for="phone">Phone Number</label>
                        <input id="phone" name="phone" type="tel" placeholder="Your contact number">
                    </div>
                    <div class="field-group">
                        <label for="guests">Guests</label>
                        <input id="guests" name="guests" type="number" min="1" placeholder="No. of guests">
                    </div>
                </div>

                <div class="field-row">
                    <div class="field-group">
                        <label for="rooms">Rooms Needed</label>
                        <input id="rooms" name="rooms" type="number" min="1" placeholder="Approx. rooms">
                    </div>
                    <div class="field-group">
                        <label for="room_type">Preferred Room</label>
                        <select id="room_type" name="room_type">
                            <option>Semi Deluxe Rooms</option>
                            <option>Cottages</option>
                            <option>Not sure yet</option>
                        </select>
                    </div>
                </div>

                <div class="field-group">
                    <label for="stay_purpose">Stay Purpose</label>
                    <select id="stay_purpose" name="stay_purpose">
                        <option>Leisure Stay</option>
                        <option>Family Visit</option>
                        <option>Wedding / Event Guest</option>
                        <option>Corporate Stay</option>
                        <option>Other</option>
                    </select>
                </div>

                <div class="field-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" placeholder="Tell us about your stay requirements"></textarea>
                </div>

                <button class="primary-action form-action" type="submit">Send Room Enquiry</button>
            </form>
        </section>
    </main>
</x-layouts.app>
