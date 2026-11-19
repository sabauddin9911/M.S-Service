<?php
require_once 'webapikingconfig/webapikingdb.php';
$sql = "SELECT site_name, address, phone, email FROM settings WHERE id = 1";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $settings = $result->fetch_assoc();
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
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#4361ee">
    <meta name="description" content="About <?php echo htmlspecialchars($site_name); ?> - India's trusted platform for printing Aadhaar Card, PAN Card, Voter ID, and Driving License. Learn about our mission, values, and team.">
    <meta name="keywords" content="about <?php echo htmlspecialchars($site_name); ?>, print portal about us, aadhaar print portal about, PRINT PORTAL">
    <title>About Us - <?php echo htmlspecialchars($site_name); ?></title>
    <link rel="icon" href="/images/icons/6323119839395908375_99.jpg">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script defer src="../vendors/fontawesome/all.min.js"></script>

    <style>
        :root {
            --primary-color: #4361ee;
            --primary-dark: #3a56d5;
            --primary-light: #6b7ff7;
            --secondary-color: #ffbe0b;
            --accent-color: #fb5607;
            --success-color: #06d6a0;
            --warning-color: #ffd60a;
            --error-color: #ef476f;
            --text-color: #2d3436;
            --text-light: #636e72;
            --text-muted: #95a5a6;
            --background-color: #f8f9fa;
            --surface-color: #ffffff;
            --border-color: #e9ecef;
            --shadow-light: 0 2px 10px rgba(0, 0, 0, 0.05);
            --shadow-medium: 0 8px 30px rgba(0, 0, 0, 0.08);
            --shadow-heavy: 0 15px 35px rgba(0, 0, 0, 0.15);
            --border-radius: 12px;
            --border-radius-lg: 20px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --container-max-width: 1400px;
        }

        *, *::before, *::after { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden;
            font-size: 16px;
        }

        .skip-to-content {
            position: absolute;
            top: -40px;
            left: 6px;
            background: var(--primary-color);
            color: white;
            padding: 8px;
            border-radius: 4px;
            text-decoration: none;
            transition: top 0.3s;
            z-index: 1001;
        }
        .skip-to-content:focus { top: 6px; }

        /* ─── Container ─── */
        .container {
            max-width: var(--container-max-width);
            margin: 0 auto;
            padding: 0 24px;
            width: 100%;
        }

        /* ─── Header ─── */
        header {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: var(--shadow-light);
            transition: var(--transition);
        }
        header.scrolled {
            box-shadow: var(--shadow-medium);
            background-color: rgba(255, 255, 255, 0.98);
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 0;
            min-height: 70px;
        }
        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: var(--transition);
        }
        .logo:hover { transform: scale(1.05); }
        .logo span {
            font-size: 28px;
            font-weight: 600;
            color: var(--text-color);
            margin-left: 12px;
        }
        .logo .highlight { color: var(--primary-color); }

        .nav-links {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 32px;
        }
        .nav-links li a {
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            position: relative;
            transition: var(--transition);
            padding: 8px 0;
        }
        .nav-links li a:hover,
        .nav-links li a.active { color: var(--primary-color); }
        .nav-links li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-light));
            transition: var(--transition);
        }
        .nav-links li a:hover::after,
        .nav-links li a.active::after { width: 100%; }

        /* Services Dropdown */
        .nav-dropdown { position: relative; }
        .nav-dropdown-menu {
            display: none;
            position: absolute;
            top: calc(100% + 12px);
            left: 50%;
            transform: translateX(-50%);
            background: var(--surface-color);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-heavy);
            border: 1px solid var(--border-color);
            min-width: 260px;
            z-index: 999;
            padding: 8px 0;
            animation: dropdownFade 0.25s ease;
        }
        @keyframes dropdownFade {
            from { opacity: 0; transform: translateX(-50%) translateY(-10px); }
            to   { opacity: 1; transform: translateX(-50%) translateY(0); }
        }
        .nav-dropdown:hover .nav-dropdown-menu { display: block; }
        .nav-dropdown-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: var(--text-color);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: var(--transition);
        }
        .nav-dropdown-menu a:hover {
            background: rgba(67,97,238,0.05);
            color: var(--primary-color);
        }
        .nav-dropdown-menu a i { width: 22px; color: var(--primary-color); font-size: 14px; }
        .nav-dropdown > a::after { display: none !important; }

        .nav-buttons {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        /* ─── Buttons ─── */
        .btn {
            padding: 12px 24px;
            border-radius: var(--border-radius);
            font-weight: 500;
            text-decoration: none;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            position: relative;
            overflow: hidden;
            font-family: 'Poppins', sans-serif;
        }
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        .btn:hover::before { left: 100%; }
        .primary-btn {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: white;
            box-shadow: var(--shadow-light);
        }
        .primary-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }
        .secondary-btn {
            background-color: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }
        .secondary-btn:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }
        .large-btn { padding: 16px 32px; font-size: 18px; }

        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            width: 44px;
            height: 44px;
            position: relative;
            z-index: 1001;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .mobile-menu-btn span {
            display: block;
            width: 25px;
            height: 3px;
            background-color: var(--text-color);
            margin: 3px 0;
            transition: var(--transition);
            border-radius: 2px;
        }

        /* ─── Page Hero / Breadcrumb Banner ─── */
        .page-hero {
            padding: 140px 0 80px;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 50%, #f1f3f4 100%);
            text-align: center;
        }
        .page-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 15% 50%, rgba(67, 97, 238, 0.10) 0%, transparent 50%),
                radial-gradient(circle at 85% 20%, rgba(255, 190, 11, 0.10) 0%, transparent 50%);
            pointer-events: none;
        }
        .page-hero-content { position: relative; z-index: 1; }
        .breadcrumb {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--surface-color);
            padding: 10px 20px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 500;
            box-shadow: var(--shadow-light);
            margin-bottom: 28px;
            border: 1px solid var(--border-color);
        }
        .breadcrumb a {
            color: var(--primary-color);
            text-decoration: none;
            transition: var(--transition);
        }
        .breadcrumb a:hover { color: var(--primary-dark); }
        .breadcrumb .sep { color: var(--text-muted); }
        .breadcrumb .current { color: var(--text-light); }
        .page-hero h1 {
            font-size: clamp(2.2rem, 5vw, 3.4rem);
            font-weight: 700;
            margin: 0 0 20px;
            line-height: 1.2;
        }
        .page-hero p {
            font-size: 18px;
            color: var(--text-light);
            max-width: 680px;
            margin: 0 auto;
            line-height: 1.7;
        }
        .highlight {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ─── Section Shared ─── */
        .section-title {
            text-align: center;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            margin-bottom: 20px;
        }
        .section-subtitle {
            text-align: center;
            font-size: 18px;
            color: var(--text-light);
            max-width: 700px;
            margin: 0 auto 70px;
            line-height: 1.7;
        }
        .section-label {
            display: inline-block;
            background: linear-gradient(135deg, rgba(67,97,238,0.1), rgba(67,97,238,0.05));
            color: var(--primary-color);
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 6px 16px;
            border-radius: 30px;
            margin-bottom: 18px;
            border: 1px solid rgba(67,97,238,0.15);
        }

        /* ─── Our Story ─── */
        .story-section {
            padding: 100px 0;
            background: var(--surface-color);
        }
        .story-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }
        .story-visual {
            position: relative;
        }
        .story-main-card {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            border-radius: var(--border-radius-lg);
            padding: 48px 40px;
            color: white;
            box-shadow: var(--shadow-heavy);
            position: relative;
            overflow: hidden;
        }
        .story-main-card::before {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 160px;
            height: 160px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
        }
        .story-main-card::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: -20px;
            width: 100px;
            height: 100px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
        }
        .story-main-card .card-icon {
            width: 70px;
            height: 70px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin-bottom: 24px;
        }
        .story-main-card h3 { font-size: 28px; margin: 0 0 12px; font-weight: 700; }
        .story-main-card p { margin: 0; opacity: 0.9; font-size: 16px; line-height: 1.7; }

        .story-floating-badges {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-top: 20px;
        }
        .floating-badge {
            background: var(--surface-color);
            border-radius: var(--border-radius);
            padding: 20px;
            box-shadow: var(--shadow-medium);
            border: 1px solid var(--border-color);
            text-align: center;
            transition: var(--transition);
        }
        .floating-badge:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-heavy);
        }
        .floating-badge .badge-num {
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: block;
            line-height: 1;
            margin-bottom: 6px;
        }
        .floating-badge .badge-label {
            font-size: 13px;
            color: var(--text-light);
            font-weight: 500;
        }

        .story-content .section-label { display: block; text-align: left; }
        .story-content h2 {
            font-size: clamp(1.8rem, 3.5vw, 2.8rem);
            font-weight: 700;
            line-height: 1.3;
            margin: 0 0 24px;
        }
        .story-content p {
            color: var(--text-light);
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 20px;
        }
        .story-content p:last-of-type { margin-bottom: 36px; }
        .story-content .btn { margin-right: 16px; }

        /* ─── Stats Band ─── */
        .stats-band {
            padding: 60px 0;
            background: linear-gradient(135deg, var(--primary-color) 0%, #1e3c72 100%);
            position: relative;
            overflow: hidden;
        }
        .stats-band::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(255,255,255,0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 50%, rgba(255,190,11,0.08) 0%, transparent 50%);
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0;
            position: relative;
            z-index: 1;
        }
        .stat-item {
            text-align: center;
            padding: 40px 20px;
            position: relative;
            border-right: 1px solid rgba(255,255,255,0.12);
        }
        .stat-item:last-child { border-right: none; }
        .stat-item i {
            font-size: 36px;
            color: var(--secondary-color);
            margin-bottom: 16px;
            display: block;
        }
        .stat-item .stat-number {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            color: white;
            display: block;
            line-height: 1;
            margin-bottom: 10px;
        }
        .stat-item .stat-label {
            font-size: 15px;
            color: rgba(255,255,255,0.75);
            font-weight: 500;
        }

        /* ─── Mission & Vision ─── */
        .mission-section {
            padding: 100px 0;
            background: var(--background-color);
        }
        .mission-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
        }
        .mission-card {
            background: var(--surface-color);
            border-radius: var(--border-radius-lg);
            padding: 48px 36px;
            box-shadow: var(--shadow-light);
            border: 1px solid var(--border-color);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }
        .mission-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-light));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }
        .mission-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-heavy); }
        .mission-card:hover::before { transform: scaleX(1); }
        .mission-card .mission-icon {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(67,97,238,0.1), rgba(67,97,238,0.05));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: var(--primary-color);
            margin-bottom: 28px;
        }
        .mission-card h3 {
            font-size: 24px;
            font-weight: 700;
            margin: 0 0 16px;
            color: var(--text-color);
        }
        .mission-card p {
            color: var(--text-light);
            font-size: 15px;
            line-height: 1.8;
            margin: 0;
        }

        /* ─── Values Section ─── */
        .values-section {
            padding: 100px 0;
            background: var(--surface-color);
        }
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 32px;
            margin-top: 20px;
        }
        .value-step {
            background: var(--surface-color);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-light);
            padding: 48px 32px;
            text-align: center;
            transition: var(--transition);
            position: relative;
            border: 1px solid var(--border-color);
        }
        .value-step:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-heavy);
        }
        .value-number {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 18px;
            box-shadow: var(--shadow-light);
        }
        .value-icon {
            font-size: 48px;
            color: var(--primary-color);
            margin-bottom: 24px;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(67, 97, 238, 0.1), rgba(67, 97, 238, 0.05));
            margin: 0 auto 24px;
        }
        .value-step h3 { font-size: 22px; margin-bottom: 14px; color: var(--text-color); font-weight: 600; }
        .value-step p { color: var(--text-light); font-size: 15px; line-height: 1.7; }

        /* ─── Services We Offer ─── */
        .services-section {
            padding: 100px 0;
            background: var(--background-color);
        }
        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }
        .svc-card {
            background: var(--surface-color);
            border-radius: var(--border-radius-lg);
            padding: 36px 28px;
            box-shadow: var(--shadow-light);
            border: 1px solid var(--border-color);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .svc-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-heavy);
        }
        .svc-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            color: white;
            flex-shrink: 0;
        }
        .svc-card h3 { font-size: 19px; font-weight: 600; margin: 0; color: var(--text-color); }
        .svc-card p { color: var(--text-light); font-size: 14px; line-height: 1.7; margin: 0; flex-grow: 1; }
        .svc-card a {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--primary-color);
            font-weight: 500;
            font-size: 14px;
            text-decoration: none;
            transition: var(--transition);
        }
        .svc-card a:hover { gap: 10px; }

        /* ─── Why Choose Us ─── */
        .why-section {
            padding: 100px 0;
            background: var(--surface-color);
        }
        .why-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }
        .why-list { list-style: none; padding: 0; margin: 0; }
        .why-list li {
            display: flex;
            gap: 20px;
            align-items: flex-start;
            padding: 24px 0;
            border-bottom: 1px solid var(--border-color);
            transition: var(--transition);
        }
        .why-list li:last-child { border-bottom: none; }
        .why-list li:hover { padding-left: 6px; }
        .why-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: linear-gradient(135deg, rgba(67,97,238,0.1), rgba(67,97,238,0.05));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: var(--primary-color);
            flex-shrink: 0;
        }
        .why-text h4 { font-size: 17px; font-weight: 600; margin: 0 0 6px; color: var(--text-color); }
        .why-text p { color: var(--text-light); font-size: 14px; line-height: 1.6; margin: 0; }

        .why-visual {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: var(--border-radius-lg);
            padding: 48px 40px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-medium);
        }
        .why-visual .visual-title {
            font-size: 22px;
            font-weight: 700;
            margin: 0 0 32px;
            color: var(--text-color);
        }
        .why-visual .visual-title span { color: var(--primary-color); }
        .progress-item { margin-bottom: 28px; }
        .progress-item:last-child { margin-bottom: 0; }
        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-color);
        }
        .progress-bar-track {
            height: 8px;
            background: var(--border-color);
            border-radius: 4px;
            overflow: hidden;
        }
        .progress-bar-fill {
            height: 100%;
            border-radius: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-light));
            width: 0;
            transition: width 1.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .progress-bar-fill.animated { width: var(--target-width); }

        /* ─── CTA Section ─── */
        .cta-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        .cta-box {
            text-align: center;
            padding: 70px 60px;
            background: linear-gradient(135deg, var(--primary-color), #1e3c72);
            border-radius: var(--border-radius-lg);
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-heavy);
        }
        .cta-box::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 220px;
            height: 220px;
            background: rgba(255,255,255,0.06);
            border-radius: 50%;
        }
        .cta-box::after {
            content: '';
            position: absolute;
            bottom: -40px;
            left: -40px;
            width: 150px;
            height: 150px;
            background: rgba(255,190,11,0.08);
            border-radius: 50%;
        }
        .cta-box h2 {
            font-size: clamp(1.8rem, 3.5vw, 2.8rem);
            font-weight: 700;
            color: white;
            margin: 0 0 20px;
            position: relative;
            z-index: 1;
        }
        .cta-box p {
            font-size: 17px;
            color: rgba(255,255,255,0.85);
            margin: 0 0 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.7;
            position: relative;
            z-index: 1;
        }
        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            position: relative;
            z-index: 1;
        }
        .cta-btn-white {
            background: white;
            color: var(--primary-color);
            padding: 16px 36px;
            border-radius: var(--border-radius);
            font-weight: 600;
            font-size: 17px;
            text-decoration: none;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }
        .cta-btn-white:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.25);
        }
        .cta-btn-outline {
            background: transparent;
            color: white;
            padding: 16px 36px;
            border-radius: var(--border-radius);
            font-weight: 600;
            font-size: 17px;
            text-decoration: none;
            border: 2px solid rgba(255,255,255,0.5);
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        .cta-btn-outline:hover {
            background: rgba(255,255,255,0.1);
            border-color: white;
            transform: translateY(-3px);
        }

        /* ─── Animations ─── */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1),
                        transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .fade-in.visible { opacity: 1; transform: translateY(0); }

        /* ─── Loading ─── */
        .loading-overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: var(--surface-color);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }
        .loading-overlay.hidden { opacity: 0; pointer-events: none; }
        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid var(--border-color);
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* ─── Floating Buttons ─── */
        .floating-whatsapp, #back-to-top {
            position: fixed;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            box-shadow: var(--shadow-medium);
            transition: var(--transition);
            z-index: 999;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
        .floating-whatsapp { bottom: 30px; right: 30px; background: linear-gradient(135deg, #25d366, #128c7e); }
        .floating-whatsapp:hover { transform: translateY(-4px) scale(1.05); box-shadow: var(--shadow-heavy); }
        #back-to-top { bottom: 30px; left: 30px; background: linear-gradient(135deg, var(--primary-color), var(--primary-light)); opacity: 0; visibility: hidden; }
        #back-to-top.visible { opacity: 1; visibility: visible; }
        #back-to-top:hover { transform: translateY(-4px); box-shadow: var(--shadow-heavy); }

        /* ─── Footer ─── */
        .footer {
            background: linear-gradient(135deg, #001233 0%, #1e3c72 100%);
            color: white;
            padding: 60px 0 20px;
            margin-top: 0;
            position: relative;
            overflow: hidden;
        }
        .footer::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-light), var(--secondary-color));
        }
        .footer-top {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 40px;
            margin-bottom: 40px;
        }
        .footer-column h3 {
            color: white;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 24px;
            position: relative;
        }
        .footer-column h3::after {
            content: '';
            position: absolute;
            bottom: -8px; left: 0;
            width: 40px; height: 3px;
            background: var(--primary-color);
            border-radius: 2px;
        }
        .footer-logo { display: flex; align-items: center; margin-bottom: 20px; }
        .footer-logo span { font-size: 24px; font-weight: 600; color: white; margin-left: 12px; }
        .footer-logo .highlight { color: var(--primary-color); }
        .footer-column p { color: #b2bec3; line-height: 1.6; margin-bottom: 24px; }
        .footer-links { list-style: none; padding: 0; margin: 0; }
        .footer-links li { margin-bottom: 12px; }
        .footer-links a {
            color: #b2bec3;
            text-decoration: none;
            font-size: 15px;
            transition: var(--transition);
            display: flex;
            align-items: center;
            padding: 4px 0;
        }
        .footer-links a:hover { color: var(--primary-color); transform: translateX(5px); }
        .footer-contact { list-style: none; padding: 0; margin: 0; }
        .footer-contact li { display: flex; align-items: center; margin-bottom: 16px; color: #b2bec3; font-size: 15px; }
        .footer-contact i { color: var(--primary-color); margin-right: 12px; width: 18px; text-align: center; }
        .footer-social { display: flex; gap: 16px; margin-top: 20px; }
        .footer-social .social-icon {
            width: 44px; height: 44px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            background: rgba(255,255,255,0.1);
            color: white;
            font-size: 18px;
            transition: var(--transition);
            border: 2px solid transparent;
            text-decoration: none;
        }
        .footer-social .social-icon:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(67,97,238,0.3);
        }
        .footer-whatsapp {
            background: linear-gradient(135deg, #25d366, #128c7e);
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 8px;
        }
        .footer-whatsapp:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(37,211,102,0.3); }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        .copyright p { margin: 0; color: #b2bec3; font-size: 14px; }
        .footer-bottom-links { display: flex; gap: 24px; flex-wrap: wrap; }
        .footer-bottom-links a { color: #b2bec3; text-decoration: none; font-size: 14px; transition: var(--transition); }
        .footer-bottom-links a:hover { color: var(--primary-color); }

        /* ─── Responsive ─── */
        @media (max-width: 1200px) {
            .container { padding: 0 20px; }
            .footer-top { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 992px) {
            .story-grid, .why-grid { grid-template-columns: 1fr; gap: 50px; }
            .mission-grid { grid-template-columns: 1fr 1fr; }
            .services-grid { grid-template-columns: 1fr 1fr; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .stat-item { border-right: none; border-bottom: 1px solid rgba(255,255,255,0.12); }
            .stat-item:nth-child(odd) { border-right: 1px solid rgba(255,255,255,0.12); }
            .stat-item:last-child, .stat-item:nth-last-child(2):nth-child(odd) { border-bottom: none; }
        }
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: fixed;
                top: 0; left: 0;
                width: 100%; height: 100vh;
                background: rgba(255,255,255,0.98);
                backdrop-filter: blur(10px);
                flex-direction: column;
                align-items: center;
                justify-content: center;
                z-index: 1000;
                gap: 32px;
            }
            .nav-links.active { display: flex; }
            .nav-links li a { font-size: 24px; font-weight: 600; }
            .mobile-menu-btn { display: flex; }
            .mobile-menu-btn.active span:nth-child(1) { transform: rotate(45deg) translate(6px, 6px); }
            .mobile-menu-btn.active span:nth-child(2) { opacity: 0; transform: translateX(20px); }
            .mobile-menu-btn.active span:nth-child(3) { transform: rotate(-45deg) translate(6px, -6px); }
            .nav-buttons { display: none; }
            .mission-grid, .services-grid { grid-template-columns: 1fr; }
            .story-floating-badges { grid-template-columns: repeat(4, 1fr); }
            .cta-box { padding: 50px 28px; }
            .footer-top { grid-template-columns: 1fr; }
            .footer-bottom { flex-direction: column; text-align: center; }
            .floating-whatsapp, #back-to-top { width: 50px; height: 50px; font-size: 20px; }
        }
        @media (max-width: 480px) {
            .container { padding: 0 16px; }
            .story-floating-badges { grid-template-columns: 1fr 1fr; }
            .stats-grid { grid-template-columns: 1fr; }
            .stat-item { border-right: none !important; border-bottom: 1px solid rgba(255,255,255,0.12); }
            .stat-item:last-child { border-bottom: none; }
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
    <div class="loading-overlay" id="loadingOverlay">
        <div class="spinner"></div>
    </div>


    <!-- ─── HEADER ─── -->
    <header id="header" role="banner">
        <div class="container">
            <div class="header-container">
                <a href="../" class="logo" aria-label="<?php echo htmlspecialchars($site_name); ?> Homepage">
                    <svg id="print-portal-logo" width="50" height="50" viewBox="0 0 60 60" aria-hidden="true">
                        <defs>
                            <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#4361ee;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#3a56d5;stop-opacity:1" />
                            </linearGradient>
                            <filter id="shadow" x="-20%" y="-20%" width="140%" height="140%">
                                <feGaussianBlur in="SourceAlpha" stdDeviation="3" />
                                <feOffset dx="0" dy="2" result="offsetblur" />
                                <feComponentTransfer>
                                    <feFuncA type="linear" slope="0.3" />
                                </feComponentTransfer>
                                <feMerge>
                                    <feMergeNode />
                                    <feMergeNode in="SourceGraphic" />
                                </feMerge>
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
                        <li><a href="about.php" class="active">About Us</a></li>
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
                    <span></span>
                    <span></span>
                    <span></span>
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
                        <span class="current">About Us</span>
                    </div>
                    <h1>About <span class="highlight"><?php echo htmlspecialchars($site_name); ?></span></h1>
                    <p>India's most trusted digital document printing platform — empowering thousands of cyber cafes, CSC centres, and service providers across the nation.</p>
                </div>
            </div>
        </section>

        <!-- ─── OUR STORY ─── -->
        <section class="story-section">
            <div class="container">
                <div class="story-grid">
                    <!-- Visual Left -->
                    <div class="story-visual fade-in">
                        <div class="story-main-card">
                            <div class="card-icon">
                                <i class="fas fa-print" aria-hidden="true"></i>
                            </div>
                            <h3><?php echo htmlspecialchars($site_name); ?></h3>
                            <p>From a simple idea to India's leading document printing platform — our journey has been driven by one goal: to make government document printing fast, reliable, and accessible for every Indian.</p>
                        </div>
                        <div class="story-floating-badges">
                            <div class="floating-badge fade-in">
                                <span class="badge-num">50K+</span>
                                <span class="badge-label">Registered Users</span>
                            </div>
                            <div class="floating-badge fade-in">
                                <span class="badge-num">2M+</span>
                                <span class="badge-label">Prints Completed</span>
                            </div>
                            <div class="floating-badge fade-in">
                                <span class="badge-num">28+</span>
                                <span class="badge-label">States Covered</span>
                            </div>
                            <div class="floating-badge fade-in">
                                <span class="badge-num">99.9%</span>
                                <span class="badge-label">Uptime Record</span>
                            </div>
                        </div>
                    </div>

                    <!-- Content Right -->
                    <div class="story-content fade-in">
                        <span class="section-label"><i class="fas fa-star" style="margin-right:6px;"></i> Our Story</span>
                        <h2>Built for <span class="highlight">Bharat</span>, Trusted by Millions</h2>
                        <p><?php echo htmlspecialchars($site_name); ?> was founded with a clear mission: to bridge the gap between citizens and their government documents. We recognised that printing an Aadhaar Card, PAN Card, Voter ID, or Driving License was unnecessarily complex and time-consuming for operators across India.</p>
                        <p>Today, we power thousands of Jan Seva Kendras, cyber cafes, and CSC centres, offering a one-stop platform where operators can instantly download, process, and print authentic government documents with just a few clicks — securely, efficiently, and at the best price.</p>
                        <p>Our platform is designed with simplicity at its heart, so whether you're in a metro city or a remote village, <?php echo htmlspecialchars($site_name); ?> works for you.</p>
                        <div>
                            <a href="dashboard/register.php" class="btn primary-btn large-btn">
                                <i class="fas fa-rocket" aria-hidden="true"></i> Start Now
                            </a>
                            <a href="contact.php" class="btn secondary-btn large-btn">
                                <i class="fas fa-phone" aria-hidden="true"></i> Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── STATS BAND ─── -->
        <section class="stats-band">
            <div class="container">
                <div class="stats-grid">
                    <div class="stat-item fade-in">
                        <i class="fas fa-users" aria-hidden="true"></i>
                        <span class="stat-number" data-target="50000">50K+</span>
                        <span class="stat-label">Registered Operators</span>
                    </div>
                    <div class="stat-item fade-in">
                        <i class="fas fa-print" aria-hidden="true"></i>
                        <span class="stat-number" data-target="2000000">2M+</span>
                        <span class="stat-label">Documents Printed</span>
                    </div>
                    <div class="stat-item fade-in">
                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                        <span class="stat-number" data-target="28">28+</span>
                        <span class="stat-label">States Served</span>
                    </div>
                    <div class="stat-item fade-in">
                        <i class="fas fa-headset" aria-hidden="true"></i>
                        <span class="stat-number" data-target="24">24/7</span>
                        <span class="stat-label">Customer Support</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── MISSION, VISION, GOAL ─── -->
        <section class="mission-section">
            <div class="container">
                <div style="text-align:center;">
                    <span class="section-label"><i class="fas fa-bullseye" style="margin-right:6px;"></i> What Drives Us</span>
                </div>
                <h2 class="section-title fade-in">Our <span class="highlight">Mission & Vision</span></h2>
                <p class="section-subtitle fade-in">Every decision we make is guided by our commitment to empowering India's digital service ecosystem.</p>

                <div class="mission-grid">
                    <div class="mission-card fade-in">
                        <div class="mission-icon">
                            <i class="fas fa-rocket" aria-hidden="true"></i>
                        </div>
                        <h3>Our Mission</h3>
                        <p>To provide the fastest, most reliable, and most affordable document printing platform to every cyber cafe operator, CSC owner, and digital service provider across India — ensuring no citizen is left behind in the digital age.</p>
                    </div>
                    <div class="mission-card fade-in">
                        <div class="mission-icon">
                            <i class="fas fa-eye" aria-hidden="true"></i>
                        </div>
                        <h3>Our Vision</h3>
                        <p>To become India's #1 digital document service platform — a trusted ecosystem where operators can grow their businesses and citizens can access government services seamlessly through a nationwide network of empowered partners.</p>
                    </div>
                    <div class="mission-card fade-in">
                        <div class="mission-icon">
                            <i class="fas fa-gem" aria-hidden="true"></i>
                        </div>
                        <h3>Our Goal</h3>
                        <p>To onboard 5 lakh+ operators pan-India, reduce document processing time to under 60 seconds, and ensure our platform is available 24×7 with zero downtime — bringing government services to every doorstep in Bharat.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── CORE VALUES ─── -->
        <section class="values-section">
            <div class="container">
                <div style="text-align:center;">
                    <span class="section-label"><i class="fas fa-heart" style="margin-right:6px;"></i> Core Values</span>
                </div>
                <h2 class="section-title fade-in">What We <span class="highlight">Stand For</span></h2>
                <p class="section-subtitle fade-in">Our values are not just words on a page — they shape every product decision, every customer interaction, and every feature we build.</p>

                <div class="values-grid">
                    <div class="value-step fade-in">
                        <div class="value-number">1</div>
                        <div class="value-icon">
                            <i class="fas fa-shield-alt" aria-hidden="true"></i>
                        </div>
                        <h3>Security First</h3>
                        <p>Every transaction and data point on our platform is protected with industry-standard encryption. Your operators' trust and citizens' privacy are non-negotiable.</p>
                    </div>
                    <div class="value-step fade-in">
                        <div class="value-number">2</div>
                        <div class="value-icon">
                            <i class="fas fa-bolt" aria-hidden="true"></i>
                        </div>
                        <h3>Speed & Reliability</h3>
                        <p>We engineer for performance. Whether it's a peak-load festival day or a routine weekday, our servers are built to deliver documents in seconds, every single time.</p>
                    </div>
                    <div class="value-step fade-in">
                        <div class="value-number">3</div>
                        <div class="value-icon">
                            <i class="fas fa-hands-helping" aria-hidden="true"></i>
                        </div>
                        <h3>Operator Empowerment</h3>
                        <p>We don't just provide a platform — we provide a livelihood. Our tools help operators maximise earnings, serve more customers, and build sustainable digital businesses.</p>
                    </div>
                    <div class="value-step fade-in">
                        <div class="value-number">4</div>
                        <div class="value-icon">
                            <i class="fas fa-sync-alt" aria-hidden="true"></i>
                        </div>
                        <h3>Constant Innovation</h3>
                        <p>Technology never stands still, and neither do we. We regularly update our platform with new features, better integrations, and smarter tools to keep our operators ahead of the curve.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── SERVICES WE OFFER ─── -->
        <section class="services-section">
            <div class="container">
                <div style="text-align:center;">
                    <span class="section-label"><i class="fas fa-th-large" style="margin-right:6px;"></i> What We Offer</span>
                </div>
                <h2 class="section-title fade-in">Our <span class="highlight">Services</span></h2>
                <p class="section-subtitle fade-in">A complete suite of government document printing solutions designed for professional operators.</p>

                <div class="services-grid">
                    <div class="svc-card fade-in">
                        <div class="svc-icon"><i class="fas fa-fingerprint" aria-hidden="true"></i></div>
                        <h3>Aadhaar Titan Print</h3>
                        <p>Print full-size or card-size Aadhaar in seconds. Supports PVC, A4, and smart card formats with crisp output quality for every printer type.</p>
                        <a href="services/aadhaar-titan-print.php">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="svc-card fade-in">
                        <div class="svc-icon"><i class="fas fa-vote-yea" aria-hidden="true"></i></div>
                        <h3>Voter ID Card Print</h3>
                        <p>Instantly retrieve and print Voter ID cards from NVSP. Perfect card-size output with all official data for lamination and distribution.</p>
                        <a href="services/voter-id-print.php">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="svc-card fade-in">
                        <div class="svc-icon"><i class="fas fa-car" aria-hidden="true"></i></div>
                        <h3>Driving License Print</h3>
                        <p>Download and print Driving License details fetched directly from Parivahan/Sarathi. Formatted to official card dimensions for professional output.</p>
                        <a href="services/driving-license-print.php">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="svc-card fade-in">
                        <div class="svc-icon"><i class="fas fa-search" aria-hidden="true"></i></div>
                        <h3>PAN No. Find Portal</h3>
                        <p>Search and retrieve PAN card details instantly using the applicant's name, date of birth, or Aadhaar number — fast, accurate, and hassle-free.</p>
                        <a href="services/pan-find-portal.php">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="svc-card fade-in">
                        <div class="svc-icon"><i class="fas fa-truck" aria-hidden="true"></i></div>
                        <h3>RC Titan Print</h3>
                        <p>Print vehicle Registration Certificates in card format from Parivahan data. Ideal for motor dealers and transport service centres across India.</p>
                        <a href="services/rc-titan-print.php">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="svc-card fade-in">
                        <div class="svc-icon"><i class="fas fa-network-wired" aria-hidden="true"></i></div>
                        <h3>CSC Titan Print</h3>
                        <p>Dedicated solution for Common Service Centre operators. Print all government IDs under one login with bulk processing capabilities and priority support.</p>
                        <a href="services/csc-titan-print.php">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── WHY CHOOSE US ─── -->
        <section class="why-section">
            <div class="container">
                <div class="why-grid">
                    <!-- Left: Feature list -->
                    <div class="fade-in">
                        <span class="section-label"><i class="fas fa-check-circle" style="margin-right:6px;"></i> Why Choose Us</span>
                        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem);font-weight:700;line-height:1.3;margin:0 0 40px;">The <span class="highlight">Advantage</span> of Choosing <?php echo htmlspecialchars($site_name); ?></h2>

                        <ul class="why-list">
                            <li>
                                <div class="why-icon"><i class="fas fa-tachometer-alt" aria-hidden="true"></i></div>
                                <div class="why-text">
                                    <h4>Lightning-Fast Processing</h4>
                                    <p>Average document retrieval and print preparation in under 30 seconds — faster than any competitor in the market.</p>
                                </div>
                            </li>
                            <li>
                                <div class="why-icon"><i class="fas fa-rupee-sign" aria-hidden="true"></i></div>
                                <div class="why-text">
                                    <h4>Higher Earnings for Operators</h4>
                                    <p>Our competitive pricing model ensures operators keep more of what they earn. Transparent billing with no hidden charges, ever.</p>
                                </div>
                            </li>
                            <li>
                                <div class="why-icon"><i class="fas fa-lock" aria-hidden="true"></i></div>
                                <div class="why-text">
                                    <h4>Bank-Grade Security</h4>
                                    <p>SSL-secured connections, encrypted data storage, and regular third-party security audits keep your business and your customers safe.</p>
                                </div>
                            </li>
                            <li>
                                <div class="why-icon"><i class="fas fa-headset" aria-hidden="true"></i></div>
                                <div class="why-text">
                                    <h4>Dedicated 24/7 Support</h4>
                                    <p>Our support team is available via WhatsApp, email, and phone — Monday to Saturday, 10 AM to 7 PM, with emergency support always on.</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Right: Performance bars -->
                    <div class="why-visual fade-in">
                        <p class="visual-title">Platform <span>Performance</span> Metrics</p>

                        <div class="progress-item">
                            <div class="progress-header">
                                <span><i class="fas fa-bolt" style="margin-right:8px;color:var(--primary-color);"></i> Document Speed</span>
                                <span>98%</span>
                            </div>
                            <div class="progress-bar-track">
                                <div class="progress-bar-fill" style="--target-width: 98%;"></div>
                            </div>
                        </div>

                        <div class="progress-item">
                            <div class="progress-header">
                                <span><i class="fas fa-shield-alt" style="margin-right:8px;color:var(--primary-color);"></i> Platform Security</span>
                                <span>100%</span>
                            </div>
                            <div class="progress-bar-track">
                                <div class="progress-bar-fill" style="--target-width: 100%;"></div>
                            </div>
                        </div>

                        <div class="progress-item">
                            <div class="progress-header">
                                <span><i class="fas fa-server" style="margin-right:8px;color:var(--primary-color);"></i> Server Uptime</span>
                                <span>99.9%</span>
                            </div>
                            <div class="progress-bar-track">
                                <div class="progress-bar-fill" style="--target-width: 99.9%;"></div>
                            </div>
                        </div>

                        <div class="progress-item">
                            <div class="progress-header">
                                <span><i class="fas fa-smile" style="margin-right:8px;color:var(--primary-color);"></i> Operator Satisfaction</span>
                                <span>96%</span>
                            </div>
                            <div class="progress-bar-track">
                                <div class="progress-bar-fill" style="--target-width: 96%;"></div>
                            </div>
                        </div>

                        <div class="progress-item">
                            <div class="progress-header">
                                <span><i class="fas fa-headset" style="margin-right:8px;color:var(--primary-color);"></i> Support Response</span>
                                <span>95%</span>
                            </div>
                            <div class="progress-bar-track">
                                <div class="progress-bar-fill" style="--target-width: 95%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── CTA ─── -->
        <section class="cta-section">
            <div class="container">
                <div class="cta-box fade-in">
                    <h2>Ready to Join <span style="color:var(--secondary-color);"><?php echo htmlspecialchars($site_name); ?></span>?</h2>
                    <p>Join 50,000+ operators who are already growing their businesses and serving their communities with the most trusted print portal in India.</p>
                    <div class="cta-buttons">
                        <a href="dashboard/register.php" class="cta-btn-white">
                            <i class="fas fa-user-plus" aria-hidden="true"></i> Register for Free
                        </a>
                        <a href="dashboard/login.php" class="cta-btn-outline">
                            <i class="fa fa-key" aria-hidden="true"></i> Existing User? Login
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- ─── FOOTER ─── -->
    <footer class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="footer-column">
                    <div class="footer-logo">
                        <svg id="print-portal-logo-footer" width="40" height="40" viewBox="0 0 50 50">
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
                        <li><i class="fas fa-envelope"></i>
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
                    <p>&copy; 2025 <?php echo htmlspecialchars($site_name); ?>. All rights reserved.</p>
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
    (function() {
        'use strict';

        /* ── Loading overlay ── */
        window.addEventListener('load', () => {
            const overlay = document.getElementById('loadingOverlay');
            if (overlay) {
                setTimeout(() => overlay.classList.add('hidden'), 300);
            }
        });

        /* ── Header scroll effect ── */
        const header = document.getElementById('header');
        window.addEventListener('scroll', () => {
            header.classList.toggle('scrolled', window.scrollY > 50);

            const backBtn = document.getElementById('back-to-top');
            if (backBtn) backBtn.classList.toggle('visible', window.scrollY > 400);
        }, { passive: true });

        /* ── Back to top ── */
        const backBtn = document.getElementById('back-to-top');
        if (backBtn) {
            backBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
        }

        /* ── Mobile menu ── */
        const menuBtn = document.querySelector('.mobile-menu-btn');
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

        /* ── Fade-in on scroll ── */
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

        /* ── Progress bars ── */
        const progressObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.querySelectorAll('.progress-bar-fill').forEach(bar => {
                        bar.classList.add('animated');
                    });
                }
            });
        }, { threshold: 0.3 });

        document.querySelectorAll('.why-visual').forEach(el => progressObserver.observe(el));

        /* ── Keyboard escape closes mobile menu ── */
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && navLinks && navLinks.classList.contains('active')) {
                menuBtn.classList.remove('active');
                navLinks.classList.remove('active');
                menuBtn.setAttribute('aria-expanded', 'false');
            }
        });

        /* ── Resize: close mobile menu on desktop ── */
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768 && navLinks && navLinks.classList.contains('active')) {
                menuBtn.classList.remove('active');
                navLinks.classList.remove('active');
                menuBtn.setAttribute('aria-expanded', 'false');
            }
        }, { passive: true });

    })();
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