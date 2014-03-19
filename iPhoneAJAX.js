function getHTTPObject(){
    var xmlhttp = false;
    if (window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        try{
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch(e){
            try{
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch(e){
                xmlhttp = false;
            }
        }
    }
    return xmlhttp;
}

function displayFeeds(topic){
  var request = getHTTPObject();
  if(request){
      request.onreadystatechange = function(){
          changeRSS(request);
      };

      request.open("GET",topic,true);
      request.send(null);
  }
}

function changeRSS(request){
    if(request.readyState == 4){
        if(request.status == 200 || request.status == 304){
          document.getElementById("content_inner").innerHTML = request.responseText;
        }
    }
}



