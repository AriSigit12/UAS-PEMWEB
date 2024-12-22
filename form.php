<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pengguna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Formulir Pengguna</h1>
    <form id="userForm" action="submit.php" method="POST">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="gender">Jenis Kelamin:</label>
        <input type="radio" id="male" name="gender" value="Male"> Laki-laki
        <input type="radio" id="female" name="gender" value="Female"> Perempuan<br>

        <label for="subscribe">Berlangganan:</label>
        <input type="checkbox" id="subscribe" name="subscribe" value="yes"> Ya, saya ingin berlangganan.<br>

        <input type="submit" value="Kirim">
    </form>

    <h2>Data Pengguna</h2>
    <table id="dataTable">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Berlangganan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Koneksi ke database (gunakan koneksi yang sudah ada)
            include 'db.php';  // Pastikan ini adalah file koneksi yang benar

            // Query untuk mengambil semua data pengguna
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);

            // Cek apakah ada data yang dikembalikan
            if (mysqli_num_rows($result) > 0) {
                // Menampilkan data dalam tabel
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['subscribe']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data ditemukan.</td></tr>";
            }

            // Menutup koneksi
            mysqli_close($conn);
            ?>
        </tbody>
    </table>

    <script src="script.js"></script>
</body>
</html>
