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
$last_updated = "1 June 2025";
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#4361ee">
    <meta name="description" content="Privacy Policy - <?php echo htmlspecialchars($site_name); ?>. Learn how we collect, use, and protect your personal data on India's trusted document printing platform.">
    <meta name="keywords" content="privacy policy <?php echo htmlspecialchars($site_name); ?>, data protection, aadhaar print privacy, PRINT PORTAL privacy">
    <title>Privacy Policy - <?php echo htmlspecialchars($site_name); ?></title>
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
            --text-color: #2d3436;
            --text-light: #636e72;
            --text-muted: #95a5a6;
            --background-color: #f8f9fa;
            --surface-color: #ffffff;
            --border-color: #e9ecef;
            --shadow-light: 0 2px 10px rgba(0,0,0,0.05);
            --shadow-medium: 0 8px 30px rgba(0,0,0,0.08);
            --shadow-heavy: 0 15px 35px rgba(0,0,0,0.15);
            --border-radius: 12px;
            --border-radius-lg: 20px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
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
        .nav-links li a:hover, .nav-links li a.active { color: var(--primary-color); }
        .nav-links li a::after {
            content: ''; position: absolute; width: 0; height: 2px;
            bottom: 0; left: 0;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-light));
            transition: var(--transition);
        }
        .nav-links li a:hover::after, .nav-links li a.active::after { width: 100%; }

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
            padding: 12px 20px; color: var(--text-color);
            text-decoration: none; font-size: 14px; font-weight: 500; transition: var(--transition);
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
            content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        .btn:hover::before { left: 100%; }
        .primary-btn { background: linear-gradient(135deg, var(--primary-color), var(--primary-light)); color: white; box-shadow: var(--shadow-light); }
        .primary-btn:hover { transform: translateY(-2px); box-shadow: var(--shadow-medium); }
        .secondary-btn { background-color: transparent; color: var(--primary-color); border: 2px solid var(--primary-color); }
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

        /* ─── Page Hero ─── */
        .page-hero {
            padding: 140px 0 80px; position: relative; overflow: hidden;
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
        .page-hero h1 { font-size: clamp(2.2rem, 5vw, 3.4rem); font-weight: 700; margin: 0 0 20px; line-height: 1.2; }
        .page-hero p { font-size: 18px; color: var(--text-light); max-width: 680px; margin: 0 auto 32px; line-height: 1.7; }
        .highlight {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
        }
        .updated-badge {
            display: inline-flex; align-items: center; gap: 8px;
            background: linear-gradient(135deg, rgba(67,97,238,0.1), rgba(67,97,238,0.05));
            color: var(--primary-color); padding: 10px 22px;
            border-radius: 30px; font-size: 14px; font-weight: 600;
            border: 1px solid rgba(67,97,238,0.2);
        }

        /* ─── Section Label ─── */
        .section-label {
            display: inline-block;
            background: linear-gradient(135deg, rgba(67,97,238,0.1), rgba(67,97,238,0.05));
            color: var(--primary-color); font-size: 13px; font-weight: 600;
            letter-spacing: 1.5px; text-transform: uppercase;
            padding: 6px 16px; border-radius: 30px; margin-bottom: 18px;
            border: 1px solid rgba(67,97,238,0.15);
        }

        /* ─── Quick Summary Cards ─── */
        .summary-section {
            padding: 80px 0;
            background: var(--surface-color);
        }
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }
        .summary-card {
            background: var(--background-color);
            border-radius: var(--border-radius-lg);
            padding: 32px 24px;
            border: 1px solid var(--border-color);
            text-align: center;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }
        .summary-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-light));
            transform: scaleX(0); transform-origin: left; transition: transform 0.4s ease;
        }
        .summary-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-heavy); background: var(--surface-color); }
        .summary-card:hover::before { transform: scaleX(1); }
        .summary-icon {
            width: 64px; height: 64px; border-radius: 50%;
            background: linear-gradient(135deg, rgba(67,97,238,0.12), rgba(67,97,238,0.06));
            display: flex; align-items: center; justify-content: center;
            font-size: 26px; color: var(--primary-color);
            margin: 0 auto 20px;
        }
        .summary-card h3 { font-size: 17px; font-weight: 700; margin: 0 0 10px; color: var(--text-color); }
        .summary-card p { color: var(--text-light); font-size: 13px; line-height: 1.7; margin: 0; }

        /* ─── Main Policy Layout ─── */
        .policy-section {
            padding: 80px 0 100px;
            background: var(--background-color);
        }
        .policy-layout {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 48px;
            align-items: start;
        }

        /* Sidebar TOC */
        .policy-toc {
            position: sticky;
            top: 90px;
        }
        .toc-box {
            background: var(--surface-color);
            border-radius: var(--border-radius-lg);
            padding: 28px 24px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-light);
        }
        .toc-title {
            font-size: 15px; font-weight: 700; color: var(--text-color);
            margin: 0 0 20px; padding-bottom: 16px;
            border-bottom: 2px solid var(--border-color);
            display: flex; align-items: center; gap: 8px;
        }
        .toc-title i { color: var(--primary-color); }
        .toc-list { list-style: none; padding: 0; margin: 0; }
        .toc-list li { margin-bottom: 4px; }
        .toc-list a {
            display: flex; align-items: center; gap: 10px;
            color: var(--text-light); text-decoration: none;
            font-size: 13px; font-weight: 500; padding: 9px 12px;
            border-radius: 8px; transition: var(--transition);
            border-left: 3px solid transparent;
        }
        .toc-list a:hover, .toc-list a.toc-active {
            color: var(--primary-color);
            background: rgba(67,97,238,0.06);
            border-left-color: var(--primary-color);
            padding-left: 16px;
        }
        .toc-list a i { width: 16px; font-size: 12px; flex-shrink: 0; }
        .toc-list .toc-num {
            width: 22px; height: 22px; border-radius: 50%;
            background: rgba(67,97,238,0.08);
            display: flex; align-items: center; justify-content: center;
            font-size: 11px; font-weight: 700; color: var(--primary-color);
            flex-shrink: 0;
        }

        .toc-contact {
            margin-top: 20px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border-radius: var(--border-radius);
            padding: 20px;
            color: white;
        }
        .toc-contact p { font-size: 13px; color: rgba(255,255,255,0.85); margin: 0 0 12px; line-height: 1.6; }
        .toc-contact a {
            display: inline-flex; align-items: center; gap: 6px;
            background: white; color: var(--primary-color);
            padding: 8px 14px; border-radius: 8px;
            font-size: 13px; font-weight: 600; text-decoration: none; transition: var(--transition);
        }
        .toc-contact a:hover { transform: translateY(-2px); box-shadow: var(--shadow-medium); }

        /* Policy Content */
        .policy-content { min-width: 0; }
        .policy-block {
            background: var(--surface-color);
            border-radius: var(--border-radius-lg);
            padding: 48px 44px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-light);
            margin-bottom: 28px;
            scroll-margin-top: 90px;
            transition: var(--transition);
        }
        .policy-block:hover { box-shadow: var(--shadow-medium); }
        .policy-block:last-child { margin-bottom: 0; }

        .policy-block-header {
            display: flex; align-items: center; gap: 18px;
            margin-bottom: 28px; padding-bottom: 22px;
            border-bottom: 2px solid var(--border-color);
        }
        .policy-block-icon {
            width: 56px; height: 56px; border-radius: 14px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; color: white; flex-shrink: 0;
        }
        .policy-block-header-text {}
        .policy-block-num {
            font-size: 12px; font-weight: 700; color: var(--primary-color);
            letter-spacing: 1px; text-transform: uppercase; margin-bottom: 4px;
        }
        .policy-block h2 {
            font-size: 22px; font-weight: 700; color: var(--text-color);
            margin: 0; line-height: 1.3;
        }

        .policy-block p {
            color: var(--text-light); font-size: 15px; line-height: 1.9;
            margin: 0 0 18px;
        }
        .policy-block p:last-child { margin-bottom: 0; }

        .policy-block h3 {
            font-size: 17px; font-weight: 700; color: var(--text-color);
            margin: 28px 0 14px; display: flex; align-items: center; gap: 8px;
        }
        .policy-block h3 i { color: var(--primary-color); font-size: 15px; }

        .policy-list {
            list-style: none; padding: 0; margin: 0 0 20px;
        }
        .policy-list li {
            display: flex; align-items: flex-start; gap: 12px;
            font-size: 15px; color: var(--text-light);
            padding: 10px 0; border-bottom: 1px solid var(--border-color);
            line-height: 1.7;
        }
        .policy-list li:last-child { border-bottom: none; padding-bottom: 0; }
        .policy-list li i { color: var(--primary-color); font-size: 14px; margin-top: 3px; flex-shrink: 0; }
        .policy-list li strong { color: var(--text-color); font-weight: 600; }

        /* Info boxes */
        .info-box {
            border-radius: var(--border-radius);
            padding: 18px 20px;
            margin: 20px 0;
            display: flex;
            align-items: flex-start;
            gap: 14px;
            font-size: 14px;
            line-height: 1.7;
        }
        .info-box i { font-size: 18px; margin-top: 1px; flex-shrink: 0; }
        .info-box-blue { background: rgba(67,97,238,0.07); border: 1px solid rgba(67,97,238,0.15); color: var(--text-color); }
        .info-box-blue i { color: var(--primary-color); }
        .info-box-green { background: rgba(6,214,160,0.07); border: 1px solid rgba(6,214,160,0.2); color: var(--text-color); }
        .info-box-green i { color: #05a87d; }
        .info-box-yellow { background: rgba(255,190,11,0.08); border: 1px solid rgba(255,190,11,0.25); color: var(--text-color); }
        .info-box-yellow i { color: #d4960a; }

        /* Data table */
        .data-table {
            width: 100%; border-collapse: collapse; margin: 20px 0;
            border-radius: var(--border-radius); overflow: hidden;
            border: 1px solid var(--border-color);
        }
        .data-table th {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: white; padding: 14px 18px; text-align: left;
            font-size: 13px; font-weight: 600; letter-spacing: 0.5px;
        }
        .data-table td {
            padding: 13px 18px; font-size: 14px; color: var(--text-light);
            border-bottom: 1px solid var(--border-color); line-height: 1.6;
            vertical-align: top;
        }
        .data-table tr:last-child td { border-bottom: none; }
        .data-table tr:nth-child(even) td { background: rgba(67,97,238,0.025); }
        .data-table td strong { color: var(--text-color); font-weight: 600; }

        /* Rights grid */
        .rights-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin: 20px 0;
        }
        .right-card {
            background: var(--background-color);
            border-radius: var(--border-radius);
            padding: 20px;
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }
        .right-card:hover { border-color: var(--primary-color); background: rgba(67,97,238,0.03); }
        .right-card-header { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; }
        .right-card-icon {
            width: 36px; height: 36px; border-radius: 8px;
            background: linear-gradient(135deg, rgba(67,97,238,0.12), rgba(67,97,238,0.06));
            display: flex; align-items: center; justify-content: center;
            font-size: 15px; color: var(--primary-color); flex-shrink: 0;
        }
        .right-card h4 { font-size: 14px; font-weight: 700; margin: 0; color: var(--text-color); }
        .right-card p { font-size: 13px; color: var(--text-light); line-height: 1.6; margin: 0; }

        /* Contact block */
        .contact-block {
            background: linear-gradient(135deg, var(--primary-color), #1e3c72);
            border-radius: var(--border-radius-lg);
            padding: 40px 36px;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .contact-block::before {
            content: ''; position: absolute; top: -30px; right: -30px;
            width: 140px; height: 140px; background: rgba(255,255,255,0.06); border-radius: 50%;
        }
        .contact-block h3 { font-size: 22px; font-weight: 700; margin: 0 0 14px; position: relative; z-index: 1; }
        .contact-block p { font-size: 15px; color: rgba(255,255,255,0.85); margin: 0 0 24px; line-height: 1.7; position: relative; z-index: 1; }
        .contact-block-links { display: flex; gap: 14px; flex-wrap: wrap; position: relative; z-index: 1; }
        .contact-block-links a {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(255,255,255,0.15); color: white;
            padding: 11px 20px; border-radius: var(--border-radius);
            font-size: 14px; font-weight: 600; text-decoration: none;
            border: 1px solid rgba(255,255,255,0.2); transition: var(--transition);
        }
        .contact-block-links a:hover { background: rgba(255,255,255,0.25); transform: translateY(-2px); }
        .contact-block-links a.white-btn {
            background: white; color: var(--primary-color); border-color: white;
        }
        .contact-block-links a.white-btn:hover { box-shadow: 0 8px 24px rgba(0,0,0,0.2); }

        /* ─── CTA Section ─── */
        .cta-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        .cta-box {
            text-align: center; padding: 70px 60px;
            background: linear-gradient(135deg, var(--primary-color), #1e3c72);
            border-radius: var(--border-radius-lg);
            position: relative; overflow: hidden; box-shadow: var(--shadow-heavy);
        }
        .cta-box::before {
            content: ''; position: absolute; top: -60px; right: -60px;
            width: 220px; height: 220px; background: rgba(255,255,255,0.06); border-radius: 50%;
        }
        .cta-box::after {
            content: ''; position: absolute; bottom: -40px; left: -40px;
            width: 150px; height: 150px; background: rgba(255,190,11,0.08); border-radius: 50%;
        }
        .cta-box h2 { font-size: clamp(1.8rem, 3.5vw, 2.8rem); font-weight: 700; color: white; margin: 0 0 20px; position: relative; z-index: 1; }
        .cta-box p { font-size: 17px; color: rgba(255,255,255,0.85); margin: 0 auto 40px; max-width: 600px; line-height: 1.7; position: relative; z-index: 1; }
        .cta-buttons { display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; position: relative; z-index: 1; }
        .cta-btn-white {
            background: white; color: var(--primary-color); padding: 16px 36px;
            border-radius: var(--border-radius); font-weight: 600; font-size: 17px;
            text-decoration: none; transition: var(--transition);
            display: inline-flex; align-items: center; gap: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }
        .cta-btn-white:hover { transform: translateY(-3px); box-shadow: 0 8px 30px rgba(0,0,0,0.25); }
        .cta-btn-outline {
            background: transparent; color: white; padding: 16px 36px;
            border-radius: var(--border-radius); font-weight: 600; font-size: 17px;
            text-decoration: none; border: 2px solid rgba(255,255,255,0.5);
            transition: var(--transition); display: inline-flex; align-items: center; gap: 10px;
        }
        .cta-btn-outline:hover { background: rgba(255,255,255,0.1); border-color: white; transform: translateY(-3px); }

        /* ─── Animations ─── */
        .fade-in {
            opacity: 0; transform: translateY(30px);
            transition: opacity 0.8s cubic-bezier(0.4,0,0.2,1), transform 0.8s cubic-bezier(0.4,0,0.2,1);
        }
        .fade-in.visible { opacity: 1; transform: translateY(0); }

        /* ─── Loading ─── */
        .loading-overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: var(--surface-color); display: flex; align-items: center;
            justify-content: center; z-index: 9999; transition: opacity 0.5s ease;
        }
        .loading-overlay.hidden { opacity: 0; pointer-events: none; }
        .spinner {
            width: 50px; height: 50px; border: 4px solid var(--border-color);
            border-top: 4px solid var(--primary-color); border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

        /* ─── Floating Buttons ─── */
        .floating-whatsapp, #back-to-top {
            position: fixed; width: 60px; height: 60px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: white; font-size: 24px; box-shadow: var(--shadow-medium);
            transition: var(--transition); z-index: 999; border: none; cursor: pointer; text-decoration: none;
        }
        .floating-whatsapp { bottom: 30px; right: 30px; background: linear-gradient(135deg, #25d366, #128c7e); }
        .floating-whatsapp:hover { transform: translateY(-4px) scale(1.05); box-shadow: var(--shadow-heavy); }
        #back-to-top { bottom: 30px; left: 30px; background: linear-gradient(135deg, var(--primary-color), var(--primary-light)); opacity: 0; visibility: hidden; }
        #back-to-top.visible { opacity: 1; visibility: visible; }
        #back-to-top:hover { transform: translateY(-4px); box-shadow: var(--shadow-heavy); }

        /* ─── Footer ─── */
        .footer {
            background: linear-gradient(135deg, #001233 0%, #1e3c72 100%);
            color: white; padding: 60px 0 20px; position: relative; overflow: hidden;
        }
        .footer::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-light), var(--secondary-color));
        }
        .footer-top { display: grid; grid-template-columns: 2fr 1fr 1fr 1.5fr; gap: 40px; margin-bottom: 40px; }
        .footer-column h3 { color: white; font-size: 20px; font-weight: 600; margin-bottom: 24px; position: relative; }
        .footer-column h3::after {
            content: ''; position: absolute; bottom: -8px; left: 0;
            width: 40px; height: 3px; background: var(--primary-color); border-radius: 2px;
        }
        .footer-logo { display: flex; align-items: center; margin-bottom: 20px; }
        .footer-logo span { font-size: 24px; font-weight: 600; color: white; margin-left: 12px; }
        .footer-logo .highlight { color: var(--primary-color); }
        .footer-column p { color: #b2bec3; line-height: 1.6; margin-bottom: 24px; }
        .footer-links { list-style: none; padding: 0; margin: 0; }
        .footer-links li { margin-bottom: 12px; }
        .footer-links a {
            color: #b2bec3; text-decoration: none; font-size: 15px;
            transition: var(--transition); display: flex; align-items: center; padding: 4px 0;
        }
        .footer-links a:hover { color: var(--primary-color); transform: translateX(5px); }
        .footer-contact { list-style: none; padding: 0; margin: 0; }
        .footer-contact li { display: flex; align-items: center; margin-bottom: 16px; color: #b2bec3; font-size: 15px; }
        .footer-contact i { color: var(--primary-color); margin-right: 12px; width: 18px; text-align: center; }
        .footer-social { display: flex; gap: 16px; margin-top: 20px; }
        .footer-social .social-icon {
            width: 44px; height: 44px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            background: rgba(255,255,255,0.1); color: white; font-size: 18px;
            transition: var(--transition); border: 2px solid transparent; text-decoration: none;
        }
        .footer-social .social-icon:hover {
            background: var(--primary-color); border-color: var(--primary-color);
            transform: translateY(-3px); box-shadow: 0 8px 20px rgba(67,97,238,0.3);
        }
        .footer-whatsapp {
            background: linear-gradient(135deg, #25d366, #128c7e); color: white;
            padding: 10px 20px; border-radius: 25px; text-decoration: none;
            font-size: 14px; font-weight: 500; transition: var(--transition);
            display: inline-flex; align-items: center; gap: 8px; margin-top: 8px;
        }
        .footer-whatsapp:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(37,211,102,0.3); }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1); padding-top: 30px;
            display: flex; justify-content: space-between; align-items: center;
            flex-wrap: wrap; gap: 20px;
        }
        .copyright p { margin: 0; color: #b2bec3; font-size: 14px; }
        .footer-bottom-links { display: flex; gap: 24px; flex-wrap: wrap; }
        .footer-bottom-links a { color: #b2bec3; text-decoration: none; font-size: 14px; transition: var(--transition); }
        .footer-bottom-links a:hover { color: var(--primary-color); }
        .footer-bottom-links a.active-link { color: var(--primary-color); font-weight: 600; }

        /* ─── Responsive ─── */
        @media (max-width: 1200px) {
            .container { padding: 0 20px; }
            .footer-top { grid-template-columns: 1fr 1fr; }
            .summary-grid { grid-template-columns: 1fr 1fr; }
            .policy-layout { grid-template-columns: 240px 1fr; gap: 32px; }
        }
        @media (max-width: 992px) {
            .policy-layout { grid-template-columns: 1fr; }
            .policy-toc { position: static; }
            .toc-box { display: none; } /* Hide sidebar TOC on mobile, use inline nav */
            .rights-grid { grid-template-columns: 1fr; }
            .policy-block { padding: 36px 28px; }
        }
        @media (max-width: 768px) {
            .nav-links {
                display: none; position: fixed; top: 0; left: 0;
                width: 100%; height: 100vh; background: rgba(255,255,255,0.98);
                backdrop-filter: blur(10px); flex-direction: column;
                align-items: center; justify-content: center; z-index: 1000; gap: 32px;
            }
            .nav-links.active { display: flex; }
            .nav-links li a { font-size: 24px; font-weight: 600; }
            .mobile-menu-btn { display: flex; }
            .mobile-menu-btn.active span:nth-child(1) { transform: rotate(45deg) translate(6px,6px); }
            .mobile-menu-btn.active span:nth-child(2) { opacity: 0; transform: translateX(20px); }
            .mobile-menu-btn.active span:nth-child(3) { transform: rotate(-45deg) translate(6px,-6px); }
            .nav-buttons { display: none; }
            .summary-grid { grid-template-columns: 1fr 1fr; }
            .cta-box { padding: 50px 28px; }
            .footer-top { grid-template-columns: 1fr; }
            .footer-bottom { flex-direction: column; text-align: center; }
            .floating-whatsapp, #back-to-top { width: 50px; height: 50px; font-size: 20px; }
            .contact-block { padding: 28px 22px; }
            .contact-block-links { flex-direction: column; }
        }
        @media (max-width: 480px) {
            .container { padding: 0 16px; }
            .summary-grid { grid-template-columns: 1fr; }
            .policy-block { padding: 28px 20px; }
            .data-table { font-size: 13px; }
            .data-table th, .data-table td { padding: 10px 12px; }
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

    <div class="loading-overlay" id="loadingOverlay"><div class="spinner"></div></div>
    <a href="#main-content" class="skip-to-content">Skip to main content</a>

    <!-- ─── HEADER ─── -->
    <header id="header" role="banner">
        <div class="container">
            <div class="header-container">
                <a href="../" class="logo" aria-label="<?php echo htmlspecialchars($site_name); ?> Homepage">
                    <svg width="50" height="50" viewBox="0 0 60 60" aria-hidden="true">
                        <defs>
                            <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#4361ee;stop-opacity:1"/>
                                <stop offset="100%" style="stop-color:#3a56d5;stop-opacity:1"/>
                            </linearGradient>
                            <filter id="shadow" x="-20%" y="-20%" width="140%" height="140%">
                                <feGaussianBlur in="SourceAlpha" stdDeviation="3"/>
                                <feOffset dx="0" dy="2" result="offsetblur"/>
                                <feComponentTransfer><feFuncA type="linear" slope="0.3"/></feComponentTransfer>
                                <feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/></feMerge>
                            </filter>
                        </defs>
                        <circle cx="30" cy="30" r="28" fill="url(#grad1)" filter="url(#shadow)"/>
                        <rect x="16" y="16" width="28" height="28" rx="3" fill="none" stroke="#fff" stroke-width="2.5"/>
                        <path d="M21,22 L39,22" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                        <path d="M21,28 L39,28" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                        <path d="M21,34 L34,34" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                        <path d="M21,40 L30,40" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                        <circle cx="30" cy="30" r="14" fill="none" stroke="#ffbe0b" stroke-width="1.5" stroke-dasharray="4,2"/>
                        <path d="M42,18 L44,20 L42,22" stroke="#ffbe0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Print<span class="highlight">Portal</span></span>
                </a>

                <nav role="navigation" aria-label="Main navigation">
                    <ul class="nav-links" id="navLinks">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="how-it-works.php">How It Works</a></li>
                        <li class="nav-dropdown">
                            <a href="#" aria-haspopup="true" aria-expanded="false">
                                Our Services <i class="fas fa-chevron-down" style="font-size:10px;margin-left:4px;"></i>
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
                    <a href="dashboard/login.php" class="btn secondary-btn"><i class="fa fa-key"></i> Login</a>
                    <a href="dashboard/register.php" class="btn primary-btn">Register</a>
                </div>
                <button class="mobile-menu-btn" aria-label="Toggle mobile menu" aria-expanded="false">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </header>

    <main id="main-content">

        <!-- ─── PAGE HERO ─── -->
        <section class="page-hero">
            <div class="container">
                <div class="page-hero-content fade-in">
                    <div class="breadcrumb">
                        <a href="index.php"><i class="fas fa-home"></i> Home</a>
                        <span class="sep"><i class="fas fa-chevron-right" style="font-size:10px;"></i></span>
                        <span class="current">Privacy Policy</span>
                    </div>
                    <h1>Privacy <span class="highlight">Policy</span></h1>
                    <p>We are committed to protecting your personal data and being fully transparent about how we collect, use, and safeguard information across <?php echo htmlspecialchars($site_name); ?>.</p>
                    <div class="updated-badge">
                        <i class="fas fa-calendar-check"></i>
                        Last Updated: <?php echo $last_updated; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── QUICK SUMMARY CARDS ─── -->
        <section class="summary-section">
            <div class="container">
                <div style="text-align:center; margin-bottom:48px;">
                    <span class="section-label"><i class="fas fa-shield-alt" style="margin-right:6px;"></i> Privacy at a Glance</span>
                    <h2 style="font-size:clamp(1.8rem,3.5vw,2.6rem);font-weight:700;margin:0 0 14px;">Our Core <span class="highlight">Commitments</span> to You</h2>
                    <p style="font-size:16px;color:var(--text-light);max-width:600px;margin:0 auto;">Before reading the full policy, here is a plain-English summary of our most important privacy promises.</p>
                </div>
                <div class="summary-grid">
                    <div class="summary-card fade-in">
                        <div class="summary-icon"><i class="fas fa-ban"></i></div>
                        <h3>We Never Sell Your Data</h3>
                        <p>Your personal information is never sold, rented, or traded to any third-party advertiser, data broker, or commercial entity — ever.</p>
                    </div>
                    <div class="summary-card fade-in">
                        <div class="summary-icon"><i class="fas fa-database"></i></div>
                        <h3>No Document Data Stored</h3>
                        <p>Citizen document data fetched from government APIs (Aadhaar, PAN, etc.) is used only to generate the printout and is never stored on our servers.</p>
                    </div>
                    <div class="summary-card fade-in">
                        <div class="summary-icon"><i class="fas fa-lock"></i></div>
                        <h3>Bank-Grade Encryption</h3>
                        <p>All data in transit is protected with 256-bit SSL/TLS encryption. Your account credentials are stored using industry-standard hashing algorithms.</p>
                    </div>
                    <div class="summary-card fade-in">
                        <div class="summary-icon"><i class="fas fa-user-shield"></i></div>
                        <h3>You Control Your Data</h3>
                        <p>You can request access to, correction of, or deletion of your personal data at any time by contacting our support team.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── MAIN POLICY LAYOUT ─── -->
        <section class="policy-section">
            <div class="container">
                <div class="policy-layout">

                    <!-- ─── SIDEBAR TOC ─── -->
                    <aside class="policy-toc" aria-label="Table of contents">
                        <div class="toc-box">
                            <p class="toc-title"><i class="fas fa-list-ul"></i> Table of Contents</p>
                            <ul class="toc-list" id="tocList">
                                <li><a href="#section-intro" class="toc-active"><span class="toc-num">1</span> Introduction</a></li>
                                <li><a href="#section-collect"><span class="toc-num">2</span> Information We Collect</a></li>
                                <li><a href="#section-use"><span class="toc-num">3</span> How We Use Your Data</a></li>
                                <li><a href="#section-share"><span class="toc-num">4</span> Sharing &amp; Disclosure</a></li>
                                <li><a href="#section-security"><span class="toc-num">5</span> Data Security</a></li>
                                <li><a href="#section-cookies"><span class="toc-num">6</span> Cookies &amp; Tracking</a></li>
                                <li><a href="#section-retention"><span class="toc-num">7</span> Data Retention</a></li>
                                <li><a href="#section-rights"><span class="toc-num">8</span> Your Rights</a></li>
                                <li><a href="#section-children"><span class="toc-num">9</span> Children's Privacy</a></li>
                                <li><a href="#section-changes"><span class="toc-num">10</span> Policy Changes</a></li>
                                <li><a href="#section-contact"><span class="toc-num">11</span> Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="toc-contact" style="margin-top:20px;">
                            <p>Have a privacy concern? Our team responds within 24 hours.</p>
                            <a href="mailto:<?php echo htmlspecialchars($email); ?>">
                                <i class="fas fa-envelope"></i> Email Us
                            </a>
                        </div>
                    </aside>

                    <!-- ─── POLICY CONTENT ─── -->
                    <div class="policy-content">

                        <!-- 1. Introduction -->
                        <div class="policy-block fade-in" id="section-intro">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-file-shield"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 01</div>
                                    <h2>Introduction</h2>
                                </div>
                            </div>
                            <p>Welcome to <strong><?php echo htmlspecialchars($site_name); ?></strong> ("we", "our", or "us"). We operate the website <strong>titanprint.co.in</strong> and associated services, providing digital government document printing solutions to operators across India.</p>
                            <p>This Privacy Policy explains how we collect, use, disclose, and safeguard your personal information when you register for, access, or use our platform. It also describes your rights and choices with respect to your data.</p>
                            <p>By accessing or using <?php echo htmlspecialchars($site_name); ?>, you acknowledge that you have read, understood, and agree to the terms of this Privacy Policy. If you do not agree, please do not use our services.</p>
                            <div class="info-box info-box-blue">
                                <i class="fas fa-info-circle"></i>
                                <div>This policy applies to all users of <?php echo htmlspecialchars($site_name); ?> — including registered operators, visitors to our website, and end-customers whose document data is processed through our platform by an operator.</div>
                            </div>
                        </div>

                        <!-- 2. Information We Collect -->
                        <div class="policy-block fade-in" id="section-collect">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-database"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 02</div>
                                    <h2>Information We Collect</h2>
                                </div>
                            </div>

                            <h3><i class="fas fa-user"></i> Account & Registration Data</h3>
                            <p>When you create an operator account, we collect the following information:</p>
                            <ul class="policy-list">
                                <li><i class="fas fa-dot-circle"></i><span><strong>Full Name</strong> — used to identify your account and personalise your dashboard.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Mobile Number</strong> — used for OTP verification, login, and support communications.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Email Address</strong> — used for account notifications, invoices, and support.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Password (hashed)</strong> — stored as a one-way encrypted hash; we cannot see your plaintext password.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Business/Shop Name</strong> (optional) — to personalise your operator profile.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>State &amp; City</strong> — used to improve regional service availability and support routing.</span></li>
                            </ul>

                            <h3><i class="fas fa-credit-card"></i> Wallet & Payment Data</h3>
                            <p>When you recharge your wallet, our payment gateway partner processes the transaction. We retain only:</p>
                            <ul class="policy-list">
                                <li><i class="fas fa-dot-circle"></i><span><strong>Transaction ID</strong> — for your records and dispute resolution.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Amount &amp; Timestamp</strong> — for billing and wallet history.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Payment Method Type</strong> (UPI / Card / Net Banking) — not the actual card number or UPI ID.</span></li>
                            </ul>
                            <div class="info-box info-box-green">
                                <i class="fas fa-shield-alt"></i>
                                <div><strong>We are PCI-DSS compliant.</strong> Full card details, CVV numbers, and UPI PINs are never stored on our servers. All payment processing is handled by our certified gateway partners.</div>
                            </div>

                            <h3><i class="fas fa-id-card"></i> Document Fetch Data (Citizen Data)</h3>
                            <p>When an operator uses our platform to fetch a government document, the citizen's identifier (Aadhaar number, PAN, EPIC number, etc.) is transmitted to the relevant government API. The fetched data — name, photo, address — is:</p>
                            <ul class="policy-list">
                                <li><i class="fas fa-dot-circle"></i><span>Used <strong>only</strong> to generate the print file in real time.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Not stored</strong> permanently on our servers after the print session ends.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span>Logged in anonymised form (document type + timestamp only) for audit and billing purposes.</span></li>
                            </ul>

                            <h3><i class="fas fa-chart-bar"></i> Usage & Technical Data</h3>
                            <p>We automatically collect certain technical data when you use our platform:</p>
                            <table class="data-table">
                                <thead>
                                    <tr><th>Data Type</th><th>Purpose</th><th>Retention</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>IP Address</strong></td><td>Security, fraud prevention, and rate limiting</td><td>90 days</td></tr>
                                    <tr><td><strong>Browser &amp; OS</strong></td><td>Technical support and compatibility</td><td>90 days</td></tr>
                                    <tr><td><strong>Pages Visited</strong></td><td>Analytics and product improvement</td><td>12 months</td></tr>
                                    <tr><td><strong>Login Timestamps</strong></td><td>Security and audit trail</td><td>12 months</td></tr>
                                    <tr><td><strong>Error Logs</strong></td><td>Platform stability and bug fixing</td><td>30 days</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- 3. How We Use Your Data -->
                        <div class="policy-block fade-in" id="section-use">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-cogs"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 03</div>
                                    <h2>How We Use Your Data</h2>
                                </div>
                            </div>
                            <p>We use the personal information we collect only for legitimate, clearly defined purposes. We will never use your data in ways you would not reasonably expect.</p>
                            <ul class="policy-list">
                                <li><i class="fas fa-check-circle"></i><span><strong>Account Management</strong> — Creating, maintaining, and securing your operator account.</span></li>
                                <li><i class="fas fa-check-circle"></i><span><strong>Service Delivery</strong> — Processing your document print requests and wallet transactions.</span></li>
                                <li><i class="fas fa-check-circle"></i><span><strong>Customer Support</strong> — Responding to your queries, complaints, and refund requests.</span></li>
                                <li><i class="fas fa-check-circle"></i><span><strong>Security &amp; Fraud Prevention</strong> — Detecting unauthorised access, suspicious activity, and abuse of our platform.</span></li>
                                <li><i class="fas fa-check-circle"></i><span><strong>Platform Improvement</strong> — Analysing usage patterns (in aggregated, anonymised form) to improve our product.</span></li>
                                <li><i class="fas fa-check-circle"></i><span><strong>Legal Compliance</strong> — Meeting obligations under Indian law, including the IT Act 2000 and DPDP Act 2023.</span></li>
                                <li><i class="fas fa-check-circle"></i><span><strong>Communication</strong> — Sending important service notifications, transaction receipts, and security alerts (not marketing without consent).</span></li>
                            </ul>
                            <div class="info-box info-box-yellow">
                                <i class="fas fa-bullhorn"></i>
                                <div><strong>Marketing communications:</strong> We will only send you promotional messages if you have explicitly opted in. You can unsubscribe at any time via the link in any marketing email or by contacting support.</div>
                            </div>
                        </div>

                        <!-- 4. Sharing & Disclosure -->
                        <div class="policy-block fade-in" id="section-share">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-share-alt"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 04</div>
                                    <h2>Sharing &amp; Disclosure</h2>
                                </div>
                            </div>
                            <p>We do not sell, rent, or trade your personal information. We may share limited data only in the following specific circumstances:</p>

                            <h3><i class="fas fa-handshake"></i> Trusted Service Providers</h3>
                            <ul class="policy-list">
                                <li><i class="fas fa-dot-circle"></i><span><strong>Payment Gateways</strong> — Razorpay / PayU / CCAvenue process wallet recharges securely. They operate under their own privacy policies.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>SMS &amp; OTP Providers</strong> — Your mobile number is shared with our OTP gateway solely to deliver verification codes.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Cloud Hosting</strong> — Our servers are hosted on reputable cloud providers (e.g., AWS, DigitalOcean) with SOC2-compliant data centres.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Analytics Tools</strong> — We use Google Analytics with IP anonymisation enabled. No personally identifiable data is shared.</span></li>
                            </ul>

                            <h3><i class="fas fa-landmark"></i> Government &amp; Legal Obligations</h3>
                            <p>We may disclose your information if required to do so by applicable law, court order, or government authority — including the Ministry of Electronics &amp; Information Technology (MeitY) and law enforcement agencies — under the Information Technology Act, 2000 or any successor legislation.</p>

                            <h3><i class="fas fa-building"></i> Business Transfers</h3>
                            <p>In the event of a merger, acquisition, or sale of assets, your personal data may be transferred to the successor entity. We will notify you via email or a prominent notice on the website before your data becomes subject to a different privacy policy.</p>

                            <div class="info-box info-box-blue">
                                <i class="fas fa-globe"></i>
                                <div>All our data processors and sub-processors are contractually bound to process your data only as instructed by us and to implement appropriate security measures in line with Indian data protection standards.</div>
                            </div>
                        </div>

                        <!-- 5. Data Security -->
                        <div class="policy-block fade-in" id="section-security">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-lock"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 05</div>
                                    <h2>Data Security</h2>
                                </div>
                            </div>
                            <p>We implement a multi-layered approach to data security, combining technical controls, organisational policies, and regular audits to protect your information from unauthorised access, alteration, disclosure, or destruction.</p>
                            <ul class="policy-list">
                                <li><i class="fas fa-shield-alt"></i><span><strong>256-bit SSL/TLS Encryption</strong> — All data transmitted between your browser and our servers is encrypted in transit.</span></li>
                                <li><i class="fas fa-shield-alt"></i><span><strong>Password Hashing (bcrypt)</strong> — Passwords are hashed with a strong one-way algorithm; we cannot recover or read your password.</span></li>
                                <li><i class="fas fa-shield-alt"></i><span><strong>Two-Factor Authentication (OTP)</strong> — OTP verification is required during login and sensitive account actions.</span></li>
                                <li><i class="fas fa-shield-alt"></i><span><strong>Rate Limiting &amp; CAPTCHA</strong> — Automated abuse, brute-force login attempts, and API scraping are blocked at the server level.</span></li>
                                <li><i class="fas fa-shield-alt"></i><span><strong>Firewall &amp; DDoS Protection</strong> — Our infrastructure is protected by enterprise-grade firewalls and DDoS mitigation services.</span></li>
                                <li><i class="fas fa-shield-alt"></i><span><strong>Regular Security Audits</strong> — Penetration tests and vulnerability scans are conducted regularly by independent security teams.</span></li>
                                <li><i class="fas fa-shield-alt"></i><span><strong>Access Controls</strong> — Staff access to production data is role-based, logged, and audited. Minimum necessary access principle is strictly followed.</span></li>
                            </ul>
                            <div class="info-box info-box-yellow">
                                <i class="fas fa-exclamation-triangle"></i>
                                <div><strong>Reporting a security issue:</strong> If you discover a security vulnerability on our platform, please disclose it responsibly to <a href="mailto:<?php echo htmlspecialchars($email); ?>" style="color:var(--primary-color);font-weight:600;"><?php echo htmlspecialchars($email); ?></a>. We take all security reports seriously and respond within 48 hours.</div>
                            </div>
                        </div>

                        <!-- 6. Cookies & Tracking -->
                        <div class="policy-block fade-in" id="section-cookies">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-cookie-bite"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 06</div>
                                    <h2>Cookies &amp; Tracking</h2>
                                </div>
                            </div>
                            <p>We use cookies and similar technologies to keep you logged in, remember your preferences, and understand how our platform is used. We do <strong>not</strong> use cookies for third-party advertising.</p>
                            <table class="data-table">
                                <thead>
                                    <tr><th>Cookie Type</th><th>Purpose</th><th>Duration</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>Session Cookie</strong></td><td>Keeps you logged into your dashboard</td><td>Until browser closes</td></tr>
                                    <tr><td><strong>Authentication Token</strong></td><td>"Remember me" login persistence</td><td>30 days</td></tr>
                                    <tr><td><strong>CSRF Token</strong></td><td>Security — prevents cross-site request forgery attacks</td><td>Session</td></tr>
                                    <tr><td><strong>Preference Cookie</strong></td><td>Remembers language and display settings</td><td>1 year</td></tr>
                                    <tr><td><strong>Analytics (Google)</strong></td><td>Anonymised usage statistics (no PII)</td><td>13 months</td></tr>
                                </tbody>
                            </table>
                            <p>You can control or disable cookies through your browser settings. Note that disabling session cookies will prevent you from logging in to your account.</p>
                        </div>

                        <!-- 7. Data Retention -->
                        <div class="policy-block fade-in" id="section-retention">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-clock"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 07</div>
                                    <h2>Data Retention</h2>
                                </div>
                            </div>
                            <p>We retain your personal data only for as long as necessary to fulfil the purposes described in this policy, or as required by applicable law. Here is our retention schedule:</p>
                            <ul class="policy-list">
                                <li><i class="fas fa-hourglass-half"></i><span><strong>Active Account Data</strong> — Retained for the lifetime of your account plus 3 years after account closure for legal compliance.</span></li>
                                <li><i class="fas fa-hourglass-half"></i><span><strong>Transaction &amp; Wallet Records</strong> — Retained for 7 years as required under Indian financial and tax laws.</span></li>
                                <li><i class="fas fa-hourglass-half"></i><span><strong>Document Fetch Logs</strong> — Anonymised audit logs (document type + timestamp only) retained for 12 months.</span></li>
                                <li><i class="fas fa-hourglass-half"></i><span><strong>Support Ticket Data</strong> — Retained for 2 years after ticket closure to resolve recurring issues.</span></li>
                                <li><i class="fas fa-hourglass-half"></i><span><strong>Server &amp; Access Logs</strong> — Retained for 90 days then automatically deleted.</span></li>
                                <li><i class="fas fa-hourglass-half"></i><span><strong>Deleted Account Data</strong> — Core personal data (name, email, phone) is anonymised within 30 days of account deletion request.</span></li>
                            </ul>
                        </div>

                        <!-- 8. Your Rights -->
                        <div class="policy-block fade-in" id="section-rights">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-user-shield"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 08</div>
                                    <h2>Your Rights</h2>
                                </div>
                            </div>
                            <p>Under the <strong>Digital Personal Data Protection Act, 2023 (DPDP Act)</strong> and other applicable Indian data protection principles, you have the following rights regarding your personal data:</p>
                            <div class="rights-grid">
                                <div class="right-card">
                                    <div class="right-card-header">
                                        <div class="right-card-icon"><i class="fas fa-eye"></i></div>
                                        <h4>Right to Access</h4>
                                    </div>
                                    <p>Request a copy of the personal data we hold about you, including what we collect and how it is used.</p>
                                </div>
                                <div class="right-card">
                                    <div class="right-card-header">
                                        <div class="right-card-icon"><i class="fas fa-edit"></i></div>
                                        <h4>Right to Correction</h4>
                                    </div>
                                    <p>Request correction of inaccurate or incomplete personal data in your account at any time.</p>
                                </div>
                                <div class="right-card">
                                    <div class="right-card-header">
                                        <div class="right-card-icon"><i class="fas fa-trash-alt"></i></div>
                                        <h4>Right to Erasure</h4>
                                    </div>
                                    <p>Request deletion of your personal data, subject to legal retention obligations (e.g., financial records).</p>
                                </div>
                                <div class="right-card">
                                    <div class="right-card-header">
                                        <div class="right-card-icon"><i class="fas fa-download"></i></div>
                                        <h4>Right to Portability</h4>
                                    </div>
                                    <p>Request your personal data in a structured, machine-readable format for transfer to another service.</p>
                                </div>
                                <div class="right-card">
                                    <div class="right-card-header">
                                        <div class="right-card-icon"><i class="fas fa-ban"></i></div>
                                        <h4>Right to Object</h4>
                                    </div>
                                    <p>Object to the processing of your data for marketing purposes or where processing is based on our legitimate interests.</p>
                                </div>
                                <div class="right-card">
                                    <div class="right-card-header">
                                        <div class="right-card-icon"><i class="fas fa-undo"></i></div>
                                        <h4>Right to Withdraw Consent</h4>
                                    </div>
                                    <p>Withdraw any consent you have previously given for optional data processing at any time, without affecting prior processing.</p>
                                </div>
                            </div>
                            <div class="info-box info-box-blue" style="margin-top:24px;">
                                <i class="fas fa-info-circle"></i>
                                <div>To exercise any of these rights, please email us at <strong><?php echo htmlspecialchars($email); ?></strong> with the subject line "Privacy Request". We will respond within <strong>30 days</strong>. We may need to verify your identity before processing the request.</div>
                            </div>
                        </div>

                        <!-- 9. Children's Privacy -->
                        <div class="policy-block fade-in" id="section-children">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-child"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 09</div>
                                    <h2>Children's Privacy</h2>
                                </div>
                            </div>
                            <p><?php echo htmlspecialchars($site_name); ?> is a <strong>business-to-operator platform</strong> intended solely for adults (18 years and above) who register as operators to provide document printing services.</p>
                            <p>We do not knowingly collect personal data from anyone under the age of 18. If you are a parent or guardian and believe that your child has provided us with personal information, please contact us immediately at <strong><?php echo htmlspecialchars($email); ?></strong> and we will promptly delete such information from our systems.</p>
                            <div class="info-box info-box-yellow">
                                <i class="fas fa-exclamation-triangle"></i>
                                <div>Note: While operators may process Aadhaar or other document data for minor citizens as part of their legitimate government service provision, this is done through official government APIs and the data is <strong>never stored</strong> on our platform.</div>
                            </div>
                        </div>

                        <!-- 10. Policy Changes -->
                        <div class="policy-block fade-in" id="section-changes">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-sync-alt"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 10</div>
                                    <h2>Policy Changes</h2>
                                </div>
                            </div>
                            <p>We may update this Privacy Policy from time to time to reflect changes in our services, legal requirements, or best practices. When we make material changes, we will notify you through one or more of the following methods:</p>
                            <ul class="policy-list">
                                <li><i class="fas fa-bell"></i><span>A prominent notice on our website homepage and dashboard.</span></li>
                                <li><i class="fas fa-bell"></i><span>An email notification sent to your registered email address.</span></li>
                                <li><i class="fas fa-bell"></i><span>An SMS alert to your registered mobile number for significant changes.</span></li>
                            </ul>
                            <p>The "Last Updated" date at the top of this page will always reflect when the most recent revision was made. Your continued use of <?php echo htmlspecialchars($site_name); ?> after the effective date of any changes constitutes your acceptance of the updated policy.</p>
                            <p>We encourage you to review this policy periodically. If you disagree with any changes, you may close your account and stop using our services at any time.</p>
                        </div>

                        <!-- 11. Contact Us -->
                        <div class="policy-block fade-in" id="section-contact">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-headset"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 11</div>
                                    <h2>Contact Us</h2>
                                </div>
                            </div>
                            <p>If you have any questions, concerns, or complaints about this Privacy Policy or our data practices, please do not hesitate to reach out. Our team is dedicated to addressing all privacy-related queries promptly and transparently.</p>

                            <div class="contact-block">
                                <h3><i class="fas fa-envelope-open-text" style="margin-right:10px;"></i> Get In Touch</h3>
                                <p>For all privacy-related requests — including data access, deletion, correction, or complaints — contact our Data Protection Officer:</p>
                                <div class="contact-block-links">
                                    <a href="mailto:<?php echo htmlspecialchars($email); ?>" class="white-btn">
                                        <i class="fas fa-envelope"></i> <?php echo htmlspecialchars($email); ?>
                                    </a>
                                    <a href="tel:+91<?php echo htmlspecialchars($phone); ?>">
                                        <i class="fas fa-phone"></i> +91 <?php echo htmlspecialchars($phone); ?>
                                    </a>
                                    <a href="https://wa.me/91<?php echo htmlspecialchars($phone); ?>" target="_blank" rel="noopener">
                                        <i class="fab fa-whatsapp"></i> WhatsApp
                                    </a>
                                </div>
                            </div>

                            <div style="margin-top:24px;">
                                <h3><i class="fas fa-map-marker-alt"></i> Mailing Address</h3>
                                <p><?php echo htmlspecialchars($site_name); ?><br>
                                <?php echo htmlspecialchars($address); ?><br>
                                <strong>Email:</strong> <?php echo htmlspecialchars($email); ?><br>
                                <strong>Working Hours:</strong> Monday – Saturday, 10:00 AM – 7:00 PM IST</p>
                            </div>

                            <div class="info-box info-box-green" style="margin-top:8px;">
                                <i class="fas fa-clock"></i>
                                <div>We aim to respond to all privacy requests within <strong>30 working days</strong>. For urgent security concerns, we respond within <strong>48 hours</strong>.</div>
                            </div>
                        </div>

                    </div><!-- /policy-content -->
                </div><!-- /policy-layout -->
            </div>
        </section>

        <!-- ─── CTA ─── -->
        <section class="cta-section">
            <div class="container">
                <div class="cta-box fade-in">
                    <h2>Your Privacy Is Our <span style="color:var(--secondary-color);">Priority</span></h2>
                    <p>We are committed to keeping your data safe and your trust intact. If you have any privacy concerns, our team is here to help — reach out to us anytime.</p>
                    <div class="cta-buttons">
                        <a href="dashboard/register.php" class="cta-btn-white">
                            <i class="fas fa-user-plus"></i> Create Free Account
                        </a>
                        <a href="contact.php" class="cta-btn-outline">
                            <i class="fas fa-envelope"></i> Contact Support
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
                        <svg width="40" height="40" viewBox="0 0 50 50">
                            <circle cx="25" cy="25" r="23" fill="#4361ee"/>
                            <path d="M15,15 L35,15 L35,35 L15,35 Z" fill="none" stroke="#fff" stroke-width="3"/>
                            <path d="M18,20 L32,20" stroke="#fff" stroke-width="2"/>
                            <path d="M18,25 L32,25" stroke="#fff" stroke-width="2"/>
                            <path d="M18,30 L28,30" stroke="#fff" stroke-width="2"/>
                            <circle cx="25" cy="25" r="10" fill="none" stroke="#ffbe0b" stroke-width="2" stroke-dasharray="15,5"/>
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
                            <a href="mailto:<?php echo htmlspecialchars($email); ?>" style="color:inherit;text-decoration:none;"><?php echo htmlspecialchars($email); ?></a>
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
                    <a href="privacy-policy.php" class="active-link">Privacy Policy</a>
                    <a href="term-of-use.php">Terms of Use</a>
                    <a href="latest-news.php">Latest News</a>
                </div>
            </div>
        </div>
    </footer>

    <a href="https://wa.me/91<?php echo htmlspecialchars($phone); ?>" class="floating-whatsapp" aria-label="Chat on WhatsApp" target="_blank" rel="noopener">
        <i class="fab fa-whatsapp"></i>
    </a>
    <button id="back-to-top" aria-label="Back to top"><i class="fas fa-arrow-up"></i></button>

    <script>
    (function() {
        'use strict';

        /* ── Loading overlay ── */
        window.addEventListener('load', () => {
            const overlay = document.getElementById('loadingOverlay');
            if (overlay) setTimeout(() => overlay.classList.add('hidden'), 300);
        });

        /* ── Header scroll ── */
        const header = document.getElementById('header');
        const backBtn = document.getElementById('back-to-top');
        window.addEventListener('scroll', () => {
            header.classList.toggle('scrolled', window.scrollY > 50);
            if (backBtn) backBtn.classList.toggle('visible', window.scrollY > 400);
        }, { passive: true });

        /* ── Back to top ── */
        if (backBtn) backBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

        /* ── Mobile menu ── */
        const menuBtn = document.querySelector('.mobile-menu-btn');
        const navLinks = document.getElementById('navLinks');
        if (menuBtn && navLinks) {
            menuBtn.addEventListener('click', () => {
                const expanded = menuBtn.classList.toggle('active');
                navLinks.classList.toggle('active');
                menuBtn.setAttribute('aria-expanded', expanded.toString());
            });
            navLinks.querySelectorAll('a').forEach(link => link.addEventListener('click', () => {
                menuBtn.classList.remove('active');
                navLinks.classList.remove('active');
                menuBtn.setAttribute('aria-expanded', 'false');
            }));
        }

        /* ── Fade-in on scroll ── */
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
        }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

        /* ── TOC active state on scroll ── */
        const sections = document.querySelectorAll('.policy-block[id]');
        const tocLinks = document.querySelectorAll('#tocList a');
        const tocObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    tocLinks.forEach(l => l.classList.remove('toc-active'));
                    const active = document.querySelector('#tocList a[href="#' + entry.target.id + '"]');
                    if (active) active.classList.add('toc-active');
                }
            });
        }, { rootMargin: '-80px 0px -60% 0px', threshold: 0 });
        sections.forEach(s => tocObserver.observe(s));

        /* ── Smooth scroll for TOC links ── */
        document.querySelectorAll('.toc-list a, .policy-block-header a').forEach(link => {
            link.addEventListener('click', (e) => {
                const href = link.getAttribute('href');
                if (href && href.startsWith('#')) {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        /* ── Keyboard escape closes mobile menu ── */
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