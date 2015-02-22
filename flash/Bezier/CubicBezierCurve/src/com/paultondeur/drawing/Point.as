package com.paultondeur.drawing
{
	import flash.display.Sprite;
	
	public class Point extends Sprite
	{	
		private var point:Sprite;
		
		/**
		 * Draws a simple point on a given possition with a given radius and color
		 * 
		 * @todo	get rid of setting point.x but use this.x
		 */
		public function Point(_x:Number=0, _y:Number=0, _radius:Number=2, _color:uint=0x00FFFF){
			super();
			point =  new Sprite();
			point.graphics.beginFill(_color);
			point.graphics.drawCircle(0,0,_radius);
			point.x=_x;
			point.y=_y;
			addChild(point);
		}
		
		public override function set x(_x:Number):void
		{
			point.x = _x;
		}
		
		public override function set y(_y:Number):void
		{
			point.y = _y;
		}
		
		public override function get x():Number
		{
			return point.x;
		}
		
		public override function get y():Number
		{
			return point.y;
		}
	}
}