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

$sql = "SELECT email FROM users1"; // Do NOT select password
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
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</body>
</html>
