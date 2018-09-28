let table=null
let $=null 
layui.use(['table','jquery'],function(){
	table = layui.table,
	$ = layui.jquery
})
function ajax_process(res){
	if(res.code===0){

		parent.layer.msg(res.msg)
		var index = parent.layer.getFrameIndex(window.name);

		if(res.opt.close){
			parent.layer.close(index);
		}

		if(res.opt.redirect==='parent'){
			if(res.opt.url===''){
				window.parent.location.reload();
			}else{	
				window.parent.location.href=res.opt.url
			}
		}else if(res.opt.redirect==='current'){
			if(res.opt.url===''){
				window.location.reload();
			}else{	
				window.location.href=res.opt.url
			}
		}
	}else{
		layer.msg(res.msg, {icon: 5});
	}
}

function layer_open(title,url){
	    layer.open({
	      type: 2,
	      title:title,
	      shadeClose: true,
  		  shade: 0.8,
	      maxmin: true, //开启最大化最小化按钮
	      area: ['80%', '80%'],
	      content: url
	    });
}

function cycle_data(url,id){
      let checked_arr = []
      let checked_str = ""
      let check_data=[]
      if(typeof id==='number' ){
      	checked_str = id
      }else{
      	if(typeof id==='object'){
      		checked_arr = id
      	}else{
      		  let checkStatus = table.checkStatus('checkData')
		     check_data =  checkStatus.data;
		     check_data.forEach(function(value){
			  	checked_arr.push(value['id'])
			})
      	}
		if(checked_arr.length<=0){
		    layer.msg("请先选择要操作的选项")
	    	return false
	    }else{
		   	checked_str = checked_arr.join(',')
		}
    }
    $.post(url,{'checked_str':checked_str},function(res){
	  	ajax_process(res)
	})
}
