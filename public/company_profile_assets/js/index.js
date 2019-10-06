/* appear my comment*/

function appearance(){
			document.getElementById("mycomment").style.display="block";
			document.getElementById("first").style.display="block";
			
			};
			
			
/*appear others comment*/	

function appear_others(){
		document.getElementById("comments").style.display="block";
	}		

/* shrouk js*/
new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
      labels: ["60% recommended"],
      datasets: [
        {
          label: "recommended",
          backgroundColor: [ "#3598db","#dcdddf"],
          data: [2478,5267]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: ''
      }
    }
});
