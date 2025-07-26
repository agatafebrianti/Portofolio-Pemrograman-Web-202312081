<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu Digital STITEK Bontang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        .submit-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #1e88e5;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .success {
            background-color: #e1f5fe;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            border-left: 5px solid #0288d1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Buku Tamu Digital STITEK Bontang</h1>

        <?php
        // Inisialisasi variabel
        $nama = $email = $pesan = "";
        $error = "";
        $success = "";

        // Cek jika form disubmit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validasi input tidak boleh kosong
            if (empty($_POST["nama"]) || empty($_POST["email"]) || empty($_POST["pesan"])) {
                $error = "Semua kolom harus diisi!";
            } else {
                // Bersihkan input
                $nama = htmlspecialchars($_POST["nama"]);
                $email = htmlspecialchars($_POST["email"]);
                $pesan = htmlspecialchars($_POST["pesan"]);

                // Tampilkan pesan konfirmasi
                $success = "
                    <div class='success'>
                        <strong>Terima kasih atas kunjungan Anda!</strong><br><br>
                        <b>Nama:</b> $nama <br>
                        <b>Email:</b> $email <br>
                        <b>Pesan:</b><br>" . nl2br($pesan) . "
                    </div>
                ";
            }
        }
        ?>

        <!-- Form Buku Tamu -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" name="nama" id="nama" value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>">

            <label for="email">Alamat Email:</label>
            <input type="email" name="email" id="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">

            <label for="pesan">Pesan/Komentar:</label>
            <textarea name="pesan" id="pesan"><?php echo isset($_POST['pesan']) ? htmlspecialchars($_POST['pesan']) : ''; ?></textarea>

            <button type="submit" class="submit-btn">Kirim Pesan</button>
        </form>

        <!-- Tampilkan error jika ada -->
        <?php
        if (!empty($error)) {
            echo "<div class='error'>$error</div>";
        }

        // Tampilkan data jika berhasil
        echo $success;
        ?>
    </div>
</body>
</html>
