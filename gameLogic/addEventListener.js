document.addEventListener('DOMContentLoaded', function(){ 
{
    let ships = [];
    for(let i=0;i<4;i++)
    {
        var ship = new myObject("ship");
        ship.left= (i)*40 + 165;
        ship.width = 35;
        ship.height = 35;
        ship.bottom = 200;
        ships.push(ship);
        ship.myRender();
    }

    for(let i=0;i<3;i++)
    {
        var ship = new myObject("ship");
        ship.left= (i)*75 + 165;
        ship.width = 2*35;
        ship.height = 35;
        ship.bottom = 150;
        ships.push(ship);
        ship.myRender();
    }
    for(let i=0;i<2;i++)
    {
        var ship = new myObject("ship");
        ship.left= (i)*110 + 165;
        ship.width = 3*35;
        ship.height = 35;
        ship.bottom = 100;
        ships.push(ship);
        ship.myRender();
    }

        var ship = new myObject("ship");
        ship.left= 165;
        ship.width = 4*35;
        ship.height = 35;
        ship.bottom = 50;
        ships.push(ship);
        ship.myRender();
    }
});


