<?php
require_once 'webapikingconfig/webapikingdb.php';
$sql = "SELECT site_name, address, phone, email FROM settings WHERE id = 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $settings = $result->fetch_assoc();
    $site_name = $settings['site_name'];
    $phone = $settings['phone'];
    $email = $settings['email'];
    $address = $settings['address'];
} else {
    $site_name = "PRINT PORTAL";
    $phone = " ";
    $email = "support@yourwebsite.com";
    $address = "Your Office Address, India";
}
?>
<!DOCTYPE html>
<link rel="icon" href="/images/icons/6323119839395908375_99.jpg">
<html lang="en-US">
<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-T3HJXQZP11"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-T3HJXQZP11');
    </script>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#4361ee">
    <meta name="description" content="Contact <?php echo htmlspecialchars($site_name); ?> - Get in touch with India's #1 platform for printing Aadhaar Card, PAN Card, Voter ID, and Driving License.">
    <meta name="keywords" content="contact us, <?php echo htmlspecialchars($site_name); ?>, print portal contact, customer support">
    <title>Contact Us - <?php echo htmlspecialchars($site_name); ?></title>
    
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="icon" href="images/printportalicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    
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
        
        /* Reset and Base Styles */
        *, *::before, *::after {
            box-sizing: border-box;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
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
        
        /* Skip to content for accessibility */
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
        
        .skip-to-content:focus {
            top: 6px;
        }
        
        /* Container */
        .container {
            max-width: var(--container-max-width);
            margin: 0 auto;
            padding: 0 24px;
            width: 100%;
        }
        
        /* Enhanced Header */
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
        
        .logo:hover {
            transform: scale(1.05);
        }
        
        .logo span {
            font-size: 28px;
            font-weight: 600;
            color: var(--text-color);
            margin-left: 12px;
        }
        
        .logo .highlight {
            color: var(--primary-color);
        }
        
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
        .nav-links li a.active {
            color: var(--primary-color);
        }
        
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
        .nav-links li a.active::after {
            width: 100%;
        }
        
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

        .nav-dropdown-menu a i {
            width: 22px;
            color: var(--primary-color);
            font-size: 14px;
        }

        .nav-dropdown > a::after { display: none !important; }
        
        .nav-buttons {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        
        /* Enhanced Button Styles */
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
        
        .btn:hover::before {
            left: 100%;
        }
        
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
        
        .large-btn {
            padding: 16px 32px;
            font-size: 18px;
        }
        
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
        
        /* Page Section */
        .page-section {
            padding: 120px 0;
            position: relative;
            overflow: hidden;
            min-height: 80vh;
            display: flex;
            align-items: center;
        }
        
        .page-header {
            text-align: center;
            margin-bottom: 80px;
        }
        
        .page-header h1 {
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            font-weight: 700;
            margin-bottom: 24px;
            line-height: 1.2;
        }
        
        .page-header p {
            font-size: 18px;
            color: var(--text-light);
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.7;
        }
        
        .highlight {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Enhanced Contact Section */
        .contact-section {
            padding: 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            margin-top: -80px;
        }
        
        .contact-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }
        
        .contact-info, .contact-form {
            background: var(--surface-color);
            padding: 48px;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-light);
            border: 1px solid var(--border-color);
        }
        
        .contact-info h3, .contact-form h3 {
            font-size: 28px;
            margin-bottom: 32px;
            position: relative;
            color: var(--text-color);
        }
        
        .contact-info h3::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-light));
            border-radius: 2px;
        }
        
        .contact-info ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .contact-info li {
            display: flex;
            gap: 20px;
            margin-bottom: 32px;
            align-items: flex-start;
        }
        
        .contact-info i {
            color: var(--primary-color);
            font-size: 24px;
            background: linear-gradient(135deg, rgba(67, 97, 238, 0.1), rgba(67, 97, 238, 0.05));
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        
        .contact-info h4 {
            margin: 0 0 8px;
            font-size: 18px;
            font-weight: 600;
        }
        
        .contact-info p {
            margin: 0;
            color: var(--text-light);
        }
        
        .social-links {
            display: flex;
            gap: 16px;
            margin-top: 48px;
        }
        
        .social-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--surface-color);
            color: var(--primary-color);
            box-shadow: var(--shadow-light);
            transition: var(--transition);
            font-size: 20px;
            border: 1px solid var(--border-color);
            text-decoration: none;
        }
        
        .social-icon:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-4px);
            box-shadow: var(--shadow-medium);
        }
        
        /* Enhanced Form Styles */
        .form-group {
            margin-bottom: 24px;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid var(--border-color);
            border-radius: var(--border-radius);
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            transition: var(--transition);
            background: var(--surface-color);
        }
        
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }
        
        /* Floating Buttons */
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
        
        .floating-whatsapp {
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #25d366, #128c7e);
        }
        
        .floating-whatsapp:hover {
            transform: translateY(-4px) scale(1.05);
            box-shadow: var(--shadow-heavy);
        }
        
        #back-to-top {
            bottom: 30px;
            left: 30px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            opacity: 0;
            visibility: hidden;
        }
        
        #back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }
        
        #back-to-top:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-heavy);
        }
        
        /* Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1), 
                        transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--surface-color);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }
        
        .loading-overlay.hidden {
            opacity: 0;
            pointer-events: none;
        }
        
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
        
        /* Enhanced Responsive Design */
        @media (max-width: 1200px) {
            .container {
                padding: 0 20px;
            }
        }
        
        @media (max-width: 992px) {
            .contact-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }
        }
        
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(10px);
                flex-direction: column;
                align-items: center;
                justify-content: center;
                z-index: 1000;
                gap: 32px;
            }
            
            .nav-links.active {
                display: flex;
            }
            
            .nav-links li a {
                font-size: 24px;
                font-weight: 600;
            }
            
            .mobile-menu-btn {
                display: flex;
            }
            
            .mobile-menu-btn.active span:nth-child(1) {
                transform: rotate(45deg) translate(6px, 6px);
            }
            
            .mobile-menu-btn.active span:nth-child(2) {
                opacity: 0;
                transform: translateX(20px);
            }
            
            .mobile-menu-btn.active span:nth-child(3) {
                transform: rotate(-45deg) translate(6px, -6px);
            }
            
            .contact-info, .contact-form {
                padding: 32px 24px;
            }
            
            .floating-whatsapp, #back-to-top {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 0 16px;
            }
            
            .page-header h1 {
                font-size: 2rem;
            }
        }
        
        /* Print Styles */
        @media print {
            .floating-whatsapp, #back-to-top,
            .mobile-menu-btn, nav {
                display: none !important;
            }
            
            body {
                font-size: 12pt;
                line-height: 1.4;
            }
        }
        
        /* Reduced Motion */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
        
        /* Enhanced Footer Styles with Custom Dark Navy */
        .footer {
            background: linear-gradient(135deg, #001233 0%, #1e3c72 100%);
            color: white;
            padding: 60px 0 20px;
            margin-top: 80px;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
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
            bottom: -8px;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .footer-logo span {
            font-size: 24px;
            font-weight: 600;
            color: white;
            margin-left: 12px;
        }

        .footer-logo .highlight {
            color: var(--primary-color);
        }

        .footer-column p {
            color: #b2bec3;
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: #b2bec3;
            text-decoration: none;
            font-size: 15px;
            transition: var(--transition);
            display: flex;
            align-items: center;
            padding: 4px 0;
        }

        .footer-links a:hover {
            color: var(--primary-color);
            transform: translateX(5px);
        }

        .footer-contact {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-contact li {
            display: flex;
            align-items: center;
            margin-bottom: 16px;
            color: #b2bec3;
            font-size: 15px;
        }

        .footer-contact i {
            color: var(--primary-color);
            margin-right: 12px;
            width: 18px;
            text-align: center;
        }

        .footer-social {
            display: flex;
            gap: 16px;
            margin-top: 20px;
        }

        .footer-social .social-icon {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 18px;
            transition: var(--transition);
            border: 2px solid transparent;
        }

        .footer-social .social-icon:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.3);
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

        .footer-whatsapp:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 211, 102, 0.3);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .copyright p {
            margin: 0;
            color: #b2bec3;
            font-size: 14px;
        }

        .footer-bottom-links {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        .footer-bottom-links a {
            color: #b2bec3;
            text-decoration: none;
            font-size: 14px;
            transition: var(--transition);
        }

        .footer-bottom-links a:hover {
            color: var(--primary-color);
        }
    </style>
</head>

<body>
    <div class="loading-overlay" id="loadingOverlay">
        <div class="spinner"></div>
    </div>
    
    <a href="#main-content" class="skip-to-content">Skip to main content</a>

    <header id="header" role="banner">
        <div class="container">
            <div class="header-container">
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
                        <li><a href="contact.php" class="active">Contact</a></li>
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
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>

    <main id="main-content">
        <section class="page-section">
            <div class="container">
                <div class="page-header fade-in">
                    <h1>Get in <span class="highlight">Touch</span></h1>
                    <p>Contact us for any information or assistance with <?php echo htmlspecialchars($site_name); ?> services. We're here to help!</p>
                </div>
            </div>
        </section>

        <section class="contact-section">
            <div class="container">
                <div class="contact-container" style="padding: 80px 0;">
                    <div class="contact-info fade-in">
                        <h3>Contact Information</h3>
                        <ul>
                            <li>
                                <i class="fas fa-phone" aria-hidden="true"></i>
                                <div>
                                    <h4>Phone/WhatsApp</h4>
                                    <p><a href="tel:+91<?php echo htmlspecialchars($phone); ?>" style="color: inherit; text-decoration: none;">+91 <?php echo htmlspecialchars($phone); ?></a></p>
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                <div>
                                    <h4>Email</h4>
                                    <p><a href="mailto:<?php echo htmlspecialchars($email); ?>" style="color: inherit; text-decoration: none;"><?php echo htmlspecialchars($email); ?></a></p>
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-clock" aria-hidden="true"></i>
                                <div>
                                    <h4>Office Hours</h4>
                                    <p>Monday - Saturday: 10:00 AM - 7:00 PM (IST)</p>
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                <div>
                                    <h4>Service Area</h4>
                                    <p>All India - Remote Support Available</p>
                                </div>
                            </li>
                        </ul>
                        
                        <div class="social-links">
                            <a href="#" class="social-icon" aria-label="Follow us on Facebook">
                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="social-icon" aria-label="Follow us on Instagram">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="social-icon" aria-label="Follow us on Twitter">
                                <i class="fab fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="https://wa.me/91<?php echo htmlspecialchars($phone); ?>" class="social-icon" aria-label="Contact us on WhatsApp">
                                <i class="fab fa-whatsapp" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="contact-form fade-in">
                        <h3>Send Us a Message</h3>
                        <form id="contactForm" novalidate>
                            <div class="form-group">
                                <input type="text" id="name" name="name" placeholder="Your Name *" required aria-required="true">
                            </div>
                            <div class="form-group">
                                <input type="email" id="email" name="email" placeholder="Your Email *" required aria-required="true">
                            </div>
                            <div class="form-group">
                                <input type="tel" id="phone" name="phone" placeholder="Your Phone Number *" required aria-required="true">
                            </div>
                            <div class="form-group">
                                <select id="service" name="service" aria-label="Select service">
                                    <option value="">Select Service</option>
                                    <option value="aadhar">Aadhaar Card Printing</option>
                                    <option value="voter">Voter ID Card Printing</option>
                                    <option value="dl">Driving License Printing</option>
                                    <option value="pan">PAN Card Printing</option>
                                    <option value="rc">Vehicle RC Printing</option>
                                    <option value="business">Business Partnership</option>
                                    <option value="technical">Technical Support</option>
                                    <option value="other">Other Services</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea id="message" name="message" rows="5" placeholder="Your Message *" required aria-required="true"></textarea>
                            </div>
                            <button type="submit" class="btn primary-btn">
                                <i class="fas fa-paper-plane" aria-hidden="true"></i> Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <a href="https://wa.me/91<?php echo htmlspecialchars($phone); ?>" class="floating-whatsapp" aria-label="Contact us on WhatsApp">
        <i class="fab fa-whatsapp" aria-hidden="true"></i>
    </a>
    
    <button id="back-to-top" title="Back to Top" aria-label="Back to top">
        <i class="fas fa-arrow-up" aria-hidden="true"></i>
    </button>

    <script>
        // Modern JavaScript with better performance and features
        class PrintPortalSite {
            constructor() {
                this.init();
                this.bindEvents();
                this.initAnimations();
                this.initPerformanceOptimizations();
            }

            init() {
                // Hide loading overlay
                setTimeout(() => {
                    const loadingOverlay = document.getElementById('loadingOverlay');
                    if (loadingOverlay) {
                        loadingOverlay.classList.add('hidden');
                        setTimeout(() => loadingOverlay.remove(), 500);
                    }
                }, 1000);

                // Initialize components
                this.mobileMenuBtn = document.querySelector('.mobile-menu-btn');
                this.navLinks = document.querySelector('.nav-links');
                this.header = document.querySelector('header');
                this.backToTopBtn = document.getElementById('back-to-top');
                this.contactForm = document.getElementById('contactForm');
            }

            bindEvents() {
                // Mobile menu toggle
                if (this.mobileMenuBtn && this.navLinks) {
                    this.mobileMenuBtn.addEventListener('click', () => this.toggleMobileMenu());
                    
                    // Close mobile menu when clicking on links
                    this.navLinks.querySelectorAll('a').forEach(link => {
                        link.addEventListener('click', () => this.closeMobileMenu());
                    });
                    
                    // Close mobile menu when clicking outside
                    document.addEventListener('click', (e) => {
                        if (!this.mobileMenuBtn.contains(e.target) && !this.navLinks.contains(e.target)) {
                            this.closeMobileMenu();
                        }
                    });
                }

                // Smooth scrolling for anchor links
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', (e) => this.handleAnchorClick(e));
                });

                // Scroll events with throttling
                let scrollTimeout;
                window.addEventListener('scroll', () => {
                    if (scrollTimeout) return;
                    scrollTimeout = setTimeout(() => {
                        this.handleScroll();
                        scrollTimeout = null;
                    }, 16); // ~60fps
                });

                // Back to top button
                if (this.backToTopBtn) {
                    this.backToTopBtn.addEventListener('click', () => this.scrollToTop());
                }

                // Contact form
                if (this.contactForm) {
                    this.contactForm.addEventListener('submit', (e) => this.handleContactForm(e));
                }

                // Keyboard navigation
                document.addEventListener('keydown', (e) => this.handleKeyboard(e));

                // Window resize
                let resizeTimeout;
                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimeout);
                    resizeTimeout = setTimeout(() => this.handleResize(), 250);
                });
            }

            toggleMobileMenu() {
                this.mobileMenuBtn.classList.toggle('active');
                this.navLinks.classList.toggle('active');
                this.mobileMenuBtn.setAttribute('aria-expanded', 
                    this.navLinks.classList.contains('active'));
                
                // Prevent body scroll when menu is open
                document.body.style.overflow = this.navLinks.classList.contains('active') ? 'hidden' : '';
            }

            closeMobileMenu() {
                this.mobileMenuBtn.classList.remove('active');
                this.navLinks.classList.remove('active');
                this.mobileMenuBtn.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            }

            handleAnchorClick(e) {
                const href = e.target.getAttribute('href');
                if (!href || href === '#') return;

                e.preventDefault();
                this.closeMobileMenu();

                const targetElement = document.querySelector(href);
                if (targetElement) {
                    const headerHeight = this.header.offsetHeight;
                    const targetPosition = targetElement.offsetTop - headerHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            }

            handleScroll() {
                const scrollY = window.scrollY;
                
                // Header scroll effect
                if (scrollY > 50) {
                    this.header.classList.add('scrolled');
                } else {
                    this.header.classList.remove('scrolled');
                }
                
                // Back to top button visibility
                if (scrollY > 300) {
                    this.backToTopBtn.classList.add('visible');
                } else {
                    this.backToTopBtn.classList.remove('visible');
                }
            }

            scrollToTop() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }

            handleContactForm(e) {
                e.preventDefault();
                
                // Form validation
                const formData = new FormData(this.contactForm);
                const data = Object.fromEntries(formData);
                
                if (!this.validateForm(data)) return;

                // Show loading state
                const submitBtn = this.contactForm.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
                submitBtn.disabled = true;

                // Simulate form submission (replace with actual API call)
                setTimeout(() => {
                    this.showMessage('Thank you! Your message has been sent successfully.', 'success');
                    this.contactForm.reset();
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            }

            validateForm(data) {
                const errors = [];
                
                if (!data.name?.trim()) errors.push('Name is required');
                if (!data.email?.trim()) errors.push('Email is required');
                if (!this.isValidEmail(data.email)) errors.push('Please enter a valid email');
                if (!data.phone?.trim()) errors.push('Phone number is required');
                if (!data.message?.trim()) errors.push('Message is required');

                if (errors.length > 0) {
                    this.showMessage(errors.join(', '), 'error');
                    return false;
                }
                
                return true;
            }

            isValidEmail(email) {
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            }

            showMessage(message, type = 'info') {
                // Create and show toast notification
                const toast = document.createElement('div');
                toast.className = `toast toast-${type}`;
                toast.innerHTML = `
                    <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i>
                    <span>${message}</span>
                `;
                
                // Add toast styles if not exists
                if (!document.querySelector('#toast-styles')) {
                    const styles = document.createElement('style');
                    styles.id = 'toast-styles';
                    styles.textContent = `
                        .toast {
                            position: fixed;
                            top: 100px;
                            right: 30px;
                            background: white;
                            padding: 16px 20px;
                            border-radius: 12px;
                            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
                            display: flex;
                            align-items: center;
                            gap: 12px;
                            z-index: 10000;
                            transform: translateX(400px);
                            transition: transform 0.3s ease;
                            max-width: 350px;
                            border-left: 4px solid var(--primary-color);
                        }
                        .toast.toast-success { border-left-color: var(--success-color); }
                        .toast.toast-error { border-left-color: var(--error-color); }
                        .toast.show { transform: translateX(0); }
                        .toast i { color: var(--primary-color); }
                        .toast.toast-success i { color: var(--success-color); }
                        .toast.toast-error i { color: var(--error-color); }
                    `;
                    document.head.appendChild(styles);
                }
                
                document.body.appendChild(toast);
                
                setTimeout(() => toast.classList.add('show'), 100);
                setTimeout(() => {
                    toast.classList.remove('show');
                    setTimeout(() => toast.remove(), 300);
                }, 5000);
            }

            handleKeyboard(e) {
                // ESC to close mobile menu
                if (e.key === 'Escape' && this.navLinks.classList.contains('active')) {
                    this.closeMobileMenu();
                }
            }

            handleResize() {
                // Close mobile menu on resize to desktop
                if (window.innerWidth > 768) {
                    this.closeMobileMenu();
                }
            }

            initAnimations() {
                // Intersection Observer for fade-in animations
                const observerOptions = {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                        }
                    });
                }, observerOptions);

                // Observe all fade-in elements
                document.querySelectorAll('.fade-in').forEach(element => {
                    observer.observe(element);
                });
            }

            initPerformanceOptimizations() {
                // Lazy load images
                if ('IntersectionObserver' in window) {
                    const imageObserver = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                const img = entry.target;
                                if (img.dataset.src) {
                                    img.src = img.dataset.src;
                                    img.removeAttribute('data-src');
                                    imageObserver.unobserve(img);
                                }
                            }
                        });
                    });

                    document.querySelectorAll('img[data-src]').forEach(img => {
                        imageObserver.observe(img);
                    });
                }

                // Preload critical pages
                const criticalLinks = ['dashboard/login.php', 'dashboard/register.php'];
                criticalLinks.forEach(link => {
                    const linkElement = document.createElement('link');
                    linkElement.rel = 'prefetch';
                    linkElement.href = link;
                    document.head.appendChild(linkElement);
                });
            }
        }

        // Initialize the site when DOM is loaded
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => new PrintPortalSite());
        } else {
            new PrintPortalSite();
        }

        // Performance monitoring
        window.addEventListener('load', () => {
            if ('performance' in window) {
                const perfData = performance.getEntriesByType('navigation')[0];
                console.log(`Page loaded in ${Math.round(perfData.loadEventEnd - perfData.fetchStart)}ms`);
            }
        });
    </script>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "<?php echo htmlspecialchars($site_name); ?>",
        "url": "contact.php",
        "logo": "images/printportalicon.svg",
        "description": "Contact us for information and assistance with <?php echo htmlspecialchars($site_name); ?> services.",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+91-<?php echo htmlspecialchars($phone); ?>",
            "contactType": "customer service",
            "availableLanguage": ["English", "Hindi"]
        },
        "sameAs": [
            "https://wa.me/91<?php echo htmlspecialchars($phone); ?>"
        ]
    }
    </script>
    
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
                <p>Print Aadhaar Card, Find & Print PAN Card, Print Voter ID, Print Driving License and other documents to card size. Solutions for cyber cafes and service centers.</p>
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
                    <li><i class="fas fa-envelope"></i> <a href="mailto:<?php echo htmlspecialchars($email); ?>" style="color: inherit; text-decoration: none;"><?php echo htmlspecialchars($email); ?></a></li>
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
</body>
</html>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-18191198680"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-18191198680');
</script>
