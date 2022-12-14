var pageCounter = 1;
var button = document.getElementById("btn");
var animalContainer =  document.getElementById("animal-info");

button.addEventListener('click', () => {
    var ourRequest = new XMLHttpRequest();
    ourRequest.open('GET', 'https://learnwebcode.github.io/json-example/animals-' + pageCounter + '.json');
    ourRequest.onload = function() {
        // console.log(ourRequest.responseText);
        var ourData = JSON.parse(ourRequest.responseText); // text to json thingy
        // console.log(ourData[0]);
        renderHtml(ourData);
    };
    ourRequest.send();
    pageCounter++;
    if (pageCounter > 3) {
        button.classList.add("hidden");
        animalContainer.insertAdjacentHTML('afterend', "Shown off all data!");
    }
});

function renderHtml(data) {  
    var htmlString = ""

    for(i = 0; i < data.length; i++) {
        htmlString += "<p> - " + data[i].name + " is a " + data[i].species + " that likes to eat ";

        for (ii = 0; ii < data[i].foods.likes.length; ii++) {
            if(ii == 0) {
                htmlString += data[i].foods.likes[ii] ;
            }else {
                htmlString += " and " + data[i].foods.likes[ii] ;
            }
        }

        for (ii = 0; ii < data[i].foods.likes.length; ii++) {
            if(ii == 0) {
                htmlString += data[i].foods.likes[ii] ;
            }else {
                htmlString += " and " + data[i].foods.likes[ii] ;
            }
        }
        
        htmlString += " and dislikes ";

        for (ii = 0; ii < data[i].foods.dislikes.length; ii++) {
            if(ii == 0) {
                htmlString += data[i].foods.dislikes[ii] ;
            }else {
                htmlString += " and " + data[i].foods.dislikes[ii] ;
            }
        }

        for (ii = 0; ii < data[i].foods.dislikes.length; ii++) {
            if(ii == 0) {
                htmlString += data[i].foods.dislikes[ii] ;
            }else {
                htmlString += " and " + data[i].foods.dislikes[ii] ;
            }
        }

        htmlString += ". </P> <hr>";
    }
    animalContainer.insertAdjacentHTML('beforeend', htmlString);
}