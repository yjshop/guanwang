<?php
?>

<?php echo $this->render('top'); ?>

<div class="am-container layout">

  <div class="am-g">
  
  <?php echo $this->render('left'); ?>
  
      <div class="am-u-md-10 lay-r" style="padding:30px 50px;">
    <div class="am-slider am-slider-default am-slider-carousel slider">
 
 
 
 
 
      <div class="addr-wrap">
	<!-- 主体 -->
	<div class="am-container">
		<div class="contact-box">
	
		
		<div class="am-g">
				<div class="am-u-md-3 left am-u-sm-12">
					<div class="left-img"><img src="/storage/images/gzh.jpg"></div>
					
					<p class="concern">扫码关注我们</p>

					<div class="detail">
						<p>钦州市友加信息科技有限公司</p>
						<p>钦州市永福西大街南面金湖国际大厦16楼1601室</p>
						<p>电话: 0777-2110336</p>
						<p>电子邮件： admin@jihexian.com</p>
						<p>公交：8路、K8路、19路公交车可到</p>			
					</div>
				</div>
				<div class='right am-u-md-8'>
				<div style="width: 800px;height: 385px;"class=" addr-right " id="map_container"></div>
			   </div>
		</div>
	</div>
	</div>
	</div>
	
	
	 
    </div>
   </div>
  </div>
</div>
<!-- 地图JS -->
<script  type="text/javascript" charset="utf-8" src="https://map.qq.com/api/js?v=2.exp&key=HP5BZ-FMML4-DYSUH-D5RXY-4AAUT-SWFQB"></script>
<?php  
$this->registerJs(<<<JS
		    	var id = "2";
		        var map_location = "108.631140,21.975150";
		        var markersArray = [];
		        if(id == 2 && map_location){
		        	var arr = map_location.split(","); //字符分割 
		       		init();
		        }
		        
		        function init() {
		        	//定义map变量 调用 qq.maps.Map() 构造函数   获取地图显示容器
		        	// 地图的中心地理坐标
		        	var center = new qq.maps.LatLng(arr[1], arr[0]);
		        	var map = new qq.maps.Map(
			            document.getElementById("map_container"),
			            {
			                center: center,     
			                zoom: 15            // 地图的缩放级别。
			            }
			        );
			        createMarker(center, map);
		            //获取城市列表接口设置中心点
		            citylocation = new qq.maps.CityService({
		                complete : function(result){
		                    map.setCenter(result.detail.latLng);
		                }
		            });
		            //调用searchLocalCity();方法    根据用户IP查询城市信息。
		            //citylocation.searchLocalCity();

		            // 监听地图点击事件
		            qq.maps.event.addListener(map,'click',function(event) {
		                var position = new qq.maps.LatLng(event.latLng.getLat(), event.latLng.getLng());

		                createMarker(position, map);

		                geocoder = new qq.maps.Geocoder({
		                    complete : function(result){
		                        map.setCenter(result.detail.location);
		                        $("#address").val(result.detail.address);
		                    }
		                });
		                geocoder.getAddress(position);

		                $("#location").val(event.latLng.getLng().toFixed(6) + ',' + event.latLng.getLat().toFixed(6));
		            });
		        }

		        
		        /*添加覆盖物*/
		        function createMarker(position, map) {
		            deleteOverlays();
		            var marker = new qq.maps.Marker({
		                position: position,
		                map: map
		            });
		            markersArray.push(marker);
		        }
		        /*删除覆盖物*/
		        function deleteOverlays() {
		            if (markersArray) {
		                for (i in markersArray) {
		                    markersArray[i].setMap(null);
		                }
		                markersArray.length = 0;
		            }
		        }
		        /*添加比例尺控件 左下角*/
		        function scaleControl(map) {
		            var scaleControl = new qq.maps.ScaleControl({
		                align: qq.maps.ALIGN.BOTTOM_LEFT,
		                margin: qq.maps.Size(85, 15),
		                map: map
		            });
		        }
JS
); 
?>