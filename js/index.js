const countdown = document.querySelector('.countdown');
const today_date = document.querySelector('.today_date');
const greeting = document.querySelector('.greeting');

greeting.style.color = '#17a2b8';
today_date.style.color = '#17a2b8';

//intv to update every second Update every second
const intvl = setInterval(() => {
    const time_now = new Date();
    const time_date = time_now.toDateString();
    const time_hours = time_now.getHours();
    const time_mins = time_now.getMinutes();
    const time_secs = time_now.getSeconds();
    var time_greet = '';

    if (time_hours == 1 && time_hours < 6) {
        time_greet = "How is the night going";
    }
    if (time_hours == 6 || time_hours < 12) {
        time_greet = "Good Morning";
    }
    else if (time_hours == 12 || time_hours < 17) {
        time_greet = "Good Afternoon";
    }
    else if (time_hours == 17 || time_hours < 20) {
        time_greet = "Good Evening";
    }
    else if (time_hours == 20 || time_hours < 24) {
        time_greet = "Good Night";
    }


    //Display Results
    greeting.innerHTML = `
    <div><h1>${time_greet} </h1></div>
    `;
    greeting.style.color = '#ffffff';


    //Display Results
    today_date.innerHTML = `
    <div><h1>${time_date}</h1></div>
    `;
    today_date.style.color = '#ffffff';
    today_date.style.fontFamily = 'ALGERIAN';

    countdown.innerHTML = `
    <div>${time_hours}<span>hours</span></div>
    <div>${time_mins}<span>mins</span></div>
    <div>${time_secs}<span>secs</span></div>
    
    `;
    countdown.style.color = '#ffffff';


}, 1000);

