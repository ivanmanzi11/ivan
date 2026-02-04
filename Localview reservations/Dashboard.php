<!DOCTYPE html>
<html>
<head>
    <title>Products&Prices</title>
    <link rel="stylesheet" type="text/css" href="Dashboard.css">
</head>
<body>
  <div class="banner">
    
      <div class="navbar"> 
        <div class="wrap">
          <h1 id="greeting"></h1>
          <h1 id="clock"></h1>
          </div>
          
          
          <script>
          
              function clock() {
                  var date = new Date();
                  var hours=date.getHours();
                  var minutes = date.getMinutes();
                  var midday;
          
                  hours = updateTime(hours);
                  minutes = updateTime(minutes);
                  var name= "  Ivan MANZI";
          
                  midday = (hours >= 12 ) ?  "PM" : "AM";
          
                      document.getElementById("clock").innerHTML = "<span>" +hours+"</span>" + ":" + "<span>"+minutes+"<span>" + midday;
                      var time = setTimeout(function() {
                          clock();
                          
                      }, 1000);
      
                      //Good mornings, afternoon
                      if(hours < 12 ){
                          var greeting = "Good morning!  " +name+ "   hurry up!"
          
                      }
                      if(hours >= 12 && hours <= 18) {
                          var greeting = "Good afternoon" +name;
                      }
                      if(hours >= 18 && hours <= 24) {
                          var greeting = "Good evening" +name;
                      }
                      document.getElementById("greeting").innerHTML = greeting;
                      }
                      function updateTime(k){
                          if(k < 10 ){
                              return "0" + k
                          }else {
                              return k;
                          }
                      }
                      clock();
          
          </script>
          <right>
          
        </button></right>
        <br/><br/>
          <h1>                       <u>TABLES OF BOOKED ITEMS.</u></h1>
          <br/><br/>
          <table border="2">
              <tr>
                <th>Name of the Business</th>
                <th>Name of items & services</th>
                <th>Quantity<br/>per 1 item</th>
                <th>Price per item</th>
                <th>Total Price</th>
                <th>Paid Items</th>
                <th>Date of Booking</th>
                <th>Date of Payment</th></tr>
              <tr>
                <td>Bralirwa Great Drinks</td>
                <td>Fanta</td>
                <td>3 bottles</td>
                <td>1200rwf</td>
                <td>36000rwf</td>
                <td>PAID</td>
                <td>27 Oct 2023</td>
                <td>28 Oct 2023</td></tr>
              <tr>
                <td>Mucyo's Wheat breed</td>
                <td>French Bread</td>
                <td>4 pieces</td>
                <td>2400Rwf</td>
                <td>9600rwf</td>
                <td>UNPAID</td>
                <td>30 Oct 2023</td>
                <td></td></tr>
              <tr>
                <td>Ubumwe Grand shop</td>
                <td>Ibirayi</td>
                <td>15 Kgs</td>
                <td>700Rwf</td>
                <td>10500rwf</input></td>
                <td>PAID</td>
                <td>1 Nov 2023</td>
                <td>3 Nov 2023</td></tr>
              <tr>
                  <td>Mfizi shop</td>
                  <td>Ubunyobwa</td>
                  <td>10Kgs</td>
                  <td>1200rwf</td>
                  <td>12000rwf</input></td>
                  <td>UNPAID</td>
                  <td>2 Nov 2023</td>
                  <td></td></tr>
              <tr>
                <td>Gakenke Great Drinks</td>
                <td>umutobe</td>
                <td>8 littles</td>
                <td>700Rwf</td>
                <td>5600rwf</input></td>
                <td>PAID</td>
                <td>3 Nov 2023</td>
                <td>4 Nov 2023</td></tr>
              <tr>
                      <td>Gicumbi Great Drinks</td>
                      <td>Amazi</td>
                      <td>100 bottles</td>
                      <td>300rwf</td>
                      <td>30000rwf</td>
                      <td>UNPAID</td>
                      <td>4 Nov 2023</td>
                      <td></td></tr> 
              <tr>
                        <td>Ian Motel</td>
                        <td>Icumbi</td>
                        <td>2 rooms</td>
                        <td> 10000RWF</td>
                        <td>20000rwf</td>
                        <td>UNPAID</td>
                        <td>5 Nov 2023</td>
                        <td></td></tr>
                    <tr>
                          <td>Agashya Boutique</td>
                          <td>Agashya Juice</td>
                          <td>20 bottles</td>
                          <td>1000rwf</td>
                          <td>20000rwf</td>
                          <td>PAID</td>
                          <td>6 Nov 2023</td>
                          <td>6 Nov 2023</td></tr>
                          <tr>
                            <td>Azam</td>
                            <td>ubugari</td>
                            <td>10Kgs</td>
                            <td>600Rwf</td>
                            <td>6000rwf</td>
                            <td>PAID</td>
                            <td>7 Nov 2023</td>
                            <td>8 Nov 2023</td></tr>
                            <tr>
                              <td>Umurenge shop</td>
                              <td>amavu</td>
                              <td>5 bottles</td>
                              <td>1300rwf</td>
                              <td>6500RWF</input></td>
                              <td>PAID</td>
                              <td>8 Nov 2023</td>
                              <td>8 Nov 2023</td></tr>
                              <tr>
                                <td>Tubyumve kimwe Great Drinks</td>
                                <td>beer</td>
                                <td>2 bottles</td>
                                <td>1200rwf</td>
                                <td>2400RWF</td>
                                <td>UNPAID</td>
                                <td>10 Nov 2023</td>
                                <td></td></tr>
                                <tr>
                                  <td>Ambara neza</td>
                                  <td>imyenda</td>
                                  <td>2 T-shirts</td>
                                  <td>1700rwf</td>
                                  <td>3400RWF</td>
                                  <td>UNPAID</td>
                                  <td>3 Nov 2023</td>
                                  <td></td></tr>
                                  <tr>
                                    <td>Vision hotel</td>
                                    <td>ibiryo</td>
                                    <td>2 plates</td>
                                    <td>4000Rwf</td>
                                    <td>8000rwf</td>
                                    <td>PAID</td>
                                    <td>3 Nov 2023</td>
                                    <td>3 Nov 2023</td></tr>
                                
          </table><br/><br>                                  
              

</body>
</html>
