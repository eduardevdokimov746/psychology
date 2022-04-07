function showAffirmation(msg){
    let msgHtml = $('#affirmation-msg');
    let msgWidth = msgHtml.width();
    msgHtml.html(msg);

    msgHtml.css({
        'left': 'calc(50% - ' + msgWidth + 'px / 2)'
    });

    $('.affirmation-btn').animate({
        opacity: "hide"
      }, 800);

    msgHtml.animate({
        height: "show"
      }, 1000);
}
