/**
 * @Author: Rahix
 * @Desc: render.js is the rendering system for Alien-Invaders.
 *        This file contains every rendering function for the game and is also used by
 *        Alien-Invaders-Level-Editor(https://github.com/toobi/Alien-Invaders-Level-Editor)
 */

function drawMap(xOff, yOff) {
	var tileX;
	var tileY;

	tileX = tiledim;
	tileY = tileX;
	//Now Start to Draw
	var i;
	var t;
	for ( i = 0; i < mapdata.General.Size.X; i++) {
		for ( t = 0; t < mapdata.General.Size.Y; t++) {
			if (map[t][i].Tile < 15) {
				cctx.drawImage(document.getElementById('tile'), i * tileX, t * tileY, tileX, tileY);
			}
		}
	}
}

function draw() {
	erase();
	drawMap(0, 0);
	//Draw next wave button
	switch(nwb_state) {
	case 1:
		cctx.drawImage(document.getElementById('nwb'), 0, 0, 114, 22, 0, 0, 114, 22);
		break;
	case 2:
		cctx.drawImage(document.getElementById('nwb'), 0, 22, 114, 22, 0, 0, 114, 22);
		break;
	case 3:
		cctx.drawImage(document.getElementById('nwb'), 0, 44, 114, 22, 0, 0, 114, 22);
		break;
	}
}