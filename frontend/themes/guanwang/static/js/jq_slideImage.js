;(function(undefined) {
    "use strict"
    var _global;

    // var x = getRandomNumber(80,140), y = getRandomNumber(60,90), w = 40, r = 10,l = 42, PI = Math.PI;
    var PI = Math.PI;
    function draw(ctx,ctxType,x,y,w,r) {
        ctx.beginPath()
        ctx.moveTo(x,y)
        ctx.lineTo(x+w/2,y)
        ctx.arc(x+w/2,y-r+5, r,0,2*PI)
        ctx.lineTo(x+w/2,y)
        ctx.lineTo(x+w,y)
        ctx.lineTo(x+w,y+w/2)
        ctx.arc(x+w+r-5,y+w/2,r,0,2*PI)
        ctx.lineTo(x+w,y+w/2)
        ctx.lineTo(x+w,y+w)
        ctx.lineTo(x,y+w)
        ctx.lineTo(x,y)
        ctx.fillStyle="#fff";
        ctx[ctxType]();
        ctx.beginPath();
        ctx.arc(x,y+w/2, r,1.5*PI,0.5*PI) // 只需要画正方形内的半圆就行，方便背景图片的裁剪
        ctx.globalCompositeOperation = "xor"
        ctx.fill()
        ctx.stroke()
    }
    //判断是否为 数组
    function isArray(o){
        return Object.prototype.toString.call(o)=='[object Array]';
    }
    //随机数
    function getRandomNumber(a,b) {
        return Math.round(Math.random()*(b- a) + a)
    }

    //获取随机图片
    function getRandomImg(imgArr) {
        return imgArr[getRandomNumber(0,imgArr.length-1)]
    }
    //元素设置css
    function setCssLeft($ele,leftX) {
        $ele.css({
            'left':leftX
        })
    }
    //元素设置css
    function setCssWid($ele,wid) {
        $ele.css({
            'width':wid
        })
    }
    //元素归0动画
    function resetAnimate($ele,cssType,wid) {
        $ele.animate({
            cssType:wid
        })
    }
    //判断 是否处于动画状态
    function ifAnimate(ele) {
        if(ele.is(":animated")){
            return true
        }else{
            return false
        }
    }
    //获取元素的left值
    function getEleCssLeft($ele) {
        return parseInt($ele.css('left'));
    }
    
    //判断元素高度宽度为零
    function getEleCssWidth($ele){
    	return parseInt($ele.width());
    }
    function getEleCssHeight($ele){
    	return parseInt($ele.height());
    }
    
    var SlideImageVerify = function (ele,opt) {
        this.$ele = $(ele);
        //默认参数
        this.defaults = {
            initText:'向右滑动完成拼图',
            slideImage:[],
            slideAreaNum:5,
            refreshSlide:true,
            getSucessState:function(){
				
            }
        }
        this.slideCanvas,this.slideFixCanvas,this.slideImage,
        this.settings = $.extend({}, this.defaults, opt);
        this.slideState = false;
        if(getEleCssWidth(this.$ele) == 0){
        	this.$ele.width(300)
        }
        if(getEleCssHeight(this.$ele) == 0){
        	this.$ele.height(190)
        }
        this.$eleWidth = this.$ele.width() || 300;
        this.$eleHeight = (this.$ele.height() - 40) || (190 - 40);
        this.w = 40;
        this.r = 10;
        this.l = 42;
        this.disLf = 0;
        this.touchX = 0 ;
        this.disTouchX = 0;
        this.$slideDragBox,this.$slideDragBtn,this.$slideProgress,this.slideFixCanvas;
        this.slideCan_ctx,this.slideFixCan_ctx;
        this.dragTimerState = false ;//延时计时器 判断
        this.init();
    }
    SlideImageVerify.prototype = {
        constructor: this,
        init:function () {
            this.initDom();
            this.initCanvas();
            this.initMouse();
            this._touchstart();
//          this._touchmove();
            this._touchend();
            this.refreshSlide();
        },
        initDom:function () {
            var refreshObj = '';
            if(this.settings.refreshSlide){
                refreshObj = '<div class="slideref-ico slideRefBtn" title="刷新"></div>'
            }
            var slideDom = $('<div class="slideimage-wrap">' +
                refreshObj +
                '<div class="slide-canbox slideCanbox">' +
                    '<canvas class="slide-can slideCan"><p>你的浏览器不支持Canvas</p></canvas>' +
                    '<canvas class="slide-fixcan slideFixCan"><p>你的浏览器不支持Canvas</p></canvas>' +
                '</div>' +
                '<div class="slide-box slideDragBox">' +
                    '<div class="slide-progress slideProgress"></div>'+
                    '<button type="button" class="slide-btn slideDragBtn"></button>' +
                    '<div class="slide-tips">'+ this.settings.initText +'</div>'+
                '</div>' +
            '</div>');
            this.$ele.append(slideDom);
            this.slideCanvas = this.$ele.find('.slideCan');
            this.slideFixCanvas = this.$ele.find('.slideFixCan');
            this.$slideDragBox = this.$ele.find('.slideDragBox');
            this.$slideDragBtn = this.$ele.find('.slideDragBtn');
            this.$slideProgress = this.$ele.find('.slideProgress');
            this.$slideRefBtn = this.$ele.find('.slideRefBtn') || '';
            this.slideCanvas[0].width = this.$eleWidth ;
            this.slideCanvas[0].height = this.$eleHeight;
            this.slideFixCanvas[0].width =this.$eleWidth;
            this.slideFixCanvas[0].height = this.$eleHeight;
            this.$ele.find('.slideCanbox').css('height',this.$eleHeight);
            this.slideImage = document.createElement('img');
            if(isArray(this.settings.slideImage)){
                this.slideImageSrc = getRandomImg(this.settings.slideImage);
            }else{
                this.slideImageSrc = this.settings.slideImage;
            }
//          this.slideImage.crossOrigin = "Anonymous";
			this.slideImage.setAttribute("data-src",this.slideImageSrc);
        },
        initCanvas:function () {
            this.x = getRandomNumber(60,this.$eleWidth - 60);
            this.y = getRandomNumber(60,this.$eleHeight - 60);
            this.slideCan_ctx = this.slideCanvas[0].getContext('2d');
            this.slideFixCan_ctx = this.slideFixCanvas[0].getContext('2d');
            var _this = this;
            _this.slideImage.src = _this.slideImage.getAttribute('data-src');
        	_this.slideImage.onload = function(){
            	_this.ifOnload = true;
                _this.slideFixCan_ctx.drawImage(_this.slideImage,0, 0, _this.$ele.width() || 300, _this.$ele.height() || 160);
                _this.slideCan_ctx.drawImage(_this.slideImage,0, 0,_this.$eleWidth, _this.$eleHeight);
                var h = _this.y - _this.r * 2 + 2;
                var ImageData = _this.slideCan_ctx.getImageData(_this.x, h,60,60);
                _this.slideCanvas[0].width = 60;
                _this.slideCanvas[0].height = _this.$eleHeight;
                _this.slideCan_ctx.putImageData(ImageData, 0, h);
            }
            draw(_this.slideFixCan_ctx,'fill',_this.x,_this.y,_this.w,_this.r);
            draw(_this.slideCan_ctx,'clip',_this.x,_this.y,_this.w,_this.r);
        },
        setDragActiveCss:function(curX){
            var _this = this;
            _this.disTouchX = curX;
            setCssLeft(_this.$slideDragBtn,curX);
            if(curX >= _this.$ele.width() - 57){
                setCssLeft(_this.slideCanvas,_this.$ele.width() - 57);
            }else{
                setCssLeft(_this.slideCanvas,curX);
            }
            setCssWid(_this.$slideProgress,curX)
        },
        initMouse:function () {
            var _this = this ;
            var ifThisMousedown = false;
            _this.$slideDragBtn.on('mousedown',function (e) {
                if(_this.slideState){
                    return false;
                }
                if(_this.dragTimerState){
                    return false;
                }
                if(ifAnimate(_this.$slideDragBtn)){
                    return false;
                }
                ifThisMousedown = true;
                _this.$slideDragBox.addClass('slide-active-box');
                var positionDiv = $(this).offset();
                var distenceX = e.pageX - positionDiv.left;
                var disPageX = e.pageX;
                $(document).mousemove(function (e) {
                    if(!ifThisMousedown){
                        return false;
                    }
                    var x = e.pageX - disPageX;
                    if(x<0){
                        x=0;
                    }else if(x > _this.$ele.width() - 57){
                        x = _this.$ele.width() - 57;
                    }
                    _this.disLf = x ;
                    _this.$slideDragBtn.css({
                        'left':x,
                    })
                    _this.slideCanvas.css({
                        'left':x,
                    })
                    _this.$slideProgress.css({
                        'width':x,
                    })
                    e.preventDefault();
                })
            });
            $(document).on('mouseup',function(){
                if(!ifThisMousedown){
                    return false;
                }
                ifThisMousedown = false;
                if(_this.slideState){
                    return false;
                }
                // $(document).off('mousemove');
                if((_this.disLf >= _this.x - _this.settings.slideAreaNum) && (_this.disLf < _this.x + _this.settings.slideAreaNum)){
                    _this.slideState = true;
                    _this.$slideDragBox.addClass('slide-success-box');
                    if(_this.settings.getSuccessState){
                        _this.settings.getSuccessState(_this.slideState);
                    }
                    _this.$slideRefBtn.hide();
                }else{
                    _this.$slideDragBox.addClass('slide-fail-box');
                    _this.dragTimerState = true;
                    setTimeout(function () {
                        _this.$slideDragBtn.animate({
                            'left':0,
                        },200)
                        _this.slideCanvas.animate({
                            'left':0,
                        },200)
                        _this.$slideProgress.animate({
                            'width':0,
                        },200)
                        setTimeout(function () {
                            _this.$slideDragBox.removeClass('slide-fail-box slide-active-box');
                            _this.dragTimerState = false;
                        },200)
                    },500)
                }
            });
        },
        _touchstart:function(){
            var _this = this;
            _this.$slideDragBtn.on('touchstart',function(e){
                _this.$slideDragBtn.css('pointer-events','none');
                setTimeout(function(){_this.$slideDragBtn.css('pointer-events','all')},400)
                if(_this.dragTimerState || ifAnimate(_this.$slideDragBtn)){
                    _this.touchX = 0 ;
                    return false;
                }
                if(getEleCssLeft(_this.$slideDragBtn) == 0){
                    _this.touchX = e.originalEvent.targetTouches[0].pageX;
                    _this._touchmove();
                }
            })
        },
        _touchmove:function(){
            var _this = this;
            _this.$slideDragBox.addClass('slide-active-box');
            _this.$slideDragBtn.on('touchmove',function(e){
                e.preventDefault();
                if(_this.dragTimerState || ifAnimate(_this.$slideDragBtn)){
                    return false;
                }else{
                    var curX = e.originalEvent.targetTouches[0].pageX - _this.touchX;
                    if(curX != 0){
                        if(curX < 0){
                            curX = 0;
                            _this.setDragActiveCss(curX);
                        }else if(curX >= _this.$ele.width() - 42){
                            curX = _this.$ele.width() - 42;
                            _this.setDragActiveCss(curX);
                        }else{
                            _this.setDragActiveCss(curX);
                        }
                    }
                }
            })
        },
        _touchend:function(){
            var _this = this;
            _this.$slideDragBtn.on('touchend',function(){
                _this.$slideDragBtn.off('touchmove');
                if((_this.disTouchX >= _this.x - _this.settings.slideAreaNum) && (_this.disTouchX < _this.x + _this.settings.slideAreaNum)){
                    _this.slideState = true;
                    _this.$slideDragBox.addClass('slide-success-box');
                    if(_this.settings.getSuccessState){
                        _this.settings.getSuccessState(_this.slideState);
                    }
                    _this.$slideRefBtn.hide();
                    _this.$slideDragBtn.off('touchmove');
                    return false;
                }else{
                    if(!ifAnimate(_this.$slideDragBtn)){
                        _this.$slideDragBox.addClass('slide-fail-box');
                        _this.dragTimerState = true;
                        setTimeout(function () {
                            _this.resetSlide();
                            _this.dragTimerState = false;
                        },500)
                    }else{
                        return false;
                    }
                }
            })
        },
        resetSlide:function(){
            var _this = this;
            _this.slideState = false;
            _this.disTouchX = 0;
            _this.disLf = 0;
			_this.$slideRefBtn.show();
            _this.$slideDragBtn.animate({
                'left':0,
            },50)
            _this.slideCanvas.animate({
                'left':0,
            },50)
            _this.$slideProgress.animate({
                'width':0,
            },50)
            _this.$slideDragBox.removeClass('slide-fail-box slide-active-box slide-success-box');
        },
        resizeSlide:function () {
            var _this = this;
//          _this.disTouchX = 0;
            _this.resetSlide();
            _this.$slideRefBtn.show();
            _this.slideCan_ctx.clearRect(0,0,_this.$eleWidth,_this.$eleHeight);
            _this.slideFixCan_ctx.clearRect(0,0,_this.$eleWidth,_this.$eleHeight);
            _this.slideFixCanvas[0].width = _this.$ele.width() || 300;
			_this.slideCanvas[0].width = _this.$ele.width() || 300;
            _this.initCanvas();
        },
        refreshSlide:function () {
            var _this = this;
            _this.$slideRefBtn.on('click',function () {
                if(_this.slideState){
                    console.log('验证已经成功，刷新无效');
                }else{
                	if(isArray(_this.settings.slideImage)){
		                _this.slideImageSrc = getRandomImg(_this.settings.slideImage);
		            }else{
		                _this.slideImageSrc = _this.settings.slideImage;
		            }
		            _this.slideImage.src = _this.slideImageSrc;
		            _this.slideImage.setAttribute("data-src",_this.slideImageSrc);
                    _this.resizeSlide();
                }
            })
        }
    }
    var inlineCss = 'html,body{width:100%;height:100%}*{border:0;padding:0;margin:0;box-sizing:border-box}button,input{border:0;outline:0}.slideimage-wrap{position:relative;width:100%;height:100%}.slideimage-wrap .slideref-ico{position:absolute;z-index:2;right:10px;top:10px;width:18px;height:18px;background-repeat:no-repeat;background-position:center center;background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAMCAYAAAC9QufkAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAELSURBVChTdZKxTgJREEUXgomEWFnQGxsa9R+Qwk8wobCzhEhIqChorS2gN7EwFvyCf2Bh6GgstaA1sMu5w2Vxg5zk5s07M5PNbjY5RJqmF6RHHsip9WGyLCszeE+W1BnnL/kic/JOqh7dh+ajlgT1hKPiVqBl3JmvO5BXWhIM3VrnoEv4V7IgdesNiKkXn60K4LvqC+oZx1E0KPSuKzcuQ/5BjqTqb+H6pkbP9wL4E+/m4J7ca1qF/IwNoNYTrt3KwVVo/cQQ38c6lmvkW5ZzZF0A33d/wXFsvQHZIC80SlaB7viOFgV126196N8xcENa1APOj9gC6qHH/ocBvcKY5F+XUn/XuUdMkqwBP3BY37JIuDAAAAAASUVORK5CYII=);cursor:pointer}.slideimage-wrap .slide-box{border:1px solid #e0e0e0;height:40px;position:relative}.slideimage-wrap .slide-btn{width:40px;height:100%;position:absolute;cursor:pointer;top:0;box-shadow:0 0 3px rgba(0,0,0,0.3);background:#fff url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA0AAAAICAYAAAAiJnXPAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAABrSURBVChTYyAEpkyZMru+vp4NyiUOADX9B+JjkydPloIKEQZQTf+Bmp5NnTrVCkWQSPwTiFNJ1gS0MQVsGz6ApOHxpEmTzKDCuMGqVauYQRqAph+YNm2aGFQYPwAqFARq6gcGOQtUCAgYGABM7nNg7ET1XgAAAABJRU5ErkJggg==) no-repeat center center;z-index:2;touch-action:none}.slideimage-wrap .slide-btn:hover{background:#1a91ed url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA0AAAAICAYAAAAiJnXPAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAABhSURBVChTY8AH/v//L/jv378+IM0MFSIMgBrYgRpA4ACQLQoVJgygmv4DNT0GYlMUQWIAUNNPIE4mR1MK2DZ8AKoepOEpEFtChfEDqIZjQCwFFSIMgIpnAfWxQblAwMAAABgErR4O5WqeAAAAAElFTkSuQmCC) no-repeat center center;color:#fff}.slideimage-wrap .slide-canbox{width:100%;position:relative}.slideimage-wrap .slide-can{position:absolute;left:0;top:0}.slideimage-wrap .slide-tips{position:absolute;left:0;top:0;width:100%;color:#333;background-color:#f7f9fa;height:100%;text-align:center;line-height:40px;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.slideimage-wrap .slide-progress{width:0;height:100%;border:1px solid #1a91ed}.slideimage-wrap .slide-active-box .slide-btn{background:#1a91ed url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA0AAAAICAYAAAAiJnXPAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAABhSURBVChTY8AH/v//L/jv378+IM0MFSIMgBrYgRpA4ACQLQoVJgygmv4DNT0GYlMUQWIAUNNPIE4mR1MK2DZ8AKoepOEpEFtChfEDqIZjQCwFFSIMgIpnAfWxQblAwMAAABgErR4O5WqeAAAAAElFTkSuQmCC) no-repeat center center;color:#fff}.slideimage-wrap .slide-active-box .slide-tips{display:none}.slideimage-wrap .slide-fail-box .slide-btn{color:#fff;background:#e01116 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAANCAYAAACdKY9CAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA4RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTM4IDc5LjE1OTgyNCwgMjAxNi8wOS8xNC0wMTowOTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDoyZDBkMjEwYi03MWFiLTU3NGItODgwNi1lYTgyYTliYjVlZTgiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NTgxQzA5MDEyODJCMTFFOEJFNkRBMTlGNjFGNTJEMkEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NTgxQzA5MDAyODJCMTFFOEJFNkRBMTlGNjFGNTJEMkEiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6ODkyMTkyYjUtNzA0ZC04ZDQ3LTkyYjItNjM0YWZkN2JkMzU0IiBzdFJlZjpkb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6ZWQ3YjkyNGQtMWM2OC0xMWU4LWI2NGEtOWM3OWUxYzg2YmNlIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+kzehhwAAAH5JREFUeNqEkgsNgDAMRCsBKUhAyqTgZBKQMimTcKzQhqWf0eSSDt5LxgUCQCPnyCZ7lH2k8M6HhndaIjHchSn8oOIbK80wT9UXkeRgvVImOdgKnAt+6sxY4TBwt0XQ4gPDItI2svZIlpbc2Um0gENJf4sMtlKZ26GfPMwtwABMRRciK/DI3wAAAABJRU5ErkJggg==) no-repeat center center}.slideimage-wrap .slide-fail-box .slide-progress{border:1px solid #e01116}.slideimage-wrap .slide-success-box .slide-btn{color:#fff;background:#7ac23c url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAAPCAYAAAAyPTUwAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA4RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTM4IDc5LjE1OTgyNCwgMjAxNi8wOS8xNC0wMTowOTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpkZWJjZTgzOS05ZDFmLWY1NDgtYTEzMy03MTIzOTVhMjRkMDUiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QUQ5Qzg5MTJEMTE1MTFFOEFEMDRDQTk5MDRFMjk1RTkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QUQ5Qzg5MTFEMTE1MTFFOEFEMDRDQTk5MDRFMjk1RTkiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6ZjU1YmI5ODgtNzE4My0xYTQ0LWFhY2YtMWEyZTJmZWU0NDYzIiBzdFJlZjpkb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6MDQzZWI4NTEtYjYzMy0xMWU4LTk0NDEtOTBhMGZmMDNkOWE0Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+JoVoTwAAAKNJREFUeNpi+P//PwMBnADE+4HYgIEIxSCFIMBASKEAVOF6EJ+JAT9wgNIHQQQhxfZQ+gCYJOCM80D8HsZnAarfj2TSRCDeAGULALEBEh+sGFmCAUkS5t6NcKOQrHwP9bkBlD8fyleAqUFW3ACVnA/l34diBmyKFf4jgAGaRgZskQKz+jyUTsCn2OE/KhDAp5gBydTz6HLYYrARGmML0SUAAgwAtBdtauf3epEAAAAASUVORK5CYII=) no-repeat center center}.slideimage-wrap .slide-success-box .slide-progress{border:1px solid #7ac23c}';
	var styleObj = $(
		'<style type="text/css">'+ inlineCss +'</style>'
	)
	$('head').prepend(styleObj);
    _global = (function(){ return this || (0, eval)('this'); }());
    if (typeof module !== "undefined" && module.exports) {
        module.exports = SlideImageVerify;
    } else if (typeof define === "function" && define.amd) {
        define(function(){return SlideImageVerify;});
    } else {
        !('SlideImageVerify' in _global) && (_global.SlideImageVerify = SlideImageVerify);
    }
}());