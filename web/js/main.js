/**
 * Created by Zhetchko V on 11/13/2016.
 */
$(function () {
    function cwRating(id){
        $.ajax({
            type:'POST',
            url:'?r=site/like',
            data:'id='+id,
            success:function(msg){
                if(msg == 'err'){
                    alert('Some problem occured, please try again.');
                }else{
                    $('#'+id + ' ' + '.badge').html(msg);
                }
            }
        });
    }

    $('[data-toggle="tooltip"]').tooltip()


    var tl = new TimelineMax({delay:0.5});

    var jumbotron_h1 = $('.jumbotron h1'),
        list_group_li = $('.list-group li'),
        well = $('.body-content > .well'),
        nav = $('nav'),
        footer = $('.footer');

    tl
        .from(nav, 0.5, {autoAlpha: 0})
        .from(jumbotron_h1, 1, {css: { transform : "translate(-340px, 555px) skew(225deg, 58deg) rotateY(960deg)", opacity: 0, fontSize: 4+'px' }, force3D:true })
        .set(well,{position: 'relative'})
        .from(well, 0.5, {autoAlpha: 0, bottom: 50},"+=1")
        //.to(well, 0.5, {autoAlpha: 0},"+=5")
        //.set(well, {display: 'none'})
        .staggerFrom(list_group_li, 0.5, {display: 'none', bottom: 10, opacity:0, delay:0.2, ease:Power2.easeOut, force3D:true}, 1 , "+=1")
        .from(footer, 0.5, {autoAlpha: 0, bottom: 20});

    // Custom hover effect;
    list_group_li.hover(
        function(){
            $(this).css('color', '#b74d4f');
        },
        function(){
            $(this).css('color', 'inherit');
        })
});






