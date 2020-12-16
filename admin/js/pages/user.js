//------------- chart-chartjs.js -------------//
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
    
    
    
    
    
  

	//------------- Chartjs -------------//

	//generate random number for charts
	randNum = function(){
		//return Math.floor(Math.random()*101);
		return (Math.floor( Math.random()* (1+40-20) ) ) + 20;
	}
	
	

	

	//------------- Bar chart  -------------//
	var barChartDataMonthlySales = {
		labels : ["January","February","March","April","May","June","July"],
		datasets : [
			{
				fillColor : "rgba(186,195,210,.9)",
				strokeColor : "rgba(186,195,210,.9)",
				highlightFill: "rgba(186,195,210,0.9)",
				highlightStroke: "rgba(186,195,210,1)",
				data : [3+randNum(),5+randNum(),8+randNum(),13+randNum(),17+randNum(),21+randNum(),23+randNum()]
			},
			{
				fillColor : " rgba(0, 153, 204,.8)",
				strokeColor : " rgba(0, 153, 204,.8)",
				highlightFill : " rgba(0, 153, 204,.8)",
				highlightStroke : " rgba(0, 153, 204,.8)",
				data : [randNum()-5,randNum()-2,randNum()-4,randNum()-1,randNum()-3,randNum()-2,randNum()-5]
			}
		]
	}
    
    
    var barChartDataWeeklySales = {
		labels : ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],
		datasets : [
			{
				fillColor : "rgba(186,195,210,.9)",
				strokeColor : "rgba(186,195,210,.9)",
				highlightFill: "rgba(186,195,210,0.9)",
				highlightStroke: "rgba(186,195,210,1)",
				data : [4+randNum(),6+randNum(),9+randNum(),14+randNum(),18+randNum(),22+randNum(),24+randNum()]
			},
			{
				fillColor : " rgba(0, 153, 204,.8)",
				strokeColor : " rgba(0, 153, 204,.8)",
				highlightFill : " rgba(0, 153, 204,.8)",
				highlightStroke : " rgba(0, 153, 204,.8)",
				data : [randNum()-4,randNum()-1,randNum()-3,randNum()-1,randNum()-2,randNum()-1,randNum()-4]
			}
		]
	}
    
    var barChartDataYearlySales = {
		labels : ["2011","2012","2013","2014","2015","2016","2017"],
		datasets : [
			{
				fillColor : "rgba(186,195,210,.9)",
				strokeColor : "rgba(186,195,210,.9)",
				highlightFill: "rgba(186,195,210,0.9)",
				highlightStroke: "rgba(186,195,210,1)",
				data : [3+randNum(),5+randNum(),8+randNum(),13+randNum(),17+randNum(),21+randNum(),23+randNum()]
			},
			{
				fillColor : " rgba(0, 153, 204,.8)",
				strokeColor : " rgba(0, 153, 204,.8)",
				highlightFill : " rgba(0, 153, 204,.8)",
				highlightStroke : " rgba(0, 153, 204,.8)",
				data : [randNum()-5,randNum()-2,randNum()-4,randNum()-1,randNum()-3,randNum()-2,randNum()-5]
			}
		]
	}
    
    
    var barChartDataMonthlyProfit = {
		labels : ["January","February","March","April","May","June","July"],
		datasets : [
			
			{
				fillColor : " rgba(0, 153, 204,.8)",
				strokeColor : " rgba(0, 153, 204,.8)",
				highlightFill : " rgba(0, 153, 204,.8)",
				highlightStroke : " rgba(0, 153, 204,.8)",
				data : [randNum()-5,randNum()-2,randNum()-4,randNum()-1,randNum()-3,randNum()-2,randNum()-5]
			}
		]
	}
    
    
    var barChartDataWeeklyProfit = {
		labels : ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],
		datasets : [
			
			{
				fillColor : " rgba(0, 153, 204,.8)",
				strokeColor : " rgba(0, 153, 204,.8)",
				highlightFill : " rgba(0, 153, 204,.8)",
				highlightStroke : " rgba(0, 153, 204,.8)",
				data : [randNum()-4,randNum()-1,randNum()-3,randNum()-1,randNum()-2,randNum()-1,randNum()-4]
			}
		]
	}
    
    var barChartDataYearlyProfit = {
		labels : ["2011","2012","2013","2014","2015","2016","2017"],
		datasets : [
			
			{
				fillColor : " rgba(0, 153, 204,.8)",
				strokeColor : " rgba(0, 153, 204,.8)",
				highlightFill : " rgba(0, 153, 204,.8)",
				highlightStroke : " rgba(0, 153, 204,.8)",
				data : [randNum()-5,randNum()-2,randNum()-4,randNum()-1,randNum()-3,randNum()-2,randNum()-5]
			}
		]
	}
    
    

	var ctxBar = document.getElementById("bar-chartjs-Monthly-Sales").getContext("2d");
	myBar = new Chart(ctxBar).Bar(barChartDataMonthlySales, {
		responsive : true,
		scaleShowGridLines : true,
    	scaleGridLineColor : "#bfbfbf",
    	scaleGridLineWidth : 0.2,
    	//bar options
    	barShowStroke : true,
    	barStrokeWidth : 2,
    	barValueSpacing : 20,
    	barDatasetSpacing : 20,
    	//animations
    	animation: true,
    	animationSteps: 60,
    	animationEasing: "easeOutQuart",
    	//scale
    	showScale: true,
    	scaleFontFamily: "'Roboto'",
    	scaleFontSize: 13,
    	scaleFontStyle: "normal",
    	scaleFontColor: "#333",
    	scaleBeginAtZero : true,
    	//tooltips
    	showTooltips: true,
    	tooltipFillColor: "#344154",
    	tooltipFontFamily: "'Roboto'",
    	tooltipFontSize: 13,
    	tooltipFontColor: "#fff",
    	tooltipYPadding: 8,
    	tooltipXPadding: 10,
    	tooltipCornerRadius: 2,
    	tooltipTitleFontFamily: "'Roboto'",
	});

        
    
                //------------- Remaining Itemss -------------//
    
    
   var customerProgress = new ProgressBar.Circle('#customer-exp', {
	    color: 'rgb(211,47,47)',
	    strokeWidth: 2,
	    fill: 'rgba(211,47,47,.1)',
	    duration: 4000,
	    easing: 'bounce'
	});
	customerProgress.animate(0.9);
    
    
    
    
    
    
    
    
    
    //------------- CounTo for tiles -------------//
	$('.stats-number').countTo({
        speed: 1000,
        refreshInterval: 50
    });
    
    
    
    
    
    //---------------------- GRAPHS MONTHLY WEEKLY YEARLY BUTTONS---------------------------//
    
     
    $("#weekly").click(function(){   
        
        $("#weekly").addClass("mapbuttonactive");
        $("#monthly").removeClass("mapbuttonactive");
        $("#yearly").removeClass("mapbuttonactive");
        
        
        if($("#barchartselect").find(":selected").text() == 'Sales'){
            
            
            document.getElementById("bar-chartjs-Weekly-Sales").style.display = "block";
            document.getElementById("bar-chartjs-Monthly-Sales").style.display = "none";
            document.getElementById("bar-chartjs-Yearly-Sales").style.display = "none";
            document.getElementById("bar-chartjs-Weekly-Profit").style.display = "none";
            document.getElementById("bar-chartjs-Monthly-Profit").style.display = "none";
            document.getElementById("bar-chartjs-Yearly-Profit").style.display = "none";




            var ctxBar = document.getElementById("bar-chartjs-Weekly-Sales").getContext("2d");
            myBar = new Chart(ctxBar).Bar(barChartDataWeeklySales, {
                responsive : true,
                scaleShowGridLines : true,
                scaleGridLineColor : "#bfbfbf",
                scaleGridLineWidth : 0.2,
                //bar options
                barShowStroke : true,
                barStrokeWidth : 2,
                barValueSpacing : 20,
                barDatasetSpacing : 20,
                //animations
                animation: true,
                animationSteps: 60,
                animationEasing: "easeOutQuart",
                //scale
                showScale: true,
                scaleFontFamily: "'Roboto'",
                scaleFontSize: 13,
                scaleFontStyle: "normal",
                scaleFontColor: "#333",
                scaleBeginAtZero : true,
                //tooltips
                showTooltips: true,
                tooltipFillColor: "#344154",
                tooltipFontFamily: "'Roboto'",
                tooltipFontSize: 13,
                tooltipFontColor: "#fff",
                tooltipYPadding: 8,
                tooltipXPadding: 10,
                tooltipCornerRadius: 2,
                tooltipTitleFontFamily: "'Roboto'",

            });
            
        }
        
        
        else if($("#barchartselect").find(":selected").text() == 'Profit'){
            
            
            document.getElementById("bar-chartjs-Weekly-Profit").style.display = "block";
            document.getElementById("bar-chartjs-Monthly-Profit").style.display = "none";
            document.getElementById("bar-chartjs-Yearly-Profit").style.display = "none";
             document.getElementById("bar-chartjs-Weekly-Sales").style.display = "none";
            document.getElementById("bar-chartjs-Monthly-Sales").style.display = "none";
            document.getElementById("bar-chartjs-Yearly-Sales").style.display = "none";




            var ctxBar = document.getElementById("bar-chartjs-Weekly-Profit").getContext("2d");
            myBar = new Chart(ctxBar).Bar(barChartDataWeeklyProfit, {
                responsive : true,
                scaleShowGridLines : true,
                scaleGridLineColor : "#bfbfbf",
                scaleGridLineWidth : 0.2,
                //bar options
                barShowStroke : true,
                barStrokeWidth : 2,
                barValueSpacing : 20,
                barDatasetSpacing : 20,
                //animations
                animation: true,
                animationSteps: 60,
                animationEasing: "easeOutQuart",
                //scale
                showScale: true,
                scaleFontFamily: "'Roboto'",
                scaleFontSize: 13,
                scaleFontStyle: "normal",
                scaleFontColor: "#333",
                scaleBeginAtZero : true,
                //tooltips
                showTooltips: true,
                tooltipFillColor: "#344154",
                tooltipFontFamily: "'Roboto'",
                tooltipFontSize: 13,
                tooltipFontColor: "#fff",
                tooltipYPadding: 8,
                tooltipXPadding: 10,
                tooltipCornerRadius: 2,
                tooltipTitleFontFamily: "'Roboto'",

            });
            
        }
        

        
    });
    
    $("#monthly").click(function(){   
        $("#monthly").addClass("mapbuttonactive");
        $("#weekly").removeClass("mapbuttonactive");
        $("#yearly").removeClass("mapbuttonactive");
        
        
        if($("#barchartselect").find(":selected").text() == 'Sales'){
            
            
            document.getElementById("bar-chartjs-Weekly-Sales").style.display = "none";
            document.getElementById("bar-chartjs-Monthly-Sales").style.display = "block";
            document.getElementById("bar-chartjs-Yearly-Sales").style.display = "none";
            document.getElementById("bar-chartjs-Weekly-Profit").style.display = "none";
            document.getElementById("bar-chartjs-Monthly-Profit").style.display = "none";
            document.getElementById("bar-chartjs-Yearly-Profit").style.display = "none";




            var ctxBar = document.getElementById("bar-chartjs-Monthly-Sales").getContext("2d");
            myBar = new Chart(ctxBar).Bar(barChartDataMonthlySales, {
                responsive : true,
                scaleShowGridLines : true,
                scaleGridLineColor : "#bfbfbf",
                scaleGridLineWidth : 0.2,
                //bar options
                barShowStroke : true,
                barStrokeWidth : 2,
                barValueSpacing : 20,
                barDatasetSpacing : 20,
                //animations
                animation: true,
                animationSteps: 60,
                animationEasing: "easeOutQuart",
                //scale
                showScale: true,
                scaleFontFamily: "'Roboto'",
                scaleFontSize: 13,
                scaleFontStyle: "normal",
                scaleFontColor: "#333",
                scaleBeginAtZero : true,
                //tooltips
                showTooltips: true,
                tooltipFillColor: "#344154",
                tooltipFontFamily: "'Roboto'",
                tooltipFontSize: 13,
                tooltipFontColor: "#fff",
                tooltipYPadding: 8,
                tooltipXPadding: 10,
                tooltipCornerRadius: 2,
                tooltipTitleFontFamily: "'Roboto'",

            });
            
        }
        
        
        else if($("#barchartselect").find(":selected").text() == 'Profit'){
            
            
            document.getElementById("bar-chartjs-Weekly-Profit").style.display = "none";
            document.getElementById("bar-chartjs-Monthly-Profit").style.display = "block";
            document.getElementById("bar-chartjs-Yearly-Profit").style.display = "none";
             document.getElementById("bar-chartjs-Weekly-Sales").style.display = "none";
            document.getElementById("bar-chartjs-Monthly-Sales").style.display = "none";
            document.getElementById("bar-chartjs-Yearly-Sales").style.display = "none";




            var ctxBar = document.getElementById("bar-chartjs-Monthly-Profit").getContext("2d");
            myBar = new Chart(ctxBar).Bar(barChartDataMonthlyProfit, {
                responsive : true,
                scaleShowGridLines : true,
                scaleGridLineColor : "#bfbfbf",
                scaleGridLineWidth : 0.2,
                //bar options
                barShowStroke : true,
                barStrokeWidth : 2,
                barValueSpacing : 20,
                barDatasetSpacing : 20,
                //animations
                animation: true,
                animationSteps: 60,
                animationEasing: "easeOutQuart",
                //scale
                showScale: true,
                scaleFontFamily: "'Roboto'",
                scaleFontSize: 13,
                scaleFontStyle: "normal",
                scaleFontColor: "#333",
                scaleBeginAtZero : true,
                //tooltips
                showTooltips: true,
                tooltipFillColor: "#344154",
                tooltipFontFamily: "'Roboto'",
                tooltipFontSize: 13,
                tooltipFontColor: "#fff",
                tooltipYPadding: 8,
                tooltipXPadding: 10,
                tooltipCornerRadius: 2,
                tooltipTitleFontFamily: "'Roboto'",

            });
            
        }
        
        
    });
    
    $("#yearly").click(function(){   
        $("#yearly").addClass("mapbuttonactive");
        $("#monthly").removeClass("mapbuttonactive");
        $("#weekly").removeClass("mapbuttonactive");
        
        
         if($("#barchartselect").find(":selected").text() == 'Sales'){
            
            
            document.getElementById("bar-chartjs-Weekly-Sales").style.display = "none";
            document.getElementById("bar-chartjs-Monthly-Sales").style.display = "none";
            document.getElementById("bar-chartjs-Yearly-Sales").style.display = "block";
            document.getElementById("bar-chartjs-Weekly-Profit").style.display = "none";
            document.getElementById("bar-chartjs-Monthly-Profit").style.display = "none";
            document.getElementById("bar-chartjs-Yearly-Profit").style.display = "none";




            var ctxBar = document.getElementById("bar-chartjs-Yearly-Sales").getContext("2d");
            myBar = new Chart(ctxBar).Bar(barChartDataYearlySales, {
                responsive : true,
                scaleShowGridLines : true,
                scaleGridLineColor : "#bfbfbf",
                scaleGridLineWidth : 0.2,
                //bar options
                barShowStroke : true,
                barStrokeWidth : 2,
                barValueSpacing : 20,
                barDatasetSpacing : 20,
                //animations
                animation: true,
                animationSteps: 60,
                animationEasing: "easeOutQuart",
                //scale
                showScale: true,
                scaleFontFamily: "'Roboto'",
                scaleFontSize: 13,
                scaleFontStyle: "normal",
                scaleFontColor: "#333",
                scaleBeginAtZero : true,
                //tooltips
                showTooltips: true,
                tooltipFillColor: "#344154",
                tooltipFontFamily: "'Roboto'",
                tooltipFontSize: 13,
                tooltipFontColor: "#fff",
                tooltipYPadding: 8,
                tooltipXPadding: 10,
                tooltipCornerRadius: 2,
                tooltipTitleFontFamily: "'Roboto'",

            });
            
        }
        
        
        else if($("#barchartselect").find(":selected").text() == 'Profit'){
            
            
            document.getElementById("bar-chartjs-Weekly-Profit").style.display = "none";
            document.getElementById("bar-chartjs-Monthly-Profit").style.display = "none";
            document.getElementById("bar-chartjs-Yearly-Profit").style.display = "block";
             document.getElementById("bar-chartjs-Weekly-Sales").style.display = "none";
            document.getElementById("bar-chartjs-Monthly-Sales").style.display = "none";
            document.getElementById("bar-chartjs-Yearly-Sales").style.display = "none";




            var ctxBar = document.getElementById("bar-chartjs-Yearly-Profit").getContext("2d");
            myBar = new Chart(ctxBar).Bar(barChartDataYearlyProfit, {
                responsive : true,
                scaleShowGridLines : true,
                scaleGridLineColor : "#bfbfbf",
                scaleGridLineWidth : 0.2,
                //bar options
                barShowStroke : true,
                barStrokeWidth : 2,
                barValueSpacing : 20,
                barDatasetSpacing : 20,
                //animations
                animation: true,
                animationSteps: 60,
                animationEasing: "easeOutQuart",
                //scale
                showScale: true,
                scaleFontFamily: "'Roboto'",
                scaleFontSize: 13,
                scaleFontStyle: "normal",
                scaleFontColor: "#333",
                scaleBeginAtZero : true,
                //tooltips
                showTooltips: true,
                tooltipFillColor: "#344154",
                tooltipFontFamily: "'Roboto'",
                tooltipFontSize: 13,
                tooltipFontColor: "#fff",
                tooltipYPadding: 8,
                tooltipXPadding: 10,
                tooltipCornerRadius: 2,
                tooltipTitleFontFamily: "'Roboto'",

            });
            
        }
        
        
        
    });
    
    
    
    
    $("#barchartselect").change(function(){
        
        $("#monthly").addClass("mapbuttonactive");
        $("#weekly").removeClass("mapbuttonactive");
        $("#yearly").removeClass("mapbuttonactive");
        
        
        if($("#barchartselect").find(":selected").text() == 'Sales'){
            
            
            document.getElementById("bar-chartjs-Weekly-Sales").style.display = "none";
            document.getElementById("bar-chartjs-Monthly-Sales").style.display = "block";
            document.getElementById("bar-chartjs-Yearly-Sales").style.display = "none";
            document.getElementById("bar-chartjs-Weekly-Profit").style.display = "none";
            document.getElementById("bar-chartjs-Monthly-Profit").style.display = "none";
            document.getElementById("bar-chartjs-Yearly-Profit").style.display = "none";




            var ctxBar = document.getElementById("bar-chartjs-Monthly-Sales").getContext("2d");
            myBar = new Chart(ctxBar).Bar(barChartDataMonthlySales, {
                responsive : true,
                scaleShowGridLines : true,
                scaleGridLineColor : "#bfbfbf",
                scaleGridLineWidth : 0.2,
                //bar options
                barShowStroke : true,
                barStrokeWidth : 2,
                barValueSpacing : 20,
                barDatasetSpacing : 20,
                //animations
                animation: true,
                animationSteps: 60,
                animationEasing: "easeOutQuart",
                //scale
                showScale: true,
                scaleFontFamily: "'Roboto'",
                scaleFontSize: 13,
                scaleFontStyle: "normal",
                scaleFontColor: "#333",
                scaleBeginAtZero : true,
                //tooltips
                showTooltips: true,
                tooltipFillColor: "#344154",
                tooltipFontFamily: "'Roboto'",
                tooltipFontSize: 13,
                tooltipFontColor: "#fff",
                tooltipYPadding: 8,
                tooltipXPadding: 10,
                tooltipCornerRadius: 2,
                tooltipTitleFontFamily: "'Roboto'",

            });
            
        }
        
        
        else if($("#barchartselect").find(":selected").text() == 'Profit'){
            
            
            document.getElementById("bar-chartjs-Weekly-Profit").style.display = "none";
            document.getElementById("bar-chartjs-Monthly-Profit").style.display = "block";
            document.getElementById("bar-chartjs-Yearly-Profit").style.display = "none";
             document.getElementById("bar-chartjs-Weekly-Sales").style.display = "none";
            document.getElementById("bar-chartjs-Monthly-Sales").style.display = "none";
            document.getElementById("bar-chartjs-Yearly-Sales").style.display = "none";




            var ctxBar = document.getElementById("bar-chartjs-Monthly-Profit").getContext("2d");
            myBar = new Chart(ctxBar).Bar(barChartDataMonthlyProfit, {
                responsive : true,
                scaleShowGridLines : true,
                scaleGridLineColor : "#bfbfbf",
                scaleGridLineWidth : 0.2,
                //bar options
                barShowStroke : true,
                barStrokeWidth : 2,
                barValueSpacing : 20,
                barDatasetSpacing : 20,
                //animations
                animation: true,
                animationSteps: 60,
                animationEasing: "easeOutQuart",
                //scale
                showScale: true,
                scaleFontFamily: "'Roboto'",
                scaleFontSize: 13,
                scaleFontStyle: "normal",
                scaleFontColor: "#333",
                scaleBeginAtZero : true,
                //tooltips
                showTooltips: true,
                tooltipFillColor: "#344154",
                tooltipFontFamily: "'Roboto'",
                tooltipFontSize: 13,
                tooltipFontColor: "#fff",
                tooltipYPadding: 8,
                tooltipXPadding: 10,
                tooltipCornerRadius: 2,
                tooltipTitleFontFamily: "'Roboto'",

            });
            
        }
        
        
    }); 
    
    
});