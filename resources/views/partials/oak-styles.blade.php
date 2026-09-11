<style>
    :root {
        --oak-ivory: #fffaf0;
        --oak-cream: #fff1c9;
        --oak-gold: #a46d02;
        --oak-gold-dark: #795000;
        --oak-bark: #27160e;
        --oak-ink: #2d241c;
        --oak-muted: #6d6055;
        --oak-line: rgba(121, 80, 0, 0.24);
    }

    * {
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        margin: 0;
        background: var(--oak-ivory);
        color: var(--oak-ink);
        font-family: 'Segoe UI', Arial, sans-serif;
    }

    img {
        display: block;
        max-width: 100%;
    }

    .site-shell {
        min-height: 100vh;
        overflow: hidden;
    }

    .booking-gateway {
        background:
            linear-gradient(180deg, rgba(255, 250, 240, 0.92), rgba(255, 250, 240, 1) 38%),
            #fffaf0;
    }

    .topbar {
        position: sticky;
        top: 0;
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        padding: 18px clamp(20px, 5vw, 72px);
        background: rgba(255, 250, 240, 0.94);
        border-bottom: 1px solid var(--oak-line);
        backdrop-filter: blur(18px);
    }

    .brand,
    .nav-links {
        display: flex;
        align-items: center;
    }

    .brand {
        gap: 12px;
        color: var(--oak-gold-dark);
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 1.25rem;
        text-decoration: none;
    }

    .brand-mark {
        display: grid;
        width: 38px;
        height: 38px;
        place-items: center;
        border: 1px solid var(--oak-gold);
        border-radius: 50%;
    }

    .nav-links {
        gap: clamp(16px, 3vw, 38px);
        color: var(--oak-muted);
        font-size: 0.95rem;
    }

    .nav-links a {
        color: inherit;
        text-decoration: none;
    }

    .nav-links a:hover {
        color: var(--oak-gold-dark);
    }

    .hero-section,
    .gateway-hero,
    .gallery-section,
    .room-categories,
    .decoration-categories,
    .catering-options,
    .details-section,
    .enquiry-section,
    .service-picker,
    .gateway-steps {
        padding: clamp(54px, 8vw, 110px) clamp(20px, 5vw, 72px);
    }

    .hero-section {
        display: grid;
        grid-template-columns: minmax(0, 0.84fr) minmax(320px, 1.16fr);
        gap: clamp(34px, 6vw, 86px);
        align-items: center;
        min-height: calc(100vh - 75px);
    }

    .gateway-hero {
        display: block;
        max-width: none;
        min-height: auto;
        padding-top: clamp(26px, 4vw, 52px);
        padding-bottom: clamp(18px, 2.5vw, 30px);
    }

    .gateway-hero h1 {
        max-width: 1040px;
        font-size: clamp(2.45rem, 5vw, 5rem);
    }

    .gateway-hero-copy p:not(.eyebrow) {
        max-width: 820px;
        margin: 16px 0 0;
        color: var(--oak-muted);
        font-size: clamp(1rem, 1.5vw, 1.16rem);
        line-height: 1.7;
    }

    .eyebrow {
        display: inline-block;
        margin: 0 0 12px;
        color: var(--oak-gold-dark);
        border-bottom: 3px solid #d99a0c;
        font-size: 0.9rem;
        font-weight: 700;
        line-height: 1.15;
        text-transform: uppercase;
    }

    h1,
    h2 {
        margin: 0;
        color: var(--oak-gold-dark);
        font-family: Georgia, 'Times New Roman', serif;
        font-weight: 400;
        line-height: 1.04;
    }

    h1 {
        max-width: 780px;
        font-size: clamp(3rem, 8vw, 7.8rem);
    }

    h2 {
        font-size: clamp(2rem, 4.2vw, 4.6rem);
    }

    .hero-copy p:not(.eyebrow),
    .details-copy p,
    .enquiry-intro p {
        max-width: 620px;
        margin: 24px 0 0;
        color: var(--oak-muted);
        font-size: clamp(1rem, 1.5vw, 1.16rem);
        line-height: 1.7;
    }

    .hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        margin-top: 34px;
    }

    .primary-action,
    .ghost-action {
        display: inline-flex;
        min-height: 46px;
        align-items: center;
        justify-content: center;
        padding: 0 22px;
        border: 1px solid var(--oak-gold);
        border-radius: 6px;
        font-weight: 700;
        text-decoration: none;
    }

    .primary-action {
        background: var(--oak-gold);
        color: #fff9e8;
    }

    .ghost-action {
        color: var(--oak-gold-dark);
    }

    .hero-media {
        position: relative;
        min-height: 540px;
    }

    .hero-media::before {
        position: absolute;
        inset: -18px 24px 34px -18px;
        border: 1px solid var(--oak-line);
        content: '';
    }

    .hero-media img {
        position: relative;
        width: 100%;
        height: min(68vh, 680px);
        min-height: 480px;
        object-fit: cover;
    }

    .quick-stats {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 26px;
        padding: clamp(44px, 6vw, 74px) clamp(20px, 5vw, 72px);
        background:
            linear-gradient(rgba(45, 24, 10, 0.86), rgba(45, 24, 10, 0.86)),
            url('{{ asset('images/oak/client/banquet-garden.jpg') }}');
        background-position: center;
        background-size: cover;
    }

    .quick-stats div {
        display: grid;
        min-height: 132px;
        place-items: center;
        padding: 24px;
        background: var(--oak-cream);
        text-align: center;
    }

    .quick-stats strong {
        color: var(--oak-gold-dark);
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(2rem, 3.2vw, 3.3rem);
        font-weight: 400;
        line-height: 1;
    }

    .quick-stats span {
        color: var(--oak-muted);
    }

    .section-heading {
        display: grid;
        max-width: 760px;
        margin-bottom: clamp(28px, 4vw, 46px);
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: 1.25fr 0.75fr;
        grid-template-rows: repeat(2, minmax(230px, 1fr));
        gap: 20px;
    }

    .gallery-grid img {
        width: 100%;
        height: 100%;
        min-height: 240px;
        object-fit: cover;
    }

    .gallery-large {
        grid-row: 1 / span 2;
    }

    .room-hero {
        background: linear-gradient(180deg, #fffaf0 0%, #fff4dd 100%);
    }

    .room-hero h1 {
        max-width: 640px;
        font-size: clamp(2.8rem, 6vw, 5.7rem);
    }

    .room-categories {
        background: var(--oak-ivory);
    }

    .room-category-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
    }

    .room-category-card {
        display: grid;
        grid-template-rows: minmax(260px, 0.92fr) 1fr;
        border: 1px solid var(--oak-line);
        background: #fff7e5;
    }

    .room-category-card img {
        width: 100%;
        height: 100%;
        min-height: 260px;
        object-fit: cover;
    }

    .room-category-card > div {
        padding: clamp(22px, 3vw, 32px);
    }

    .room-category-card span {
        color: var(--oak-gold);
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 2rem;
    }

    .room-category-card h3 {
        margin: 14px 0 0;
        color: var(--oak-gold-dark);
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(1.7rem, 2.8vw, 2.6rem);
        font-weight: 400;
        line-height: 1.08;
    }

    .room-category-card p {
        margin: 14px 0 0;
        color: var(--oak-muted);
        line-height: 1.65;
    }

    .room-category-card ul {
        display: grid;
        gap: 10px;
        margin: 20px 0 0;
        padding: 0;
        color: var(--oak-bark);
        list-style: none;
    }

    .room-category-card li {
        position: relative;
        padding-left: 18px;
    }

    .room-category-card li::before {
        position: absolute;
        top: 0.68em;
        left: 0;
        width: 7px;
        height: 7px;
        background: var(--oak-gold);
        border-radius: 50%;
        content: '';
    }

    .room-details {
        background:
            linear-gradient(rgba(248, 237, 219, 0.92), rgba(248, 237, 219, 0.94)),
            url('{{ asset('images/oak/client/room-deluxe.jpg') }}');
        background-position: center;
        background-size: cover;
    }

    .decoration-hero-redesign {
        display: grid;
        grid-template-columns: minmax(0, 0.92fr) minmax(340px, 1.08fr);
        gap: clamp(34px, 6vw, 82px);
        align-items: center;
        padding: clamp(38px, 5.5vw, 70px) clamp(20px, 5vw, 72px);
        background: linear-gradient(180deg, #fffaf0 0%, #fff2e1 100%);
    }

    .decoration-hero-copy h1 {
        max-width: 720px;
        font-size: clamp(2.45rem, 4.8vw, 4.9rem);
    }

    .decoration-hero-copy p:not(.eyebrow) {
        max-width: 680px;
        margin: 24px 0 0;
        color: var(--oak-muted);
        font-size: clamp(1rem, 1.5vw, 1.16rem);
        line-height: 1.7;
    }

    .decoration-hero-image {
        position: relative;
        min-height: 390px;
    }

    .decoration-hero-image::before {
        position: absolute;
        inset: 24px -18px -18px 28px;
        border: 1px solid var(--oak-line);
        content: '';
    }

    .decoration-hero-image img {
        position: relative;
        width: 100%;
        height: min(50vh, 510px);
        min-height: 390px;
        object-fit: cover;
    }

    .decoration-categories {
        background: var(--oak-ivory);
        padding-top: clamp(36px, 5vw, 60px);
    }

    .decoration-categories .section-heading {
        margin-bottom: clamp(22px, 3vw, 32px);
    }

    .decor-category-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
    }

    .decor-category-card {
        display: grid;
        grid-template-rows: minmax(280px, 0.72fr) 1fr;
        border: 1px solid var(--oak-line);
        background: #fff7e5;
    }

    .decor-category-card img {
        width: 100%;
        height: 100%;
        min-height: 280px;
        object-fit: cover;
    }

    .decor-category-card > div {
        padding: clamp(22px, 3vw, 34px);
    }

    .decor-category-card span {
        color: var(--oak-gold);
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 2rem;
    }

    .decor-category-card h3 {
        margin: 14px 0 0;
        color: var(--oak-gold-dark);
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(1.6rem, 2.35vw, 2.45rem);
        font-weight: 400;
        line-height: 1.08;
    }

    .decor-category-card p {
        margin: 14px 0 0;
        color: var(--oak-muted);
        line-height: 1.65;
    }

    .decor-category-card ul {
        display: grid;
        gap: 10px;
        margin: 20px 0 0;
        padding: 0;
        color: var(--oak-bark);
        list-style: none;
    }

    .decor-category-card li {
        position: relative;
        padding-left: 18px;
    }

    .decor-category-card li::before {
        position: absolute;
        top: 0.68em;
        left: 0;
        width: 7px;
        height: 7px;
        background: var(--oak-gold);
        border-radius: 50%;
        content: '';
    }

    .decoration-details {
        background:
            linear-gradient(rgba(248, 237, 219, 0.9), rgba(248, 237, 219, 0.94)),
            url('{{ asset('images/oak/client/banquet-lawn.jpg') }}');
        background-position: center;
        background-size: cover;
    }

    .catering-hero {
        display: grid;
        grid-template-columns: minmax(0, 0.92fr) minmax(340px, 1.08fr);
        gap: clamp(34px, 6vw, 82px);
        align-items: center;
        padding: clamp(42px, 6vw, 78px) clamp(20px, 5vw, 72px);
        background: linear-gradient(180deg, #fffaf0 0%, #fff5df 100%);
    }

    .catering-hero-copy h1 {
        max-width: 760px;
        font-size: clamp(2.55rem, 5vw, 5.2rem);
    }

    .catering-hero-copy p:not(.eyebrow) {
        max-width: 690px;
        margin: 24px 0 0;
        color: var(--oak-muted);
        font-size: clamp(1rem, 1.5vw, 1.16rem);
        line-height: 1.7;
    }

    .catering-hero-image {
        position: relative;
        min-height: 400px;
    }

    .catering-hero-image::before {
        position: absolute;
        inset: 24px -18px -18px 28px;
        border: 1px solid var(--oak-line);
        content: '';
    }

    .catering-hero-image img {
        position: relative;
        width: 100%;
        height: min(52vh, 520px);
        min-height: 400px;
        object-fit: cover;
    }

    .catering-options {
        background: var(--oak-ivory);
        padding-top: clamp(42px, 6vw, 72px);
    }

    .catering-type-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .catering-type-card {
        display: grid;
        grid-template-rows: minmax(320px, 0.7fr) 1fr;
        border: 1px solid var(--oak-line);
        background: #fff7e5;
    }

    .catering-type-card img {
        width: 100%;
        height: 100%;
        min-height: 320px;
        object-fit: cover;
    }

    .catering-type-copy {
        padding: clamp(24px, 3vw, 36px);
    }

    .catering-type-label {
        display: inline-flex;
        margin-bottom: 12px;
        color: var(--oak-gold-dark);
        border-bottom: 3px solid #d99a0c;
        font-size: 0.86rem;
        font-weight: 800;
        text-transform: uppercase;
    }

    .catering-type-card h3 {
        margin: 0;
        color: var(--oak-gold-dark);
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(2rem, 3vw, 3.2rem);
        font-weight: 400;
        line-height: 1.08;
    }

    .catering-plan-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
        margin-top: 24px;
    }

    .catering-plan-grid > div {
        padding: 20px;
        border: 1px solid var(--oak-line);
        background: rgba(255, 250, 240, 0.72);
    }

    .catering-plan-grid h4 {
        margin: 0;
        color: var(--oak-bark);
        font-size: 1rem;
    }

    .catering-plan-grid p {
        margin: 10px 0 0;
        color: var(--oak-muted);
        line-height: 1.6;
    }

    .catering-plan-grid ul {
        display: grid;
        gap: 8px;
        margin: 16px 0 0;
        padding: 0;
        color: var(--oak-bark);
        list-style: none;
    }

    .catering-plan-grid li {
        position: relative;
        padding-left: 18px;
    }

    .catering-plan-grid li::before {
        position: absolute;
        top: 0.68em;
        left: 0;
        width: 7px;
        height: 7px;
        background: var(--oak-gold);
        border-radius: 50%;
        content: '';
    }

    .catering-details {
        background:
            linear-gradient(rgba(248, 237, 219, 0.92), rgba(248, 237, 219, 0.94)),
            url('{{ asset('images/oak/client/restaurant-hero.jpg') }}');
        background-position: center;
        background-size: cover;
    }

    .admin-shell {
        display: grid;
        grid-template-columns: 280px minmax(0, 1fr);
        min-height: 100vh;
        background: #f8eddb;
    }

    .admin-sidebar {
        position: sticky;
        top: 0;
        height: 100vh;
        padding: 28px;
        border-right: 1px solid var(--oak-line);
        background: #27160e;
        color: #fff9e8;
    }

    .admin-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #fff1c9;
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 1.2rem;
        text-decoration: none;
    }

    .admin-sidebar .brand-mark {
        border-color: #d99a0c;
    }

    .admin-nav {
        display: grid;
        gap: 8px;
        margin-top: 38px;
    }

    .admin-nav a {
        padding: 12px 14px;
        color: rgba(255, 249, 232, 0.78);
        border: 1px solid transparent;
        border-radius: 6px;
        text-decoration: none;
    }

    .admin-nav a.active,
    .admin-nav a:hover {
        color: #fff1c9;
        border-color: rgba(217, 154, 12, 0.42);
        background: rgba(255, 241, 201, 0.08);
    }

    .admin-main {
        min-width: 0;
        padding: clamp(24px, 4vw, 46px);
    }

    .admin-header,
    .admin-panel-header,
    .booking-builder-header,
    .modal-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 18px;
    }

    .admin-header h1 {
        max-width: none;
        font-size: clamp(2.1rem, 4vw, 4.2rem);
    }

    .admin-date {
        display: grid;
        min-width: 150px;
        gap: 3px;
        padding: 14px 16px;
        border: 1px solid var(--oak-line);
        background: var(--oak-ivory);
        text-align: right;
    }

    .admin-date span,
    .admin-panel p,
    .booking-builder-header p {
        color: var(--oak-muted);
    }

    .admin-stats {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 16px;
        margin-top: 28px;
    }

    .admin-stats article,
    .admin-panel {
        border: 1px solid var(--oak-line);
        background: var(--oak-ivory);
    }

    .admin-stats article {
        display: grid;
        gap: 8px;
        padding: 20px;
    }

    .admin-stats span {
        color: var(--oak-muted);
        font-weight: 700;
    }

    .admin-stats strong {
        color: var(--oak-gold-dark);
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 2.6rem;
        font-weight: 400;
        line-height: 1;
    }

    .admin-panel {
        margin-top: 20px;
        padding: 24px;
    }

    .admin-panel h2 {
        font-size: clamp(1.6rem, 2.2vw, 2.3rem);
    }

    .admin-filters {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .admin-filters span,
    .service-pill,
    .status-pill,
    .booking-code {
        display: inline-flex;
        align-items: center;
        min-height: 30px;
        padding: 0 10px;
        border-radius: 999px;
        font-size: 0.78rem;
        font-weight: 800;
        text-transform: uppercase;
    }

    .admin-filters span {
        border: 1px solid var(--oak-line);
        color: var(--oak-gold-dark);
    }

    .admin-table-wrap {
        margin-top: 22px;
        overflow-x: auto;
    }

    .admin-table {
        width: 100%;
        min-width: 900px;
        border-collapse: collapse;
    }

    .admin-table th {
        padding: 12px 14px;
        color: var(--oak-muted);
        border-bottom: 1px solid var(--oak-line);
        font-size: 0.78rem;
        text-align: left;
        text-transform: uppercase;
    }

    .admin-table td {
        padding: 16px 14px;
        border-bottom: 1px solid rgba(121, 80, 0, 0.14);
        color: var(--oak-ink);
    }

    .admin-table td:first-child {
        display: grid;
        gap: 4px;
    }

    .admin-table td:first-child span {
        color: var(--oak-muted);
        font-size: 0.88rem;
    }

    .enquiry-row {
        cursor: pointer;
        transition: background 0.18s ease;
    }

    .enquiry-row:hover,
    .enquiry-row:focus {
        background: #fff3d4;
        outline: none;
    }

    .service-pill.banquet {
        background: #fff1c9;
        color: #795000;
    }

    .service-pill.rooms {
        background: #dfeaf2;
        color: #20485d;
    }

    .service-pill.decoration {
        background: #f8dce6;
        color: #7b2949;
    }

    .service-pill.catering {
        background: #ffe1c8;
        color: #8a3d06;
    }

    .status-pill.new {
        background: #efe5ff;
        color: #4e2a7d;
    }

    .status-pill.contacted {
        background: #dfeaf2;
        color: #20485d;
    }

    .status-pill.discussion {
        background: #fff1c9;
        color: #795000;
    }

    .status-pill.booked {
        background: #dff0df;
        color: #285c28;
    }

    .booking-card-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
        margin-top: 20px;
    }

    .booking-card-grid article {
        padding: 20px;
        border: 1px solid var(--oak-line);
        background: #fff7e5;
    }

    .booking-card-grid h3 {
        margin: 12px 0 0;
        color: var(--oak-bark);
    }

    .booking-card-grid p {
        margin: 8px 0 16px;
    }

    .booking-code {
        background: #27160e;
        color: #fff1c9;
    }

    .admin-modal {
        position: fixed;
        inset: 0;
        z-index: 50;
        display: none;
    }

    .admin-modal.is-open {
        display: block;
    }

    .admin-modal-backdrop {
        position: absolute;
        inset: 0;
        background: rgba(39, 22, 14, 0.58);
    }

    .admin-modal-card {
        position: absolute;
        inset: 28px;
        display: grid;
        grid-template-rows: auto 1fr;
        max-width: 1320px;
        margin: 0 auto;
        overflow: hidden;
        border: 1px solid var(--oak-line);
        background: var(--oak-ivory);
        box-shadow: 0 24px 80px rgba(39, 22, 14, 0.28);
    }

    .modal-header {
        padding: 22px 26px;
        border-bottom: 1px solid var(--oak-line);
        background: #fff7e5;
    }

    .modal-header h2 {
        font-size: clamp(1.6rem, 2.4vw, 2.6rem);
    }

    .modal-close {
        min-height: 40px;
        padding: 0 16px;
        border: 1px solid var(--oak-line);
        border-radius: 6px;
        background: var(--oak-ivory);
        color: var(--oak-gold-dark);
        cursor: pointer;
    }

    .modal-grid {
        display: grid;
        grid-template-columns: 330px minmax(0, 1fr);
        min-height: 0;
        overflow: hidden;
    }

    .modal-summary {
        padding: 24px;
        overflow-y: auto;
        border-right: 1px solid var(--oak-line);
        background: #f8eddb;
    }

    .modal-summary h3 {
        margin: 0;
        color: var(--oak-gold-dark);
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 2rem;
        font-weight: 400;
    }

    .modal-summary dl {
        display: grid;
        gap: 14px;
        margin: 24px 0;
    }

    .modal-summary dt {
        color: var(--oak-muted);
        font-size: 0.78rem;
        font-weight: 800;
        text-transform: uppercase;
    }

    .modal-summary dd {
        margin: 4px 0 0;
        color: var(--oak-ink);
    }

    .modal-summary p {
        color: var(--oak-muted);
        line-height: 1.65;
    }

    .modal-workspace {
        display: grid;
        gap: 18px;
        padding: 24px;
        overflow-y: auto;
    }

    .followup-box,
    .booking-builder,
    .service-booking-form {
        padding: 20px;
        border: 1px solid var(--oak-line);
        background: #fff7e5;
    }

    .followup-box h3,
    .booking-builder h3,
    .service-booking-form h4 {
        margin: 0 0 14px;
        color: var(--oak-bark);
    }

    .admin-form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
    }

    .followup-box label,
    .booking-builder > label,
    .admin-form-grid label {
        display: grid;
        gap: 8px;
        color: var(--oak-bark);
        font-size: 0.88rem;
        font-weight: 800;
    }

    .followup-box textarea,
    .booking-builder textarea,
    .followup-box input,
    .followup-box select,
    .admin-form-grid input,
    .admin-form-grid select {
        width: 100%;
        min-height: 44px;
        padding: 0 12px;
        border: 1px solid rgba(121, 80, 0, 0.26);
        border-radius: 6px;
        background: var(--oak-ivory);
        color: var(--oak-ink);
    }

    .followup-box textarea {
        min-height: 96px;
        margin-top: 14px;
        padding: 12px;
    }

    .booking-builder textarea {
        min-height: 96px;
        padding: 12px;
        resize: vertical;
    }

    .booking-builder-header span {
        white-space: nowrap;
        color: var(--oak-gold-dark);
        font-weight: 800;
    }

    .service-toggle-grid {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 10px;
        margin-top: 18px;
    }

    .service-toggle-grid label {
        display: flex;
        min-height: 44px;
        align-items: center;
        gap: 8px;
        padding: 0 12px;
        border: 1px solid var(--oak-line);
        border-radius: 6px;
        background: var(--oak-ivory);
        color: var(--oak-bark);
        font-weight: 800;
    }

    .service-form-stack {
        display: grid;
        gap: 14px;
        margin-top: 18px;
    }

    .service-booking-form {
        display: none;
    }

    .service-booking-form.is-visible {
        display: block;
    }

    .availability-strip {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 14px;
    }

    .availability-strip button {
        min-height: 36px;
        padding: 0 12px;
        border: 1px solid #7ea56f;
        border-radius: 999px;
        background: #e8f4df;
        color: #285c28;
        font-weight: 800;
    }

    .modal-actions {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 18px;
    }

    .booking-result {
        margin: 14px 0 0;
        color: var(--oak-gold-dark);
        font-weight: 800;
    }

    .service-picker {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 16px;
        padding-top: 0;
        padding-bottom: clamp(50px, 7vw, 88px);
    }

    .service-card {
        position: relative;
        display: grid;
        min-height: clamp(270px, 36vw, 360px);
        align-items: end;
        overflow: hidden;
        color: #fff9e8;
        text-decoration: none;
        isolation: isolate;
    }

    .service-card::before {
        position: absolute;
        inset: 0;
        z-index: 1;
        background: linear-gradient(180deg, rgba(39, 22, 14, 0.12), rgba(39, 22, 14, 0.84));
        content: '';
    }

    .service-card img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.45s ease;
        z-index: 0;
    }

    .service-card:hover img {
        transform: scale(1.045);
    }

    .service-card > div,
    .service-badge {
        position: relative;
        z-index: 2;
    }

    .service-card > div {
        padding: clamp(18px, 2.2vw, 26px);
    }

    .service-badge {
        position: absolute;
        top: 18px;
        left: 18px;
        padding: 8px 12px;
        border: 1px solid rgba(255, 249, 232, 0.56);
        background: rgba(39, 22, 14, 0.48);
        border-radius: 999px;
        font-size: 0.78rem;
        font-weight: 700;
        text-transform: uppercase;
    }

    .service-card h2 {
        color: #fff3c6;
        font-size: clamp(1.45rem, 2.4vw, 2.6rem);
    }

    .service-card p {
        max-width: 560px;
        margin: 12px 0 0;
        color: rgba(255, 249, 232, 0.88);
        font-size: 0.94rem;
        line-height: 1.65;
    }

    .service-link {
        display: inline-flex;
        margin-top: 22px;
        color: #fff1c9;
        border-bottom: 2px solid #d99a0c;
        font-weight: 800;
    }

    .muted-link {
        opacity: 0.76;
    }

    .details-section {
        display: grid;
        grid-template-columns: minmax(0, 0.8fr) minmax(320px, 1.2fr);
        gap: clamp(34px, 6vw, 78px);
        align-items: start;
        background: #f8eddb;
    }

    .detail-list {
        display: grid;
        gap: 18px;
    }

    .detail-list article {
        display: grid;
        grid-template-columns: 64px 1fr;
        gap: 18px 22px;
        padding: 24px;
        border: 1px solid var(--oak-line);
        background: rgba(255, 250, 240, 0.76);
    }

    .detail-list span {
        color: var(--oak-gold);
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 2rem;
    }

    .detail-list h3 {
        margin: 0;
        color: var(--oak-bark);
        font-size: 1.08rem;
    }

    .detail-list p {
        grid-column: 2;
        margin: -10px 0 0;
        color: var(--oak-muted);
        line-height: 1.65;
    }

    .enquiry-section {
        display: grid;
        grid-template-columns: minmax(0, 0.85fr) minmax(320px, 1.15fr);
        gap: clamp(34px, 6vw, 82px);
        align-items: start;
    }

    .gateway-steps {
        display: grid;
        grid-template-columns: minmax(0, 0.72fr) minmax(320px, 1.28fr);
        gap: clamp(34px, 6vw, 78px);
        background: #f8eddb;
    }

    .step-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
    }

    .step-grid article {
        min-height: 230px;
        padding: 24px;
        border: 1px solid var(--oak-line);
        background: rgba(255, 250, 240, 0.78);
    }

    .step-grid span {
        color: var(--oak-gold);
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 2rem;
    }

    .step-grid h3 {
        margin: 22px 0 0;
        color: var(--oak-bark);
        font-size: 1.08rem;
    }

    .step-grid p {
        margin: 12px 0 0;
        color: var(--oak-muted);
        line-height: 1.65;
    }

    .enquiry-form {
        display: grid;
        gap: 18px;
        padding: clamp(22px, 4vw, 38px);
        border: 1px solid var(--oak-line);
        background: #fff7e5;
    }

    .field-row {
        display: grid;
        grid-template-columns: 1fr 0.68fr;
        gap: 18px;
    }

    .field-group {
        display: grid;
        gap: 8px;
    }

    .field-group label {
        color: var(--oak-bark);
        font-size: 0.9rem;
        font-weight: 700;
    }

    .field-group input,
    .field-group select,
    .field-group textarea {
        width: 100%;
        border: 1px solid rgba(121, 80, 0, 0.26);
        border-radius: 6px;
        background: var(--oak-ivory);
        color: var(--oak-ink);
        outline: none;
    }

    .field-group input,
    .field-group select {
        min-height: 48px;
        padding: 0 14px;
    }

    .field-group textarea {
        padding: 12px 14px;
    }

    .field-group input:focus,
    .field-group select:focus,
    .field-group textarea:focus {
        border-color: var(--oak-gold);
        box-shadow: 0 0 0 3px rgba(164, 109, 2, 0.12);
    }

    .form-action {
        width: 100%;
        margin-top: 4px;
        cursor: pointer;
    }

    .form-success,
    .form-error {
        margin: 0 0 18px;
        padding: 14px 16px;
        border-radius: 8px;
        font-weight: 700;
        line-height: 1.5;
    }

    .form-success {
        border: 1px solid rgba(75, 128, 67, 0.34);
        background: rgba(126, 165, 111, 0.16);
        color: #335d2e;
    }

    .form-error {
        border: 1px solid rgba(148, 55, 42, 0.32);
        background: rgba(148, 55, 42, 0.1);
        color: #8b2f25;
    }

    .form-error p {
        margin: 0;
    }

    .form-error p + p {
        margin-top: 6px;
    }

    .amenities-section {
        padding: clamp(54px, 8vw, 92px) clamp(20px, 5vw, 72px);
        background: #fff7e5;
    }

    .amenity-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 12px;
        margin-top: 28px;
    }

    .amenity-grid span {
        display: flex;
        min-height: 72px;
        align-items: center;
        padding: 14px;
        border: 1px solid rgba(121, 80, 0, 0.2);
        border-radius: 8px;
        background: var(--oak-ivory);
        color: var(--oak-bark);
        font-size: 0.94rem;
        font-weight: 700;
        line-height: 1.45;
    }

    .form-action:disabled {
        cursor: not-allowed;
        opacity: 0.58;
    }

    .availability-message {
        margin: 0;
        padding: 12px 14px;
        border-radius: 6px;
        font-size: 0.92rem;
        font-weight: 700;
        line-height: 1.5;
    }

    .availability-message.neutral {
        border: 1px solid rgba(121, 80, 0, 0.22);
        background: #fff7e5;
        color: var(--oak-muted);
    }

    .availability-message.available {
        border: 1px solid rgba(75, 128, 67, 0.34);
        background: rgba(126, 165, 111, 0.16);
        color: #335d2e;
    }

    .availability-message.unavailable {
        border: 1px solid rgba(148, 55, 42, 0.32);
        background: rgba(148, 55, 42, 0.1);
        color: #8b2f25;
    }

    .tariff-panel {
        scroll-margin-top: 22px;
    }

    .tariff-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(310px, 0.42fr);
        gap: 20px;
        align-items: start;
        margin-top: 22px;
    }

    .tariff-table-wrap {
        overflow-x: auto;
    }

    .tariff-table {
        min-width: 820px;
    }

    .tariff-table td:first-child span {
        color: var(--oak-muted);
        font-size: 0.88rem;
    }

    .tariff-badge {
        display: inline-flex;
        min-height: 30px;
        align-items: center;
        padding: 0 10px;
        border-radius: 999px;
        font-weight: 900;
    }

    .tariff-badge.increase {
        background: #fff1c9;
        color: var(--oak-gold-dark);
    }

    .tariff-badge.discount {
        background: rgba(126, 165, 111, 0.16);
        color: #335d2e;
    }

    .tariff-form {
        display: grid;
        gap: 14px;
        padding: 20px;
        border: 1px solid var(--oak-line);
        border-radius: 8px;
        background: #fff7e5;
    }

    .tariff-form h3 {
        margin: 0;
        color: var(--oak-bark);
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 1.55rem;
    }

    .tariff-form label {
        display: grid;
        gap: 8px;
        color: var(--oak-bark);
        font-size: 0.9rem;
        font-weight: 700;
    }

    .tariff-form input,
    .tariff-form select,
    .tariff-form textarea {
        width: 100%;
        min-height: 44px;
        padding: 0 12px;
        border: 1px solid rgba(121, 80, 0, 0.26);
        border-radius: 6px;
        background: var(--oak-ivory);
        color: var(--oak-ink);
        font: inherit;
    }

    .tariff-form textarea {
        padding: 12px;
        resize: vertical;
    }

    .admin-availability-note {
        margin: 12px 0 0;
        padding: 10px 12px;
        border: 1px solid rgba(164, 109, 2, 0.2);
        border-radius: 6px;
        background: #fff7e5;
        color: var(--oak-gold-dark);
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .combined-enquiry-page {
        background:
            linear-gradient(180deg, rgba(255, 250, 240, 0.94), rgba(255, 241, 201, 0.28) 46%, rgba(255, 250, 240, 1)),
            var(--oak-ivory);
    }

    .combined-hero,
    .combined-workspace {
        padding: clamp(48px, 7vw, 92px) clamp(20px, 5vw, 72px);
    }

    .combined-hero {
        display: grid;
        grid-template-columns: minmax(0, 0.9fr) minmax(340px, 1.1fr);
        gap: clamp(30px, 6vw, 78px);
        align-items: center;
    }

    .combined-hero h1 {
        max-width: 860px;
        margin: 0;
        color: var(--oak-gold-dark);
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(2.35rem, 5vw, 4.8rem);
        line-height: 1.02;
        letter-spacing: 0;
    }

    .combined-hero p:not(.eyebrow),
    .section-heading p,
    .combined-summary-panel > p {
        color: var(--oak-muted);
        line-height: 1.7;
    }

    .combined-hero-image {
        min-height: 430px;
        border: 1px solid rgba(121, 80, 0, 0.18);
        overflow: hidden;
    }

    .combined-hero-image img {
        width: 100%;
        height: 100%;
        min-height: 430px;
        object-fit: cover;
    }

    .combined-workspace {
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(320px, 0.42fr);
        gap: clamp(24px, 4vw, 44px);
        align-items: start;
        background: #f8eddb;
    }

    .combined-main,
    .combined-summary-panel {
        min-width: 0;
    }

    .section-heading {
        max-width: 820px;
        margin-bottom: 28px;
    }

    .section-heading h2,
    .combined-summary-panel h2 {
        margin: 0;
        color: var(--oak-gold-dark);
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(1.9rem, 3.2vw, 3rem);
        line-height: 1.1;
        letter-spacing: 0;
    }

    .combined-service-grid {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 14px;
    }

    .combined-service-card {
        display: grid;
        grid-template-rows: 150px auto auto 1fr;
        gap: 10px;
        min-height: 336px;
        padding: 10px;
        border: 1px solid rgba(121, 80, 0, 0.2);
        border-radius: 8px;
        background: rgba(255, 250, 240, 0.9);
        cursor: pointer;
        transition: transform 180ms ease, border-color 180ms ease, box-shadow 180ms ease;
    }

    .combined-service-card:hover,
    .combined-service-card.is-selected {
        transform: translateY(-2px);
        border-color: var(--oak-gold);
        box-shadow: 0 18px 34px rgba(64, 38, 13, 0.12);
    }

    .combined-service-card input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .combined-service-card img {
        width: 100%;
        height: 150px;
        border-radius: 6px;
        object-fit: cover;
    }

    .combined-service-card span {
        color: var(--oak-gold-dark);
        font-size: 0.74rem;
        font-weight: 800;
        text-transform: uppercase;
    }

    .combined-service-card strong {
        color: var(--oak-bark);
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 1.2rem;
        line-height: 1.1;
    }

    .combined-service-card small {
        color: var(--oak-muted);
        font-size: 0.88rem;
        line-height: 1.5;
    }

    .combined-detail-stack {
        display: grid;
        gap: 16px;
        margin-top: 28px;
    }

    .combined-detail {
        display: grid;
        gap: 18px;
        padding: clamp(18px, 3vw, 28px);
        border: 1px solid rgba(121, 80, 0, 0.22);
        border-radius: 8px;
        background: var(--oak-ivory);
    }

    .combined-detail.is-hidden {
        display: none;
    }

    .combined-detail h3 {
        margin: 0;
        color: var(--oak-bark);
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(1.45rem, 2.2vw, 2rem);
        letter-spacing: 0;
    }

    .combined-field-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 14px;
    }

    .combined-field-grid label,
    .combined-form label {
        display: grid;
        gap: 8px;
        color: var(--oak-bark);
        font-size: 0.9rem;
        font-weight: 700;
    }

    .combined-field-grid input,
    .combined-field-grid select,
    .combined-form input,
    .combined-form select,
    .combined-form textarea {
        width: 100%;
        min-height: 46px;
        padding: 0 13px;
        border: 1px solid rgba(121, 80, 0, 0.26);
        border-radius: 6px;
        background: #fffdf7;
        color: var(--oak-ink);
        font: inherit;
        outline: none;
    }

    .combined-form textarea {
        min-height: 112px;
        padding: 12px 13px;
        resize: vertical;
    }

    .combined-menu-link,
    .gateway-alt-link {
        display: inline-flex;
        width: fit-content;
        color: var(--oak-gold-dark);
        font-weight: 800;
        text-decoration: none;
        border-bottom: 1px solid currentColor;
    }

    .combined-summary-panel {
        position: sticky;
        top: 96px;
        padding: clamp(20px, 3vw, 30px);
        border: 1px solid rgba(121, 80, 0, 0.22);
        border-radius: 8px;
        background: #fff7e5;
    }

    .combined-form {
        display: grid;
        gap: 16px;
        margin-top: 22px;
    }

    .selected-summary {
        display: grid;
        gap: 7px;
        padding: 14px;
        border: 1px solid rgba(164, 109, 2, 0.28);
        border-radius: 6px;
        background: var(--oak-ivory);
    }

    .selected-summary span {
        color: var(--oak-muted);
        font-size: 0.82rem;
        font-weight: 800;
        text-transform: uppercase;
    }

    .selected-summary strong {
        color: var(--oak-gold-dark);
        line-height: 1.4;
    }

    .combined-submit {
        min-height: 50px;
        border: 1px solid var(--oak-gold-dark);
        border-radius: 6px;
        background: var(--oak-gold-dark);
        color: var(--oak-ivory);
        cursor: pointer;
        font-weight: 800;
    }

    .combined-result {
        margin: 0;
        padding: 12px;
        border-radius: 6px;
        background: rgba(126, 165, 111, 0.16);
        color: #335d2e;
        font-size: 0.92rem;
        line-height: 1.5;
    }

    @media (max-width: 900px) {
        .admin-shell {
            grid-template-columns: 1fr;
        }

        .admin-sidebar {
            position: static;
            height: auto;
        }

        .admin-nav {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .admin-stats,
        .booking-card-grid,
        .service-toggle-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .tariff-layout {
            grid-template-columns: 1fr;
        }

        .admin-modal-card {
            inset: 14px;
        }

        .modal-grid {
            grid-template-columns: 1fr;
            overflow-y: auto;
        }

        .modal-summary {
            border-right: 0;
            border-bottom: 1px solid var(--oak-line);
        }

        .topbar {
            align-items: flex-start;
            flex-direction: column;
        }

        .hero-section,
        .gateway-hero,
        .details-section,
        .enquiry-section,
        .gateway-steps {
            grid-template-columns: 1fr;
        }

        .hero-section,
        .gateway-hero {
            min-height: auto;
        }

        .hero-media,
        .hero-media img {
            min-height: 360px;
        }

        .quick-stats {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .room-category-grid {
            grid-template-columns: 1fr;
        }

        .decor-category-grid {
            grid-template-columns: 1fr;
        }

        .decoration-hero-redesign {
            grid-template-columns: 1fr;
        }

        .catering-hero {
            grid-template-columns: 1fr;
        }

        .decoration-hero-image,
        .decoration-hero-image img {
            min-height: 340px;
        }

        .catering-hero-image,
        .catering-hero-image img {
            min-height: 340px;
        }

        .catering-type-grid,
        .catering-plan-grid {
            grid-template-columns: 1fr;
        }

        .amenity-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .combined-hero,
        .combined-workspace {
            grid-template-columns: 1fr;
        }

        .combined-service-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .combined-field-grid {
            grid-template-columns: 1fr;
        }

        .combined-summary-panel {
            position: static;
        }

        .service-picker {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .step-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 640px) {
        .admin-header,
        .admin-panel-header,
        .booking-builder-header,
        .modal-header {
            flex-direction: column;
        }

        .admin-nav,
        .admin-stats,
        .booking-card-grid,
        .admin-form-grid,
        .service-toggle-grid,
        .tariff-layout {
            grid-template-columns: 1fr;
        }

        .admin-main,
        .admin-panel,
        .modal-workspace,
        .modal-summary {
            padding: 18px;
        }

        .modal-actions {
            flex-direction: column;
        }

        .nav-links {
            width: 100%;
            justify-content: space-between;
            gap: 12px;
        }

        .gallery-grid,
        .field-row {
            grid-template-columns: 1fr;
        }

        .service-picker {
            grid-template-columns: 1fr;
        }

        .service-card {
            grid-column: auto;
            min-height: 360px;
        }

        .gallery-large {
            grid-row: auto;
        }

        .quick-stats {
            grid-template-columns: 1fr;
        }

        .amenity-grid {
            grid-template-columns: 1fr;
        }

        .combined-service-grid {
            grid-template-columns: 1fr;
        }

        .detail-list article {
            grid-template-columns: 1fr;
        }

        .detail-list p {
            grid-column: auto;
            margin-top: 0;
        }
    }
</style>
