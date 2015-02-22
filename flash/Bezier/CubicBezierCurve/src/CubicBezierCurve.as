package {
	import com.paultondeur.drawing.CubicBezier;
	import com.paultondeur.drawing.PencilPoint;
	
	import flash.display.Shape;
	import flash.display.Sprite;
	import flash.display.StageAlign;
	import flash.display.StageScaleMode;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.text.TextField;

	public class CubicBezierCurve extends Sprite
	{
		
		private var lineHolder:Sprite = new Sprite();
		private var pencilHolder:Sprite = new Sprite();
		
		private var line:Sprite;
		private var bezierLine:CubicBezier;
		private var pencilPoint:PencilPoint;
		private var button:Sprite;
		
		/**
		 * Constructor
		 * 	- Add containers
		 *  - Add points to the stage to start with
		 *  - Add a button to turn off the anchorpoints/controlpoints
		 */
		public function CubicBezierCurve()
		{
			stage.frameRate		= 25;
			stage.align			= StageAlign.TOP_LEFT;
			stage.scaleMode 	= StageScaleMode.NO_SCALE;
			
			
			//Add containers
			addChild(lineHolder);
			addChild(pencilHolder);
			
			//Points on the left
			pencilPoint = new PencilPoint(100,200);
			pencilHolder.addChild(pencilPoint);
			pencilPoint.addEventListener(MouseEvent.MOUSE_DOWN, pencilDown);
			pencilPoint.addEventListener(MouseEvent.MOUSE_UP, pencilUp);
			
			//Points on the right
			pencilPoint = new PencilPoint(300,200);
			pencilHolder.addChild(pencilPoint);
			pencilPoint.addEventListener(MouseEvent.MOUSE_DOWN, pencilDown);
			pencilPoint.addEventListener(MouseEvent.MOUSE_UP, pencilUp);
			
			drawLine(new Event(Event.ENTER_FRAME));
			
			//Add a button to turn off the anchorPoints and pencilPoints
			button = new Sprite();
			button.graphics.beginFill(0xFFCCAA);
			button.graphics.drawRoundRect(20,23,100,20,10);
			button.graphics.endFill();
			addChild(button);
			
			var hideText:TextField = new TextField();
			hideText.text = "Hide Anchors"
			hideText.x=25;
			hideText.y=25;
			hideText.height=18;
			hideText.selectable=false;
			addChild(hideText);
			hideText.addEventListener(MouseEvent.CLICK,hidePencils);
						
		}
		
		/**
		 * Add's a new point to the line at the clicked possition
		 */
		private function addAnchor(evt:MouseEvent):void
		{
			pencilPoint = new PencilPoint(evt.localX,evt.localY);
			var index:Number = parseInt(evt.target.name)+1;
			pencilHolder.addChildAt(pencilPoint, index);
			
			pencilPoint.addEventListener(MouseEvent.MOUSE_DOWN, pencilDown);
			pencilPoint.addEventListener(MouseEvent.MOUSE_UP, pencilUp);
			
			//Update the line
			drawLine(new Event(Event.ENTER_FRAME));
		}
		
		/**
		 * redraw's the line when the pencilPoint is changing possition
		 */
		private function pencilDown(evt:MouseEvent):void
		{
			this.addEventListener(Event.ENTER_FRAME, drawLine);
		}
		
		/**
		 * Stops redrawing the line
		 */
		private function pencilUp(evt:MouseEvent):void
		{
			//First make sure the line is redrawn
			this.dispatchEvent(new Event(Event.ENTER_FRAME));
			this.removeEventListener(Event.ENTER_FRAME, drawLine);
		}
		
		/**
		 * Draw's a bezierCurved line onEnterFrame while a pencilpoint is clicked
		 * 
		 * @todo	each line will be updated during this function. update only line's that might be changed so you can boost performance
		 * 
		 */
		private function drawLine(evt:Event):void
		{
			//Remove all excisting lines
			removeAllLines(lineHolder);

			var next:Boolean;
			var anchorChildren:Number=pencilHolder.numChildren;
			
			//Update all lines between anchor points (and skip the last point cause there's no line to draw from that point)
			//@todo		don't do this for all anchor points
			for (var i:Number=0; i<anchorChildren-1; i++){
 				//Make reference holders so we don't have to type to much when we need them
 				var anchor:Sprite;
				var control:Sprite;
				var nextAnchor:Sprite;
				var nextControl:Sprite;

				
				//Store easy references
				anchor = Sprite(Sprite(pencilHolder.getChildAt(i)).getChildByName("anchor"));
				control = Sprite(Sprite(pencilHolder.getChildAt(i)).getChildByName("point2"));
				nextAnchor = Sprite(Sprite(pencilHolder.getChildAt(i+1)).getChildByName("anchor"));
				nextControl = Sprite(Sprite(pencilHolder.getChildAt(i+1)).getChildByName("point1"));
				
				
				//Draw the curve
				bezierLine = new CubicBezier(anchor,nextAnchor,control,nextControl);
				line = new Sprite();
				line.addChild(bezierLine.draw());
				
				//Give curve a name, so we can use it later to determine which curve was clicked and needs to be subdivided
				line.name=""+i;
				
				//Add curve to the stage
				lineHolder.addChild(line);
				line.addEventListener(MouseEvent.CLICK, addAnchor);
				 
			}

			
		}
		
		/**
		 * removeAllLines in a container and clear up it's listeners
		 */
		private function removeAllLines(_sprite:Sprite):void
		{
			while (_sprite.numChildren > 0){
				_sprite.getChildAt(_sprite.numChildren-1).removeEventListener(MouseEvent.CLICK, addAnchor);
				_sprite.removeChildAt(_sprite.numChildren-1);
				
			}
		}
		
		/**
		 * Make pencilPoints invisible
		 * 
		 * @todo	remove eventlisteners / disable pencils while they are invisible
		 */
		private function hidePencils(evt:MouseEvent):void
		{
			//Alpha is 1 or 0, in other words true or false, so inverse it's state
			pencilHolder.alpha=Number(!pencilHolder.alpha);
		}
		
	}
}
