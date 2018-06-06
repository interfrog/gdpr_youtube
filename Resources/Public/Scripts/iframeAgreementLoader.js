$(function() {
    var loadItem = function (item) {
        let replace;
        replace = $(item).attr("data-replace");
        $(item).after(replace);
        $(item).remove();
    }

    $('div[data-flag="iframe"]').each(function () {
        let self = $(this);
        self.on("click", function (event) {
            if(event.target.tagName != "A"){
                event.preventDefault();
                loadItem(self);
                return false;
            }
        });
    });
});
