<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .button {
            display: inline-block;
            padding: 12px 30px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #888;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🎉 Selamat Datang!</h1>
    </div>
    
    <div class="content">
        <h2>Halo, {{ $user->name }}!</h2>
        
        <p>Terima kasih telah mendaftar di <strong>Kain Lap Majun</strong>. Akun Anda telah berhasil dibuat dan siap digunakan.</p>
        
        <p><strong>Detail Akun:</strong></p>
        <ul>
            <li>Nama: {{ $user->name }}</li>
            <li>Email: {{ $user->email }}</li>
            <li>Tanggal Registrasi: {{ $user->created_at->format('d F Y, H:i') }}</li>
        </ul>
        
        <p>Anda sekarang dapat mengakses seluruh fitur yang tersedia di platform kami.</p>
        
        <p>Jika Anda memiliki pertanyaan atau membutuhkan bantuan, jangan ragu untuk menghubungi tim support kami.</p>
        
        <p>Selamat berbelanja!</p>
        
        <p>Salam hangat,<br>
        <strong>Tim Kain Lap Majun</strong></p>
    </div>
    
    <div class="footer">
        <p>&copy; {{ date('Y') }} Kain Lap Majun. All rights reserved.</p>
        <p>Email ini dikirim otomatis, mohon tidak membalas email ini.</p>
    </div>
</body>
</html>
