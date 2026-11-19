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
    <meta name="description" content="Terms of Use - <?php echo htmlspecialchars($site_name); ?>. Read the terms and conditions governing use of India's trusted Aadhaar, PAN, Voter ID, and Driving License printing platform.">
    <meta name="keywords" content="terms of use <?php echo htmlspecialchars($site_name); ?>, terms and conditions, PRINT PORTAL terms, print portal terms of service, aadhaar print terms">
    <title>Terms of Use - <?php echo htmlspecialchars($site_name); ?></title>
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
                <a href="index.php" class="logo" aria-label="<?php echo htmlspecialchars($site_name); ?> Homepage">
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
                        <span class="current">Terms of Use</span>
                    </div>
                    <h1>Terms of <span class="highlight">Use</span></h1>
                    <p>Please read these terms carefully before using <?php echo htmlspecialchars($site_name); ?>. By accessing or registering on our platform, you agree to be bound by these terms and conditions.</p>
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
                    <span class="section-label"><i class="fas fa-file-contract" style="margin-right:6px;"></i> Terms at a Glance</span>
                    <h2 style="font-size:clamp(1.8rem,3.5vw,2.6rem);font-weight:700;margin:0 0 14px;">Key Things to <span class="highlight">Know</span></h2>
                    <p style="font-size:16px;color:var(--text-light);max-width:600px;margin:0 auto;">A plain-English summary of the most important aspects of our terms before you dive into the full document.</p>
                </div>
                <div class="summary-grid">
                    <div class="summary-card fade-in">
                        <div class="summary-icon"><i class="fas fa-user-check"></i></div>
                        <h3>Operators Only</h3>
                        <p>This platform is exclusively for registered operators — cyber cafes, service centres, and CSC agents — who provide document printing services to citizens.</p>
                    </div>
                    <div class="summary-card fade-in">
                        <div class="summary-icon"><i class="fas fa-wallet"></i></div>
                        <h3>Wallet-Based System</h3>
                        <p>All services are paid via a prepaid wallet. Charges are deducted per transaction. Refunds are available for failed transactions under our refund policy.</p>
                    </div>
                    <div class="summary-card fade-in">
                        <div class="summary-icon"><i class="fas fa-shield-alt"></i></div>
                        <h3>Responsible Use</h3>
                        <p>You must use the platform only for lawful purposes. Misuse, fraud, or attempts to bypass government API security will result in immediate account suspension.</p>
                    </div>
                    <div class="summary-card fade-in">
                        <div class="summary-icon"><i class="fas fa-balance-scale"></i></div>
                        <h3>Indian Law Applies</h3>
                        <p>These terms are governed by Indian law. Any disputes shall be resolved in courts of competent jurisdiction in India as specified in Section 11.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── MAIN TERMS LAYOUT ─── -->
        <section class="policy-section">
            <div class="container">
                <div class="policy-layout">

                    <!-- ─── SIDEBAR TOC ─── -->
                    <aside class="policy-toc" aria-label="Table of contents">
                        <div class="toc-box">
                            <p class="toc-title"><i class="fas fa-list-ul"></i> Table of Contents</p>
                            <ul class="toc-list" id="tocList">
                                <li><a href="#section-acceptance" class="toc-active"><span class="toc-num">1</span> Acceptance of Terms</a></li>
                                <li><a href="#section-eligibility"><span class="toc-num">2</span> Eligibility &amp; Registration</a></li>
                                <li><a href="#section-account"><span class="toc-num">3</span> Account Responsibilities</a></li>
                                <li><a href="#section-permitted"><span class="toc-num">4</span> Permitted Use</a></li>
                                <li><a href="#section-prohibited"><span class="toc-num">5</span> Prohibited Activities</a></li>
                                <li><a href="#section-wallet"><span class="toc-num">6</span> Wallet, Pricing &amp; Refunds</a></li>
                                <li><a href="#section-ip"><span class="toc-num">7</span> Intellectual Property</a></li>
                                <li><a href="#section-thirdparty"><span class="toc-num">8</span> Government APIs &amp; Third Parties</a></li>
                                <li><a href="#section-disclaimer"><span class="toc-num">9</span> Disclaimers &amp; Liability</a></li>
                                <li><a href="#section-termination"><span class="toc-num">10</span> Termination &amp; Suspension</a></li>
                                <li><a href="#section-law"><span class="toc-num">11</span> Governing Law</a></li>
                                <li><a href="#section-contact"><span class="toc-num">12</span> Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="toc-contact" style="margin-top:20px;">
                            <p>Have a question about our terms? Our support team is here to help.</p>
                            <a href="mailto:<?php echo htmlspecialchars($email); ?>">
                                <i class="fas fa-envelope"></i> Email Us
                            </a>
                        </div>
                    </aside>

                    <!-- ─── TERMS CONTENT ─── -->
                    <div class="policy-content">

                        <!-- 1. Acceptance of Terms -->
                        <div class="policy-block fade-in" id="section-acceptance">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-handshake"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 01</div>
                                    <h2>Acceptance of Terms</h2>
                                </div>
                            </div>
                            <p>Welcome to <strong><?php echo htmlspecialchars($site_name); ?></strong> ("Platform", "we", "our", or "us"). By accessing our website, creating an account, or using any of our services, you ("Operator", "User", "you") confirm that you have read, understood, and agree to be bound by these Terms of Use ("Terms") and our Privacy Policy, which is incorporated herein by reference.</p>
                            <p>These Terms constitute a legally binding agreement between you and <?php echo htmlspecialchars($site_name); ?>. If you do not agree with any part of these Terms, you must immediately stop using the Platform and close your account.</p>
                            <p>We may update these Terms from time to time. The latest version will always be available on this page with the "Last Updated" date shown above. Continued use of the Platform after any changes constitutes your acceptance of the revised Terms.</p>
                            <div class="info-box info-box-blue">
                                <i class="fas fa-info-circle"></i>
                                <div>These Terms apply to all users of <?php echo htmlspecialchars($site_name); ?> — including registered operators, visitors to the website, and any person who accesses or uses the Platform in any capacity. Acceptance of these Terms is required to use any service on the Platform.</div>
                            </div>
                        </div>

                        <!-- 2. Eligibility & Registration -->
                        <div class="policy-block fade-in" id="section-eligibility">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-user-plus"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 02</div>
                                    <h2>Eligibility &amp; Registration</h2>
                                </div>
                            </div>

                            <h3><i class="fas fa-id-badge"></i> Who Can Register</h3>
                            <p>To use <?php echo htmlspecialchars($site_name); ?>, you must meet all of the following eligibility criteria:</p>
                            <ul class="policy-list">
                                <li><i class="fas fa-check-circle"></i><span><strong>Age:</strong> You must be at least 18 years of age at the time of registration.</span></li>
                                <li><i class="fas fa-check-circle"></i><span><strong>Legal Capacity:</strong> You must have the legal capacity to enter into a binding contract under applicable Indian law.</span></li>
                                <li><i class="fas fa-check-circle"></i><span><strong>Business Purpose:</strong> You must be operating a cyber cafe, common service centre (CSC), digital seva kendra, or similar government document service outlet.</span></li>
                                <li><i class="fas fa-check-circle"></i><span><strong>Valid Mobile Number:</strong> You must provide a valid Indian mobile number capable of receiving OTP verification.</span></li>
                                <li><i class="fas fa-check-circle"></i><span><strong>Not Barred:</strong> You must not have been previously suspended or terminated from <?php echo htmlspecialchars($site_name); ?> for any policy violation.</span></li>
                            </ul>

                            <h3><i class="fas fa-clipboard-check"></i> Account Registration</h3>
                            <p>During registration, you agree to provide accurate, current, and complete information. You must promptly update your registration details if they change. We reserve the right to suspend or terminate accounts where false, misleading, or incomplete information is provided.</p>

                            <div class="info-box info-box-yellow">
                                <i class="fas fa-exclamation-triangle"></i>
                                <div><strong>One account per operator:</strong> Each operator may maintain only one active account on the Platform. Creating multiple accounts to bypass restrictions, wallet limits, or suspension is strictly prohibited and may result in permanent ban.</div>
                            </div>
                        </div>

                        <!-- 3. Account Responsibilities -->
                        <div class="policy-block fade-in" id="section-account">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-user-shield"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 03</div>
                                    <h2>Account Responsibilities</h2>
                                </div>
                            </div>
                            <p>As a registered operator, you are solely responsible for maintaining the confidentiality and security of your login credentials, and for all activities that occur under your account.</p>
                            <ul class="policy-list">
                                <li><i class="fas fa-lock"></i><span><strong>Keep Credentials Secure:</strong> Do not share your username, password, or OTP with any other person. We will never ask for your password via phone, email, or WhatsApp.</span></li>
                                <li><i class="fas fa-lock"></i><span><strong>Unauthorised Access:</strong> Immediately notify us at <strong><?php echo htmlspecialchars($email); ?></strong> if you suspect any unauthorised access to or use of your account.</span></li>
                                <li><i class="fas fa-lock"></i><span><strong>Device Security:</strong> You are responsible for ensuring that the devices from which you access the Platform are secure and free from malware or keyloggers.</span></li>
                                <li><i class="fas fa-lock"></i><span><strong>Liability for Misuse:</strong> <?php echo htmlspecialchars($site_name); ?> will not be liable for any loss or damage arising from your failure to keep your account credentials secure.</span></li>
                                <li><i class="fas fa-lock"></i><span><strong>Accurate Profile:</strong> Keep your registered mobile number and email address up to date to receive important security alerts, OTPs, and service notifications.</span></li>
                            </ul>
                            <div class="info-box info-box-green">
                                <i class="fas fa-shield-alt"></i>
                                <div><strong>Two-Factor Authentication:</strong> For your security, OTP-based two-factor authentication is mandatory for login and sensitive account actions on our Platform. Please ensure your registered mobile number remains active.</div>
                            </div>
                        </div>

                        <!-- 4. Permitted Use -->
                        <div class="policy-block fade-in" id="section-permitted">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-thumbs-up"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 04</div>
                                    <h2>Permitted Use of Services</h2>
                                </div>
                            </div>
                            <p>Subject to these Terms, <?php echo htmlspecialchars($site_name); ?> grants you a limited, non-exclusive, non-transferable, revocable licence to access and use the Platform for its intended purpose. The following uses are expressly permitted:</p>
                            <ul class="policy-list">
                                <li><i class="fas fa-dot-circle"></i><span><strong>Document Printing Services:</strong> Use the Platform to fetch and print Aadhaar cards, PAN cards, Voter ID cards, Driving Licences, RC certificates, and other supported government documents for your customers.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Wallet Management:</strong> Recharge your operator wallet and use wallet balance to pay for document print transactions.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Transaction History:</strong> Access your own transaction and print history for record-keeping and reconciliation.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Profile Management:</strong> Update your operator profile, contact information, and account settings.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Support:</strong> Contact our support team for technical assistance, refund requests, or account queries.</span></li>
                            </ul>
                            <div class="info-box info-box-blue">
                                <i class="fas fa-info-circle"></i>
                                <div>All services on this Platform are provided solely to assist registered operators in delivering legitimate government document printing services to citizens. Any use outside this scope requires prior written permission from <?php echo htmlspecialchars($site_name); ?>.</div>
                            </div>
                        </div>

                        <!-- 5. Prohibited Activities -->
                        <div class="policy-block fade-in" id="section-prohibited">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-ban"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 05</div>
                                    <h2>Prohibited Activities</h2>
                                </div>
                            </div>
                            <p>The following activities are strictly prohibited on the Platform. Violation of any of these rules will result in immediate account suspension and may result in legal action:</p>

                            <h3><i class="fas fa-exclamation-circle"></i> Identity &amp; Document Fraud</h3>
                            <ul class="policy-list">
                                <li><i class="fas fa-times-circle"></i><span>Fetching, printing, or accessing any citizen's documents without their knowledge and explicit consent.</span></li>
                                <li><i class="fas fa-times-circle"></i><span>Using the Platform to fraudulently obtain, misuse, or sell citizens' personal or biometric data.</span></li>
                                <li><i class="fas fa-times-circle"></i><span>Attempting to create, alter, or print forged, tampered, or counterfeit government documents.</span></li>
                                <li><i class="fas fa-times-circle"></i><span>Using the Platform for identity theft, impersonation, or any activity that violates citizens' fundamental rights.</span></li>
                            </ul>

                            <h3><i class="fas fa-bug"></i> Technical Misuse</h3>
                            <ul class="policy-list">
                                <li><i class="fas fa-times-circle"></i><span>Attempting to reverse-engineer, decompile, scrape, or exploit any part of the Platform, its APIs, or underlying software.</span></li>
                                <li><i class="fas fa-times-circle"></i><span>Launching denial-of-service attacks, brute-force login attempts, or any automated bot activity against the Platform.</span></li>
                                <li><i class="fas fa-times-circle"></i><span>Attempting to bypass or circumvent government API rate limits, OTP verification, or any other security mechanism.</span></li>
                                <li><i class="fas fa-times-circle"></i><span>Using automated scripts, bots, or tools to fetch documents in bulk without human operator intervention.</span></li>
                            </ul>

                            <h3><i class="fas fa-rupee-sign"></i> Financial Misuse</h3>
                            <ul class="policy-list">
                                <li><i class="fas fa-times-circle"></i><span>Using stolen, fraudulent, or unauthorised payment instruments to recharge your wallet.</span></li>
                                <li><i class="fas fa-times-circle"></i><span>Filing false or fraudulent chargeback claims with your bank or payment provider after receiving services.</span></li>
                                <li><i class="fas fa-times-circle"></i><span>Reselling, transferring, or sub-licensing your operator account, wallet balance, or access credentials to any third party.</span></li>
                            </ul>

                            <div class="info-box info-box-yellow">
                                <i class="fas fa-exclamation-triangle"></i>
                                <div><strong>Zero Tolerance Policy:</strong> Any prohibited activity — especially those involving citizen data misuse or identity fraud — will be reported immediately to the relevant government authorities, including UIDAI, the Cyber Crime Cell, and the Ministry of Electronics &amp; IT (MeitY), as mandated by Indian law.</div>
                            </div>
                        </div>

                        <!-- 6. Wallet, Pricing & Refund Policy -->
                        <div class="policy-block fade-in" id="section-wallet">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-wallet"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 06</div>
                                    <h2>Wallet, Pricing &amp; Refund Policy</h2>
                                </div>
                            </div>

                            <h3><i class="fas fa-coins"></i> Wallet System</h3>
                            <p>All services on <?php echo htmlspecialchars($site_name); ?> are paid through a prepaid operator wallet. You must maintain a sufficient wallet balance before initiating any print transaction. Wallet balances are non-interest-bearing and non-transferable between accounts.</p>
                            <table class="data-table">
                                <thead>
                                    <tr><th>Item</th><th>Policy</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>Minimum Recharge</strong></td><td>As displayed on the wallet recharge page (subject to change)</td></tr>
                                    <tr><td><strong>Recharge Methods</strong></td><td>UPI, Net Banking, Debit Card, Credit Card via authorised payment gateways</td></tr>
                                    <tr><td><strong>Balance Validity</strong></td><td>Wallet balance does not expire as long as your account is active</td></tr>
                                    <tr><td><strong>Transaction Charges</strong></td><td>Per-service charges are displayed before each transaction and deducted in real time</td></tr>
                                    <tr><td><strong>GST</strong></td><td>Applicable taxes (including GST) will be applied as per current Indian tax law</td></tr>
                                    <tr><td><strong>Balance on Closure</strong></td><td>Unused balance may be refunded upon account closure, subject to KYC verification</td></tr>
                                </tbody>
                            </table>

                            <h3><i class="fas fa-undo"></i> Refund Policy</h3>
                            <p>Refunds are processed only in the following circumstances:</p>
                            <ul class="policy-list">
                                <li><i class="fas fa-check-circle"></i><span><strong>Failed Transactions:</strong> If a wallet recharge payment is debited from your bank account but not credited to your wallet, a full refund will be initiated within 5–7 business days after verification.</span></li>
                                <li><i class="fas fa-check-circle"></i><span><strong>Double Deduction:</strong> If your wallet is charged twice for the same print transaction due to a system error, the excess amount will be automatically reversed within 24 hours.</span></li>
                                <li><i class="fas fa-check-circle"></i><span><strong>Service Unavailability:</strong> If you are charged for a transaction that failed due to downtime of government APIs or our Platform, the charge will be reversed to your wallet.</span></li>
                            </ul>

                            <div class="info-box info-box-yellow">
                                <i class="fas fa-exclamation-triangle"></i>
                                <div><strong>No Refunds for Successful Transactions:</strong> Once a document has been successfully fetched and the print file delivered, the transaction charge is non-refundable — regardless of whether the printout was used or discarded. All sales of completed services are final.</div>
                            </div>
                        </div>

                        <!-- 7. Intellectual Property -->
                        <div class="policy-block fade-in" id="section-ip">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-copyright"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 07</div>
                                    <h2>Intellectual Property</h2>
                                </div>
                            </div>
                            <p>All content, software, designs, trademarks, logos, text, graphics, and other materials on the <?php echo htmlspecialchars($site_name); ?> Platform are the exclusive intellectual property of <?php echo htmlspecialchars($site_name); ?> or its licensors, protected under applicable Indian and international intellectual property laws.</p>
                            <ul class="policy-list">
                                <li><i class="fas fa-dot-circle"></i><span><strong>No Copying:</strong> You may not copy, reproduce, distribute, transmit, modify, display, or create derivative works from any part of the Platform without prior written consent.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>No Reverse Engineering:</strong> You may not decompile, disassemble, or attempt to extract the source code of any software forming part of the Platform.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Trademarks:</strong> The <?php echo htmlspecialchars($site_name); ?> name, logo, and all related marks are our trademarks. You may not use them without express written permission.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Operator Content:</strong> Any feedback, suggestions, or ideas you submit to us may be used by us without restriction or compensation to you.</span></li>
                            </ul>
                            <div class="info-box info-box-blue">
                                <i class="fas fa-info-circle"></i>
                                <div>Government document templates, seals, and emblems used in print outputs belong to the respective government authorities (UIDAI, ECI, MoRTH, etc.) and are subject to their respective terms of use and copyright protections.</div>
                            </div>
                        </div>

                        <!-- 8. Government APIs & Third-Party Services -->
                        <div class="policy-block fade-in" id="section-thirdparty">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-server"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 08</div>
                                    <h2>Government APIs &amp; Third-Party Services</h2>
                                </div>
                            </div>
                            <p><?php echo htmlspecialchars($site_name); ?> operates as an intermediary platform that connects operators to authorised government document APIs. Our ability to provide services is entirely dependent on the availability and functioning of these external systems.</p>

                            <h3><i class="fas fa-landmark"></i> Government API Dependency</h3>
                            <ul class="policy-list">
                                <li><i class="fas fa-dot-circle"></i><span>Document data is fetched directly from official government portals including UIDAI (Aadhaar), Election Commission of India (Voter ID), MoRTH / Parivahan (DL &amp; RC), and the Income Tax Department (PAN).</span></li>
                                <li><i class="fas fa-dot-circle"></i><span>Service availability is subject to the uptime, maintenance schedules, and policy changes of these government systems, which are entirely outside our control.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span>We are not responsible for any inaccuracies in document data that originate from government databases.</span></li>
                            </ul>

                            <h3><i class="fas fa-external-link-alt"></i> Third-Party Service Providers</h3>
                            <p>We use third-party services for payment processing, OTP delivery, cloud hosting, and analytics. These providers operate under their own terms and privacy policies. By using our Platform, you acknowledge and accept that your data may be processed by these providers as necessary to deliver our services.</p>

                            <div class="info-box info-box-yellow">
                                <i class="fas fa-exclamation-triangle"></i>
                                <div><strong>Government Downtime:</strong> We are not liable for any service disruptions, failed transactions, or delays caused by government API downtime, UIDAI server maintenance, or any changes to official government systems. Wallet charges for failed government API transactions will be reversed as per our refund policy.</div>
                            </div>
                        </div>

                        <!-- 9. Disclaimers & Limitation of Liability -->
                        <div class="policy-block fade-in" id="section-disclaimer">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-exclamation-triangle"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 09</div>
                                    <h2>Disclaimers &amp; Limitation of Liability</h2>
                                </div>
                            </div>

                            <h3><i class="fas fa-times-circle"></i> Disclaimer of Warranties</h3>
                            <p>The Platform is provided on an "as is" and "as available" basis without warranties of any kind, either express or implied, including but not limited to warranties of merchantability, fitness for a particular purpose, and non-infringement. We do not warrant that:</p>
                            <ul class="policy-list">
                                <li><i class="fas fa-dot-circle"></i><span>The Platform will be uninterrupted, error-free, or free from viruses or harmful components.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span>Document data fetched from government portals will always be accurate, complete, or up to date.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span>Any specific feature or service will remain available indefinitely, as we may modify or discontinue services at any time with reasonable notice.</span></li>
                            </ul>

                            <h3><i class="fas fa-rupee-sign"></i> Limitation of Liability</h3>
                            <p>To the maximum extent permitted by applicable Indian law, <?php echo htmlspecialchars($site_name); ?> and its directors, employees, and agents shall not be liable for:</p>
                            <ul class="policy-list">
                                <li><i class="fas fa-dot-circle"></i><span>Any indirect, incidental, special, consequential, or punitive damages arising out of or related to your use of the Platform.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span>Loss of revenue, data, goodwill, or business opportunities arising from Platform downtime or service disruptions.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span>Any losses resulting from government API failures, policy changes by government authorities, or force majeure events.</span></li>
                            </ul>
                            <p>Our maximum aggregate liability to you for any claims arising out of or related to these Terms shall not exceed the total wallet recharge amount you have paid in the 30 days preceding the event giving rise to the claim.</p>

                            <div class="info-box info-box-blue">
                                <i class="fas fa-info-circle"></i>
                                <div>Nothing in these Terms limits or excludes our liability for fraud, willful misconduct, or for death or personal injury caused by our negligence, to the extent such limitation is prohibited by Indian law.</div>
                            </div>
                        </div>

                        <!-- 10. Termination & Suspension -->
                        <div class="policy-block fade-in" id="section-termination">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-power-off"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 10</div>
                                    <h2>Termination &amp; Suspension</h2>
                                </div>
                            </div>
                            <p><?php echo htmlspecialchars($site_name); ?> reserves the right to suspend or permanently terminate your account at our sole discretion, with or without prior notice, in the following circumstances:</p>
                            <ul class="policy-list">
                                <li><i class="fas fa-dot-circle"></i><span><strong>Terms Violation:</strong> Any breach of these Terms of Use, including prohibited activities listed in Section 05.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Fraudulent Activity:</strong> Suspected or confirmed involvement in identity fraud, document forgery, or misuse of citizen data.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>False Registration:</strong> Providing false or misleading information during registration or at any subsequent time.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Non-Payment / Chargebacks:</strong> Filing unauthorised chargebacks or failing to pay outstanding dues.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Legal Requirement:</strong> If required to do so by a court order, government authority, or applicable law.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Inactivity:</strong> Accounts with no login activity for 12 consecutive months may be deactivated after prior notice.</span></li>
                            </ul>
                            <p>Upon termination, your right to access the Platform ceases immediately. Unused wallet balance may be refunded at our discretion after deducting any outstanding dues, subject to identity verification. We are not liable for any losses arising from account termination for cause.</p>
                            <p>You may also voluntarily close your account at any time by contacting our support team at <strong><?php echo htmlspecialchars($email); ?></strong>.</p>
                        </div>

                        <!-- 11. Governing Law & Dispute Resolution -->
                        <div class="policy-block fade-in" id="section-law">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-balance-scale"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 11</div>
                                    <h2>Governing Law &amp; Dispute Resolution</h2>
                                </div>
                            </div>
                            <p>These Terms of Use, and any disputes arising out of or relating to them or your use of <?php echo htmlspecialchars($site_name); ?>, shall be governed by and construed in accordance with the laws of the Republic of India, without regard to its conflict of law provisions.</p>

                            <h3><i class="fas fa-gavel"></i> Applicable Laws</h3>
                            <ul class="policy-list">
                                <li><i class="fas fa-dot-circle"></i><span><strong>Information Technology Act, 2000</strong> (and amendments) — governing digital transactions, electronic records, and cyber offences.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Digital Personal Data Protection Act, 2023 (DPDP Act)</strong> — governing the processing of personal data of Indian residents.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Indian Contract Act, 1872</strong> — governing the contractual relationship between you and us.</span></li>
                                <li><i class="fas fa-dot-circle"></i><span><strong>Consumer Protection Act, 2019</strong> — to the extent applicable to our services.</span></li>
                            </ul>

                            <h3><i class="fas fa-comments"></i> Dispute Resolution</h3>
                            <p>In the event of any dispute, controversy, or claim arising out of or relating to these Terms, the parties shall first attempt to resolve the matter amicably through good-faith negotiation within 30 days of written notice of the dispute. If the dispute is not resolved within this period, it shall be subject to the exclusive jurisdiction of the courts located in India, as specified in our registered address.</p>

                            <div class="info-box info-box-blue">
                                <i class="fas fa-info-circle"></i>
                                <div>Before initiating any formal legal proceedings, we encourage users to contact our support team at <strong><?php echo htmlspecialchars($email); ?></strong>. The majority of disputes can be resolved quickly and informally through direct communication with our team.</div>
                            </div>
                        </div>

                        <!-- 12. Contact Us -->
                        <div class="policy-block fade-in" id="section-contact">
                            <div class="policy-block-header">
                                <div class="policy-block-icon"><i class="fas fa-headset"></i></div>
                                <div class="policy-block-header-text">
                                    <div class="policy-block-num">Section 12</div>
                                    <h2>Contact Us</h2>
                                </div>
                            </div>
                            <p>If you have any questions, concerns, or feedback regarding these Terms of Use, or if you wish to report a violation, please do not hesitate to contact us. Our team is committed to responding to all queries promptly and transparently.</p>

                            <div class="contact-block">
                                <h3><i class="fas fa-envelope-open-text" style="margin-right:10px;"></i> Get In Touch</h3>
                                <p>For questions about these Terms, account issues, refund requests, or to report misuse, contact our support team:</p>
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
                                <strong>Working Hours:</strong> Monday &ndash; Saturday, 10:00 AM &ndash; 7:00 PM IST</p>
                            </div>

                            <div class="info-box info-box-green" style="margin-top:8px;">
                                <i class="fas fa-clock"></i>
                                <div>We aim to respond to all Terms-related queries within <strong>2 business days</strong>. For urgent account or security issues, we respond within <strong>24 hours</strong>.</div>
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
                    <h2>Ready to Start <span style="color:var(--secondary-color);">Printing?</span></h2>
                    <p>Now that you've read our terms, join thousands of operators across India using <?php echo htmlspecialchars($site_name); ?> to deliver fast and reliable government document printing services.</p>
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
                    <a href="privacy-policy.php">Privacy Policy</a>
                    <a href="term-of-use.php" class="active-link">Terms of Use</a>
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