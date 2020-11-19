const monthNames = ["Jan", "Feb", "Mar", 
                    "Apr", "May", "June", "July", 
                    "Aug", "Sept", "Oct", 
                    "Nov", "Dec"];
                                                    
n =  new Date();
y = n.getFullYear();
m = monthNames[n.getMonth()];
d = n.getDate();
document.getElementById("date").innerHTML = m + " " + d;