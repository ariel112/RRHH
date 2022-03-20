$(document).ready(function() {

	// Bar Chart
	
	Morris.Bar({
		element: 'bar-charts',
		data: [
			{ y: '2006', a: 95, b: 70 },
			{ y: '2007', a: 75,  b: 65 },
			{ y: '2008', a: 50,  b: 40 },
			{ y: '2009', a: 75,  b: 65 },
			{ y: '2010', a: 50,  b: 40 },
			{ y: '2011', a: 75,  b: 65 },
			{ y: '2012', a: 100, b: 90 }
		],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Total Income', 'Total Outcome'],
		lineColors: ['#ff9b44','#fc6075'],
		lineWidth: '3px',
		barColors: ['#ff9b44','#fc6075'],
		resize: true,
		redraw: true
	});
	Morris.Bar({
		element: 'Barra-prueba',
		data:	[
				{y:'Enero', a: 175, b:25},
				{y:'Febr', a: 65}, 
		 		{y:'Marzo', a: 45}, 
				{y:'Abril', a: 95}, 
		 		{y:'Mayo', a: 85}
			],
		xkey: 'y',
		ykeys: ['a','b'],
		labels: ['Total Buenos', 'Total Malos'],
		barColors: ['#3595FB', '7CB6F4'],
		resize: true
		
	});
	
	// Line Chart
	
	Morris.Line({
		element: 'line-charts',
		data: [
			{ y: '2006', a: 50, b: 90 },
			{ y: '2007', a: 75,  b: 65 },
			{ y: '2008', a: 50,  b: 40 },
			{ y: '2009', a: 75,  b: 65 },
			{ y: '2010', a: 50,  b: 40 },
			{ y: '2011', a: 75,  b: 65 },
			{ y: '2012', a: 100, b: 50 }
		],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Total Sales', 'Total Revenue'],
		lineColors: ['#ff9b44','#fc6075'],
		lineWidth: '3px',
		resize: true,
		redraw: true
	});

	
	
	
});