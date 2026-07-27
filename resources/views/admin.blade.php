<x-layouts.app title="Admin | The Oak">
    <main class="admin-shell">
        <aside class="admin-sidebar">
            <a class="admin-brand" href="/admin">
                <span class="brand-mark">O</span>
                <span>The Oak Admin</span>
            </a>

            <nav class="admin-nav" aria-label="Admin navigation">
                <a class="active" href="/admin">Enquiries</a>
                <a href="#booking-preview">Bookings</a>
                <a href="#tariff-season">Season Tariffs</a>
                <a href="/">Customer Site</a>
            </nav>
        </aside>

        <section class="admin-main">
            <header class="admin-header">
                <div>
                    <p class="eyebrow">Admin Workspace</p>
                    <h1>Enquiries & Internal Bookings</h1>
                </div>

                <div class="admin-date">
                    <span>Review Demo</span>
                    <strong>Dummy Data</strong>
                </div>
            </header>

            <section class="admin-stats" aria-label="Admin summary">
                <article>
                    <span>New</span>
                    <strong>06</strong>
                </article>
                <article>
                    <span>Contacted</span>
                    <strong>04</strong>
                </article>
                <article>
                    <span>In Discussion</span>
                    <strong>03</strong>
                </article>
                <article>
                    <span>Converted</span>
                    <strong>02</strong>
                </article>
            </section>

            <section class="admin-panel">
                <div class="admin-panel-header">
                    <div>
                        <h2>All Customer Enquiries</h2>
                        <p>Click any row to call, update status, and create a booking for one or multiple services.</p>
                    </div>

                    <div class="admin-filters">
                        <span>All Services</span>
                        <span>Newest First</span>
                    </div>
                </div>

                <div class="admin-table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Service</th>
                                <th>Enquiry Type</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="enquiry-row" tabindex="0"
                                data-name="Amit Sharma"
                                data-phone="+91 98765 43210"
                                data-email="amit.sharma@example.com"
                                data-service="Banquet Hall"
                                data-type="Wedding Reception"
                                data-guests="220"
                                data-status="New"
                                data-created="08 Jul 2026"
                                data-message="Looking for banquet hall, decoration and catering support for a wedding reception.">
                                <td>
                                    <strong>Amit Sharma</strong>
                                    <span>amit.sharma@example.com</span>
                                </td>
                                <td><span class="service-pill banquet">Banquet Hall</span></td>
                                <td>Wedding Reception</td>
                                <td>+91 98765 43210</td>
                                <td><span class="status-pill new">New</span></td>
                                <td>08 Jul 2026</td>
                            </tr>

                            <tr class="enquiry-row" tabindex="0"
                                data-name="Riya Khongwir"
                                data-phone="+91 99887 76655"
                                data-email="riya.k@example.com"
                                data-service="Rooms"
                                data-type="Family Stay"
                                data-guests="6"
                                data-status="Contacted"
                                data-created="08 Jul 2026"
                                data-message="Needs 3 rooms for family guests attending a function at the resort.">
                                <td>
                                    <strong>Riya Khongwir</strong>
                                    <span>riya.k@example.com</span>
                                </td>
                                <td><span class="service-pill rooms">Rooms</span></td>
                                <td>Family Stay</td>
                                <td>+91 99887 76655</td>
                                <td><span class="status-pill contacted">Contacted</span></td>
                                <td>08 Jul 2026</td>
                            </tr>

                            <tr class="enquiry-row" tabindex="0"
                                data-name="Karan Mehta"
                                data-phone="+91 91234 56789"
                                data-email="karan.mehta@example.com"
                                data-service="Decoration"
                                data-type="Engagement Decor"
                                data-guests="90"
                                data-status="In Discussion"
                                data-created="07 Jul 2026"
                                data-message="Interested in Signature Celebration Decor with warm gold floral theme.">
                                <td>
                                    <strong>Karan Mehta</strong>
                                    <span>karan.mehta@example.com</span>
                                </td>
                                <td><span class="service-pill decoration">Decoration</span></td>
                                <td>Engagement Decor</td>
                                <td>+91 91234 56789</td>
                                <td><span class="status-pill discussion">In Discussion</span></td>
                                <td>07 Jul 2026</td>
                            </tr>

                            <tr class="enquiry-row" tabindex="0"
                                data-name="Meban Lyngdoh"
                                data-phone="+91 90909 12121"
                                data-email="meban.l@example.com"
                                data-service="Catering"
                                data-type="Complete Non-Veg Feast"
                                data-guests="150"
                                data-status="New"
                                data-created="07 Jul 2026"
                                data-message="Wants non-veg complete catering and may also need decoration for a family celebration.">
                                <td>
                                    <strong>Meban Lyngdoh</strong>
                                    <span>meban.l@example.com</span>
                                </td>
                                <td><span class="service-pill catering">Catering</span></td>
                                <td>Complete Non-Veg Feast</td>
                                <td>+91 90909 12121</td>
                                <td><span class="status-pill new">New</span></td>
                                <td>07 Jul 2026</td>
                            </tr>

                            <tr class="enquiry-row" tabindex="0"
                                data-name="Priya Das"
                                data-phone="+91 93456 77881"
                                data-email="priya.das@example.com"
                                data-service="Banquet Hall"
                                data-type="Corporate Dinner"
                                data-guests="80"
                                data-status="Converted"
                                data-created="06 Jul 2026"
                                data-message="Corporate dinner with banquet hall, vegetarian lite catering, and simple decoration.">
                                <td>
                                    <strong>Priya Das</strong>
                                    <span>priya.das@example.com</span>
                                </td>
                                <td><span class="service-pill banquet">Banquet Hall</span></td>
                                <td>Corporate Dinner</td>
                                <td>+91 93456 77881</td>
                                <td><span class="status-pill converted">Converted</span></td>
                                <td>06 Jul 2026</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section id="booking-preview" class="admin-panel booking-preview">
                <div>
                    <h2>Recent Internal Bookings</h2>
                    <p>Created by admin after calling the customer.</p>
                </div>

                <div class="booking-card-grid">
                    <article>
                        <span class="booking-code">BK-0012</span>
                        <h3>Priya Das</h3>
                        <p>Banquet Hall, Veg Lite Catering, Simple Decor Essentials</p>
                        <strong>Confirmed</strong>
                    </article>
                    <article>
                        <span class="booking-code">BK-0011</span>
                        <h3>Arun Nongrum</h3>
                        <p>Rooms: 2 Heritage Rooms, 1 Family Room</p>
                        <strong>Tentative</strong>
                    </article>
                </div>
            </section>

            <section id="tariff-season" class="admin-panel tariff-panel">
                <div class="admin-panel-header">
                    <div>
                        <h2>Season & Festive Tariffs</h2>
                        <p>Frontend demo for managing price changes during peak season, festivals, and holidays.</p>
                    </div>

                    <div class="admin-filters">
                        <span>Demo Only</span>
                        <span>Applies During Enquiry</span>
                    </div>
                </div>

                <div class="tariff-layout">
                    <div class="tariff-table-wrap">
                        <table class="admin-table tariff-table">
                            <thead>
                                <tr>
                                    <th>Season</th>
                                    <th>Date Range</th>
                                    <th>Services</th>
                                    <th>Adjustment</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <strong>Autumn Wedding Peak</strong>
                                        <span>High demand event period</span>
                                    </td>
                                    <td>01 Oct 2026 - 20 Nov 2026</td>
                                    <td>Banquet, Decoration, Catering</td>
                                    <td><span class="tariff-badge increase">+20%</span></td>
                                    <td><span class="status-pill discussion">Upcoming</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Christmas & New Year</strong>
                                        <span>Festive holiday pricing</span>
                                    </td>
                                    <td>20 Dec 2026 - 03 Jan 2027</td>
                                    <td>Rooms, Cottages, Banquet</td>
                                    <td><span class="tariff-badge increase">+30%</span></td>
                                    <td><span class="status-pill new">Active Soon</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Monsoon Stay Offer</strong>
                                        <span>Low season accommodation offer</span>
                                    </td>
                                    <td>01 Jun 2027 - 31 Jul 2027</td>
                                    <td>Rooms, Cottages</td>
                                    <td><span class="tariff-badge discount">-15%</span></td>
                                    <td><span class="status-pill contacted">Draft</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <form class="tariff-form" action="#" method="POST">
                        @csrf
                        <h3>Add Tariff Rule</h3>
                        <label>
                            Rule Name
                            <input type="text" value="Festive Banquet Rate">
                        </label>
                        <div class="admin-form-grid">
                            <label>Start Date <input type="date" value="2026-10-01"></label>
                            <label>End Date <input type="date" value="2026-10-24"></label>
                        </div>
                        <label>
                            Apply To Service
                            <select>
                                <option>Banquet Hall</option>
                                <option>Rooms</option>
                                <option>Cottages</option>
                                <option>Decoration</option>
                                <option>Catering</option>
                                <option>All Services</option>
                            </select>
                        </label>
                        <div class="admin-form-grid">
                            <label>Change Type
                                <select>
                                    <option>Percentage Increase</option>
                                    <option>Fixed Increase</option>
                                    <option>Discount</option>
                                </select>
                            </label>
                            <label>Value <input type="text" value="20%"></label>
                        </div>
                        <label>
                            Note For Admin
                            <textarea rows="3" placeholder="Example: Applies only after admin confirms date and package.">Show this during booking review before final quotation.</textarea>
                        </label>
                        <button class="primary-action form-action" type="button">Save Tariff Rule</button>
                    </form>
                </div>
            </section>
        </section>
    </main>

    <div class="admin-modal" id="enquiryModal" aria-hidden="true">
        <div class="admin-modal-backdrop" data-close-modal></div>
        <section class="admin-modal-card" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
            <header class="modal-header">
                <div>
                    <p class="eyebrow">Row Click Detail</p>
                    <h2 id="modalTitle">Customer Enquiry</h2>
                </div>
                <button class="modal-close" type="button" data-close-modal aria-label="Close modal">Close</button>
            </header>

            <div class="modal-grid">
                <aside class="modal-summary">
                    <h3 id="modalCustomer">Customer Name</h3>
                    <dl>
                        <div>
                            <dt>Phone</dt>
                            <dd id="modalPhone"></dd>
                        </div>
                        <div>
                            <dt>Email</dt>
                            <dd id="modalEmail"></dd>
                        </div>
                        <div>
                            <dt>Original Service</dt>
                            <dd id="modalService"></dd>
                        </div>
                        <div>
                            <dt>Enquiry Type</dt>
                            <dd id="modalType"></dd>
                        </div>
                        <div>
                            <dt>Guests</dt>
                            <dd id="modalGuests"></dd>
                        </div>
                        <div>
                            <dt>Created</dt>
                            <dd id="modalCreated"></dd>
                        </div>
                    </dl>
                    <p id="modalMessage"></p>
                </aside>

                <div class="modal-workspace">
                    <section class="followup-box">
                        <h3>Admin Follow-Up</h3>
                        <div class="admin-form-grid">
                            <label>
                                Call Status
                                <select>
                                    <option>New</option>
                                    <option>Contacted</option>
                                    <option>In Discussion</option>
                                    <option>Converted</option>
                                    <option>Closed</option>
                                </select>
                            </label>
                            <label>
                                Next Follow-Up
                                <input type="date">
                            </label>
                        </div>
                        <label>
                            Admin Notes
                            <textarea rows="3" placeholder="Call notes, customer preferences, pending decisions"></textarea>
                        </label>
                    </section>

                    <section class="booking-builder">
                        <div class="booking-builder-header">
                            <div>
                                <h3>Create Booking For This Customer</h3>
                                <p>Select one or more services confirmed after the phone call.</p>
                            </div>
                            <span id="selectedCount">0 selected</span>
                        </div>

                        <div class="service-toggle-grid">
                            <label><input type="checkbox" value="banquet" data-service-toggle> Banquet Hall</label>
                            <label><input type="checkbox" value="rooms" data-service-toggle> Rooms</label>
                            <label><input type="checkbox" value="cottages" data-service-toggle> Cottages</label>
                            <label><input type="checkbox" value="decoration" data-service-toggle> Decoration</label>
                            <label><input type="checkbox" value="catering" data-service-toggle> Catering</label>
                        </div>

                        <div class="service-form-stack">
                            <article class="service-booking-form" data-service-form="banquet">
                                <h4>Banquet Hall Booking</h4>
                                <div class="admin-form-grid">
                                    <label>Event Date <input type="date"></label>
                                    <label>Event Time <input type="time"></label>
                                    <label>Hall <select><option>Main Banquet Hall</option><option>Garden Hall</option></select></label>
                                    <label>Guests <input type="number" value="220"></label>
                                </div>
                                <p class="admin-availability-note">
                                    Demo validation: confirmed banquet bookings block the selected date before admin can confirm.
                                </p>
                            </article>

                            <article class="service-booking-form" data-service-form="rooms">
                                <h4>Room Assignment</h4>
                                <div class="admin-form-grid">
                                    <label>Check-In <input type="date"></label>
                                    <label>Check-Out <input type="date"></label>
                                    <label>Room Category <select><option>Heritage Rooms</option><option>Garden View Rooms</option><option>Family Rooms</option></select></label>
                                    <label>Rooms Needed <input type="number" value="2"></label>
                                </div>
                                <div class="availability-strip">
                                    <button type="button">H-101</button>
                                    <button type="button">H-102</button>
                                    <button type="button">G-201</button>
                                    <button type="button">F-301</button>
                                </div>
                            </article>

                            <article class="service-booking-form" data-service-form="cottages">
                                <h4>Cottage Assignment</h4>
                                <div class="admin-form-grid">
                                    <label>Check-In <input type="date"></label>
                                    <label>Check-Out <input type="date"></label>
                                    <label>Cottage Type <select><option>Standard Cottage</option><option>Family Cottage</option></select></label>
                                    <label>Cottages Needed <input type="number" value="1"></label>
                                </div>
                                <div class="availability-strip">
                                    <button type="button">C-01</button>
                                    <button type="button">C-02</button>
                                    <button type="button">C-05</button>
                                </div>
                            </article>

                            <article class="service-booking-form" data-service-form="decoration">
                                <h4>Decoration Booking</h4>
                                <div class="admin-form-grid">
                                    <label>Category <select><option>Grand Wedding Decor</option><option>Signature Celebration Decor</option><option>Simple Decor Essentials</option></select></label>
                                    <label>Event Area <select><option>Banquet Hall</option><option>Garden Area</option><option>Entrance + Hall</option></select></label>
                                    <label>Theme <input type="text" value="Warm gold floral"></label>
                                    <label>Guests <input type="number" value="120"></label>
                                </div>
                            </article>

                            <article class="service-booking-form" data-service-form="catering">
                                <h4>Catering Booking</h4>
                                <div class="admin-form-grid">
                                    <label>Food Type <select><option>Vegetarian</option><option>Non-Vegetarian</option><option>Both</option></select></label>
                                    <label>Service Level <select><option>Complete Feast</option><option>Lite Service</option></select></label>
                                    <label>Guests <input type="number" value="150"></label>
                                    <label>Menu Notes <input type="text" value="Confirm dessert counter"></label>
                                </div>
                            </article>
                        </div>

                        <div class="modal-actions">
                            <button class="ghost-action" type="button" id="resetBooking">Reset Services</button>
                            <button class="primary-action" type="button" id="confirmBooking">Confirm Internal Booking</button>
                        </div>

                        <p class="booking-result" id="bookingResult" aria-live="polite"></p>
                    </section>
                </div>
            </div>
        </section>
    </div>

    <script>
        const modal = document.getElementById('enquiryModal');
        const rows = document.querySelectorAll('.enquiry-row');
        const fields = {
            customer: document.getElementById('modalCustomer'),
            phone: document.getElementById('modalPhone'),
            email: document.getElementById('modalEmail'),
            service: document.getElementById('modalService'),
            type: document.getElementById('modalType'),
            guests: document.getElementById('modalGuests'),
            created: document.getElementById('modalCreated'),
            message: document.getElementById('modalMessage'),
        };

        rows.forEach((row) => {
            row.addEventListener('click', () => openModal(row));
            row.addEventListener('keydown', (event) => {
                if (event.key === 'Enter') {
                    openModal(row);
                }
            });
        });

        document.querySelectorAll('[data-close-modal]').forEach((button) => {
            button.addEventListener('click', closeModal);
        });

        document.querySelectorAll('[data-service-toggle]').forEach((checkbox) => {
            checkbox.addEventListener('change', updateServiceForms);
        });

        document.getElementById('resetBooking').addEventListener('click', () => {
            document.querySelectorAll('[data-service-toggle]').forEach((checkbox) => {
                checkbox.checked = false;
            });
            document.getElementById('bookingResult').textContent = '';
            updateServiceForms();
        });

        document.getElementById('confirmBooking').addEventListener('click', () => {
            const selected = [...document.querySelectorAll('[data-service-toggle]:checked')]
                .map((checkbox) => checkbox.parentElement.textContent.trim());

            document.getElementById('bookingResult').textContent = selected.length
                ? `Demo booking created for ${fields.customer.textContent}: ${selected.join(', ')}.`
                : 'Select at least one service before confirming the booking.';
        });

        function openModal(row) {
            fields.customer.textContent = row.dataset.name;
            fields.phone.textContent = row.dataset.phone;
            fields.email.textContent = row.dataset.email;
            fields.service.textContent = row.dataset.service;
            fields.type.textContent = row.dataset.type;
            fields.guests.textContent = row.dataset.guests;
            fields.created.textContent = row.dataset.created;
            fields.message.textContent = row.dataset.message;
            document.getElementById('bookingResult').textContent = '';
            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');
        }

        function closeModal() {
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
        }

        function updateServiceForms() {
            const selected = [...document.querySelectorAll('[data-service-toggle]:checked')].map((checkbox) => checkbox.value);
            document.getElementById('selectedCount').textContent = `${selected.length} selected`;
            document.querySelectorAll('[data-service-form]').forEach((form) => {
                form.classList.toggle('is-visible', selected.includes(form.dataset.serviceForm));
            });
        }
    </script>
</x-layouts.app>
