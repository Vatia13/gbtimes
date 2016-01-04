<div class="radio-player">
    <div class="radio-player-space">
        <div class="player-buttons">
            <table style="width:280px;">
                <tr>
                    <td>
                        <div class="play-pause">
                            <a onClick="playPause()" class="play"></a>
                        </div>
                    </td>
                    <td style="width:35px;display:block;"></td>
                    <td>
                        <input type="hidden" id="volume_value" name="volume_value" value="37"/>
                        <div id="sound_icon">
                            <span></span>
                        </div>
                    </td>
                    <td width="10px"></td>
                    <td width="60%">
                        <div id="volume"></div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="radio-player-playlist">
            <ul>
                <li class="radio-list radios">
                    <ul>
                        <li>
                            <a onClick="setRadio('http://stream.radioclassic.fi:8080/classic','audio_player',this)" class="active">
                                <strong>Radio Classic</strong>
                                <span>Finland</span>
                            </a>
                        </li>
                        <li>
                            <a onClick="setRadio('http://tx.sharp-stream.com/icecast.php?i=spectrum2.mp3','audio_player',this)">
                                <strong>Radio Sino</strong>
                                <span>United Kingdom</span>
                            </a>
                        </li>
                        <li>
                            <a onClick="setRadio('http://80.241.252.132:8000/jako.fm','audio_player',this)">
                                <strong>Radio Jako</strong>
                                <span>Georgia</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="frequencies" style="display:none;">
                <div class="button">
                    <a><span>More Radios</span></a>
                </div>
            </div>
            <div class="online-radios radios">
                <ul>
                  <!-- MORE RADIOS -->
                </ul>
            </div>
        </div>
    </div>
</div>
<audio id="audio_player" style="display:none;">
    <source src="http://stream.radioclassic.fi:8080/classic">
</audio>