$(document).ready(function() {
    // video size
    var videoContainerWidth = $('.aw-aboutus-video-vimeo').width();
    $('.aw-aboutus-video-vimeo iframe').height(videoContainerWidth * 340 / 640 + 25);

    // content
    $('.aw-aboutus-content-vision-bg')
        .height($('.aw-aboutus-content-vision-content').outerHeight());
    $('.aw-aboutus-content-philosophy-bg')
        .height($('.aw-aboutus-content-philosophy-content').outerHeight());
    $('.aw-aboutus-content-slogan-bg')
        .height($('.aw-aboutus-content-slogan-content').outerHeight());

    $('.business-item-analytic').hover(
        function () {
            var img = $($(this).find('img')[0])
            img.attr('src', "/ADWAYS/static/img/service/ic_analytic_black.png");
        },
        function () {
            var img = $($(this).find('img')[0])
            img.attr('src', "/ADWAYS/static/img/service/ic_analytic_white.png");
        }
    );
    $('.business-item-platform').hover(
        function () {
            var img = $($(this).find('img')[0])
            img.attr('src', "/ADWAYS/static/img/service/ic_platform_black.png");
        },
        function () {
            var img = $($(this).find('img')[0])
            img.attr('src', "/ADWAYS/static/img/service/ic_platform_white.png");
        }
    );
    $('.business-item-agency').hover(
        function () {
            var img = $($(this).find('img')[0])
            img.attr('src', "/ADWAYS/static/img/service/ic_agency_black.png");
        },
        function () {
            var img = $($(this).find('img')[0])
            img.attr('src', "/ADWAYS/static/img/service/ic_agency_white.png");
        }
    );
});

// timer count
(function ($) {
    $.fn.countTo = function (options) {
        options = options || {};

        return $(this).each(function () {
            // set options for current element
            var settings = $.extend({}, $.fn.countTo.defaults, {
                from:            $(this).data('from'),
                to:              $(this).data('to'),
                speed:           $(this).data('speed'),
                refreshInterval: $(this).data('refresh-interval'),
                decimals:        $(this).data('decimals')
            }, options);

            // how many times to update the value, and how much to increment the value on each update
            var loops = Math.ceil(settings.speed / settings.refreshInterval),
                increment = (settings.to - settings.from) / loops;

            // references & variables that will change with each update
            var self = this,
                $self = $(this),
                loopCount = 0,
                value = settings.from,
                data = $self.data('countTo') || {};

            $self.data('countTo', data);

            // if an existing interval can be found, clear it first
            if (data.interval) {
                clearInterval(data.interval);
            }
            data.interval = setInterval(updateTimer, settings.refreshInterval);

            // initialize the element with the starting value
            render(value);

            function updateTimer() {
                value += increment;
                loopCount++;

                render(value);

                if (typeof(settings.onUpdate) == 'function') {
                    settings.onUpdate.call(self, value);
                }

                if (loopCount >= loops) {
                    // remove the interval
                    $self.removeData('countTo');
                    clearInterval(data.interval);
                    value = settings.to;

                    if (typeof(settings.onComplete) == 'function') {
                        settings.onComplete.call(self, value);
                    }
                }
            }

            function render(value) {
                var formattedValue = settings.formatter.call(self, value, settings);
                $self.html(formattedValue);
            }
        });
    };

    $.fn.countTo.defaults = {
        from: 0,               // the number the element should start at
        to: 0,                 // the number the element should end at
        speed: 1000,           // how long it should take to count between the target numbers
        refreshInterval: 100,  // how often the element should be updated
        decimals: 0,           // the number of decimal places to show
        formatter: formatter,  // handler for formatting the value before rendering
        onUpdate: null,        // callback method for every time the element is updated
        onComplete: null       // callback method for when the element finishes updating
    };

    function formatter(value, settings) {
        return value.toFixed(settings.decimals);
    }
}(jQuery));
jQuery(function ($) {
    // custom formatting example
    $('.content-item-num').data('countToOptions', {
        formatter: function (value, options) {
            //return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            return value.toFixed(options.decimals);
        }
    });

    $('.content-item-num-plus').data('countToOptions', {
        formatter: function (value, options) {
            //return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            return parseInt(value.toFixed(options.decimals)) + "<i>+</i>";
        }
    });

    // start all the timers
    $('.timer').each(count);

    function count(options) {
        var $this = $(this);
        options = $.extend({}, options || {}, $this.data('countToOptions') || {});
        $this.countTo(options);
    }
});
