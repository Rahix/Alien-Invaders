//Alien-Class
function Alien(x,y,dim,off)
{
  this.pos = Array(2);
  this.pos[0] = x;
  this.pos[1] = y;
  this.dir = map[y][x].Dir;
  this.health = 25;
  this.forward = -dim*off;
  this.dim = dim; //Dimension
  this.lastMove = false;
  this.isHide = false;

  this.Damage = function(i)
  {
    this.health = this.health - i;
  }

  this.Destroy = function()
  {
    this.health = 0;
  }

  this.Tick = function()
  {
    //Move forward
    this.forward++;
    //In the middle of a new tile?
    if((this.forward > (this.dim - 1)) && (this.forward < (this.dim + 1)) )
    {
      //Last move?
      if(this.lastMove == true)
      {
        //Destroy Alien
        this.isHide = true;
      }
      //Set direction
      //Calc new alein tile-pos
      if(this.dir == "N")
      {
        this.dir = map[this.pos[1]-1][this.pos[0]].Dir;
        this.pos[1] = this.pos[1] - 1;
      }
      else if(this.dir == "E")
      {
        this.dir = map[this.pos[1]][this.pos[0]+1].Dir;
        this.pos[0] = this.pos[0] + 1;
      }
      else if(this.dir == "S")
      {
        this.dir = map[this.pos[1]+1][this.pos[0]].Dir;
        this.pos[1] = this.pos[1] + 1;
      }
      else if(this.dir == "W")
      {
        this.dir = map[this.pos[1]][this.pos[0]-1].Dir;
        this.pos[0] = this.pos[0] - 1;
      }
      this.forward = 0;
      //Check if end of the map?
      if(map[this.pos[1]][this.pos[0]].Tile == 16)
      {
        CALLBACKcameThrough();
        this.lastMove = true;
      }
    }
  }

  this.Draw = function()
  {
    //Get Image
    img = document.getElementById('alien');
    //Calc position
    var x;
    var y;
    if( this.dir == 'N' )
    {
      x = this.pos[0] * this.dim;
      y = this.pos[1] * this.dim - this.forward;
    }
    else if( this.dir == 'E' )
    {
      x = this.pos[0] * this.dim + this.forward;
      y = this.pos[1] * this.dim;
    }
    else if( this.dir == 'S' )
    {
      x = this.pos[0] * this.dim;
      y = this.pos[1] * this.dim + this.forward;
    }
    else if( this.dir == 'W' )
    {
      x = this.pos[0] * this.dim - this.forward;
      y = this.pos[1] * this.dim;
    }
    //Draw image(finally :D)
    if(this.isHide == false)
      cctx.drawImage(img, x, y, this.dim, this.dim);
  }
}
