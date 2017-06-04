$(document).ready(function() {
    var characterImgHeight = $('.analytic-content-img-container .img-character').outerHeight();
    $('.analytic-content-img-container .img-logo').css('line-height', characterImgHeight);
    $('.analytic-content-img-container .img-logo').css('vertical-align', 'top');
    $('.analytic-content-img-container .img-logo').css('padding-top', '25px');
    $('.analytic-content-img-container .img-logo').css('width', '150px');
    
    $('.menu-analytic').click(function () {
        moveAnalytic();
    });
    $('.menu-platform').click(function () {
        movePlatform();
    });
    $('.menu-agency').click(function () {
        moveAgency();
    });
    
    var url      = window.location.href;     // Returns full URL
    var categoryArr = url.split('#');
    if (categoryArr.length > 1) {
        var category = categoryArr[1];

        if (category == "analytic") {
            moveAnalytic();
        } else if (category == "platform") {
            movePlatform();
        } else if (category == "agency") {
            moveAgency();
        }
    }

    function moveAnalytic() {
        moveAnchor($('.aw-service-analytic').offset().top - 80);
    }
    function movePlatform() {
        moveAnchor($('.aw-service-platform').offset().top - 80);
    }
    function moveAgency() {
        moveAnchor($('#aw-service-agency').position().top -80);
    }
    function moveAnchor(position) {
        $("body").animate({ scrollTop: position}, 600);
    }
});

