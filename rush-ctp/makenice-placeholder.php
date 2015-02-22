<!-- START Data Map -->
<div id="dataMap">
	<div id="hidden" style="background-color:#006666;clear:both; padding:5px 15px; color:ffffff;" onclick="javascript:showMakenice();">Show Data Map +</div>
	
	<div id="shown" style="background-color:#006666;clear:both;display:none; padding:5px 15px; color:fff;" onclick="javascript:hideMakenice();">
		<div>Hide Data Map -</div>
		<div><?php echo $makenice->makenice($questions);?></div>
	</div>
</div>
<!-- END Data Map -->