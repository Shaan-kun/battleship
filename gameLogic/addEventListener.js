class myObject {
    constructor(type) {

       if(type == "ship") 
       {
            this.width = 40;
            this.height = 40;
            this.backgroundimage = "url(images/ship.png)";
            this.bottom = 102;
            this.left = 40;
            this.backgroundsize = "contain";
            this.position = "absolute";
            this.id = "";
            this.angle = 0;
            this.type = "ship";
            this.active = false; // передвигаем ли он по кнопке сейчас
        } 

    }
    
   myRender() {
    
       let d=document.createElement('div');
       d.style.width = this.width + "px";
       d.style.height = this.height + "px";
       d.style.backgroundImage = this.backgroundimage;
       d.style.bottom = this.bottom + "px";
       d.style.left = this.left + "px";
       d.style.backgroundSize = this.backgroundsize;
       d.style.position = this.position;
       d.style.transform = this.angle;
       d.id = this.id;
       document.body.appendChild(d);
   }


   

}
document.addEventListener('DOMContentLoaded', function(){ 
{


    for(let i=0;i<4;i++)
    {
        var ship = new myObject("ship");
        ship.left= (i)*40 + 165;
        ship.width = 35;
        ship.height = 35;
        ship.bottom = 200;
        ship.id = ship_id;
        ship_id = ship_id + 1;
        boats.push(ship);

    }

    for(let i=0;i<3;i++)
    {
        var ship = new myObject("ship");
        ship.left= (i)*75 + 165;
        ship.width = 2*35;
        ship.height = 35;
        ship.bottom = 150;
        ship.id = ship_id;
        ship_id = ship_id + 1;
        boats.push(ship);

    }
    for(let i=0;i<2;i++)
    {
        var ship = new myObject("ship");
        ship.left= (i)*110 + 165;
        ship.width = 3*35;
        ship.height = 35;
        ship.bottom = 100;
        ship.id = ship_id;
        ship_id = ship_id + 1;
        boats.push(ship);

    }
        var ship = new myObject("ship");
        ship.left= 165;
        ship.width = 4*35;
        ship.height = 35;
        ship.bottom = 50;
        ship.id = ship_id;
        ship_id = ship_id + 1;
        boats.push(ship);
    }



    for(let i=0; i<boats.length;i++)
    {
        boats[i].myRender();
    }

    add_move();
});



document.addEventListener('keydown', function (event){

});
