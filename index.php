<html>
  <head>
    <title>Alien Invaders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <script src="alien.js"></script>
    <script>
      var canvas;    //CANVAS object
      var cctx;      //Canvas ConTeXt
      var xmlhttp;   //For ajax loads
      var FPS;       //Framerate
      var map;       //mapdata.Data
      var mapdata;   //Mapdata read from map1.json
      var state;     //Gamestate
      var wave;      //Round
      var interval;  //The interval for game-loop
      var tiledim;   //Dimension of the tiles
      
      var TestAlien;
      
      //Init-Function:
      function init()
      {
        canvas = document.getElementById("canvas");
        cctx = canvas.getContext("2d");
        //Set sizes
        canvas.width = window.innerWidth-20;
        canvas.height = window.innerHeight-40;
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
  	  xmlhttp=new XMLHttpRequest();
        }
        else // code for IE6, IE5
  	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        xmlhttp.open("GET","maps/map1.json?t=" + Math.random(),false);
        xmlhttp.send();
        mapdata = JSON.parse(xmlhttp.responseText);
        map = mapdata.Data;
        FPS = 30;
        state = 'AREG';//Alien REGister
        wave = 1;
        //Calc tiledim
        var try1;
        var try2;
         
        try1 = canvas.height / mapdata.General.Size.Y;
        try2 = canvas.width / mapdata.General.Size.X;
        if(try1 > try2)
          tiledim = try2;
        else
          tiledim = try1;
        TestAlien = new Alien(0,1,tiledim);
        interval = window.setInterval(loop,(1 / FPS));
      }
      
      function loop()
      {
        if(state == 'WAVE')
        {
          //Send out all registered Aliens
          wave++;
        }
        else if(state == 'AREG')
        {
          switch(wave)
          {
            case 1:
              //Two Normal Aliens
              break;
            case 2:
              //Four Normal Aliens
              break;
            default:
              alert("You played through!");
          }
          state = 'WAVE';
        }
        else if(state == 'IDLE')
        {
          //Don't do anything in the moment
        }
        drawMap(0,0);
        //Alert aliens to draw
        TestAlien.Tick();
        alienDraw();
      }
      
      function alienDraw()
      {
        TestAlien.Draw();
      }
      
      function drawMap(xOff,yOff)
      {
         var tileX;
         var tileY;
         
         
         tileX = tiledim;
         tileY = tileX;
         //Now Start to Draw
         var i;
         var t;
         for(i = 0; i < mapdata.General.Size.X;i++)
         {
           for(t=0;t<mapdata.General.Size.Y;t++)
           {
             if(map[t][i].Tile < 15)
             {
               cctx.drawImage(document.getElementById('tile'),
                              i*tileX,
                              t*tileY,
                              tileX,
                              tileY);
             }
           }
         }
      }
      
      function draw()
      {
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
    <!-- Images -->
    <img src="img/tiles/9/1.png" height='0' width='0' id="tile"/>
    <img src="img/aliens/First.png" height='0' width='0' id="alien"/>
  </body>
</html>
