var step = 300;
var scrolling = false;

// Wire up events for the 'scrollUp' link:
$("#left-arrow").bind("click", function(event) {
    event.preventDefault();
    // Animates the scrollTop property by the specified
    // step.
    $("#brand-bar").animate({
        scrollLeft: "-=" + step + "px"
    },200);
}).bind("mouseover", function(event) {
    scrolling = true;
    scrollContent("right");
}).bind("mouseout", function(event) {
    scrolling = false;
});


$("#right-arrow").bind("click", function(event) {
    event.preventDefault();
    $("#brand-bar").animate({
        scrollLeft: "+=" + step + "px"
    });
}).bind("mouseover", function(event) {
    scrolling = true;
    scrollContent("down");
}).bind("mouseout", function(event) {
    scrolling = false;
});

function scrollContent(direction) {
    var amount = (direction === "right" ? "-=1px" : "+=1px");
    $("#brand-bar").animate({
        scrollLeft: amount
    }, 1, function() {
        if (scrolling) {
            scrollContent(direction);
        }
    });
}


$('.brands').hide();

$('#brand-trig').on(
    'click',
    function()
    {
        $('.brands').fadeIn("fast").show();
        $('.products').hide();
    }
);

$('#prod-trig').on(
    'click',
    function()
    {
        $('.products').fadeIn("fast").show();
        $('.brands').hide();
    }
);


$('#prod-trig, #brand-trig').click(function(e) {
    e.preventDefault();
});

