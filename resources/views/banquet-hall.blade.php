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
                    A warm, elegant setting for weddings, receptions, family gatherings, corporate events,
                    and milestone celebrations in the Khasi Hills.
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
                <strong>250+</strong>
                <span>Guest Capacity</span>
            </div>
            <div>
                <strong>Indoor</strong>
                <span>Celebration Space</span>
            </div>
            <div>
                <strong>Decor</strong>
                <span>Available On Request</span>
            </div>
            <div>
                <strong>Catering</strong>
                <span>Appointment Support</span>
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
                <h2>Simple To Explore, Easy To Enquire</h2>
                <p>
                    Customers can choose their preferred event date and quickly see whether the banquet hall appears
                    available. Final confirmation still happens after the resort team calls back.
                </p>
            </div>

            <div class="detail-list">
                <article>
                    <span>01</span>
                    <h3>Weddings & Receptions</h3>
                    <p>Designed for graceful gatherings with space for ceremony, dining, and family moments.</p>
                </article>
                <article>
                    <span>02</span>
                    <h3>Private Celebrations</h3>
                    <p>Birthdays, anniversaries, reunions, and festive events can be discussed through enquiry.</p>
                </article>
                <article>
                    <span>03</span>
                    <h3>Corporate Events</h3>
                    <p>Meetings, retreats, team dinners, and formal functions can be arranged by the admin team.</p>
                </article>
            </div>
        </section>

        <section id="enquiry" class="enquiry-section">
            <div class="enquiry-intro">
                <p class="eyebrow">Start A Conversation</p>
                <h2>Banquet Hall Enquiry</h2>
                <p>
                    Send a few details and the resort team will call back to discuss availability, arrangements,
                    decoration, and catering support.
                </p>
            </div>

            <form class="enquiry-form" method="POST" action="#">
                @csrf
                <div class="field-group">
                    <label for="name">Full Name</label>
                    <input id="name" name="name" type="text" placeholder="Enter your name">
                </div>

                <div class="field-group">
                    <label for="event_date">Preferred Event Date</label>
                    <input id="event_date" name="event_date" type="date" data-banquet-date>
                    <p class="availability-message neutral" data-banquet-availability>
                        Select a date to check banquet hall availability.
                    </p>
                </div>

                <div class="field-row">
                    <div class="field-group">
                        <label for="phone">Phone Number</label>
                        <input id="phone" name="phone" type="tel" placeholder="Your contact number">
                    </div>
                    <div class="field-group">
                        <label for="guests">Guests</label>
                        <input id="guests" name="guests" type="number" min="1" placeholder="Approx. count">
                    </div>
                </div>

                <div class="field-group">
                    <label for="event_type">Event Type</label>
                    <select id="event_type" name="event_type">
                        <option>Wedding / Reception</option>
                        <option>Birthday / Private Celebration</option>
                        <option>Corporate Event</option>
                        <option>Other Gathering</option>
                    </select>
                </div>

                <div class="field-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" placeholder="Tell us what you are planning"></textarea>
                </div>

                <button class="primary-action form-action" type="submit" data-banquet-submit disabled>Send Enquiry</button>
            </form>
        </section>

        <script>
            const banquetDateInput = document.querySelector('[data-banquet-date]');
            const banquetMessage = document.querySelector('[data-banquet-availability]');
            const banquetSubmit = document.querySelector('[data-banquet-submit]');
            const bookedBanquetDates = ['2026-07-18', '2026-08-15', '2026-10-24'];

            function updateBanquetAvailability() {
                const selectedDate = banquetDateInput.value;

                banquetMessage.classList.remove('available', 'unavailable', 'neutral');

                if (!selectedDate) {
                    banquetMessage.textContent = 'Select a date to check banquet hall availability.';
                    banquetMessage.classList.add('neutral');
                    banquetSubmit.disabled = true;
                    return;
                }

                if (bookedBanquetDates.includes(selectedDate)) {
                    banquetMessage.textContent = 'Banquet hall is unavailable on this date. Please choose another date.';
                    banquetMessage.classList.add('unavailable');
                    banquetSubmit.disabled = true;
                    return;
                }

                banquetMessage.textContent = 'Banquet hall appears available for this date. Submit your enquiry and our team will call to confirm.';
                banquetMessage.classList.add('available');
                banquetSubmit.disabled = false;
            }

            banquetDateInput.addEventListener('change', updateBanquetAvailability);
            updateBanquetAvailability();
        </script>
    </main>
</x-layouts.app>
