class myObject {
    constructor(type) {

       
       
       // hero
       if(type == "ship") {
       
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
       document.body.appendChild(d);

   }

   

}



