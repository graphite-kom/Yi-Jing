package com.paultondeur.drawing
{
	import flash.display.Shape;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	
	public class PencilPoint extends Sprite
	{	
		private var anchorPoint		:Sprite;
		private var controlPoint1	:Sprite;
		private var controlPoint2	:Sprite;
		private var line			:Shape;
		
		private var moveControlPoint			:Boolean=false;
		private var moveControlPoint1XDistance	:Number;
		private var moveControlPoint1YDistance	:Number;
		private var moveControlPoint2XDistance	:Number;
		private var moveControlPoint2YDistance	:Number;
		
		private var rotationPoint	:Sprite;
		
		/**
		 * Constructor
		 * 
		 * Draw a new pencil point on a given possition.
		 * Each pencil point contains 1 anchorPoint and 2 controlPoints
		 * 
		 * @note	The new Point(); that's used in this function is a custom written class, so don't mix this up with the default way to make a new Point
		 */
		public function PencilPoint(_x:Number=0, _y:Number=0){
			super();
			
			//Create a new anchorPoint
			anchorPoint = new Point(_x,_y,4,0xFFFF00);
			//Give it a name so we can access it by name
			anchorPoint.name = "anchor";
			addChild(anchorPoint);
			//Add eventListeners to make them dragable
			anchorPoint.addEventListener(MouseEvent.MOUSE_DOWN,startMove);
			anchorPoint.addEventListener(MouseEvent.MOUSE_UP,stopMove);
			
			
			/**
			 * Repeate the abbove for two controlPoints
			 */
			 
			controlPoint1 = new Point(_x,_y);
			controlPoint1.name = "point1";
			addChild(controlPoint1);
			controlPoint1.addEventListener(MouseEvent.MOUSE_DOWN,startMove);
			controlPoint1.addEventListener(MouseEvent.MOUSE_UP,stopMove);
			
			controlPoint2 = new Point(_x,_y);
			controlPoint2.name = "point2";
			addChild(controlPoint2);
			controlPoint2.addEventListener(MouseEvent.MOUSE_DOWN,startMove);
			controlPoint2.addEventListener(MouseEvent.MOUSE_UP,stopMove);
			
		}
		
		/**
		 * Called by an eventListener which listens if a anchorPoint or a controlPoint is pressed
		 * 
		 * @todo	add a seperate listener when an anchor is pressed
		 */
		private function startMove(evt:MouseEvent):void
		{
			if(evt.target.parent.name == "anchor"){
				/**
				 * When the anchor starts to drag, set these settings so controlpoint will follow it's movements 
				 * You can do this by storing distance between anchorPoint and controlpoint
				 * This will be used later on at the enterFrame
				 */
				moveControlPoint = true;
				moveControlPoint1XDistance  = controlPoint1.x - anchorPoint.x;
				moveControlPoint1YDistance 	= controlPoint1.y - anchorPoint.y;
				moveControlPoint2XDistance  = controlPoint2.x - anchorPoint.x;
				moveControlPoint2YDistance 	= controlPoint2.y - anchorPoint.y;
			}
			
			//Reference the point which is moving so we can access this onEnterFrame
			rotationPoint = Sprite(evt.target);
			
			//Start dragging the point
			Sprite(evt.target).startDrag();
			
			//Listen onEnterFrame while dragging
			this.addEventListener(Event.ENTER_FRAME, drawLine);
		}
		
		/**
		 * 	Stop dragging and stop listeners
		 */
		private function stopMove(evt:MouseEvent):void
		{
			if(evt.target.parent.name == "anchor")			moveControlPoint = false;
			
			Sprite(evt.target).stopDrag();
			//Prevent there wasn't a new ENTER_FRAME fast enough to update the line to the current positions
			this.dispatchEvent(new Event(Event.ENTER_FRAME));
			this.removeEventListener(Event.ENTER_FRAME, drawLine);
		}
		
		/**
		 * - Draws a line from the each controlPoint to the anchorPoint
		 * - Rotates the opposite controlPoint, so they keep exactly in each others opposites possition
		 * - moves control points when the anchorPoint is moving
		 * 
		 * @todo	make an seperate listener function to update a moving anchorPoint
		 */
		private function drawLine(evt:Event):void
		{
			//Only remove lines, not the anchor points which are in the same container (this)
			if(this.numChildren>3)		removeChildAt(0);
			
			if(moveControlPoint){
				//Track movements of an anchor
				controlPoint1.x = anchorPoint.x + moveControlPoint1XDistance;
				controlPoint1.y = anchorPoint.y + moveControlPoint1YDistance;
				controlPoint2.x = anchorPoint.x + moveControlPoint2XDistance;
				controlPoint2.y = anchorPoint.y + moveControlPoint2YDistance;
			}
			
			var radius:Number;
			var rotation:Number;

			if(rotationPoint.parent.name=="point1"){
				//Get radius and rotation
				radius = getRadius(controlPoint1,anchorPoint);
				rotation = getRotation(controlPoint1,anchorPoint);
				
				//Rotate the opposite point
				setRotation(controlPoint2,anchorPoint,rotation+90);
			} else if(rotationPoint.parent.name=="point2"){
				//Get radius and totation
				radius = getRadius(controlPoint2,anchorPoint);
				rotation = getRotation(controlPoint2,anchorPoint);
				
				//Rotate opposite point
				setRotation(controlPoint1,anchorPoint,rotation+90);
			}
			
			//Draw line between controlPoints and the central anchorPoint
			line = new Shape();
			line.graphics.lineStyle(1,0xFF3333);
			line.graphics.moveTo(controlPoint1.x,controlPoint1.y);
			line.graphics.lineTo(anchorPoint.x,anchorPoint.y);
			line.graphics.lineTo(controlPoint2.x,controlPoint2.y);
			addChildAt(line,0);
			
		}
		
		/**
		 * Calculates the radius of point A, compared with pointB
		 * 
		 * @todo	This function should be added to a custom Math class
		 */
		private function getRadius(pointA:Sprite,pointB:Sprite):Number
		{
			var width:Number;
			var height:Number;
			
			if(pointA.x>pointB.x){
				width  = pointA.x - pointB.x;
			} else {
				width  = pointB.x - pointA.x;
			}
			
			if(pointA.y>pointB.y){
				height  = pointA.y - pointB.y;
			} else {
				height  = pointB.y - pointA.y;
			}
			
			return Math.sqrt(Math.pow(width,2) + Math.pow(height,2) );
		}
		
		/**
		 * Calculates the rotation between a point (controlPoint) and the centerPoint (anchorPoint)
		 * 
		 * @todo	This function should be added to a custom Math class
		 */
		private function getRotation(point:Sprite, centerPoint:Sprite):Number
		{
			var widthA:Number;
			var widthB:Number;
			var rotation:Number;
			
			if(centerPoint.x>point.x){
				widthA = centerPoint.x-point.x;
			} else {
				widthA = point.x-centerPoint.x;
			}
			
			if(centerPoint.y>point.y){
				widthB = centerPoint.y-point.y;
			} else {
				widthB = point.y-centerPoint.y;
			}
			
			//Rotation between 0 - 90
			rotation = Math.atan(widthA/widthB) * (180/Math.PI);
			
			//Calculate the real rotation depending in which quadrant the point is possitioned 
			if(point.y >= centerPoint.y && point.x >= centerPoint.x){
				rotation = 90 + ( 90 - rotation );
			} else if (point.y >= centerPoint.y && point.x <= centerPoint.x){
				rotation =180 + rotation;
			} else if(point.y <= centerPoint.y && point.x <= centerPoint.x){
				rotation= 270 + ( 90 - rotation );
			}
			
			//Be sure there's a possitive rotation
			if(!rotation > 0){
				rotation = 0;
			}
			 
			return rotation;
		}
		
		/**
		 * Rotates a point compared to a centerPoint (anchorPoint) with a given angle
		 */
		private function setRotation(point:Sprite, centerPoint:Sprite, angle:Number):void
		{
			angle=angle*Math.PI/180;
			var radius:Number = getRadius(point,centerPoint);
			
			point.x = Math.cos(angle) * radius + centerPoint.x;
			point.y = Math.sin(angle) * radius + centerPoint.y;
		}
	}
}