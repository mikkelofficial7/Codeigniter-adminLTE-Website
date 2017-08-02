//lets display the current time
  var d, h, m, s, color;
  function displayTime() {
    d = new Date(); //new data object
    h = d.getHours();
    m = d.getMinutes();
    s = d.getSeconds();
    
    //add zero to the left of the numbers if they are single digits
    if(h <= 9) h = '0'+h;
    if(m <= 9) m = '0'+m;
    if(s <= 9) s = '0'+s;
    
    color = "#"+h+m+s;
    //set background color
    document.body.style.background = color;
    //set time
    var hour, minute, second;
    
    hour = d.getHours();
    minute = d.getMinutes();
    second = d.getSeconds();

    if(hour < 10)
    {
      hour = "0"+hour;
    }
    if(minute < 10)
    {
      minute = "0" + minute;
    }

    if(second < 10)
    { 
      document.getElementById("hex").innerHTML = hour +":"+ minute + ":0" + second;
    }
    else
    {
      document.getElementById("hex").innerHTML = hour +":"+ minute + ":" + second;
    }
    
    //retrigger the function every second
    setTimeout(displayTime, 1000);
  }

  //call the function
  displayTime();