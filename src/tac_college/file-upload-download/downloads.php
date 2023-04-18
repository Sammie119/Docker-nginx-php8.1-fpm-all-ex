<?php include 'filesLogic.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css">
  <title>Download files</title>
</head>
<body>

<table>
<thead>
    <th>ID</th>
    <th nowrap="">Filename</th>
    <th>Downloads</th>
    <th nowrap="">size (in kb)</th>
    <th>Action</th>
</thead>
<tbody>
  <?php foreach ($files as $file): ?>
    <tr>
      <td><?php echo $file['handoutID']; ?></td>
      <td nowrap><?php echo $file['name']; ?></td>
      <td><?php echo $file['downloads']; ?></td>
      <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
      <td><a href="downloads.php?file_id=<?php echo $file['handoutID'] ?>">Download</a></td>
    </tr>
  <?php endforeach;?>
<div style="text-align: center;">
  <a href="../index.html">Back</a>
</div>
  

</tbody>
</table>

</body>
</html>