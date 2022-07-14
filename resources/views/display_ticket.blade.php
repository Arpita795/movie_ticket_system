<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Movie Seat Booking</title>
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/style.css">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <style>
      
    </style>
  </head>
  <body>
    
    <div>
      <!-- <img class="main-logo" src="{{ URL::to('/') }}/image/netflix.png"/> -->
    </div>
    <div class="movie-container">
      <label style="font-size: 1em;">Pick a movie:</label>
      <select id="movie">
        <option value="10" data-mid="1">Jurassic Park ($10)</option>
        <option value="12" data-mid="2">Logan ($12)</option>
        <option value="8" data-mid="3">Avengers Infinity War ($8)</option>
      </select>
    </div>

   
    <ul class="showcase">
      <li>
        <div id="seat_available" class="seat"></div>
        <small class="status" style="font-size: 1em;">N/A</small>
      </li>
      <li>
        <div id="seat_selected" class="seat selected_op"></div>
        <small class="status" style="font-size: 1em;">Selected</small>
      </li>
      <li>
        <div id="seat_occupied" class="seat occupied"></div>
        <small class="status" style="font-size: 1em;">Occupied</small>
      </li>
    </ul>
   
  <!-- login popup -->
  <div class="loginPopup">
      <div class="formPopup" id="popupForm">
        <form method="POST" action="{{ action('MovieController@bookTicket') }}" class="formContainer">
          {{csrf_field()}}

          <h2>Please Log in</h2>
          <label for="name">
            <strong>Name</strong>
          </label>
          <input type="text" id="name" placeholder="Your Name" name="name" required>
          <label for="email">
            <strong>E-mail</strong>
          </label>
          <input type="email" id="email" placeholder="Your Email" name="email" required>
          

          <input type="hidden" name="user_id" value="0" id="user_id">
          <input type="hidden" name="movie_id" id="movie_id" >
          <input type="hidden" name="num_of_tickets" id="num_of_tickets">
          <input type="hidden" name="total_amount" id="total_amount">
          <input type="hidden" name="selectd_seats[]" id="selectd_seats">

          <button type="submit" class="btn">Log in</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
      </div>
    </div>
  <!--  -->
    <div class="container">
      <div class="screen"></div>

      <div class="row">
          <div id="seat_A1" class="seat" data-id="A1"></div>
          <div id="seat_A2" class="seat" data-id="A2"></div>
          <div id="seat_A3" class="seat" data-id="A3"></div>
          <div id="seat_A4" class="seat" data-id="A4"></div>
          <div id="seat_A5" class="seat" data-id="A5"></div>
          <div id="seat_A6" class="seat" data-id="A6"></div>
          <div id="seat_A7" class="seat" data-id="A7"></div>
          <div id="seat_A8" class="seat" data-id="A8"></div>
        </div>
        <div class="row">
          <div id="seat_B1" class="seat" data-id="B1"></div>
          <div id="seat_B2" class="seat" data-id="B2"></div>
          <div id="seat_B3" class="seat" data-id="B3"></div>
          <div id="seat_B4" class="seat" data-id="B4"></div>
          <div id="seat_B5" class="seat" data-id="B5"></div>
          <div id="seat_B6" class="seat" data-id="B6"></div>
          <div id="seat_B7" class="seat" data-id="B7"></div>
          <div id="seat_B8" class="seat" data-id="B8"></div>
        </div>
        <div class="row">
          <div id="seat_C1" class="seat" data-id="C1"></div>
          <div id="seat_C2" class="seat" data-id="C2"></div>
          <div id="seat_C3" class="seat" data-id="C3"></div>
          <div id="seat_C4" class="seat" data-id="C4"></div>
          <div id="seat_C5" class="seat" data-id="C5"></div>
          <div id="seat_C6" class="seat" data-id="C6"></div>
          <div id="seat_C7" class="seat" data-id="C7"></div>
          <div id="seat_C8" class="seat" data-id="C8"></div>
        </div>
        <div class="row">
          <div id="seat_D1" class="seat" data-id="D1"></div>
          <div id="seat_D2" class="seat" data-id="D2"></div>
          <div id="seat_D3" class="seat" data-id="D3"></div>
          <div id="seat_D4" class="seat" data-id="D4"></div>
          <div id="seat_D5" class="seat" data-id="D5"></div>
          <div id="seat_D6" class="seat" data-id="D6"></div>
          <div id="seat_D7" class="seat" data-id="D7"></div>
          <div id="seat_D8" class="seat" data-id="D8"></div>
        </div>
        <div class="row">
          <div id="seat_E1" class="seat" data-id="E1"></div>
          <div id="seat_E2" class="seat" data-id="E2"></div>
          <div id="seat_E3" class="seat" data-id="E3"></div>
          <div id="seat_E4" class="seat" data-id="E4"></div>
          <div id="seat_E5" class="seat" data-id="E5"></div>
          <div id="seat_E6" class="seat" data-id="E6"></div>
          <div id="seat_E7" class="seat" data-id="E7"></div>
          <div id="seat_E8" class="seat" data-id="E8"></div>
        </div>
        
        <div class="row">
          <div id="seat_F1" class="seat" data-id="F1"></div>
          <div id="seat_F2" class="seat" data-id="F2"></div>
          <div id="seat_F3" class="seat" data-id="F3"></div>
          <div id="seat_F4" class="seat" data-id="F4"></div>
          <div id="seat_F5" class="seat" data-id="F5"></div>
          <div id="seat_F6" class="seat" data-id="F6"></div>
          <div id="seat_F7" class="seat" data-id="F7"></div>
          <div id="seat_F8" class="seat" data-id="F8"></div>
        </div>
      </div>
    <p class="text" style="font-size: 1em;margin:0px 0px 15px 0px">
      You have selected <span id="count">0</span> seats for a price of $<span
        id="total"
        >0</span
      >
    </p>

     <div class="btn-collection">
         <!-- <input type="button" name="book" id="userForm2" class="btn btn-custom" value="Buy Tickets"> -->
        <button class="btn btn-custom dis" id="userForm2" style="display: none;">
             
                Buy Ticket
             
        </button>
     </div>
      
    <script>
      var SITEURL = '{{URL::to('')}}';
      var arr = [];
      var sarr = [];
      var count=0;
      var total=0;
      var mid=1;
      var seats=document.getElementsByClassName("seat");
      var movie_select = document.querySelector("#movie");
      var user_form = document.querySelector("#userForm2");
      var price= document.getElementById("movie").value;
      var items = document.querySelectorAll('.seat');
      var method = @json($data);
      //document.getElementById("userForm2").hide();
      items.forEach(function(item) {
         sarr.push(item.getAttribute('data-id'));
      });
      
        for(var i=0 ; i<method.length ; ++i) {
          for(var j=0 ; j<sarr.length ; ++j) {
            if(method[i] == sarr[j]) { 
              var d =document.getElementById("seat_"+method[i]);
              d.classList.add("occupied");
            }
          }
        }

      mid = movie_select.options[movie_select.selectedIndex].getAttribute('data-mid');

      

      document.getElementById('movie').addEventListener('change', function(event) {
        price = this.value;
        
        mid = movie_select.options[movie_select.selectedIndex].getAttribute('data-mid');
       
        $.ajax({
                url: SITEURL + "/movie-ticket/"+mid,
                type: "GET",
                dataType: "json",
                success: function (data) {
                  for(var i=0 ; i<data.length ; ++i) {
                   var d= document.getElementById("seat_"+data[i]);
                    d.classList.add("occupied");
                  }
                },
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
        items.forEach(function(item) {
            count=0;
            total=0;
            document.getElementById("count").innerText=count;
            document.getElementById("total").innerText=total;
            arr = [];
            item.classList.remove('selected');
            item.classList.remove('occupied');
        });
      });

      for(var i=0;i<seats.length;i++){
        var item=seats[i];
        
        item.addEventListener("click",(event)=>{
          
          var x=document.getElementById("userForm2");
          x.style.display = "block";
  
         if (!event.target.classList.contains('occupied') && !event.target.classList.contains('selected') ){
          count++;

          
          
          total=count*price;
          event.target.classList.add("selected");
          arr.push(event.target.getAttribute('data-id'));
          mid = movie_select.options[movie_select.selectedIndex].getAttribute('data-mid');
            document.getElementById("count").innerText=count;
            document.getElementById("total").innerText=total;
            //document.getElementById("total_amount").value=total;
            
            /*document.getElementById("num_of_tickets").value=count;
            document.getElementById("movie_id").value=mid;
            document.getElementById("selectd_seats").value=arr;*/

  
          }
          else if(event.target.classList.contains('selected')){
            count--;
            total=count*price;
            document.getElementById("count").innerText=count;
            document.getElementById("total").innerText=total;
            //document.getElementById("total_amount").value=total;
            
            arr.pop(event.target.getAttribute('data-id'))
            event.target.classList.remove("selected");
            if(count == 0)
            {
              var x=document.getElementById("userForm2");
              x.style.display = "none";
            }
          }
           
        })

            /**/
       
      }

      document.getElementById('userForm2').addEventListener('click', function(event) {

                    
            document.getElementById("num_of_tickets").value=count;
            document.getElementById("total_amount").value=total;
            document.getElementById("movie_id").value=mid;
            document.getElementById("selectd_seats").value=arr;
            document.getElementById("popupForm").style.display = "block";
            //document.getElementById('userForm').submit();
          });

        function closeForm()
        {
          document.getElementById("popupForm").style.display = "none"; 
        }
            

    </script>
  </body>
</html>
