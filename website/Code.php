<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <button id="myButton">Double click me!</button>
  <script>
    const myButton = document.getElementById('myButton');
    myButton.addEventListener('dblclick', () => {
      console.log('A double click has been performed!');
      // Perform desired actions here
    });
  </script>
</body>
</html>
n