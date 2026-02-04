<!DOCTYPE html>
<html>
<head>
    <title>Products&Prices</title>
    <link rel="stylesheet" type="text/css" href="style(purchase).css">
</head>
<body>
    
  <div class="banner">
      <div class="navbar">  
          <h1>MENU OF PRODUCTS & THEIR PRICES</h1>
          <br/><br/>
          <table border="2">
              <tr>
                <th>Name of the Business</th>
                <th>Products</th>
                <th>Price<br/>per 1 item</th>
                <th>Image</th>
                <th>Choose products of<br/> your choice</th>
                <th>Enter quantity of <br/>Products</th></tr>
              <tr>
                <td>Bralirwa Great Drinks</td>
                <td>Fanta</td>
                <td>1200Rwf</td>
                <td><img src="product1.jpg" alt="Product 1"></td>
                <td><input type="checkbox" name="" value=""></input></td>
                <td><input type="text" name="" placeholder=""></input></td></tr>
              <tr>
                <td>Mucyo's Wheat breed</td>
                <td>French Bread</td>
                <td>2400Rwf</td>
                <td><img src="product2.jpg" alt="Product 2"></td>
                <td><input type="checkbox" name="" value=""></input></td>
                <td><input type="text" name="" placeholder=""></input></td></tr>
              <tr>
                <td>Ubumwe Grand shop</td>
                <td>Ibirayi</td>
                <td>1400Rwf</td>
                <td><img src="product3.jpg" alt="Product 3"></td>
                <td><input type="checkbox" name="" value=""></input></td>
                <td><input type="text" name="" placeholder=""></input></td></tr>
              <tr>
                  <td>Mfizi shop</td>
                  <td>  Ubunyobwa</td>
                  <td>1900Rwf</td>
                  <td><img src="product1.jpg" alt="Product 1"></td>
                  <td><input type="checkbox" name="" value=""></input></td>
                  <td><input type="text" name="" placeholder=""></input></td></tr>
              <tr>
                <td>Gakenke Great Drinks</td>
                <td>umutobe</td>
                <td>700Rwf</td>
                <td><img src="product1.jpg" alt="Product 1"></td>
                <td><input type="checkbox" name="" value=""></input></td>
                <td><input type="text" name="" placeholder=""></input></td></tr>
              <tr>
                      <td>Gicumbi Great Drinks</td>
                      <td>Amazi</td>
                      <td>500Rwf</td>
                      <td><img src="product1.jpg" alt="Product 1"></td>
                      <td><input type="checkbox" name="" value=""></input></td>
                      <td><input type="text" name="" placeholder=""></input></td></tr> 
              <tr>
                        <td>Ian Motel</td>
                        <td>Icumbi</td>
                        <td>10000Rwf</td>
                        <td><img src="product1.jpg" alt="Product 1"></td>
                        <td><input type="checkbox" name="" value=""></input></td>
                        <td><input type="text" name="" placeholder=""></input></td></tr>
              <tr>
                  <td>Agashya Boutique</td>
                   <td>Juice</td>
                          <td>1000Rwf</td>
                          <td><img src="product1.jpg" alt="Product 1"></td>
                          <td><input type="checkbox" name="" value=""></input></td>
                          <td><input type="text" name="" placeholder=""></input></td></tr>
                          <tr>
                            <td>Azam</td>
                            <td>ubugari</td>
                            <td>600Rwf</td>
                            <td><img src="product1.jpg" alt="Product 1"></td>
                            <td><input type="checkbox" name="" value=""></input></td>
                            <td><input type="text" name="" placeholder=""></input></td></tr>
                            <tr>
                              <td>Umurenge shop</td>
                              <td>amavu</td>
                              <td>1300Rwf</td>
                              <td><img src="product1.jpg" alt="Product 1"></td>
                              <td><input type="checkbox" name="" value=""></input></td>
                              <td><input type="text" name="" placeholder=""></input></td></tr>
                              <tr>
                                <td>Tubyumve kimwe Great Drinks</td>
                                <td>beer</td>
                                <td>1200Rwf</td>
                                <td><img src="product1.jpg" alt="Product 1"></td>
                                <td><input type="checkbox" name="" value=""></input></td>
                                <td><input type="text" name="" placeholder=""></input></td></tr>
                                <tr>
                                  <td>Ambara neza</td>
                                  <td>imyenda</td>
                                  <td>1700Rwf</td>
                                  <td><img src="product1.jpg" alt="Product 1"></td>
                                  <td><input type="checkbox" name="" value=""></input></td>
                                  <td><input type="text" name="" placeholder=""></input></td></tr>
                                  <tr>
                                    <td>Vision hotel</td>
                                    <td>ibiryo</td>
                                    <td>12000Rwf</td>
                                    <td><img src="product1.jpg" alt="Product 1"></td>
                                    <td><input type="checkbox" name="" value=""></input></td>
                                    <td><input type="text" name="" placeholder=""></input></td></tr>
                                
                                    <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><input type="text" value="Total Amount of Products"><br/></td>
                                    
                                    <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><button type="submit" class="btn"><a href="Thanks For Booking.php">BOOK ITEMS</a></button></td></tr>
                                     
                                 
                                   </table><br/><br>                                  
              
<div class="form">
  <h2>PURCHASE & ORDERING FORM</h2>
    <input type="text" placeholder="Total Amount of Products"></input><br>
      <label>Total Amount of Products</label><br>
    <input type="text" placeholder="Name of Customer"></input><br>
      <label>Enter the name of Customer</label><br>

    <input type="text" placeholder="Address of Customer"></input><br>
      <label>Enter the address of customer</address></label><br>
    <input type="text" id="card_number" name="card_number" placeholder="Credit Card Number" required><br>
      <label for="card_number">Card Number</label>
    <input type="text" id="cardholder_name" name="cardholder_name" placeholder="Full Name" required><br>
      <label for="cardholder_name">Cardholder Name</label>
    <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" required><br>
      <label for="expiry_date">Expiry Date</label>
    <input type="text" id="cvv" name="cvv" placeholder="CVV" required><br>
      <label for="cvv">CVV</label><br><br>
    <button type="submit"><a href="Thanks for paying.php">PAY</a></button></div>
  </div>
    
  </div>
       
          
       
   
   


   
</body>
</html>
