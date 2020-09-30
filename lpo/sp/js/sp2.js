//アコーディオン//

document.write(unescape('%3Cstyle type="text/css"%3Ediv.accordion div.mini_m{display: none;}%3C/style%3E'));
  $(function(){
    $("div.accordion div p").click(function(){
		if($(this).closest('div.accordion').hasClass('accordion_on')){
			var is = '01';
			$(this).closest('div.accordion').removeClass('accordion_on');
		}else{
			var is = '02';
			$(this).closest('div.accordion').addClass('accordion_on');
		}
		$(this).find('img').attr('src','http://fukuracia.jp/sp/images/ac_a'+is+'.jpg').closest('div').next().slideToggle("fast");
	});
  });
	
	
	
document.write(unescape('%3Cstyle type="text/css"%3Ediv.accordion2 div.mini_m{display: none;}%3C/style%3E'));
  $(function(){
    $("div.accordion2 div p").click(function(){
		if($(this).closest('div.accordion2').hasClass('accordion_on2')){
			var is = '01';
			$(this).closest('div.accordion2').removeClass('accordion_on2');
		}else{
			var is = '02';
			$(this).closest('div.accordion2').addClass('accordion_on2');
		}
		$(this).find('img').attr('src','http://fukuracia.jp/sp/images/ac_b'+is+'.jpg').closest('div').next().slideToggle("fast");
	});
  });

