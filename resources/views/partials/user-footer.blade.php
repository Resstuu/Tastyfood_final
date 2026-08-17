<footer class="site-footer footer">
    <div class="container">
        <div class="footer-grid">
            <div>
                <h2>{{ $footerSetting->brand_title }}</h2>
                @if($footerSetting->description)
                    <p>{{ $footerSetting->description }}</p>
                @endif
                <div class="socials">
                    @if($footerSetting->facebook_url)
                        <a href="{{ $footerSetting->facebook_url }}" aria-label="Facebook"><img src="/assets/001-facebook.png" alt=""></a>
                    @endif
                    @if($footerSetting->twitter_url)
                        <a href="{{ $footerSetting->twitter_url }}" aria-label="Twitter"><img src="/assets/002-twitter.png" alt=""></a>
                    @endif
                </div>
            </div>
            <div>
                <h3>{{ $footerSetting->useful_title }}</h3>
                <ul>
                    @foreach($footerSetting->usefulLinkItems() as $link)
                        <li><a href="{{ $link['url'] }}">{{ $link['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h3>{{ $footerSetting->privacy_title }}</h3>
                <ul>
                    @foreach($footerSetting->privacyLinkItems() as $link)
                        <li><a href="{{ $link['url'] }}">{{ $link['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h3>{{ $footerSetting->contact_title }}</h3>
                <ul>
                    @if($footerSetting->email)
                        <li><img class="contact-icon" src="/assets/ic_markunread_24px.png" alt="">{{ $footerSetting->email }}</li>
                    @endif
                    @if($footerSetting->phone)
                        <li><img class="contact-icon" src="/assets/ic_call_24px.png" alt="">{{ $footerSetting->phone }}</li>
                    @endif
                    @if($footerSetting->location)
                        <li><img class="contact-icon" src="/assets/ic_place_24px.png" alt="">{{ $footerSetting->location }}</li>
                    @endif
                </ul>
            </div>
        </div>
        @if($footerSetting->copyright)
            <div class="copyright">{{ $footerSetting->copyright }}</div>
        @endif
    </div>
</footer>
