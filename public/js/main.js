$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
    $("iframe").on("load", function() {
        iframe = $(this).contents();
        iframe.find(".address").keypress(function(e) {
          var val=$(this).val();
            if (e.which === 13) {
                $("iframe").attr("src",val.slice(17));
            }
        });
        iframe.find("#text-code").keydown(function(e) {
            if (e.key == "Tab") {
                e.preventDefault();
                var start = this.selectionStart;
                var end = this.selectionEnd;

                // set textarea value to: text before caret + tab + text after caret
                this.value =
                    this.value.substring(0, start) +
                    "\t" +
                    this.value.substring(end);

                // put caret at right position again
                this.selectionStart = this.selectionEnd = start + 1;
            }
        });
    });
});
