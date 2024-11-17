<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="css/semantic.js"></script>
  
    <link href="css/semantic.css" rel="stylesheet">
    <link href="css/icon.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    
<?php include 'includes/art-header.inc.php'; ?>
    
<main class="ui container">
    <section class="ui basic segment">
      <h2>Favorites</h2>
        <table class="ui basic collapsing table">
          <thead>
            <tr>
              <th>Image</th>
              <th>Title</th>
              <th>Action</th>
          </tr>
          </thead>
          <tbody>
              <?php 
              if (isset($_SESSION['favorites']) && count($_SESSION['favorites']) > 0) {
                  foreach ($_SESSION['favorites'] as $favorite) {
                      echo '<tr>';
                      echo '<td><img src="images/art/square-medium/' . htmlspecialchars($favorite['ImageFileName']) . '.jpg" alt="' . htmlspecialchars($favorite['Title']) . '"></td>';
                      echo '<td><a href="single-painting.php?id=' . intval($favorite['PaintingID']) . '">' . htmlspecialchars($favorite['Title']) . '</a></td>';
                      echo '<td><a class="ui small button" href="remove-favorites.php?id=' . intval($favorite['PaintingID']) . '">Remove</a></td>';
                      echo '</tr>';
                  }
              } else {
                  echo '<tr><td colspan="3">No favorites added yet.</td></tr>';
              }
              ?>
          </tbody>
          <tfoot class="full-width">
              <tr>
                  <th colspan="3">
                    <?php if (isset($_SESSION['favorites']) && count($_SESSION['favorites']) > 0): ?>
                        <a class="ui left floated small primary labeled icon button" href="remove-favorites.php?remove=all">
                          <i class="remove circle icon"></i> Remove All Favorites
                        </a>
                    <?php endif; ?>
                  </th>
              </tr>
          </tfoot>
         </table>
    </section>
</main>    
    
<footer class="ui black inverted segment">
    <div class="ui container"></div>
</footer>
</body>
</html>