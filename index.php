<html>
  <head>
    <title>Alien Invaders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <script>
      var canvas;		//CANVAS opject
      var cctx;		        //Canvas ConTeXt
      
      //Init-Function:
      function init()
      {
        canvas = document.getElementById("canvas");
        cctx = canvas.getContext("2d");
        //Set sizes
        canvas.width = window.innerWidth-20;
        canvas.height = window.innerHeight-40;
      }
      
      function mouseEventDown(event)
      {
      }
      
      function mouseEventUp(event)
      {
      }
      
      function mouseEventMove(event)
      {
      }
    </script>
  </head>
  <body onload="init();">
    <canvas id="canvas"
            onmousedown="mouseEventDown(event);"
            onmouseup="mouseEventUp(event);"
            onmousemove="mouseEventMove(event);"><b>You can not play the game :/</b></canvas>
  </body>
</html>
