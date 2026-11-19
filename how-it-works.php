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
    $phone     = "";
    $email     = "";
    $address   = "Your Office Address, India";
}
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#4361ee">
    <meta name="description" content="How It Works - <?php echo htmlspecialchars($site_name); ?>. Learn how to register, recharge your wallet, and print government documents like Aadhaar, PAN, Voter ID, and Driving License in just a few clicks.">
    <meta name="keywords" content="how it works <?php echo htmlspecialchars($site_name); ?>, aadhaar print how to, print portal guide, titan print tutorial">
    <title>How It Works - <?php echo htmlspecialchars($site_name); ?></title>
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

        /* ─── Page Hero ─── */
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
        .breadcrumb a { color: var(--primary-color); text-decoration: none; transition: var(--transition); }
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
            margin: 0 auto 36px;
            line-height: 1.7;
        }
        .highlight {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .hero-badges {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
        }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--surface-color);
            padding: 10px 20px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 600;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-light);
            color: var(--text-color);
        }
        .hero-badge i { color: var(--primary-color); }

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
            border-right: 1px solid rgba(255,255,255,0.12);
        }
        .stat-item:last-child { border-right: none; }
        .stat-item i { font-size: 36px; color: var(--secondary-color); margin-bottom: 16px; display: block; }
        .stat-item .stat-number {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            color: white;
            display: block;
            line-height: 1;
            margin-bottom: 10px;
        }
        .stat-item .stat-label { font-size: 15px; color: rgba(255,255,255,0.75); font-weight: 500; }

        /* ─── Main Steps Section ─── */
        .steps-section {
            padding: 100px 0;
            background: var(--surface-color);
        }
        .steps-timeline {
            position: relative;
            margin-top: 20px;
        }
        .steps-timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(180deg, var(--primary-color), var(--primary-light), rgba(67,97,238,0.1));
            transform: translateX(-50%);
            border-radius: 2px;
        }
        .step-row {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            gap: 0 40px;
            align-items: center;
            margin-bottom: 70px;
            position: relative;
        }
        .step-row:last-child { margin-bottom: 0; }

        /* Step dot in center */
        .step-dot {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: 800;
            color: white;
            box-shadow: 0 0 0 8px rgba(67,97,238,0.12), var(--shadow-medium);
            flex-shrink: 0;
            z-index: 1;
            position: relative;
        }

        /* Step card */
        .step-card {
            background: var(--surface-color);
            border-radius: var(--border-radius-lg);
            padding: 36px 32px;
            box-shadow: var(--shadow-light);
            border: 1px solid var(--border-color);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }
        .step-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-light));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }
        .step-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-heavy); }
        .step-card:hover::before { transform: scaleX(1); }
        .step-card-icon {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            background: linear-gradient(135deg, rgba(67,97,238,0.12), rgba(67,97,238,0.06));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        .step-card h3 { font-size: 22px; font-weight: 700; margin: 0 0 12px; color: var(--text-color); }
        .step-card p { color: var(--text-light); font-size: 15px; line-height: 1.8; margin: 0 0 20px; }
        .step-checklist { list-style: none; padding: 0; margin: 0; }
        .step-checklist li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 14px;
            color: var(--text-light);
            margin-bottom: 10px;
            line-height: 1.5;
        }
        .step-checklist li i { color: var(--success-color); font-size: 14px; margin-top: 2px; flex-shrink: 0; }

        /* Right-side card (even rows) */
        .step-row.reverse .step-card-left { order: 3; }
        .step-row.reverse .step-dot-wrap { order: 2; }
        .step-row.reverse .step-card-right { order: 1; }
        .step-placeholder { /* empty space on opposite side */ }

        /* Step visual card (right/left visual block) */
        .step-visual {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: var(--border-radius-lg);
            padding: 40px 32px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-light);
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .step-visual-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .step-visual-title i { color: var(--primary-color); }
        .step-form-mock {
            background: var(--surface-color);
            border-radius: var(--border-radius);
            padding: 20px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-light);
        }
        .mock-field {
            height: 40px;
            background: #f1f3f4;
            border-radius: 8px;
            margin-bottom: 10px;
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            padding: 0 14px;
            font-size: 13px;
            color: var(--text-muted);
        }
        .mock-field:last-child { margin-bottom: 0; }
        .mock-btn {
            height: 42px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            font-weight: 600;
            gap: 8px;
            margin-top: 12px;
        }
        .mock-wallet {
            background: linear-gradient(135deg, var(--primary-color), #1e3c72);
            border-radius: var(--border-radius);
            padding: 20px;
            color: white;
        }
        .mock-wallet-label { font-size: 12px; opacity: 0.75; margin-bottom: 4px; }
        .mock-wallet-bal { font-size: 28px; font-weight: 800; margin-bottom: 16px; }
        .mock-wallet-row {
            display: flex;
            gap: 8px;
        }
        .mock-wallet-chip {
            flex: 1;
            background: rgba(255,255,255,0.15);
            border-radius: 8px;
            padding: 8px 10px;
            font-size: 12px;
            font-weight: 600;
            text-align: center;
        }
        .mock-doc-preview {
            background: var(--surface-color);
            border-radius: var(--border-radius);
            padding: 20px;
            border: 1px solid var(--border-color);
        }
        .mock-doc-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
        }
        .mock-doc-icon {
            width: 40px; height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            display: flex; align-items: center; justify-content: center;
            color: white; font-size: 18px;
        }
        .mock-doc-info strong { font-size: 13px; font-weight: 700; display: block; }
        .mock-doc-info span { font-size: 11px; color: var(--text-muted); }
        .mock-doc-lines .line {
            height: 10px;
            background: #f1f3f4;
            border-radius: 5px;
            margin-bottom: 8px;
        }
        .mock-doc-lines .line.short { width: 60%; }
        .mock-doc-lines .line.medium { width: 80%; }
        .mock-ready {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(6,214,160,0.1);
            border: 1px solid rgba(6,214,160,0.3);
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 13px;
            font-weight: 600;
            color: #05a87d;
            margin-top: 12px;
        }

        /* ─── Services Process ─── */
        .process-section {
            padding: 100px 0;
            background: var(--background-color);
        }
        .service-tabs {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 50px;
        }
        .tab-btn {
            padding: 12px 22px;
            border-radius: 30px;
            border: 2px solid var(--border-color);
            background: var(--surface-color);
            color: var(--text-light);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: 'Poppins', sans-serif;
        }
        .tab-btn:hover { border-color: var(--primary-color); color: var(--primary-color); }
        .tab-btn.active {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: white;
            border-color: transparent;
            box-shadow: var(--shadow-medium);
        }
        .tab-content { display: none; }
        .tab-content.active { display: block; animation: fadeTab 0.4s ease; }
        @keyframes fadeTab { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        .service-process-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0;
            position: relative;
        }
        .service-process-grid::before {
            content: '';
            position: absolute;
            top: 52px;
            left: 12.5%;
            right: 12.5%;
            height: 2px;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-light));
            z-index: 0;
        }
        .process-step {
            text-align: center;
            padding: 0 20px 40px;
            position: relative;
            z-index: 1;
        }
        .process-step-num {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: white;
            font-size: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 0 0 6px rgba(67,97,238,0.1), var(--shadow-light);
            position: relative;
        }
        .process-step-icon {
            font-size: 28px;
            color: var(--primary-color);
            margin-bottom: 14px;
            display: block;
        }
        .process-step h4 { font-size: 16px; font-weight: 700; margin: 0 0 10px; color: var(--text-color); }
        .process-step p { font-size: 13px; color: var(--text-light); line-height: 1.6; margin: 0; }

        /* ─── Tips & Tricks ─── */
        .tips-section {
            padding: 100px 0;
            background: var(--surface-color);
        }
        .tips-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }
        .tip-card {
            background: var(--background-color);
            border-radius: var(--border-radius-lg);
            padding: 36px 28px;
            border: 1px solid var(--border-color);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }
        .tip-card::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-light));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }
        .tip-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-heavy); background: var(--surface-color); }
        .tip-card:hover::after { transform: scaleX(1); }
        .tip-card-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
        }
        .tip-icon {
            width: 52px; height: 52px;
            border-radius: 14px;
            background: linear-gradient(135deg, rgba(67,97,238,0.12), rgba(67,97,238,0.06));
            display: flex; align-items: center; justify-content: center;
            font-size: 22px;
            color: var(--primary-color);
            flex-shrink: 0;
        }
        .tip-card h3 { font-size: 17px; font-weight: 700; margin: 0; color: var(--text-color); }
        .tip-card p { color: var(--text-light); font-size: 14px; line-height: 1.7; margin: 0; }

        /* ─── FAQ Section ─── */
        .faq-section {
            padding: 100px 0;
            background: var(--background-color);
        }
        .faq-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: start;
        }
        .faq-sidebar {
            position: sticky;
            top: 100px;
        }
        .faq-sidebar .section-label { display: block; text-align: left; }
        .faq-sidebar h2 {
            font-size: clamp(1.8rem, 3.5vw, 2.8rem);
            font-weight: 700;
            line-height: 1.3;
            margin: 0 0 20px;
        }
        .faq-sidebar p {
            color: var(--text-light);
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 32px;
        }
        .faq-contact-box {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border-radius: var(--border-radius-lg);
            padding: 32px 28px;
            color: white;
        }
        .faq-contact-box h4 { font-size: 18px; font-weight: 700; margin: 0 0 10px; }
        .faq-contact-box p { color: rgba(255,255,255,0.85); font-size: 14px; line-height: 1.6; margin: 0 0 20px; }
        .faq-contact-box a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: white;
            color: var(--primary-color);
            padding: 10px 20px;
            border-radius: var(--border-radius);
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            transition: var(--transition);
        }
        .faq-contact-box a:hover { transform: translateY(-2px); box-shadow: var(--shadow-medium); }

        .faq-list { display: flex; flex-direction: column; gap: 16px; }
        .faq-item {
            background: var(--surface-color);
            border-radius: var(--border-radius);
            border: 1px solid var(--border-color);
            overflow: hidden;
            transition: var(--transition);
            box-shadow: var(--shadow-light);
        }
        .faq-item:hover { box-shadow: var(--shadow-medium); }
        .faq-question {
            width: 100%;
            background: none;
            border: none;
            padding: 22px 24px;
            text-align: left;
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            font-weight: 600;
            color: var(--text-color);
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            transition: var(--transition);
        }
        .faq-question:hover { color: var(--primary-color); }
        .faq-question i {
            font-size: 13px;
            color: var(--primary-color);
            transition: transform 0.3s ease;
            flex-shrink: 0;
        }
        .faq-item.open .faq-question i { transform: rotate(180deg); }
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, padding 0.3s ease;
        }
        .faq-item.open .faq-answer { max-height: 300px; }
        .faq-answer-inner {
            padding: 0 24px 22px;
            font-size: 14px;
            color: var(--text-light);
            line-height: 1.8;
            border-top: 1px solid var(--border-color);
            padding-top: 16px;
        }

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
            top: -60px; right: -60px;
            width: 220px; height: 220px;
            background: rgba(255,255,255,0.06);
            border-radius: 50%;
        }
        .cta-box::after {
            content: '';
            position: absolute;
            bottom: -40px; left: -40px;
            width: 150px; height: 150px;
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
        .cta-btn-white:hover { transform: translateY(-3px); box-shadow: 0 8px 30px rgba(0,0,0,0.25); }
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
        .cta-btn-outline:hover { background: rgba(255,255,255,0.1); border-color: white; transform: translateY(-3px); }

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
            width: 50px; height: 50px;
            border: 4px solid var(--border-color);
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

        /* ─── Floating Buttons ─── */
        .floating-whatsapp, #back-to-top {
            position: fixed;
            width: 60px; height: 60px;
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
        .footer-column h3 { color: white; font-size: 20px; font-weight: 600; margin-bottom: 24px; position: relative; }
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
            .service-process-grid { grid-template-columns: repeat(2, 1fr); }
            .service-process-grid::before { display: none; }
        }
        @media (max-width: 992px) {
            .steps-timeline::before { display: none; }
            .step-row { grid-template-columns: 1fr; gap: 20px; }
            .step-dot { display: none; }
            .step-row.reverse .step-card-left,
            .step-row.reverse .step-dot-wrap,
            .step-row.reverse .step-card-right { order: unset; }
            .faq-grid { grid-template-columns: 1fr; gap: 50px; }
            .faq-sidebar { position: static; }
            .tips-grid { grid-template-columns: 1fr 1fr; }
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
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .stat-item { border-right: none; border-bottom: 1px solid rgba(255,255,255,0.12); }
            .stat-item:nth-child(odd) { border-right: 1px solid rgba(255,255,255,0.12); }
            .stat-item:last-child, .stat-item:nth-last-child(2):nth-child(odd) { border-bottom: none; }
            .cta-box { padding: 50px 28px; }
            .footer-top { grid-template-columns: 1fr; }
            .footer-bottom { flex-direction: column; text-align: center; }
            .service-tabs { gap: 8px; }
            .tab-btn { padding: 10px 16px; font-size: 13px; }
            .tips-grid { grid-template-columns: 1fr; }
            .floating-whatsapp, #back-to-top { width: 50px; height: 50px; font-size: 20px; }
        }
        @media (max-width: 480px) {
            .container { padding: 0 16px; }
            .stats-grid { grid-template-columns: 1fr; }
            .stat-item { border-right: none !important; border-bottom: 1px solid rgba(255,255,255,0.12); }
            .stat-item:last-child { border-bottom: none; }
            .service-process-grid { grid-template-columns: 1fr; }
            .hero-badges { flex-direction: column; align-items: center; }
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

                <nav role="navigation" aria-label="Main navigation">
                    <ul class="nav-links" id="navLinks">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="how-it-works.php" class="active">How It Works</a></li>
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
                        <span class="current">How It Works</span>
                    </div>
                    <h1>Print Any Government Document in <span class="highlight">4 Simple Steps</span></h1>
                    <p>From registration to final printout — <?php echo htmlspecialchars($site_name); ?> makes Aadhaar, PAN, Voter ID, and Driving License printing fast, easy, and professional for every operator in India.</p>
                    <div class="hero-badges">
                        <span class="hero-badge"><i class="fas fa-clock"></i> Under 60 Seconds</span>
                        <span class="hero-badge"><i class="fas fa-shield-alt"></i> 100% Secure</span>
                        <span class="hero-badge"><i class="fas fa-rupee-sign"></i> Best Price Guaranteed</span>
                        <span class="hero-badge"><i class="fas fa-headset"></i> 24/7 Support</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── STATS BAND ─── -->
        <section class="stats-band">
            <div class="container">
                <div class="stats-grid">
                    <div class="stat-item fade-in">
                        <i class="fas fa-bolt" aria-hidden="true"></i>
                        <span class="stat-number">&lt;60s</span>
                        <span class="stat-label">Avg. Print Time</span>
                    </div>
                    <div class="stat-item fade-in">
                        <i class="fas fa-users" aria-hidden="true"></i>
                        <span class="stat-number">50K+</span>
                        <span class="stat-label">Active Operators</span>
                    </div>
                    <div class="stat-item fade-in">
                        <i class="fas fa-print" aria-hidden="true"></i>
                        <span class="stat-number">2M+</span>
                        <span class="stat-label">Documents Printed</span>
                    </div>
                    <div class="stat-item fade-in">
                        <i class="fas fa-star" aria-hidden="true"></i>
                        <span class="stat-number">4.9★</span>
                        <span class="stat-label">Operator Rating</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── MAIN STEPS (TIMELINE) ─── -->
        <section class="steps-section">
            <div class="container">
                <div style="text-align:center;">
                    <span class="section-label"><i class="fas fa-map-signs" style="margin-right:6px;"></i> Step-by-Step Guide</span>
                </div>
                <h2 class="section-title fade-in">How <span class="highlight"><?php echo htmlspecialchars($site_name); ?></span> Works</h2>
                <p class="section-subtitle fade-in">Getting started is simple. Follow these four steps and you'll be printing professional government documents for your customers in minutes.</p>

                <div class="steps-timeline">

                    <!-- ─── STEP 1 ─── -->
                    <div class="step-row fade-in">
                        <div class="step-card">
                            <div class="step-card-icon"><i class="fas fa-user-plus" aria-hidden="true"></i></div>
                            <h3>Step 1: Create Your Free Account</h3>
                            <p>Register on <?php echo htmlspecialchars($site_name); ?> in under two minutes. Fill in your basic operator details, verify your mobile number with OTP, and your account is ready — no paperwork, no waiting.</p>
                            <ul class="step-checklist">
                                <li><i class="fas fa-check-circle"></i> Enter your name, mobile number &amp; email</li>
                                <li><i class="fas fa-check-circle"></i> Verify with a one-time OTP sent to your phone</li>
                                <li><i class="fas fa-check-circle"></i> Set a strong password and confirm your account</li>
                                <li><i class="fas fa-check-circle"></i> Instantly access the full operator dashboard</li>
                            </ul>
                        </div>
                        <div class="step-dot" aria-hidden="true">1</div>
                        <div class="step-visual">
                            <p class="step-visual-title"><i class="fas fa-user-circle"></i> Quick Registration</p>
                            <div class="step-form-mock">
                                <div class="mock-field">👤 Full Name</div>
                                <div class="mock-field">📱 Mobile Number</div>
                                <div class="mock-field">✉️ Email Address</div>
                                <div class="mock-field">🔒 Create Password</div>
                                <div class="mock-btn"><i class="fas fa-rocket"></i> Create Free Account</div>
                            </div>
                        </div>
                    </div>

                    <!-- ─── STEP 2 ─── -->
                    <div class="step-row reverse fade-in">
                        <div class="step-visual">
                            <p class="step-visual-title"><i class="fas fa-wallet"></i> Your Wallet</p>
                            <div class="mock-wallet">
                                <div class="mock-wallet-label">Available Balance</div>
                                <div class="mock-wallet-bal">₹ 500.00</div>
                                <div class="mock-wallet-row">
                                    <div class="mock-wallet-chip">+ Recharge</div>
                                    <div class="mock-wallet-chip">History</div>
                                    <div class="mock-wallet-chip">Transfer</div>
                                </div>
                            </div>
                            <div style="display:flex;gap:10px;margin-top:12px;">
                                <div style="flex:1;background:var(--surface-color);border-radius:10px;padding:14px;border:1px solid var(--border-color);text-align:center;">
                                    <div style="font-size:12px;color:var(--text-muted);margin-bottom:4px;">UPI</div>
                                    <div style="font-size:13px;font-weight:700;color:var(--text-color);">Instant</div>
                                </div>
                                <div style="flex:1;background:var(--surface-color);border-radius:10px;padding:14px;border:1px solid var(--border-color);text-align:center;">
                                    <div style="font-size:12px;color:var(--text-muted);margin-bottom:4px;">Net Banking</div>
                                    <div style="font-size:13px;font-weight:700;color:var(--text-color);">2 Min</div>
                                </div>
                                <div style="flex:1;background:var(--surface-color);border-radius:10px;padding:14px;border:1px solid var(--border-color);text-align:center;">
                                    <div style="font-size:12px;color:var(--text-muted);margin-bottom:4px;">Card</div>
                                    <div style="font-size:13px;font-weight:700;color:var(--text-color);">Instant</div>
                                </div>
                            </div>
                        </div>
                        <div class="step-dot" aria-hidden="true">2</div>
                        <div class="step-card">
                            <div class="step-card-icon"><i class="fas fa-wallet" aria-hidden="true"></i></div>
                            <h3>Step 2: Add Wallet Balance</h3>
                            <p>Recharge your <?php echo htmlspecialchars($site_name); ?> wallet using UPI, Net Banking, Credit/Debit Card, or direct bank transfer. Minimum recharge of just ₹10 — top up only what you need.</p>
                            <ul class="step-checklist">
                                <li><i class="fas fa-check-circle"></i> Instant credit via UPI &amp; card payments</li>
                                <li><i class="fas fa-check-circle"></i> Secure payment gateway with SSL encryption</li>
                                <li><i class="fas fa-check-circle"></i> Transparent pricing — no hidden charges</li>
                                <li><i class="fas fa-check-circle"></i> View full transaction history anytime</li>
                            </ul>
                        </div>
                    </div>

                    <!-- ─── STEP 3 ─── -->
                    <div class="step-row fade-in">
                        <div class="step-card">
                            <div class="step-card-icon"><i class="fas fa-id-card" aria-hidden="true"></i></div>
                            <h3>Step 3: Enter Document Details</h3>
                            <p>Choose the document type — Aadhaar, PAN, Voter ID, Driving License, or RC — enter the customer's ID number, and our system instantly fetches all official data from government servers in real time.</p>
                            <ul class="step-checklist">
                                <li><i class="fas fa-check-circle"></i> Select from 6+ document types in one click</li>
                                <li><i class="fas fa-check-circle"></i> Enter Aadhaar / PAN / voter number</li>
                                <li><i class="fas fa-check-circle"></i> Data fetched live from official government APIs</li>
                                <li><i class="fas fa-check-circle"></i> Auto-preview before final print confirmation</li>
                            </ul>
                        </div>
                        <div class="step-dot" aria-hidden="true">3</div>
                        <div class="step-visual">
                            <p class="step-visual-title"><i class="fas fa-search"></i> Fetch Document</p>
                            <div class="mock-doc-preview">
                                <div class="mock-doc-header">
                                    <div class="mock-doc-icon"><i class="fas fa-fingerprint"></i></div>
                                    <div class="mock-doc-info">
                                        <strong>Aadhaar Card</strong>
                                        <span>XXXX XXXX 1234</span>
                                    </div>
                                </div>
                                <div class="mock-doc-lines">
                                    <div class="line medium"></div>
                                    <div class="line short"></div>
                                    <div class="line medium"></div>
                                    <div class="line short"></div>
                                </div>
                            </div>
                            <div class="mock-ready"><i class="fas fa-check-circle"></i> Document Fetched — Ready to Print!</div>
                            <div style="display:flex;gap:8px;margin-top:12px;">
                                <div style="flex:1;background:var(--surface-color);border-radius:8px;padding:10px;border:1px solid var(--border-color);text-align:center;font-size:12px;font-weight:600;color:var(--text-light);">A4 Size</div>
                                <div style="flex:1;background:linear-gradient(135deg,var(--primary-color),var(--primary-light));border-radius:8px;padding:10px;text-align:center;font-size:12px;font-weight:600;color:white;">Card Size ✓</div>
                                <div style="flex:1;background:var(--surface-color);border-radius:8px;padding:10px;border:1px solid var(--border-color);text-align:center;font-size:12px;font-weight:600;color:var(--text-light);">PVC</div>
                            </div>
                        </div>
                    </div>

                    <!-- ─── STEP 4 ─── -->
                    <div class="step-row reverse fade-in">
                        <div class="step-visual">
                            <p class="step-visual-title"><i class="fas fa-print"></i> Print & Deliver</p>
                            <div style="background:var(--surface-color);border-radius:var(--border-radius);padding:20px;border:1px solid var(--border-color);">
                                <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;padding-bottom:16px;border-bottom:1px solid var(--border-color);">
                                    <div style="width:36px;height:36px;border-radius:8px;background:rgba(6,214,160,0.1);display:flex;align-items:center;justify-content:center;font-size:16px;color:#06d6a0;">✓</div>
                                    <div>
                                        <div style="font-size:13px;font-weight:700;">Payment Deducted</div>
                                        <div style="font-size:11px;color:var(--text-muted);">₹2.00 for Aadhaar Print</div>
                                    </div>
                                </div>
                                <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;padding-bottom:16px;border-bottom:1px solid var(--border-color);">
                                    <div style="width:36px;height:36px;border-radius:8px;background:rgba(67,97,238,0.1);display:flex;align-items:center;justify-content:center;font-size:16px;color:var(--primary-color);"><i class="fas fa-download"></i></div>
                                    <div>
                                        <div style="font-size:13px;font-weight:700;">Print File Ready</div>
                                        <div style="font-size:11px;color:var(--text-muted);">Optimised for your printer</div>
                                    </div>
                                </div>
                                <div style="display:flex;align-items:center;gap:12px;">
                                    <div style="width:36px;height:36px;border-radius:8px;background:rgba(255,190,11,0.1);display:flex;align-items:center;justify-content:center;font-size:16px;color:var(--secondary-color);"><i class="fas fa-print"></i></div>
                                    <div>
                                        <div style="font-size:13px;font-weight:700;">Send to Printer</div>
                                        <div style="font-size:11px;color:var(--text-muted);">Card / A4 / PVC format</div>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top:12px;background:linear-gradient(135deg,#06d6a0,#05a87d);border-radius:10px;padding:14px;color:white;text-align:center;font-size:14px;font-weight:700;">
                                <i class="fas fa-check-double"></i> Document Delivered to Customer!
                            </div>
                        </div>
                        <div class="step-dot" aria-hidden="true">4</div>
                        <div class="step-card">
                            <div class="step-card-icon"><i class="fas fa-print" aria-hidden="true"></i></div>
                            <h3>Step 4: Print &amp; Deliver</h3>
                            <p>With one click, the perfectly formatted print file is generated. Send it directly to your printer — card size, A4, or PVC format — and hand the crisp, official-quality document to your customer.</p>
                            <ul class="step-checklist">
                                <li><i class="fas fa-check-circle"></i> One-click print — no formatting needed</li>
                                <li><i class="fas fa-check-circle"></i> Supports card, A4, and PVC print formats</li>
                                <li><i class="fas fa-check-circle"></i> Wallet deducted only on successful print</li>
                                <li><i class="fas fa-check-circle"></i> Download PDF copy for your records</li>
                            </ul>
                        </div>
                    </div>

                </div><!-- /steps-timeline -->
            </div>
        </section>

        <!-- ─── PER-SERVICE PROCESS GUIDE ─── -->
        <section class="process-section">
            <div class="container">
                <div style="text-align:center;">
                    <span class="section-label"><i class="fas fa-th-large" style="margin-right:6px;"></i> Service-Specific Guide</span>
                </div>
                <h2 class="section-title fade-in">Quick Guide for <span class="highlight">Each Service</span></h2>
                <p class="section-subtitle fade-in">Select a service below to see the exact steps to print that specific document in seconds.</p>

                <div class="service-tabs fade-in">
                    <button class="tab-btn active" data-tab="aadhaar"><i class="fas fa-fingerprint"></i> Aadhaar</button>
                    <button class="tab-btn" data-tab="voter"><i class="fas fa-vote-yea"></i> Voter ID</button>
                    <button class="tab-btn" data-tab="dl"><i class="fas fa-car"></i> Driving License</button>
                    <button class="tab-btn" data-tab="pan"><i class="fas fa-search"></i> PAN Card</button>
                    <button class="tab-btn" data-tab="rc"><i class="fas fa-truck"></i> RC Card</button>
                    <button class="tab-btn" data-tab="csc"><i class="fas fa-network-wired"></i> CSC Print</button>
                </div>

                <!-- Aadhaar -->
                <div class="tab-content active" id="tab-aadhaar">
                    <div class="service-process-grid">
                        <div class="process-step fade-in">
                            <div class="process-step-num">1</div>
                            <i class="fas fa-sign-in-alt process-step-icon"></i>
                            <h4>Login to Dashboard</h4>
                            <p>Sign in with your registered mobile and password. Your wallet balance and recent prints are visible instantly.</p>
                        </div>
                        <div class="process-step fade-in">
                            <div class="process-step-num">2</div>
                            <i class="fas fa-fingerprint process-step-icon"></i>
                            <h4>Open Aadhaar Print</h4>
                            <p>Click "Aadhaar Titan Print" from the services menu. Choose between full Aadhaar, masked Aadhaar, or PVC format.</p>
                        </div>
                        <div class="process-step fade-in">
                            <div class="process-step-num">3</div>
                            <i class="fas fa-keyboard process-step-icon"></i>
                            <h4>Enter 12-Digit Number</h4>
                            <p>Type the customer's 12-digit Aadhaar number. Our system fetches name, photo, DOB, and address in real time.</p>
                        </div>
                        <div class="process-step fade-in">
                            <div class="process-step-num">4</div>
                            <i class="fas fa-print process-step-icon"></i>
                            <h4>Print &amp; Collect</h4>
                            <p>Preview the card, choose print size (A4/card/PVC), click Print. Hand the professional printout to your customer.</p>
                        </div>
                    </div>
                </div>

                <!-- Voter ID -->
                <div class="tab-content" id="tab-voter">
                    <div class="service-process-grid">
                        <div class="process-step fade-in">
                            <div class="process-step-num">1</div>
                            <i class="fas fa-sign-in-alt process-step-icon"></i>
                            <h4>Login to Dashboard</h4>
                            <p>Access your operator account and ensure your wallet has sufficient balance for the print transaction.</p>
                        </div>
                        <div class="process-step fade-in">
                            <div class="process-step-num">2</div>
                            <i class="fas fa-vote-yea process-step-icon"></i>
                            <h4>Select Voter ID Print</h4>
                            <p>Go to "Voter ID Card Print" from the main dashboard. The NVSP-integrated module loads instantly.</p>
                        </div>
                        <div class="process-step fade-in">
                            <div class="process-step-num">3</div>
                            <i class="fas fa-id-card process-step-icon"></i>
                            <h4>Enter Epic Number</h4>
                            <p>Enter the customer's EPIC (Election Photo Identity Card) number. Voter data is fetched from NVSP directly.</p>
                        </div>
                        <div class="process-step fade-in">
                            <div class="process-step-num">4</div>
                            <i class="fas fa-print process-step-icon"></i>
                            <h4>Print Card-Size</h4>
                            <p>Preview the Voter ID in official card format. Print for lamination-ready professional quality output.</p>
                        </div>
                    </div>
                </div>

                <!-- Driving License -->
                <div class="tab-content" id="tab-dl">
                    <div class="service-process-grid">
                        <div class="process-step fade-in">
                            <div class="process-step-num">1</div>
                            <i class="fas fa-sign-in-alt process-step-icon"></i>
                            <h4>Login to Dashboard</h4>
                            <p>Access your operator account and navigate to the Driving License section under Services.</p>
                        </div>
                        <div class="process-step fade-in">
                            <div class="process-step-num">2</div>
                            <i class="fas fa-car process-step-icon"></i>
                            <h4>Open DL Print Module</h4>
                            <p>Click "Driving License Print". The module connects directly to Parivahan/Sarathi government database.</p>
                        </div>
                        <div class="process-step fade-in">
                            <div class="process-step-num">3</div>
                            <i class="fas fa-keyboard process-step-icon"></i>
                            <h4>Enter DL Number &amp; DOB</h4>
                            <p>Enter the DL number and customer's date of birth. Full driving license details including vehicle class are fetched.</p>
                        </div>
                        <div class="process-step fade-in">
                            <div class="process-step-num">4</div>
                            <i class="fas fa-print process-step-icon"></i>
                            <h4>Print Official Format</h4>
                            <p>Print the formatted DL in official card dimensions. Crisp output ready for lamination or digital storage.</p>
                        </div>
                    </div>
                </div>

                <!-- PAN -->
                <div class="tab-content" id="tab-pan">
                    <div class="service-process-grid">
                        <div class="process-step fade-in">
                            <div class="process-step-num">1</div>
                            <i class="fas fa-sign-in-alt process-step-icon"></i>
                            <h4>Login to Dashboard</h4>
                            <p>Sign in to your operator account and select "PAN No. Find Portal" from the services panel.</p>
                        </div>
                        <div class="process-step fade-in">
                            <div class="process-step-num">2</div>
                            <i class="fas fa-search process-step-icon"></i>
                            <h4>Enter Search Criteria</h4>
                            <p>Search by PAN number, name + DOB, or Aadhaar number. Multiple search modes available for quick lookup.</p>
                        </div>
                        <div class="process-step fade-in">
                            <div class="process-step-num">3</div>
                            <i class="fas fa-check-circle process-step-icon"></i>
                            <h4>Verify &amp; Confirm</h4>
                            <p>PAN details including full name, father's name, and PAN number are shown. Verify with the customer before printing.</p>
                        </div>
                        <div class="process-step fade-in">
                            <div class="process-step-num">4</div>
                            <i class="fas fa-print process-step-icon"></i>
                            <h4>Print PAN Details</h4>
                            <p>Download or print the verified PAN information in a clean, professional card format for your customer.</p>
                        </div>
                    </div>
                </div>

                <!-- RC -->
                <div class="tab-content" id="tab-rc">
                    <div class="service-process-grid">
                        <div class="process-step fade-in">
                            <div class="process-step-num">1</div>
                            <i class="fas fa-sign-in-alt process-step-icon"></i>
                            <h4>Login to Dashboard</h4>
                            <p>Access your operator account and select "RC Titan Print" from the main services menu.</p>
                        </div>
                        <div class="process-step fade-in">
                            <div class="process-step-num">2</div>
                            <i class="fas fa-truck process-step-icon"></i>
                            <h4>Open RC Print Module</h4>
                            <p>The RC module connects to Parivahan VAHAN database to fetch authentic registration certificate data.</p>
                        </div>
                        <div class="process-step fade-in">
                            <div class="process-step-num">3</div>
                            <i class="fas fa-keyboard process-step-icon"></i>
                            <h4>Enter Vehicle Reg. Number</h4>
                            <p>Type the vehicle registration number (e.g., UP32AB1234). Owner name, vehicle class, validity, and insurer details are fetched.</p>
                        </div>
                        <div class="process-step fade-in">
                            <div class="process-step-num">4</div>
                            <i class="fas fa-print process-step-icon"></i>
                            <h4>Print RC Card</h4>
                            <p>Print the RC in compact card format — ideal for motor dealers, transport agencies, and citizens needing a backup copy.</p>
                        </div>
                    </div>
                </div>

                <!-- CSC -->
                <div class="tab-content" id="tab-csc">
                    <div class="service-process-grid">
                        <div class="process-step fade-in">
                            <div class="process-step-num">1</div>
                            <i class="fas fa-sign-in-alt process-step-icon"></i>
                            <h4>CSC Operator Login</h4>
                            <p>Sign in with your CSC-registered credentials. Your dedicated CSC dashboard loads with priority access.</p>
                        </div>
                        <div class="process-step fade-in">
                            <div class="process-step-num">2</div>
                            <i class="fas fa-network-wired process-step-icon"></i>
                            <h4>Select Service Type</h4>
                            <p>Choose from any document type — all 6 services are available under the unified CSC print interface.</p>
                        </div>
                        <div class="process-step fade-in">
                            <div class="process-step-num">3</div>
                            <i class="fas fa-layer-group process-step-icon"></i>
                            <h4>Batch or Single Print</h4>
                            <p>Process single prints or use bulk mode to handle multiple customers in one session — perfect for high-volume CSC centres.</p>
                        </div>
                        <div class="process-step fade-in">
                            <div class="process-step-num">4</div>
                            <i class="fas fa-file-invoice process-step-icon"></i>
                            <h4>Generate Receipt</h4>
                            <p>Each transaction generates a digital receipt. Export daily reports for CSC accounting and commission tracking.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ─── TIPS & BEST PRACTICES ─── -->
        <section class="tips-section">
            <div class="container">
                <div style="text-align:center;">
                    <span class="section-label"><i class="fas fa-lightbulb" style="margin-right:6px;"></i> Pro Tips</span>
                </div>
                <h2 class="section-title fade-in">Tips for <span class="highlight">Best Results</span></h2>
                <p class="section-subtitle fade-in">Follow these best practices to maximise print quality, speed, and customer satisfaction at your centre.</p>

                <div class="tips-grid">
                    <div class="tip-card fade-in">
                        <div class="tip-card-header">
                            <div class="tip-icon"><i class="fas fa-wifi"></i></div>
                            <h3>Use a Stable Internet Connection</h3>
                        </div>
                        <p>Our platform fetches document data from government servers in real time. A 4G/broadband connection with at least 5 Mbps speed ensures the fastest data retrieval and no timeout errors during peak hours.</p>
                    </div>
                    <div class="tip-card fade-in">
                        <div class="tip-card-header">
                            <div class="tip-icon"><i class="fas fa-wallet"></i></div>
                            <h3>Keep Your Wallet Pre-Topped</h3>
                        </div>
                        <p>Running out of balance mid-service is inconvenient. We recommend maintaining a minimum ₹100 buffer in your wallet, especially before peak hours or festival seasons when document demand is high.</p>
                    </div>
                    <div class="tip-card fade-in">
                        <div class="tip-card-header">
                            <div class="tip-icon"><i class="fas fa-print"></i></div>
                            <h3>Use the Right Paper &amp; Printer</h3>
                        </div>
                        <p>For card-size prints, use 250–300 gsm card stock for professional quality. Laser printers give the sharpest output for Aadhaar and Voter ID. For PVC, use a dedicated PVC card printer with our optimised templates.</p>
                    </div>
                    <div class="tip-card fade-in">
                        <div class="tip-card-header">
                            <div class="tip-icon"><i class="fas fa-check-double"></i></div>
                            <h3>Always Preview Before Printing</h3>
                        </div>
                        <p>Use the built-in preview screen to verify the customer's name, photo, and details before confirming the print. This avoids wasted paper and wallet deductions from printing incorrect documents.</p>
                    </div>
                    <div class="tip-card fade-in">
                        <div class="tip-card-header">
                            <div class="tip-icon"><i class="fas fa-clock"></i></div>
                            <h3>Print During Off-Peak Hours</h3>
                        </div>
                        <p>Government API servers are typically fastest between 6 AM–9 AM and 8 PM–11 PM. For bulk printing sessions or high-volume days, scheduling during these windows reduces fetch time by up to 40%.</p>
                    </div>
                    <div class="tip-card fade-in">
                        <div class="tip-card-header">
                            <div class="tip-icon"><i class="fas fa-download"></i></div>
                            <h3>Download &amp; Back Up PDFs</h3>
                        </div>
                        <p>After every print, download the PDF receipt and document copy. This serves as your transaction record and gives customers a digital backup — a valuable value-added service that builds loyalty and trust.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── FAQ ─── -->
        <section class="faq-section">
            <div class="container">
                <div class="faq-grid">

                    <!-- Sidebar -->
                    <div class="faq-sidebar fade-in">
                        <span class="section-label"><i class="fas fa-question-circle" style="margin-right:6px;"></i> FAQ</span>
                        <h2>Frequently Asked <span class="highlight">Questions</span></h2>
                        <p>Have more questions? Browse our answers below or reach our support team directly on WhatsApp — we typically reply within minutes during business hours.</p>
                        <div class="faq-contact-box">
                            <h4><i class="fab fa-whatsapp" style="margin-right:8px;"></i> Need Help?</h4>
                            <p>Our team is available Monday to Saturday, 10 AM – 7 PM for any query related to printing, wallet, or account setup.</p>
                            <a href="https://wa.me/91<?php echo htmlspecialchars($phone); ?>">
                                <i class="fab fa-whatsapp"></i> Chat on WhatsApp
                            </a>
                        </div>
                    </div>

                    <!-- FAQ List -->
                    <div class="faq-list fade-in">

                        <div class="faq-item open">
                            <button class="faq-question">
                                Is registration on <?php echo htmlspecialchars($site_name); ?> free?
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-inner">Yes, creating an account on <?php echo htmlspecialchars($site_name); ?> is completely free. There are no registration fees, no monthly subscription charges, and no hidden costs. You only pay per print via your wallet balance.</div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question">
                                What documents can I print?
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-inner">You can currently print: Aadhaar Card (full, masked, mini), Voter ID Card, Driving License, PAN Card details, Vehicle RC (Registration Certificate), and CSC-specific document bundles. More document types are being added regularly.</div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question">
                                How is wallet balance deducted?
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-inner">Wallet balance is deducted only when a print is successfully completed. If a print fails due to a server error or API timeout, your balance is not deducted and the transaction is automatically reversed within seconds.</div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question">
                                Is the data fetched from official government sources?
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-inner">Yes. All document data is fetched directly from official government APIs — UIDAI for Aadhaar, NVSP for Voter ID, Parivahan for DL and RC, and NSDL/UTI for PAN. We do not store or modify any citizen data.</div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question">
                                Can I use this on mobile or tablet?
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-inner">Yes, <?php echo htmlspecialchars($site_name); ?> is fully responsive and works on smartphones, tablets, and desktop computers. For best printing results, however, we recommend connecting to a printer from a desktop or laptop.</div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question">
                                What if a document fails to fetch?
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-inner">If a fetch fails, no wallet balance is deducted. Common reasons include: incorrect ID number, government server downtime, or unstable internet. Try again after a few minutes or contact our support team via WhatsApp for immediate assistance.</div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question">
                                How do I get a refund if something goes wrong?
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-inner">Failed transactions are reversed automatically within 1–5 minutes. For wallet recharge refunds (in case of payment gateway failure), contact our support team within 24 hours with your transaction ID and we will process the refund within 2–3 business days.</div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question">
                                Is there a limit on how many prints I can do per day?
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-inner">Standard accounts can process up to 200 prints per day. CSC operators and high-volume partners on our Pro plan get unlimited daily prints with priority API access. Contact us to upgrade your account if you need higher volumes.</div>
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
                    <h2>Ready to Start Printing? <span style="color:var(--secondary-color);">It's Free!</span></h2>
                    <p>Join 50,000+ operators already using <?php echo htmlspecialchars($site_name); ?> to serve their communities. Create your account in 2 minutes and print your first document today.</p>
                    <div class="cta-buttons">
                        <a href="../dashboard/register.php" class="cta-btn-white">
                            <i class="fas fa-user-plus" aria-hidden="true"></i> Register for Free
                        </a>
                        <a href="../dashboard/login.php" class="cta-btn-outline">
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
            if (overlay) setTimeout(() => overlay.classList.add('hidden'), 300);
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
            entries.forEach(entry => { if (entry.isIntersecting) entry.target.classList.add('visible'); });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

        /* ── Service Tabs ── */
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');
        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const target = btn.dataset.tab;
                tabBtns.forEach(b => b.classList.remove('active'));
                tabContents.forEach(c => c.classList.remove('active'));
                btn.classList.add('active');
                const targetContent = document.getElementById('tab-' + target);
                if (targetContent) {
                    targetContent.classList.add('active');
                    targetContent.querySelectorAll('.fade-in').forEach(el => {
                        el.classList.remove('visible');
                        setTimeout(() => observer.observe(el), 50);
                    });
                }
            });
        });

        /* ── FAQ Accordion ── */
        document.querySelectorAll('.faq-question').forEach(btn => {
            btn.addEventListener('click', () => {
                const item = btn.closest('.faq-item');
                const isOpen = item.classList.contains('open');
                document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
                if (!isOpen) item.classList.add('open');
            });
        });

        /* ── Keyboard: Escape closes mobile menu ── */
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
