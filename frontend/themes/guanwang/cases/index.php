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
</div>
   <!-- 分页开始 -->
            <div class="page">

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


<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
 <?php
$this->registerJs(<<<JS

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
    dataType: 'json'
  }).done(function (data) {

     //第一次请求已完成
      flag2=true;


      next=data._links.next;
      message=data._meta;

      $.each(data.items,function(index,value){

        imgData.push(value.cover);
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
    dataType: 'json'
  }).done(function (data) {

      next=data._links.next;
      message=data._meta;

      $.each(data.items,function(index,value){

        imgData.push(value.cover);
      })
       imgLoad(imgData);

  }).fail(function (xhr, status) {

  }).always(function () {

  });
}



            }

         });

      //将图片输出到页面，data为存储图片路径的数组
function imgLoad(data){

            //滑动时只加载一次
            flag=0;
            var itemss
            for(var i=0;i<data.length;i++){
                itemss=$('<li class="anli-box"><img src="'+data[i]+'"></li>');
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