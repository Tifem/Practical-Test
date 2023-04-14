function getChartColorsArray(t){if(null!==document.getElementById(t)){var t=document.getElementById(t).getAttribute("data-colors");return(t=JSON.parse(t)).map(function(t){var e=t.replace(" ","");if(-1===e.indexOf(",")){var o=getComputedStyle(document.documentElement).getPropertyValue(e);return o||e}t=t.split(",");return 2!=t.length?e:"rgba("+getComputedStyle(document.documentElement).getPropertyValue(t[0])+","+t[1]+")"})}}var vectorMapWorldLineColors=getChartColorsArray("users-by-country"),worldlinemap=new jsVectorMap({map:"world_merc",selector:"#users-by-country",zoomOnScroll:!0,zoomButtons:!0,markers:[{name:"Greenland",coords:[72,-42]},{name:"Canada",coords:[56.1304,-106.3468]},{name:"Brazil",coords:[-14.235,-51.9253]},{name:"Egypt",coords:[26.8206,30.8025]},{name:"Russia",coords:[61,105]},{name:"China",coords:[35.8617,104.1954]},{name:"United States",coords:[37.0902,-95.7129]},{name:"Norway",coords:[60.472024,8.468946]},{name:"Ukraine",coords:[48.379433,31.16558]}],lines:[{from:"Canada",to:"Egypt"},{from:"Russia",to:"Egypt"},{from:"Greenland",to:"Egypt"},{from:"Brazil",to:"Egypt"},{from:"United States",to:"Egypt"},{from:"China",to:"Egypt"},{from:"Norway",to:"Egypt"},{from:"Ukraine",to:"Egypt"}],regionStyle:{initial:{stroke:"#9599ad",strokeWidth:.25,fill:vectorMapWorldLineColors,fillOpacity:1}},lineStyle:{animation:!0,strokeDasharray:"6 3 6"}}),barchartCountriesColors=getChartColorsArray("countries_charts"),options={series:[{data:[1010,1640,490,1255,1050,689,800,420,1085,589],name:"Sessions"}],chart:{type:"bar",height:436,toolbar:{show:!1}},plotOptions:{bar:{borderRadius:4,horizontal:!0,distributed:!0,dataLabels:{position:"top"}}},colors:barchartCountriesColors,dataLabels:{enabled:!0,offsetX:32,style:{fontSize:"12px",fontWeight:400,colors:["#adb5bd"]}},legend:{show:!1},grid:{show:!1},xaxis:{categories:["India","United States","China","Indonesia","Russia","Bangladesh","Canada","Brazil","Vietnam","UK"]}},chart=new ApexCharts(document.querySelector("#countries_charts"),options);chart.render();var chartAudienceColumnChartsColors=getChartColorsArray("audiences_metrics_charts"),columnoptions={series:[{name:"Last Year",data:[25.3,12.5,20.2,18.5,40.4,25.4,15.8,22.3,19.2,25.3,12.5,20.2]},{name:"Current Year",data:[36.2,22.4,38.2,30.5,26.4,30.4,20.2,29.6,10.9,36.2,22.4,38.2]}],chart:{type:"bar",height:306,stacked:!0,toolbar:{show:!1}},plotOptions:{bar:{horizontal:!1,columnWidth:"30%",borderRadius:6}},dataLabels:{enabled:!1},legend:{show:!0,position:"bottom",horizontalAlign:"center",fontWeight:400,fontSize:"8px",offsetX:0,offsetY:0,markers:{width:9,height:9,radius:4}},stroke:{show:!0,width:2,colors:["transparent"]},grid:{show:!1},colors:chartAudienceColumnChartsColors,xaxis:{categories:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],axisTicks:{show:!1},axisBorder:{show:!0,strokeDashArray:1,height:1,width:"100%",offsetX:0,offsetY:0}},yaxis:{show:!1},fill:{opacity:1}};(chart=new ApexCharts(document.querySelector("#audiences_metrics_charts"),columnoptions)).render();var vectorMapUsaColors=getChartColorsArray("sales-by-locations"),usmap=new jsVectorMap({map:"us_merc_en",selector:"#sales-by-locations",regionStyle:{initial:{stroke:"#9599ad",strokeWidth:.25,fill:vectorMapUsaColors,fillOpacity:1}},zoomOnScroll:!1,zoomButtons:!1}),donutchartportfolioColors=getChartColorsArray("portfolio_donut_charts"),options={series:[19405,40552,15824,30635],labels:["Bitcoin","Ethereum","Litecoin","Dash"],chart:{type:"donut",height:210},plotOptions:{pie:{size:100,offsetX:0,offsetY:0,donut:{size:"70%",labels:{show:!0,name:{show:!0,fontSize:"18px",offsetY:-5},value:{show:!0,fontSize:"20px",color:"#343a40",fontWeight:500,offsetY:5,formatter:function(t){return"$"+t}},total:{show:!0,fontSize:"13px",label:"Total value",color:"#9599ad",fontWeight:500,formatter:function(t){return"$"+t.globals.seriesTotals.reduce(function(t,e){return t+e},0)}}}}}},dataLabels:{enabled:!1},legend:{show:!1},yaxis:{labels:{formatter:function(t){return"$"+t}}},stroke:{lineCap:"round",width:2},colors:donutchartportfolioColors};function generateData(t,e){for(var o=0,a=[];o<t;){var r="w"+(o+1).toString(),n=Math.floor(Math.random()*(e.max-e.min+1))+e.min;a.push({x:r,y:n}),o++}return a}(chart=new ApexCharts(document.querySelector("#portfolio_donut_charts"),options)).render();var chartHeatMapColors=getChartColorsArray("color_heatmap"),options={series:[{name:"Jan",data:generateData(20,{min:-30,max:55})},{name:"Feb",data:generateData(20,{min:-30,max:55})},{name:"Mar",data:generateData(20,{min:-30,max:55})},{name:"Apr",data:generateData(20,{min:-30,max:55})},{name:"May",data:generateData(20,{min:-30,max:55})},{name:"Jun",data:generateData(20,{min:-30,max:55})},{name:"Jul",data:generateData(20,{min:-30,max:55})},{name:"Aug",data:generateData(20,{min:-30,max:55})},{name:"Sep",data:generateData(20,{min:-30,max:55})}],chart:{height:310,type:"heatmap",toolbar:{show:!1}},legend:{show:!1},plotOptions:{heatmap:{shadeIntensity:.5,radius:0,useFillColorAsStroke:!0,colorScale:{ranges:[{from:-30,to:5,name:"Youtube",color:chartHeatMapColors[0]},{from:6,to:20,name:"Meta",color:chartHeatMapColors[1]},{from:21,to:45,name:"Google",color:chartHeatMapColors[2]},{from:46,to:55,name:"Medium",color:chartHeatMapColors[3]},{from:36,to:40,name:"Other",color:chartHeatMapColors[4]}]}}},dataLabels:{enabled:!1},stroke:{width:1},title:{style:{fontWeight:500}}};(chart=new ApexCharts(document.querySelector("#color_heatmap"),options)).render();