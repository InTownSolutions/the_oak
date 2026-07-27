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
                    src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=1300&q=85"
                    alt="Warm banquet setup at a resort"
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
                        <input type="checkbox" value="banquet" checked data-combined-service>
                        <img
                            src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&fit=crop&w=900&q=85"
                            alt="Banquet hall decorated for an event"
                        >
                        <span>Banquet Services</span>
                        <strong>Banquet Hall</strong>
                        <small>Weddings, receptions, corporate events, and private celebrations.</small>
                    </label>

                    <label class="combined-service-card is-selected">
                        <input type="checkbox" value="rooms" checked data-combined-service>
                        <img
                            src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=900&q=85"
                            alt="Comfortable resort room"
                        >
                        <span>Accommodation</span>
                        <strong>Rooms</strong>
                        <small>Heritage rooms, garden view rooms, and family rooms.</small>
                    </label>

                    <label class="combined-service-card">
                        <input type="checkbox" value="cottages" data-combined-service>
                        <img
                            src="https://images.unsplash.com/photo-1518733057094-95b53143d2a7?auto=format&fit=crop&w=900&q=85"
                            alt="Private resort cottage in nature"
                        >
                        <span>Accommodation</span>
                        <strong>Cottages</strong>
                        <small>Quiet private stays for families, retreats, and groups.</small>
                    </label>

                    <label class="combined-service-card">
                        <input type="checkbox" value="decoration" data-combined-service>
                        <img
                            src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=900&q=85"
                            alt="Wedding decoration with flowers and lights"
                        >
                        <span>Event Support</span>
                        <strong>Decoration</strong>
                        <small>Grand wedding decor, signature celebration decor, or simple essentials.</small>
                    </label>

                    <label class="combined-service-card">
                        <input type="checkbox" value="catering" data-combined-service>
                        <img
                            src="https://images.unsplash.com/photo-1555244162-803834f70033?auto=format&fit=crop&w=900&q=85"
                            alt="Catering food arrangement"
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
                                <select>
                                    <option>Wedding Ceremony</option>
                                    <option>Reception</option>
                                    <option>Engagement</option>
                                    <option>Corporate Event</option>
                                    <option>Private Celebration</option>
                                </select>
                            </label>
                            <label>
                                Expected Guests
                                <input type="number" min="1" placeholder="Example: 150">
                            </label>
                            <label>
                                Hall Preference
                                <select>
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
                                <select>
                                    <option>Heritage Room</option>
                                    <option>Garden View Room</option>
                                    <option>Family Room</option>
                                </select>
                            </label>
                            <label>
                                Rooms Needed
                                <input type="number" min="1" placeholder="Example: 4">
                            </label>
                            <label>
                                Number Of Guests
                                <input type="number" min="1" placeholder="Example: 10">
                            </label>
                        </div>
                    </article>

                    <article class="combined-detail is-hidden" data-service-detail="cottages">
                        <div>
                            <p class="eyebrow">Cottages</p>
                            <h3>Private Cottage Requirement</h3>
                        </div>
                        <div class="combined-field-grid">
                            <label>
                                Cottage Type
                                <select>
                                    <option>Forest Cottage</option>
                                    <option>Family Cottage</option>
                                    <option>Group Cottage</option>
                                </select>
                            </label>
                            <label>
                                Cottages Needed
                                <input type="number" min="1" placeholder="Example: 2">
                            </label>
                            <label>
                                Guests Staying
                                <input type="number" min="1" placeholder="Example: 6">
                            </label>
                        </div>
                    </article>

                    <article class="combined-detail is-hidden" data-service-detail="decoration">
                        <div>
                            <p class="eyebrow">Decoration</p>
                            <h3>Decor Style And Package</h3>
                        </div>
                        <div class="combined-field-grid">
                            <label>
                                Decoration Category
                                <select>
                                    <option>Grand Wedding Decor</option>
                                    <option>Signature Celebration Decor</option>
                                    <option>Simple Decor Essentials</option>
                                </select>
                            </label>
                            <label>
                                Preferred Theme
                                <input type="text" placeholder="Example: Floral, rustic, golden">
                            </label>
                            <label>
                                Decor Areas
                                <select>
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
                                <select>
                                    <option>Pure Veg</option>
                                    <option>Non-Veg</option>
                                    <option>Veg And Non-Veg</option>
                                </select>
                            </label>
                            <label>
                                Service Level
                                <select>
                                    <option>Complete Feast</option>
                                    <option>Partial Service</option>
                                </select>
                            </label>
                            <label>
                                Guests For Food
                                <input type="number" min="1" placeholder="Example: 120">
                            </label>
                        </div>
                        <a class="combined-menu-link" href="/catering-menu.pdf" target="_blank" rel="noopener">Open sample menu PDF</a>
                    </article>
                </div>
            </div>

            <aside id="enquiry" class="combined-summary-panel">
                <p class="eyebrow">One Enquiry Form</p>
                <h2>Customer Details</h2>
                <p>One request reaches the admin team. Later, the admin can call and convert selected services into confirmed bookings.</p>

                <form class="combined-form" data-combined-form>
                    <label>
                        Full Name
                        <input type="text" placeholder="Customer name" required>
                    </label>
                    <label>
                        Phone Number
                        <input type="tel" placeholder="Contact number" required>
                    </label>
                    <label>
                        Email Address
                        <input type="email" placeholder="Optional email">
                    </label>
                    <label>
                        Best Time To Call
                        <select>
                            <option>Morning</option>
                            <option>Afternoon</option>
                            <option>Evening</option>
                        </select>
                    </label>
                    <label>
                        Additional Notes
                        <textarea rows="4" placeholder="Share any event, stay, food, or decor notes"></textarea>
                    </label>

                    <div class="selected-summary">
                        <span>Selected Services</span>
                        <strong data-selected-summary>Banquet Hall, Rooms</strong>
                    </div>

                    <button class="combined-submit" type="submit">Send Combined Enquiry</button>
                    <p class="combined-result" data-combined-result hidden>
                        Demo enquiry created. In the final system this will appear in the admin enquiry table.
                    </p>
                </form>
            </aside>
        </section>

        <script>
            const serviceInputs = document.querySelectorAll('[data-combined-service]');
            const serviceDetails = document.querySelectorAll('[data-service-detail]');
            const selectedSummary = document.querySelector('[data-selected-summary]');
            const combinedForm = document.querySelector('[data-combined-form]');
            const combinedResult = document.querySelector('[data-combined-result]');
            const serviceNames = {
                banquet: 'Banquet Hall',
                rooms: 'Rooms',
                cottages: 'Cottages',
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

            combinedForm.addEventListener('submit', (event) => {
                event.preventDefault();
                combinedResult.hidden = false;
            });

            refreshCombinedSelection();
        </script>
    </main>
</x-layouts.app>
