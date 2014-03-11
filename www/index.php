<?php

require_once 'config.inc.php';

$uri = '';
if (isset($_GET['uri'])
    && preg_match('/https?:\/\//', $_GET['uri'])
    && filter_var($_GET['uri'], FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED)) {
    $uri = htmlentities($_GET['uri'], ENT_QUOTES);
}

if (!isset($template_path)) {
    $template_path = $_SERVER['DOCUMENT_ROOT'];
}

?>
<!DOCTYPE html>
<!--[if IEMobile 7 ]><html class="ie iem7"><![endif]-->
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7) ]><html class="ie" lang="en"><![endif]-->
<!--[if !(IEMobile) | !(IE)]><!--><html lang="en"><!-- InstanceBegin template="/Templates/php.fixed.dwt.php" codeOutsideHTMLIsLocked="false" --><!--<![endif]-->
<head>
<?php include($template_path . "/wdn/templates_3.1/includes/metanfavico.html"); ?>
<!--
    Membership and regular participation in the UNL Web Developer Network
    is required to use the UNL templates. Visit the WDN site at
    http://wdn.unl.edu/. Click the WDN Registry link to log in and
    register your unl.edu site.
    All UNL template code is the property of the UNL Web Developer Network.
    The code seen in a source code view is not, and may not be used as, a
    template. You may not use this code, a reverse-engineered version of
    this code, or its associated visual presentation in whole or in part to
    create a derivative work.
    This message may not be removed from any pages based on the UNL site template.

    $Id: php.fixed.dwt.php | ebd6eef8f48e609f4e2fe9c1d6432991649298e7 | Tue Mar 6 14:38:44 2012 -0600 | Brett Bieber  $
-->
<?php include($template_path . "/wdn/templates_3.1/includes/scriptsandstyles.html"); ?>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Site Checker | Web Developer Network | University of Nebraska&ndash;Lincoln</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- Place optional header elements here -->
<link rel="stylesheet" type="text/css" href="http://wdn.unl.edu/resources/grid/grid-v3.css" />
<link rel="stylesheet" type="text/css" href="css/main.css" />
<script type="text/javascript" src="js/main.min.js"></script>
<script type="text/javascript">
    var baseURI = '<?php echo $uri; ?>';
    WDN.initializePlugin('notice');
</script>

<!-- InstanceEndEditable -->
<!-- InstanceParam name="class" type="text" value="fixed" -->
</head>
<body class="fixed" data-version="3.1">
    <nav class="skipnav" role="navigation">
        <a class="skipnav" href="#maincontent">Skip Navigation</a>
    </nav>
    <div id="wdn_wrapper">
        <header id="header" role="banner">
            <a id="logo" href="http://www.unl.edu/" title="UNL website">UNL</a>
            <span id="wdn_institution_title">University of Nebraska&ndash;Lincoln</span>
            <span id="wdn_site_title"><!-- InstanceBeginEditable name="titlegraphic" -->Site Checker<!-- InstanceEndEditable --></span>
            <?php include($template_path . "/wdn/templates_3.1/includes/idm.html"); ?>
            <?php include($template_path . "/wdn/templates_3.1/includes/wdnTools.html"); ?>
        </header>
        <div id="wdn_navigation_bar" role="navigation">
            <nav id="breadcrumbs">
                <!-- WDN: see glossary item 'breadcrumbs' -->
                <h3 class="wdn_list_descriptor hidden">Breadcrumbs</h3>
                <!-- InstanceBeginEditable name="breadcrumbs" -->
                <ul>
                    <li class="first"><a href="http://www.unl.edu/">UNL</a></li>
                    <li><a href="http://wdn.unl.edu/"><abbr title="Web Developer Network">WDN</abbr></a></li>
                    <li>Site Checker</li>
                </ul>
                <!-- InstanceEndEditable -->
            </nav>
            <div id="wdn_navigation_wrapper">
                <nav id="navigation" role="navigation">
                    <h3 class="wdn_list_descriptor hidden">Navigation</h3>
                    <!-- InstanceBeginEditable name="navlinks" -->
                    <?php echo file_get_contents('http://www1.unl.edu/wdn/templates_3.0/scripts/navigationSniffer.php?u=http://wdn.unl.edu/'); ?>
                    <!-- InstanceEndEditable -->
                </nav>
            </div>
        </div>
        <div id="wdn_content_wrapper" role="main">
            <div id="pagetitle" style="display:none;">
                <!-- InstanceBeginEditable name="pagetitle" -->
                <h1>Site Validator</h1>
                <!-- InstanceEndEditable -->
            </div>
            <div id="maincontent">
                <!--THIS IS THE MAIN CONTENT AREA; WDN: see glossary item 'main content area' -->
                <!-- InstanceBeginEditable name="maincontentarea" -->
                <div class="wdn_notice alert">
                    <div class="message">
                        <h4>We are moving!</h4>
                        <p>
                            This system is moving to the newer and better <a href="http://webaudit.unl.edu/">webaudit.unl.edu</a>.
                            In a few weeks, we will be removing this site.  Automatic scans have been disabled for this site.
                        </p>
                    </div>
                </div>
                <form method="get" action="#" class="wdn-form single" id="validator-form">
                    <fieldset class="main-focus">
                        <legend class="intro-action">Scan your site for validation</legend>
                        <label for="uri" class="element">
                            Enter your site URL <span class="helper-text">Simply use your homepage, and be sure that the URL starts with HTTP:// and ends with a trailing /</span>
                        </label>
                        <input type="url" name="uri" value="<?php echo $uri; ?>" placeholder="http://" required="required" id="uri" />
                        <input type="submit" id="submit" name="submit" value="Check" disabled />
                    </fieldset>
                </form>
                <div id="scan-container">
                    <div id="scan-wrapper">
    
                    </div>
                    <div id="scan-waiting" class="overlay">

                    </div>
                </div>
                <script id="temp-validator-results" type="text/x-handlebars-template">
                    <section id="validator-results-setup" class="report-view">
                        <h2 class="report-title title">Summary of Check</h2>
                        {{#homepage_only page_limit}}
                        <div class="wdn_notice alert">
                            <div class="message">
                                <h4>We only scanned your homepage</h4>
                                <p>
                                    In the future we will be scanning your entire site automatically.  Please feel free
                                    to run a scan on the entire site now.
                                </p>
                            </div>
                        </div>
                        {{/homepage_only}}
                        {{#status_error status}}
                            <div class="wdn_notice negate">
                                <div class="message">
                                    <h4>There was an error while scanning your site</h4>
                                    <p>
                                        We encountered an error that we could not recover from while scanning your site, thus
                                        the results will be incomplete.
                                    </p>
                                </div>
                            </div>
                        {{/status_error}}
                        {{#status_restricted status}}
                        <div class="wdn_notice negate">
                            <div class="message">
                                <h4>The site that you entered can not be checked</h4>
                                <p>
                                    The site is in our restricted sites list.  We do not allow checking anything in that list...
                                </p>
                            </div>
                        </div>
                        {{/status_restricted}}
                        {{#status_timeout status}}
                            <div class="wdn_notice negate">
                                <div class="message">
                                    <h4>We could not finish scanning your site</h4>
                                    <p>
                                        It was taking too long to scan everything on your site, so we had to stop early.
                                        The results of what we did find are below.
                                    </p>
                                </div>
                            </div>
                        {{/status_timeout}}
                        {{#if error_scanning}}
                            <div class="wdn_notice negate">
                                <div class="message">
                                    <h4>We had some problems while scanning your site.</h4>
                                    <p>
                                        Please check the following pages for errors, then recheck the site.  Errors that
                                        cause this problem usually have to do with CDATA sections in the HTML.
                                    </p>
                                    <ul>
                                        {{#each pages}}
                                        {{#unless scannable}}
                                        <li>
                                            <a href="#page-{{@index}}">{{page}}</a>
                                        </li>
                                        {{/unless}}
                                        {{/each}}
                                    </ul>
                                </div>
                            </div>
                        {{/if}}
                        {{#grid_2006 total_grid_2006_pages}}
                        <div class="wdn_notice negate">
                            <div class="message">
                                <h4>Deprecated 2006 grid system was found on this site.</h4>
                                <p>
                                    Grid columns with classes such as .one_col, .two_col are deprecated and will not be 
                                    supported in the 4.0 release of the UNLedu Framework. Please upgrade to the latest
                                    <a href='http://wdn.unl.edu/resources/grid/'>grid system</a>.
                                </p>
                                <ul>
                                    {{#each pages}}
                                    {{#if grid_2006}}
                                    <li>
                                        <a href="#page-{{@index}}">{{page}}</a>
                                    </li>
                                    {{/if}}
                                    {{/each}}
                                </ul>
                            </div>
                        </div>
                        {{/grid_2006}}
                        <div class="wdn-grid-set">
                            <div class="bp2-wdn-col-three-fourths">
                            <h3>Site Information</h3>
                            <ul class="structure-list">
                                <li>
                                    <span class="item-label">Site title:</span> <span id="site-title">{{{site_title}}}</span>
                                </li>
                                <li>
                                    <span class="item-label">Date of last check:</span> <time class="last-scan-date">{{last_scan}}</time>
                                </li>
                                <li>
                                    <span class="item-label">Total pages checked:</span> {{total_pages}}
                                </li>
                            </ul>
                            </div>
                            <div class="bp2-wdn-col-one-fourth">
                                <!--<a href="#" class="wdn-button large-button triad recheck-button">Recheck Site</a>-->
                            </div>
                        </div>
                        <div class="wdn-grid-set-halves bp1-wdn-grid-set-thirds bp2-wdn-grid-set-fifths dashboard-metrics">
                            <div class="wdn-col callout-metric" id="valid-errors">
                                <div class="visual-island {{error_total total_html_errors}}">
                                    <span class="more-info" data-helper-text="HTML errors are due to invalid HTML markup in your pages.  They may cause inconsistent rendering and behavior between browsers.">?</span>
                                    <span class="dashboard-value">
                                        {{total_html_errors}}
                                    </span>
                                    <span class="dashboard-metric">
                                        HTML errors
                                    </span>
                                </div>
                            </div>
                            <div class="wdn-col callout-metric" id="valid-html">
                                <div class="visual-island {{error_percentage total_current_template_html total_pages}}">
                                    <span class="more-info" data-helper-text="The latest version of the supporting UNLedu framework HTML markup.  If you are using UNLcms, this will be updated automatically.">?</span>
                                    <span class="dashboard-value">
                                        {{percentage total_current_template_html total_pages}}
                                    </span>
                                    <span class="dashboard-metric">
                                        current HTML <span class='version'>{{{format_version current_template_html}}}</span>
                                    </span>
                                </div>
                            </div>
                            <div class="wdn-col callout-metric" id="valid-dependents">
                                <div class="visual-island {{error_percentage total_current_template_dep total_pages}}">
                                    <span class="more-info" data-helper-text="The latest version of the supporting UNLedu framework resources (CSS, JS and other includes).  If you are using UNLcms, this will be updated automatically.">?</span>
                                    <span class="dashboard-value">
                                        {{percentage total_current_template_dep total_pages}}
                                    </span>
                                    <span class="dashboard-metric">
                                        current dependents <span class='version'>{{{format_version current_template_dep}}}</span>
                                    </span>
                                </div>
                            </div>
                            <div class="wdn-col callout-metric" id="301-links">
                                <div class="visual-island {{error_total total_bad_links.[301]}}">
                                    <span class="more-info" data-helper-text="These link to a resource that has been permanently redirected. Update your link to the redirected resource.">?</span>
                                    <span class="dashboard-value">
                                        {{total_bad_links.[301]}}
                                    </span>
                                    <span class="dashboard-metric">
                                        301 links
                                    </span>
                                </div>
                            </div>
                            <div class="wdn-col callout-metric" id="404-links">
                                <div class="visual-island {{error_total total_bad_links.[404]}}">
                                    <span class="more-info" data-helper-text="These link to a resource that no longer exist.  Please remove these links.">?</span>
                                    <span class="dashboard-value">
                                        {{total_bad_links.[404]}}
                                    </span>
                                    <span class="dashboard-metric">
                                        404 links
                                    </span>
                                </div>
                            </div>
                        </div>
                        <table class="wdn_responsive_table" id="validator-results">
                            <caption>Results for your viewing pleasure</caption>
                            <thead>
                                <tr>
                                    <th id="validator-page">Page</th>
                                    <th id="validator-html">HTML Errors</th>
                                    <th id="validator-current-html">Current HTML</th>
                                    <th id="validator-current-dependents">Current Dependents</th>
                                    <th id="validator-301">301 Links</th>
                                    <th id="validator-404">404 Links</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{#each pages}}
                                <tr data-page="{{page}}" class="trigger-row">
                                    <th id="page-{{@index}}" class="justified">
                                        {{strip_site page}} <a href="{{page}}" class="external-site" title="Open this page in a new tab"><img src="css/images/external.png" alt="link to external site" /></a>
                                    </th>
                                    <td headers="page-{{@index}} validator-html" data-header="HTML Validity" class="{{error_total html_errors}}">
                                        {{html_errors}}
                                    </td>
                                    <td headers="page-{{@index}} validator-current-html" data-header="Current HTML" class="{{error_boolean template_html.current}}">
                                        {{{format_boolean template_html.current}}} {{{format_version template_html.version}}}
                                    </td>
                                    <td headers="page-{{@index}} validator-current-dependents" data-header="Current Dependents" class="{{error_boolean template_dep.current}}">
                                        {{{format_boolean template_dep.current}}} {{{format_version template_dep.version}}}
                                    </td>
                                    <td headers="page-{{@index}} validator-301" data-header="301 Links" class="{{{error_total bad_links.[301].total}}}">
                                        {{bad_links.[301].total}}
                                    </td>
                                    <td headers="page-{{@index}} validator-404" data-header="404 Links" class="{{{error_total bad_links.[404].total}}}">
                                        {{bad_links.[404].total}}
                                    </td>
                                </tr>
                                <tr class="expansion-row justified">
                                    <td colspan=6 data-header="Page-level Details" class="expansion-container">
                                        <div class="wdn-grid-set">
                                            <div class="bp2-wdn-col-three-fifths page-validator-results">
                                                <div class="shader">
                                                    <span class="title">HTML Errors</span>
                                                    <div class="html-errors-wrapper">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bp2-wdn-col-two-fifths page-bad-links">
                                                <div class="shader even">
                                                    <span class="title">Link Issues</span>
                                                {{#if bad_links}}
                                                    {{#if bad_links.[301].total}}
                                                    <div class="wdn-grid-set row">
                                                        <div class="wdn-col-one-fourth">
                                                            <span class="dashboard-value secondary">301</span>
                                                        </div>
                                                        <div class="wdn-col-three-fourths">
                                                            <ul class="item-list">
                                                                {{#each bad_links.[301].links}}
                                                                <li>{{this}}</li>
                                                                {{/each}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    {{/if}}
                                                    {{#if bad_links.[404].total}}
                                                    <div class="wdn-grid-set row">
                                                        <div class="wdn-col-one-fourth">
                                                            <span class="dashboard-value secondary">404</span>
                                                        </div>
                                                        <div class="wdn-col-three-fourths">
                                                            <ul class="item-list">
                                                                {{#each bad_links.[404].links}}
                                                                <li>{{this}}</li>
                                                                {{/each}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    {{/if}}
                                                {{else}}
                                                    <p>Awesome, you have nice links on this page!</p>
                                                {{/if}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                {{/each}}
                            </tbody>
                        </table>
                        {{#has_logged_links logged_links}}
                        <div id="logged-links">
                            <table class="wdn_responsive_table">
                                <caption>Links for further review</caption>
                                <thead>
                                <tr>
                                    <th id="logged-links-url">Link URL</th>
                                    <th id="logged-links-reason">Reason</th>
                                    <th id="logged-links-found-on">Found On</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{#each logged_links}}
                                <tr>
                                    <td data-header="Link URL"><a href="{{link_url}}">{{strip_site link_url}}</a></td>
                                    <td data-header="Reason"><a href="#reason_{{reason}}">{{human_reason}}</a></td>
                                    <td data-header="Found On"><a href="{{url}}">{{strip_site url}}</a></td>
                                </tr>
                                {{/each}}
                                </tbody>
                            </table>
                            <div id="logged-links-reasons">
                                <h3>Why are we telling you about these links?</h3>
                                <dl>
                                    <dt id="reason_extension_pdf">Portable Document Format (PDF)</dt>
                                    <dd>
                                        In an effort to make the UNL website accessible we recommend not using PDFs unless you have to.  Why?
                                        <ul>
                                            <li>
                                                PDFs are not always accessible.  Note that the above links may include PDFs that are not hosted on your website.  If you must link to a PDF, it is your responsibility to ensure that it meets section 508 accessibility requirements.  We can not machine test PDFs for accessibility, so it is important that you verify that these links are accessible.  <a href="http://www.howto.gov/web-content/accessibility/create-accessible-pdfs">Learn more about making PDFs accessible</a>.
                                            </li>
                                            <li>
                                                PDFs can be hard to view on mobile devices.
                                            </li>
                                            <li>
                                                Asking a visitor to download a PDF when the content could be easily displayed as a web page can cause frustration for the end user.
                                            </li>
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        {{/has_logged_links}}
                        <div class="footer">
                            <div class="wdn-grid-set">
                                <div class="bp2-wdn-col-three-fourths">
                                <ul class="structure-list">
                                    <li>
                                        <span class="item-label">Date of last check:</span> <time class="last-scan-date">{{last_scan}}</time>
                                    </li>
                                </ul>
                                </div>
                                <div class="bp2-wdn-col-one-fourth">
                                    <a href="#" class="wdn-button large-button triad recheck-button">Full site scan</a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="wdn-band">
                        <div class="wdn-grid-set">
                            <div class="wdn-col centered bp2-wdn-col-three-fifths">
                                <h2 class="footer-title">Help us help you.</h2>
                                <p>If you notice a problem or have an idea to make this service even better, please <a href="https://github.com/unl/batchvalidator/issues">add it to the project issue list</a>.
                            </div>
                        </div>
                    </section>
                </script>
                <script id="temp-html-validator-results" type="text/x-handlebars-template">
                    {{#if errors}}
                        <ul class="item-list report-list">
                            {{#each errors}}
                                <li>
                                    Line {{line}}, column {{col}}: <span class="message">{{message}}</span> <br />
                                    <code>{{{source}}}</code>
                                </li>
                            {{/each}}
                        </ul>
                    {{else}}
                        {{#if validity}}
                            <p>Awesome, no errors on the page!</p>
                        {{else}}
                            <p>Officially, we can not confirm or deny the presence of errors on this page. <br />
                            However, it's likely you have too many errors which caused the checker to get confused.</p>
                        {{/if}}
                    {{/if}}
                </script>
                <script id="temp-queueplacement" type="text/x-handlebars-template">
                    {{{position queue_position}}}
                </script>
                <script id="temp-waiting" type="text/x-handlebars-template">
                    <p class="action-title">Site check! 1. 2. 3.</p>
                    <div id="queueplacement-wrapper">
                    </div>
                    <section class="wdn-grid-set">
                        <div class="bp2-wdn-col-one-fifth" id="validator-spinner">
                            <div id="spinner-wrapper">

                            </div>
                        </div>
                        <div class="bp2-wdn-col-two-fifths">
                            <p>
                                Your site is in the queue to be checked; our hamsters are running as quickly as possible.<br />
                                Your results will appear when the check is complete.
                            </p>
                        </div>
                        <div class="bp2-wdn-col-two-fifths">
                            <div class="visual-island font-reset">
                                {{#if contact_email}}
                                <p>An email will be sent when the check is complete. Closing this page will <em>not</em> affect the check.</p>
                                {{else}}
                                <p class="instructions">
                                    Feel free to do other work. Enter your email and we'll send you a summary when the check is complete.
                                </p>
                                <form method="get" action="#" class="wdn-form" id="email-contact-form">
                                    <fieldset>
                                        <legend class="intro-action">Receive an email when the check is complete</legend>
                                        <label for="email" class="element text-hidden">
                                            Your email address
                                        </label>
                                        <input type="email" name="email" value="" placeholder="you@unl.edu" required="required" id="email" />
                                        <input type="submit" id="email-submit" name="submit" value="Submit"/>
                                    </fieldset>
                                </form>
                                {{/if}}
                            </div>
                        </div>
                    </section>
                </script>
                <div class="loader hidden">
                    <div class="wdn-spinner">
                        <div class="circle"></div>
                        <div class="circle1"></div>
                    </div>
                </div>
                <!-- InstanceEndEditable -->
                <div class="clear"></div>
                <?php include($template_path . "/wdn/templates_3.1/includes/noscript.html"); ?>
                <!--THIS IS THE END OF THE MAIN CONTENT AREA.-->
            </div>
        </div>
        <footer id="footer" role="contentinfo">
            <div id="footer_floater"></div>
            <div class="footer_col" id="wdn_footer_feedback">
                <?php include($template_path . "/wdn/templates_3.1/includes/feedback.html"); ?>
            </div>
            <div class="footer_col" id="wdn_footer_related">
                <!-- InstanceBeginEditable name="leftcollinks" -->
                <?php echo file_get_contents('http://wdn.unl.edu/sharedcode/relatedLinks.html'); ?>
                <!-- InstanceEndEditable --></div>
            <div class="footer_col" id="wdn_footer_contact">
                <!-- InstanceBeginEditable name="contactinfo" -->
                <h3>Contacting Us</h3>
                <p>
                The WDN is coordinated by:<br />
                <strong>University Communications</strong><br />
                Internet and Interactive Media<br />
                WICK 17<br />
                Lincoln, NE 68583-0218</p>
                <!-- InstanceEndEditable --></div>
            <div class="footer_col" id="wdn_footer_share">
                <?php include($template_path . "/wdn/templates_3.1/includes/socialmediashare.html"); ?>
            </div>
            <!-- InstanceBeginEditable name="optionalfooter" -->
            <!-- InstanceEndEditable -->
            <div id="wdn_copyright">
                <div>
                    <!-- InstanceBeginEditable name="footercontent" -->
                    <?php file_get_contents('http://wdn.unl.edu/sharedcode/footer.html'); ?>
                    <!-- InstanceEndEditable -->
                    <?php include($template_path . "/wdn/templates_3.1/includes/wdn.html"); ?>
                </div>
                <?php include($template_path . "/wdn/templates_3.1/includes/logos.html"); ?>
            </div>
        </footer>
    </div>
</body>
<!-- InstanceEnd --></html>
