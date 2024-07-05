<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .badge {
            font-size: 90%;
            font-weight: 400;
            padding: 0.25em 0.4em;
            border-radius: 0.25rem;
            white-space: nowrap;
        }

        .badge-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .badge-success {
            background-color: #28a745;
            color: #fff;
        }

        .badge-secondary {
            background-color: #6c757d;
            color: #fff;
        }
    </style>
</head>

<body onload="print()">
    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['absensi'])) : ?>
                <?php foreach ($data['absensi'] as $index => $absensi) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $absensi['username'] ?></td>
                        <td><?= $absensi['nama_kelas'] ?></td>
                        <td>
                            <?php if (isset($absensi['absensi'])) : ?>
                                <?php if ($absensi['absensi'] == 0) : ?>
                                    <span class="badge badge-danger">ALFA</span>
                                <?php elseif ($absensi['absensi'] == 1) : ?>
                                    <span class="badge badge-success">HADIR</span>
                                <?php endif; ?>
                            <?php else : ?>
                                <span class="badge badge-secondary">-</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data absensi</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>