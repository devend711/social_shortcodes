# social_shortcodes
### Bare-bones shortcodes for adding social sharing to Wordpress

```
[facebook_share_custom][/facebook_share_custom]
[twitter_share_custom][/twitter_share_custom]

[facebook_share_custom url="http://differentpage.com"]
    <img class="my-fb-icon" src="fb.png" />
[/facebook_share_custom]
```

##### Facebook

###### Options/Defaults
- `url` => `get_permalink()`
- `label` => 'Share on Facebook'

##### Twitter

###### Options/Defaults
- `url` => `get_permalink()`
- `text` => `null`
- `via` => `null`
- `title` => 'Share this on Twitter'
- `text-separator` => ' -'