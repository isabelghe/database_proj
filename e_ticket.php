<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php'); ?>
<link rel="preconnect" href="https://fonts.gstatic.com">
<style>
@font-face {
  font-family: 'product sans';
  src: url('assets/css/Product Sans Bold.ttf');
}
h2.brand {
    font-size: 32px;
    font-family: 'Dancing Script', cursive;
    color: #ff4d6d;
    text-align: center;
}
.ticket-container {
    border: 2px solid #ddd;
    border-radius: 20px;
    padding: 20px;
    background: #fff;
    max-width: 800px;
    margin: 20px auto;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
.ticket-header {
    background: #ff4d6d;
    color: #fff;
    padding: 10px;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    text-align: center;
}
.ticket-content {
    padding: 20px;
}
.ticket-section {
    margin-bottom: 20px;
}
.ticket-section h3 {
    margin-bottom: 10px;
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
    color: #333;
}
.ticket-section p {
    font-family: 'Arial', sans-serif;
    font-size: 16px;
    margin: 0;
}
.ticket-details {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}
.ticket-details div {
    width: 48%;
    margin-bottom: 20px;
}
.ticket-footer {
    background: #ff4d6d;
    color: #fff;
    padding: 10px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
    text-align: center;
}
</style>
<main>
  <?php if(isset($_SESSION['userId'])) {   
    require 'helpers/init_conn_db.php'; ?>     
    <div class="container mb-5"> 
      <?php 
    if(isset($_POST['print_but'])) {
        $ticket_id = $_POST['ticket_id'];      
      $stmt = mysqli_stmt_init($conn);
      $sql = 'SELECT * FROM Ticket WHERE ticket_id=?';
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)) {
          header('Location: ticket.php?error=sqlerror');
          exit();            
      } else {
          mysqli_stmt_bind_param($stmt,'i',$ticket_id);            
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          if ($row = mysqli_fetch_assoc($result)) {   
            $sql_p = 'SELECT * FROM Passenger_profile WHERE passenger_id=?';
            $stmt_p = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt_p,$sql_p)) {
                header('Location: ticket.php?error=sqlerror');
                exit();            
            } else {
                mysqli_stmt_bind_param($stmt_p,'i',$row['passenger_id']);            
                mysqli_stmt_execute($stmt_p);
                $result_p = mysqli_stmt_get_result($stmt_p);
                if($row_p = mysqli_fetch_assoc($result_p)) {
                  $sql_f = 'SELECT * FROM Flight WHERE flight_id=?';
                  $stmt_f = mysqli_stmt_init($conn);
                  if(!mysqli_stmt_prepare($stmt_f,$sql_f)) {
                      header('Location: ticket.php?error=sqlerror');
                      exit();            
                  } else {
                      mysqli_stmt_bind_param($stmt_f,'i',$row['flight_id']);            
                      mysqli_stmt_execute($stmt_f);
                      $result_f = mysqli_stmt_get_result($stmt_f);
                      if($row_f = mysqli_fetch_assoc($result_f)) {
                        $date_time_dep = $row_f['departure'];
                        $date_dep = substr($date_time_dep,0,10);
                        $time_dep = substr($date_time_dep,11,5);    
                        $date_time_arr = $row_f['arrivale'];
                        $date_arr = substr($date_time_arr,0,10);
                        $time_arr = substr($date_time_arr,11,5); 
                        $class_txt = ($row['class'] === 'E') ? 'ECONOMY' : 'BUSINESS';
                        echo '
                        <div class="ticket-container">                                                         
                            <div class="ticket-header">
                                <h2 class="brand">GH Airlines</h2> 
                            </div>
                            <div class="ticket-content">
                                <div class="ticket-section">
                                    <h3>Flight Details</h3>
                                    <div class="ticket-details">
                                        <div>
                                            <p><strong>Airline:</strong> '.$row_f['airline'].'</p>
                                            <p><strong>From:</strong> '.$row_f['source'].'</p>
                                            <p><strong>To:</strong> '.$row_f['Destination'].'</p>
                                        </div>
                                        <div>
                                            <p><strong>Class:</strong> '.$class_txt.'</p>
                                            <p><strong>Departure:</strong> '.$date_dep.' '.$time_dep.'</p>
                                            <p><strong>Arrival:</strong> '.$date_arr.' '.$time_arr.'</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ticket-section">
                                    <h3>Passenger Details</h3>
                                    <div class="ticket-details">
                                        <div>
                                            <p><strong>Passenger:</strong> '.$row_p['f_name'].' '.$row_p['m_name'].' '.$row_p['l_name'].'</p>
                                            <p><strong>Seat No:</strong> '.$row['seat_no'].'</p>
                                        </div>
                                        <div>
                                            <p><strong>Board Time:</strong> 12:45</p>
                                            <p><strong>Gate:</strong> A22</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ticket-footer">
                                <p>Thank you for choosing GH Airlines. Please be at the gate at boarding time.</p>
                            </div>                                                 
                        </div>';
                      }
                  }                  
                }
            }                                    
          }
      }   
    } ?> 
    </div>
</main>
<?php } ?>
<?php subview('footer.php'); ?> 
<script>
window.print();
</script>
