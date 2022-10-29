
$(document).ready(function(){
    $.ajax({
      url: "http://localhost/hotel3/admin/data.php",
      method: "GET",
      success: function(data) {
        console.log(data);
        var player = [];
        var review = [];
  
        for(var i in data) {
          player.push("Customer " + data[i].id);
          review.push(data[i].rating);
        }
  
        var chartdata = {
          labels: player,
          datasets : [
            {
              label: 'Customer Rating',
              backgroundColor: 'rgba(123, 200, 200, 0.75)',
              borderColor: 'rgba(200, 200, 200, 0.75)',
              hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
              hoverBorderColor: 'rgba(200, 200, 200, 1)',
              data: review
            }
          ]
        };
  
        var ctx = $("#mycanvas");
  
        var barGraph = new Chart(ctx, {
          type: 'bar',
          data: chartdata
        });
      },
      error: function(data) {
        console.log(data);
      }
    });
  });