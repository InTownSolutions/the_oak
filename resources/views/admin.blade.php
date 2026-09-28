<x-layouts.app title="Admin | The Oak">
    <main class="admin-shell">
        <aside class="admin-sidebar">
            <a class="admin-brand" href="/admin">
                <span class="brand-mark">O</span>
                <span>The Oak Admin</span>
            </a>
            <div class="admin-user-card">
                <span>Signed in as</span>
                <strong>{{ auth()->user()->name }}</strong>
            </div>

            <nav class="admin-nav" aria-label="Admin navigation">
                <a class="active" href="/admin" data-admin-dashboard-link>Enquiries</a>
                <a href="#manual-booking" data-manual-booking-link>Create Manual Booking</a>
                <a href="#booking-preview" data-admin-section-link>Bookings</a>
                <a href="#tariff-season" data-tariff-link>Room Tariffs</a>
                <a href="/">Customer Site</a>
            </nav>
            <form class="admin-logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </aside>

        <section class="admin-main">
            <header class="admin-header">
                <div>
                    <p class="eyebrow">Admin Workspace</p>
                    <h1>Enquiries & Internal Bookings</h1>
                </div>
            </header>

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

            <section class="admin-stats admin-dashboard-section" aria-label="Admin summary">
                <article>
                    <span>New</span>
                    <strong>{{ str_pad((string) $stats['new'], 2, '0', STR_PAD_LEFT) }}</strong>
                </article>
                <article>
                    <span>Contacted</span>
                    <strong>{{ str_pad((string) $stats['contacted'], 2, '0', STR_PAD_LEFT) }}</strong>
                </article>
                <article>
                    <span>In Discussion</span>
                    <strong>{{ str_pad((string) $stats['discussion'], 2, '0', STR_PAD_LEFT) }}</strong>
                </article>
                <article>
                    <span>Booked</span>
                    <strong>{{ str_pad((string) $stats['booked'], 2, '0', STR_PAD_LEFT) }}</strong>
                </article>
            </section>

            <section id="manual-booking" class="admin-panel manual-booking-panel" aria-hidden="true">
                <div class="admin-panel-header">
                    <div>
                        <h2>Create Manual Booking</h2>
                        <p>Use this when a customer calls directly or confirms outside the website enquiry flow.</p>
                    </div>
                    <div class="admin-filters">
                        <span>Direct Entry</span>
                        <span>Admin Only</span>
                    </div>
                </div>

                <form class="booking-builder" method="POST" action="{{ route('admin.bookings.manual-store') }}">
                    @csrf
                    <div class="admin-form-grid">
                        <label>Customer Name <input name="customer_name" type="text" placeholder="Customer name" required></label>
                        <label>Phone Number <input name="phone" type="tel" placeholder="Contact number" required></label>
                        <label>Email Address <input name="email" type="email" placeholder="Email for booking confirmation"></label>
                    </div>

                    <div class="service-toggle-grid">
                        <label><input type="checkbox" name="services[]" value="banquet"> Banquet Hall</label>
                        <label><input type="checkbox" name="services[]" value="rooms"> Rooms</label>
                        <label><input type="checkbox" name="services[]" value="decoration"> Decoration</label>
                        <label><input type="checkbox" name="services[]" value="catering"> Catering</label>
                    </div>

                    <div class="service-form-stack">
                        <article class="service-booking-form is-visible">
                            <h4>Banquet Hall Details</h4>
                            <div class="admin-form-grid">
                                <label>Event Date <input name="banquet_event_date" type="date"></label>
                                <label>Event Time <input name="banquet_event_time" type="time"></label>
                                <label>Hall <select name="banquet_hall"><option>Main Banquet Hall</option><option>Garden Hall</option></select></label>
                                <label>Guests <input name="banquet_guests" type="number" min="1"></label>
                            </div>
                        </article>

                        <article class="service-booking-form is-visible">
                            <h4>Room Details</h4>
                            <div class="admin-form-grid">
                                <label>Check-In <input name="rooms_check_in" type="date"></label>
                                <label>Check-Out <input name="rooms_check_out" type="date"></label>
                                <label>Room Type <select name="room_category"><option>Guest Room</option></select></label>
                                <label>Rooms Needed <input name="rooms_needed" type="number" min="1"></label>
                            </div>
                        </article>

                        <article class="service-booking-form is-visible">
                            <h4>Decoration Details</h4>
                            <div class="admin-form-grid">
                                <label>Event Area <select name="decoration_area"><option>Banquet Hall</option><option>Garden Area</option><option>Entrance + Hall</option><option>Restaurant Area</option></select></label>
                                <label>Theme / Requirement <input name="decoration_theme" type="text" placeholder="Example: floral, traditional, simple stage"></label>
                                <label>Guests <input name="decoration_guests" type="number" min="1"></label>
                            </div>
                        </article>

                        <article class="service-booking-form is-visible">
                            <h4>Catering Details</h4>
                            <div class="admin-form-grid">
                                <label>Food Type <select name="food_type"><option>Vegetarian</option><option>Non-Vegetarian</option><option>Veg And Non-Veg</option><option>Need Guidance</option></select></label>
                                <label>Meal Type <select name="meal_type"><option>Lunch</option><option>Dinner</option><option>High Tea</option><option>Snacks / Quick Bites</option><option>Custom Discussion</option></select></label>
                                <label>Menu Structure <select name="menu_style"><option>Standard Lunch / Dinner Format</option><option>High Tea Format</option><option>Only Selected Items</option><option>Need Team Recommendation</option></select></label>
                                <label>Guests <input name="catering_guests" type="number" min="1"></label>
                                <label>Menu Notes <input name="menu_notes" type="text"></label>
                            </div>
                        </article>
                    </div>

                    <div class="admin-form-grid">
                        <label>Total Cost <input name="total_amount" type="number" min="0" step="0.01" placeholder="Enter final quoted amount" required></label>
                        <label>Advance Amount <input name="advance_amount" type="number" min="0" step="0.01" placeholder="Optional advance"></label>
                        <label>Booking Status
                            <select name="status">
                                <option>Pending Confirmation</option>
                                <option>Awaiting Advance</option>
                                <option>Advance Received</option>
                                <option>Confirmed</option>
                                <option>Cancelled</option>
                            </select>
                        </label>
                        <label>Payment Status
                            <select name="payment_status">
                                <option>Not Collected</option>
                                <option>Advance Requested</option>
                                <option>Advance Received</option>
                                <option>Paid</option>
                                <option>Refunded</option>
                            </select>
                        </label>
                    </div>

                    <label>
                        Booking Notes
                        <textarea name="admin_notes" rows="3" placeholder="Manual booking notes, quoted inclusions, pending confirmation"></textarea>
                    </label>

                    <div class="modal-actions">
                        <button class="primary-action" type="submit">Save Manual Booking</button>
                    </div>
                </form>
            </section>

            <section class="admin-panel admin-dashboard-section">
                <div class="admin-panel-header">
                    <div>
                        <h2>All Customer Enquiries</h2>
                        <p>Click any row to call, update status, and create a booking for one or multiple services.</p>
                    </div>

                    <div class="admin-filters">
                        <span>{{ $adminRows->count() }} Records</span>
                        <span>Enquiries + Direct Bookings</span>
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
                            @forelse ($adminRows as $row)
                                @php
                                    $serviceClass = match (true) {
                                        str_contains($row['service'], 'Banquet') => 'banquet',
                                        str_contains($row['service'], 'Rooms') => 'rooms',
                                        str_contains($row['service'], 'Decoration') => 'decoration',
                                        str_contains($row['service'], 'Catering') => 'catering',
                                        default => 'banquet',
                                    };
                                    $statusClass = match ($row['status']) {
                                        'Contacted' => 'contacted',
                                        'In Discussion' => 'discussion',
                                        'Booked', 'Confirmed', 'Advance Received' => 'booked',
                                        'Pending Confirmation', 'Awaiting Advance' => 'discussion',
                                        'Cancelled', 'Closed' => 'closed',
                                        default => 'new',
                                    };
                                    $recordClass = $row['kind'] === 'booking' ? 'booking-record-row' : '';
                                @endphp
                                <tr class="enquiry-row {{ $recordClass }}" tabindex="0" data-record-id="{{ $row['record_key'] }}">
                                    <td>
                                        <strong>{{ $row['customer_name'] }}</strong>
                                        <span>{{ $row['email'] ?: 'No email shared' }}</span>
                                    </td>
                                    <td><span class="service-pill {{ $serviceClass }}">{{ $row['service'] }}</span></td>
                                    <td>{{ $row['type'] }}</td>
                                    <td>{{ $row['phone'] }}</td>
                                    <td><span class="status-pill {{ $statusClass }}">{{ $row['status'] }}</span></td>
                                    <td>{{ $row['created_at']->format('d M Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <strong>No enquiries or bookings yet</strong>
                                        <span>Customer submissions and internal bookings will appear here automatically.</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            <section id="booking-preview" class="admin-panel booking-preview admin-dashboard-section">
                <div>
                    <h2>Recent Internal Bookings</h2>
                    <p>Created by admin after calling the customer.</p>
                </div>

                <div class="booking-card-grid">
                    @forelse ($bookings as $booking)
                        <article>
                            <span class="booking-code">BK-{{ str_pad((string) $booking->id, 4, '0', STR_PAD_LEFT) }}</span>
                            <h3>{{ $booking->customer_name }}</h3>
                            <p>{{ $booking->email ?: 'No email saved' }}</p>
                            <p>{{ collect($booking->services)->map(fn ($service) => \Illuminate\Support\Str::headline($service))->implode(', ') }}</p>
                            <p>Total: {{ $booking->total_amount !== null ? 'INR '.number_format((float) $booking->total_amount, 2) : 'Not entered' }}</p>
                            <strong>{{ $booking->status }}</strong>
                        </article>
                    @empty
                        <article>
                            <span class="booking-code">LIVE</span>
                            <h3>No bookings yet</h3>
                            <p>Confirmed bookings created from enquiries will appear here.</p>
                            <strong>Waiting</strong>
                        </article>
                    @endforelse
                </div>
            </section>

            <section id="tariff-season" class="admin-panel tariff-panel admin-switch-panel" aria-hidden="true">
                <div class="admin-panel-header">
                    <div>
                        <h2>Room Season Tariffs</h2>
                        <p>Manage room price changes during peak season, festivals, holidays, and low-demand periods.</p>
                    </div>

                    <div class="admin-filters">
                        <span>Rooms Only</span>
                        <span>Applied During Availability</span>
                    </div>
                </div>

                <div class="tariff-layout">
                    <div class="tariff-table-wrap">
                        <table class="admin-table tariff-table">
                            <thead>
                                <tr>
                                    <th>Season</th>
                                    <th>Date Range</th>
                                    <th>Room Rate</th>
                                    <th>Adjustment</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <strong>Autumn Wedding Peak</strong>
                                        <span>High demand stay period</span>
                                    </td>
                                    <td>01 Oct 2026 - 20 Nov 2026</td>
                                    <td>Guest Room</td>
                                    <td><span class="tariff-badge increase">Seasonal Override</span></td>
                                    <td><span class="status-pill discussion">Upcoming</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Christmas & New Year</strong>
                                        <span>Festive holiday pricing</span>
                                    </td>
                                    <td>20 Dec 2026 - 03 Jan 2027</td>
                                    <td>Guest Room</td>
                                    <td><span class="tariff-badge increase">Festive Override</span></td>
                                    <td><span class="status-pill new">Active Soon</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Monsoon Stay Offer</strong>
                                        <span>Low season accommodation offer</span>
                                    </td>
                                    <td>01 Jun 2027 - 31 Jul 2027</td>
                                    <td>Guest Room</td>
                                    <td><span class="tariff-badge discount">Low Season Override</span></td>
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
                            <input type="text" value="Festive Room Rate">
                        </label>
                        <div class="admin-form-grid">
                            <label>Start Date <input type="date" value="2026-10-01"></label>
                            <label>End Date <input type="date" value="2026-10-24"></label>
                        </div>
                        <label>
                            Apply To
                            <select>
                                <option>Guest Room</option>
                            </select>
                        </label>
                        <div class="admin-form-grid">
                            <label>Tariff Type
                                <select>
                                    <option>Seasonal Room Rate</option>
                                    <option>Festive Room Rate</option>
                                    <option>Low Season Room Rate</option>
                                </select>
                            </label>
                            <label>Room Price <input type="text" value="INR 4,000"></label>
                        </div>
                        <label>
                            Note For Admin
                            <textarea rows="3">Apply this room rate when the selected stay dates fall inside this tariff period.</textarea>
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
                            <dt>Preferred Date</dt>
                            <dd id="modalDate"></dd>
                        </div>
                        <div>
                            <dt>Created</dt>
                            <dd id="modalCreated"></dd>
                        </div>
                    </dl>
                    <p id="modalMessage"></p>
                </aside>

                <div class="modal-workspace">
                    <form id="followupForm" class="followup-box" method="POST">
                        @csrf
                        @method('PATCH')
                        <h3>Admin Follow-Up</h3>
                        <div class="admin-form-grid">
                            <label>
                                Call Status
                                <select name="status" id="followupStatus">
                                    <option>New</option>
                                    <option>Contacted</option>
                                    <option>In Discussion</option>
                                    <option>Booked</option>
                                    <option>Closed</option>
                                </select>
                            </label>
                            <label>
                                Next Follow-Up
                                <input name="next_follow_up" id="followupDate" type="date">
                            </label>
                        </div>
                        <label>
                            Admin Notes
                            <textarea name="admin_notes" id="followupNotes" rows="3" placeholder="Call notes, customer preferences, pending decisions"></textarea>
                        </label>
                        <button class="ghost-action form-action" type="submit">Save Follow-Up</button>
                    </form>

                    <form id="bookingForm" class="booking-builder" method="POST">
                        @csrf
                        <div class="booking-builder-header">
                            <div>
                                <h3>Create Booking For This Customer</h3>
                                <p>Select one or more services confirmed after the phone call.</p>
                            </div>
                            <span id="selectedCount">0 selected</span>
                        </div>

                        <div class="service-toggle-grid">
                            <label><input type="checkbox" name="services[]" value="banquet" data-service-toggle> Banquet Hall</label>
                            <label><input type="checkbox" name="services[]" value="rooms" data-service-toggle> Rooms</label>
                            <label><input type="checkbox" name="services[]" value="decoration" data-service-toggle> Decoration</label>
                            <label><input type="checkbox" name="services[]" value="catering" data-service-toggle> Catering</label>
                        </div>

                        <div class="service-form-stack">
                            <article class="service-booking-form" data-service-form="banquet">
                                <h4>Banquet Hall Booking</h4>
                                <div class="admin-form-grid">
                                    <label>Event Date <input name="banquet_event_date" id="bookingBanquetDate" type="date"></label>
                                    <label>Event Time <input name="banquet_event_time" type="time"></label>
                                    <label>Hall <select name="banquet_hall"><option>Main Banquet Hall</option><option>Garden Hall</option></select></label>
                                    <label>Guests <input name="banquet_guests" id="bookingBanquetGuests" type="number" min="1"></label>
                                </div>
                                <p class="admin-availability-note">
                                    Confirmed banquet bookings block the selected date before admin can confirm.
                                </p>
                            </article>

                            <article class="service-booking-form" data-service-form="rooms">
                                <h4>Room Assignment</h4>
                                <div class="admin-form-grid">
                                    <label>Check-In <input name="rooms_check_in" id="bookingRoomCheckIn" type="date"></label>
                                    <label>Check-Out <input name="rooms_check_out" id="bookingRoomCheckOut" type="date"></label>
                                    <label>Room Type <select name="room_category"><option>Guest Room</option></select></label>
                                    <label>Rooms Needed <input name="rooms_needed" id="bookingRoomsNeeded" type="number" min="1"></label>
                                </div>
                            </article>

                            <article class="service-booking-form" data-service-form="decoration">
                                <h4>Decoration Booking</h4>
                                <div class="admin-form-grid">
                                    <label>Event Area <select name="decoration_area"><option>Banquet Hall</option><option>Garden Area</option><option>Entrance + Hall</option></select></label>
                                    <label>Theme / Requirement <input name="decoration_theme" id="bookingDecorTheme" type="text"></label>
                                    <label>Guests <input name="decoration_guests" type="number" min="1"></label>
                                </div>
                            </article>

                            <article class="service-booking-form" data-service-form="catering">
                                <h4>Catering Booking</h4>
                                <div class="admin-form-grid">
                                    <label>Food Type <select name="food_type"><option>Vegetarian</option><option>Non-Vegetarian</option><option>Veg And Non-Veg</option><option>Need Guidance</option></select></label>
                                    <label>Meal Type <select name="meal_type"><option>Lunch</option><option>Dinner</option><option>High Tea</option><option>Snacks / Quick Bites</option><option>Custom Discussion</option></select></label>
                                    <label>Menu Structure <select name="menu_style"><option>Standard Lunch / Dinner Format</option><option>High Tea Format</option><option>Only Selected Items</option><option>Need Team Recommendation</option></select></label>
                                    <label>Guests <input name="catering_guests" type="number" min="1"></label>
                                    <label>Menu Notes <input name="menu_notes" type="text"></label>
                                </div>
                            </article>
                        </div>

                        <div class="admin-form-grid">
                            <label>Total Cost <input name="total_amount" id="bookingTotalAmount" type="number" min="0" step="0.01" placeholder="Enter final quoted amount" required></label>
                            <label>Advance Amount <input name="advance_amount" id="bookingAdvanceAmount" type="number" min="0" step="0.01" placeholder="Optional advance"></label>
                            <label>Booking Status
                                <select name="status">
                                    <option>Pending Confirmation</option>
                                    <option>Awaiting Advance</option>
                                    <option>Advance Received</option>
                                    <option>Confirmed</option>
                                    <option>Cancelled</option>
                                </select>
                            </label>
                            <label>Payment Status
                                <select name="payment_status">
                                    <option>Not Collected</option>
                                    <option>Advance Requested</option>
                                    <option>Advance Received</option>
                                    <option>Paid</option>
                                    <option>Refunded</option>
                                </select>
                            </label>
                        </div>

                        <label>
                            Booking Notes
                            <textarea name="admin_notes" rows="3" placeholder="Final booking notes, quotation remarks, package confirmation"></textarea>
                        </label>

                        <div class="modal-actions">
                            <button class="ghost-action" type="button" id="resetBooking">Reset Services</button>
                            <button class="primary-action" type="submit">Save Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <script>
        const recordPayloads = @js($recordPayloads);
        const modal = document.getElementById('enquiryModal');
        const rows = document.querySelectorAll('.enquiry-row');
        const followupForm = document.getElementById('followupForm');
        const bookingForm = document.getElementById('bookingForm');
        const manualBookingPanel = document.getElementById('manual-booking');
        const tariffPanel = document.getElementById('tariff-season');
        const dashboardSections = document.querySelectorAll('.admin-dashboard-section');
        const manualBookingLink = document.querySelector('[data-manual-booking-link]');
        const tariffLink = document.querySelector('[data-tariff-link]');
        const dashboardLink = document.querySelector('[data-admin-dashboard-link]');
        const adminSectionLinks = document.querySelectorAll('[data-admin-section-link]');
        const fields = {
            title: document.getElementById('modalTitle'),
            customer: document.getElementById('modalCustomer'),
            phone: document.getElementById('modalPhone'),
            email: document.getElementById('modalEmail'),
            service: document.getElementById('modalService'),
            type: document.getElementById('modalType'),
            guests: document.getElementById('modalGuests'),
            date: document.getElementById('modalDate'),
            created: document.getElementById('modalCreated'),
            message: document.getElementById('modalMessage'),
        };

        rows.forEach((row) => {
            row.addEventListener('click', () => openModal(row.dataset.recordId));
            row.addEventListener('keydown', (event) => {
                if (event.key === 'Enter') {
                    openModal(row.dataset.recordId);
                }
            });
        });

        manualBookingLink.addEventListener('click', (event) => {
            event.preventDefault();
            showManualBooking();
        });

        tariffLink.addEventListener('click', (event) => {
            event.preventDefault();
            showTariffPanel();
        });

        dashboardLink.addEventListener('click', (event) => {
            event.preventDefault();
            showDashboard();
        });

        adminSectionLinks.forEach((link) => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                showDashboard(link.getAttribute('href'));
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
            updateServiceForms();
        });

        function openModal(recordId) {
            const record = recordPayloads[recordId];
            const details = record.details || {};
            const isBooking = record.kind === 'booking' || record.kind === 'booked-enquiry';

            fields.title.textContent = isBooking ? 'Internal Booking' : 'Customer Enquiry';
            fields.customer.textContent = record.customer;
            fields.phone.textContent = record.phone;
            fields.email.textContent = record.email;
            fields.service.textContent = record.service;
            fields.type.textContent = record.type;
            fields.guests.textContent = record.guests;
            fields.date.textContent = record.preferredDate;
            fields.created.textContent = record.created;
            fields.message.textContent = record.message;
            fields.message.style.whiteSpace = 'pre-line';

            followupForm.hidden = isBooking;
            bookingForm.hidden = isBooking;

            if (isBooking) {
                modal.classList.add('is-open');
                modal.setAttribute('aria-hidden', 'false');
                return;
            }

            followupForm.action = `/admin/enquiries/${record.id}`;
            bookingForm.action = `/admin/enquiries/${record.id}/bookings`;
            document.getElementById('followupStatus').value = record.status;
            document.getElementById('followupDate').value = record.nextFollowUp || '';
            document.getElementById('followupNotes').value = record.adminNotes || '';
            document.getElementById('bookingBanquetDate').value = details.event_date || '';
            document.getElementById('bookingBanquetGuests').value = record.guests !== 'Not shared' ? record.guests : '';
            document.getElementById('bookingRoomCheckIn').value = details.check_in || '';
            document.getElementById('bookingRoomCheckOut').value = details.check_out || '';
            document.getElementById('bookingRoomsNeeded').value = details.rooms || '';
            document.getElementById('bookingTotalAmount').value = details.estimated_total || '';
            document.getElementById('bookingAdvanceAmount').value = details.estimated_advance || '';
            document.getElementById('bookingDecorTheme').value = details.theme || '';

            document.querySelectorAll('[data-service-toggle]').forEach((checkbox) => {
                checkbox.checked = serviceShouldStartChecked(checkbox.value, record, details);
            });

            updateServiceForms();
            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');
        }

        function closeModal() {
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
        }

        function serviceShouldStartChecked(service, enquiry, details) {
            const selected = details.selected_services || [];

            if (selected.includes(service)) {
                return true;
            }

            return {
                banquet: 'Banquet Hall',
                rooms: 'Rooms',
                decoration: 'Decoration',
                catering: 'Catering',
            }[service] === enquiry.service;
        }

        function updateServiceForms() {
            const selected = [...document.querySelectorAll('[data-service-toggle]:checked')].map((checkbox) => checkbox.value);
            document.getElementById('selectedCount').textContent = `${selected.length} selected`;
            document.querySelectorAll('[data-service-form]').forEach((form) => {
                form.classList.toggle('is-visible', selected.includes(form.dataset.serviceForm));
            });
        }

        function showManualBooking() {
            hideDashboardSections();
            hideTariffPanel();

            manualBookingPanel.classList.add('is-visible');
            manualBookingPanel.setAttribute('aria-hidden', 'false');
            setActiveAdminLink(manualBookingLink);
            manualBookingPanel.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        function showTariffPanel() {
            hideDashboardSections();
            hideManualBooking();

            tariffPanel.classList.add('is-visible');
            tariffPanel.setAttribute('aria-hidden', 'false');
            setActiveAdminLink(tariffLink);
            tariffPanel.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        function showDashboard(targetSelector = null) {
            dashboardSections.forEach((section) => {
                section.classList.remove('is-hidden');
            });

            hideManualBooking();
            hideTariffPanel();
            setActiveAdminLink(dashboardLink);

            if (targetSelector) {
                document.querySelector(targetSelector)?.scrollIntoView({ behavior: 'smooth', block: 'start' });
                return;
            }

            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function hideDashboardSections() {
            dashboardSections.forEach((section) => {
                section.classList.add('is-hidden');
            });
        }

        function hideManualBooking() {
            manualBookingPanel.classList.remove('is-visible');
            manualBookingPanel.setAttribute('aria-hidden', 'true');
        }

        function hideTariffPanel() {
            tariffPanel.classList.remove('is-visible');
            tariffPanel.setAttribute('aria-hidden', 'true');
        }

        function setActiveAdminLink(activeLink) {
            [dashboardLink, manualBookingLink, tariffLink, ...adminSectionLinks].forEach((link) => {
                link.classList.toggle('active', link === activeLink);
            });
        }
    </script>
</x-layouts.app>
