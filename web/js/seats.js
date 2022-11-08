const container = document.querySelector('.seatContainer');
const seats = document.querySelectorAll('.seatRow .seat:not(.occupied');
const count = document.getElementById('count');
const total = document.getElementById('total');

populateUI();

let price = 0;
if(localStorage.getItem('seatTypeWanted')== 'economy'){
    price = JSON.parse(localStorage.getItem('selectedBooking')).economy_price;
}
else{
    price = JSON.parse(localStorage.getItem('selectedBooking')).business_price;
}
let ticketPrice = +price;


// update total and count
function updateSelectedCount() {
  const selectedSeats = document.querySelectorAll('.seatRow .seat.selected');

  const seats=[];

  // const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));

  for (let i = 0; i < selectedSeats.length; i++) {
    seats.push(selectedSeats[i].innerHTML);
  }

  localStorage.setItem('selectedSeats', JSON.stringify(seats));

  //copy selected seats into arr
  // map through array
  //return new array of indexes

  const selectedSeatsCount = selectedSeats.length;

  count.innerText = selectedSeatsCount;
  total.innerText = selectedSeatsCount * ticketPrice;
}

// get data from localstorage and populate ui
function populateUI() {
  const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats'));
  if (selectedSeats !== null && selectedSeats.length > 0) {
    seats.forEach((seat, index) => {
      if (selectedSeats.indexOf(index) > -1) {
        seat.classList.add('selected');
      }
    });
  }
}

// Seat click event
container.addEventListener('click', (e) => {
  console.log(e.target.style.backgroundColor)
  if(JSON.parse(localStorage.getItem('retrieveBooking'))[0].seat_types=='economy' && e.target.style.cssText == 'background-color: orange;')
  {
    alert('Your booking is for economy seats, please select economy seats only')
  }
  else if (JSON.parse(localStorage.getItem('retrieveBooking'))[0].seat_types=='business' && e.target.style.backgroundColor == ""){
    alert('Your booking is for business seats, please select business seats only you rich fuck')
  }
  else if(e.target.style.backgroundColor == "red"){
    alert('You cannot select an occupied seat, please choose another seat')
  }
  else{
      if(document.querySelectorAll('.seatRow .seat.selected').length < 1){
        if (e.target.classList.contains('seat') && !e.target.classList.contains('occupied')) {
          if(JSON.parse(localStorage.getItem('retrieveBooking'))[0].seat_types=='business'){
            e.target.style.backgroundColor = 'purple';
          }
          e.target.classList.toggle('selected');
          updateSelectedCount();
        }
      }
      else{
        if (e.target.classList.contains('seat') && e.target.classList.contains('selected')) {
          if(JSON.parse(localStorage.getItem('retrieveBooking'))[0].seat_types=='business'){
            e.target.style.backgroundColor = 'orange';
          }
          e.target.classList.toggle('selected');
          updateSelectedCount();
        }
        else{
          alert('Please select only 1 seat!')
        }
      }
    }
});

// intial count and total
updateSelectedCount();