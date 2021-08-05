Nic Lindh
v 0.1

# Cronkite template for the ASU Unity Design System

The Cronkite Web Spark 2 site is a child theme for [https://github.com/asu-ke-web-services/UDS-WordPress-Theme](UDS-WordPress) adapted for the needs of the Cronkite School.

This document is intended as a reference for personnel who update the content on the site and assumes you have been given a quick overview of Gutenberg.

Developer-centric information lives at the end of the document.

## Image sizes

The Unity Design System (UDS) uses many images, especially for the card displays and for hero images.

Use the built-in WordPress Media Library for upload and management of images.

**Note:** Whenever you upload an image, give it an ALT tag. The system will use these ALT tags wherever the image is used. The ALT tag will also help you and your colleagues search the Media Library.

Featured images are used by the card display system, so each page, each press release and each event **must** have a featured image. The featured image is also used for Facebook and Twitter shares.

Featured images are 1280 by 720 pixels. Export as 80% quality from Photoshop. **Note**: 80% is not written in stone. The goal is to get images as small as possible while maintaining high quality. So if 80% compression makes an image look bad, please decrease the compression.

Google uses page load times as one of its metrics for ranking sites and pages, so keeping image sizes as small as possible without sacrificing quality i very important.

UDS allows for three different hero size images with different depths. The Cronkite School is standardizing on the deepest size, which is 1920 by 684 pixels. As with featured images, export from Photoshop at 80% quality.

Portrait images used in the people layout are 500 by 500 pixels. The system will resize images if required, but you should aim for 500 by 500. Make sure faces are centered in the portraits.

## Yoast SEO

The Cronkite site is running the Yoast SEO Premium plugin. If you have not received the basic information about Yoast and SEO, please talk to Abby or Andrea.

**Note**: Our site title is The Walter Cronkite School of Journalism and Mass Communication, which eats a lot of characters. Yoast will let you shorten this to Cronkite School. Please do so.

## Basics of the Unity Design System

Due to the way UDS works, posting content is slightly more complicated than on most other sites. It's not hard, but does require you to pay a bit more attention and involves a few more steps.

### Why things are a little more complicated

Feel free to skip this section if you don't care about the way things work.

The reason for the added complexity is that in the Bootstrap framework UDS is based on, content lives in containers. Every page has many containers that open and close. Think of them as little boxes that the content lives inside.

On most sites the templates are written so content already has a container to live in, meaning the web producer doesn't have to worry about it.

However, the setup of UDS requires opening and closing containers inside the content area as different kinds of content live in different-width containers. For example, body text only runs to half-width on desktop-size widths in order to maximize legibility, but images fill the content area and testimonials go to 8/12s of the width of the content area.

One of the jobs of the containers is to provide margins, so if you don't wrap content inside a container, it will go full-bleed. Which might be what you want, but usually isn't.

If you want to be a "problems are opportunities" person you can look at it as the design system allowing you to be more expressive.

To make things as easy as possible, the theme uses Gutenberg blocks and patterns. This technology is relatively new to WordPress and still evolving, but at its current state it provides the means for making page creation faster and much less error-prone than typing raw HTML.

## Using Gutenberg

This section will cover the basics of using Gutenberg as it pertains to the Cronkite site. If you want to know more, WordPress.org has [a nice introduction to Gutenberg](https://developer.wordpress.org/block-editor/).

Basically, all content in the content area lives in a block. There are blocks for paragraphs, images, testimonials, cards and all other commonly-created items.

If you find yourself regulary creating a certain kind of content for which there is no card, let us know and we may very well be able to create one.

## Common blocks

The blocks created by the university all start with UDS and the blocks created by Cronkite all start with CS

The most commonly-used blocks are:

* UDS Blockquote
* UDS Card
* UDS Heading (provides reversed-out text if needed)
* UDS modals (like the Covid banner)
* Content Image Overlap (for what we call the optional box)

### Common patterns

Blocks also have a big brother called patterns. Patterns are a collection of blocks. On the Cronkite site, for example, we often use a three-up of cards. There is a pattern that will create a container with three columns and put a card in each column so that it is ready for you to insert your content.

Patterns can be found in a drawer by clicking the blue plus button at the top left of the page.

The most common patterns are:

* Four-up icon cards that can be used for cards that highlight figures as well
* The aforementioned three-up of cards
* Body text
* Blockquote that can be used for testimonials and other things
* CS Image Overlap News provides a large optional box and lets you select the topic that will be shown. The latest press release with that topic will populate the optional box

## Posting press releases

Each press release **must** have:

* A featured image (1280 by 720)
* A hero image (1920 by 684)
* A card description
* (Optional) a card title if the original hed is too long

The hero image and featured image can be different crops of the same image.

The body text for each press release **must** use the Body Text pattern so the width follows the standard.

To add an image, use the image block. Remember, ALT tags are crucial: Whenever you add an image to the Media Library, give it an ALT tag.

### Topics

Every press release must have at least one topic. (Under the hood, topics are the same thing as regular WordPress categories.) A press release can have as many topics as makes sense.

Every press release **must** exist in the All topic. If a press release is not given a topic, it will be put into the All topic automatically. If you put a press release in another topic, like Convocation, also put it in the All topic.

The last three press releases auto populate on the front page.

The last press release with the topic Perma Promo takes up the perma promo slot on the front page. The topic indicates this is a press release we want to keep displaying for a longer period of time.

## Posting events

Events do not use hero images, but like every other kind of post and page they need a featured image. The image must be sized 1280 by 720 and will be used for the card for the event as well as the individual event page itself.

It will also of course be used for social shares.

For events that don't have custom art, we have prepared a generic image for each event kind. Please use that image.

The fields Cart Title and Card Description will be used in cards, unsurprisingly. If they are left empty, the event title and content in event body will be used for the card. This will often not be what you want and will make the cards look uneven.

### Kinds

Kinds are like the topics for press releases or the categories for regular WordPress posts. Categorize each event with the kind of event it is to help readers to narrow the list down to events they are interested in.

## Building pages

The same principles go into building pages. Remember body text needs to use the Body Text pattern to pick up the correct width.

Blocks and patterns can be mixed and matched as desired.

### Adding padding above and below

There are a few utility classes worth noting. For each container, you can increase the padding above and below the container by adding the following classs in the Additional Classes field at the bottom of the block's controls in the sidebar to the right:

```pt-md-6 pt-sm-3``` adds padding *above* the container.

```pb-md-6 pb-sm-3``` adds padding *below* the container.

### Adding people from iSearch

**Note:** This section gets a bit technical.

There are two ways to add people from iSearch, by a list of ASURITEs or by a department ID.

The Cronkite department ID is 1537. We are planning to add more department lists inside the school for more granularity, but that is an upcoming task.

The process works through a block type called shortcodes. Add a new shortcode block and then enter the code inside it.

For example, this shortcode lists the current members of the administrative staff:

```[isearch-list list_type="customList" asurite_ids="keburke,jaalvill,schardi3,phockenh,slujano,dlshanno,asweile" title_ids="1537,1537,1537,1537,1537,1537,1537"]```

It's a list of the ASURITE IDs we are interested in, followed by a list of the department IDs. This is admittedly a little clunky, but the repeated title_ids allow for matching the ASURITE with the correct title for that ASURITE depending on the individual's affiliations. So a person might have the title Associate Faculty in one department, but Director of Engagement in another department. If that is the case, it's a matter of sleuthing which department ID has the correct title.

This is a bit technical and out of the scope of this Read Me.

If you have a department ID already populated and sorted the way you want to display it, this gets a lot easier:

```[isearch-list list_type="deptList" dept_id="1537"]``` will list all ASURITEs in the Cronkite School department list.

To find out what iSearch knows about individuals, use this URL *in the Firefox browser*. You want Firefox since it will format the JSON results from iSearch in human-readable form.

To search by email address:

```https://asudir-solr.asu.edu/asudir/directory/select?q=emailAddress:michael.crow@asu.edu&wt=json```

To search by ASURITE:

```https://asudir-solr.asu.edu/asudir/directory/select?q=asuriteId:mcrow&rows=300&wt=json```

In this example, if we want to list Dr. Crow's title as "Distinguished Sustainability Scientist," we see that this is the title with ID 4. We now need to find the department id with ID 4, which is 224232, so our incantation shortcode becomes:

```[isearch-list list_type="customList" asurite_ids="mcrow" title_ids="224232"]```

Computers are fun!

## Developing With NPM, Gulp, SASS and Browser Sync

### Installing Dependencies

- Make sure you have installed Node.js, Gulp, and Browser-Sync [1] on your computer globally
- Open your terminal and browse to the location of the theme
- Run: `$ npm install` then: `$ gulp copy-assets`

### Running

To work and compile your Sass files on the fly start:

- `$ gulp watch`

Or, to run with Browser-Sync:

- First change the browser-sync options to reflect your environment in the file `/gulpconfig.json` in the beginning of the file:

```javascript
  "browserSyncOptions" : {
    "proxy": "localhost/wordpress/",
    "notify": false
  }
};
```

- then run: `$ gulp watch-bs`

[1] Visit [https://browsersync.io/](https://browsersync.io/) for more information on Browser Sync
