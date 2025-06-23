<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>User List</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f9f9f9;
      padding: 40px;
      display: flex;
      justify-content: center;
    }
    table {
      border-collapse: collapse;
      width: 60%;
      background: white;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      border-radius: 8px;
      overflow: hidden;
    }
    thead {
      background-color: #007BFF;
      color: white;
      font-weight: bold;
    }
    th, td {
      padding: 15px 20px;
      text-align: left;
    }
    tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    tbody tr:hover {
      background-color: #e1f0ff;
    }
  </style>
</head>
<body>

<?php
include_once('config.php');

$sql = "SELECT email FROM users1"; 
$getUsers = $conn->prepare($sql);
$getUsers->execute();
$users = $getUsers->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
  <thead>
    <tr>
      <th>Email</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
      <td><?= htmlspecialchars($user['email']) ?></td>
      <td>
        <form action="delete.php" method="POST" onsubmit="return confirm('Are you sure?');">
          <input type="hidden" name="email" value="<?= htmlspecialchars($user['email']) ?>" />
          <button type="submit">Delete</button>
        </form>
        <button><a href="udb.php?email=<?= urlencode($user['email']) ?>">Edit</a></button>
      
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<ul class="nav nav-tabs mb-3" id="ex-with-icons" role="tablist">
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link active" id="ex-with-icons-tab-1" href="dashboard.php" role="tab"
      aria-controls="ex-with-icons-tabs-1" aria-selected="true"><i class="fas fa-chart-pie fa-fw me-2"></i>Dashboard</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-2" href="udb.php" role="tab"
      aria-controls="ex-with-icons-tabs-2" aria-selected="false"><i class="fas fa-chart-line fa-fw me-2"></i>Update</a>
  </li>
</ul>
<script>

// Initialization for ES Users
import { Tab, initMDB } from "mdb-ui-kit";

initMDB({ Tab });
</script>

</body>
</html>
