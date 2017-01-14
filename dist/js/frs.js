$(document).ready(function () {
    $(".animated").inViewport(function (px) {
        var animation = $(this).data('animation');
        if (px && $(window).width() > 700)
        {
            if (!$(this).hasClass(animation)) {
                $(this).addClass(animation);
            }
        } else {
            $(this).removeClass(animation);
        }
    });
    $(document).on('scroll', function () {
        if ($(this).scrollTop() >= 45) {
            $(".nav-head").addClass('fixed-head');
        }
        if ($(this).scrollTop() < 45) {
            $(".nav-head").removeClass('fixed-head');
        }
        ;
    });
});
$(function ($, win) {
    $.fn.inViewport = function (cb) {
        return this.each(function (i, el) {
            function visPx() {
                var elH = $(el).outerHeight(),
                        H = $(win).height(),
                        r = el.getBoundingClientRect(), t = r.top, b = r.bottom;
                return cb.call(el, Math.max(0, t > 0 ? Math.min(elH, H - t) : (b < H ? b : H)));
            }
            visPx();
            $(win).on("resize scroll", visPx);
        });
    };
}(jQuery, window));