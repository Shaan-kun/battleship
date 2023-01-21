var vrag_ships = [];
class MyObject{
    counstructor(type)
    {
        if(type == "ship")
        {
            this.x =0;
            this.y=0;
            this.z=1;
        }
    }
};
{
var ship_1 = new MyObject("ship");//1
    ship_1.x=0;
    ship_1.y=0;
    vrag_ships.push(ship_1);
var ship_1 = new MyObject("ship");//1
    ship_1.x=4;
    ship_1.y=0;
    vrag_ships.push(ship_1);
var ship_1 = new MyObject("ship");//1
    ship_1.x=8;
    ship_1.y=8;
    vrag_ships.push(ship_1);
var ship_1 = new MyObject("ship");//1
    ship_1.x=6;
    ship_1.y=6;
    vrag_ships.push(ship_1);

var ship_1 = new MyObject("ship"); //4
    ship_1.x=0;
    ship_1.y=2;
    vrag_ships.push(ship_1);
var ship_1 = new MyObject("ship");
    ship_1.x=1;
    ship_1.y=2;
    vrag_ships.push(ship_1);
    var ship_1 = new MyObject("ship");
    ship_1.x=2;
    ship_1.y=2;
    vrag_ships.push(ship_1);
    var ship_1 = new MyObject("ship");
    ship_1.x=3;
    ship_1.y=2;
    vrag_ships.push(ship_1);

    var ship_1 = new MyObject("ship");//2
    ship_1.x=6;
    ship_1.y=1;
    vrag_ships.push(ship_1);
    var ship_1 = new MyObject("ship");
    ship_1.x=7;
    ship_1.y=1;
    vrag_ships.push(ship_1);
    
    var ship_1 = new MyObject("ship");//2
    ship_1.x=9;
    ship_1.y=0;
    vrag_ships.push(ship_1);
    var ship_1 = new MyObject("ship");
    ship_1.x=9;
    ship_1.y=1;
    vrag_ships.push(ship_1);

    var ship_1 = new MyObject("ship");//2
    ship_1.x=2;
    ship_1.y=6;
    vrag_ships.push(ship_1);
    var ship_1 = new MyObject("ship");
    ship_1.x=3;
    ship_1.y=6;
    vrag_ships.push(ship_1);

    var ship_1 = new MyObject("ship");//3
    ship_1.x=0;
    ship_1.y=9;
    vrag_ships.push(ship_1);
    var ship_1 = new MyObject("ship");
    ship_1.x=0;
    ship_1.y=8;
    vrag_ships.push(ship_1);
    var ship_1 = new MyObject("ship");
    ship_1.x=0;
    ship_1.y=7;
    vrag_ships.push(ship_1);

    var ship_1 = new MyObject("ship");//3
    ship_1.x=0;
    ship_1.y=4;
    vrag_ships.push(ship_1);
    var ship_1 = new MyObject("ship");
    ship_1.x=1;
    ship_1.y=4;
    vrag_ships.push(ship_1);
    var ship_1 = new MyObject("ship");
    ship_1.x=2;
    ship_1.y=4;
    vrag_ships.push(ship_1);
}

    for(let i =0; i<vrag_ships.length;i++)
    {
        let tabs_bot = document.querySelectorAll('.game-td2');
        tabs_bot.forEach((tab_bot) =>
        {
            if(Number(tab_bot.getAttribute("data-x")) == vrag_ships[i].x && 
            Number(tab_bot.getAttribute("data-y")) == vrag_ships[i].y)
            {
                tab_bot.setAttribute('data-z','1');
                //tab_bot.className = "game-td-green";
            }
        });
        
    }

bot_hod = true;
let skip_count =0;

function random_hod_x()
{
    var chislo = Math.floor(Math.random() * 10);
    return chislo;
}
function random_hod_y()
{
    var chislo = Math.floor(Math.random() * 10);
    return chislo;
}

function attack_bot()
{
    if(bot_hod){
        logic("Ходит бот");

        let x = random_hod_x();
        let y = random_hod_y();
        let tabs = document.querySelectorAll('.game-td');
        tabs.forEach((tab) =>
        {
            if(Number(tab.getAttribute('data-x')) == x && Number(tab.getAttribute('data-y') == y))
            {
                if(Number(tab.getAttribute('data-z')) == 1 && tab.style.background != "pink" && tab.style.bakground != "red") 
                {
                    tab.style.background = "red";
                    skip_count++;
                    bot_kills++;
                    console.log("Первый иф");
                    console.log("x",x);
                    console.log("y",y);
                    setInterval(attack_bot,4000);
                }
                else if(Number(tab.getAttribute('data-z')) != 1 && tab.style.background != "pink" && tab.style.bakground != "red")
                {
                    skip_count++;
                    tab.style.background = "pink";
                    console.log("Второй иф");
                    bot_hod = false;
                    my_hod = true;
                    attack_player();
                    
                }
                else if(tab.style.background == "pink")
                {
                    skip_count++;
                    bot_hod = false;
                    console.log("Третий иф");
                    console.log("x",x);
                    console.log("y",y);
                    my_hod = true;
                    attack_player();
                }
                else if(tab.background == "red")
                {
                    skip_count++;
                    console.log("Четвёртый иф");
                    console.log("x",x);
                    console.log("y",y);
                    setInterval(attack_bot,4000);
                }
            }
        });
    }
}

