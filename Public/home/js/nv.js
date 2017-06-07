	var FixedBox=function(el){
		this.element=el;//标签对象
		this.BoxY=getXY(this.element).y;
	}
	FixedBox.prototype={
		//js使用原型创建函数，添加css样式
		setCss:function(){
			var windowST=(document.compatMode && document.compatMode!="CSS1Compat")? document.body.scrollTop:document.documentElement.scrollTop||window.pageYOffset;
			var div = document.getElementById('nav-main');
			if(windowST>this.BoxY){
              
				this.element.style.cssText="position:fixed;top:0px;width:100%; z-index:9999;left:0px;padding-bottom:0px;margin:0 auto!important;height:52px!important;line-height:52px!important; opacity:.9; -moz-opacity:.9; filter:alpha(opacity=80);";
				 
                div.className = 'wraphover'; 
			}else{
				this.element.style.cssText="";
				 div.className ='';
			}
		}
	};

	function addEvent(elm, evType, fn, useCapture) {
		if (elm.addEventListener) {
			elm.addEventListener(evType, fn, useCapture);
			return true;
		}else if (elm.attachEvent) {
			var r = elm.attachEvent('on' + evType, fn);
			return r;
		}
		else {
			elm['on' + evType] = fn;
		}
	}

	function getXY(el) {//获取标签的位置（坐标）
        return document.documentElement.getBoundingClientRect && (function() {
            var pos = el.getBoundingClientRect();
            return { x: pos.left + document.documentElement.scrollLeft, y: pos.top + document.documentElement.scrollTop };
        })() || (function() {
            var _x = 0, _y = 0;
            do {
                _x += el.offsetLeft;
                _y += el.offsetTop;
            } while (el = el.offsetParent);
            return { x: _x, y: _y };
        })();
    }

	var divA=new FixedBox(document.getElementById("nav-main"));
   	addEvent(window,"scroll",function(){divA.setCss();});
	
	
	
	
	
	
	