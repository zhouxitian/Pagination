##简单调用例子
```
var page=new RWT.Tool.Pagination("page");
```

##详细调用例子
```
var page=new RWT.Tool.Pagination("page2",{
	getUrl:"page.php?",//分页的链接地址
	pagePara:"page",//传递页数的参数(如：跟URL结合就是：ndex2.html?type=1&page=XXX)
	ajaxload:{used:!0,//used:是否使用ajax加载数据(要么ajax，要么页面跳转)
				id:"content"//使用ajax加载时的容器id
	},
	style:{used:!0,//是否动态生成样式。
		clear:!1,//是否先清空默认样式，不清除，那么如果样式名跟默认样式一样就会覆盖默认样式。剩下的默认样式会保留。清除后默认样式会全部清空，只留重新定义的。
		styleSheet:{".page":"margin:0 auto;text-align:center;margin-top:10px;clear:both;",
		".page a":"display:inline-block;border:1px solid #999;color:#000;padding:0px 10px;margin:3px;height:24px;line-height:24px;",
		".page .jumpPage":"margin:0 0 0 10px;display:inline-block;",
		".page .jumpPage input[type='text']":"border:1px solid #ccc;width:30px;margin:0 5px;height:22px;line-height:22px; text-align:center;",
		".page .jumpPage input[type='button']":"height:24px;line-height:24px;background-color:#ccc;padding:0 3px;cursor:pointer;text-align:center;margin:0 10px;",
		".page .cur":"border:0;color:#f00;cursor:default;",
		".page .off":"border:1px solid #ccc;color:#ccc;cursor:default;",
		".loading":"width:32px;height:32px;background:url(images/loading.gif) no-repeat;margin:0 auto;position:relative;top:50%;margin-top:-16px;"
		}//分页样式
	},
	total:{show:!0,//是否显示总页数
			num:8,//总页数
			styleName:"total"//样式名
	},
	curPage:1,//当前页(如果使用跳转页面的方式那么这里的值就是当前页面的值)
	paging:{show:!0,//是否显示具体的分页(如：1 2 3 4 5)
		pageNum:7//显示的分页数	
	},
	firstPage:{show:!0, //是否显示首页
		styleName:"firstPage"//样式名
	},
	lastPage:{show:!0, //是否显示最后一页
		styleName:"lastPage"//样式名
	},
	prePage:{show:!0, //是否显示上一页
		styleName:"prePage"//样式名
	},
	nextPage:{show:!0, //是否显示下一页
		styleName:"nextPage"//样式名
	},
	jumpPage:{show:!0, //是否显示跳转
		styleName:"jumpPage"//样式名
	},
	callback:function(){//自定义的回调方法，即点击分页，分页内容的读取操作。
		var t=this;
		var obj=RWT.Fun.getId(t.options.ajaxload.id);
		obj.innerHTML='<div class="loading"></div>';
		var data="{"+t.options.pagePara+":"+t.options.curPage+"}";
		var  myajax = new RWT.Fun.ajax({
			type:"GET",
			url:t.options.getUrl,
			data:eval('(' + data + ')'),
			dataType:"text",
			callback:function (data) {
				obj.innerHTML=data;
				var left=-500;
				if(t.options.curPage>t.oldPage){
					left=500;
				}
				$(obj).find(">").css({opacity:0,position:"relative",left:left});
				$(obj).find(">").animate({opacity:1,position:"relative",left:0});
			}
		});
	}
}); 
```