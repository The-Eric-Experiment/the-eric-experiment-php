<center>
  <font face="Arial, Helvetica, Microsoft Sans Serif, sans-serif" size="2"><b><h4>Navigation</h4></b></font>

  <table bgcolor="#000000" border="3px" cellpadding="10px" cellspacing="0" background="/public/piedra-ndego.gif">
    <?php
    $columns = 4;
    $count = 0;

    foreach ($items as $item) {
      if ($count % $columns == 0) {
        if ($count > 0) {
          echo '</tr>'; // Close the previous row
        }
        echo '<tr>'; // Start a new row
      }
      echo '<td align="center">';
      echo '<a href="' . $item['href'] . '">';
      echo '<font face="Arial, Helvetica, Microsoft Sans Serif" size="-1" color="#ffbf00">' . trim($item['text']) . '</font>';
      echo '</a>';
      echo '</td>';
      $count++;
    }

    // If the last row is not full, add empty cells
    if ($count % $columns != 0) {
      while ($count % $columns != 0) {
        echo '<td></td>';
        $count++;
      }
      echo '</tr>';
    } else {
      echo '</tr>'; // Close the last row if it was full
    }
    ?>
  </table>
</center>