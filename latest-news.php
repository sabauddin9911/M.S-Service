<?php
require_once 'webapikingconfig/webapikingdb.php';
$sql = "SELECT site_name, address, phone, email FROM settings WHERE id = 1";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $settings  = $result->fetch_assoc();
    $site_name = $settings['site_name'];
    $phone     = $settings['phone'];
    $email     = $settings['email'];
    $address   = $settings['address'];
} else {
    $site_name = "PRINT PORTAL";
    $phone     = " ";
    $email     = "support@yourwebsite.com";
    $address   = "Your Office Address, India";
}

/* ── Fetch latest news from DB ──────────────────────────────────────────────
   Table: news  |  Columns expected:
     id, title, slug, category, summary, content, image, published_at, is_featured
   If your table differs, adjust the query/field names below.
   ───────────────────────────────────────────────────────────────────────── */
$news_items   = [];
$featured     = null;
$categories   = ['All'];

$news_sql = "SELECT id, title, slug, category, summary, image, published_at, is_featured
             FROM news
             WHERE status = 'published'
             ORDER BY is_featured DESC, published_at DESC
             LIMIT 30";
$news_result = $conn->query($news_sql);

if ($news_result && $news_result->num_rows > 0) {
    while ($row = $news_result->fetch_assoc()) {
        if ($row['is_featured'] && !$featured) {
            $featured = $row;
        } else {
            $news_items[] = $row;
            if ($row['category'] && !in_array($row['category'], $categories)) {
                $categories[] = $row['category'];
            }
        }
    }
}

/* ── Fallback demo data (shown when DB table is empty / not yet created) ─── */
if (!$featured && empty($news_items)) {
    $featured = [
        'id'           => 0,
        'title'        => 'UIDAI Launches New Aadhaar Face Authentication Feature for Operators',
        'slug'         => '#',
        'category'     => 'UIDAI Update',
        'summary'      => 'UIDAI has officially rolled out face-based authentication support for all registered operators on the Aadhaar ecosystem. This new feature eliminates the need for a physical fingerprint device in many scenarios, allowing cyber café operators and CSC agents to verify customers using a smartphone camera. The update brings improved accessibility and reduced hardware costs for millions of service providers across India.',
        'image'        => '',
        'published_at' => '2025-06-01 10:00:00',
        'is_featured'  => 1,
    ];
    $news_items = [
        ['id'=>1,'title'=>'PAN 2.0 Rollout: What Operators Need to Know','slug'=>'#','category'=>'PAN Card','summary'=>'The Income Tax Department has begun issuing upgraded PAN 2.0 cards with a QR code. Here\'s how this affects your print workflow on the portal.','image'=>'','published_at'=>'2025-05-28 09:00:00','is_featured'=>0],
        ['id'=>2,'title'=>'Voter ID Card Printing Now Supports EPIC Colour Format','slug'=>'#','category'=>'Voter ID','summary'=>'Election Commission of India has updated the EPIC card specification. Our portal now supports full-colour Voter ID printing with the new template automatically.','image'=>'','published_at'=>'2025-05-22 14:30:00','is_featured'=>0],
        ['id'=>3,'title'=>'Driving License Print: New Format for 2025 Batch DLs','slug'=>'#','category'=>'Driving License','summary'=>'State transport departments have updated the DL card format for the 2025 batch. PRINT PORTAL is already compatible — no action required from operators.','image'=>'','published_at'=>'2025-05-18 11:00:00','is_featured'=>0],
        ['id'=>4,'title'=>'Portal Maintenance Completed — Faster Print Speeds Live','slug'=>'#','category'=>'Portal Update','summary'=>'We completed a major infrastructure upgrade on 15 May. Document fetch times are now up to 40% faster. All services are fully operational.','image'=>'','published_at'=>'2025-05-15 08:00:00','is_featured'=>0],
        ['id'=>5,'title'=>'New Wallet Recharge Option: RuPay Credit Card Now Accepted','slug'=>'#','category'=>'Portal Update','summary'=>'Operators can now top up their wallets using RuPay credit cards in addition to UPI, Debit Card, and Net Banking. Zero transaction fee applies.','image'=>'','published_at'=>'2025-05-10 16:00:00','is_featured'=>0],
        ['id'=>6,'title'=>'CSC Titan Print Integration — Bulk Printing for VLEs','slug'=>'#','category'=>'CSC','summary'=>'Village Level Entrepreneurs (VLEs) can now use the CSC Titan Print module for bulk Aadhaar and PAN printing with a single wallet deduction.','image'=>'','published_at'=>'2025-05-05 13:00:00','is_featured'=>0],
        ['id'=>7,'title'=>'RC Card Print: Added Support for BS-VI Vehicle Certificates','slug'=>'#','category'=>'RC Print','summary'=>'PRINT PORTAL now supports RC card printing for all BS-VI registered vehicles. The template auto-detects the vehicle standard from VAHAN data.','image'=>'','published_at'=>'2025-04-28 10:00:00','is_featured'=>0],
        ['id'=>8,'title'=>'Security Alert: Always Use Official Portal URL','slug'=>'#','category'=>'Security','summary'=>'We have noticed fake portals impersonating PRINT PORTAL. Always access the portal from our official domain. Bookmark it for safety.','image'=>'','published_at'=>'2025-04-20 09:30:00','is_featured'=>0],
        ['id'=>9,'title'=>'Aadhaar Print Charges Revised — New Slab Rates Effective May 1','slug'=>'#','category'=>'UIDAI Update','summary'=>'UIDAI has revised Aadhaar print charges effective 1 May 2025. The new slab pricing offers better margins for high-volume operators. Check your dashboard for updated rates.','image'=>'','published_at'=>'2025-04-15 10:00:00','is_featured'=>0],
    ];
    $categories = ['All', 'UIDAI Update', 'PAN Card', 'Voter ID', 'Driving License', 'Portal Update', 'CSC', 'RC Print', 'Security'];
}

/* ── Category icon map ─── */
$cat_icons = [
    'UIDAI Update'    => 'fingerprint',
    'PAN Card'        => 'id-card',
    'Voter ID'        => 'vote-yea',
    'Driving License' => 'car',
    'Portal Update'   => 'cog',
    'CSC'             => 'network-wired',
    'RC Print'        => 'truck',
    'Security'        => 'shield-alt',
    'All'             => 'newspaper',
];

/* ── Category colour map ─── */
$cat_colors = [
    'UIDAI Update'    => '#4361ee',
    'PAN Card'        => '#fb5607',
    'Voter ID'        => '#06d6a0',
    'Driving License' => '#ffbe0b',
    'Portal Update'   => '#7b2ff7',
    'CSC'             => '#2196f3',
    'RC Print'        => '#ef476f',
    'Security'        => '#e63946',
];

function cat_color(string $cat, array $map): string {
    return $map[$cat] ?? '#4361ee';
}
function cat_icon(string $cat, array $map): string {
    return $map[$cat] ?? 'tag';
}
function fmt_date(string $date): string {
    return date('d M Y', strtotime($date));
}
function days_ago(string $date): string {
    $diff = floor((time() - strtotime($date)) / 86400);
    if ($diff === 0) return 'Today';
    if ($diff === 1) return 'Yesterday';
    return $diff . ' days ago';
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#4361ee">
    <meta name="description" content="Latest News - <?php echo htmlspecialchars($site_name); ?>. Stay updated with the latest changes in Aadhaar printing, PAN Card, Voter ID, Driving License, and portal updates for operators across India.">
    <meta name="keywords" content="latest news <?php echo htmlspecialchars($site_name); ?>, aadhaar update news, print portal news, uidai news, PRINT PORTAL updates">
    <title>Latest News - <?php echo htmlspecialchars($site_name); ?></title>
    <link rel="icon" href="/images/icons/6323119839395908375_99.jpg">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script defer src="../vendors/fontawesome/all.min.js"></script>

    <style>
        /* ═══════════════════════════════════════════
           CSS VARIABLES  —  identical to all pages
           ═══════════════════════════════════════════ */
        :root {
            --primary-color:   #4361ee;
            --primary-dark:    #3a56d5;
            --primary-light:   #6b7ff7;
            --secondary-color: #ffbe0b;
            --accent-color:    #fb5607;
            --success-color:   #06d6a0;
            --warning-color:   #ffd60a;
            --error-color:     #ef476f;
            --text-color:      #2d3436;
            --text-light:      #636e72;
            --text-muted:      #95a5a6;
            --background-color:#f8f9fa;
            --surface-color:   #ffffff;
            --border-color:    #e9ecef;
            --shadow-light:    0 2px 10px rgba(0,0,0,0.05);
            --shadow-medium:   0 8px 30px rgba(0,0,0,0.08);
            --shadow-heavy:    0 15px 35px rgba(0,0,0,0.15);
            --border-radius:   12px;
            --border-radius-lg:20px;
            --transition:      all 0.3s cubic-bezier(0.4,0,0.2,1);
            --container-max-width: 1400px;
        }

        *, *::before, *::after { box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            margin: 0; padding: 0;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden;
            font-size: 16px;
        }

        .skip-to-content {
            position: absolute; top: -40px; left: 6px;
            background: var(--primary-color); color: white;
            padding: 8px; border-radius: 4px; text-decoration: none;
            transition: top 0.3s; z-index: 1001;
        }
        .skip-to-content:focus { top: 6px; }

        /* ─── Container ─── */
        .container { max-width: var(--container-max-width); margin: 0 auto; padding: 0 24px; width: 100%; }

        /* ─── Loading Overlay ─── */
        .loading-overlay {
            position: fixed; inset: 0; background: rgba(255,255,255,0.95);
            display: flex; align-items: center; justify-content: center;
            z-index: 9999; transition: opacity 0.4s ease, visibility 0.4s ease;
        }
        .loading-overlay.hidden { opacity: 0; visibility: hidden; pointer-events: none; }
        .spinner {
            width: 48px; height: 48px; border-radius: 50%;
            border: 4px solid var(--border-color);
            border-top-color: var(--primary-color);
            animation: spin 0.8s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* ─── Header ─── */
        header {
            background-color: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            position: fixed; width: 100%; top: 0; left: 0;
            z-index: 1000; box-shadow: var(--shadow-light);
            transition: var(--transition);
        }
        header.scrolled { box-shadow: var(--shadow-medium); background-color: rgba(255,255,255,0.98); }
        .header-container {
            display: flex; justify-content: space-between; align-items: center;
            padding: 16px 0; min-height: 70px;
        }
        .logo { display: flex; align-items: center; text-decoration: none; transition: var(--transition); }
        .logo:hover { transform: scale(1.05); }
        .logo span { font-size: 28px; font-weight: 600; color: var(--text-color); margin-left: 12px; }
        .logo .highlight { color: var(--primary-color); }

        .nav-links { display: flex; list-style: none; margin: 0; padding: 0; gap: 32px; }
        .nav-links li a {
            color: var(--text-color); text-decoration: none;
            font-weight: 500; font-size: 16px;
            position: relative; transition: var(--transition); padding: 8px 0;
        }
        .nav-links li a:hover,
        .nav-links li a.active { color: var(--primary-color); }
        .nav-links li a::after {
            content: ''; position: absolute; width: 0; height: 2px;
            bottom: 0; left: 0;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-light));
            transition: var(--transition);
        }
        .nav-links li a:hover::after,
        .nav-links li a.active::after { width: 100%; }

        /* Services Dropdown */
        .nav-dropdown { position: relative; }
        .nav-dropdown-menu {
            display: none; position: absolute;
            top: calc(100% + 12px); left: 50%; transform: translateX(-50%);
            background: var(--surface-color); border-radius: var(--border-radius);
            box-shadow: var(--shadow-heavy); border: 1px solid var(--border-color);
            min-width: 260px; z-index: 999; padding: 8px 0;
            animation: dropdownFade 0.25s ease;
        }
        @keyframes dropdownFade {
            from { opacity: 0; transform: translateX(-50%) translateY(-10px); }
            to   { opacity: 1; transform: translateX(-50%) translateY(0); }
        }
        .nav-dropdown:hover .nav-dropdown-menu { display: block; }
        .nav-dropdown-menu a {
            display: flex; align-items: center; gap: 12px;
            padding: 12px 20px; color: var(--text-color); text-decoration: none;
            font-size: 14px; font-weight: 500; transition: var(--transition);
        }
        .nav-dropdown-menu a:hover { background: rgba(67,97,238,0.05); color: var(--primary-color); }
        .nav-dropdown-menu a i { width: 22px; color: var(--primary-color); font-size: 14px; }
        .nav-dropdown > a::after { display: none !important; }

        .nav-buttons { display: flex; align-items: center; gap: 16px; }

        /* ─── Buttons ─── */
        .btn {
            padding: 12px 24px; border-radius: var(--border-radius);
            font-weight: 500; text-decoration: none; transition: var(--transition);
            display: inline-flex; align-items: center; justify-content: center;
            gap: 8px; font-size: 16px; cursor: pointer; border: none;
            position: relative; overflow: hidden; font-family: 'Poppins', sans-serif;
        }
        .btn::before {
            content: ''; position: absolute; top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        .btn:hover::before { left: 100%; }
        .primary-btn {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: white; box-shadow: var(--shadow-light);
        }
        .primary-btn:hover { transform: translateY(-2px); box-shadow: var(--shadow-medium); }
        .secondary-btn {
            background-color: transparent;
            color: var(--primary-color); border: 2px solid var(--primary-color);
        }
        .secondary-btn:hover { background-color: var(--primary-color); color: white; transform: translateY(-2px); }

        /* Mobile Menu */
        .mobile-menu-btn {
            display: none; background: none; border: none; cursor: pointer;
            width: 44px; height: 44px; position: relative; z-index: 1001;
            justify-content: center; align-items: center; flex-direction: column;
        }
        .mobile-menu-btn span {
            display: block; width: 25px; height: 3px;
            background-color: var(--text-color); margin: 3px 0;
            transition: var(--transition); border-radius: 2px;
        }

        /* ─── Fade-in animation ─── */
        .fade-in { opacity: 0; transform: translateY(24px); transition: opacity 0.6s ease, transform 0.6s ease; }
        .fade-in.visible { opacity: 1; transform: translateY(0); }

        /* ─── Page Hero ─── */
        .page-hero {
            padding: 140px 0 80px;
            position: relative; overflow: hidden;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 50%, #f1f3f4 100%);
            text-align: center;
        }
        .page-hero::before {
            content: ''; position: absolute; inset: 0;
            background-image:
                radial-gradient(circle at 15% 50%, rgba(67,97,238,0.10) 0%, transparent 50%),
                radial-gradient(circle at 85% 20%, rgba(255,190,11,0.10) 0%, transparent 50%);
            pointer-events: none;
        }
        .page-hero-content { position: relative; z-index: 1; }
        .breadcrumb {
            display: inline-flex; align-items: center; gap: 8px;
            background: var(--surface-color); padding: 10px 20px;
            border-radius: 30px; font-size: 14px; font-weight: 500;
            box-shadow: var(--shadow-light); margin-bottom: 28px;
            border: 1px solid var(--border-color);
        }
        .breadcrumb a { color: var(--primary-color); text-decoration: none; transition: var(--transition); }
        .breadcrumb a:hover { color: var(--primary-dark); }
        .breadcrumb .sep { color: var(--text-muted); }
        .breadcrumb .current { color: var(--text-light); }
        .page-hero h1 {
            font-size: clamp(2.2rem, 5vw, 3.4rem);
            font-weight: 700; margin: 0 0 20px; line-height: 1.2;
        }
        .page-hero p {
            font-size: 18px; color: var(--text-light);
            max-width: 680px; margin: 0 auto 36px; line-height: 1.7;
        }
        .highlight {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .hero-badges {
            display: flex; align-items: center; justify-content: center;
            gap: 16px; flex-wrap: wrap;
        }
        .hero-badge {
            display: inline-flex; align-items: center; gap: 8px;
            background: var(--surface-color); padding: 10px 20px;
            border-radius: 30px; font-size: 14px; font-weight: 600;
            border: 1px solid var(--border-color); box-shadow: var(--shadow-light);
            color: var(--text-color);
        }
        .hero-badge i { color: var(--primary-color); }

        /* ─── Section Shared ─── */
        .section-label {
            display: inline-block;
            background: linear-gradient(135deg, rgba(67,97,238,0.1), rgba(67,97,238,0.05));
            color: var(--primary-color); font-size: 13px; font-weight: 600;
            letter-spacing: 1.5px; text-transform: uppercase;
            padding: 6px 16px; border-radius: 30px; margin-bottom: 18px;
            border: 1px solid rgba(67,97,238,0.15);
        }
        .section-title {
            text-align: center;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700; margin-bottom: 20px;
        }
        .section-subtitle {
            text-align: center; font-size: 18px; color: var(--text-light);
            max-width: 700px; margin: 0 auto 70px; line-height: 1.7;
        }

        /* ─── Stats Band ─── */
        .stats-band {
            padding: 60px 0;
            background: linear-gradient(135deg, var(--primary-color) 0%, #1e3c72 100%);
            position: relative; overflow: hidden;
        }
        .stats-band::before {
            content: ''; position: absolute; inset: 0;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(255,255,255,0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 50%, rgba(255,190,11,0.08) 0%, transparent 50%);
        }
        .stats-grid {
            display: grid; grid-template-columns: repeat(4,1fr);
            gap: 0; position: relative; z-index: 1;
        }
        .stat-item {
            text-align: center; padding: 40px 20px;
            border-right: 1px solid rgba(255,255,255,0.12);
        }
        .stat-item:last-child { border-right: none; }
        .stat-item i { font-size: 36px; color: var(--secondary-color); margin-bottom: 16px; display: block; }
        .stat-item .stat-number {
            font-size: clamp(2rem,4vw,3rem); font-weight: 800; color: white;
            display: block; line-height: 1; margin-bottom: 10px;
        }
        .stat-item .stat-label { font-size: 15px; color: rgba(255,255,255,0.75); font-weight: 500; }

        /* ═══════════════════════════════════════════
           FEATURED NEWS
           ═══════════════════════════════════════════ */
        .featured-section {
            padding: 80px 0 60px;
            background: var(--surface-color);
        }
        .featured-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-heavy);
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }
        .featured-card:hover { transform: translateY(-6px); box-shadow: 0 25px 50px rgba(0,0,0,0.12); }

        .featured-image {
            position: relative;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 40%, #0f3460 100%);
            min-height: 400px;
            display: flex; align-items: center; justify-content: center;
            overflow: hidden;
        }
        .featured-image img {
            width: 100%; height: 100%; object-fit: cover;
            position: absolute; inset: 0;
        }
        .featured-image-placeholder {
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            width: 100%; height: 100%; min-height: 400px; position: relative; z-index: 1;
        }
        .featured-image-placeholder i { font-size: 80px; color: rgba(255,255,255,0.15); margin-bottom: 16px; }
        .featured-image-badge {
            position: absolute; top: 24px; left: 24px;
            background: var(--secondary-color); color: #1a1a1a;
            font-size: 12px; font-weight: 700; padding: 6px 14px;
            border-radius: 30px; letter-spacing: 1px; text-transform: uppercase;
            z-index: 2; display: flex; align-items: center; gap: 6px;
        }

        .featured-body {
            padding: 48px 44px;
            display: flex; flex-direction: column; justify-content: center;
            background: var(--surface-color);
        }
        .featured-meta {
            display: flex; align-items: center; gap: 16px;
            flex-wrap: wrap; margin-bottom: 20px;
        }
        .cat-tag {
            display: inline-flex; align-items: center; gap: 6px;
            font-size: 12px; font-weight: 600; padding: 5px 12px;
            border-radius: 20px; text-transform: uppercase; letter-spacing: 0.5px;
        }
        .cat-tag i { font-size: 11px; }
        .meta-date { font-size: 13px; color: var(--text-muted); display: flex; align-items: center; gap: 6px; }
        .meta-date i { color: var(--primary-color); font-size: 12px; }
        .featured-body h2 {
            font-size: clamp(1.4rem, 2.5vw, 2rem);
            font-weight: 700; color: var(--text-color);
            margin: 0 0 18px; line-height: 1.3;
        }
        .featured-body p {
            font-size: 15px; color: var(--text-light); line-height: 1.8;
            margin: 0 0 28px;
            display: -webkit-box; -webkit-line-clamp: 4;
            -webkit-box-orient: vertical; overflow: hidden;
        }
        .read-more-btn {
            display: inline-flex; align-items: center; gap: 8px;
            color: var(--primary-color); font-weight: 600; font-size: 15px;
            text-decoration: none; transition: var(--transition);
            align-self: flex-start;
        }
        .read-more-btn i { transition: transform 0.3s ease; }
        .read-more-btn:hover { color: var(--primary-dark); }
        .read-more-btn:hover i { transform: translateX(6px); }

        /* ═══════════════════════════════════════════
           CATEGORY FILTER TABS
           ═══════════════════════════════════════════ */
        .filter-section {
            padding: 50px 0 30px;
            background: var(--background-color);
        }
        .filter-tabs {
            display: flex; align-items: center; gap: 10px;
            flex-wrap: wrap; justify-content: center;
        }
        .filter-tab {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 10px 20px; border-radius: 30px; font-size: 14px;
            font-weight: 500; cursor: pointer; transition: var(--transition);
            border: 2px solid var(--border-color);
            background: var(--surface-color); color: var(--text-light);
            font-family: 'Poppins', sans-serif;
        }
        .filter-tab i { font-size: 13px; }
        .filter-tab:hover { border-color: var(--primary-color); color: var(--primary-color); }
        .filter-tab.active {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            border-color: transparent; color: white;
            box-shadow: 0 4px 15px rgba(67,97,238,0.35);
        }

        /* ─── Search bar ─── */
        .search-wrap {
            margin-bottom: 32px;
            display: flex; justify-content: center;
        }
        .search-bar {
            display: flex; align-items: center; gap: 0;
            background: var(--surface-color);
            border: 2px solid var(--border-color);
            border-radius: 50px; overflow: hidden;
            width: 100%; max-width: 520px;
            transition: border-color 0.3s ease;
        }
        .search-bar:focus-within { border-color: var(--primary-color); }
        .search-bar i { padding: 0 16px; color: var(--text-muted); font-size: 16px; }
        .search-bar input {
            flex: 1; border: none; outline: none;
            font-family: 'Poppins', sans-serif; font-size: 15px;
            color: var(--text-color); padding: 14px 0; background: transparent;
        }
        .search-bar input::placeholder { color: var(--text-muted); }
        .search-clear {
            padding: 0 18px; font-size: 14px; color: var(--text-muted);
            cursor: pointer; transition: var(--transition); display: none;
        }
        .search-clear:hover { color: var(--error-color); }

        /* ═══════════════════════════════════════════
           NEWS GRID
           ═══════════════════════════════════════════ */
        .news-section {
            padding: 30px 0 100px;
            background: var(--background-color);
        }
        .news-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
            margin-bottom: 60px;
        }
        .news-card {
            background: var(--surface-color);
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-light);
            transition: var(--transition);
            display: flex; flex-direction: column;
        }
        .news-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-heavy); }
        .news-card.hidden { display: none; }

        .news-card-img {
            height: 190px; position: relative; overflow: hidden;
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .news-card-img img { width: 100%; height: 100%; object-fit: cover; }
        .news-card-img-placeholder { font-size: 52px; color: rgba(255,255,255,0.12); }
        .news-card-img::after {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(to bottom, transparent 40%, rgba(0,0,0,0.35));
        }
        .news-card-cat-overlay {
            position: absolute; bottom: 14px; left: 14px; z-index: 2;
        }

        .news-card-body {
            padding: 24px; flex: 1; display: flex; flex-direction: column;
        }
        .news-card-meta {
            display: flex; align-items: center; justify-content: space-between;
            flex-wrap: wrap; gap: 8px; margin-bottom: 14px;
        }
        .news-card-date { font-size: 12px; color: var(--text-muted); display: flex; align-items: center; gap: 5px; }
        .news-card-date i { font-size: 11px; color: var(--primary-color); }

        .news-card h3 {
            font-size: 17px; font-weight: 700; color: var(--text-color);
            margin: 0 0 12px; line-height: 1.4;
            display: -webkit-box; -webkit-line-clamp: 2;
            -webkit-box-orient: vertical; overflow: hidden;
        }
        .news-card p {
            font-size: 14px; color: var(--text-light); line-height: 1.75;
            margin: 0; flex: 1;
            display: -webkit-box; -webkit-line-clamp: 3;
            -webkit-box-orient: vertical; overflow: hidden;
        }
        .news-card-footer {
            margin-top: 20px; padding-top: 18px;
            border-top: 1px solid var(--border-color);
            display: flex; align-items: center; justify-content: space-between;
        }
        .news-card-ago { font-size: 12px; color: var(--text-muted); }
        .news-card-link {
            font-size: 13px; font-weight: 600; color: var(--primary-color);
            text-decoration: none; display: flex; align-items: center; gap: 5px;
            transition: var(--transition);
        }
        .news-card-link i { font-size: 11px; transition: transform 0.3s ease; }
        .news-card-link:hover { color: var(--primary-dark); }
        .news-card-link:hover i { transform: translateX(4px); }

        /* ─── No results ─── */
        .no-results {
            text-align: center; padding: 80px 20px; display: none;
            grid-column: 1 / -1;
        }
        .no-results i { font-size: 64px; color: var(--border-color); margin-bottom: 20px; display: block; }
        .no-results h3 { font-size: 22px; color: var(--text-light); margin: 0 0 10px; }
        .no-results p { color: var(--text-muted); margin: 0; }

        /* ─── Pagination ─── */
        .pagination {
            display: flex; align-items: center; justify-content: center; gap: 8px;
            flex-wrap: wrap;
        }
        .page-btn {
            width: 42px; height: 42px; border-radius: 10px;
            border: 2px solid var(--border-color);
            background: var(--surface-color); color: var(--text-light);
            font-family: 'Poppins', sans-serif; font-size: 14px; font-weight: 600;
            cursor: pointer; transition: var(--transition);
            display: flex; align-items: center; justify-content: center;
        }
        .page-btn:hover { border-color: var(--primary-color); color: var(--primary-color); }
        .page-btn.active {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            border-color: transparent; color: white;
            box-shadow: 0 4px 12px rgba(67,97,238,0.35);
        }
        .page-btn:disabled { opacity: 0.4; cursor: not-allowed; }

        /* ═══════════════════════════════════════════
           NEWSLETTER / CTA BAND
           ═══════════════════════════════════════════ */
        .newsletter-section {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--primary-color) 0%, #1e3c72 100%);
            position: relative; overflow: hidden; text-align: center;
        }
        .newsletter-section::before {
            content: ''; position: absolute; inset: 0;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(255,255,255,0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 30%, rgba(255,190,11,0.08) 0%, transparent 50%);
        }
        .newsletter-inner { position: relative; z-index: 1; max-width: 640px; margin: 0 auto; }
        .newsletter-inner .section-label { background: rgba(255,255,255,0.15); border-color: rgba(255,255,255,0.25); color: white; }
        .newsletter-inner h2 { font-size: clamp(1.8rem,4vw,2.6rem); font-weight: 700; color: white; margin: 0 0 16px; }
        .newsletter-inner p { font-size: 16px; color: rgba(255,255,255,0.8); margin: 0 0 32px; line-height: 1.7; }
        .newsletter-form {
            display: flex; gap: 0; max-width: 480px; margin: 0 auto;
            border-radius: 50px; overflow: hidden;
            box-shadow: 0 8px 30px rgba(0,0,0,0.2);
        }
        .newsletter-form input {
            flex: 1; border: none; outline: none; padding: 16px 24px;
            font-family: 'Poppins', sans-serif; font-size: 15px;
            background: white; color: var(--text-color);
        }
        .newsletter-form input::placeholder { color: var(--text-muted); }
        .newsletter-form button {
            background: var(--secondary-color); color: #1a1a1a;
            border: none; padding: 16px 28px; font-family: 'Poppins', sans-serif;
            font-size: 15px; font-weight: 700; cursor: pointer;
            transition: var(--transition); white-space: nowrap;
        }
        .newsletter-form button:hover { background: #e6ab00; }
        .newsletter-note { font-size: 13px; color: rgba(255,255,255,0.6); margin-top: 16px; }

        /* ═══════════════════════════════════════════
           FOOTER  —  identical to other pages
           ═══════════════════════════════════════════ */
        .footer {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            padding: 80px 0 0; color: #dfe6e9;
        }
        .footer-top { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 60px; padding-bottom: 60px; }
        .footer-logo { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; }
        .footer-logo span { font-size: 24px; font-weight: 700; color: white; }
        .footer-logo .highlight { color: var(--primary-color); }
        .footer-column > p { font-size: 14px; color: #b2bec3; line-height: 1.8; margin: 0 0 24px; }
        .footer-social { display: flex; gap: 12px; }
        .social-icon {
            width: 40px; height: 40px; border-radius: 10px;
            background: rgba(255,255,255,0.08);
            display: flex; align-items: center; justify-content: center;
            color: #b2bec3; text-decoration: none; transition: var(--transition);
            font-size: 16px;
        }
        .social-icon:hover { background: var(--primary-color); color: white; transform: translateY(-3px); }
        .footer-column h3 { color: white; font-size: 18px; font-weight: 600; margin: 0 0 24px; position: relative; padding-bottom: 12px; }
        .footer-column h3::after {
            content: ''; position: absolute; bottom: 0; left: 0;
            width: 40px; height: 2px;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-light));
        }
        .footer-links { list-style: none; padding: 0; margin: 0; }
        .footer-links li { margin-bottom: 12px; }
        .footer-links a {
            color: #b2bec3; text-decoration: none; font-size: 14px;
            transition: var(--transition); display: flex; align-items: center; gap: 8px;
        }
        .footer-links a::before { content: '›'; color: var(--primary-color); font-weight: 700; }
        .footer-links a:hover { color: white; padding-left: 6px; }
        .footer-contact { list-style: none; padding: 0; margin: 0; }
        .footer-contact li {
            display: flex; align-items: flex-start; gap: 12px;
            margin-bottom: 16px; font-size: 14px; color: #b2bec3;
        }
        .footer-contact i { color: var(--primary-color); margin-top: 2px; width: 16px; flex-shrink: 0; }
        .footer-whatsapp {
            display: inline-flex; align-items: center; gap: 8px;
            background: #25d366; color: white;
            padding: 10px 20px; border-radius: 25px; text-decoration: none;
            font-size: 14px; font-weight: 500; transition: var(--transition); margin-top: 8px;
        }
        .footer-whatsapp:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(37,211,102,0.3); }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1); padding: 30px 0;
            display: flex; justify-content: space-between; align-items: center;
            flex-wrap: wrap; gap: 20px;
        }
        .copyright p { margin: 0; color: #b2bec3; font-size: 14px; }
        .footer-bottom-links { display: flex; gap: 24px; flex-wrap: wrap; }
        .footer-bottom-links a { color: #b2bec3; text-decoration: none; font-size: 14px; transition: var(--transition); }
        .footer-bottom-links a:hover { color: var(--primary-color); }

        /* ─── Floating elements ─── */
        .floating-whatsapp {
            position: fixed; bottom: 30px; left: 30px; z-index: 900;
            width: 58px; height: 58px; border-radius: 50%;
            background: #25d366; color: white;
            display: flex; align-items: center; justify-content: center;
            font-size: 24px; text-decoration: none; box-shadow: 0 4px 20px rgba(37,211,102,0.5);
            transition: var(--transition);
        }
        .floating-whatsapp:hover { transform: scale(1.1); box-shadow: 0 8px 30px rgba(37,211,102,0.6); }
        #back-to-top {
            position: fixed; bottom: 30px; right: 30px; z-index: 900;
            width: 58px; height: 58px; border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: white; border: none; cursor: pointer; font-size: 22px;
            display: none; align-items: center; justify-content: center;
            box-shadow: var(--shadow-medium); transition: var(--transition);
        }
        #back-to-top.visible { display: flex; }
        #back-to-top:hover { transform: translateY(-4px); box-shadow: var(--shadow-heavy); }

        /* ═══════════════════════════════════════════
           RESPONSIVE
           ═══════════════════════════════════════════ */
        @media (max-width: 1200px) {
            .container { padding: 0 20px; }
            .footer-top { grid-template-columns: 1fr 1fr; }
            .news-grid { grid-template-columns: repeat(2,1fr); }
        }
        @media (max-width: 992px) {
            .featured-card { grid-template-columns: 1fr; }
            .featured-image { min-height: 280px; }
            .featured-image-placeholder { min-height: 280px; }
        }
        @media (max-width: 768px) {
            .nav-links {
                display: none; position: fixed; top: 0; left: 0;
                width: 100%; height: 100vh;
                background: rgba(255,255,255,0.98); backdrop-filter: blur(10px);
                flex-direction: column; align-items: center; justify-content: center;
                z-index: 1000; gap: 32px;
            }
            .nav-links.active { display: flex; }
            .nav-links li a { font-size: 24px; font-weight: 600; }
            .mobile-menu-btn { display: flex; }
            .mobile-menu-btn.active span:nth-child(1) { transform: rotate(45deg) translate(6px,6px); }
            .mobile-menu-btn.active span:nth-child(2) { opacity: 0; transform: translateX(20px); }
            .mobile-menu-btn.active span:nth-child(3) { transform: rotate(-45deg) translate(6px,-6px); }
            .nav-buttons { display: none; }
            .stats-grid { grid-template-columns: repeat(2,1fr); }
            .stat-item { border-right: none; border-bottom: 1px solid rgba(255,255,255,0.12); }
            .stat-item:nth-child(odd) { border-right: 1px solid rgba(255,255,255,0.12); }
            .stat-item:last-child, .stat-item:nth-last-child(2):nth-child(odd) { border-bottom: none; }
            .news-grid { grid-template-columns: 1fr; gap: 20px; }
            .footer-top { grid-template-columns: 1fr; gap: 40px; }
            .footer-bottom { flex-direction: column; text-align: center; }
            .newsletter-form { flex-direction: column; border-radius: var(--border-radius); }
            .newsletter-form input { border-radius: var(--border-radius) var(--border-radius) 0 0; }
            .newsletter-form button { border-radius: 0 0 var(--border-radius) var(--border-radius); }
            .floating-whatsapp, #back-to-top { width: 50px; height: 50px; font-size: 20px; }
        }
        @media (max-width: 480px) {
            .container { padding: 0 16px; }
            .stats-grid { grid-template-columns: 1fr; }
            .stat-item { border-right: none !important; border-bottom: 1px solid rgba(255,255,255,0.12); }
            .stat-item:last-child { border-bottom: none; }
            .hero-badges { flex-direction: column; align-items: center; }
            .featured-body { padding: 28px 22px; }
            .filter-tabs { gap: 8px; }
            .filter-tab { padding: 8px 14px; font-size: 13px; }
        }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body>


    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay"><div class="spinner"></div></div>

    <!-- ─── HEADER ─── -->
    <header id="header" role="banner">
        <div class="container">
            <div class="header-container">
                <!-- Logo -->
                <a href="index.php" class="logo" aria-label="<?php echo htmlspecialchars($site_name); ?> Homepage">
                    <svg id="print-portal-logo" width="50" height="50" viewBox="0 0 60 60" aria-hidden="true">
                        <defs>
                            <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#4361ee;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#3a56d5;stop-opacity:1" />
                            </linearGradient>
                            <filter id="shadow" x="-20%" y="-20%" width="140%" height="140%">
                                <feGaussianBlur in="SourceAlpha" stdDeviation="3" />
                                <feOffset dx="0" dy="2" result="offsetblur" />
                                <feComponentTransfer><feFuncA type="linear" slope="0.3" /></feComponentTransfer>
                                <feMerge><feMergeNode /><feMergeNode in="SourceGraphic" /></feMerge>
                            </filter>
                        </defs>
                        <circle cx="30" cy="30" r="28" fill="url(#grad1)" filter="url(#shadow)" />
                        <rect x="16" y="16" width="28" height="28" rx="3" fill="none" stroke="#ffffff" stroke-width="2.5" />
                        <path d="M21,22 L39,22" stroke="#ffffff" stroke-width="2" stroke-linecap="round" />
                        <path d="M21,28 L39,28" stroke="#ffffff" stroke-width="2" stroke-linecap="round" />
                        <path d="M21,34 L34,34" stroke="#ffffff" stroke-width="2" stroke-linecap="round" />
                        <path d="M21,40 L30,40" stroke="#ffffff" stroke-width="2" stroke-linecap="round" />
                        <circle cx="30" cy="30" r="14" fill="none" stroke="#ffbe0b" stroke-width="1.5" stroke-dasharray="4,2" />
                        <path d="M42,18 L44,20 L42,22" stroke="#ffbe0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>Print<span class="highlight">Portal</span></span>
                </a>

                <!-- Nav -->
                <nav role="navigation" aria-label="Main navigation">
                    <ul class="nav-links" id="navLinks">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="how-it-works.php">How It Works</a></li>
                        <li class="nav-dropdown">
                            <a href="#" aria-haspopup="true" aria-expanded="false">
                                Our Services <i class="fas fa-chevron-down" style="font-size:10px;margin-left:4px;transition:transform 0.3s;"></i>
                            </a>
                            <div class="nav-dropdown-menu" role="menu">
                                <a href="services/aadhaar-titan-print.php" role="menuitem"><i class="fas fa-fingerprint"></i> Aadhaar Titan Print</a>
                                <a href="services/voter-id-print.php" role="menuitem"><i class="fas fa-vote-yea"></i> Voter ID Card Print</a>
                                <a href="services/driving-license-print.php" role="menuitem"><i class="fas fa-car"></i> Driving License Print</a>
                                <a href="services/pan-find-portal.php" role="menuitem"><i class="fas fa-search"></i> PAN No. Find Portal</a>
                                <a href="services/rc-titan-print.php" role="menuitem"><i class="fas fa-truck"></i> RC Titan Print</a>
                                <a href="services/csc-titan-print.php" role="menuitem"><i class="fas fa-network-wired"></i> CSC Titan Print</a>
                            </div>
                        </li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="about.php">About Us</a></li>
                    </ul>
                </nav>

                <div class="nav-buttons">
                    <a href="dashboard/login.php" class="btn secondary-btn" aria-label="Login to your account">
                        <i class="fa fa-key" aria-hidden="true"></i> Login
                    </a>
                    <a href="dashboard/register.php" class="btn primary-btn" aria-label="Create new account">
                        Register
                    </a>
                </div>

                <button class="mobile-menu-btn" aria-label="Toggle mobile menu" aria-expanded="false">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </header>

    <!-- ─── MAIN CONTENT ─── -->
    <main id="main-content">

        <!-- ─── PAGE HERO ─── -->
        <section class="page-hero">
            <div class="container">
                <div class="page-hero-content fade-in">
                    <div class="breadcrumb">
                        <a href="index.php"><i class="fas fa-home"></i> Home</a>
                        <span class="sep"><i class="fas fa-chevron-right" style="font-size:10px;"></i></span>
                        <span class="current">Latest News</span>
                    </div>
                    <h1>Latest <span class="highlight">News &amp; Updates</span></h1>
                    <p>Stay informed with the latest changes in Aadhaar printing, PAN, Voter ID, Driving License policies, and portal feature updates — all in one place for operators across India.</p>
                    <div class="hero-badges">
                        <span class="hero-badge"><i class="fas fa-newspaper"></i> <?php echo count($news_items) + ($featured ? 1 : 0); ?> Articles</span>
                        <span class="hero-badge"><i class="fas fa-sync-alt"></i> Regularly Updated</span>
                        <span class="hero-badge"><i class="fas fa-bell"></i> Operator Alerts</span>
                        <span class="hero-badge"><i class="fas fa-shield-alt"></i> Verified Updates</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── STATS BAND ─── -->
        <section class="stats-band" aria-label="Portal statistics">
            <div class="container">
                <div class="stats-grid">
                    <div class="stat-item fade-in">
                        <i class="fas fa-newspaper" aria-hidden="true"></i>
                        <span class="stat-number"><?php echo count($news_items) + ($featured ? 1 : 0); ?>+</span>
                        <span class="stat-label">News Articles</span>
                    </div>
                    <div class="stat-item fade-in">
                        <i class="fas fa-tags" aria-hidden="true"></i>
                        <span class="stat-number"><?php echo count($categories); ?></span>
                        <span class="stat-label">Categories</span>
                    </div>
                    <div class="stat-item fade-in">
                        <i class="fas fa-users" aria-hidden="true"></i>
                        <span class="stat-number">50K+</span>
                        <span class="stat-label">Operators Reading</span>
                    </div>
                    <div class="stat-item fade-in">
                        <i class="fas fa-clock" aria-hidden="true"></i>
                        <span class="stat-number">Daily</span>
                        <span class="stat-label">New Updates</span>
                    </div>
                </div>
            </div>
        </section>

        <?php if ($featured): ?>
        <!-- ─── FEATURED NEWS ─── -->
        <section class="featured-section">
            <div class="container">
                <div style="text-align:center;margin-bottom:40px;">
                    <span class="section-label"><i class="fas fa-star" style="margin-right:6px;"></i> Featured Story</span>
                </div>
                <a href="<?php echo htmlspecialchars($featured['slug']); ?>" class="featured-card fade-in" style="text-decoration:none;color:inherit;display:grid;">
                    <!-- Image -->
                    <div class="featured-image">
                        <?php if (!empty($featured['image'])): ?>
                            <img src="<?php echo htmlspecialchars($featured['image']); ?>"
                                 alt="<?php echo htmlspecialchars($featured['title']); ?>"
                                 loading="lazy">
                        <?php else: ?>
                            <div class="featured-image-placeholder">
                                <i class="fas fa-<?php echo cat_icon($featured['category'], $cat_icons); ?>" aria-hidden="true"></i>
                            </div>
                        <?php endif; ?>
                        <div class="featured-image-badge">
                            <i class="fas fa-star"></i> Featured
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="featured-body">
                        <div class="featured-meta">
                            <?php
                                $fc = cat_color($featured['category'], $cat_colors);
                                $fi = cat_icon($featured['category'], $cat_icons);
                            ?>
                            <span class="cat-tag" style="background:<?php echo $fc; ?>18;color:<?php echo $fc; ?>;">
                                <i class="fas fa-<?php echo $fi; ?>"></i>
                                <?php echo htmlspecialchars($featured['category']); ?>
                            </span>
                            <span class="meta-date">
                                <i class="fas fa-calendar-alt"></i>
                                <?php echo fmt_date($featured['published_at']); ?>
                            </span>
                        </div>
                        <h2><?php echo htmlspecialchars($featured['title']); ?></h2>
                        <p><?php echo htmlspecialchars($featured['summary']); ?></p>
                        <span class="read-more-btn">
                            Read Full Story <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>
                </a>
            </div>
        </section>
        <?php endif; ?>

        <!-- ─── FILTER + SEARCH ─── -->
        <section class="filter-section">
            <div class="container">
                <!-- Search -->
                <div class="search-wrap">
                    <div class="search-bar">
                        <i class="fas fa-search" aria-hidden="true"></i>
                        <input type="text" id="newsSearch" placeholder="Search news, keywords, categories…" aria-label="Search news">
                        <span class="search-clear" id="searchClear" role="button" tabindex="0" aria-label="Clear search">✕</span>
                    </div>
                </div>

                <!-- Category Tabs -->
                <div class="filter-tabs" id="filterTabs" role="tablist" aria-label="Filter by category">
                    <?php foreach ($categories as $cat): ?>
                    <button class="filter-tab <?php echo $cat === 'All' ? 'active' : ''; ?>"
                            data-cat="<?php echo htmlspecialchars($cat); ?>"
                            role="tab"
                            aria-selected="<?php echo $cat === 'All' ? 'true' : 'false'; ?>"
                            aria-label="Filter by <?php echo htmlspecialchars($cat); ?>">
                        <i class="fas fa-<?php echo cat_icon($cat, $cat_icons); ?>"></i>
                        <?php echo htmlspecialchars($cat); ?>
                    </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ─── NEWS GRID ─── -->
        <section class="news-section">
            <div class="container">
                <div class="news-grid" id="newsGrid">

                    <?php if (!empty($news_items)): ?>
                        <?php foreach ($news_items as $item): ?>
                        <?php
                            $ic  = cat_icon($item['category'], $cat_icons);
                            $cc  = cat_color($item['category'], $cat_colors);
                        ?>
                        <article class="news-card fade-in"
                                 data-cat="<?php echo htmlspecialchars($item['category']); ?>"
                                 data-title="<?php echo htmlspecialchars(strtolower($item['title'])); ?>"
                                 data-summary="<?php echo htmlspecialchars(strtolower($item['summary'])); ?>">
                            <!-- Card image -->
                            <div class="news-card-img">
                                <?php if (!empty($item['image'])): ?>
                                    <img src="<?php echo htmlspecialchars($item['image']); ?>"
                                         alt="<?php echo htmlspecialchars($item['title']); ?>"
                                         loading="lazy">
                                <?php else: ?>
                                    <span class="news-card-img-placeholder" aria-hidden="true">
                                        <i class="fas fa-<?php echo $ic; ?>"></i>
                                    </span>
                                <?php endif; ?>
                                <!-- Category overlay on image -->
                                <div class="news-card-cat-overlay">
                                    <span class="cat-tag" style="background:<?php echo $cc; ?>;color:#fff;font-size:11px;">
                                        <i class="fas fa-<?php echo $ic; ?>"></i>
                                        <?php echo htmlspecialchars($item['category']); ?>
                                    </span>
                                </div>
                            </div>

                            <!-- Card body -->
                            <div class="news-card-body">
                                <div class="news-card-meta">
                                    <span class="news-card-date">
                                        <i class="fas fa-calendar-alt"></i>
                                        <?php echo fmt_date($item['published_at']); ?>
                                    </span>
                                </div>
                                <h3><?php echo htmlspecialchars($item['title']); ?></h3>
                                <p><?php echo htmlspecialchars($item['summary']); ?></p>
                                <div class="news-card-footer">
                                    <span class="news-card-ago">
                                        <i class="fas fa-clock" style="color:var(--primary-color);font-size:11px;margin-right:4px;"></i>
                                        <?php echo days_ago($item['published_at']); ?>
                                    </span>
                                    <a href="<?php echo htmlspecialchars($item['slug']); ?>" class="news-card-link">
                                        Read More <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <!-- No results (shown by JS) -->
                    <div class="no-results" id="noResults" aria-live="polite">
                        <i class="fas fa-search" aria-hidden="true"></i>
                        <h3>No articles found</h3>
                        <p>Try a different keyword or select another category.</p>
                    </div>
                </div>

                <!-- Pagination (shown by JS) -->
                <nav class="pagination" id="pagination" aria-label="News pagination"></nav>
            </div>
        </section>

        <!-- ─── NEWSLETTER CTA ─── -->
        <section class="newsletter-section">
            <div class="container">
                <div class="newsletter-inner fade-in">
                    <span class="section-label"><i class="fas fa-bell" style="margin-right:6px;"></i> Stay Updated</span>
                    <h2>Get Operator Alerts &amp; News</h2>
                    <p>Subscribe to receive instant notifications whenever UIDAI, Election Commission, or <?php echo htmlspecialchars($site_name); ?> publish important updates affecting your business.</p>
                    <div class="newsletter-form" role="form" aria-label="Subscribe to newsletter">
                        <input type="email" id="newsletterEmail" placeholder="Enter your email address" aria-label="Your email address">
                        <button type="button" onclick="subscribeNewsletter()">
                            <i class="fas fa-paper-plane" style="margin-right:6px;"></i> Subscribe
                        </button>
                    </div>
                    <p class="newsletter-note"><i class="fas fa-lock" style="margin-right:4px;"></i> No spam, ever. Unsubscribe anytime.</p>
                </div>
            </div>
        </section>

    </main>

    <!-- ─── FOOTER ─── -->
    <footer class="footer" role="contentinfo">
        <div class="container">
            <div class="footer-top">
                <div class="footer-column">
                    <div class="footer-logo">
                        <svg width="40" height="40" viewBox="0 0 50 50" aria-hidden="true">
                            <circle cx="25" cy="25" r="23" fill="#4361ee" />
                            <path d="M15,15 L35,15 L35,35 L15,35 Z" fill="none" stroke="#ffffff" stroke-width="3" />
                            <path d="M18,20 L32,20" stroke="#ffffff" stroke-width="2" />
                            <path d="M18,25 L32,25" stroke="#ffffff" stroke-width="2" />
                            <path d="M18,30 L28,30" stroke="#ffffff" stroke-width="2" />
                            <circle cx="25" cy="25" r="10" fill="none" stroke="#ffbe0b" stroke-width="2" stroke-dasharray="15,5" />
                        </svg>
                        <span>Print<span class="highlight">Portal</span></span>
                    </div>
                    <p>Print Aadhaar Card, Find &amp; Print PAN Card, Print Voter ID, Print Driving License and other documents to card size. Solutions for cyber cafes and service centers.</p>
                    <div class="footer-social">
                        <a href="#" class="social-icon" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="https://wa.me/91<?php echo htmlspecialchars($phone); ?>" class="social-icon" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="how-it-works.php">How It Works</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="dashboard/login.php">Login</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Our Services</h3>
                    <ul class="footer-links">
                        <li><a href="services/aadhaar-titan-print.php">Aadhaar Titan Print</a></li>
                        <li><a href="services/voter-id-print.php">Voter ID Card Print</a></li>
                        <li><a href="services/driving-license-print.php">Driving License Print</a></li>
                        <li><a href="services/pan-find-portal.php">PAN No. Find Portal</a></li>
                        <li><a href="services/rc-titan-print.php">RC Titan Print</a></li>
                        <li><a href="services/csc-titan-print.php">CSC Titan Print</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <ul class="footer-contact">
                        <li><i class="fas fa-phone"></i> +91 <?php echo htmlspecialchars($phone); ?></li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:<?php echo htmlspecialchars($email); ?>" style="color:inherit;text-decoration:none;">
                                <?php echo htmlspecialchars($email); ?>
                            </a>
                        </li>
                        <li><i class="fas fa-clock"></i> Monday-Saturday: 10 AM - 7 PM</li>
                        <li>
                            <a href="https://wa.me/91<?php echo htmlspecialchars($phone); ?>" class="footer-whatsapp">
                                <i class="fab fa-whatsapp"></i> Chat on WhatsApp
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="copyright">
                    <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($site_name); ?>. All rights reserved.</p>
                </div>
                <div class="footer-bottom-links">
                    <a href="privacy-policy.php">Privacy Policy</a>
                    <a href="term-of-use.php">Terms of Use</a>
                    <a href="latest-news.php">Latest News</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp -->
    <a href="https://wa.me/91<?php echo htmlspecialchars($phone); ?>" class="floating-whatsapp" aria-label="Chat on WhatsApp" target="_blank" rel="noopener">
        <i class="fab fa-whatsapp" aria-hidden="true"></i>
    </a>

    <!-- Back to Top -->
    <button id="back-to-top" aria-label="Back to top">
        <i class="fas fa-arrow-up" aria-hidden="true"></i>
    </button>

    <script>
    (function () {
        'use strict';

        /* ── Loading overlay ── */
        window.addEventListener('load', () => {
            const overlay = document.getElementById('loadingOverlay');
            if (overlay) setTimeout(() => overlay.classList.add('hidden'), 300);
        });

        /* ── Header scroll effect ── */
        const header = document.getElementById('header');
        window.addEventListener('scroll', () => {
            if (header) header.classList.toggle('scrolled', window.scrollY > 50);
            const btn = document.getElementById('back-to-top');
            if (btn) btn.classList.toggle('visible', window.scrollY > 400);
        }, { passive: true });

        /* ── Back to top ── */
        const backBtn = document.getElementById('back-to-top');
        if (backBtn) backBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

        /* ── Mobile menu ── */
        const menuBtn  = document.querySelector('.mobile-menu-btn');
        const navLinks = document.getElementById('navLinks');
        if (menuBtn && navLinks) {
            menuBtn.addEventListener('click', () => {
                const expanded = menuBtn.classList.toggle('active');
                navLinks.classList.toggle('active');
                menuBtn.setAttribute('aria-expanded', expanded.toString());
            });
            navLinks.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    menuBtn.classList.remove('active');
                    navLinks.classList.remove('active');
                    menuBtn.setAttribute('aria-expanded', 'false');
                });
            });
        }
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && navLinks && navLinks.classList.contains('active')) {
                menuBtn.classList.remove('active');
                navLinks.classList.remove('active');
                menuBtn.setAttribute('aria-expanded', 'false');
            }
        });
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768 && navLinks && navLinks.classList.contains('active')) {
                menuBtn.classList.remove('active');
                navLinks.classList.remove('active');
                menuBtn.setAttribute('aria-expanded', 'false');
            }
        }, { passive: true });

        /* ── Fade-in on scroll ── */
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => { if (entry.isIntersecting) entry.target.classList.add('visible'); });
        }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

        /* ══════════════════════════════════════════════
           NEWS FILTER + SEARCH + PAGINATION
           ══════════════════════════════════════════════ */
        const ITEMS_PER_PAGE = 6;
        let currentPage     = 1;
        let activeCategory  = 'All';
        let searchQuery     = '';

        const grid          = document.getElementById('newsGrid');
        const noResults     = document.getElementById('noResults');
        const pagination    = document.getElementById('pagination');
        const searchInput   = document.getElementById('newsSearch');
        const searchClear   = document.getElementById('searchClear');
        const allCards      = Array.from(document.querySelectorAll('.news-card'));

        function getFiltered() {
            return allCards.filter(card => {
                const catMatch   = activeCategory === 'All' || card.dataset.cat === activeCategory;
                const titleMatch = !searchQuery || card.dataset.title.includes(searchQuery);
                const summMatch  = !searchQuery || card.dataset.summary.includes(searchQuery);
                return catMatch && (titleMatch || summMatch);
            });
        }

        function renderPage() {
            const filtered = getFiltered();
            const totalPages = Math.max(1, Math.ceil(filtered.length / ITEMS_PER_PAGE));
            if (currentPage > totalPages) currentPage = 1;

            const start = (currentPage - 1) * ITEMS_PER_PAGE;
            const end   = start + ITEMS_PER_PAGE;

            allCards.forEach(card => {
                card.classList.add('hidden');
                card.classList.remove('visible');
            });

            if (filtered.length === 0) {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
                filtered.slice(start, end).forEach(card => {
                    card.classList.remove('hidden');
                    setTimeout(() => { observer.observe(card); }, 30);
                });
            }

            renderPagination(totalPages);
        }

        function renderPagination(totalPages) {
            pagination.innerHTML = '';
            if (totalPages <= 1) return;

            // Prev
            const prev = document.createElement('button');
            prev.className = 'page-btn';
            prev.innerHTML = '<i class="fas fa-chevron-left"></i>';
            prev.setAttribute('aria-label', 'Previous page');
            prev.disabled = currentPage === 1;
            prev.addEventListener('click', () => { currentPage--; renderPage(); window.scrollTo({ top: document.querySelector('.filter-section').offsetTop - 80, behavior: 'smooth' }); });
            pagination.appendChild(prev);

            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
                if (totalPages > 7 && Math.abs(i - currentPage) > 2 && i !== 1 && i !== totalPages) {
                    if (i === currentPage - 3 || i === currentPage + 3) {
                        const dots = document.createElement('span');
                        dots.textContent = '…';
                        dots.style.cssText = 'padding:0 8px;color:var(--text-muted);display:flex;align-items:center;';
                        pagination.appendChild(dots);
                    }
                    continue;
                }
                const btn = document.createElement('button');
                btn.className = 'page-btn' + (i === currentPage ? ' active' : '');
                btn.textContent = i;
                btn.setAttribute('aria-label', 'Page ' + i);
                btn.setAttribute('aria-current', i === currentPage ? 'page' : 'false');
                btn.addEventListener('click', () => { currentPage = i; renderPage(); window.scrollTo({ top: document.querySelector('.filter-section').offsetTop - 80, behavior: 'smooth' }); });
                pagination.appendChild(btn);
            }

            // Next
            const next = document.createElement('button');
            next.className = 'page-btn';
            next.innerHTML = '<i class="fas fa-chevron-right"></i>';
            next.setAttribute('aria-label', 'Next page');
            next.disabled = currentPage === totalPages;
            next.addEventListener('click', () => { currentPage++; renderPage(); window.scrollTo({ top: document.querySelector('.filter-section').offsetTop - 80, behavior: 'smooth' }); });
            pagination.appendChild(next);
        }

        /* ── Category filter tabs ── */
        document.querySelectorAll('.filter-tab').forEach(tab => {
            tab.addEventListener('click', () => {
                document.querySelectorAll('.filter-tab').forEach(t => {
                    t.classList.remove('active');
                    t.setAttribute('aria-selected', 'false');
                });
                tab.classList.add('active');
                tab.setAttribute('aria-selected', 'true');
                activeCategory = tab.dataset.cat;
                currentPage = 1;
                renderPage();
            });
        });

        /* ── Search ── */
        if (searchInput) {
            searchInput.addEventListener('input', () => {
                searchQuery = searchInput.value.trim().toLowerCase();
                searchClear.style.display = searchQuery ? 'block' : 'none';
                currentPage = 1;
                renderPage();
            });
        }
        if (searchClear) {
            searchClear.addEventListener('click', () => {
                searchInput.value = '';
                searchQuery = '';
                searchClear.style.display = 'none';
                searchInput.focus();
                currentPage = 1;
                renderPage();
            });
            searchClear.addEventListener('keydown', (e) => { if (e.key === 'Enter') searchClear.click(); });
        }

        /* Initial render */
        renderPage();

    })();

    /* ── Newsletter subscribe ── */
    function subscribeNewsletter() {
        const emailInput = document.getElementById('newsletterEmail');
        const email = emailInput ? emailInput.value.trim() : '';
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            emailInput.style.borderLeft = '4px solid #ef476f';
            emailInput.focus();
            setTimeout(() => { emailInput.style.borderLeft = ''; }, 2000);
            return;
        }
        // You can wire this to a server-side AJAX call
        // fetch('api/subscribe.php', { method:'POST', body: new URLSearchParams({email}) })
        emailInput.value = '';
        const btn = emailInput.nextElementSibling;
        const orig = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check"></i> Subscribed!';
        btn.style.background = '#06d6a0';
        setTimeout(() => { btn.innerHTML = orig; btn.style.background = ''; }, 3000);
    }
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-18191198680"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'AW-18191198680');
    </script>

</body>
</html>
