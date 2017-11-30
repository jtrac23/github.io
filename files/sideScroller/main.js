var jsApp = {
	onload: function(){
		if(!me.video.init('jsapp', 320, 240, true, 2.0)){
			alert("html 5 canvas is not supported by this browser.");
			return;
		}//endif
		me.loader.onload = this.loaded.bind(this);
		me.loader.preload(resources);
		me.state.change(me.state.LOADING);
		me.gamestat.add("coins", 0);
		me.gamestat.add("totalCoins", 8);
	}, //end onload function
	loaded: function(){
		
		//me.state.change(me.state.PLAY);
		me.entityPool.add("player", PlayerEntity);
		me.entityPool.add("coin", CoinEntity);
		me.entityPool.add("boots", BootsEntity);
		me.entityPool.add("EnemyEntity", EnemyEntity);
		me.entityPool.add("EnemyEntity2", EnemyEntity2);
		me.state.set(me.state.PLAY, new PlayScreen());
		me.state.set(me.state.MENU, new TitleScreen());
		me.state.transition("fade", "#2FA2C2", 250);
		me.state.change(me.state.MENU);
	}//end loaded fucntion
}; //end jsApp
window.onReady(function(){
	jsApp.onload();
});
/*
TODO
NEW ENEMY NEEDS TO STEAL COINS FROM THE PLAYER RATHER THAN KILLING
	maybe put the coins back where they were? */
	