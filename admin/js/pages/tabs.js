//------------- tabs.js -------------//
$(document).ready(function() {

	//------------- Sparklines in header stats -------------//
	$('#spark-visitors').sparkline([5,8,10,8,7,12,11,6,13,8,5,8,10,11,7,12,11,6,13,8], {
		type: 'bar',
		width: '100%',
		height: '20px',
		barColor: '#dfe2e7',
		zeroAxis: false,
	});

	$('#spark-templateviews').sparkline([12,11,6,13,8,5,8,10,12,11,6,13,8,5,8,10,12,11,6,13,8,5,8], {
		type: 'bar',
		width: '100%',
		height: '20px',
		barColor: '#dfe2e7',
		zeroAxis: false,
	});

	$('#spark-sales').sparkline([19,18,20,17,20,18,22,24,23,19,18,20,17,20,18,22,24,23,19,18,20,17], {
		type: 'bar',
		width: '100%',
		height: '20px',
		barColor: '#dfe2e7',
		zeroAxis: false,
	});

	//------------- Activate tabs -------------//
	$('#myTab a:first').tab('show'); // Select first tab
	$('#myTab2 a:first').tab('show'); // Select first tab
	$('#myTab3 a:first').tab('show'); // Select first tab
	$('#myTab4 a:first').tab('show'); // Select first tab
	$('#myTab5 a:first').tab('show'); // Select first tab
	$('#myTab6 a:first').tab('show'); // Select first tab
	$('#myTab7 a:first').tab('show'); // Select first tab
	$('#myTab8 a:first').tab('show'); // Select first tab
	$('#myTab9 a:first').tab('show'); // Select first tab

	//------------- Tab drop -------------//
	function tabdrop() {
		$('.tabdrop').tabdrop({
			text: '<i class="fa fa-align-justify"></i>'
		}).on("click", function(){
		    $(this).tabdrop('layout');
		});
	}
	$(window).on("load", function(){
	   tabdrop();
	});
	$(window).resize(tabdrop);
    

    
    
    //PROFILE AND AUTOMATION EXISTING 
    
    $("#togbtn").click(function(){
    
        if($("#automation1").attr('value') == 'on'){
            $("#profile1").css("display", "none");
            $("#automation1").attr('value','off');
        }
        else if($("#automation1").attr('value') == 'off'){
            $("#profile1").css("display", "block");
            $("#automation1").attr('value','on');
        }
            
    });
    
    
    $("#supselect1").change(function(){
    
       
        if($("#supselect1").find(":selected").text() == 'Amazon'){
            $('#supselectdiv1').removeClass('col-sm-10').removeClass('col-sm-4').addClass('col-sm-6');
            $("#supamazon1").css("display", "block");
            $("#supwalmart1").css("display", "none");
        }
        else if($("#supselect1").find(":selected").text() == 'Walmart'){
            $('#supselectdiv1').removeClass('col-sm-10').addClass('col-sm-4');
            $("#supwalmart1").css("display", "block");
            $("#supamazon1").css("display", "none");

        }
        else{
            $('#supselectdiv1').removeClass('col-sm-6').removeClass('col-sm-4').addClass('col-sm-10');
            $("#supwalmart1").css("display", "none");
            $("#supamazon1").css("display", "none");
        }
            
    });
    
    
    
    
    //ADD AUTOMATION STUFF
    
    
     $("#togbtnadd").click(function(){
    
        if($("#automationadd").attr('value') == 'on'){
            $("#profileadd").css("display", "none");
            $("#automationadd").attr('value','off');
        }
        else if($("#automationadd").attr('value') == 'off'){
            $("#profileadd").css("display", "block");
            $("#automationadd").attr('value','on');
        }
            
    });
    
    
    $("#supselectadd").change(function(){
    
       
        if($("#supselectadd").find(":selected").text() == 'Amazon'){
            $('#supselectdivadd').removeClass('col-sm-10').removeClass('col-sm-4').addClass('col-sm-6');
            $("#supamazonadd").css("display", "block");
            $("#supwalmartadd").css("display", "none");
        }
        else if($("#supselectadd").find(":selected").text() == 'Walmart'){
            $('#supselectdivadd').removeClass('col-sm-10').addClass('col-sm-4');
            $("#supwalmartadd").css("display", "block");
            $("#supamazonadd").css("display", "none");

        }
        else{
            $('#supselectdivadd').removeClass('col-sm-6').removeClass('col-sm-4').addClass('col-sm-10');
            $("#supwalmartadd").css("display", "none");
            $("#supamazonadd").css("display", "none");
        }
            
    });
    
    
	
});