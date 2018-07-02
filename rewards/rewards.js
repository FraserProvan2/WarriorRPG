function claim1() {

    // Create the XMLHttpRequest variable.
    var xhr2 = new XMLHttpRequest();
    
    // Specify the CALLBACK function. 
    xhr2.addEventListener("load", response);
    xhr2.open('GET', 'rewards/reward_claim1.php');
    xhr2.send();
    
}

function claim2() {

    // Create the XMLHttpRequest variable.
    var xhr2 = new XMLHttpRequest();
    
    // Specify the CALLBACK function. 
    xhr2.addEventListener("load", response);
    xhr2.open('GET', 'rewards/reward_claim2.php');
    xhr2.send();
    
}

function claim5() {

    // Create the XMLHttpRequest variable.
    var xhr2 = new XMLHttpRequest();
    
    // Specify the CALLBACK function. 
    xhr2.addEventListener("load", response);
    xhr2.open('GET', 'rewards/reward_claim5.php');
    xhr2.send();
    
}

function claim10() {

    // Create the XMLHttpRequest variable.
    var xhr2 = new XMLHttpRequest();
    
    // Specify the CALLBACK function. 
    xhr2.addEventListener("load", response);
    xhr2.open('GET', 'rewards/reward_claim10.php');
    xhr2.send();
    
}
    
// Gets response from sign up and sends back error (To div)
function response(e) {
    document.getElementById('claim-response').innerHTML = e.target.responseText;
}