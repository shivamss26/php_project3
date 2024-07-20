(function(api) {

 api.sectionConstructor['instant-news-upsell'] = api.Section.extend({

        // Remove events for this section.
    attachEvents: function() {},

        // Ensure this section is active. Normally, sections without contents aren't visible.
    isContextuallyActive: function() {
        return true;
    }
});

 const instant_news_section_lists = ['flash-news', 'banner'];
 instant_news_section_lists.forEach(instant_news_homepage_scroll);

 function instant_news_homepage_scroll(item, index) {
        // Detect when the front page sections section is expanded (or closed) so we can adjust the preview accordingly.
    item = item.replace(/-/g, '_');
    wp.customize.section('instant_news_' + item + '_section', function(section) {
        section.expanded.bind(function(isExpanding) {
                // Value of isExpanding will = true if you're entering the section, false if you're leaving it.
            wp.customize.previewer.send(item, { expanded: isExpanding });
        });
    });
}

})(wp.customize);