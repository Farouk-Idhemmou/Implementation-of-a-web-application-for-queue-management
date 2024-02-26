<?php
require_once "include/header.php";

// Database connection
require_once "../connection.php";

// Function to handle the delete action
function deleteTicket($ticketNumero, $conn)
{
    $ticketNumero = mysqli_real_escape_string($conn, $ticketNumero);
    $sql = "DELETE FROM tickets WHERE Numero = '$ticketNumero'";
    if (mysqli_query($conn, $sql)) {
        return true; // Deletion successful
    } else {
        return false; // Deletion failed
    }
}

// Check if the delete button was clicked
if (isset($_POST['delete_ticket'])) {
    $ticketNumeroToDelete = $_POST['ticket_numero'];
    if (deleteTicket($ticketNumeroToDelete, $conn)) {
        echo "Ticket has been Validated Successfully.";
    } else {
        echo "The Ticket is not validated successfully.";
    }
}

$sql = "SELECT * FROM tickets";
$result = mysqli_query($conn, $sql);
?>

<style>
     body{
        background: linear-gradient(#7571f9, #ffffff);
    }
    table, th, td {
  border: 1px solid black;
  padding: 15px;
}
table {
  border-spacing: 10px;
}
    .arc-border{
     border: 3px solid #7571f9  ;
            border-radius: 20px;
}
table.table-hover {
    border-collapse: collapse;
    width: 100%;
  }

  table.table-hover th,
  table.table-hover td {
    border: 1px solid black;
    padding: 15px;
  }

    
.fancy {
  background-color: transparent;
  border-radius: 100px;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  float: right;
  font-weight: 700;
  letter-spacing: 0.05em;
  margin: 0;
  outline: none;
  overflow: visible;
  /* border: 2px solid #000; */ /* Remove this line to remove the border */
  padding: 10px 20px;
  position: relative;
  text-align: center;
  text-decoration: none;
  text-transform: none;
  transition: all 0.3s ease-in-out;
  user-select: none;
  font-size: 13px;
}


.fancy::before {
 content: " ";
 width: 1.5625rem;
 height: 2px;
 background: black;
 top: 50%;
 left: 1.5em;
 position: absolute;
 transform: translateY(-50%);
 transform-origin: center;
 transition: background 0.3s linear, width 0.3s linear;
}

.fancy .text {
 font-size: 1.125em;
 line-height: 1.33333em;
 padding-left: 2em;
 display: block;
 text-align: left;
 transition: all 0.3s ease-in-out;
 text-transform: uppercase;
 text-decoration: none;
 color: black;
}

.fancy .top-key {
 height: 2px;
 width: 1.5625rem;
 top: -2px;
 left: 0.625rem;
 position: absolute;
 background: #e8e8e8;
 transition: width 0.5s ease-out, left 0.3s ease-out;
}

.fancy .bottom-key-1 {
 height: 2px;
 width: 1.5625rem;
 right: 1.875rem;
 bottom: -2px;
 position: absolute;
 background: #e8e8e8;
 transition: width 0.5s ease-out, right 0.3s ease-out;
}

.fancy .bottom-key-2 {
 height: 2px;
 width: 0.625rem;
 right: 0.625rem;
 bottom: -2px;
 position: absolute;
 background: #e8e8e8;
 transition: width 0.5s ease-out, right 0.3s ease-out;
}

.fancy:hover {
 color: white;
 background: black;
}

.fancy:hover::before {
 width: 0.9375rem;
 background: white;
}

.fancy:hover .text {
 color: white;
 padding-left: 1.5em;
}

.fancy:hover .top-key {
 left: -2px;
 width: 0px;
}

.fancy:hover .bottom-key-1,
 .fancy:hover .bottom-key-2 {
 right: 0;
 width: 0;
}
</style>

<div class="container bg-white shadow arc-border">
    <div class="py-4 mt-5">
        <h4 class='text-center pb-2' style="color:#7571f9">Tickets Not Yet Validated</h4>
        <table style="width:100%" class="table-hover text-center ">
            <tr class="bg-dark">
                <th>Numero</th>
                <th>Date</th>
                <th>Service</th>
                <th>Actions</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    $ticketNumero = $rows["Numero"];
                    $date = $rows["date"];
                    $service = $rows["service"];

                    // Display each row from the database
                    echo "<tr>";
                    echo "<td>{$ticketNumero}</td>";
                    echo "<td>{$date}</td>";
                    echo "<td>{$service}</td>";
                    echo '<td><form method="post"><input type="hidden" name="ticket_numero" value="' . $ticketNumero . '">';
                    // echo '<button type="submit" name="delete_ticket">Validate Ticket</button></form></td>';
                    echo ' <button type="submit" name="delete_ticket"><a class="fancy" href="#">
  <span class="top-key"></span>
  <span class="text">Validate Ticket</span>
  <span class="bottom-key-1"></span>
  <span class="bottom-key-2"></span>
</a></button></form></td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No Tickets Pending.</td></tr>";
            }
            ?>
        </table>
    </div>
</div>

<?php
require_once "include/footer.php";
?>
