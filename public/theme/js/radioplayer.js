// radio player

var audioPlayer = document.getElementById('audio_player');
function playPause(){
    if(audioPlayer.paused){
        audioPlayer.play();
        $('.player-buttons .play-pause .play').removeClass('play').addClass('pause');
    }else{
        audioPlayer.pause();
        $('.player-buttons .play-pause .pause').removeClass('pause').addClass('play');
    }
}



//radio player volume
$(function() {
    audioPlayer.volume = 37 / 100;

    $( "#volume" ).slider({
        range: "min",
        value: 37,
        min: 1,
        max: 100,
        slide: function( event, ui ) {
            audioPlayer.volume = ui.value / 100;
            $("#volume_value").val(ui.value);
            tuneIcons(ui.value);
        }
    });

    $("#sound_icon").click(function(e){
        audioPlayer.muted = !audioPlayer.muted;
        if(audioPlayer.muted){
            $("#sound_icon span").removeClass('tune2');
            $("#sound_icon span").removeClass('tune3');
            $("#sound_icon span").addClass('mute');
        }else{
            tuneIcons($("#volume_value").val());
        }
        e.preventDefault();
    });
});

function tuneIcons(val){
    if(val > 50){
        $("#sound_icon span").addClass('tune3');
        $("#sound_icon span").removeClass('tune2');
        $("#sound_icon span").removeClass('mute');
    }
    if(val <= 50){
        $("#sound_icon span").removeClass('tune2');
        $("#sound_icon span").removeClass('tune3');
        $("#sound_icon span").removeClass('mute');
    }
    if(val <= 5){
        $("#sound_icon span").addClass('tune2');
        $("#sound_icon span").removeClass('tune3');
        $("#sound_icon span").removeClass('mute');
    }
}


function setRadio(stream,id){
    var radioID = document.getElementById(id);
    radioID.getElementsByTagName('source')[0].setAttribute('src',stream);
    radioID.load();
    if(radioID.paused){
        radioID.play();
        $('.player-buttons .play-pause .play').removeClass('play').addClass('pause');
    }else{
        radioID.pause();
        $('.player-buttons .play-pause .pause').removeClass('pause').addClass('play');
    }
}