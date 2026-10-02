<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'LaporBanjir') | BPBD Kabupaten Bandung</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f3f7fd;
            color: #172b4d;
        }

        .app {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 245px;
            flex-shrink: 0;
            background: #fff;
            border-right: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            padding: 28px 18px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 42px;
        }

        .brand-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: #1769ed;
            color: white;
            display: grid;
            place-items: center;
            font-size: 26px;
        }

        .brand h2 {
            font-size: 19px;
            color: #123b83;
        }

        .brand p {
            color: #718096;
            font-size: 11px;
            margin-top: 4px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 13px;
            margin-bottom: 8px;
            border-radius: 10px;
            text-decoration: none;
            color: #526581;
            font-size: 14px;
            font-weight: 600;
            transition: .2s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #1769ed;
            background: #eaf2ff;
        }

        .nav-icon {
            width: 22px;
            text-align: center;
            font-size: 18px;
        }

        .emergency {
            margin-top: auto;
            background: linear-gradient(145deg, #eff6ff, #dceaff);
            border: 1px solid #d6e5ff;
            border-radius: 14px;
            padding: 17px;
        }

        .emergency .tag {
            display: inline-block;
            font-size: 10px;
            font-weight: 800;
            color: #dc2626;
            border: 1px solid #fecaca;
            background: white;
            padding: 4px 8px;
            border-radius: 20px;
            margin-bottom: 12px;
        }

        .emergency h4 {
            font-size: 13px;
            margin-bottom: 8px;
        }

        .emergency p {
            font-size: 12px;
            line-height: 1.8;
            color: #526581;
        }

        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            min-height: 78px;
            background: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 18px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .topbar h3 {
            font-size: 16px;
        }

        .topbar p {
            color: #718096;
            font-size: 12px;
            margin-top: 4px;
        }

        .topbar-time {
            color: #718096;
            font-size: 12px;
        }

        .content {
    width: 100%;
    max-width: none;
    margin: 0;
    padding: 30px;
}

        .panel {
    width: 100%;
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 35px;
    box-shadow: 0 5px 20px rgba(28, 55, 90, .06);
}
        .panel-heading {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 25px;
        }

        .heading-icon {
            width: 52px;
            height: 52px;
            border-radius: 13px;
            background: #1769ed;
            color: white;
            display: grid;
            place-items: center;
            font-size: 24px;
            flex-shrink: 0;
        }

        .panel-heading h1 {
            font-size: 25px;
            margin-bottom: 7px;
        }

        .panel-heading p {
            color: #718096;
            font-size: 14px;
            line-height: 1.6;
        }

        .form-grid {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    gap: 35px;
    align-items: start;
}

        .alert {
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
            line-height: 1.7;
        }

        .alert-info {
            background: #eff6ff;
            color: #1e4c91;
            border: 1px solid #d5e5ff;
        }

        .alert-error {
            background: #fff1f2;
            color: #be123c;
            border: 1px solid #fecdd3;
        }

        .field {
            margin-bottom: 21px;
        }

        .field label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .field input,
        .field select {
            width: 100%;
            height: 46px;
            border: 1px solid #d5deea;
            border-radius: 9px;
            padding: 0 14px;
            font-size: 14px;
            color: #253858;
            background: white;
            outline: none;
            transition: .2s;
        }

        .field input:focus,
        .field select:focus {
            border-color: #1769ed;
            box-shadow: 0 0 0 3px #1769ed20;
        }

        .field small {
            display: block;
            color: #718096;
            margin-top: 7px;
            font-size: 12px;
        }

        .field .error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 6px;
        }

        .illustration {
            min-height: 225px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 24px;
            margin-top: 20px;
            border-radius: 14px;
            background: linear-gradient(135deg, #f2f7ff, #e2efff);
        }

        .illustration .big-icon {
            font-size: 70px;
            margin-bottom: 15px;
        }

        .illustration h3 {
            font-size: 17px;
            margin-bottom: 8px;
        }

        .illustration p {
            font-size: 13px;
            line-height: 1.7;
            color: #64748b;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 44px;
            padding: 12px 18px;
            border: none;
            border-radius: 9px;
            background: #1769ed;
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .btn:hover {
            background: #0e52c4;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: white;
            color: #344563;
            border: 1px solid #d9e2ef;
        }

        .btn-secondary:hover {
            background: #f4f7fb;
            color: #1769ed;
        }

        .form-actions {
            margin-top: 25px;
        }

        .form-actions .btn {
            width: 100%;
        }

        .success-header {
            text-align: center;
            padding: 10px 10px 28px;
        }

        .success-icon {
            width: 66px;
            height: 66px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            margin: 0 auto 15px;
            background: #dcfce7;
            color: #16a34a;
            font-size: 37px;
            font-weight: 800;
        }

        .success-header h1 {
            font-size: 27px;
            margin-bottom: 10px;
        }

        .success-header p {
            color: #718096;
            font-size: 14px;
            line-height: 1.7;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .summary-section + .summary-section {
            border-left: 1px solid #e2e8f0;
            padding-left: 30px;
        }

        .summary-section h3 {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            padding: 12px 0;
            border-bottom: 1px solid #edf1f7;
            font-size: 13px;
        }

        .summary-row span {
            color: #718096;
        }

        .summary-row strong {
            text-align: right;
            overflow-wrap: anywhere;
        }

        .status-badge {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .status-rendah {
            background: #dcfce7;
            color: #15803d;
        }

        .status-sedang {
            background: #fef3c7;
            color: #b45309;
        }

        .status-tinggi,
        .status-sangat {
            background: #fee2e2;
            color: #b91c1c;
        }

        .advice {
            background: #fff8e7;
            border: 1px solid #fde7a9;
            padding: 15px;
            border-radius: 9px;
            font-size: 13px;
            line-height: 1.7;
            color: #85530c;
        }

        .bottom-actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
            margin-top: 24px;
        }

        .footer-note {
            margin-top: 20px;
            text-align: center;
            color: #718096;
            font-size: 12px;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 210px;
                padding: 20px 12px;
            }

            .content {
                padding: 20px;
            }

            .panel {
                padding: 22px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .summary-section + .summary-section {
                border-left: none;
                border-top: 1px solid #e2e8f0;
                padding: 24px 0 0;
            }
        }

        @media (max-width: 600px) {
            .app {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 15px;
            }

            .brand {
                margin-bottom: 15px;
            }

            .sidebar nav {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
            }

            .nav-link {
                padding: 10px;
                margin: 0;
                font-size: 12px;
            }

            .emergency {
                display: none;
            }

            .topbar {
                padding: 16px;
            }

            .topbar-time {
                display: none;
            }

            .content {
                padding: 14px;
            }

            .panel {
                padding: 18px;
            }

            .panel-heading h1 {
                font-size: 21px;
            }

            .summary-row {
                flex-direction: column;
                gap: 5px;
            }

            .summary-row strong {
                text-align: left;
            }
        }

       @media (min-width: 901px) {
    .panel-heading h1 {
        font-size: 28px;
    }

    .panel-heading p {
        font-size: 15px;
    }

    .field label {
        font-size: 14px;
    }

    .field input,
    .field select {
        height: 50px;
        font-size: 14px;
    }

    .illustration {
        min-height: 250px;
    }
}

@media (max-width: 900px) {
    .form-grid {
        grid-template-columns: 1fr;
    }

    .content {
        padding: 16px;
    }
}
    </style>

    @stack('styles')
</head>
<body>
    <div class="app">
        <aside class="sidebar">
            <div class="brand">
                <div class="brand-icon">≋</div>
                <div>
                    <h2>LaporBanjir</h2>
                    <p>BPBD Kabupaten Bandung</p>
                </div>
            </div>

            
<nav>
    <a href="{{ route('lapor.form') }}"
       class="nav-link {{ request()->routeIs('lapor.*') ? 'active' : '' }}">
        <span class="nav-icon">▣</span>
        Lapor Banjir
    </a>

    <a href="{{ route('lapor.form') }}#tentang" class="nav-link">
        <span class="nav-icon">ⓘ</span>
        Tentang Aplikasi
    </a>
</nav>

            <div class="emergency">
                <span class="tag">● DARURAT</span>
                <h4>Hubungi BPBD</h4>
                <p>
                    ☎ Nomor BPBD setempat<br>
                    <strong>Hubungi petugas saat darurat</strong>
                </p>
            </div>
        </aside>

        <main class="main">
            <header class="topbar">
                <div>
                    <h3>Sistem Pelaporan Banjir</h3>
                    <p>Kabupaten Bandung</p>
                </div>

                <div class="topbar-time">
                    ◷ {{ now('Asia/Jakarta')->format('d M Y, H:i') }} WIB
                </div>
            </header>

            <div class="content">
                @yield('content')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>
</html>