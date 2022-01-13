class Snowflake{
	constructor(){
		this.rand = new MyMath();
		this.size = this.rand.getRand(5,70);
		this.element = document.createElement('div');
		this.element.style.width = this.element.style.height = `${this.size}px`;
		this.element.className = "snowflake";
		this.element.style.left = `${this.rand.getRand(window.innerWidth,0)}px`;
		document.body.appendChild(this.element);
		this.Y = -window.innerHeight;
		this.vibration = 100 - this.size;
	}	

	vibrations(){
		this.element.style.left = `${parseInt(this.element.offsetLeft+this.vibration)}px`;
		this.element.style.transition = `left ${this.rand.getRand(3, 1)}s linear`;
		this.vibration = -this.vibration;
	}

	frame(){
		this.VY = (11 - this.size/10)/5;
		if(this.element.offsetTop < window.innerHeight){
			this.Y += this.VY;
		}
		else{
			this.Y = -window.innerHeight;
			this.element.style.transition = "0";
			this.element.style.left = `${this.rand.getRand(window.innerWidth,0)}px`;
		}
		this.element.style.top = this.Y + 'px';
	}
}

class Snow{
	constructor(count){
		this.rand = new MyMath();
		this.arr = [count];
		this.count = count;
	}
	start(){
		for(let i = 0; i < this.count; i++){
		this.arr[i] = new Snowflake();
		this.dropInterval = setInterval(this.arr[i].frame.bind(this.arr[i]), 1);
		this.vibrationInterval = setInterval(this.arr[i].vibrations.bind(this.arr[i]), this.rand.getRand(500,1000));
		}
	}
	stop(){
		clearInterval(this.dropInterval);
		clearInterval(this.vibrationInterval);
	}
}

snow = new Snow(150);
snow.start();
