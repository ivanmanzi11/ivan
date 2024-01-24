
<!DOCTYPE html>
<html>
<head>
<title>okkkkkkkkk</title>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
body {
font-family: sans-serif;
background-color: hsl(0, 69%, 97%);
}

h1 {
font-size: 40px;
margin: 20px;
}
span {
    float:center;
}
#clock span{
    display: inline-block;
    width: 150px;
    height: 150px;
    line-height: 150px;
    background-color: rgb(108, 108, 167);
    box-shadow: 0 5px 15px #e47575;
    color: rgb(174, 240, 240);
    margin: 0 15px;
}
#clock span:first-child{
    margin-left: 0;
background-color: rgb(240, 30, 30);
}
#clock span:last-child{
background-color: rgb(59, 30, 30);
}
.wrap{
    text-align: center;
    padding: 200px 0 0;
    margin-top: 2px;
}
#greeting{
    background-color: rgb(16, 241, 166);
    display: inline-block;
    border-radius: 4px;
    font-size: 42px;
    padding: 20px 50px;
    margin-bottom: 30px;
    box-shadow: 0 5px 15px #75e487;
    animation: greeting 2s ease infinite 1s;
}
@keyframes greeting{
    30%{
        opacity: 0;
    }
}
#login-button {
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  display: center;
}

#login-button img {
  margin-right: 5px;
  width: 20px;
  height: 20px;
}

#login-button:hover {
  background-color: #0062cc;
}
body {
    font-family: sans-serif;
    margin: 0;
    padding: 2em;
}

.login-button {
    display: inline-block;
    padding: 1em 2em;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}



#login-form button {
    display: block;
    margin-top: 1em;
    padding: 0.5em 1em;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
#login-button a{
    list-style: none;
    text-decoration: none;
}
img{
    width: 70px;
    height: 130px;
}
</style>
</head>
<body>
<h1><img src="logo.png" alt="PMS Logo"></h1>
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
            var name= "IVAN";
    
            midday = (hours >= 12 ) ?  "PM" : "AM";
    
                document.getElementById("clock").innerHTML = "<span>" +hours+"</span>" + ":" + "<span>"+minutes+"<span>" + midday;
                var time = setTimeout(function() {
                    clock();
                    
                }, 1000);

                //Good mornings, afternoon
                if(hours < 12 ){
                    var greeting = "Good morning!  " +name+ ""
    
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
    <center>
   <button type="button" id="login-button"><a href="login.html"
    <img src="loginicon.png" alt="Login Icon">
    Login</a>
  </button></center>


</body>
</html>
