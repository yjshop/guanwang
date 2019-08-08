<?php

use common\models\CarouselItem;
use common\models\CaseCategory;
use yii\helpers\Url;

$tou      = CarouselItem::find()->where(['status' => 1, 'carousel_id' => 2])->orderBy('sort asc')->one();
$category = CaseCategory::find()->orderBy('id asc')->all();
?>



<!--  头部banner -->
<div class="banner am-g">
<img src="<?=$tou['image']?>">
</div>


<div class="example-box example-wrap">
<div class="am-container">

<h1 class="big-title">客户案例</h1>
<p>国内知名品牌企业都选择几何线商城的产品和服务</p>


<div class="exam-box-btn am-hide-sm-only">

<?php foreach ($category as $a): ?>
<?php
$show = "";
if ($id == $a['id']):
    {
        $show = 'btn-active';
    }
    ?>
  <?php endif;?>

<button type="button" class="am-btn  am-btn-primary am-btn-lg <?php echo $show ?>"><a href="<?=Url::to(['cases/index', 'category_id' => $a['id']])?>"><?=$a['title']?></a></button>

<!-- btn-active -->
<?php endforeach;?>

</div>

<div class="anli">

<ul class="anli-pc ">

<?=\yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView'     => '_item',
    'layout'       => "{items}",

])?>

  </ul>


  <ul class="anli-m am-show-sm-only">

  </ul>
  <div id="loading"></div>
</div>
   <!-- 分页开始 -->
    <div class="page am-hide-sm-only" >

      <?php if (!(new \Detection\MobileDetect())->isMobile()): ?>
      <?=\yii\widgets\LinkPager::widget([
    'pagination' => $dataProvider->pagination,
]);?>
      <?php else: ?>
      <?=\yii\widgets\LinkPager::widget([
    'pagination'       => $dataProvider->pagination,
    'nextPageLabel'    => '下一页',
    'prevPageLabel'    => '上一页',
    'maxButtonCount'   => 0,
    'prevPageCssClass' => 'previous',
    'nextPageCssClass' => 'next',
    'options'          => ['class' => 'pager'],
]);?>
      <?php endif;?>
     </div>


  </div>
 </div>








<?php
$this->registerJs(<<<JS


   $('.anli-m').masonry({

      itemSelector:'.anli-box',

    });

  //案例二维码显示
      $(".anli li").mouseover(function(){
        $(this).children(".code-img-box").show()
      })
      $(".anli li").mouseout(function(){
        $(this).children(".code-img-box").hide()
      })

    $('.am-thumbnail').mouseover(function(){
      $(this).children('.shadow').show();
    })
    $('.am-thumbnail').mouseout(function(){
      $(this).children('.shadow').hide();
    })

  if($(window).width()<=600){
    // 首次加载
    var JSONstr=null;
    var imgData=[];
    

    //下一页
    var next;
    //其他信息
    var message;
    //滑动锁定
    var flag=1;
    //已经进行第一次请求
    var flag2=false;

   $.ajax('/api/v1/cases/index?per-page=2&page=1', {
    dataType: 'json',
    beforeSend:function(){
      
      $("#loading").html('加载中...');
      
    }

  }).done(function (data) {

     //第一次请求已完成
      flag2=true;
      $("#loading").empty();


      next=data._links.next;
      message=data._meta;

      $.each(data.items,function(index,value){

         imgData.push({cover:value.cover,id:value.id});
      })
       imgLoad(imgData);

  }).fail(function (xhr, status) {

  }).always(function () {

  });


  //滑动加载
  $(window).scroll(function(){


            if(((flag==1)&&$(document).scrollTop()+100)>=$(document).height()-$(window).height()-$('footer').height()){

               flag--;


              // 是否还有新的图片没加载进来
      if(flag2&&message.currentPage<message.pageCount){
        imgData=[];
      $.ajax(next.href, {
    dataType: 'json',
     beforeSend:function(){
      
      $("#loading").html('加载中...');
      
    }
  }).done(function (data) {

      $("#loading").empty();
      next=data._links.next;
      message=data._meta;

      $.each(data.items,function(index,value){

        imgData.push({cover:value.cover,id:value.id});
      })
       imgLoad(imgData);

  }).fail(function (xhr, status) {

  }).always(function () {

  });
}else{
   $("#loading").html('没有更多案例了 ^_^');
}



            }

         });

      //将图片输出到页面，data为存储图片路径的数组
function imgLoad(data){

            //滑动时只加载一次
            flag=0;
            console.log(data);
            for(var i=0;i<data.length;i++){

              itemss=$('<li class="anli-box"><a href="/cases/view?id='+data[i].id+'"><img src="'+data[i].cover+'"></a></li>');

              $('.anli-m').append(itemss).masonry( 'appended',itemss);

            }
          $('.anli-m').imagesLoaded().progress(function(){

          $('.anli-m').masonry('layout');
         })
          flag=1;

}
}






















JS
);
?>