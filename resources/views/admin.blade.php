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
                    <span>Live Data</span>
                    <strong>{{ now()->format('d M Y') }}</strong>
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

            <section class="admin-stats" aria-label="Admin summary">
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

            <section class="admin-panel">
                <div class="admin-panel-header">
                    <div>
                        <h2>All Customer Enquiries</h2>
                        <p>Click any row to call, update status, and create a booking for one or multiple services.</p>
                    </div>

                    <div class="admin-filters">
                        <span>{{ $enquiries->count() }} Enquiries</span>
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
                            @forelse ($enquiries as $enquiry)
                                @php
                                    $serviceClass = match ($enquiry->service) {
                                        'Banquet Hall' => 'banquet',
                                        'Rooms' => 'rooms',
                                        'Decoration' => 'decoration',
                                        'Catering' => 'catering',
                                        default => 'banquet',
                                    };
                                    $statusClass = match ($enquiry->status) {
                                        'Contacted' => 'contacted',
                                        'In Discussion' => 'discussion',
                                        'Booked' => 'booked',
                                        default => 'new',
                                    };
                                @endphp
                                <tr class="enquiry-row" tabindex="0" data-enquiry-id="{{ $enquiry->id }}">
                                    <td>
                                        <strong>{{ $enquiry->customer_name }}</strong>
                                        <span>{{ $enquiry->email ?: 'No email shared' }}</span>
                                    </td>
                                    <td><span class="service-pill {{ $serviceClass }}">{{ $enquiry->service }}</span></td>
                                    <td>{{ $enquiry->enquiry_type ?: 'General Enquiry' }}</td>
                                    <td>{{ $enquiry->phone }}</td>
                                    <td><span class="status-pill {{ $statusClass }}">{{ $enquiry->status }}</span></td>
                                    <td>{{ $enquiry->created_at->format('d M Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <strong>No enquiries yet</strong>
                                        <span>Customer submissions will appear here automatically.</span>
                                    </td>
                                </tr>
                            @endforelse
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
                    @forelse ($bookings as $booking)
                        <article>
                            <span class="booking-code">BK-{{ str_pad((string) $booking->id, 4, '0', STR_PAD_LEFT) }}</span>
                            <h3>{{ $booking->customer_name }}</h3>
                            <p>{{ collect($booking->services)->map(fn ($service) => \Illuminate\Support\Str::headline($service))->implode(', ') }}</p>
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
                                    <td>Rooms, Banquet</td>
                                    <td><span class="tariff-badge increase">+30%</span></td>
                                    <td><span class="status-pill new">Active Soon</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Monsoon Stay Offer</strong>
                                        <span>Low season accommodation offer</span>
                                    </td>
                                    <td>01 Jun 2027 - 31 Jul 2027</td>
                                    <td>Rooms</td>
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
                            <textarea rows="3">Show this during booking review before final quotation.</textarea>
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
                                    <label>Check-In <input name="rooms_check_in" type="date"></label>
                                    <label>Check-Out <input name="rooms_check_out" type="date"></label>
                                    <label>Room Category <select name="room_category"><option>Semi Deluxe Rooms</option><option>Cottages</option></select></label>
                                    <label>Rooms Needed <input name="rooms_needed" type="number" min="1"></label>
                                </div>
                            </article>

                            <article class="service-booking-form" data-service-form="decoration">
                                <h4>Decoration Booking</h4>
                                <div class="admin-form-grid">
                                    <label>Category <select name="decoration_category"><option>Grand Wedding Decor</option><option>Signature Celebration Decor</option><option>Simple Decor Essentials</option></select></label>
                                    <label>Event Area <select name="decoration_area"><option>Banquet Hall</option><option>Garden Area</option><option>Entrance + Hall</option></select></label>
                                    <label>Theme <input name="decoration_theme" id="bookingDecorTheme" type="text"></label>
                                    <label>Guests <input name="decoration_guests" type="number" min="1"></label>
                                </div>
                            </article>

                            <article class="service-booking-form" data-service-form="catering">
                                <h4>Catering Booking</h4>
                                <div class="admin-form-grid">
                                    <label>Food Type <select name="food_type"><option>Vegetarian</option><option>Non-Vegetarian</option><option>Both</option></select></label>
                                    <label>Service Level <select name="service_level"><option>Complete Feast</option><option>Lite Service</option></select></label>
                                    <label>Guests <input name="catering_guests" type="number" min="1"></label>
                                    <label>Menu Notes <input name="menu_notes" type="text"></label>
                                </div>
                            </article>
                        </div>

                        <label>
                            Booking Notes
                            <textarea name="admin_notes" rows="3" placeholder="Final booking notes, quotation remarks, package confirmation"></textarea>
                        </label>

                        <div class="modal-actions">
                            <button class="ghost-action" type="button" id="resetBooking">Reset Services</button>
                            <button class="primary-action" type="submit">Confirm Internal Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <script>
        const enquiryPayloads = @js($enquiries->mapWithKeys(fn ($enquiry) => [
            $enquiry->id => [
                'id' => $enquiry->id,
                'customer' => $enquiry->customer_name,
                'phone' => $enquiry->phone,
                'email' => $enquiry->email ?: 'No email shared',
                'service' => $enquiry->service,
                'type' => $enquiry->enquiry_type ?: 'General Enquiry',
                'guests' => $enquiry->guests ?: 'Not shared',
                'preferredDate' => optional($enquiry->preferred_date)->format('Y-m-d') ?: 'Not shared',
                'created' => $enquiry->created_at->format('d M Y'),
                'message' => $enquiry->message ?: 'No message shared.',
                'status' => $enquiry->status,
                'nextFollowUp' => optional($enquiry->next_follow_up)->format('Y-m-d'),
                'adminNotes' => $enquiry->admin_notes,
                'details' => $enquiry->details ?: [],
            ],
        ]));
        const modal = document.getElementById('enquiryModal');
        const rows = document.querySelectorAll('.enquiry-row');
        const followupForm = document.getElementById('followupForm');
        const bookingForm = document.getElementById('bookingForm');
        const fields = {
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
            row.addEventListener('click', () => openModal(row.dataset.enquiryId));
            row.addEventListener('keydown', (event) => {
                if (event.key === 'Enter') {
                    openModal(row.dataset.enquiryId);
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
            updateServiceForms();
        });

        function openModal(enquiryId) {
            const enquiry = enquiryPayloads[enquiryId];
            const details = enquiry.details || {};

            fields.customer.textContent = enquiry.customer;
            fields.phone.textContent = enquiry.phone;
            fields.email.textContent = enquiry.email;
            fields.service.textContent = enquiry.service;
            fields.type.textContent = enquiry.type;
            fields.guests.textContent = enquiry.guests;
            fields.date.textContent = enquiry.preferredDate;
            fields.created.textContent = enquiry.created;
            fields.message.textContent = enquiry.message;

            followupForm.action = `/admin/enquiries/${enquiry.id}`;
            bookingForm.action = `/admin/enquiries/${enquiry.id}/bookings`;
            document.getElementById('followupStatus').value = enquiry.status;
            document.getElementById('followupDate').value = enquiry.nextFollowUp || '';
            document.getElementById('followupNotes').value = enquiry.adminNotes || '';
            document.getElementById('bookingBanquetDate').value = details.event_date || '';
            document.getElementById('bookingBanquetGuests').value = enquiry.guests !== 'Not shared' ? enquiry.guests : '';
            document.getElementById('bookingDecorTheme').value = details.theme || '';

            document.querySelectorAll('[data-service-toggle]').forEach((checkbox) => {
                checkbox.checked = serviceShouldStartChecked(checkbox.value, enquiry, details);
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
    </script>
</x-layouts.app>
