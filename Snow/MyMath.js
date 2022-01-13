class MyMath{
	getRand(leftComp, rightComp){
		if(leftComp == 0)
			rightComp += 1;
		if(rightComp == 0)
			leftComp += 1;
		if(leftComp < rightComp){
			this.temp = rightComp;
			rightComp = leftComp;
			leftComp = this.temp;
		}
		return Math.trunc(Math.random()*leftComp)%leftComp+rightComp;
	}
}