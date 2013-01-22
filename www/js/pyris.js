var Pyris = function(contentUri, postData) {
    var request = new XMLHttpRequest()
    request.addEventListener("load", function(){}, false)
    request.open('POST', '/jsapi/' + contentUri, true)
    request.send()
}
