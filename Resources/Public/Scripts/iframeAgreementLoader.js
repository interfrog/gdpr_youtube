window.addEventListener("load", function(){
    var loadItem = function (item) {
        var replace = item.getAttribute("data-replace");
        item.parentNode.innerHTML = replace;
    }

    document.querySelectorAll('div[data-flag="iframe"]').forEach(function (frame) {
        frame.addEventListener("click", function (event) {
            if(event.target.tagName != "A"){
                event.preventDefault();
                loadItem(frame);
                return false;
            }
        });
    });
});
