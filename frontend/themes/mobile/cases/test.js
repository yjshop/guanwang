$(window).scroll(function() {
    var condition1 = $(document).scrollTop() + 100 >= $(document).height() - $(window).height() - $('footer').height();
    if (flag === true && condition1) {
      
        // 是否还有新的图片没加载进来
        if (flag2 && message.currentPage < message.pageCount) {

            imgData = [];
            $.ajax(next.href, {
                dataType: 'json',
                beforeSend: function() {
                  //是否可以请求ajax
                  flag = false;
                  $("#loading").html('加载中...');
                }
            }).done(function(data) {
                $("#loading").empty();
                next = data._links.next;
                message = data._meta;
                $.each(data.items, function(index, value) {
                    imgData.push({
                        cover: value.cover,
                        id: value.id
                    });
                })
                imgLoad(imgData);
            }).fail(function(xhr, status) {}).always(function() {});
        } else {
            $("#loading").html('没有更多案例了 ^_^');
        }
    }
});
//将图片输出到页面，data为存储图片路径的数组
function imgLoad(data) {
    for (var i = 0; i < data.length; i++) {
        itemss = $('<li class="anli-box"><a href="/cases/view?id=' + data[i].id + '"><img src="' + data[i].cover + '"></a></li>');
        $('.anli-m').append(itemss).masonry('appended', itemss);
    }
    $('.anli-m').imagesLoaded().progress(function() {
        $('.anli-m').masonry('layout');
    })
    flag = true;
}