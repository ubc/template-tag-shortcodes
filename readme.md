# A guide to Template Tag Shortcodes

_Template Tag Shortcodes_ is a plugin that turns many of the WordPress [template tags](http://codex.wordpress.org/Template_Tags "WordPress template tags") into easy-to-use shortcodes.

This plugin was created so end users could make use of the template tags within their posts and pages.  Currently, this plugin creates 40+ shortcodes for use.  Not all template tags are available as shortcodes, but you are more than welcome to request others be added.

## How to install the plugin

1.  Unzip the `template-tag-shortcodes.zip` folder.
2.  Upload the `template-tag-shortcodes` folder to your `/wp-content/plugins` directory.
3.  In your WordPress dashboard, head over to the _Plugins_ section.
4.  Activate _Template Tag Shortcodes_.

## How to use the plugin

Once you've activated the plugin, you'll want to type one or more of the shortcodes within your post/page.  Here is a basic example of the `[wp_list_pages]` shortcode:

    [wp_list_pages]`</pre>

    That will create a list of all your pages.  But, you can do much more.  Most shortcodes have several arguments you can input.  Here's an example of `[wp_list_pages]` that only lists specific pages we want:

    <pre>`[wp_list_pages include="1,2,3,4"]`</pre>

    If you're giving this a go, you might notice the invalid <acronym title="Extensible Hypertext Markup Language">XHTML</acronym> output.  This is because the shortcode does not wrap `<ul>` tags around the list items.  This is the default WordPress functionality that several template tags have.  This plugin will adhere to the WP defaults.  So, we might want to make this valid:

    <pre>`

This is both a burden and a blessing.  It forces you to input the appropriate <acronym title="Extensible Hypertext Markup Language">XHTML</acronym> with a few of the shortcodes (particularly the ones that list items).  However, it gives you much more flexibility.  For example, we could've wrapped the list in `<ol>` tags.

## The Shortcodes

I'm not going to explain each shortcode's parameters here.  That would take hours of my time.  Quite frankly, I don't have that much time to give.  I encourage you to be familiar with the [template tag](http://codex.wordpress.org/Template_Tags "WordPress template tags") equivalent of the shortcode you'd like to use.  I will link to the relevant template tags below.

I've separated each shortcode into groups for easier referencing.  Just click on a link below to find particular shortcodes:

*   [Author shortcodes](#author "Author shortcodes")
*   [Category shortcodes](#category "Category shortcodes")
*   [Date and time shortcodes](#date-time "Date and time shortcodes")
*   [Tag shortcodes](#tag "Tag shortcodes")
*   [Taxonomy (term) shortcodes](#taxonomy "Taxonomy shortcodes")
*   [Bookmarks/Links shortcodes](#bookmarks "Bookmarks/links shortcodes")
*   [Post shortcodes](#post "Post shortcodes")
*   [General shortcodes](#general " shortcodes")

### Author Shortcodes

<dl>
	<dt>[wp_list_authors]</dt>
	<dd>Template Tag: [wp_list_authors()](http://codex.wordpress.org/Template_Tags/wp_list_authors "wp_list_authors() template tag")</dd>
	<dd>Parameters: `optioncount`, `exclude_admin`, `show_fullname`, `hide_empty`, `feed`, `feed_image`, `style`, `html`</dd>

	<dt>[the_author_meta]</dt>
	<dd>Template Tag: [the_author_meta()](http://codex.wordpress.org/Template_Tags/the_author_meta "the_author_meta() template tag")</dd>
	<dd>Parameters: `field`, `user_id`</dd>

	<dt>[the_author]</dt>
	<dd>Template Tag: [the_author()](http://codex.wordpress.org/Template_Tags/the_author "the_author() template tag")</dd>
	<dd>_This shortcode has no parameters._</dd>

	<dt>[the_author_description]</dt>
	<dd>Template Tag: [the_author_description()](http://codex.wordpress.org/Template_Tags/the_author_description "the_author_description() template tag")</dd>
	<dd>_This shortcode has no parameters._</dd>

	<dt>[the_author_login]</dt>
	<dd>Template Tag: [the_author_login()](http://codex.wordpress.org/Template_Tags/the_author_login "the_author_login() template tag")</dd>
	<dd>_This shortcode has no parameters._</dd>

	<dt>[the_author_firstname]</dt>
	<dd>Template Tag: [the_author_firstname()](http://codex.wordpress.org/Template_Tags/the_author_firstname "the_author_firstname() template tag")</dd>
	<dd>_This shortcode has no parameters._</dd>

	<dt>[the_author_lastname]</dt>
	<dd>Template Tag: [the_author_lastname()](http://codex.wordpress.org/Template_Tags/the_author_lastname "the_author_lastname() template tag")</dd>
	<dd>_This shortcode has no parameters._</dd>

	<dt>[the_author_nickname]</dt>
	<dd>Template Tag: [the_author_nickname()](http://codex.wordpress.org/Template_Tags/the_author_nickname "the_author_nickname() template tag")</dd>
	<dd>_This shortcode has no parameters._</dd>

	<dt>[the_author_ID]</dt>
	<dd>Template Tag: [the_author_ID()](http://codex.wordpress.org/Template_Tags/the_author_ID "the_author_ID() template tag")</dd>
	<dd>_This shortcode has no parameters._</dd>

	<dt>[the_author_url]</dt>
	<dd>Template Tag: [the_author_url()](http://codex.wordpress.org/Template_Tags/the_author_url "the_author_url() template tag")</dd>
	<dd>_This shortcode has no parameters._</dd>

	<dt>[the_author_email]</dt>
	<dd>Template Tag: [the_author_email()](http://codex.wordpress.org/Template_Tags/the_author_email "the_author_email() template tag")</dd>
	<dd>_This shortcode has no parameters._</dd>

	<dt>[the_author_link]</dt>
	<dd>Template Tag: [the_author_link()](http://codex.wordpress.org/Template_Tags/the_author_link "the_author_link() template tag")</dd>
	<dd>_This shortcode has no parameters._</dd>

	<dt>[the_author_aim]</dt>
	<dd>Template Tag: [the_author_aim()](http://codex.wordpress.org/Template_Tags/the_author_aim "the_author_aim() template tag")</dd>
	<dd>_This shortcode has no parameters._</dd>

	<dt>[the_author_yim]</dt>
	<dd>Template Tag: [the_author_yim()](http://codex.wordpress.org/Template_Tags/the_author_yim "the_author_yim() template tag")</dd>
	<dd>_This shortcode has no parameters._</dd>

	<dt>[the_author_posts]</dt>
	<dd>Template Tag: [the_author_posts()](http://codex.wordpress.org/Template_Tags/the_author_posts "the_author_posts() template tag")</dd>
	<dd>_This shortcode has no parameters._</dd>

	<dt>[the_author_posts_link]</dt>
	<dd>Template Tag: [the_author_posts_link()](http://codex.wordpress.org/Template_Tags/the_author_posts_link "the_author_posts_link() template tag")</dd>
	<dd>_This shortcode has no parameters._</dd>

	<dt>[the_modified_author]</dt>
	<dd>Template Tag: [the_modified_author()](http://codex.wordpress.org/Template_Tags/the_modified_author "the_modified_author() template tag")</dd>
	<dd>_This shortcode has no parameters._</dd>
</dl>

### Category Shortcodes

<dl>
	<dt>[wp_list_categories]</dt>
	<dd>Template Tag: [wp_list_categories()](http://codex.wordpress.org/Template_Tags/wp_list_categories "wp_list_categories() template tag")</dd>
	<dd>Parameters: `show_option_all`, `order`, `orderby`, `show_last_update`, `style`, `show_count`, `hide_empty`, `use_desc_for_title`, `child_of`, `feed`, `feed_image`, `exclude`, `include`, `current_category`, `hierarchical`, `title_li`, `echo`, `depth`, `number`</dd>

	<dt>[wp_dropdown_categories]</dt>
	<dd>Template Tag: [wp_dropdown_categories()](http://codex.wordpress.org/Template_Tags/wp_dropdown_categories "wp_dropdown_categories template() tag")</dd>
	<dd>Parameters: `show_option_none`, `show_option_all`, `order`, `orderby`, `show_last_update`, `style`, `show_count`, `hide_empty`, `use_desc_for_title`, `child_of`, `feed`, `feed_image`, `exclude`, `include`, `current_category`, `hierarchical`, `title_li`, `echo`, `depth`, `number`, `selected`, `name`, `class`, `postform`</dd>

	<dt>[the_category]</dt>
	<dd>Template Tag: [the_category](http://codex.wordpress.org/Template_Tags/the_category "the_category() template tag")()</dd>
	<dd>Parameters: `separator`, `parents`</dd>

	<dt>[get_category_link]</dt>
	<dd>Template Tag: [get_category_link()](http://codex.wordpress.org/Function_Reference/get_category_link "get_category_link() template tag")</dd>
	<dd>Parameters: `category_id`</dd>
</dl>

### Date and Time Shortcodes

<dl>
	<dt>[the_date]</dt>
	<dd>Template Tag: [the_date()](http://codex.wordpress.org/Template_Tags/the_date "the_date() template tag")</dd>
	<dd>Parameters: `format`, `before`, `after`</dd>

	<dt>[the_time]</dt>
	<dd>Template Tag: [the_time()](http://codex.wordpress.org/Template_Tags/the_time "the_time() template tag")</dd>
	<dd>Parameters: `format`</dd>

	<dt>[the_modified_date]</dt>
	<dd>Template Tag: [the_modified_date()](http://codex.wordpress.org/Template_Tags/the_modified_date "the_modified_date() template tag")</dd>
	<dd>Parameters: `format`</dd>

	<dt>[the_modified_time]</dt>
	<dd>Template Tag: [the_modified_time()](http://codex.wordpress.org/Template_Tags/the_modified_time "the_modified_time() template tag")</dd>
	<dd>Parameters: `format`</dd>
</dl>

### Tag shortcodes

<dl>
	<dt>[wp_tag_cloud]</dt>
	<dd>Template Tag: [wp_tag_cloud()](http://codex.wordpress.org/Template_Tags/wp_tag_cloud "wp_tag_cloud() template tag")</dd>
	<dd>Parameters: `taxonomy``smallest`, `largest`, `unit`, `number`, `format`, `order`, `orderby`, `exclude`, `include`, `link`</dd>

	<dt>[the_tags]</dt>
	<dd>Template Tag: [the_tags()](http://codex.wordpress.org/Template_Tags/the_tags "the_tags() template tag")</dd>
	<dd>Parameters: `before`, `separator`, `after`</dd>

	<dt>[get_tag_link]</dt>
	<dd>Template Tag: [get_tag_link()](http://codex.wordpress.org/Function_Reference/get_tag_link "get_tag_link() template tag")</dd>
	<dd>Parameters: `tag_id`</dd>
</dl>

### Taxonomy shortcodes

<dl>
	<dt>[the_terms]</dt>
	<dd>Parameters: `id`, `taxonomy`, `separator`, `before`, `after`</dd>

	<dt>[term_description]</dt>
	<dd>Template Tag: [term_description()](http://codex.wordpress.org/Function_Reference/term_description "term_description() template tag")</dd>
	<dd>Parameters: `term`, `taxonomy`</dd>
</dl>

### Bookmarks/Links shortcodes

<dl>
	<dt>[wp_list_bookmarks]</dt>
	<dd>Template Tag: [wp_list_bookmarks()](http://codex.wordpress.org/Template_Tags/wp_list_bookmarks "wp_list_bookmarks() template tag")</dd>
	<dd>Parameters: `categorize`, `category`, `exclude_category`, `category_name`, `category_before`, `category_after`, `class`, `category_orderby`, `category_order`, `title_li`, `title_before`, `title_after`, `show_private`, `include`, `exclude`, `orderby`, `order`, `limit`, `before`, `after`, `link_before`, `link_after`, `between`, `show_images`, `show_description`, `show_name`, `show_rating`, `show_updated`, `hide_invisible`</dd>
</dl>

### Post Shortcodes

<dl>
	<dt>[the_title]</dt>
	<dd>Template Tag: [the_title()](http://codex.wordpress.org/Template_Tags/the_title "the_title() template tag")</dd>
	<dd>Parameters: `before`, `after`</dd>

	<dt>[the_title_attribute]</dt>
	<dd>Template Tag: [the_title_attribute()](http://codex.wordpress.org/Template_Tags/the_title_attribute "the_title_attribute() template tag")</dd>
	<dd>Parameters: `before`, `after`</dd>

	<dt>[the_ID]</dt>
	<dd>Template Tag: [the_ID()](http://codex.wordpress.org/Template_Tags/the_ID "the_ID() template tag")</dd>
	<dd>_This shortcode has no parameters._</dd>

	<dt>[the_permalink]</dt>
	<dd>Template Tag: [the_permalink()](http://codex.wordpress.org/Template_Tags/the_permalink "the_permalink() template tag")</dd>
	<dd>_This shortcode has no parameters._</dd>

	<dt>[get_permalink]</dt>
	<dd>Template Tag: [get_permalink()](http://codex.wordpress.org/Template_Tags/get_permalink "get_permalink() template tag")</dd>
	<dd>Parameters: `id`</dd>

	<dt>[comments_link]</dt>
	<dd>Template Tag: [comments_link()](http://codex.wordpress.org/Template_Tags/comments_link "comments_link() template tag")</dd>
	<dd>_This shortcode has no parameters._</dd>
</dl>

### General Shortcodes

<dl>
	<dt>[wp_list_pages]</dt>
	<dd>Template Tag: [wp_list_pages()](http://codex.wordpress.org/Template_Tags/wp_list_pages "wp_list_pages() template tag")</dd>
	<dd>Parameters: `depth`, `show_date`, `date_format`, `child_of`, `exclude`, `include`, `title_li`, `authors`, `sort_column`, `link_before`, `link_after`, `exclude_tree`, `sort_order`, `depth`, `hierarchical`, `meta_key`, `meta_value`</dd>

	<dt>[wp_dropdown_pages]</dt>
	<dd>Template Tag: [wp_dropdown_pages()](http://codex.wordpress.org/Template_Tags/wp_dropdown_pages "wp_dropdown_pages template() tag")</dd>
	<dd>Parameters: `name`, `show_option_none`, `selected`, `depth`, `show_date`, `date_format`, `child_of`, `exclude`, `include`, `title_li`, `authors`, `sort_column`, `exclude_tree`, `sort_order`, `depth`, `hierarchical`, `meta_key`, `meta_value`</dd>

	<dt>[wp_get_archives]</dt>
	<dd>Template Tag: [wp_get_archives()](http://codex.wordpress.org/Template_Tags/wp_get_archives "wp_get_archives() template tag")</dd>
	<dd>Parameters: `type`, `limit`, `format`, `before`, `after`, `show_post_count`</dd>

	<dt>[bloginfo]</dt>
	<dd>Template Tag: [bloginfo()](http://codex.wordpress.org/Template_Tags/bloginfo "bloginfo() template tag")</dd>
	<dd>Parameters: `show`</dd>

	<dt>[allowed_tags]</dt>
	<dd>Template Tag: allowed_tags</dd>
	<dd>_This shortcode has no parameters._</dd>

	<dt>[wp_logout_url]</dt>
	<dd>Template Tag: [wp_logout_url()](http://codex.wordpress.org/Template_Tags/wp_logout_url "wp_logout_url() template tag")</dd>
	<dd>Parameters: `redirect`</dd>

	<dt>[wp_login_url]</dt>
	<dd>Template Tag: wp_login_url()</dd>
	<dd>Parameters: `redirect`</dd>
</dl>

## Get involved

WordPress has tons of template tags.  Choosing which should be a converted to shortcodes is tough work.  I probably won't use most of them, but there may particular shortcodes you'd like to see.  If so, just let me know about it.  I'll be happy to add it to the plugin (if possible).

## Plugin support

I run a WordPress community called [Theme Hybrid](http://themehybrid.com "Theme Hybrid"), which is where I fully support all of my WordPress projects, including plugins.  You can sign up for an account to get plugin support for a small yearly fee ($25 <acronym title="United States Dollars">USD</acronym> at the time of writing).

I know.  I know.  You might not want to pay for support, but just consider it a donation to the project.  To continue making cool, GPL-licensed plugins and having the time to support them, I must pay the bills.

## Copyright &amp; license

_Template Tag Shortcodes_ is licensed under the [GNU General Public License](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html "GNU GPL"), version 2 (<acronym title="GNU General Public License">GPL</acronym>).

This plugin is copyrighted to [Justin Tadlock](http://justintadlock.com "Justin Tadlock").

2009 &copy; Justin Tadlock