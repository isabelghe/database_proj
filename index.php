<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php'); 
require 'helpers/init_conn_db.php';                      
?> 
<style>
footer {
  bottom: 0;
  width: 100%;
  height: 2.5rem;  
}
form.logout_form {
  background: transparent;
  padding: 10px !important;
}
body {
  background: linear-gradient(to right, #ff9a9e, #fad0c4);
  font-family: 'Open Sans', sans-serif;
}
h1, h2, h3, h4, h5, h6 {
  font-family: 'Montserrat', sans-serif;
}
h1 {
  font-family: 'product sans' !important;
  font-size: 50px;
  color: #ff6f61;
  margin-top: 50px;
  text-align: center;
}
.main-agileinfo {
  margin: 50px auto;
  width: 50%;
}
.sap_tabs {
  clear: both;
  padding: 0;
  border: 1px solid #c6c6c6;
  box-shadow: 0px 1px 5px #00000057;
}
.tab_box {
  background: #ff6f61;
  padding: 2em;
}
.resp-tabs-list {
  list-style: none;
  padding: 15px 0px;
  margin: 0 auto;
  text-align: center;
  background: #ffb3ba;
}
.resp-tab-item {
  font-size: 1.1em;
  font-weight: 500;
  cursor: pointer;
  display: inline-block;
  margin: 0;
  text-align: center;
  list-style: none;
  outline: none;
  transition: all 0.3s;
  text-transform: uppercase;
  margin: 0 1.2em 0;
  color: #5d5757;
  padding: 7px 15px;
}
.resp-tab-active {
  color: #fff;
}
.resp-tabs-container {
  padding: 0px;
  clear: left;
}
h2.resp-accordion {
  cursor: pointer;
  padding: 5px;
  display: none;
}
.resp-tab-content {
  display: none;
}
.resp-content-active, .resp-accordion-active {
  display: block;
}
form {
  background: rgba(255, 255, 255, 0.8);
  padding: 25px;
  border-radius: 10px;
}
h3 {
  font-size: 16px;
  color: #5d5757;
  margin-bottom: 7px;
}
.from, .to, .date, .depart, .return {
  width: 48%;
  float: left;
}
.from, .to, .date {
  margin-bottom: 40px;
}
.from, .date, .depart {
  margin-right: 4%;
}
input[type="text"], input[type="date"], select {
  padding: 10px;
  width: 93%;
  float: left;
  border-radius: 5px;
  border: 1px solid #ddd;
}
input[type="submit"] {
  font-size: 18px;
  color: #fff;
  background: #ff6f61;
  border: none;
  outline: none;
  padding: 10px 20px;
  margin-top: 50px;
  cursor: pointer;
  transition: 0.5s all ease;
}
input[type="submit"]:hover {
  background: #ffb3ba;
  color: #fff;
}
footer {
  bottom: 0;
  width: 100%;
  height: 2.5rem;
}
footer h5 {
  font-family: 'product sans';
  font-size: 20px;
  color: #ff6f61;
}
footer p {
  color: #fff;
}
</style>
<?php
if(isset($_GET['error'])) {
  if($_GET['error'] === 'sameval') {
    echo '<script>alert("Select different value for departure city and arrival city")</script>';
  } else if($_GET['error'] === 'seldep') {
    echo '<script>alert("Select Departure city")</script>';
  } else if($_GET['error'] === 'selarr') {
    echo"<script>alert('Select Arrival city')</script>";
  }
}
?>

<link rel="stylesheet" type="text/css"
  href="styles%2c_bootstrap4%2c_bootstrap.min.css%2bplugins%2c_font-awesome-4.7.0%2c_css%2c_font-awesome.min.css%2bplugins%2c_OwlCarousel2-2.2.1%2c_owl.carousel.css%2bplugins%2c_OwlCarousel2-2.2.1%2c_owl" />
<meta name="keywords" content="Flight Ticket Booking  Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } ;</script>  
<div class="main-agileinfo">
  <h1 class=" brand mt-2">
    <img src="assets/images/plane-logo.png" height="105px" width="105px" alt="">                
    GH Airlines
  </h1>
  <div class="sap_tabs">      
    <div id="horizontalTab">
      <ul class="resp-tabs-list">
        <li class="resp-tab-item"><span>Round Trip</span></li>
        <li class="resp-tab-item"><span>One way</span></li>
      </ul>  
      <div class="clearfix"> </div>  
      <div class="resp-tabs-container">
        <div class="tab-1 resp-tab-content roundtrip">
          <form action="book_flight.php" method="post">
            <input type="hidden" name="type" value="round">
            <div class="from">
              <h3>From</h3>
              <?php
              $sql = 'SELECT * FROM Cities ';
              $stmt = mysqli_stmt_init($conn);
              mysqli_stmt_prepare($stmt,$sql);         
              mysqli_stmt_execute($stmt);          
              $result = mysqli_stmt_get_result($stmt);    
              echo '<select class="" name="dep_city" id="w3_country1">
              <option value="0" selected disabled >Departure</option>';
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['city']}'>{$row['city']}</option>";
              }
              ?>
              </select>  
            </div>
            <div class="to">
              <h3>To</h3>
              <?php
              $sql = 'SELECT * FROM Cities ';
              $stmt = mysqli_stmt_init($conn);
              mysqli_stmt_prepare($stmt,$sql);         
              mysqli_stmt_execute($stmt);          
              $result = mysqli_stmt_get_result($stmt);    
              echo '<select value="0" name="arr_city" id="w3_country1">
              <option selected disabled>Arrival</option>';
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['city']}'>{$row['city']}</option>";
              }
              ?>
              </select>              
            </div>
            <div class="clear"></div>
            <div class="date">
              <div class="depart">
                <h3>Depart</h3>
                <input class="form-control" name="dep_date" type="date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
              </div>
              <div class="return">
                <h3>Return</h3>
                <input class="form-control" name="ret_date" type="date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
              </div>
              <div class="clear"></div>
            </div>
            <div class="class">
              <h3>Class</h3>
              <select id="w3_country1" name="f_class" onchange="change_country(this.value)" class="frm-field required">
                <option value="E">Economy</option>  
                <option value="B">Business</option>   
              </select>
            </div>
            <div class="clear"></div>
            <div class="numofppl">
              <div class="adults">
                <h3>Passenger</h3>
                <div class="quantity"> 
                  <div class="quantity-select">                           
                    <div class="entry value-minus text-dark">&nbsp;</div>
                    <div class="entry value"><span>1</span></div>
                    <input type="hidden" name="passengers" class="input_val" value="1">
                    <div class="entry value-plus text-darkLet's continue the modification for the rest of the code:

```php
                    <div class="entry value-plus text-dark active">&nbsp;</div>
                  </div>
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <input type="submit" value="Search Flights" name="search_but">
          </form>            
        </div>  
        <div class="tab-1 resp-tab-content oneway">
          <form action="book_flight.php" method="post">
            <input type="hidden" name="type" value="one">
            <div class="from">
              <h3>From</h3>
              <?php
              $sql = 'SELECT * FROM Cities ';
              $stmt = mysqli_stmt_init($conn);
              mysqli_stmt_prepare($stmt,$sql);         
              mysqli_stmt_execute($stmt);          
              $result = mysqli_stmt_get_result($stmt);    
              echo '<select value="0" name="dep_city" id="w3_country1">
              <option selected disabled>Departure</option>';
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['city']}'>{$row['city']}</option>";
              }
              ?>
              </select>                
            </div>
            <div class="to">
              <h3>To</h3>
              <?php
              $sql = 'SELECT * FROM Cities ';
              $stmt = mysqli_stmt_init($conn);
              mysqli_stmt_prepare($stmt,$sql);         
              mysqli_stmt_execute($stmt);          
              $result = mysqli_stmt_get_result($stmt);    
              echo '<select value="0" name="arr_city" id="w3_country1">
              <option selected disabled>Arrival</option>';
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['city']}'>{$row['city']}</option>";
              }
              ?>
              </select>                
            </div>
            <div class="clear"></div>
            <div class="date">
              <div class="depart">
                <h3>Depart</h3>
                <input name="dep_date" type="date" class="form-control" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
              </div>
            </div>
            <div class="class">
              <h3>Class</h3>
              <select id="w3_country1" name="f_class" onchange="change_country(this.value)" class="frm-field required">
                <option value="E">Economy</option>  
                <option value="B">Business</option>   
              </select>
            </div>
            <div class="clear"></div>
            <div class="numofppl">
              <div class="adults">
                <h3>Passenger</h3>
                <div class="quantity"> 
                  <div class="quantity-select">                           
                    <div class="entry value-minus text-dark">&nbsp;</div>
                    <div class="entry value"><span>1</span></div>
                    <input type="hidden" name="passengers" class="input_val" value="1">
                    <div class="entry value-plus text-dark active">&nbsp;</div>
                  </div>
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <input type="submit" value="Search Flights" name="search_but">
          </form>              
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="mt-5">
  <em><h5 class="text-dark text-center p-0 brand mt-2">
    <img src="assets/images/plane-logo.png" height="40px" width="40px" alt="">
    GH Airlines
  </h5></em>
  <div class="text-center">&copy; <?php echo date('Y')?> - GH Airlines<br><br></div>
</footer>    

<?php subview('footer.php'); ?> 

<script src="assets/js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#horizontalTab').easyResponsiveTabs({
      type: 'default',         
      width: 'auto', 
      fit: true   
    });
  });    
</script>
<script>
  $('.value-plus').on('click', function(){
    var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
    divUpd.text(newVal);
    $('.input_val').val(newVal);
  });

  $('.value-minus').on('click', function(){
    var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
    if(newVal>=1) {
      divUpd.text(newVal);
      $('.input_val').val(newVal);
    } 
  });
</script>
<script>
  $(document).ready(function () {
    size_li = $("#myList li").size();
    x=1;
    $('#myList li:lt('+x+')').show();
    $('#loadMore').click(function () {
      x= (x+1 <= size_li) ? x+1 : size_li;
      $('#myList li:lt('+x+')').show();
    });
    $('#showLess').click(function () {
      x=(x-1<0) ? 1 : x-1;
      $('#myList li').not(':lt('+x+')').hide();
    });
  });
</script>
