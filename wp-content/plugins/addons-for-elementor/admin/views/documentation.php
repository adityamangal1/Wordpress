<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Theme info
$plugin = get_plugin_data(LAE_PLUGIN_FILE);


if (is_multisite()) {
    $elementorUrl = network_admin_url('plugin-install.php?tab=plugin-information&plugin=elementor&TB_iframe=true&width=640&height=589');
    $portfolioPostTypeUrl = network_admin_url('plugin-install.php?tab=plugin-information&plugin=portfolio-post-type&TB_iframe=true&width=640&height=589');
}
else {
    $elementorUrl = admin_url('plugin-install.php?tab=plugin-information&plugin=elementor&TB_iframe=true&width=640&height=589');
    $portfolioPostTypeUrl = admin_url('plugin-install.php?tab=plugin-information&plugin=portfolio-post-type&TB_iframe=true&width=640&height=589');
}

?>

<div class="livemesh-doc">

    <h2 class="notices"></h2>

    <div class="intro-wrap">

        <img class="plugin-image" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/plugin-screenshot.jpg" alt="Addons for Elementor">

        <div class="intro">
            <h3><?php printf(__('Getting started with %1$s v%2$s', 'livemesh-el-addons'), $plugin['Name'], $plugin['Version']); ?></h3>

            <h4><?php printf(__('Thanks for installing %1$s! We truly appreciate the support and the opportunity to share our work with you. Please visit the tabs below to get started on using our plugin to build your site!', 'livemesh-el-addons'), $plugin['Name']); ?></h4>
        </div>

    </div>

    <div class="panels">
        <ul class="inline-list">
            <li class="current"><a id="help" href="#"><span
                            class="dashicons dashicons-yes"></span> <?php _e('Help File', 'livemesh-el-addons'); ?></a>
            </li>
            <li><a id="plugins" href="#"><span
                            class="dashicons dashicons-admin-plugins"></span> <?php _e('Plugins', 'livemesh-el-addons'); ?>
                </a>
            </li>
            <li><a id="support" href="#"><span
                            class="dashicons dashicons-editor-help"></span> <?php _e('FAQ &amp; Support', 'livemesh-el-addons'); ?>
                </a>
            </li>
            <li><a id="updates" href="#"><span
                            class="dashicons dashicons-update"></span> <?php _e('Latest Updates', 'livemesh-el-addons'); ?>
                </a>
            </li>
        </ul>

        <div id="panel" class="panel">

            <!-- Help file panel -->
            <div id="help-panel" class="panel-left visible">

                <!-- Grab feed of help file -->

                <!-- Output the feed -->
                <ul id="top" class="toc">
                    <li><a href="#getting-started">Getting Started</a></li>
                    <li><a href="#install-plugins">Installing Recommended/Required Plugins</a></li>
                    <li><a href="#demo-data">Installing Demo Data</a></li>
                    <li><a href="#plugin-elements">Working with plugin elements</a></li>
                    <li><a href="#customization">How to customize addons output</a></li>

                    <li><a href="#heading-element">Heading Addon</a></li>
                    <li><a href="#services-element">Services Addon</a></li>
                    <li><a href="#team-members">Team Members</a></li>
                    <li><a href="#statistics-elements">Statistics Addons</a></li>
                    <li><a href="#testimonials-elements">Testimonials Addons</a></li>
                    <li><a href="#posts-carousel">Posts Carousel</a></li>
                    <li><a href="#carousel-element">Carousel Addon</a></li>
                    <li><a href="#grid-element">Posts Grid</a></li>
                    <li><a href="#clients-element">Clients</a></li>
                    <li><a href="#pricing-table">Pricing Table</a></li>
                    <li><a href="#tabs-accordions">Tabs and Accordions – <span class="pro-feature">Pro!</span></a></li>
                    <li><a href="#button-element">Buttons – <span class="pro-feature">Pro!</span></a></li>
                    <li><a href="#icon-list">Icon List – <span class="pro-feature">Pro!</span></a></li>
                    <li><a href="#image-slider">Image Slider – <span class="pro-feature">Pro!</span></a></li>
                    <li><a href="#image-video-gallery">Image/Video Gallery – <span class="pro-feature">Pro!</span></a></li>
                    <li><a href="#image-video-carousel">Image/Video Carousel – <span class="pro-feature">Pro!</span></a></li>
                    <li><a href="#faq-element">FAQ Addon - <span class="pro-feature">Pro!</span></a></li>
                    <li><a href="#features-element">Features Addon - <span class="pro-feature">Pro!</span></a></li>

                </ul>
                <h3 id="getting-started">Getting Started<a class="back-to-top" href="#panel"><span
                                class="dashicons dashicons-arrow-up-alt2"></span> Back to top</a></h3>
                <p>Thanks for choosing Livemesh Addons for Elementor plugin. This help file aims to provide you with all the information you need to make the best use of this powerful plugin. The aim of the plugin to make the task of building a website effortless and pleasurable. Towards that end, we have built a number of elements most commonly used across most of the websites of small businesses, corporates, design agencies, freelancers, artists etc.</p>
                <p>Do follow the steps below to get started - </p>
                <ol>
                    <li>Install and activate the <strong>required plugin</strong> <a
                                href="https://wordpress.org/plugins/elementor/" rel="nofollow" target="_blank">Elementor</a>.
                        Elementor is one of the most popular WordPress page builder plugins powering more than 100,000 websites.
                    </li>
                    <li><strong>Make sure you deactivate the free plugin</strong> <a href="https://wordpress.org/plugins/addons-for-elementor/" rel="nofollow">Livemesh Addons for Elementor</a> upon installing the premium version.
                    </li>
                    <li>Unzip the downloaded addons-for-elementor.zip file and upload to the <code>/wp-content/plugins/</code>
                        directory or upload the plugin zip with the help of Plugins→Installed Plugins→Add New button.<br>
                        Activate the plugin through the 'Plugins' menu in WordPress. If you are viewing this help page
                        in WordPress admin under Elementor Addons→Documentation, you have already activated the plugin.
                    </li>
                    <li>Once the plugin is activated, all of the elements part of the plugin are available in frontend Elementor sidebar, grouped under 'Livemesh Addons'.

                        <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/add-element-window.png" alt="Elementor Addons Add Element Window"></p>


                        <p>Once you are done with developing the site, for performance gains, you can selectively deactivate
                            the unused elements in 'Elements' tab of
                            <strong> <a href="<?php echo admin_url() . 'admin.php?page=livemesh_el_addons'; ?>"
                                        target="_blank"><?php echo __('Settings->Page Builder', 'livemesh-el-addons') ?></a></strong>
                            page. This will ensure that scripts and files relating to the deactivated elements do not load on your site.</p>
                    </li>
                    <li>If you plan to build a portfolio site and plan to use Posts Grid element for the same, install
                        and activate the optional plugin <a
                                href="https://wordpress.org/plugins/portfolio-post-type/" rel="nofollow" target="_blank">Portfolio
                            Post Type</a>.
                        The portfolio examples of Posts Grid element is built using custom post type registered by
                        this plugin.
                    </li>
                    <li>Optionally, if you have <a href="https://livemeshelementor.com/pricing/" title="Livemesh Addons for Elementor Pro" target="_blank">premium version</a> of the plugin installed, you can import the sample data
                        that replicates the demo site for you by importing the
                        file sample-data.xml file located in the plugin directory. The import option is available under
                        <strong> <a href="<?php echo admin_url() . 'import.php'; ?>"
                                    target="_blank"><?php echo __('Tools→Import', 'livemesh-el-addons') ?></a></strong>
                        in WordPress admin.
                    </li>
                </ol>

                <hr>
                <h3 id="install-plugins">Installing Recommended/Required Plugins<a class="back-to-top"
                                                                                   href="#panel"><span
                                class="dashicons dashicons-arrow-up-alt2"></span> Back to top</a></h3>
                <p>Below is a list of required/recommended plugins to install that will help you get the most out of this plugin.
                    Although some of these plugins are optional, we recommend that you install these popular plugins if
                    you plan to install the demo data and get most out of this plugin. The demo site and the sample data
                    provided with the <a href="https://livemeshelementor.com/pricing/"
                                         title="Livemesh Addons for Elementor Pro" target="_blank">premium version</a> of
                    the plugin utilizes all of these plugins including the Portfolio Post type plugin.</p>
                <p>These plugins are also listed in the Plugins tab of this help file under Elementor Addons →
                    Documentation, and you can install the plugins directly from there.</p>
                <ul>
                    <li><p><strong>Elementor</strong> is perhaps the most loved page builder tool for WordPress powering
                            over 100,000+ sites. You can build any layout you can imagine with intuitive drag and drop builder
                            with little or no programming knowledge.</p>
                        <p>All of the elements part of Livemesh Addons for Elementor plugin were built using the API provided
                            by the Elementor plugin and hence this plugin must be installed and activated on the site prior
                            to using our plugin.</p>
                        <p>All of the pages of our demo site for
                            the plugin have been built using this page builder. You should install and activate this plugin
                            prior to replicating the plugin demo site by importing the sample data provided.</p>
                        <p><a href="https://wordpress.org/plugins/elementor" target="_blank">More about Elementor →</a></p></li>
                    <li><strong>Portfolio Post Type</strong> is a free plugin that registers a custom post type for
                        portfolio items. It also registers separate portfolio taxonomies for tags and categories. The
                        Portfolio grid instances showcased on our demo site was built using custom post types registered
                        by Portfolio Post Type plugin.
                        <p><a href="https://wordpress.org/plugins/portfolio-post-type/" target="_blank">More about Portfolio Post Type
                                →</a></p>
                    </li>
                </ul>
                <hr>
                <h3 id="demo-data">Installing Demo Data<a class="back-to-top" href="#panel"><span
                                class="dashicons dashicons-arrow-up-alt2"></span> Back to top</a></h3>
                <p>If you have <a href="https://livemeshelementor.com/pricing/" title="Livemesh Addons for Elementor Pro" target="_blank">premium version</a> of the plugin installed, you can install the demo data to replicate the
                    plugin demo site to get a head start on building your site. Installing demo data reduces the
                    learning curve associated with trying out the powerful elements part of this plugin.</p>
                <p>The sample data imports the pages, posts and portfolio items part of the demo site. Once you are done with playing around the
                    elements and feel comfortable creating/configuring them, you can delete the unwanted pages/posts that
                    you may not need.</p>
                <p>Prior to installing demo data, make sure you have recommended plugins installed as mentioned above in
                    the <a href="#install-plugins">Recommended Plugins</a> section.</p>
                <p>The demo site <strong>sample-data.xml</strong> file is located in the plugin directory created after unzipping the premium bundle. Once you have access to the sample data file, you can install the demo site by visiting <strong> <a href="<?php echo admin_url() . 'import.php'; ?>" target="_blank"><?php echo __('Tools→Import', 'livemesh-el-addons') ?></a></strong> and click Choose File. Upload the xml file and follow the steps to
                    import. When the demo data is finished importing, you will have many pages that contain elements
                    configured in them. </p>


                <hr>
                <h3 id="plugin-elements">Working with plugin elements<a class="back-to-top" href="#panel"><span
                                class="dashicons dashicons-arrow-up-alt2"></span> Back to top</a></h3>

                <ul>
                    <li>If you are new to drag and drop page building functions of <a href="https://wordpress.org/plugins/elementor/" target="_blank">Elementor</a> and need help, make sure you checkout the <a
                                href="http://docs.elementor.com/"
                                title="Elementor Documentation" target="_blank">documentation of the Elementor</a> before
                        starting to use this plugin. The site has numerous articles and tutorials to help you
                        get a head start on using the plugin.
                    </li>

                    <li>Once the Livemesh Addons for Elementor plugin is activated, you should see a menu item <strong> <a href="<?php echo admin_url() . 'admin.php?page=livemesh_el_addons'; ?>"
                                                                                                                       target="_blank"><?php echo __('Elementor Addons', 'livemesh-el-addons') ?></a></strong> in WordPress admin with five sections - Settings, Elements, Custom CSS, Debugging and Premium Upgrade.
                        <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/plugin-settings.png" alt="Elementor Addons Settings"></p>

                        <p>The settings screen <strong> <a href="<?php echo admin_url() . 'admin.php?page=livemesh_el_addons'; ?>"
                                                           target="_blank"><?php echo __('Elementor Addons→Settings', 'livemesh-el-addons') ?></a></strong> for the plugin is self-documenting with minimal
                            options. Make sure you choose the theme color scheme in the 'General' tab to help ensure the plugin takes this as the default color for elements like buttons and links which have default color set.</p>

                    </li>

                    <li>Once the Livemesh Addons for Elementor plugin is activated, all of the elements built by the plugin become available
                        for drag and drop in the frontend Elementor page builder. In the Page edit window, click on the <strong>'Edit with Elementor'</strong>
                        button below the title field of the page edit window to invoke the frontend page builder controls
                        of Elementor with the frontend page displayed on the right of the controls sidebar window.
                        <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/page-edit-window.png" alt="Elementor Page Builder Screen"></p>
                        <p>Clicking on the controls grid button at the top opens the page builder left sidebar with all of the elements grouped into multiple sections within the sidebar window.</p>
                        <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/page-builder-screen.png" alt="Elementor Page Builder Screen"></p>
                    </li>

                    <li>The plugin elements are grouped under <strong>'Livemesh Addons'</strong> section. Scroll down the
                        page builder controls window to view this section containing all of the elements part of this plugin.
                        Hover over an control listed in the section and drag it to the page on the right to add the
                        element to the page.
                        <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/add-element-window.png" alt="Page Builder Addons from Elementor"></p>
                    </li>

                    <li>In the page displayed on the right, clicking the element added to the page brings up the edit/configure window in the left Elementor sidebar window. <strong>Most of the element options are
                            self-documented</strong> but additional help is provided in the below sections for each of the Livemesh
                        elements.

                        <p>Once the elements are added and data required for them is entered, you can save the changes by
                            clicking on the <strong>'Save'</strong> button at the bottom right of the Elementor sidebar.</p>
                        <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/page-builder-screen.png" alt="Elementor Addon Edit Window"></p>

                    </li>


                    <li>Elementor being a frontend page builder, the changes you make in the edit window are rendered on the page immediately after you edit and changes values of the individual fields in the element
                        edit window. After you hit the <strong>Save</strong> button in the Elementor sidebar,the changes are saved permanently to the page.
                        <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/addon-rendered.png" alt="Elementor Addon Rendered"></p>

                    </li>

                    <li>Once you are done with building the page by adding elements to it and saving the changes, click on the cross/close button on the bottom left of the Elementor sidebar window to either return to the dashboard
                        or to open the page without the page builder controls.

                    </li>


                </ul>


                <hr>
                <h3 id="customization">How to customize output generated by addons<a class="back-to-top" href="#panel"><span
                                class="dashicons dashicons-arrow-up-alt2"></span> Back to top</a></h3>
                <p>The strength of this plugin over many others is that this plugin lets you customize almost any piece of HTML
                    generated by an addon part of the plugin. You can move around or modify the output elements to suit your
                    needs - change HTML tags, change sequence of information (e.g., place image at the bottom of the post in a
                    grid), add new CSS classes of your own, add branding material, delete unneeded output element (e.g. remove
                    post meta information), modify information (e.g., truncate description or excerpt generated) etc. with the
                    help of templates and filters provided by the plugin. </p>
                <p>Following are the two ways to customize the output of an addon part of the plugin.</p>
                <ul>
                    <li><p><strong>Filters</strong> are hooks that are provided at almost every customization opportunity that presents itself
                            as the addon renders the widgets by parsing the settings input by the user in the Elementor panel. <strong>About 200+ filters have been
                                provided</strong> to help users customize almost any information output by the addons of this plugin.</p>
                        <p>To locate the filters, the users are encouraged to have a look at the PHP code located in the <code>render()</code> function of
                            the respective addon file located in <code>includes/widgets/</code> folder.</p>

                        <p><a href="https://docs.presscustomizr.com/article/26-wordpress-actions-filters-and-hooks-a-guide-for-non-developers"
                              target="_blank">More about Filters - a guide for non-developers →</a></p>
                    </li>
                    <li><p><strong>Templates</strong> let you modify the HTML generated by an addon by placing an appropriately
                            named PHP file in a folder named 'elementor-addons' in your child theme (or parent theme).</p>
                        <p>Following are the names of the files that plugin looks for to customize the <i>respective</i> addon
                            rendering - <code> clients.php, carousel.php, heading.php, odometers.php, piecharts.php, posts-grid.php,
                            posts-carousel.php, pricing-table.php, services.php, stats-bars.php, team-members.php, testimonials.php,
                            testimonials-slider.php, accordion.php, button.php, faq.php, features.php, gallery.php, gallery-carousel.php,
                            icon-list.php, image-slider.php, posts-block.php, services-carousel.php, slider.php, tabs.php. </code></p>
                        <p>Once a particular template file is found in the theme folder, the corresponding addon rendering code is
                            replaced with that in the template PHP file. The template files are provided with <code>$settings</code> variable to
                        help read the addon settings and then display the output. The current output generated by the plugin addon can
                        be seen in the <code>render()</code> function of the addons PHP file located in <code>includes/widgets/</code> folder.<strong> In
                        most cases, it is recommended to copy over the rendering code from the <code>render()</code> function to the template
                        file and modify the same to achieve the desired customization</strong>. A basic knowledge of PHP and HTML is all that is
                        required to customize an addon.</p>
                    </li>
                </ul>

                <hr>
                <p>The below sections provide help on each of the elements/addons built as part of Livemesh Addons for Elementor
                    plugin.</p>

                <hr>
                <h3 id="heading-element">Heading Element<a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/heading-widget2.png" alt="Heading Element Rendered"></p>

                <p>The heading element is perhaps the most frequently used element on a page since it displays a heading
                    at the top of a section.</p>
                <p>It comes in three styles – Style 1, Style 2 and Style 3 which allow variations of headings displayed
                    in various sections.</p>

                <p>The heading consists of the main heading text which is renders as one of the HTML heading tags on the
                    frontend. Additionally, a short text is displayed below the heading and some of the heading styles
                    allow you to input a subtitle which is usually displayed on top of the main heading title.</p>
                <p>You can choose to align the heading left, right or center with center being the default
                    alignment.</p>
                <p>The <a href="https://livemeshelementor.com/pricing/" title="Livemesh Addons for Elementor Pro" target="_blank">premium version</a> of the plugin allows selection of a custom font for the heading title. You may
                    choose one of 500+ custom fonts hosted in the Google Fonts library. By default, the heading font
                    used by the theme is used for main heading title.</p>

                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/heading-widget-edit1.png" alt="Heading Element Edit Window"></p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/heading-widget-edit2.png" alt="Heading Element Edit Window"></p>

                <hr>
                <h3 id="services-element">Services Element<a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/services-widget2.png" alt="Services Element"></p>

                <p>Many agencies, freelancers, corporates, products/apps require capturing the services provided by the
                    agency or the features of a product. The services element is designed to help users capture these
                    services or features in a multi-column grid.</p>
                <p>The element supports about 3 different styles (with 2 additional styles in <a href="https://livemeshelementor.com/pricing/" title="Livemesh Addons for Elementor Pro" target="_blank">premium version</a> of the
                    plugin) and each of these styles can be customized further by choosing the type of icon desired to
                    represent the service – a font icon or an custom image icon. While the choice of font icons is huge
                    in number and perhaps sufficient for most common services, the icon images can help present the
                    unique nature of the services offered.</p>
                <p>Each of the service requires you to input a title for the service/feature and a short description of
                    the service offered or the product feature. Additionally, each service allows you to enter a font
                    icon or an icon image file to represent that service.</p>
                <p>The <a href="https://livemeshelementor.com/pricing/" title="Livemesh Addons for Elementor Pro" target="_blank">premium version</a> of the plugin allows you specify a custom font size, font color and and hover
                    color for the font icon along with providing two additional styles of services/features.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/services-widget-edit1.png" alt="Services Element Edit Window"></p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/services-widget-edit2.png" alt="Services Element Edit Window"></p>

                <p>Services element supports the following options –</p>
                <ul>
                    <li><strong>Columns per row</strong> – Number of services to display per row of services.</li>
                    <li><strong>Icon Custom Size</strong> – If the icon chosen for services is icon font, you can
                        specify a custom size for the font icon in pixels.
                    </li>
                    <li><strong>Icon Custom Color</strong> – Specify a custom color for the font icon.</li>
                    <li><strong>Icon Custom Hover Color</strong> – Specify a custom hover color for the font icon.</li>
                </ul>


                <hr>
                <h3 id="team-members">Team Members<a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/team-member2.jpg" alt="Team Members Element"></p>

                <p>This element provides an easy way to capture the team members of your organization or an agency. The
                    details captured include team member name, position, a short description and the email plus social
                    profile of the individual team members.</p>
                <p>Two different styles are provided with more styles planned in the <a href="https://livemeshelementor.com/pricing/" title="Livemesh Addons for Elementor Pro" target="_blank">premium version</a> of the plugin. Most
                    of the styles display the team members in a multi-column grid. The option to specify the number of
                    columns is provided that helps to control the number of team members displayed per row of the team
                    members.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/team-members-edit.png" alt="Team Members Element Edit Window"></p>

                <hr>
                <h3 id="statistics-elements">Statistics Elements<a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/statsbars-piecharts.png" alt="Statistics Elements"></p>

                <p>The plugin features a number of elements that help display statistical information in the form of
                    odometers, piecharts and stats bars.</p>
                <p>Most of these addons are designed to animate the display of the statistical information or numbers
                    when the users scroll down to the section containing the widget.</p>
                <p><strong>Odometers</strong></p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/odometers2.png" alt="Odometer Element"></p>

                <p>This element displays one or more animated odometer statistics in a multi-column grid. This number
                    statistic requires a start and an end value with a title and icon providing the information about
                    what the number represents – like a download number or number of products sold or customers
                    gained.</p>
                <p>The element animates from the start value to the end value when the user scrolls down to the section.
                    You can control the number of such odometers displayed per row.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/odometers-edit.png" alt="Odometer Edit Window"></p>

                <p><strong>Stats Bars</strong></p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/statsbars-piecharts.png" alt="Stats Bar Piechart Elements"></p>

                <p>Stats Bars capture percentage statistics like coverage area, skills gained, survey findings, usage
                    statistics etc. that typically require bar charts to represent them. Each statistical item requires
                    a percentage value, a title describing the number. The user can choose to display the bar charts in
                    multiple or single color with the help of color choice available with each value input.</p>
                <p>The element animates from the zero to the percentage value set for the item when the user scrolls down
                    to the section containing the widget. The bars are placed one below the other horizontally.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/stats-bars-edit.png" alt="Stats Bar Element Edit Window"></p>

                <p><strong>Piecharts</strong></p>
                <p>Piecharts provide an alternative way to display percentage stats. When the users scrolls down and the
                    chart becomes visible, the element animates from zero to percentage value provided for the statistic.
                    A bar of user chosen color moves along a track to display the percentage information. An option to
                    specify the number of charts displayed per row is provided.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/piecharts-edit1.png" alt="Piechart Element Edit Window"></p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/piecharts-edit2.png" alt="Piechart Element Edit Window"></p>

                <hr>
                <h3 id="testimonials-elements">Testimonials Elements<a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/testimonials.png" alt="Testimonials Element"></p>

                <p>The plugin features two addon elements for capturing testimonials received for your product or business or
                    services. Most agencies, corporates, small businesses, freelancers and products/apps require
                    testimonials to displayed prominently on the site to help convert visitors to customers. The two
                    elements provided are elegantly designed to achieve greater conversion rate.</p>
                <p>The testimonials information include details about the person/company endorsing the product/service;
                    details like name, company, website of this person/organization along with an image representing
                    this person/entity.</p>
                <p><strong>Testimonials</strong></p>
                <p>The regular <strong>testimonials widget</strong> displays multiple testimonials in a row with the
                    user having the option to specify the number of items per row. This is useful if you need a large
                    number of testimonials to be visible instantly when the user scrolls down to view the testimonials
                    section.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/testimonials-edit.png" alt="Testimonials Element Edit Window"></p>

                <p><strong>Testimonials Slider</strong></p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/testimonials2.png" alt="Testimonials Slider Element"></p>
                <p>The <strong>testimonials slider widget</strong> is useful for display of endorsements/recommendations
                    with large amount of text for each testimonial. The slider displays the testimonials as a slideshow
                    with multiple element options provided to control/customize this slideshow – options like speed of
                    switching, speed of animation, whether to pause the slideshow on hover, controls needed for manual
                    navigation by the user etc. The slider is completely responsive and touch swipe controls available
                    for easy navigation on smartphones/tablets.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/testimonials-slider-edit.png" alt="Testimonials Slider Edit Window"></p>
                <p>The testimonials slider provides quite a few options to customize the behavior of the slider. Options include slideshow speed, animation speed, slider navigation contols etc.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/testimonials-slider-settings.png" alt="Testimonials Slider Settings"></p>

                <hr>
                <h3 id="posts-carousel">Posts Carousel<a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/posts-carousel.jpg" alt="Post Carousel Element"></p>

                <p>The responsive carousel helps display posts or any custom post types like your portfolio entries with
                    controls available for easy navigation of the items displayed. The element features a Posts Query
                    window to help choose posts or custom posts to display. This powerful tool has number of fields to
                    control what gets displayed and in what order with an additional field available to provide query
                    arguments explained in the <a href="https://codex.wordpress.org/Class_Reference/WP_Query">codex
                        page</a>.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/posts-carousel-edit1.png" alt="Post Carousel Build Query Tool"></p>

                <p>The Posts Query tab has the following options for filtering posts –</p>
                <ol>
                    <li><strong>Post Types</strong> – Select the custom post type that you need the element for. By
                        default “All” is selected.
                    </li>
                    <li><strong>Taxonomies</strong> – If you need to filter the posts by specific category or taxonomy
                        terms, you can choose one or more of the taxonomy terms from this dropdown.
                    </li>
                    <li><strong>Post In</strong> – This field enabled you to specify the post ids of the posts or custom
                        post types you would like to include in your widget. Provide a comma separated list of Post IDs to display
                        in the carousel.
                    </li>
                    <li><strong>Posts Per Page</strong> – Set the number of posts you wish you display in the widget. If
                        the element does not support pagination, the number of posts chosen by the limited by the number
                        specified here. This is also the number of posts to display per page when the element supports
                        pagination as is the case with Posts Grid widget. Choosing the value zero makes the widget
                        all the selected posts.
                    </li>
                    <li><strong>Order By</strong> – Lets you decide on how you want the posts to be ordered – by
                        Published Date, by Post ID, by Menu Order etc. and whether you want the ordering by Ascending or
                        Descending.
                    </li>
                    <li><strong>Order</strong> – Can be ascending or descending sort order applied to the Order By paramter above.
                    </li>
                </ol>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/posts-carousel-edit.png" alt="Post Carousel Edit Window"></p>

                <p>The posts carousel has numerous other options to control the display of posts or custom post types.
                    Some of these are –</p>
                <ul>
                    <li><strong>Choose Taxonomy to display info</strong> – When the post info is displayed, the specific
                        taxonomy you want the info to use. For example, choosing category will display category
                        information for a posts while choosing ‘post_tag’ would display the tag information for posts.
                    </li>
                    <li><strong>Link images to Posts</strong> – Make the images link to the posts or custom post types
                        they represent.
                    </li>
                    <li><strong>Display post titles</strong> – Checking this box will display post title below the
                        featured image for the posts or custom post type.
                    </li>
                    <li><strong>Display post excerpt/summary</strong> – Display summary information for the posts below
                        the featured image and post title.
                    </li>
                    <li><strong>Post Meta</strong> – Display post meta information like published date, author name,
                        taxonomy information below the posts. The specific taxonomy chosen above under “Choose Taxonomy
                        to display info” will be used for display taxonomy information.
                    </li>
                </ul>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/posts-carousel-edit2.png" alt="Post Carousel Element Settings"></p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/posts-carousel-edit3.png" alt="Post Carousel Element Settings"></p>

                <p><strong>Carousel Settings</strong> – This section has options that control how the carousel is
                    displayed. Options include autoplay speed, gutter value between post items in various resolutions,
                    navigation controls for carousel, number of columns or items to display before making the user to
                    scroll for additional items etc.</p>
                <ul>
                    <li><strong>Prev/Next Arrows</strong> – Display navigation for the carousel.</li>
                    <li><strong>Show dot indicators for navigation</strong> – Display control navigation or pagination
                        controls for the carousel.
                    </li>
                    <li><strong>Autoplay</strong> – Display carousel as a slideshow.</li>
                    <li><strong>Autoplay speed in ms</strong> – The time between display of each page of images when
                        Autoplay option is enabled.
                    </li>
                    <li><strong>Autoplay animation speed in ms</strong> – The time taken for animation that moves the
                        carousel to next or previous page of items.
                    </li>
                    <li><strong>Pause on mouse hover</strong> – Pause the slideshow if the user has mouse hovered over
                        the carousel contents.
                    </li>
                    <li><strong>Columns per row</strong> – Number of gallery items visible at any given point of time
                        without scrolling.You can control the number of items visible at various resolutions like those of tablet/smartphone by providing
                        appropriate values in the 'Responsive' tab.
                    </li>
                    <li><strong>Columns to scroll</strong> – With each scroll action – using the prev/next arrows or the
                        dotted navigation, specify the number of items to scroll for each invocation of the navigation
                        controls. You can control the number of items to scroll at various resolutions like those of tablet/smartphone by providing
                        appropriate values in the 'Responsive' tab.
                    </li>
                    <li><strong>Gutter</strong> – The spacing in pixels between images/videos in the carousel. You can
                        control the spacing/gutter at various resolutions like those of tablet/smartphone by providing
                        appropriate values in the 'Responsive' tab.</li>
                </ul>

                <hr>
                <h3 id="carousel-element">Carousel<a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/generic-carousel.jpg" alt="Generic Carousel Element"></p>

                <p>Livemesh Carousel is a generic carousel of custom HTML content of your choice. Possibilities are endless – image
                    carousels with textual content describing the images, video carousels, event carousels with link to
                    the events, a carousel of team of volunteers, a collection of books sold on Amazon etc.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/livemesh-carousel-edit.png" alt="Generic Carousel Element Edit Window"></p>

                <p>If you need a carousel of custom content HTML of your choice, this element helps achieve the same. For
                    the HTML content, you will need to provide your own custom CSS under Settings for the carousel.
                    While posts carousel helps you display carousel items derived from posts or custom post types, this
                    element lets you display any well-formed HTML content as items in a carousel. You may use the
                    WordPress visual editor to construct the required content. </p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/livemesh-carousel-edit2.png" alt="Generic Carousel Settings Window"></p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/livemesh-carousel-edit3.png" alt="Generic Carousel Settings Window"></p>

                <p>The section ‘Carousel Settings’ has options that control how the carousel is displayed. Options
                    include autoplay speed, gutter value between post items in various resolutions, navigation controls
                    for carousel, number of columns or items to display before making the user to scroll for additional
                    items etc. The carousel settings are explained in the help section above for Posts Carousel.</p>
                <hr>
                <h3 id="grid-element">Posts Grid<a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/livemesh-grid.jpg" alt="Posts Grid Element"></p>

                <p>Perhaps the most popular and most important of all addons part of this plugin,
                    Posts Grid helps you build a multi-column grid of posts or custom post types. The posts displayed
                    are filterable by taxonomy terms.</p>

                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/livemesh-grid2.jpg" alt="Posts Grid Element"></p>
                <p>Using the Grid widget, you can construct a portfolio of your work/services/products. We recommend you
                    use the popular plugin – <a title="Portfolio Post Type Plugin"
                                                href="https://wordpress.org/plugins/portfolio-post-type/">https://wordpress.org/plugins/portfolio-post-type/</a>
                    for building a collection of portfolio entries. Once the portfolio entries are in place, make sure
                    you select Portfolio Post type under Post Type entry in Build Tools window as explained below.</p>

                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/livemesh-grid-pagination.jpg" alt="Posts Grid Pagination"></p>
                <p>The <a href="https://livemeshelementor.com/pricing/" title="Livemesh Addons for Elementor Pro" target="_blank">premium version</a> of the plugin has support for pagination, lazy load with load more button and
                    lightbox option for images. The additional posts are loaded via AJAX when the user navigates through
                    the pages populated or when the user hits the Load More button.</p>

                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/livemesh-grid-loadmore.jpg" alt="Posts Grid AJAX Load More"></p>

                <p>The element features a Posts Query window to help choose posts or custom posts to display. This
                    powerful tool has number of fields to control what gets displayed and in what order with an
                    additional field available to provide query arguments explained in the <a
                            href="https://codex.wordpress.org/Class_Reference/WP_Query">codex page</a>.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/build-posts-query-tool.png" alt="Build Post Query Tool"></p>

                <p>The Posts Query tab has the following options for filtering posts –</p>
                <ol>
                    <li><strong>Post Types</strong> – Select the custom post type that you need the element for. By
                        default “All” is selected.
                    </li>
                    <li><strong>Taxonomies</strong> – If you need to filter the posts by specific category or taxonomy
                        terms, you can choose one or more of the taxonomy terms from this dropdown.
                    </li>
                    <li><strong>Post In</strong> – This field enabled you to specify the post ids of the posts or custom
                        post types you would like to include in your widget. Provide a comma separated list of Post IDs to display
                        in the carousel.
                    </li>
                    <li><strong>Posts Per Page</strong> – Set the number of posts you wish you display in the widget. If
                        the element does not support pagination, the number of posts chosen by the limited by the number
                        specified here. This is also the number of posts to display per page when the element supports
                        pagination as is the case with Posts Grid widget. Choosing the value zero makes the widget
                        all the selected posts.
                    </li>
                    <li><strong>Order By</strong> – Lets you decide on how you want the posts to be ordered – by
                        Published Date, by Post ID, by Menu Order etc. and whether you want the ordering by Ascending or
                        Descending.
                    </li>
                    <li><strong>Order</strong> – Can be ascending or descending sort order applied to the Order By paramter above.
                    </li>
                </ol>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/livemesh-grid-edit1.png" alt="Posts Grid Edit Window"></p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/livemesh-grid-edit2.png" alt="Posts Grid Edit Window"></p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/livemesh-grid-edit3.png" alt="Posts Grid Edit Window"></p>

                <p>The grid element has numerous other options to control the display of posts or custom post types. Some
                    of these are –</p>

                <ul>
                    <li><strong>Choose Taxonomy to display and filter on</strong> – The terms of this taxonomy chosen
                        will be used for filtering the posts if ‘Filterable’ option is checked. When the post info is
                        displayed, the specific taxonomy you want the info to use. For example, choosing category will
                        make the posts filterable on category while choosing ‘post_tag’ would make the posts filterable
                        by post tags instead of category.
                    </li>
                    <li><strong>Choose a Layout for the grid</strong> – You may choose Masonry or Fit Rows layout for
                        the grid.
                    </li>
                    <li><strong>Pagination options (<span class="pro-feature">Pro!</span>)</strong>– Choose pagination type or choose None if no
                        pagination is desired. <strong>If you choose Paged or Load More option, make sure the ‘Post per
                            page’ field value is set in the Build Query window to control number of posts to display per
                            page.</strong><br>
                        – If the Pagination option chosen is Paged, the grid displays a paginated grid of entries with
                        links to various pages displayed at the bottom of the grid, provided sufficient number of
                        entries of this post type has been created by the user and the Posts Per Page value is set to a
                        lower value than the number of entries created.<br>
                        – If the Pagination option chosen is Load More, the grid displays a Load More button below the
                        grid of posts/portfolio with an option count of remaining posts/post types yet to loaded. When
                        the users hits the Load More button, a number of posts/portfolio entries equal to ‘Posts per
                        Page’ value will be lazy loaded into the element via AJAX. Upon loading all of the remaining
                        entries, the Load More button is no longer shown.<br>
                        Do check the option ‘Display count of posts yet to be loaded with the Load More button’ to
                        display the remaining post count with the Load More button.
                    </li>
                    <li><strong>Link images to Posts/Portfolio</strong> – Make the post images link to the posts or
                        custom post types they represent.
                    </li>
                    <li><strong>Enable Lightbox Gallery (<span class="pro-feature">Pro!</span>)</strong>– If checked, the images part of the grid entries
                        will have a lightbox option enabled to display a gallery of post images in a popup display.
                    </li>
                    <li><strong>Display post/project titles</strong> – Checking this box will display post/portfolio
                        entry title below the featured image for the posts or custom post type.
                    </li>
                    <li><strong>Display post/portfolio excerpt/summary</strong> – Display summary information for the
                        posts/portfolio items below the featured image and post title.
                    </li>
                    <li><strong>Post Meta</strong> – Display post meta information like published date, author name,
                        taxonomy information below the posts. The specific taxonomy chosen above under “Choose Taxonomy
                        to display and filter on” will be used for display taxonomy information.
                    </li>
                    <li><strong>Columns per row</strong> – The number of posts/portfolio items to display in each row on
                        desktop.
                    </li>
                    <li><strong>Gutter options</strong> – The spacing in pixels between each entry in the grid. If you
                        need a packed layout, specify zero here. You can control the gutter/spacing at various resolutions
                        like those of tablet/smartphone by providing appropriate values in the 'Responsive' tab.
                    </li>
                </ul>


                <hr>
                <h3 id="clients-element">Clients<a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/clients-widget.jpg" alt="Clients Element Edit Window"></p>

                <p>Whether you are freelancer or run a small business, agency or represent a big corporate house, you
                    have a list of clients that you have worked with. This element lets you create a list of these
                    clients with banner images representing these clients.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/clients-edit1.png" alt="Clients Element Edit Window"></p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/clients-edit2.png" alt="Clients Element Edit Window"></p>

                <p>For each of the client, you provide a client name, a banner image for the client and a URL for their
                    website. The client name is shown on user hovering over the banner image and title text is
                    optionally a link pointing to the website of the client, if that link is provided by the user.</p>
                <p>The collection of clients will be displayed in a multi-column grid. The ‘Columns per Row’ option lets
                    you control the number of client entries per row of clients displayed.</p>

                <hr>
                <h3 id="pricing-table">Pricing Table<a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/pricing-plan.png" alt="Pricing Plan Element"></p>

                <p>The pricing plans offered by your business can be captured with pricing plan widget. The pricing
                    plans are displayed in a multi-column grid.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/pricing-plan-edit.png" alt="Pricing Plan Edit Window"></p>

                <p>For each of the pricing plan, provide the following information –</p>
                <ul>
                    <li><strong>Pricing Plan Title</strong> – The title for the pricing plan like Standard, Premium,
                        Developer etc.
                    </li>
                    <li><strong>Tagline Text</strong> – Provide any subtitle or taglines like “Most Popular”, “Best
                        Value”, “Best Selling”, “Most Flexible” etc. that you would like to use for this pricing plan.
                        Usually displayed above the pricing plan title.
                    </li>
                    <li><strong>Image</strong> – Optional image or icon to represent the pricing plan.</li>
                    <li><strong>Price Tag</strong> – This is where you specify the actual price tag for the plan along
                        with the currency. HTML is allowed.
                    </li>
                    <li><strong>Text for Pricing Link/Button</strong> – Specify the text for the link or a button
                        displayed at the bottom of the pricing plan. This link takes the user to the purchase page.
                    </li>
                    <li><strong>URL for the Pricing link/button</strong> – Provide the target URL for the link or the
                        button shown for this pricing plan. This link takes the user to the purchase page. Check the
                        option ‘Open Button URL in a new window’ if you need the link to open the target page in a new
                        tab or window of the browser.
                    </li>
                    <li><strong>Highlight Pricing Plan</strong> – Specify if you want to highlight the pricing plan.
                        This would be most likely plan your user would choose to sign up for.
                    </li>
                    <li><strong>Pricing Columns per row</strong> – The number of pricing plans to display per row of
                        plans. Most businesses choose to fit in all of their plans into a single row.
                    </li>
                </ul>


                <hr>
                <h3 id="button-element">Buttons<a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/buttons.png" alt="Buttons Element"></p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/buttons2.png" alt="Buttons Element"></p>

                <p>The plugin lets you create buttons of multiple colors that you would use in your site. The supported
                    colors are Orange, Blue, Teal, Cyan, Green, Pink, Black, Red, Transparent and Semi Transparent (for
                    dark backgrounds). You can choose a custom color and custom hover color too for the button to create
                    a button of your chosen color.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/button-edit1.png" alt="Button Element Edit Window"></p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/button-edit2.png" alt="Button Element Edit Window"></p>

                <p>You may choose to create a button of Default color which is the color derived from the Theme Color
                    set in the plugin options.</p>
                <p>Additional options provided are button size, rounded and alignment – center, right, left and
                    None.</p>
                <p>You can choose to display an icon along with the button text. The icon can be a icon font or an
                    image.</p>
                <p>The element options are mostly self-explanatory and you can view a live preview of the buttons <a
                            title="Livemesh Elementor Button Element Demo"
                            href="https://livemeshelementor.com/buttons/">here</a>.</p>


                <hr>
                <h3 id="icon-list">Icon List<a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/icon-lists.png" alt="Icon Lists Element"></p>

                <p>The icon list element is extremely useful for creating a list of icons with optional links to sites or
                    pages that the icons represent. Examples include social media profiles, icon lists representing
                    payment options or download platforms or a quick summary of services.</p>
                <p>Each of the icons part of a list have a title, optional target URL and the icon itself can be a font
                    icon or an custom image. The title for the icon is displayed as a tooltip on mouse hover.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/icon-list-edit1.png" alt="Icon Lists Element Edit Window"></p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/icon-list-edit2.png" alt="Icon Lists Element Edit Window"></p>

                <p>Following options are available –</p>
                <ul>
                    <li><strong>Icon/Image size in pixels</strong> – Custom size of the icons displayed.</li>
                    <li><strong>Icon color</strong> – If the icons chosen are font icons, you may specify a custom color
                        for the icons.
                    </li>
                    <li><strong>Icon hover color</strong> – The color of the font icons on mouse hover.</li>
                    <li><strong>Open the links in new window</strong> – If a target URL is specified for a link, whether
                        the links should open in a new window.
                    </li>
                    <li><strong>Alignment</strong> – The icon list can be chosen to align at the center, left, right of
                        it’s position in a page.
                    </li>
                </ul>

                <hr>
                <h3 id="tabs-accordions">Tabs and Accordions – <span class="pro-feature">Pro!</span><a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/tab-widget.jpg" alt="Tabs Elements"></p>

                <p>A large of finely designed styles are supported by tabs function of the plugin. Tabs can be of two
                    types – vertical and regular horizontal style tabs. </p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/tabs-widget2.jpg" alt="Tabs Elements"></p>
                <p>There are a total of 10 tab styles to choose
                    from. There is simply no another plugin or theme that supports so many elegant styles for tabs.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/tabs-edit.png" alt="Tabs Element Edit Window"></p>

                <p>Tabs required two attributes – a tab title and tab content. For styles that support icons, choice of
                    displaying a font icon or an icon image along with the tab title is supported.</p>
                <p>Mobile Resolution – Indicate the device resolution in pixels for displaying the tab in responsive
                    mobile mode. The tabs are designed to work well in all device resolutions without sacrificing
                    usability.</p>
                <p><strong>Accordions</strong></p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/accordions.png" alt="Accordion Element"></p>

                <p>Accordions support panels that are collapsed by default. The panels can be opened by clicking on
                    panel title bar.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/accordion-edit.png" alt="Accordion Element Edit Window"></p>

                <p>Each of the panels part of an accordion require the user to input a tab title and tab content.</p>
                <p>Option to allow multiple panels to be open is provided.</p>

                <hr>
                <h3 id="image-slider">Image Slider – <span class="pro-feature">Pro!</span><a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/image-slider-flex.jpg" alt="Image Slider Element"></p>

                <p>The image slider lets you create a responsive slider of images with a multiple options to customize
                    the function and presentation of the slider. The slider can be used anywhere on a page and can also
                    function as the main slider of the page displayed at the top of the page. The slider supports
                    multitude of options but for most users, the default options provided should suffice.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/image-slider-edit.png" alt="Image Slider Element Edit Window"></p>

                <ul>
                    <li><strong>Class</strong> – Set a unique CSS class for the slider. (optional). This lets you
                        customize the slider content, specially the slider caption content via Custom CSS.
                    </li>
                    <li><strong>Slider Type</strong> – The slider provides you with the choice of four popular slider
                        libraries – Flex Slider, Nivo Slider, Slick Slider and Responsive Slider.
                    </li>
                    <li><strong>Flex Slider</strong> – Perhaps the most popular of all and actively maintained by the
                        open source community. Provides features like touch navigation, thumbnail navigation and many
                        options to customize the slider.
                        <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/image-slider-flex.jpg" alt="Image Flex Slider Element"></p>
                    </li>
                    <li><strong>Nivo Slider</strong> – Has been a very popular slider for many years now and loved by
                        many for number of beautiful transition effects that is supports.

                        <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/image-slider-nivo.jpg" alt="Nivo Image Slider Element"></p>
                    </li>
                    <li><strong>Slick Slider</strong> – The most popular open source library for building carousels.
                        Responsive controls like touch swipe controls, desktop mouse dragging makes it a compeling
                        choice.
                    </li>
                    <li><strong>Responsive Slider</strong> – Simplest and most lightweight of all sliders (just 1 KB in
                        size minified and gzipped). If you need a slider that uses minimal resources, this option should
                        be worth trying out.
                        <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/image-slider-responsive.jpg" alt="Responsive Image Slider Element"></p>
                    </li>
                    <li><strong>Choose Caption Style</strong> – There are two styles of captions – one center aligned
                        and the other left aligned. While center aligned caption is more suited to situation where the
                        slider image is functioning more like a background for the caption that is a call to action or a
                        message to the visitor, the style 2 is useful when images speak for themselves and captions
                        describe the images.
                    </li>
                </ul>
                <p>Each slide for the slider allow for following options –</p>
                <ul>
                    <li><strong>Slide Image</strong> – The image for the slide itself.</li>
                    <li><strong>URL to link to by image and caption heading</strong>. (optional) – Specify the URL to
                        which the slide image and caption heading should link to.
                    </li>
                </ul>
                <p>Slider Caption Details</p>
                <ul>
                    <li><strong>Caption Heading</strong> – The heading title for the caption</li>
                    <li><strong>Caption Sub-heading(Optional)</strong> – Subtitle for the caption.</li>
                    <li><strong>Button text</strong> – The text for the button displayed below the caption.</li>
                    <li><strong>Button URL</strong> – URL for the button.</li>
                    <li><strong>Open URL in a new window</strong> – Specify the button click opens the link in a new
                        browser window.
                    </li>
                    <li><strong>Button Color</strong> – The color of the button. The supported colors are Orange, Blue, Teal,
                        Cyan, Green, Pink, Black, Red, Transparent and Semi Transparent.
                    </li>
                    <li><strong>Button Size</strong> – Can be large, medium or small.</li>
                    <li><strong>Rounded button?</strong> – Make the button display with rounded edges.</li>
                </ul>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/image-slider-edit2.png" alt="Image Slider Settings"></p>

                <p><strong>Slider Settings</strong> – The element has a number of options available for customizing the
                    slider experience –</p>
                <ul>
                    <li><strong>Animation</strong> – Can be Slide or Fade. Applies when the slider type chosen is Flex
                        Slider or the Slick slider. Nivo supports a number of custom transitions while Responsive slider
                        is fade only.
                    </li>
                    <li><strong>Sliding Direction</strong> – Can be vertical or horizontal. Supported by Flex and Slick
                        sliders.
                    </li>
                    <li><strong>Control navigation</strong> – Create navigation for paging control of each slide.</li>
                    <li><strong>Direction navigation</strong> – Create navigation for previous/next navigation.</li>
                    <li><strong>Thumbnails Navigation</strong> – Use slider image thumbnails for slider navigation.
                        Supported by Flex and Nivo sliders.
                    </li>
                    <li><strong>Randomize slides</strong> – Display slides in random order.</li>
                    <li><strong>Pause on hover</strong> – Pause the slideshow when hovering over slider, then resume
                        when no longer hovering.
                    </li>
                    <li><strong>Pause on action</strong> – Pause the slideshow when interacting with control elements.
                        Supported by Flex Slider only.
                    </li>
                    <li><strong>Loop</strong> – Should the animation loop?</li>
                    <li><strong>Slideshow or Autoplay</strong> – Animate slider automatically without user intervention.
                    </li>
                    <li><strong>Slideshow speed (default – 5000)</strong> Set the speed of the slideshow cycling, in
                        milliseconds when the Slideshow option is checked.
                    </li>
                    <li><strong>Animation speed</strong> – Set the speed of animations like fade or slide, in
                        milliseconds.
                    </li>
                </ul>

                <hr>
                <h3 id="image-video-gallery">Image/Video Gallery – <span class="pro-feature">Pro!</span><a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/image-gallery-dark.jpg" alt="Image Gallery Element"></p>

                <p>This powerful element lets you create a gallery of images or videos displayed in a multi-column grid.
                    An instance of this element can capture a portfolio of work like that of a photographer or graphic
                    designer/artist. <strong>Recent versions of the plugin added a nifty 'Bulk Upload' option to this addon to
                        help choose multiple images and create image galleries instantly.</strong></p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/video-gallery.jpg" alt="Video Gallery Element"></p>
                <p>It can be used to create a gallery of videos uploaded to YouTube/Vimeo – useful for video bloggers,
                    video tutorial sites, video marketers, small businesses or websites with a major presence on
                    YouTube/Vimeo. The videos can be played with a single click of the play button on the gallery item
                    as seen in this <a title="Video Gallery"
                                       href="https://livemeshelementor.com/video-gallery/">demo page</a>.
                </p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/image-gallery-edit1.png" alt="Image Gallery Element Edit Window"></p>
                <p>The configuration for creating a video gallery is similar to that of image gallery; a video URL would be required along with image that acts as a placeholder.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/video-gallery-edit.png" alt="Video Gallery Element Edit Window"></p>

                <p>Each of the gallery items capture following information –</p>
                <ul>
                    <li><strong>Item Type</strong> – Can be a Image or YouTube Video or Vimeo Video.</li>
                    <li><strong>Item Label</strong> – The label or name for the gallery item. This label is displayed on
                        mouse hover over the image.
                    </li>
                    <li><strong>Gallery Image</strong> – The image for the gallery item. If item type chosen is YouTube
                        or Vimeo video, the image will be used as a placeholder image for video.
                    </li>
                    <li><strong>Item Tag(s)</strong> – One or more comma separated tags for the gallery item. Useful
                        when items are made filterable.
                    </li>
                    <li><strong>Page URL</strong> – The URL of the page to which the image gallery item points to
                        (optional).
                    </li>
                    <li><strong>Video URL</strong> – If the item represents a Vimeo or YouTube video, provide the URL to
                        the video. Any gallery item representing a video is given a play button. Upon clicking the play
                        button, the Vimeo/YouTube video opens up in a lightbox window for playing.
                    </li>
                </ul>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/image-gallery-edit2.png" alt="Image Gallery Element Edit Window"></p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/image-gallery-edit3.png" alt="Image Gallery Element Edit Window"></p>

                <p>The Gallery element comes with following settings –</p>
                <ul>
                    <li><strong>Filterable</strong> – If the videos or images are tagged, the items can be made
                        filterable on the tags specified by the user just like a Portfolio Grid.
                    </li>
                    <li><strong>Layout for the grid</strong> – Comes with Masonry and FitRows option. You can create stunning
                    masonry style grid by choosing a wide width option for the image in the Insert Media window or in the
                        Edit Gallery window when you choose 'Bulk Upload' option for the images. The flexibility in height
                        of the image for masonry layout is achieved automatically by uploading an image of custom height.</li>
                    <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/image-gallery-pagination.jpg" alt="Image Gallery Element Pagination"></p>
                    <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/image-gallery-loadmore.jpg" alt="Image Gallery Element Load More Option"></p>
                    <li><strong>Pagination</strong> – Choose pagination type or choose None if no pagination is desired.
                        Make sure you enter the items per page value in the option ‘Number of items to be displayed per
                        page and on each load more invocation’ field below to control number of items to display per
                        page.
                        <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/video-gallery-pagination.jpg" alt="Video Gallery Element Pagination"></p>
                    </li>

                    <li><strong>Columns per row</strong> – Specify the number of images/videos to display per row of the
                        grid.
                    </li>
                    <li><strong>Enable Lightbox Gallery</strong> – The lightbox for the image opens up a bigger image in
                        a popup window. You can navigate among the gallery items here.
                    </li>
                    <li><strong>Gutter</strong> – The spacing between columns that contain image/video in the grid. You
                        can control the spacing/gutter at various resolutions like those of tablet/smartphone.
                    </li>
                </ul>

                <hr>
                <h3 id="image-video-carousel">Image/Video Carousel – <span class="pro-feature">Pro!</span><a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/image-carousel.jpg" alt="Image Carousel Element"></p>

                <p>You can create a carousel of images/videos (or a combination of both) for showcasing your work or
                    video content uploaded to Vimeo/YouTube. An instance of this element can capture a portfolio of work
                    like that of a photographer or graphic designer/artist.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/video-carousel.jpg" alt="Video Carousel Element"></p>
                <p>It can be used to create a carousel of videos uploaded to YouTube/Vimeo – useful for video bloggers,
                    video tutorial sites, video marketers, small businesses or websites with a major presence on
                    YouTube/Vimeo. The videos can be played with a single click of the play button on the gallery item
                    as seen in this <a title="Video Gallery"
                                       href="https://livemeshelementor.com/video-gallery/">demo page</a>.
                </p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/image-carousel-edit.png" alt="Image Carousel Element Edit Window"></p>
                <p>The option for creation of video carousel is similar to that of image carousel - requires input of URL for the Vimeo/YouTube video along with placeholder image. </p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/video-carousel-edit.png" alt="Video Carousel Element Edit Window"></p>

                <p>Each of the gallery items in the carousel capture following information –</p>
                <ol>
                    <li><strong>Item Type</strong> – Can be a Image or YouTube Video or Vimeo Video.</li>
                    <li><strong>Item Label</strong> – The label or name for the gallery item. This label is displayed on
                        mouse hover over the image.
                    </li>
                    <li><strong>Gallery Image</strong> – The image for the gallery item. If item type chosen is YouTube
                        or Vimeo video, the image will be used as a placeholder image for video.
                    </li>
                    <li><strong>Item Tag(s)</strong> – One or more comma separated tags for the gallery item. Useful
                        when items are made filterable.
                    </li>
                    <li><strong>Page URL</strong> – The URL of the page to which the image gallery item points to
                        (optional).
                    </li>
                    <li><strong>Video URL</strong> – If the item represents a Vimeo or YouTube video, provide the URL to
                        the video. Any gallery item representing a video is given a play button. Upon clicking the play
                        button, the Vimeo/YouTube video opens up in a lightbox window for playing.
                    </li>
                </ol>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/image-carousel-edit2.png" alt="Image/Video Carousel Settings"></p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/image-carousel-edit3.png" alt="Image/Video Carousel Settings"></p>

                <p>The section ‘Carousel Settings’ has options that control how the carousel is displayed. Options
                    include autoplay speed, gutter value between post items in various resolutions, navigation controls
                    for carousel, number of columns or items to display before making the user to scroll for additional
                    items etc.</p>
                <ul>
                    <li><strong>Enable Lightbox Gallery</strong> – Enable lightbox gallery for images. The lightbox for
                        the image opens up a bigger image in a popup window. You can navigate among the gallery items
                        here.
                    </li>
                    <li><strong>Prev/Next Arrows</strong> – Display navigation for the carousel.</li>
                    <li><strong>Show dot indicators for navigation</strong> – Display control navigation or pagination
                        controls for the carousel.
                    </li>
                    <li><strong>Autoplay</strong> – Display carousel as a slideshow.</li>
                    <li><strong>Autoplay speed in ms</strong> – The time between display of each page of images when
                        Autoplay option is enabled.
                    </li>
                    <li><strong>Autoplay animation speed in ms</strong> – The time taken for animation that moves the
                        carousel to next or previous page of items.
                    </li>
                    <li><strong>Pause on mouse hover</strong> – Pause the slideshow if the user has mouse hovered over
                        the carousel contents.
                    </li>
                    <li><strong>Columns per row</strong> – Number of gallery items visible at any given point of time
                        without scrolling. You can control the number of items visible at various resolutions like those of tablet/smartphone by providing
                        appropriate values in the 'Responsive' tab.
                    </li>
                    <li><strong>Columns to scroll</strong> – With each scroll action – using the prev/next arrows or the
                        dotted navigation, specify the number of items to scroll for each invocation of the navigation
                        controls. You can control the number of items to scroll at various resolutions like those of tablet/smartphone by providing
                        appropriate values in the 'Responsive' tab.
                    </li>
                    <li><strong>Gutter</strong> – The spacing in pixels between images/videos in the carousel. You can
                        control the spacing/gutter at various resolutions like those of tablet/smartphone by providing
                        appropriate values in the 'Responsive' tab.</li>
                </ul>

                <hr>
                <h3 id="faq-element">FAQ- <span class="pro-feature">Pro!</span><a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/faq-widget.png" alt="FAQ Element"></p>

                <p>The FAQ makes the task of creating a FAQ for a site effortless. Just enter FAQ items and choose the
                    number of items to show per row of content and you are done.</p>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/faq-edit.png" alt="FAQ Element Edit Window"></p>

                <p>Each FAQ item requires two input – question and an answer for the question part of the FAQ.</p>
                <p>Do note that the Accordion function of the plugin too can be used to create a nicely formed FAQ for a
                    site.</p>

                <hr>
                <h3 id="features-element">Features- <span class="pro-feature">Pro!</span><a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/features-widget.jpg" alt="Features Element"></p>

                <p>Features element lets you showcase a number of things. Below are some examples although possibilities are many - </p>

                <ul>
                    <li>Features of a product like a mobile app or other types of software.</li>
                    <li>Showcase features provided by an online service or a tool.</li>
                    <li>List a set of services an agency or organization may provide.</li>
                    <li>Describe any type of physical or digital goods you are trying to sell.</li>
                </ul>

                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/features-edit.png" alt="Features Element Edit Window"></p>

                <p>Any feature part of the features element requires you input an icon image or a screeshot which
                    represents the feature you are describing. Aside from the icon or screenshot, you will need to
                    provide details like heading title, subtitle and description of the feature.</p>

                <p>The features element has an option to apply popular tile-based design to the features list (screenshot
                    below). The examples of this is seen in the demo site showcasing the features widget.</p>

                <p><img class="alignnone size-large" src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/features-widget2.jpg" alt="Tiled Features Element"></p>

                <hr>
                <h3 id="plugin-support">Plugin Support</span><a class="back-to-top" href="#panel"> Back to top</a></h3>
                <p>If you have queries or issues to report related to the plugin, please submit the same through our <a href="https://livemeshelementor.com/contact-us/" title="Livemesh Contact form">website contact form</a>. This will create a support ticket in our support portal.</p>

            </div>

            <!-- Updates panel -->
            <div id="plugins-panel" class="panel-left">
                <h4>Required/Recommended Plugins</h4>

                <p>Below is a list of required/recommended plugins to install that will help you get the most out of the plugin. While Elementor plugin is required, the rest of the plugins are optional but we recommend you install these plugins if you plan to replicate the plugin demo site by importing the sample data.</p>

                <hr/>

                <h4><?php _e('Elementor', 'livemesh-el-addons'); ?>
                    <?php if (!class_exists('Elementor\Plugin')) { ?>
                        <a class="button button-secondary thickbox onclick" href="<?php echo esc_url($elementorUrl); ?>"
                           title="<?php esc_attr_e('Install Elementor', 'livemesh-el-addons'); ?>"><span
                                    class="dashicons dashicons-download"></span> <?php _e('Install Now', 'livemesh-el-addons'); ?></a>
                    <?php }
                    else { ?>
                        <span class="button button-secondary disabled"><span
                                    class="dashicons dashicons-yes"></span> <?php _e('Installed', 'livemesh-el-addons'); ?></span>
                    <?php } ?>
                </h4>

                <p><strong>Elementor</strong> is one of the most popular frontend page builder tool for WordPress powering
                    over 100,000+ sites. You can build any layout you can imagine with intuitive drag and drop builder
                    with little or no programming knowledge.</p>
                <p>All of the elements part of Livemesh Addons for Elementor plugin were built using the API provided
                    by the Elementor plugin and hence this plugin must be installed and activated on the site prior
                    to using our plugin.</p>
                <p>All of the pages of our demo site for
                    the plugin have been built using this page builder. You should install and activate this plugin
                    prior to replicating the plugin demo site by importing the sample data provided.</p>

                <hr/>

                <h4><?php _e('Portfolio Post Type', 'livemesh-el-addons'); ?>
                    <?php if (!class_exists('Portfolio_Post_Type')) { ?>
                        <a class="button button-secondary thickbox onclick" href="<?php echo esc_url($portfolioPostTypeUrl); ?>"
                           title="<?php esc_attr_e('Install Portfolio Post Type', 'livemesh-el-addons'); ?>"><span
                                    class="dashicons dashicons-download"></span> <?php _e('Install Now', 'livemesh-el-addons'); ?></a>
                    <?php }
                    else { ?>
                        <span class="button button-secondary disabled"><span
                                    class="dashicons dashicons-yes"></span> <?php _e('Installed', 'livemesh-el-addons'); ?></span>
                    <?php } ?>
                </h4>

                <p><strong>Portfolio Post Type</strong> is a free plugin that registers a custom post type for
                    portfolio items. It also registers separate portfolio taxonomies for tags and categories. The
                    Portfolio grid instances showcased on our demo site was built using custom post types registered
                    by Portfolio Post Type plugin.</p>
            </div><!-- .panel-left -->

            <!-- Support panel -->
            <div id="support-panel" class="panel-left">
                <ul id="top" class="anchor-nav">
                    <li>
                        <a href="#faq-compatibility"><strong>Does it work with the theme that I am using?</strong></a>
                    </li>
                    <li>
                        <a href="#faq-dark-version"><strong>How to enable the dark version for any element?</strong></a>
                    </li>
                    <li>
                        <a href="#faq-portfolio-grid"><strong>My portfolio does not show any items.</strong></a>
                    </li>
                </ul>

                <h3 id="faq-compatibility">Does it work with the theme that I am using?</h3>

                <p>Our tests indicate that the elements work well with most themes that are well coded. You may need some
                    minor custom CSS with themes that hijack the styling for heading tags by using !important
                    keyword.</p>

                <p>The demo site is best recreated with a theme that supports a full width page template without
                    sidebars. The elements can still be used in the pages of default template.</p>


                <hr/>

                <h3 id="faq-dark-version">How to enable the dark version for any element?</h3>

                <p>In Elementor page builder, edit the section wrapper for the element representing a row of elements. Navigate to the 'Advanced'
                    tab of the 'Edit Section' sidebar window. Scroll down to the bottom of this tab to the 'Advanced' section and input
                    class ‘lae-dark-bg’ in the 'CSS     Classes' field to activate the dark version of an element.</p>

                <hr/>

                <h3 id="faq-portfolio-grid">My portfolio grid does not show any items.</h3>

                <p>Pls install and activate the <a href="https://wordpress.org/plugins/portfolio-post-type/" title="Portfolio Post Type">Portfolio Post Type plugin</a> to enable custom post type Portfolio.
                </p>

                <hr/>
            </div><!-- .panel-left support -->

            <!-- Updates panel -->
            <div id="updates-panel" class="panel-left">

                <h2>Change Log for the Premium Version</h2>
                <h3>4.1.1</h3>
                <ul>
                    <li>Added - Adaptive height option for single slide Posts Carousel</li>
                    <li>Fixed - Class does not exist error when registering document types/li>
                </ul>
                <h3>4.1.0</h3>
                <ul>
                    <li> Added - Compatibility with Elementor 3.0</li>
                    <li> Fixed - Method get_site_editor_type does not exist error when loading Theme Builder in Elementor PRO</li>
                </ul>
                <h3>4.0.0</h3>
                <ul>
                    <li>Added - Choice of 'Custom Skin' and 'Custom Grid' for posts grid items to design your custom posts grid and/or custom posts grid item using theme builder templates in Elementor PRO. You can now create custom skins for grid items and also create custom grid layout via drag and drop of page builder elements in Elementor.</li>
                    <li>Added - Choice of 'Custom Skin' for posts carousel items with ability to use theme builder templates for designing your own posts carousel. The custom skins for posts carousel items can now be designed via drag and drop of page builder elements in Elementor.</li>
                    <li>Added - Design custom skin for items of Posts Carousel and Posts Grid with custom choice of fields and their arrangement using Elementor page builder.</li>
                    <li>Added - Ability to choose separate Skin Templates for individual items within a Posts Grid. A single Posts Grid can now feature disparate set of grid items which utilize individual skins of their choice.</li>
                    <li>Added - Ability to use any custom post type with custom fields(including ACF/Pods/Toolset) for Posts Grid and Posts Carousel items. </li>
                    <li>Added - You can now drag and drop widgets in Elementor to build custom carousels/sliders and grids of Services, Events, Features, Team, Testimonials, Posts Grid, Posts Carousels etc. by utilizing the custom grid and grid item templates feature built into Posts Carousel and Posts Grid widgets. Possibilities for building custom carousels and grids are endless with dynamic widgets and page building experience provided by Elementor and data provided by custom post types and ACF/Pods/Toolset plugins. </li>
                    <li>Added - Added two theme builder template locations Livemesh Item and Livemesh Grid to help build custom grids and custom skins for posts grid and posts carousel widgets.</li>
                    <li>Added - Pagination, Next/Previous, Load More and Load on Scroll/Infinite Scroll support for Posts Grid featuring custom grids and those featuring custom grid items.</li>
                    <li>Added - Filters using custom taxonomy terms or categories/tags work for those Posts Grid instances which feature user designed custom grids</li>
                    <li>Fixed - The posts carousel does not show arrow navigation controls on smartphones</li>
                </ul>
                <h3>3.0.0</h3>
                <ul>
                    <li>Added - Options to turn off/on title and taxonomy terms displayed on posts carousel thumbnail</li>
                    <li>Added - Open in new window option for post links in posts carousel</li>
                    <li>Added - Ability to add read more link for the posts carousel</li>
                    <li>Added - Styling for read more link for the posts carousel</li>
                    <li>Fixed - The posts carousel article would populate wrong style classes</li>
                    <li>Fixed - The WP filters/hooks in posts carousel received page id as post id</li>
                </ul>
                <h3>2.9.9</h3>
                <ul>
                    <li>Fixed - The posts carousel and posts grid can cause error when the taxonomy terms are missing.</li>
                </ul>
                <h3>2.9.8</h3>
                <ul>
                    <li>Fixed - The posts block and posts grid addons would allow a max of 100 words for post excerpts.</li>
                    <li>Fixed - The display taxonomy option not enabled for 'Grid Style 5' and 'Post Meta' section is empty in the Posts Grid addon settings.</li>
                </ul>
                <h3>2.9.7</h3>
                <ul>
                    <li>Tweak - Enabled lazy load for all the widgets except for the grid/gallery addons - Posts Grid, WooCommerce Grid, YouTube Grid, Vimeo Grid, Twitter grid, Instagram Grid, Video and Image Gallery. These Grid and Gallery addons utilize the popular Isotope library for laying out grid elements and Isotope library is not compatible with lazy loading of images.</li>
                </ul>
                <h3>2.9.6</h3>
                <ul>
                    <li>Updated - Freemius SDK 2.3.2 with Opt-In / Out Enhancements, User Change, and More.</li>
                    <li>Added - The Posts Grid, Posts Block, Posts Carousel and Image/Video Gallery addons are now compatible with most of the popular lazy load plugins.</li>
                </ul>
                <h3>2.9.5</h3>
                <ul>
                    <li>Added - WooCommerce support for Posts Grid. You can now create a AJAX powered grid of products with all details relevant to products captured as part of the grid - alternate image, product name, sale price, rating, add to cart button, sale indicator, add to wish list etc.</li>
                    <li>Added - Two new styles to the Posts Grid exclusive to WooCommerce products. </li>
                    <li>Added - Quick view option for WooCommerce products. You can now view all major details of a product in a modal window without leaving the page housing the WooCommerce grid.</li>
                    <li>Added - A readme.txt for the premium version of the plugin. The readme.html file has been removed.</li>
                </ul>
                <h3>2.9.4</h3>
                <ul>
                    <li>Updated - Freemius SDK 2.3.1 with white label mode, URL whitelisting and other features and bug fixes.</li>
                    <li>Fixed - The social icons were not being displayed for team member profiles.</li>
                </ul>
                <h3>2.9.3</h3>
                <ul>
                    <li>Added - Instagram Grid/Gallery widget that displays images and videos by talking to unofficial Instagram API.</li>
                    <li>Added - Display images and videos in Instagram Grid given one or more user names or hash tags.</li>
                    <li>Added - Display excerpt, user account name/avatar, posted date, likes/views/comments count of Instagram images/videos, as provided by Instagram API.</li>
                    <li>Added - Display Instagram user account header with information like account name, logo, website, full name, account stats and account description, as provided by Instagram API.</li>
                    <li>Added - Three skins for display of Instagram posts.</li>
                    <li>Note - The addon talks to unofficial API provided by Instagram and hence changes to the API by Facebook can break the widget. The official API of Instagram is restrictive and evolving; we may move to the same at a later date.</li>
                    <li>Added - Display of title and description in the lightbox popup for Vimeo and YouTube videos in Vimeo and YouTube Grid widgets. </li>
                </ul>
                <h3>2.9.2</h3>
                <ul>
                    <li>Added - Vimeo Video Grid/Gallery widget that connects to Vimeo Developer API to display videos automatically from Vimeo.</li>
                    <li>Added - Display videos in Vimeo Grid given a User ID, Channel ID, Album ID or a Group ID.</li>
                    <li>Added - Large number of sort options for display of videos like alphabetical, posted date, modified date, view count, number of likes, comments number and video duration.</li>
                    <li>Added - Display title, excerpt, user account name/avatar, categories, posted date, duration, views/likes/comments count of Vimeo videos, as provided by Vimeo API.</li>
                    <li>Added - Display Vimeo user account header with information like account name, logo, website, location, account stats and account description, as provided by Vimeo API.</li>
                    <li>Fixed - Some navigation elements like the slider/carousel next/previous, accordion/tab open/close were displaying wrong icons.</li>
                </ul>
                <h3>2.9.1</h3>
                <ul>
                    <li>Added - YouTube Video Grid/Gallery widget that connects to YouTube Developer API to display videos automatically from YouTube.</li>
                    <li>Added - Display videos in YouTube Grid given a Channel ID, Playlist ID or a list of video IDs.</li>
                    <li>Added - Display title, excerpt, channel name/avatar, posted date, duration, views/likes/comments count of YouTube videos, as provided by YouTube API.</li>
                    <li>Added - Display YouTube channel header with information like channel name, banner, avatar, channel stats and channel description, as provided by YouTube API.</li>
                </ul>
                <h3>2.9</h3>
                <ul>
                    <li>Added - Load on Scroll (Infinite Scroll) for Posts Grid, Posts Block and Image/Video Gallery modules.</li>
                    <li>Fixed - A short delay in loading the posts and gallery items after the loading indicator has turned off when using load more option.</li>
                    <li>Fixed - The HTML5 videos would autoplay in the background under certain conditions.</li>
                </ul>
                <h3>2.8</h3>
                <ul>
                    <li>Added - RTL Support for ALL modules.</li>
                    <li>Added - The grid items on all relevant modules like Posts Grid, Posts Block, Gallery, Testimonials, Services, Pricing Table, Icon List, Clients, Stats, Team Members, FAQ etc. are now displayed from right to left on RTL sites.</li>
                    <li>Fixed - Sliders and Carousels including Posts Carousel, Gallery Carousel do not display slide content on RTL sites.</li>
                    <li>Fixed - Icons not showing up in tabs.</li>
                    <li>Fixed - Some styles broken on tabs.</li>
                    <li>Fixed - Full screen on YouTube videos lightbox broken on Safari browser.</li>
                    <li>Fixed - Subtitle not displayed for Services Carousel.</li>
                    <li>Fixed - Styling for Services Carousel was not taking effect.</li>
                </ul>
                <h3>2.7.5</h3>
                <ul>
                    <li>Added - Support for Related Posts and Current Query in Posts Grid, Posts Carousel and Posts Block modules. These modules can now be effectively used in Elementor Theme builder templates.</li>
                    <li>Added - Support for FontAwesome 5 Icon Library in all relevant modules where icons are used.</li>
                </ul>
                <h3>2.7.4</h3>
                <ul>
                    <li>Added - Support for external page link in services, services carousel, features and team member modules.</li>
                    <li>Added - Missing dark background styles for services, services carousel, features and team member modules.</li>
                </ul>
                <h3>2.7.3</h3>
                <ul>
                    <li>Fixed - The taxonomy chosen dropdown displaying superfluous taxonomies in the dropdown for Posts Grid/Posts Block.</li>
                    <li>Fixed - Some taxonomies and/or their terms missing from taxonomy terms selection in query builder of Posts Grid, Posts Block and Posts Carousel.</li>
                    <li>Fixed - The order of the taxonomy terms in the taxonomy terms selection in query builder not same as order specified in taxonomy reordering plugins.</li>
                    <li>Fixed - Not able to sort the filters of the Posts Grid/Posts Block instances with taxonomy reordering plugins.</li>
                    <li>Fixed - Cannot display taxonomy terms for the post in block styles 7,8 and 9 of Posts Block.</li>
                </ul>
                <h3>2.7.2</h3>
                <ul>
                    <li>Fixed - Some sites reporting error - call to undefined function get_blog_list().</li>
                    <li>Updated - Freemius to 2.3.0.</li>
                </ul>
                <h3>2.7.1</h3>
                <ul>
                    <li>Fixed - Pagination of filters for Posts/Portfolio Grid and Posts Block modules.</li>
                    <li>Added - Security improvements to Posts Grid and Gallery modules.</li>
                </ul>
                <h3>2.7</h3>
                <ul>
                    <li>Added - Plugin is now fully compatible with WPML plugin.</li>
                    <li>Added - All of our addons are now translatable using WPML plugin.</li>
                    <li>Added - Offset support for Posts Carousel modules.</li>
                </ul>
                <h3>2.6.4</h3>
                <ul>
                    <li>Added - Thumbnails support for the lightbox module of Posts Grid, Posts Block, Image/Video Gallery and Gallery Carousel.</li>
                    <li>Added - Offset support for Posts Grid and Posts Block modules.</li>
                    <li>Updated - Fancybox scripts to 3.5.7 release.</li>
                </ul>
                <h3>2.6.3</h3>
                <ul>
                    <li>Fixed - The HTML5 videos in the gallery module would display inline instead of showing up in the lightbox.</li>
                    <li>Fixed - Empty space below the tab addons.</li>
                </ul>
                <h3>2.6.2</h3>
                <ul>
                    <li>Updated - Readme.txt and documentation.</li>
                    <li>Removed - Unused files in plugin folders.</li>
                </ul>
                <h3>2.6.1</h3>
                <ul>
                    <li>Fixed - Fancybox lightbox combines images from multiple grids/galleries when displaying images/videos in the lightbox.</li>
                    <li>Fixed - The direct link to lightbox image does not work.</li>
                </ul>
                <h3>2.6</h3>
                <ul>
                    <li>Updated - Freemius library with a security fix. Recommended to update immediately.</li>
                    <li>Added - Twitter grid addon for showcasing tweets on your website.</li>
                    <li>Added - 3 styles for display of tweets in a Twitter grid.</li>
                    <li>Added - Extensive customization options for Twitter grid addon.</li>
                    <li>Added - Load more feature for Twitter grid addon.</li>
                    <li>Added - Enhanced blocks framework to accommodate social media grids.</li>
                    <li>Fixed - Posts Block Style 4 with single column results in invalid HTML.</li>
                    <li>Fixed - Some themes can raise JS error due to jQuery $ being unavailable</li>
                    <li>Updated - Fancybox lightbox library and Flexslider library with RTL support</li>
                </ul>
                <h3>2.5.2</h3>
                <ul>
                    <li>Fixed - Carousels utilizing slick JS causing conflict with Elementor scripts.</li>
                </ul>
                <h3>2.5.1</h3>
                <ul>
                    <li>Added - Support for HTML tags in gallery item description.</li>
                    <li>Fixed - The gallery item description not displaying in fancybox lightbox.</li>
                </ul>
                <h3>2.5</h3>
                <ul>
                    <li>Updated - Moved the video and image gallery addon to blocks framework with a host of new features. The popular gallery module is now powered by the same robust framework that powers our posts grid and posts block modules.</li>
                    <li>Added - 3 skins for video and image gallery module with better support for titles and descriptions. </li>
                    <li>Added - 7 new header styles for video and image gallery addon derived from blocks framework.</li>
                    <li>Added - Support for AJAX based filtering instead of JS filtering for video/image gallery addon when pagination/load more function is chosen for the gallery. No more empty filters since the gallery items are fetched from the server when filters are invoked. When number of items for a filter exceeds the 'items per page' specified, the filters themselves are paginated or load more function is invoked depending on user choice. The addon reverts to quicker in memory JS filters when no pagination or load more is involved.</li>
                    <li>Added - Support for tags and filters when bulk upload option for images is chosen.</li>
                    <li>Added - Collapsible and responsive filters for the gallery module.</li>
                    <li>Added - Better performance with in memory cache support for pagination of image/video gallery addon.</li>
                    <li>Fixed - The video gallery error when elementor lightbox option is chosen.</li>
                    <li>Removed module based templates; use filter hooks instead to achieve the same result.</li>
                </ul>
                <h3>2.3.5</h3>
                <ul>
                    <li>Updated - Freemius SDK to 2.1.3 that addresses plugin update issues on a multisite network.</li>
                </ul>
                <h3>2.3.4</h3>
                <ul>
                    <li>Added - Read More link/button options for posts blocks.</li>
                    <li>Added - Styling options for read more links and buttons in posts block module.</li>
                    <li>Added - Styling options for load more button in posts grid and posts block modules.</li>
                    <li>Added - Responsive pagination controls for gallery.</li>
                    <li>Added - Block style 8 in Posts Block now much more responsive.</li>
                </ul>
                <h3>2.3.3</h3>
                <ul>
                    <li>Fixed - Social media icons not showing up for team profiles.</li>
                    <li>Added - Filters for settings object employed for rendering the addons.</li>
                </ul>
                <h3>2.3.2</h3>
                <ul>
                    <li>Fixed - Gallery pagination would break when number of items crosses 140.</li>
                    <li>Added - Pagination with dotted navigation for galleries when number of pages exceeds 5.</li>
                </ul>
                <h3>2.3.1</h3>
                <ul>
                    <li>Fixed - Incompatibility with some themes which load waypoints JS script.</li>
                </ul>
                <br><h3>2.3</h3>
                <ul>
                    <li>Added - Extensive support for filters and templates to enable users to customize the output generated by the addons. You can now create a template file in elementor-addons folder in your child theme to customize the addons html or use filters to customize output generated by the addons. </li>
                    <li>Updated - Documentation providing information on how to use templates and filters to customize the plugin addons.</li>
                    <li>Fixed - The fancybox lightbox would not display share, thumbnail, slideshow options for image/video gallery, posts grid and posts blocks.</li>
                    <li>Fixed - Tooltips are displaying for icon list items.</li>
                </ul>
                <h3>2.2</h3>
                <ul>
                    <li>Fixed - Incompatibility with certain themes due to different versions of waypoints scripts being used.</li>
                    <li>Fixed - The tabs would leave a large space after the footer.</li>
                </ul>
                <h3>2.1</h3>
                <ul>
                    <li>Fixed - Certain widgets/addons like pricing, carousel, gallery and services raised errors when 'Add Item' button was pressed to add items. Error seen with latest version of Elementor.</li>
                    <li>Fixed - Leaving tags empty in the gallery lead to addition of an empty filter in the filter list</li>
                    <li>Fixed - Deprecated warning on checkbox control.</li>
                </ul>
                <h3>2.0.1</h3>
                <ul>
                    <li>Fixed - Bug fixes related to Freemius integration.</li>
                </ul>
                <h3>2.0</h3>
                <ul>
                    <li>Added – Freemius integration for easy upgrade, quick support/feedback and opt-in usage tracking with GDPR compliance.</li>
                </ul>
                <h3>1.9.2</h3>
                <ul>
                    <li>Fixed - The URLs specified for the gallery items not preserved across pagination or load more calls.</li>
                    <li>Fixed – Translation issues due to presence of additional language domains.</li>
                    <li>Fixed - Some sites had issues rendering tabs with disappearing tab labels and extra spaces at the bottom.</li>
                </ul>
                <h3>1.9.1</h3>
                <ul>
                    <li>Added – Compatibility with Elementor and Elementor PRO 2.</li>
                    <li>Added - Dynamic field connections for most widgets supported by Elementor 2.</li>
                    <li>Updated - Removed Livemesh prefix from all elements. For example, Livemesh Services is now named Services, Livemesh Tabs is now Tabs, Livemesh Grid is now Posts Grid etc.</li>
                    <li>Added - Ability to specify client name in HTML for additional formatting.</li>
                </ul>
                <h3>1.9.0</h3>
                <ul>
                    <li>Added – New simpler grid system for all elements that use grid.</li>
                    <li>Added – Seamless control of number of columns at all device resolutions for all those elements that involve grid – posts/portfolio grid, posts block, image/video gallery, clients, services, testimonials, team, charts, pricing table, faq etc.</li>
                    <li>Added - Option to preserve shortcodes and HTML tags in excerpt. Option is disabled by default.</li>
                </ul>
                <h3>1.8.8</h3>
                <ul>
                    <li>Fixed – Pagination and Load More for gallery would break when special characters are present in title or description.</li>
                    <li>Fixed - Duplicate tags filters generated in gallery when tags have spaces around them.</li>
                </ul>
                <h3>1.8.7</h3>
                <ul>
                    <li>Fixed - Warning for image slider widget in Elementor 2.0</li>
                    <li>Fixed - Grid layout for video gallery can break at times when user expands an inline video full screen</li>
                    <li>Tweak - Increased the taxonomy terms limit to 500 to help taxonomy field display all terms in installations where there are large number of terms</li>
                </ul>
                <h3>1.8.6</h3>
                <ul>
                    <li>Fixed - Broken wide image support for masonry grid in media gallery</li>
                </ul>
                <h3>1.8.5</h3>
                <ul>
                    <li>Added - Support for multiple url formats for YouTube and Vimeo videos in video gallery</li>
                    <li>Added - Support for inline responsive videos of YouTube, Vimeo and self-hosted MP4/WebM video formats</li>
                    <li>Added - If no custom thumbnail is set, the thumbnails for YouTube/Vimeo videos automatically set from the service provider</li>
                    <li>Fixed - Next/Prev navigation for gallery not working</li>
                </ul>
                <h3>1.8.3</h3>
                <ul>
                    <li>Updated - Waypoints script with new API for handling events on scroll</li>
                    <li>Fixed - Some themes can break animations and report script errors for elements like piecharts, odometers, progress bars etc.</li>
                </ul>
                <h3>1.8.2</h3>
                <ul>
                    <li>Improved – License activation page with less confusing interface.</li>
                    <li>Added - The license code entered is now masked upon activation.</li>
                </ul>
                <h3>1.8.1</h3>
                <ul>
                    <li>Added – Ability to display description for the image/video element in the gallery and gallery carousel lightbox window.</li>
                    <li>Added – The lightbox for posts grid and posts block now displays post summary and a link to the post in the lightbox.</li>
                    <li>Added – Option to disable display of post summary/excerpt in the lightbox window of posts block or posts grid.</li>
                </ul>
                <h3>1.8.0</h3>
                <ul>
                    <li>Added – Fancybox lightbox integration for grid, posts block, image gallery, video gallery and gallery carousel modules.</li>
                    <li>Added – Advanced features like touch/swipe controls, pinch out/in, double tap, keyboard navigation, full screen, thumbnails, social media sharing, hardware accelerated animations, direct linking now supported with lightbox.</li>
                    <li>Added – HTML5 video support in video gallery and video carousel modules. Support for MP4 and WebM formats.</li>
                </ul>
                <h3>1.7.6</h3>
                <ul>
                    <li>Fixed – Posts Grid columns can break in certain resolutions in FireFox.</li>
                    <li>Fixed - Posts Grid excerpt would not display shortcodes or HTML content</li>
                    <li>Fixed - Livemesh Gallery styling controls not taking effect for thumbnail hover and titles</li>
                </ul>
                <h3>1.7.5</h3>
                <ul>
                    <li>Added - Support for creating stunning masonry gallery layouts using flexible widths and heights for images.</li>
                    <li>Added - Ability to specify wide width for images in masonry layout of gallery.</li>
                    <li>Added - Options to enable/disable display of image/video titles and image/video tags in gallery and gallery carousel addons.</li>
                    <li>Fixed - Next Previous buttons of carousels would not show up in certain installations due to conflicts with base slick carousel styles</li>
                </ul>
                <h3>1.7.3</h3>
                <ul>
                    <li>Fixed - Undefined index warning on the gallery addon.</li>
                    <li>Fixed - Pagination/load more on the gallery addon.</li>
                </ul>
                <h3>1.7.2</h3>
                <ul>
                    <li>Fixed - Lightbox conflict with Elementor for gallery, gallery carousel, posts/portfolio grid and posts blocks modules.</li>
                    <li>Added - Option to choose either Elementor or Magnific Popup as lightbox lib for gallery and gallery carousel addons.</li>
                    <li>Added - Made Elementor lightbox lib as default for gallery and gallery carousel addons with slideshow function.</li>
                    <li>Fixed - The categories/taxonomy terms of the posts/portfolio grid and posts blocks would display a comma character on the post image when multiple terms/categories were present.</li>
                </ul>
                <h3>1.7.1</h3>
                <ul>
                    <li>Added - Advanced tab and accordion functions that help directly link to Tabs and Accordion panels from external pages. On page load, the corresponding tab/panel opens upon auto-scrolling to the tab or accordion panel.</li>
                    <li>Added - Smooth scroll to tabs and accordion panels from internal links within a page.</li>
                    <li>Added - Open tab or accordion panels by clicking the internal links within a page.</li>
                </ul>
                <h3>1.7</h3>
                <ul>
                    <li>Upgrade – Simpler grid system based on NEAT 2.1 version</li>
                    <li>Updated - The CSS is now optimized for vendor prefixes with reduced properties and file size.</li>
                    <li>Added - Scroll to the top of the posts block to display new posts during paged navigation (when new posts are not visible).</li>
                </ul>

                <h3>1.6</h3>
                <ul>
                    <li>Added – Image size option for all major addons including grid, gallery and carousels.</li>
                    <li>Added – Ability to crop images and specify custom image sizes for all major addons including grid, gallery and carousels.</li>
                    <li>Added - Bulk upload option for image gallery. The title of the image attachments is displayed on hover.</li>
                    <li>Added - The lightbox now opens on clicking anywhere on the image if no destination URL is specified for gallery item</li>
                    <li>Fixed – The gallery image was not clickable to the link specified</li>
                    <li>Fixed – The gallery filters would not center when a heading was not specified.</li>
                    <li>Fixed – The gallery filters will not display multi-line on devices of lower resolutions like mobile devices.</li>
                </ul>

                <h3>1.5</h3>
                <ul>
                    <li>Added – Moved the Posts Grid widget to new framework based on reusable blocks. Pls note that the class names have changed to keep it consistent with the new framework.</li>
                    <li>Added – 6 different styles for grid items plus 7 header styles too</li>
                    <li>Added – Next Prev pagination options for Posts Grid widget</li>
                    <li>Added – Ability to handle large number of grid pages by providing dotted navigation</li>
                    <li>Added – AJAX Category or taxonomy filtering for Grid widget. No more empty grid on category/taxonomy filtering</li>
                    <li>Added – Read More option for the grid items</li>
                    <li>Added – Open in new window option for links to posts in the grid</li>
                    <li>Added – Two more header styles to posts blocks</li>
                    <li>Fixed – The grid image was not clickable to the post</li>
                    <li>Fixed – The filters would not center when a heading was not specified.</li>
                    <li>Fixed – The grid filters will not display multi-line on devices of lower resolutions like mobile devices.</li>
                </ul>
                <h3>1.4.1</h3>
                <ul>
                    <li>Fixed - Fatal error on installations running below PHP 5.5 versions</li>
                </ul>
                <h3>1.4</h3>
                <ul>
                    <li>Added - Brand new Post Blocks Widget with more than a dozen styles and options to present your posts or custom post types</li>
                    <li>Added - AJAX Pagination, Next Prev and Load More options for Post Blocks widget</li>
                    <li>Added - AJAX Category or taxonomy filtering for Post Blocks widget</li>
                </ul>
                <h3>1.3</h3>
                <ul>
                    <li>Added - Extensive customization options including typography, color and other styling options for all addons/modules</li>
                    <li>Fixed - The lightbox image was smaller than uploaded size</li>
                    <li>Fixed - Service icons would show up even when 'None' option was chosen</li>
                    <li>Fixed - Translations not working with default files provided by plugin</li>
                </ul>
                <h3>1.2.1</h3>
                <ul>
                    <li>Added - Automatic plugin updates and license key activation</li>
                </ul>
                <h3>1.2</h3>
                <ul>
                    <li>Fixed - The portfolio grid addon leaves an empty space on the top when no heading is specified and when no taxonomy filters are specified</li>
                    <li>Fixed - In a few installations, the grid elements may not occupy full width between 769px to 800px device resolutions</li>
                    <li>Fixed - The grid raised an warning when when certain taxonomies are chosen in the grid settings.</li>
                    <li>Fixed - The isotope and magnific popup libraries were not being loaded for image/video gallery addon.</li>
                    <li>Credit - Big thanks to user Axel for finding ALL these bugs that I could not have found myself.</li>
                </ul>
                <h3>1.1</h3>
                <ul>
                    <li>Fixed - Plugin animations mixing up with elementor animations making the addons to disappear on frontend</li>
                    <li>Fixed - Links in a few widgets were showing even when no link URL was specified</li>
                    <li>Fixed - A few addons would wrap around and move outside of the editor container</li>
                    <li>Fixed - Odometers, Piecharts and Bar Charts addons would not show up in the editor preview</li>
                    <li>Fixed - Links in few addons would not take into consider the setting to open URL in new window</li>
                    <li>Fixed - The posts carousel would not show up in mobile devices</li>
                    <li>Fixed - The posts carousel dots navigation was not clickable</li>
                    <li>Fixed - The posts carousel would not expand beyond 960px in width</li>
                    <li>Fixed - Some addons having strange grey background in elementor editor</li>
                </ul>
                <h3>1.0</h3>
                <ul>
                    <li>Initial release.</li>
                </ul>
            </div><!-- .panel-left updates -->

            <div class="panel-right">

                <div class="panel-inner">

                    <?php if (lae_fs()->is_not_paying()): ?>

                        <div class="panel-aside banner">
                            <a href="<?php echo lae_fs()->get_upgrade_url(); ?>" title="Purchase Now"><img
                                        class="dashboard-image"
                                        src="https://www.livemeshthemes.com/wp-content/uploads/plugin-doc/elementor-addons/dashboard/purchase-banner1.jpg"
                                        alt="Sale Banner"></a>
                        </div>

                        <!-- Knowledge base -->
                        <div class="panel-aside">
                            <h4><?php _e('Why upgrade to Premium version?', 'livemesh-el-addons'); ?></h4>
                            <p><?php _e('Premium version offers multiple benefits - more addon elements, advanced features for addons including those part of the free plugin and priority support through a dedicated support portal.', 'livemesh-el-addons'); ?></p>

                            <a class="button button-primary"
                               href="https://livemeshelementor.com/addons-demo/#why-upgrade"
                               title="<?php esc_attr_e('Know More', 'livemesh-el-addons'); ?>"><?php _e('Know More Details', 'livemesh-el-addons'); ?></a>
                        </div><!-- .panel-aside knowledge base -->


                    <?php else: ?>

                        <!-- Knowledge base -->
                        <div class="panel-aside">
                            <h4>Need support for the plugin?</h4>

                            <p>The premium version of the plugin entitles you to quick support with replies posted within 24 hours (on week days). </p>

                            <p>Please submit your support query through our <a href="https://livemeshelementor.com/contact-us/" title="Livemesh Contact form">website contact form</a>. This will create a support ticket in our support portal.</p>

                            <a class="button button-primary"
                               href="https://livemeshelementor.com/contact-us/"
                               title="<?php esc_attr_e('Contact Us', 'livemesh-el-addons'); ?>"><?php _e('Contact Us', 'livemesh-el-addons'); ?></a>
                        </div><!-- .panel-aside knowledge base -->

                              <!-- Knowledge base -->
                        <div class="panel-aside">
                            <h4>Have questions or want to leave feedback?</h4>
                            <p>If you need to leave your feedback or have a query regarding one of our <a
                                        href="https://www.livemeshthemes.com/" title="WordPress Themes and Plugins">WordPress
                                    plugins or themes</a>, feel free to leave us a message through our contact form and
                                we will get back to you promptly.</p>

                            <a class="button button-primary"
                               href="https://livemeshelementor.com/contact-us/"
                               title="<?php esc_attr_e('Write to Us', 'livemesh-el-addons'); ?>"><?php _e('Write to Us', 'livemesh-el-addons'); ?></a>
                        </div><!-- .panel-aside knowledge base -->

                    <?php endif; ?>




                </div><!-- .panel-inner -->
            </div><!-- .panel-right -->
        </div><!-- .panel -->
    </div><!-- .panels -->
</div><!-- .livemesh-doc -->
