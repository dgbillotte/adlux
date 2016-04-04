# AdLux Personal Photo Album Tool

AdLux is a personal photo album and gallery tool that I built to my needs/wants. At the begining they were:

- have a single repository for all of my photos
- photos should be easy to use/reference in blog posts and other
- easy gallerys for blog posts
- automate image sizing
- make gallery and photo layout easy to style for specific uses

## Organization
The **Album** is the primary organization container. To me, it represents raw photos from a given time or for a specific purpose. Every photo belongs to exactly one album.

The **Gallery** allows you to group subsets of albums or photos from different albums together. When creating a gallery you can link to specific resolutions or variations of the original photos. Further, galleries will be able to be individually styled. Gallery is yet to be built

**Photo** is the most granular level and currently allows for a title and description. To be added: specifiy which resolutions to make available, photo meta data, add watermark, crop, etc.

## Upload
Photos can be uploaded either in the web interface, or en masse via scp, ftp, etc. For photos uploaded via the file system, there is a console command to import photos:

```bash
$ php artisan adlux:import ALBUM_ID FILES
```


AdLux is built in php on v5.2 of the [laravel framework](http://laravel.com/docs).





