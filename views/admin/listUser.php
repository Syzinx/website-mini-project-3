<?php
include "../templates/head.php";
require '../../koneksi.php';

// Periksa koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM user";
$result = mysqli_query($conn, $query);

function deleteUser($id)
{
    global $conn;

    // Query untuk menghapus User berdasarkan ID
    $query = "DELETE FROM user WHERE id_user = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "User dengan ID: " . $id . " berhasil dihapus";
    } else {
        echo "Gagal menghapus User. Error: " . mysqli_error($conn);
    }
}
?>

<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        .wrap h1 {
            margin-top: 60px;
            margin-left: 50px;
            margin-right: 50px;
        }

        .table {
            margin-left: 50px;
            margin-right: 50px;
            border-radius: 8px;
            border: 1px #dedad1 solid;
        }

        th,
        td {
            margin-top: 25px;
            padding: 8px;
            text-align: left;
            border-radius: 8px 8px 0px 0px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            padding: 6px 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        button.details {
            background-color: #2196F3;
            border-radius: 5px;
        }

        button.details:hover {
            background-color: #0b7dda;
            border-radius: 5px;
        }

        button.delete {
            background-color: #f44336;
            border-radius: 5px;
        }

        button.delete:hover {
            background-color: #da190b;
        }
    </style>
</head>
<div class="wrap">
    <h1>Daftar User</h1>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>ID User</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
    </div>
    <tbody>
        <?php while ($user = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $user['id_user']; ?></td>
                <td><?php echo $user['nama']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td>
                    <button class="details" onclick="window.location.href='./detailUser.php?id=<?php echo $user['id_user']; ?>'">Details</button>
                    <button class="delete" onclick="deleteUser(<?php echo $user['id_user']; ?>)">Delete</button>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
    </table>
</div>

<script>
    function deleteUser(id) {
        if (confirm("Apakah Anda yakin ingin menghapus User dengan ID " + id + "?")) {
            window.location.href = "./deleteUser.php?id=" + id;
        }
    }
</script>

<?php
// Tutup koneksi database
mysqli_close($conn);
?>

<?php include "../templates/foot.php"; ?>
