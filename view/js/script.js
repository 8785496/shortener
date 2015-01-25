function showContent() {
    if (httpRequest.readyState === 4) {
      if (httpRequest.status === 200) {
        document.getElementById('result').innerHTML = httpRequest.responseText;
      } else {
        alert('There was a problem with the request.');
      }
    }
}

function makeRequest(url, urlLong) {
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
      httpRequest = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE
      try {
        httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
      } 
      catch (e) {
        try {
          httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
        } 
        catch (e) {}
      }
    }

    if (!httpRequest) {
      alert('Giving up :( Cannot create an XMLHTTP instance');
      return false;
    }
    httpRequest.onreadystatechange = showContent;
    httpRequest.open('POST', url);
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send('url=' + encodeURIComponent(urlLong));
  }