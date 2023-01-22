// class myObject {
//     constructor(type) {

//        if(type == "ship") 
//        {
//             this.width = 30;
//             this.height = 30;
//             this.backgroundimage = "url(images/ship.png)";
//             this.bottom = 102;
//             this.left = 40;
//             this.backgroundsize = "contain";
//             this.position = "absolute";
//             this.id = "";
//             this.angle = 0;
//             this.type = "ship";
//             this.active = false; // передвигаем ли он по кнопке сейчас
//         } 

//     }
    
//    myRender() {
    
//        let d=document.createElement('div');
//        d.style.width = this.width + "px";
//        d.style.height = this.height + "px";
//        d.style.backgroundImage = this.backgroundimage;
//        d.style.bottom = this.bottom + "px";
//        d.style.left = this.left + "px";
//        d.style.backgroundSize = this.backgroundsize;
//        d.style.position = this.position;
//        d.style.transform = this.angle;
//        d.id = this.id;
//        document.body.appendChild(d);
//    }


   

// }
// document.addEventListener('DOMContentLoaded', function(){ 
// {


//     for(let i=0;i<4;i++)
//     {
//         var ship = new myObject("ship");
//         ship.left= (i)*40 + 165;
//         ship.width = 30;
//         ship.height = 30;
//         ship.bottom = 200;
//         ship.id = ship_id;
//         ship_id = ship_id + 1;
//         boats.push(ship);

//     }

//     for(let i=0;i<3;i++)
//     {
//         var ship = new myObject("ship");
//         ship.left= (i)*75 + 165;
//         ship.width = 2*30;
//         ship.height = 30;
//         ship.bottom = 150;
//         ship.id = ship_id;
//         ship_id = ship_id + 1;
//         boats.push(ship);

//     }
//     for(let i=0;i<2;i++)
//     {
//         var ship = new myObject("ship");
//         ship.left= (i)*110 + 165;
//         ship.width = 3*30;
//         ship.height = 30;
//         ship.bottom = 100;
//         ship.id = ship_id;
//         ship_id = ship_id + 1;
//         boats.push(ship);

//     }
//         var ship = new myObject("ship");
//         ship.left= 165;
//         ship.width = 4*30;
//         ship.height = 30;
//         ship.bottom = 50;
//         ship.id = ship_id;
//         ship_id = ship_id + 1;
//         boats.push(ship);
//     }



//     for(let i=0; i<boats.length;i++)
//     {
//         boats[i].myRender();
        
//     }
//     dragAndDrop();

// });



// const dragAndDrop = () => {

//     const card = document.getElementById(boats[0].id);
//     const cells = document.querySelector('.game-tbody');
//     const tab = document.querySelectorAll('.game-td');
//     const dragStart = function () {
//         console.log('dragstart');
//     }

//     const dragEnd = function ()
//     {
//         console.log("end");
//     }

//     const dragOver = function (evt)
//     {
//         evt.preventDefault();
//     }

//     const dragEnter = function()
//     {
//         if(tab.className != "marker marker-column" && tab.className != "marker marker-row")
//         {
//             console.log('можно закинуть');
//         }
//     }
//     const dragDrop = function ()
//     {
//         card.style.left = this.style.left;
//         card.style.bottom = this.style.left;
//         this.append(card);
//     }

//     const Click = function ()
//     {
//         console.log(this.style.left);
//     }

//     tab.forEach((tabs) => {
//         tabs.addEventListener('drop', dragDrop);
//         tabs.addEventListener('dragenter', dragEnter);
//         tabs.addEventListener('dragover', dragOver);
//         tabs.addEventListener('click', Click);
//     });
    
//     card.addEventListener('dragstart', dragStart);
//     card.addEventListener('dragend', dragEnd);
// };

function logic(text)
{
    massages(text);
    wating = false;
    function massages (text)
    {
        var wait = document.querySelector('.wait');
        if(wait){
        document.body.removeChild(wait); 
        }
        
        if(wating)
        {
            var wait = document.createElement('div');
            wait.className = "wait";
            wait.textContent = "Ждём противника";
            document.body.append(wait);
        }
        else if(canMove)
        {
            var wait = document.createElement('div');
            wait.className = "wait";
            wait.textContent = text;
            document.body.append(wait);
        }
        else if(canMove == false && wating == false && text == "Вы победили")
        {
            var wait = document.createElement('div');
            wait.className = "wait";
            wait.textContent = "Вы победили, жми на меня и на выход";
            wait.addEventListener('click', function (){
                window.location.href = 'rating.php';
            })
            document.body.append(wait);
        }
        else if(canMove == false && wating == false && text == "Вы проиграли")
        {
            var wait = document.createElement('div');
            wait.className = "wait";
            wait.textContent = "Вы проиграли, жми на меня и на выход";
            wait.addEventListener('click', function (){
                window.location.href = 'rating.php';
            })
            document.body.append(wait);
        }
    }
}
    logic();



function check_zanyato(pos_x1,pos_y1)
{
    let tabs = document.querySelectorAll('.game-td');
    tabs.forEach((tab) =>
    {
        let eto_x = tab.getAttribute('data-x');
        let eto_y = tab.getAttribute('data-y');
        if((eto_x == pos_x1+1 && eto_y == pos_y1) || (eto_x == pos_x1-1 && eto_y == pos_y1) || (eto_x == pos_x1 && eto_y == pos_y1-1) || (eto_x == pos_x1 && eto_y == pos_y1+1)
        || (eto_x == pos_x1+1 && eto_y == pos_y1+1) || (eto_x == pos_x1-1 && eto_y == pos_y1-1) || (eto_x == pos_x1+1 && eto_y == pos_y1-1) || (eto_x == pos_x1-1 && eto_y == pos_y1+1))
        {

            //tab.className = "game-td-zanyato";
            if(Number(tab.getAttribute('data-z') != 1))
            {
               tab.setAttribute('data-z',4); 
            }
            
        }
    });
}



canMove = true;
function game(){
    if(canMove && count ==1){
        count_for_player=1;
        logic("Ставь " + count_for_player + "-ый корабль однопалубник");
        const tabs_my = document.querySelectorAll('.game-td');
        tabs_my.forEach((tab_my) =>
        {
            tab_my.addEventListener('click', function () 
            {
                const nameClass = tab_my.className;
                if(Number(tab_my.getAttribute('data-z')) == 0 && canMove && count ==1)
                {   
                    pos_x1 = tab_my.getAttribute('data-x');
                    pos_y1 = tab_my.getAttribute('data-y');
                    pos_x1 = Number(pos_x1);
                    pos_y1 = Number(pos_y1);
                    tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                    count = count + 1;
                    check_zanyato(pos_x1,pos_y1);
                    game();
                }

            })
            
        });
    }

    else if(canMove && count ==2)
    {
        count_for_player = 2;
        logic("Ставь " + count_for_player  + "-ый корабль однопалубник");
        const tabs_my = document.querySelectorAll('.game-td');
        tabs_my.forEach((tab_my) =>
        {
            tab_my.addEventListener('click', function () 
            {
                const nameClass = tab_my.className;
                if(Number(tab_my.getAttribute('data-z'))==0 && canMove && count ==2 && Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x1 = tab_my.getAttribute('data-x');
                    pos_y1 = tab_my.getAttribute('data-y');
                    pos_x1 = Number(pos_x1);
                    pos_y1 = Number(pos_y1);
                    tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                    count = count + 1;
                    check_zanyato(pos_x1,pos_y1);
                    game();

                }
            })
        });
    }
    else if(canMove && count ==3)
    {
        count_for_player=3;
        logic("Ставь " + count_for_player + "-ый корабль однопалубник");
        const tabs_my = document.querySelectorAll('.game-td');
        tabs_my.forEach((tab_my) =>
        {
            tab_my.addEventListener('click', function () 
            {
                const nameClass = tab_my.className;
                if(Number(tab_my.getAttribute('data-z'))==0 && canMove && count ==3 && Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x1 = tab_my.getAttribute('data-x');
                    pos_y1 = tab_my.getAttribute('data-y');
                    pos_x1 = Number(pos_x1);
                    pos_y1 = Number(pos_y1);
                    tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                    count = count + 1;
                    check_zanyato(pos_x1,pos_y1);
                    game();

                }
            })

        });
    }

    else if(canMove && count ==4)
    {
        count_for_player = 4;
        logic("Ставь " + count_for_player + "-ый корабль однопалубник");
        const tabs_my = document.querySelectorAll('.game-td');
        tabs_my.forEach((tab_my) =>
        {
            tab_my.addEventListener('click', function () 
            {
                const nameClass = tab_my.className;
                if(Number(tab_my.getAttribute('data-z'))==0 && canMove && count ==4 && Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x1 = tab_my.getAttribute('data-x');
                    pos_y1 = tab_my.getAttribute('data-y');
                    pos_x1 = Number(pos_x1);
                    pos_y1 = Number(pos_y1);
                    tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                    count = count + 1;
                    check_zanyato(pos_x1,pos_y1);
                    game();
                }
            })

        });
    }

    else if(canMove && (count ==5 || count == 6))
    {


        count_for_player = 5;
        logic("Ставь " + count_for_player + "-ый корабль двух палубник");

        const tabs_my = document.querySelectorAll('.game-td');
        tabs_my.forEach((tab_my) =>
        {

            tab_my.addEventListener('click', function () 
            {
                let nameClass = tab_my.className;
                if(Number(tab_my.getAttribute('data-z')) == 0 && canMove && count ==5 && Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x1 = tab_my.getAttribute('data-x');
                    pos_y1 = tab_my.getAttribute('data-y');
                    pos_x1 = Number(pos_x1);
                    pos_y1 = Number(pos_y1);
                    tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                    count = count + 1;
                    game();
                }
                if(Number(tab_my.getAttribute('data-z')) == 0 && canMove && count == 6 && Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x2 = tab_my.getAttribute('data-x');
                    pos_y2 = tab_my.getAttribute('data-y');
                    pos_x2 = Number(pos_x2);
                    pos_y2 = Number(pos_y2);
                    
                    if((pos_x2 == pos_x1 -1 && pos_y2 == pos_y1) || (pos_x2 == pos_x1 +1 && pos_y2 == pos_y1)
                        || (pos_x2 == pos_x1 && pos_y2 == pos_y1 -1) || (pos_x2 == pos_x1 && pos_y2 == pos_y1 +1))
                    {
                        tab_my.setAttribute('data-z',1);
                        tab_my.style.background = "green";
                        check_zanyato(pos_x1,pos_y1);
                        check_zanyato(pos_x2,pos_y2);
                        count = count + 1;
                        game();
                    }

                }
            })

        });
    }

    else if(canMove && (count ==7 || count == 8))
    {
        count_for_player = 6;
        logic("Ставь " + count_for_player + "-ый корабль двух палубник");
        const tabs_my = document.querySelectorAll('.game-td');
        tabs_my.forEach((tab_my) =>
        {
            tab_my.addEventListener('click', function () 
            {
                let nameClass = tab_my.className;
                if(Number(tab_my.getAttribute('data-z')) == 0 && canMove && count ==7 && Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x1 = tab_my.getAttribute('data-x');
                    pos_y1 = tab_my.getAttribute('data-y');
                    pos_x1 = Number(pos_x1);
                    pos_y1 = Number(pos_y1);
                    tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                    count = count + 1;
                    game();
                }
                if(Number(tab_my.getAttribute('data-z')) == 0 && canMove && count == 8 && Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x2 = tab_my.getAttribute('data-x');
                    pos_y2 = tab_my.getAttribute('data-y');
                    pos_x2 = Number(pos_x2);
                    pos_y2 = Number(pos_y2);

                    if((pos_x2 == pos_x1 -1 && pos_y2 == pos_y1) || (pos_x2 == pos_x1 +1 && pos_y2 == pos_y1)
                        || (pos_x2 == pos_x1 && pos_y2 == pos_y1 -1) || (pos_x2 == pos_x1 && pos_y2 == pos_y1 +1))
                    {
                        tab_my.setAttribute('data-z',1);
                        tab_my.style.background = "green";
                        check_zanyato(pos_x1,pos_y1);
                        check_zanyato(pos_x2,pos_y2);
                        count = count + 1;
                        game();
                    }

                }
            })

        });
    }

    else if(canMove && (count ==9 || count == 10))
    {
        count_for_player = 7;
        logic("Ставь " + count_for_player + "-ый корабль двух палубник");
        const tabs_my = document.querySelectorAll('.game-td');
        tabs_my.forEach((tab_my) =>
        {
            tab_my.addEventListener('click', function () 
            {
                let nameClass = tab_my.className;
                if(Number(tab_my.getAttribute('data-z')) == 0 && canMove && count ==9 && Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x1 = tab_my.getAttribute('data-x');
                    pos_y1 = tab_my.getAttribute('data-y');
                    pos_x1 = Number(pos_x1);
                    pos_y1 = Number(pos_y1);
                    tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                    count = count + 1;
                    game();
                }
                if(Number(tab_my.getAttribute('data-z')) == 0 && canMove && count == 10 && Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x2 = tab_my.getAttribute('data-x');
                    pos_y2 = tab_my.getAttribute('data-y');
                    pos_x2 = Number(pos_x2);
                    pos_y2 = Number(pos_y2);
                    if((pos_x2 == pos_x1 -1 && pos_y2 == pos_y1) || (pos_x2 == pos_x1 +1 && pos_y2 == pos_y1)
                        || (pos_x2 == pos_x1 && pos_y2 == pos_y1 -1) || (pos_x2 == pos_x1 && pos_y2 == pos_y1 +1))
                    {
                        tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                        check_zanyato(pos_x1,pos_y1);
                        check_zanyato(pos_x2,pos_y2);
                        count = count + 1;
                        game();
                    }

                }
            })
        });
    }

    else if(canMove && (count ==11 || count==12 || count ==13))
    {
        count_for_player = 8;
        logic("Ставь " + count_for_player + "-ый корабль трёх палубник")
        const tabs_my = document.querySelectorAll('.game-td');
        tabs_my.forEach((tab_my) =>
        {
            tab_my.addEventListener('click', function () 
            {
                let nameClass = tab_my.className;
                if(Number(tab_my.getAttribute('data-z')) == 0 && canMove && count ==11 && Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x1 = tab_my.getAttribute('data-x');
                    pos_y1 = tab_my.getAttribute('data-y');
                    pos_x1 = Number(pos_x1);
                    pos_y1 = Number(pos_y1);
                    tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                    count = count + 1;
                    game();
                }
                if(nameClass == "game-td" && canMove && count == 12&&Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x2 = tab_my.getAttribute('data-x');
                    pos_y2 = tab_my.getAttribute('data-y');
                    pos_x2 = Number(pos_x2);
                    pos_y2 = Number(pos_y2);


                    if((pos_x2 == pos_x1 && pos_y2 == pos_y1 -1) || (pos_x2 == pos_x1 && pos_y2 == pos_y1 +1))
                    {
                        UpDown = true;
                        LeftRight = false;
                        tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                        check_zanyato(pos_x1,pos_y1);
                        count = count + 1;
                        pos_x1 = tab_my.getAttribute('data-x');
                        pos_y1 = tab_my.getAttribute('data-y');
                        pos_x1 = Number(pos_x1);
                        pos_y1 = Number(pos_y1);
                        game();
                    }
                    else if((pos_x2 == pos_x1 -1 && pos_y2 == pos_y1) || (pos_x2 == pos_x1 +1 && pos_y2 == pos_y1))
                    {
                        LeftRight = true;
                        UpDown = false;
                        tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                        check_zanyato(pos_x1,pos_y1);
                        count = count + 1;
                        pos_x1 = tab_my.getAttribute('data-x');
                        pos_y1 = tab_my.getAttribute('data-y');
                        pos_x1 = Number(pos_x1);
                        pos_y1 = Number(pos_y1);
                        game();
                    }
                }
                if(Number(tab_my.getAttribute('data-z')) == 0 && canMove && count == 13&&Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x2 = tab_my.getAttribute('data-x');
                    pos_y2 = tab_my.getAttribute('data-y');
                    pos_x2 = Number(pos_x2);
                    pos_y2 = Number(pos_y2);
                    if(((pos_x2 == pos_x1 -1 && pos_y2 == pos_y1) || (pos_x2 == pos_x1 +1 && pos_y2 == pos_y1)) && LeftRight)
                    {

                        tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                        check_zanyato(pos_x2,pos_y2);
                        count = count + 1;
                        game();
                        
                    }
                    else if(((pos_x2 == pos_x1 && pos_y2 == pos_y1 -1) || (pos_x2 == pos_x1 && pos_y2 == pos_y1 +1)) && UpDown)
                    {
                        tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                        check_zanyato(pos_x2,pos_y2);

                        count = count + 1;
                        game();
                    }
                }
            })
        });
    }

    else if(canMove && (count ==14 || count ==15|| count ==16))
    {
        count_for_player = 9;
        logic("Ставь " + count_for_player + "-ый корабль трёх палубник")
        const tabs_my = document.querySelectorAll('.game-td');
        tabs_my.forEach((tab_my) =>
        {
            tab_my.addEventListener('click', function () 
            {
                let nameClass = tab_my.className;
                if(Number(tab_my.getAttribute('data-z')) == 0 && canMove && count ==14 && Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x1 = tab_my.getAttribute('data-x');
                    pos_y1 = tab_my.getAttribute('data-y');
                    pos_x1 = Number(pos_x1);
                    pos_y1 = Number(pos_y1);
                    tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                    count = count + 1;
                    game();
                }
                if(Number(tab_my.getAttribute('data-z')) == 0 && canMove && count == 15 && Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x2 = tab_my.getAttribute('data-x');
                    pos_y2 = tab_my.getAttribute('data-y');
                    pos_x2 = Number(pos_x2);
                    pos_y2 = Number(pos_y2);


                    if((pos_x2 == pos_x1 && pos_y2 == pos_y1 -1) || (pos_x2 == pos_x1 && pos_y2 == pos_y1 +1))
                    {
                        UpDown = true;
                        LeftRight = false;
                        tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                        check_zanyato(pos_x1,pos_y1);
                        count = count + 1;
                        pos_x1 = tab_my.getAttribute('data-x');
                        pos_y1 = tab_my.getAttribute('data-y');
                        pos_x1 = Number(pos_x1);
                        pos_y1 = Number(pos_y1);
                        game();
                    }
                    else if((pos_x2 == pos_x1 -1 && pos_y2 == pos_y1) || (pos_x2 == pos_x1 +1 && pos_y2 == pos_y1))
                    {
                        LeftRight = true;
                        UpDown = false;
                        tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                        check_zanyato(pos_x1,pos_y1);
                        count = count + 1;
                        pos_x1 = tab_my.getAttribute('data-x');
                        pos_y1 = tab_my.getAttribute('data-y');
                        pos_x1 = Number(pos_x1);
                        pos_y1 = Number(pos_y1);
                        game();
                    }
                }
                if(Number(tab_my.getAttribute('data-z')) == 0 && canMove && count == 16 && Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x2 = tab_my.getAttribute('data-x');
                    pos_y2 = tab_my.getAttribute('data-y');
                    pos_x2 = Number(pos_x2);
                    pos_y2 = Number(pos_y2);
                    if(((pos_x2 == pos_x1 -1 && pos_y2 == pos_y1) || (pos_x2 == pos_x1 +1 && pos_y2 == pos_y1)) && LeftRight)
                    {

                        tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                        check_zanyato(pos_x2,pos_y2);
                        count = count + 1;
                        game();
                        
                    }
                    else if(((pos_x2 == pos_x1 && pos_y2 == pos_y1 -1) || (pos_x2 == pos_x1 && pos_y2 == pos_y1 +1)) && UpDown)
                    {
                        tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                        check_zanyato(pos_x2,pos_y2);
                        count = count + 1;
                        game();
                    }
                }
            })
        });
    }

    else if(canMove && (count ==17 || count==18 || count ==19 || count ==20))
    {
        count_for_player = 10;
        logic("Ставь " + count_for_player + "-ый корабль четырёх палубник")
        const tabs_my = document.querySelectorAll('.game-td');
        tabs_my.forEach((tab_my) =>
        {
            tab_my.addEventListener('click', function () 
            {
                let nameClass = tab_my.className;
                if(Number(tab_my.getAttribute('data-z')) == 0 && canMove && count ==17&& Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x1 = tab_my.getAttribute('data-x');
                    pos_y1 = tab_my.getAttribute('data-y');
                    pos_x1 = Number(pos_x1);
                    pos_y1 = Number(pos_y1);
                    tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                    count = count + 1;
                    game();
                }
                if(Number(tab_my.getAttribute('data-z')) == 0 && canMove && count == 18&& Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x2 = tab_my.getAttribute('data-x');
                    pos_y2 = tab_my.getAttribute('data-y');
                    pos_x2 = Number(pos_x2);
                    pos_y2 = Number(pos_y2);


                    if((pos_x2 == pos_x1 && pos_y2 == pos_y1 -1) || (pos_x2 == pos_x1 && pos_y2 == pos_y1 +1))
                    {
                        UpDown = true;
                        LeftRight = false;
                        tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                        count = count + 1;
                        pos_x1 = tab_my.getAttribute('data-x');
                        pos_y1 = tab_my.getAttribute('data-y');
                        pos_x1 = Number(pos_x1);
                        pos_y1 = Number(pos_y1);
                        game();
                    }
                    else if((pos_x2 == pos_x1 -1 && pos_y2 == pos_y1) || (pos_x2 == pos_x1 +1 && pos_y2 == pos_y1))
                    {
                        LeftRight = true;
                        UpDown = false;
                        tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                        count = count + 1;
                        pos_x1 = tab_my.getAttribute('data-x');
                        pos_y1 = tab_my.getAttribute('data-y');
                        pos_x1 = Number(pos_x1);
                        pos_y1 = Number(pos_y1);
                        game();
                    }
                }
                if(Number(tab_my.getAttribute('data-z')) == 0 && canMove && count == 19&& Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x2 = tab_my.getAttribute('data-x');
                    pos_y2 = tab_my.getAttribute('data-y');
                    pos_x2 = Number(pos_x2);
                    pos_y2 = Number(pos_y2);
                    if(((pos_x2 == pos_x1 -1 && pos_y2 == pos_y1) || (pos_x2 == pos_x1 +1 && pos_y2 == pos_y1)) && LeftRight)
                    {

                        tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                        count = count + 1;
                        pos_x1 = tab_my.getAttribute('data-x');
                        pos_y1 = tab_my.getAttribute('data-y');
                        pos_x1 = Number(pos_x1);
                        pos_y1 = Number(pos_y1);
                        game();
                        
                    }
                    else if(((pos_x2 == pos_x1 && pos_y2 == pos_y1 -1) || (pos_x2 == pos_x1 && pos_y2 == pos_y1 +1)) && UpDown)
                    {
                        tab_my.setAttribute('data-z',1);
                    tab_my.style.background = "green";
                        count = count + 1;
                        pos_x1 = tab_my.getAttribute('data-x');
                        pos_y1 = tab_my.getAttribute('data-y');
                        pos_x1 = Number(pos_x1);
                        pos_y1 = Number(pos_y1);
                        game();
                    }
                }
                if(Number(tab_my.getAttribute('data-z')) == 0 && canMove && count == 20&& Number(tab_my.getAttribute('data-z')) != 4)
                {
                    pos_x2 = tab_my.getAttribute('data-x');
                    pos_y2 = tab_my.getAttribute('data-y');
                    pos_x2 = Number(pos_x2);
                    pos_y2 = Number(pos_y2);
                    if(((pos_x2 == pos_x1 -1 && pos_y2 == pos_y1) || (pos_x2 == pos_x1 +1 && pos_y2 == pos_y1)) && LeftRight)
                    {

                        tab_my.setAttribute('data-z',1);
                        tab_my.style.background = "green";
                        count = count + 1;
                        my_hod = true;
                        attack_player();
                        logic("Ваш ход");
                        
                    }
                    else if(((pos_x2 == pos_x1 && pos_y2 == pos_y1 -1) || (pos_x2 == pos_x1 && pos_y2 == pos_y1 +1)) && UpDown)
                    {
                        tab_my.setAttribute('data-z',1);
                        tab_my.style.background = "green";
                        count = count + 1;
                        my_hod = true;
                        logic("Ваш ход");
                        attack_player();
                    }
                }
            })

        });
    }
}

function attack_player(){
    if(my_hod == true){
        document.addEventListener('click', function(e){
            if(my_hod == true && e.target.className == "game-td2")
            {
                if(Number(e.target.getAttribute('data-z'))==1 && e.target.style.background != "pink" && e.target.style.background != "red")
                {
                    e.target.style.background = "red";
                    my_kills++;
                    check_finish_bot();

                }
                else if(Number(e.target.getAttribute('data-z')) != 1 && e.target.style.background != "pink")
                {
                    my_hod = false;
                    back()
                    e.target.style.background = "pink";
                    bot_hod = true;
                    logic("Ходит бот");
                    setInterval(attack_bot,2000);

                }
            }
        })
    }
}
function back(){
    if(my_hod != true)
    {
        document.addEventListener('click', function(e){
            if(e.target.className == "game-td2"){

            }
        })
        
    }
}

function check_finish_my()
{
    var finish_my = 0;
    let tubs = document.querySelectorAll('.game-td');
    tubs.forEach((tab) =>
    {
        if(tab.style.background == "red")
        {
            finish_my ++;
        }
    });
    console.log("Моих убито", finish_my);
    if(finish_my >= 20)
    {
        bot_hod = false;
        my_hod = false;
        canMove = false;
        wating = false;
        logic("Вы проиграли");
    }
}

function check_finish_bot()
{
    var finish_bot = 0;
    let tubs = document.querySelectorAll('.game-td2');
    tubs.forEach((tab) =>
    {
        if(tab.style.background == "red")
        {
            finish_bot ++;
        }
    });
    console.log("Его убито", finish_bot);
    if(finish_bot >= 20)
    {
        bot_hod = false;
        my_hod = false;
        canMove = false;
        wating = false;
        logic("Вы победили");
    }
}