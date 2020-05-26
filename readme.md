# FastForward

Redirect users to a YouTube video from your website. 


## Usage

```php
/** 
 * Once you've uploaded the script to your website, please change the video links below.
 * The arrayOfVideos holds a library of links to videos you want to send to your users.
 */
	$arrayOfVideos = array(1=>'https://youtu.be/6avJHaC3C2U',
			               2=>'https://youtu.be/6avJHaC3C2U');
```

## Example

```html
<h1>Welcome to websitename.com</h1>
<h2>Have you heard of Benoit Mandelbrot?</h2>
<a href="https://websitename.com/fastforward.php?VideoID=1&StartAt=14:06&Version=1" target="_blank">
    A quick intro to Benoit Mandelbrot
</a>
<h3>The Mandelbrot set</h3>
<a href="https://websitename.com/fastforward.php?VideoID=1&StartAt=940&Version=1" target="_blank">
    Let's look at the Mandelbrot set
</a>
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to create & update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)