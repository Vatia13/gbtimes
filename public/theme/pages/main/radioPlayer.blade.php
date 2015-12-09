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
                <li class="accordion" style="visibility:hidden">
                    <div class="play-content">
                        <div class="button">
                            <a><span>{{trans('all.previous')}}</span></a>
                        </div>
                        <div class="desc">
                            <h3>test</h3>
                            <h5>test</h5>
                        </div>
                    </div>
                </li>
                <li class="accordion active" style="visibility:hidden">
                    <div class="play-content">
                        <div class="button">
                            <a><span>{{trans('all.now_playing')}}</span></a>
                        </div>
                        <div class="desc">
                            <h3>test</h3>
                            <h5>test</h5>
                        </div>
                    </div>
                </li>
                <li class="accordion" style="visibility:hidden">
                    <div class="play-content">
                        <div class="button">
                            <a><span>{{trans('all.next')}}</span></a>
                        </div>
                        <div class="desc">

                                <h3>test</h3>
                                <h5>test</h5>

                        </div>
                    </div>
                </li>
                <li class="frequencies">
                    <div class="button">
                        <a><span>Online Radios</span></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="radio-stations">
    <div class="stations-content">
        <div class="block first">
            <h3>Radio Classic antenna frequencies:</h3>
            <ul>
                <li>Helsinki 92.9 MHz,</li>
                <li>Hyvinkää 103.4 MHz</li>
                <li>Hämeenlinna 88.1 MHz</li>
                <li>Jyväskylä 96.2 MHz</li>
                <li>Kuopio 94.8 MHz</li>
                <li>Gulf of 107.4 MHz</li>
                <li>Oulu 99.6 MHz</li>
                <li>Porvoo 90.8 MHz</li>
                <li>Raasepori 104.3 MHz</li>
                <li>Savonlinna 100.0 MHz</li>
                <li>Tampere 92.2 MHz</li>
                <li>Turku 106.8 MHz</li>
                <li>Valkeakoski 90.3 MHz</li>
            </ul>
        </div>
        <div class="block">
            <h3>Radio Classic cable frequencies:</h3>
            <ul>
                <li>Helsinki, Welho 106.7 MHz</li>
                <li>Hyvinkää, Mäntsälä, Jokela, Sonera 102.6 MHz</li>
                <li>Jyväskylä, Elisa 90.3 MHz</li>
                <li>Jyväskylä, Sonera 96.2 MHz</li>
                <li>Kuopio, DNA KTV 104.5 MHz</li>
                <li>Lahti, DNA KTV 94.2 MHz</li>
                <li>Lohja, DNA KTV 99.4 MHz</li>
                <li>Oulu, DNA KTV 98.8 MHz</li>
                <li>Oulu, Sonera 99.6 MHz</li>
                <li>Porvoo, Sonera 105.5 MHz</li>
                <li>Raisio, DNA KTV 104.3 MHz</li>
                <li>Riihimäki, Elisa 93.6 MHz</li>
                <li>Tampere, Sonera 92.2 MHz</li>
                <li>Tampere, Tampere Tietoverkko 94.1 MHz</li>
                <li>Turku, Sonera 101.9 MHz</li>
                <li>Valkeakoski, Toijala, Pälkäne, Sonera 92.8 MHz</li>
                <li>Varkaus Pieksämäki, Sonera 96.0 MHz</li>
                <li>Äänekoski, Sonera 104.5 MHz</li>
            </ul>
        </div>
    </div>
</div>
<audio id="audio_player" style="display:none;">
    <source src="http://stream.radioclassic.fi:8080/classic">
</audio>