<?php include 'koneksi.php'; ?>

<h2>tambah data</h2>
<form method="POST" action="insert.php">
    nama: <input type="text" name="nama" required><br>
    email: <input type="email" name="email" required><br>
    <button type="submit">Simpan</button>
</form>

<h2>data mahasiswa</h2>
<table border="1">
    <tr>
        <th>no</th>
        <th>nama</th>
        <th>email</th>
        <th>aksi</th>
    </tr>

    <?php
    $no = 1;
    $data = mysqli_query($conn, "SELECT * FROM mahasiswa");
    while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['nama']; ?></td>
            <td><?= $d['email']; ?></td>
            <td>
                <a href="edit.php?id=<?= $d['id']; ?>">edit</a>
                <a href="delete.php?id=<?= $d['id']; ?>" onclick="return confirm('yakin?')">delete</a>
            </td>
        </tr>
    <?php } ?>
</table>


    