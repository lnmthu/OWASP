$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
    $("iframe").on("load", function () {
        if ($("iframe").attr("src") !== "http://localhost:57575") {

            iframe = $(this).contents();
            iframe.find(".address").keypress(function (e) {
                var val = $(this).val();
                if (e.which === 13) {
                    $("iframe").attr("src", val.slice(17));
                }
            });
            iframe.find("#text-code").keydown(function (event) {
                if (event.keyCode === 9) {
                    var v = this.value,
                        s = this.selectionStart,
                        e = this.selectionEnd;
                    this.value = v.substring(0, s) + "\t" + v.substring(e);
                    this.selectionStart = this.selectionEnd = s + 1;
                    return false;
                }
            });
        }

        });
});
