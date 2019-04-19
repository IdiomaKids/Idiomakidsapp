<!DOCTYPE html>
<html>
<body>

<h2>Convert a string written in JSON format, into a JavaScript object.</h2>

<p id="demo"></p>
<p id="demo1"></p>


<script>
var myJSON =
 [
    {
      "id": "1",
      "shape": "square.png",
      "solution": "correct"
    },
    {
      "id": "2",
      "shape": "triangle.png",
      "solution": "incorrect"
    },
    {
      "id": "3",
      "shape": "circle.png",
      "solution": "incorrect"
    },
    {
      "id": "4",
      "shape": "house.png",
      "solution": "incorrect"
    }
  ];

var myObj = JSON.parse(myJSON);
window.alert(myJson)

</script>

</body>
</html>
