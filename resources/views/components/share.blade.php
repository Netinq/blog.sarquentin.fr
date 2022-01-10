<div id="social">
    <a target="popup" href="http://twitter.com/share?text={{$txt}}&url={{$url}}" onclick="window.open('http://twitter.com/share?text={{$txt}}&url={{$url}}','popup','width=600,height=600'); return false;">
        <div class="s-btn" id="s-twitter">
            <img alt="twitter" src="{{ asset('img/share/twitter.svg')}}" />
        </div>
    </a>
    <a target="popup" href="https://www.linkedin.com/sharing/share-offsite/?url={{$url}}" onclick="window.open('https://www.linkedin.com/sharing/share-offsite/?url={{$url}}','popup','width=600,height=600'); return false;">
        <div class="s-btn" id="s-linkedin">
            <img alt="linkedin" src="{{ asset('img/share/linkedin.svg')}}" />
        </div>
    </a>
    <a target="popup" href="https://www.facebook.com/sharer/sharer.php?u={{$url}}" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{$url}}','popup','width=600,height=600'); return false;">
        <div class="s-btn" id="s-facebook" target="_blank">
            <img alt="facebook" src="{{ asset('img/share/facebook.svg')}}" />
        </div>
    </a>
</div>
